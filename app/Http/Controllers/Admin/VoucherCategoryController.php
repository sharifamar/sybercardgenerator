<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\MassDestroyVoucherCategoryRequest;
use App\Http\Requests\StoreVoucherCategoryRequest;
use App\Http\Requests\UpdateVoucherCategoryRequest;
use App\Models\VoucherCategory;
use Gate;
use Illuminate\Http\Request;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Symfony\Component\HttpFoundation\Response;

class VoucherCategoryController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        abort_if(Gate::denies('voucher_category_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $voucherCategories = VoucherCategory::with(['media'])->get();

        return view('admin.voucherCategories.index', compact('voucherCategories'));
    }

    public function create()
    {
        abort_if(Gate::denies('voucher_category_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.voucherCategories.create');
    }

    public function store(StoreVoucherCategoryRequest $request)
    {
        $voucherCategory = VoucherCategory::create($request->all());

        if ($request->input('voucher_image', false)) {
            $voucherCategory->addMedia(storage_path('tmp/uploads/' . basename($request->input('voucher_image'))))->toMediaCollection('voucher_image');
        }

        if ($media = $request->input('ck-media', false)) {
            Media::whereIn('id', $media)->update(['model_id' => $voucherCategory->id]);
        }

        return redirect()->route('admin.voucher-categories.index');
    }

    public function edit(VoucherCategory $voucherCategory)
    {
        abort_if(Gate::denies('voucher_category_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.voucherCategories.edit', compact('voucherCategory'));
    }

    public function update(UpdateVoucherCategoryRequest $request, VoucherCategory $voucherCategory)
    {
        $voucherCategory->update($request->all());

        if ($request->input('voucher_image', false)) {
            if (! $voucherCategory->voucher_image || $request->input('voucher_image') !== $voucherCategory->voucher_image->file_name) {
                if ($voucherCategory->voucher_image) {
                    $voucherCategory->voucher_image->delete();
                }
                $voucherCategory->addMedia(storage_path('tmp/uploads/' . basename($request->input('voucher_image'))))->toMediaCollection('voucher_image');
            }
        } elseif ($voucherCategory->voucher_image) {
            $voucherCategory->voucher_image->delete();
        }

        return redirect()->route('admin.voucher-categories.index');
    }

    public function show(VoucherCategory $voucherCategory)
    {
        abort_if(Gate::denies('voucher_category_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.voucherCategories.show', compact('voucherCategory'));
    }

    public function destroy(VoucherCategory $voucherCategory)
    {
        abort_if(Gate::denies('voucher_category_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $voucherCategory->delete();

        return back();
    }

    public function massDestroy(MassDestroyVoucherCategoryRequest $request)
    {
        $voucherCategories = VoucherCategory::find(request('ids'));

        foreach ($voucherCategories as $voucherCategory) {
            $voucherCategory->delete();
        }

        return response(null, Response::HTTP_NO_CONTENT);
    }

    public function storeCKEditorImages(Request $request)
    {
        abort_if(Gate::denies('voucher_category_create') && Gate::denies('voucher_category_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $model         = new VoucherCategory();
        $model->id     = $request->input('crud_id', 0);
        $model->exists = true;
        $media         = $model->addMediaFromRequest('upload')->toMediaCollection('ck-media');

        return response()->json(['id' => $media->id, 'url' => $media->getUrl()], Response::HTTP_CREATED);
    }
}
