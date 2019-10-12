<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\CourseCreditation;
use App\Models\CourseCreditationDetails;
use App\Models\AcadTerm;

use Illuminate\Http\Request;

class CreditedCoursesDetailsController extends Controller
{
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id, $credit_id)
    {
        $user = User::find($id);
        $school = CourseCreditation::find($credit_id);
        $acad_terms = AcadTerm::all();
        $curriculum_details = $user->student->curriculum->curriculumDetails;

        return view('credited_course_details.create')
                ->with('user', $user)
                ->with('school', $school)
                ->with('acad_terms', $acad_terms)
                ->with('curriculum_details', $curriculum_details);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $id, $credit_id)
    {
        $this->validate($request, [
            'acad_term_id' => 'required',
            'course_code' => 'required',
            'description' => 'required',
            'units' => 'required',
            'grade' => 'required'
        ]);

        // Credit Course
        $course = new CourseCreditationDetails;
        $course->credit_id = $credit_id;
        $course->acad_term_id = $request->input('acad_term_id');
        $course->course_code = $request->input('course_code');
        $course->description = $request->input('description');
        $course->units = $request->input('units');
        $course->grade = $request->input('grade');

        if($request->input('is_inc') == 'on') {
            $course->is_inc = true;
        }
        else {
            $course->is_inc = false;
        }

        $course->curriculum_details_id = $request->input('curriculum_details_id');
        $course->save();

        return redirect('/students/' . $id . '/credited_courses/' . $credit_id)->with('success', 'Course Credited');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id, $credit_id, $credit_details_id)
    {
        $user = User::find($id);
        $school = CourseCreditation::find($credit_id);
        $course = CourseCreditationDetails::find($credit_details_id);
        $acad_terms = AcadTerm::all();
        $curriculum_details = $user->student->curriculum->curriculumDetails;

        return view('credited_course_details.edit')
                ->with('user', $user)
                ->with('school', $school)
                ->with('course', $course)
                ->with('acad_terms', $acad_terms)
                ->with('curriculum_details', $curriculum_details);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id, $credit_id, $credit_details_id)
    {
        $this->validate($request, [
            'acad_term_id' => 'required',
            'course_code' => 'required',
            'description' => 'required',
            'units' => 'required',
            'grade' => 'required'
        ]);

        // Update Credited Course
        $course = CourseCreditationDetails::find($credit_details_id);
        $course->credit_id = $credit_id;
        $course->acad_term_id = $request->input('acad_term_id');
        $course->course_code = $request->input('course_code');
        $course->description = $request->input('description');
        $course->units = $request->input('units');
        $course->grade = $request->input('grade');

        if($request->input('is_inc') == 'on') {
            $course->is_inc = true;
        }
        else {
            $course->is_inc = false;
        }

        $course->curriculum_details_id = $request->input('curriculum_details_id');
        $course->save();

        return redirect('/students/' . $id . '/credited_courses/' . $credit_id)->with('success', 'Credited Course Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id, $credit_id, $credit_details_id)
    {
        $course = CourseCreditationDetails::find($credit_details_id);

        $course->delete();

        return redirect('/students/' . $id . '/credited_courses/' . $credit_id)->with('success', 'Credited Course Removed');
    }
}
