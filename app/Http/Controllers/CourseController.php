<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Setting;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CourseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $degree = Setting::where('name', 'LIKE', 'Degree')->first()->value;

        $search = null;

        if( request()->has('search')) {
            $search = request('search');
            $courses = Course::where('course_code', 'like', '%'.$search.'%')
                        ->orWhere('description', 'like', '%'.$search.'%')
                        ->orderBy('course_code')
                        ->paginate(15);
            $courses->appends(['search' => $search]);
        } else {
            $courses = Course::orderBy('course_code')->paginate(15);
        }

        return view('courses.index')
                ->with('courses', $courses)
                ->with('degree', $degree)
                ->with('search', $search);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('courses.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'course_code' => 'required',
            'description' => 'required',
            'units' => 'required'
        ]);

        // Add Course
        $course = new Course;
        $course->course_code = $request->input('course_code');
        $course->description = $request->input('description');
        $course->units = $request->input('units');
        $course->lab_units = $request->input('lab_units');
        $course->save();

        return redirect('/courses')->with('success', 'Course Created');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $course = Course::find($id);

        return view('courses.edit')->with('course', $course);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'course_code' => 'required',
            'description' => 'required',
            'units' => 'required'
        ]);

        // Update Course
        $course = Course::find($id);
        $course->course_code = $request->input('course_code');
        $course->description = $request->input('description');
        $course->units = $request->input('units');
        $course->lab_units = $request->input('lab_units');
        $course->save();

        return redirect('/courses')->with('success', 'Course Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $course = Course::find($id);

        $course->delete();

        return redirect('/courses')->with('success', 'Course Removed');
    }
}
