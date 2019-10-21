<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\CourseCreditation;
use App\Models\CourseCreditationDetails;
use App\Models\Setting;

use Illuminate\Http\Request;

class CreditedCoursesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        $user = User::find($id);
        $schools = CourseCreditation::where('student_no', 'LIKE', $user->student->student_no)
                    ->paginate(8);

        $degree = Setting::where('name', 'LIKE', 'Degree')->first()->value;

        return view('credited_courses.index')
                ->with('user', $user)
                ->with('schools', $schools)
                ->with('degree', $degree);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        return view('credited_courses.create')->with('user_id', $id);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $id)
    {
        $this->validate($request, [
            'description' => 'required'
        ]);

        $user = User::find($id);

        // Add School
        $school = new CourseCreditation;
        $school->description = $request->input('description');
        $school->student_no = $user->student->student_no;
        $school->save();

        return redirect('/students/' . $id . '/credited_courses')->with('success', 'School Added');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id, $credit_id)
    {
        $user = User::find($id);
        $school = CourseCreditation::find($credit_id);

        $courses = CourseCreditationDetails::where('credit_id', $credit_id)
                        ->orderBy('acad_term_id')->get();

        $degree = Setting::where('name', 'LIKE', 'Degree')->first()->value;

        return view('credited_courses.show')
                ->with('user', $user)
                ->with('school', $school)
                ->with('courses', $courses)
                ->with('degree', $degree);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id, $credit_id)
    {
        $school = CourseCreditation::find($credit_id);

        return view('credited_courses.edit')
                ->with('user_id', $id)
                ->with('school', $school);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id, $credit_id)
    {
        $this->validate($request, [
            'description' => 'required'
        ]);

        $user = User::find($id);

        // Update School
        $school = CourseCreditation::find($credit_id);
        $school->description = $request->input('description');
        $school->student_no = $user->student->student_no;
        $school->save();

        return redirect('/students/' . $id . '/credited_courses')->with('success', 'School Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id, $credit_id)
    {
        $school = CourseCreditation::find($credit_id);

        $school->delete();

        return redirect('/students/' . $id . '/credited_courses')->with('success', 'School Removed');
    }
}
