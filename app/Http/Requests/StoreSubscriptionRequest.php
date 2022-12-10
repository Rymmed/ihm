<?php

namespace App\Http\Requests;

use App\Subscription;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Gate;
use Symfony\Component\HttpFoundation\Response;

class StoreSubscriptionRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('subscription_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        abort_if(Gate::denies('subscribe'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'member_id'   => [
                'required',
                'integer'],
            'package_id' => [
                'required',
                'integer'],
            'state' => [
                // 'required',
                'boolean'],
        ];
    }
}
