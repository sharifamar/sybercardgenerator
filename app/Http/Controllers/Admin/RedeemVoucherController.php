<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyRedeemVoucherRequest;
use App\Http\Requests\StoreRedeemVoucherRequest;
use App\Http\Requests\UpdateRedeemVoucherRequest;
use App\Models\RedeemVoucher;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;

class RedeemVoucherController extends Controller
{
    public function index(Request $request)
    {
        abort_if(Gate::denies('redeem_voucher_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if ($request->ajax()) {
            $query = RedeemVoucher::query()->select(sprintf('%s.*', (new RedeemVoucher)->table));
            $table = Datatables::of($query);

            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                $viewGate      = 'redeem_voucher_show';
                $editGate      = 'redeem_voucher_edit';
                $deleteGate    = 'redeem_voucher_delete';
                $crudRoutePart = 'redeem-vouchers';

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
            $table->editColumn('requester', function ($row) {
                return $row->requester ? $row->requester : '';
            });
            $table->editColumn('external_reference', function ($row) {
                return $row->external_reference ? $row->external_reference : '';
            });

            $table->rawColumns(['actions', 'placeholder']);

            return $table->make(true);
        }

        return view('admin.redeemVouchers.index');
    }

    public function create()
    {
        abort_if(Gate::denies('redeem_voucher_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.redeemVouchers.create');
    }

    public function store(StoreRedeemVoucherRequest $request)
    {
        $redeemVoucher = RedeemVoucher::create($request->all());

        return redirect()->route('admin.redeem-vouchers.index');
    }

    public function edit(RedeemVoucher $redeemVoucher)
    {
        abort_if(Gate::denies('redeem_voucher_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.redeemVouchers.edit', compact('redeemVoucher'));
    }

    public function update(UpdateRedeemVoucherRequest $request, RedeemVoucher $redeemVoucher)
    {
        $redeemVoucher->update($request->all());

        return redirect()->route('admin.redeem-vouchers.index');
    }

    public function show(RedeemVoucher $redeemVoucher)
    {
        abort_if(Gate::denies('redeem_voucher_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.redeemVouchers.show', compact('redeemVoucher'));
    }

    public function destroy(RedeemVoucher $redeemVoucher)
    {
        abort_if(Gate::denies('redeem_voucher_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $redeemVoucher->delete();

        return back();
    }

    public function massDestroy(MassDestroyRedeemVoucherRequest $request)
    {
        $redeemVouchers = RedeemVoucher::find(request('ids'));

        foreach ($redeemVouchers as $redeemVoucher) {
            $redeemVoucher->delete();
        }

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
