<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreRedeemVoucherRequest;
use App\Http\Requests\UpdateRedeemVoucherRequest;
use App\Http\Resources\Admin\RedeemVoucherResource;
use App\Models\RedeemVoucher;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class RedeemVoucherApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('redeem_voucher_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new RedeemVoucherResource(RedeemVoucher::all());
    }

    public function store(StoreRedeemVoucherRequest $request)
    {
        $redeemVoucher = RedeemVoucher::create($request->all());

        return (new RedeemVoucherResource($redeemVoucher))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(RedeemVoucher $redeemVoucher)
    {
        abort_if(Gate::denies('redeem_voucher_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new RedeemVoucherResource($redeemVoucher);
    }

    public function update(UpdateRedeemVoucherRequest $request, RedeemVoucher $redeemVoucher)
    {
        $redeemVoucher->update($request->all());

        return (new RedeemVoucherResource($redeemVoucher))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(RedeemVoucher $redeemVoucher)
    {
        abort_if(Gate::denies('redeem_voucher_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $redeemVoucher->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
