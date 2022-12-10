<?php

namespace App\Http\Requests;

use App\Subscription;
use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class UpdateSubscriptionRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('subscription_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

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
            'state'    => [
                // 'required',
                'boolean'],
            'fin'   => [
                // 'required',
                'date_format:' . config('panel.date_format')],
        ];
    }
}
