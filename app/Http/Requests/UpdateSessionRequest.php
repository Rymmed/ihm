<?php

namespace App\Http\Requests;

use App\Session;
use App\Rules\SessionTimeAvailabilityRule;
// use Gate;
use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class UpdateSessionRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('session_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

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
                new SessionTimeAvailabilityRule($this->route('session')->id),
                'date_format:' . config('panel.session_time_format')],
            'end_time'   => [
                'required',
                'after:start_time',
                'date_format:' . config('panel.session_time_format')],
        ];
    }
}
