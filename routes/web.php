<?php

use App\Http\Controllers\Admin\SessionsController;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Route;
use Symfony\Component\Console\Input\Input;

Route::get('/', function () {
    return view('/welcome');
});
Route::redirect('/login', '/login');
Route::get('/home', function () {
    $routeName = auth()->user() && (auth()->user()->is_member || auth()->user()->is_coach) ? 'admin.calendar.index' : 'admin.home'; 
    if (session('status')) {
        return redirect()->route($routeName)->with('status', session('status'));
    }

    return redirect()->route($routeName);
});



Auth::routes(['register' => true]);
// Admin

Route::group(['prefix' => 'admin', 'as' => 'admin.', 'namespace' => 'Admin', 'middleware' => ['auth']], function () {
    Route::get('/', 'HomeController@index')->name('home');
    // Permissions
    Route::delete('permissions/destroy', 'PermissionsController@massDestroy')->name('permissions.massDestroy');
    Route::resource('permissions', 'PermissionsController');
    
    // Roles
    Route::delete('roles/destroy', 'RolesController@massDestroy')->name('roles.massDestroy');
    Route::resource('roles', 'RolesController');
    
    // Users
    Route::delete('users/destroy', 'UsersController@massDestroy')->name('users.massDestroy');
    Route::resource('users', 'UsersController');
    
    // Sessions
    Route::delete('sessions/destroy', 'SessionsController@massDestroy')->name('sessions.massDestroy');
    Route::resource('sessions', 'SessionsController');

    // Courses
    Route::delete('courses/destroy', 'CoursesController@massDestroy')->name('courses.massDestroy');
    Route::resource('courses', 'CoursesController');

    // Packages
    Route::delete('packages/destroy', 'PackagesController@massDestroy')->name('packages.massDestroy');
    Route::resource('packages', 'PackagesController');

    // Subscriptions
    Route::delete('subcriptions/destroy', 'SubscriptionsController@massDestroy')->name('subscriptions.massDestroy');
    Route::resource('subscriptions', 'SubscriptionsController');

    Route::get('calendar', 'CalendarController@index')->name('calendar.index');
});