<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Course;

class DropdownController extends Controller
{

    public function index()
    {
        $courses = Course::where('parent_id',0)->get();
        return view('dropdown',compact('courses'));
    }

    public function data(Request $request){

        if($request->has('course_id')){
            $parentId = $request->get('course_id');
            $data = Course::where('parent_id',$parentId)->get();
            return ['success'=>true,'data'=>$data];
        }

    }

}
