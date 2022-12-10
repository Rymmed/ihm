<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Package;
use App\Http\Controllers\Controller;
use App\Http\Requests\StorePackageRequest;
use App\Http\Requests\UpdatePackageRequest;
use App\Http\Resources\Admin\PackageResource;
use Illuminate\Support\Facades\Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class PackagesApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('package_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new PackageResource(Package::with(['courses'])->get());
    }

    public function store(StorePackageRequest $request)
    {
        $package = Package::create($request->all());
        $package->courses()->sync($request->input('courses', []));

        return (new PackageResource($package))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(Package $package)
    {
        abort_if(Gate::denies('package_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new PackageResource($package->load(['courses']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Package  $package
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePackageRequest $request, Package $package)
    {
        $package->update($request->all());
        $package->courses()->sync($request->input('courses', []));

        return (new PackageResource($package))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(Package $package)
    {
        abort_if(Gate::denies('package_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $package->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
