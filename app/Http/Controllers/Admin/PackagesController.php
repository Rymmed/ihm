<?php

namespace App\Http\Controllers\Admin;

use App\Course;
use App\Package;
use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyPackageRequest;
use App\Http\Requests\StorePackageRequest;
use App\Http\Requests\UpdatePackageRequest;
use Illuminate\Support\Facades\Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class PackagesController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('package_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $packages = Package::all();

        return view('admin.packages.index', compact('packages'));
    }

    public function create()
    {
        abort_if(Gate::denies('package_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        
        $courses = Course::all()->pluck('name', 'id');

        return view('admin.packages.create', compact('courses'));
    }

    public function store(StorePackageRequest $request)
    {
        $package = Package::create($request->all());

        $package->courses()->sync($request->input('courses', []));

        return redirect()->route('admin.packages.index');
    }

    public function show(Package $package)
    {
        abort_if(Gate::denies('package_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $package->load('courses', 'packageMembers');

        return view('admin.packages.show', compact('package'));
    }

    public function edit(Package $package)
    {
        abort_if(Gate::denies('package_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $courses = Course::all()->pluck('name', 'id');

        $package->load('courses');

        return view('admin.packages.edit', compact('courses', 'package'));
    }

    public function update(UpdatePackageRequest $request, Package $package)
    {
        $package->update($request->all());

        $package->courses()->sync($request->input('courses', []));

        return redirect()->route('admin.packages.index');
    }

    public function destroy(Package $package)
    {
        abort_if(Gate::denies('package_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $package->delete();

        return back();
    }

    public function massDestroy(MassDestroyPackageRequest $request)
    {
        Package::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
