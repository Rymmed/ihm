<?php

namespace App\Http\Controllers\Admin;

use App\Subscription;
use Illuminate\Support\Facades\Gate;
use Symfony\Component\HttpFoundation\Response;
use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroySubscriptionRequest;
use App\Http\Requests\StoreSubscriptionRequest;
use App\Http\Requests\UpdateSubscriptionRequest;
use App\Package;
use App\User;
use Carbon\Carbon;

class SubscriptionsController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('subscription_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $subscriptions = Subscription::all();

        return view('admin.subscriptions.index', compact('subscriptions'));
    }

    public function create()
    {
        abort_if(Gate::denies('subscription_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $packages = Package::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $members = User::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'));
        
        return view('admin.subscriptions.create', compact('packages', 'members'));        
    }

    public function subscribe()
    {
        abort_if(Gate::denies('subscribe'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        

        return view('welcome');
    }

    public function store(StoreSubscriptionRequest $request)
    {
        $subscription = Subscription::create($request->all());

        return redirect()->route('admin.subscriptions.index');
    }
 
    public function edit(Subscription $subscription)
    {
        abort_if(Gate::denies('subscription_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $packages = Package::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $members = User::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'));

        $subscription->load('package', 'member');

        return view('admin.subscriptions.edit', compact('packages', 'members', 'subscription'));
    }
    
    public function update(UpdateSubscriptionRequest $request, Subscription $subscription)
    {
        $subscription->update($request->all());

        return redirect()->route('admin.subscriptions.index');
    }
    
    public function show(Subscription $subscription)
    {
        abort_if(Gate::denies('subscription_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $subscription->load('member', 'package');

        return view('admin.subscriptions.show', compact('subscription'));
    }

    public function destroy(Subscription $subscription)
    {
        abort_if(Gate::denies('subscription_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $subscription->delete();

        return back();
    }

    public function massDestroy(MassDestroySubscriptionRequest $request)
    {
        Subscription::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
