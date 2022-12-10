<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroySessionRequest;
use App\Http\Requests\StoreSessionRequest;
use App\Http\Requests\UpdateSessionRequest;
use App\Session;
use App\Course;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Gate;
use Symfony\Component\HttpFoundation\Response;

class SessionsController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('session_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $sessions = Session::all();

        return view('admin.sessions.index', compact('sessions'));
    }

    public function create()
    {
        abort_if(Gate::denies('session_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $courses = Course::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $coaches = User::join('role_user', 'users.id', '=', 'role_user.user_id')
                    ->where('role_user.role_id', '=', '3')
                    
                    ->pluck('name', 'users.id')
                    ->prepend(trans('global.pleaseSelect'), '');

        return view('admin.sessions.create', compact('courses', 'coaches'));
    }

    

    public function store(StoreSessionRequest $request)
    {
        $session = Session::create($request->all());

        return redirect()->route('admin.sessions.index');
    }

    public function edit(Session $session)
    {
        abort_if(Gate::denies('session_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $courses = Course::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $coaches = User::join('role_user', 'users.id', '=', 'role_user.user_id')
                    ->where('role_user.role_id', '=', '3')
                    ->pluck('name', 'users.id')
                    ->prepend(trans('global.pleaseSelect'), '');

        $session->load('course', 'coach');

        return view('admin.sessions.edit', compact('courses', 'coaches', 'session'));
    }

    public function update(UpdateSessionRequest $request, Session $session)
    {
        $session->update($request->all());

        return redirect()->route('admin.sessions.index');
    }

    public function show(Session $session)
    {
        abort_if(Gate::denies('session_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $session->load('course', 'coach');

        return view('admin.sessions.show', compact('session'));
    }

    public function destroy(Session $session)
    {
        abort_if(Gate::denies('session_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $session->delete();

        return back();
    }

    public function massDestroy(MassDestroySessionRequest $request)
    {
        Session::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
