<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyVoucherRequest;
use App\Http\Requests\StoreVoucherRequest;
use App\Http\Requests\UpdateVoucherRequest;
use App\Models\Batch;
use App\Models\Voucher;
use App\Models\VoucherCategory;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;

class VouchersController extends Controller
{
    public function index(Request $request)
    {
        abort_if(Gate::denies('voucher_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if ($request->ajax()) {
            $query = Voucher::with(['batch', 'category'])->select(sprintf('%s.*', (new Voucher)->table));
            $table = Datatables::of($query);

            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                $viewGate      = 'voucher_show';
                $editGate      = 'voucher_edit';
                $deleteGate    = 'voucher_delete';
                $crudRoutePart = 'vouchers';

                return view('partials.datatablesActions', compact(
                    'viewGate',
                    'editGate',
                    'deleteGate',
                    'crudRoutePart',
                    'row'
                ));
            });

            $table->editColumn('id', function ($row) {
                return $row->id ? $row->id : '';
            });
            $table->editColumn('voucher_code', function ($row) {
                return $row->voucher_code ? $row->voucher_code : '';
            });
            $table->editColumn('voucher_status', function ($row) {
                return $row->voucher_status ? Voucher::VOUCHER_STATUS_SELECT[$row->voucher_status] : '';
            });
            $table->addColumn('batch_batch_serial_number', function ($row) {
                return $row->batch ? $row->batch->batch_serial_number : '';
            });

            $table->editColumn('batch.batch_serial_number', function ($row) {
                return $row->batch ? (is_string($row->batch) ? $row->batch : $row->batch->batch_serial_number) : '';
            });
            $table->editColumn('batch.expiry_date', function ($row) {
                return $row->batch ? (is_string($row->batch) ? $row->batch : $row->batch->expiry_date) : '';
            });
            $table->editColumn('batch.number_of_vouchers', function ($row) {
                return $row->batch ? (is_string($row->batch) ? $row->batch : $row->batch->number_of_vouchers) : '';
            });
            $table->editColumn('batch.voucher_status', function ($row) {
                return $row->batch ? (is_string($row->batch) ? $row->batch : $row->batch->voucher_status) : '';
            });
            $table->editColumn('batch.generated', function ($row) {
                return $row->batch ? (is_string($row->batch) ? $row->batch : $row->batch->generated) : '';
            });
            $table->addColumn('category_voucher_name', function ($row) {
                return $row->category ? $row->category->voucher_name : '';
            });

            $table->editColumn('category.voucher_name', function ($row) {
                return $row->category ? (is_string($row->category) ? $row->category : $row->category->voucher_name) : '';
            });
            $table->editColumn('category.amount', function ($row) {
                return $row->category ? (is_string($row->category) ? $row->category : $row->category->amount) : '';
            });
            $table->editColumn('category.currency', function ($row) {
                return $row->category ? (is_string($row->category) ? $row->category : $row->category->currency) : '';
            });

            $table->editColumn('used_by', function ($row) {
                return $row->used_by ? $row->used_by : '';
            });

            $table->rawColumns(['actions', 'placeholder', 'batch', 'category']);

            return $table->make(true);
        }

        return view('admin.vouchers.index');
    }

    public function create()
    {
        abort_if(Gate::denies('voucher_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $batches = Batch::pluck('batch_serial_number', 'id')->prepend(trans('global.pleaseSelect'), '');

        $categories = VoucherCategory::pluck('voucher_name', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.vouchers.create', compact('batches', 'categories'));
    }

    public function store(StoreVoucherRequest $request)
    {
        $voucher = Voucher::create($request->all());

        return redirect()->route('admin.vouchers.index');
    }

    public function edit(Voucher $voucher)
    {
        abort_if(Gate::denies('voucher_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $batches = Batch::pluck('batch_serial_number', 'id')->prepend(trans('global.pleaseSelect'), '');

        $categories = VoucherCategory::pluck('voucher_name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $voucher->load('batch', 'category');

        return view('admin.vouchers.edit', compact('batches', 'categories', 'voucher'));
    }

    public function update(UpdateVoucherRequest $request, Voucher $voucher)
    {
        $voucher->update($request->all());

        return redirect()->route('admin.vouchers.index');
    }

    public function show(Voucher $voucher)
    {
        abort_if(Gate::denies('voucher_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $voucher->load('batch', 'category');

        return view('admin.vouchers.show', compact('voucher'));
    }

    public function destroy(Voucher $voucher)
    {
        abort_if(Gate::denies('voucher_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $voucher->delete();

        return back();
    }

    public function massDestroy(MassDestroyVoucherRequest $request)
    {
        $vouchers = Voucher::find(request('ids'));

        foreach ($vouchers as $voucher) {
            $voucher->delete();
        }

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
