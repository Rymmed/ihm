<?php

namespace App\Http\Requests;

use App\Session;
use App\Rules\SessionTimeAvailabilityRule;
// use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Gate;
use Symfony\Component\HttpFoundation\Response;

class StoreSessionRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('session_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'course_id'   => [
                'required',
                'integer'],
            'coach_id' => [
                'required',
                'integer'],
            'weekday'    => [
                'required',
                'integer',
                'min:1',
                'max:7'],
            'start_time' => [
                'required',
                new SessionTimeAvailabilityRule(),
                'date_format:' . config('panel.session_time_format')],
            'end_time'   => [
                'required',
                'after:start_time',
                'date_format:' . config('panel.session_time_format')],
        ];
    }
}
