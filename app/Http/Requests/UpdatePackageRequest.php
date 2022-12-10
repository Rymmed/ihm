<?php

namespace App\Http\Requests;

use App\Package;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Gate;
use Symfony\Component\HttpFoundation\Response;

class UpdatePackageRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('package_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'name' => [
                'required'],
            'duration' => [
                'required'],
            'price' => [
                'required'],
            'courses.*' =>[
                'integer' ],
            'courses' => [
                'required',
                'array'],
        ];
    }
}
