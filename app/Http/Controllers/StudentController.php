<?php

namespace App\Http\Controllers;

use Hash;

use App\Models\User;
use App\Models\Student;
use App\Models\SClass;
use App\Models\Grade;
use App\Models\AcadTerm;
use App\Models\Curriculum;
use App\Models\CurriculumDetails;
use App\Models\Setting;

use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Storage;

class StudentController extends Controller
{
    private function getStudents($search, $is_active)
    {
        if( $search != null ) {
            $students = Student::join('users', 'users.id', '=', 'student.user_id')
                        ->where('is_active', $is_active)
                        ->where('date_graduated', '=', null)
                        ->where('is_paid', '=', true)
                        ->where(function($q) use ($search) {
                            $q->where('student_no', 'like', '%'.$search.'%')
                            ->orWhere('first_name', 'like', '%'.$search.'%')
                            ->orWhere('middle_name', 'like', '%'.$search.'%')
                            ->orWhere('last_name', 'like', '%'.$search.'%');
                        })
                        ->orderBy('users.last_name')
                        ->paginate(15);
            $students->appends(['search' => $search]);
        } else {
            $students = Student::join('users', 'users.id', '=', 'student.user_id')
                            ->where('is_paid', '=', true)
                            ->where('is_active', $is_active)
                            ->orderBy('users.last_name')
                            ->paginate(15);
        }

        return $students;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if ( request()->has('search') )
            $search = request('search');
        else
            $search = null;

        $students = $this->getStudents($search, true);

        return view('students.index')
                ->with('students', $students)
                ->with('search', $search);
    }

    public function archived()
    {
        if ( request()->has('search') )
            $search = request('search');
        else
            $search = null;

        $students = $this->getStudents($search, false);

        return view('students.archived')
                ->with('students', $students)
                ->with('search', $search);
    }

    public function setAsArchived($id)
    {
        $user = User::find($id);
        $user->is_active = false;
        $user->save();

        return redirect('/students')
                ->with('success', 'Student ' . $user->student->getStudentNo() . ' ' . $user->getName() . ' has been archived');
    }

    public function setAsUnarchived($id)
    {
        $user = User::find($id);
        $user->is_active = true;
        $user->save();

        return redirect('/archived/students')
                ->with('success', 'Student ' . $user->student->getStudentNo() . ' ' . $user->getName() . ' has been unarchived');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $curriculums = Curriculum::all();
        $acad_terms = AcadTerm::all();
        $cur_acad_term = Setting::where('name', 'LIKE', 'Current Acad Term')->first()->value;
        $cur_curriculum_id = Setting::where('name', 'LIKE', 'Current Curriculum')->first()->value;

        return view('students.create')
                    ->with('curriculums', $curriculums)
                    ->with('acad_terms', $acad_terms)
                    ->with('cur_acad_term', $cur_acad_term)
                    ->with('cur_curriculum_id', $cur_curriculum_id);
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
            'profile_picture' => 'nullable|mimes:jpeg,bmp,jpg,png|between:1, 3000',
            'student_no' => 'required|unique:student|min:9|max:10',
            'acad_term_admitted_id' => 'required|exists:acad_term,acad_term_id',
            'curriculum_id' => 'required|exists:curriculum',
            'student_type' => 'required',
            'first_name' => 'required|min:3|max:50',
            'middle_name' => 'nullable|min:3|max:50',
            'last_name' => 'required|min:3|max:50',
            'birthdate' => 'required|date',
            'contact_no' => 'nullable|min:6|max:11',
            'address' => 'nullable|min:6|max:100',
            'primary' => 'required|min:6|max:100',
            'primary_sy' => 'required|min:9|max:9',
            'intermediate' => 'required|min:6|max:100',
            'intermediate_sy' => 'required|min:9|max:9',
            'secondary' => 'required|min:6|max:100',
            'secondary_sy' => 'required|min:9|max:9',
        ]);

        // Handle File Upload
        if ($request->hasFile('profile_picture')) {
            // Get just ext
            $extension = $request->file('profile_picture')->getClientOriginalExtension();

            $filename = $request->input('student_no') . '.' . $extension;

            $request->file('profile_picture')
                        ->storeAs('/profile_pictures', $filename, "public");
        } else {
            $filename = 'default.png';
        }

        // Add Student
        // Default Credentials:
        // Username: Student No, Password: Birthdate
        $user = new User;
        $user->profile_picture = $filename;
        $user->first_name = $request->input('first_name');
        $user->middle_name = $request->input('middle_name');
        $user->last_name = $request->input('last_name');
        $user->gender = $request->input('gender');
        $user->birthdate = $request->input('birthdate');
        $user->contact_no = $request->input('contact_no');
        $user->address = $request->input('address');
        $user->username = $request->input('student_no');
        $user->email = $request->input('email');
        $user->password = Hash::make($request->input('birthdate'));
        $user->save();

        $user->assignRole('student');

        $student = new Student;
        $student->student_no = $request->input('student_no');
        $student->primary = $request->input('primary');
        $student->primary_sy = $request->input('primary_sy');
        $student->intermediate = $request->input('intermediate');
        $student->intermediate_sy = $request->input('intermediate_sy');
        $student->secondary = $request->input('secondary');
        $student->secondary_sy = $request->input('secondary_sy');
        $student->student_type = $request->input('student_type');
        $student->curriculum_id = $request->input('curriculum_id');
        $student->acad_term_admitted_id = $request->input('acad_term_admitted_id');
        $student->user_id = $user->id;
        $student->save();

        return redirect('/students/' . $user->id)
                ->with('success', 'Student ' . $student->getStudentNo() . ' Created. Default username is the Student No. with no dashes while the default password is the user\'s birthdate (YYYY-MM-DD).');
    }

    private function getEnlistment($student_no)
    {
        $cur_acad_term = Setting::where('name', 'LIKE', 'Current Acad Term')->first()->value;

        $grades = Grade::where('student_no', 'LIKE', $student_no)->get();

        $filtered_grades = [];

        foreach ($grades as $grade) {
            if($grade->sclass->acad_term_id == $cur_acad_term)
                array_push($filtered_grades, $grade);
        }

        return $filtered_grades;
    }

    private function getClassesByDay($student_no, $day)
    {
        $grades = $this->getEnlistment($student_no);

        return array_filter($grades, function ($grade) use ($day){
            return $grade->sclass->lec_day == $day || $grade->sclass->lab_day == $day;
        });
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::find($id);

        $degree = Setting::where('name', 'LIKE', 'Degree')->first()->value;

        $student_no = $user->student->student_no;

        $grades = $this->getEnlistment($student_no);

        $m_grades = $this->getClassesByDay($student_no, 'M');
        $t_grades = $this->getClassesByDay($student_no, 'T');
        $w_grades = $this->getClassesByDay($student_no, 'W');
        $th_grades = $this->getClassesByDay($student_no, 'TH');
        $f_grades = $this->getClassesByDay($student_no, 'F');

        return view('students.show')
                ->with('user', $user)
                ->with('grades', $grades)
                ->with('m_grades', $m_grades)
                ->with('t_grades', $t_grades)
                ->with('w_grades', $w_grades)
                ->with('th_grades', $th_grades)
                ->with('f_grades', $f_grades)
                ->with('degree', $degree);
    }

    public function grades($id)
    {
        $user = User::find($id);

        $cur_acad_term = Setting::where('name', 'LIKE', 'Current Acad Term')->first()->value;
        $curAcadTerm = AcadTerm::find($cur_acad_term);

        $degree = Setting::where('name', 'LIKE', 'Degree')->first()->value;
        $acad_terms = AcadTerm::where('acad_term_id', '<=', $cur_acad_term)->get();

        if( request()->has('select_acad_term') ) {
            $selected_acad_term = request('select_acad_term');
        }
        else {
            $selected_acad_term = $cur_acad_term;
        }

        // Filter Grades for the Acad Term
        $grades = Grade::where('student_no', 'LIKE', $user->student->student_no)->get();

        $filtered_grades = array();

        foreach ($grades as $grade) {
            if ($grade->sclass->acad_term_id == $selected_acad_term) {
                array_push($filtered_grades, $grade);
            }
        }

        return view('student.grades')
            ->with('user', $user)
            ->with('degree', $degree)
            ->with('grades', $filtered_grades)
            ->with('acad_terms', $acad_terms)
            ->with('curAcadTerm', $curAcadTerm)
            ->with('cur_acad_term', $cur_acad_term)
            ->with('selected_acad_term', $selected_acad_term);
    }

    private function getTotalUnits($grades)
    {
        $sum = 0;

        foreach ($grades as $grade) {
            $sum += $grade->sclass->course->units;
        }

        return $sum;
    }

    private function getGeneralAverage($grades)
    {
        $sum = 0;
        $count = 0;

        foreach ($grades as $grade) {
            if ( is_numeric($grade->getGrade()) && $grade->getGrade() != null && $grade->getGrade() > 0) {
                $sum += $grade->getGrade();
                $count++;
            }
        }

        if ($sum == 0)
            return null;

        $average = number_format($sum / $count, 2, '.', '');

        return $average;
    }

    public function showGradeSlip($id, $acad_term_id)
    {
        $user = User::find($id);
        $head_registrar = User::whereHas("roles", function($q){ $q->where('name', 'head registrar'); })->get();

        if($head_registrar != null)
            $head_registrar = $head_registrar[0];

        $acad_term = AcadTerm::find($acad_term_id);

        // Filter Grades for the Acad Term
        $grades = Grade::where('student_no', 'LIKE', $user->student->student_no)->get();

        $filtered_grades = array();

        foreach ($grades as $grade) {
            if ($grade->sclass->acad_term_id == $acad_term_id) {
                array_push($filtered_grades, $grade);
            }
        }

        $totalUnits = $this->getTotalUnits($filtered_grades);
        $generalAverage = $this->getGeneralAverage($filtered_grades);

        return view('reports.grade_slip')
                ->with('user', $user)
                ->with('acad_term', $acad_term)
                ->with('grades', $filtered_grades)
                ->with('totalUnits', $totalUnits)
                ->with('generalAverage', $generalAverage)
                ->with('head_registrar', $head_registrar);
    }

    public function showScholasticRecord($id, $acad_term_id)
    {
        $user = User::find($id);
        $head_registrar = User::whereHas("roles", function($q){ $q->where('name', 'head registrar'); })->get();

        if($head_registrar != null)
            $head_registrar = $head_registrar[0];

        $acad_term = AcadTerm::find($acad_term_id);

        $grades = Grade::where('student_no', 'LIKE', $user->student->student_no)->get();
        $classes = collect();

        foreach ($grades as $grade) {
            $classes->push($grade->sclass);
        }

        return view('reports.scholastic_record')
                ->with('user', $user)
                ->with('acad_term', $acad_term)
                ->with('classes', $classes)
                ->with('head_registrar', $head_registrar);

    }

    public function showCurriculumWithGrades($id)
    {
        $user = User::find($id);
        $head_registrar = User::whereHas("roles", function($q){ $q->where('name', 'head registrar'); })->get();

        if($head_registrar != null)
            $head_registrar = $head_registrar[0];

        $degree = Setting::where('name', 'LIKE', 'Degree')->first()->value;

        $curriculum_details = CurriculumDetails::where('curriculum_id', $user->student->curriculum_id)
                                ->orderBy('sy','asc')->orderBy('semester','asc')->get()->groupBy('sy');

        return view('reports.curriculum')
                ->with('user', $user)
                ->with('grades', $user->student->grades)
                ->with('curriculum_details', $curriculum_details)
                ->with('degree', $degree)
                ->with('head_registrar', $head_registrar);
    }

    public function showTOR($id)
    {
        $user = User::find($id);
        $head_registrar = User::whereHas("roles", function($q){ $q->where('name', 'head registrar'); })->get();

        if($head_registrar != null)
            $head_registrar = $head_registrar[0];

        $degree = Setting::where('name', 'LIKE', 'Degree')->first()->value;

        $grades = Grade::where('student_no', 'LIKE', $user->student->student_no)->get();
        $classes = collect();

        foreach ($grades as $grade) {
            $classes->push($grade->sclass);
        }

        return view('reports.tor')
                ->with('user', $user)
                ->with('classes', $classes)
                ->with('degree', $degree)
                ->with('head_registrar', $head_registrar);
    }

    public function enlistment($id)
    {
        $user = User::find($id);

        $cur_acad_term = Setting::where('name', 'LIKE', 'Current Acad Term')->first()->value;
        $curAcadTerm = AcadTerm::find($cur_acad_term);

        $degree = Setting::where('name', 'LIKE', 'Degree')->first()->value;
        $acad_terms = AcadTerm::where('acad_term_id', '<=', $cur_acad_term)->get();

        if( request()->has('select_acad_term') ) {
            $selected_acad_term = request('select_acad_term');
        }
        else {
            $selected_acad_term = $cur_acad_term;
        }

        // Filter Grades for the Acad Term
        $grades = Grade::where('student_no', 'LIKE', $user->student->student_no)->get();

        $filtered_grades = array();

        foreach ($grades as $grade) {
            if ($grade->sclass->acad_term_id == $selected_acad_term) {
                array_push($filtered_grades, $grade);
            }
        }

        return view('student.enlistment')
            ->with('user', $user)
            ->with('degree', $degree)
            ->with('grades', $filtered_grades)
            ->with('acad_terms', $acad_terms)
            ->with('curAcadTerm', $curAcadTerm)
            ->with('cur_acad_term', $cur_acad_term)
            ->with('selected_acad_term', $selected_acad_term);
    }

    public function enlist($id)
    {
        $user = User::find($id);

        $cur_acad_term = Setting::where('name', 'LIKE', 'Current Acad Term')->first()->value;

        $classes = SClass::where('acad_term_id', 'LIKE', $cur_acad_term)->paginate(10);

        return view('student.enlist')
                ->with('user', $user)
                ->with('classes', $classes);
    }

    public function enlistClass(Request $request)
    {
        $this->validate($request, [
            'class_id' => 'required',
            'student_no' => 'required',
            'curriculum_details_id' => 'required'
        ]);

        // Add Grade
        $grade = new Grade;
        $grade->class_id = $request->input('class_id');
        $grade->student_no = $request->input('student_no');
        $grade->curriculum_details_id = $request->input('curriculum_details_id');
        $grade->save();

        $class_name = $grade->sclass->getCourse();

        return redirect('/students/' . $grade->student->user->id . '/enlistment')->with('success', $class_name . ' Enlisted');
    }

    public function dropClass($id)
    {
        $grade = Grade::find($id);
        $user_id = $grade->student->user->id;
        $class_name = $grade->sclass->getCourse();

        $grade->delete();

        return redirect('/students/' . $user_id . '/enlistment')->with('success', $class_name . ' Dropped');
    }

    public function curriculum($id)
    {
        $user = User::find($id);

        $curriculum = Curriculum::find($user->student->curriculum_id);

        $curriculum_details = CurriculumDetails::where('curriculum_id', $user->student->curriculum_id)
                                ->orderBy('sy','asc')->orderBy('semester','asc')->get()->groupBy('sy');

        $degree = Setting::where('name', 'LIKE', 'Degree')->first()->value;

        return view('student.curriculum')
                ->with('user', $user)
                ->with('grades', $user->student->grades)
                ->with('curriculum', $curriculum)
                ->with('curriculum_details', $curriculum_details)
                ->with('degree', $degree);
    }

    public function unpaidStudents()
    {
        $search = null;

        if( request()->has('search')) {
            $search = request('search');
            $students = Student::join('users', 'users.id', '=', 'student.user_id')
                        ->where('is_paid', '=', false)
                        ->where(function($q) use ($search) {
                            $q->where('student_no', 'like', '%'.$search.'%')
                            ->orWhere('first_name', 'like', '%'.$search.'%')
                            ->orWhere('middle_name', 'like', '%'.$search.'%')
                            ->orWhere('last_name', 'like', '%'.$search.'%');
                        })
                        ->orderBy('users.last_name')
                        ->paginate(15);
            $students->appends(['search' => $search]);
        } else {
            $students = Student::join('users', 'users.id', '=', 'student.user_id')
                            ->where('is_paid', '=', false)
                            ->orderBy('users.last_name')
                            ->paginate(15);
        }

        return view('students.unpaid')
                ->with('students', $students)
                ->with('search', $search);
    }

    public function setAsPaidStudent($id)
    {
        $user = User::find($id);

        $student = Student::find($user->student->student_no);
        $student->is_paid = true;
        $student->save();

        return redirect('unpaid/students')
                ->with('success', $student->getStudentNo() . ' '. $user->getName() . ' has been set as paid');
    }

    public function setAsUnpaidStudent($id)
    {
        $user = User::find($id);

        $student = Student::find($user->student->student_no);
        $student->is_paid = false;
        $student->save();

        return redirect('students')
                ->with('success', $student->getStudentNo() . ' '. $user->getName() . ' has been set as unpaid');
    }

    public function graduateStudents()
    {
        $search = null;

        if( request()->has('search')) {
            $search = request('search');
            $students = Student::join('users', 'users.id', '=', 'student.user_id')
                        ->where('date_graduated', '<>', null)
                        ->where(function($q) use ($search) {
                            $q->where('student_no', 'like', '%'.$search.'%')
                            ->orWhere('first_name', 'like', '%'.$search.'%')
                            ->orWhere('middle_name', 'like', '%'.$search.'%')
                            ->orWhere('last_name', 'like', '%'.$search.'%');
                        })
                        ->orderBy('users.last_name')
                        ->paginate(15);
            $students->appends(['search' => $search]);
        } else {
            $students = Student::join('users', 'users.id', '=', 'student.user_id')
                            ->where('date_graduated', '<>', null)
                            ->orderBy('users.last_name')
                            ->paginate(15);
        }

        return view('students.graduate')
                ->with('students', $students)
                ->with('search', $search);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::find($id);
        $curriculums = Curriculum::all();
        $acad_terms = AcadTerm::all();

        return view('students.edit')
                    ->with('user', $user)
                    ->with('curriculums', $curriculums)
                    ->with('acad_terms', $acad_terms);
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
            'profile_picture' => 'nullable|mimes:jpeg,bmp,jpg,png|between:1, 3000',
            'student_no' => 'required|min:9|max:10',
            'acad_term_admitted_id' => 'required|exists:acad_term,acad_term_id',
            'curriculum_id' => 'required|exists:curriculum',
            'student_type' => 'required',
            'first_name' => 'required|min:3|max:50',
            'middle_name' => 'nullable|min:3|max:50',
            'last_name' => 'required|min:3|max:50',
            'birthdate' => 'required|date',
            'contact_no' => 'nullable|min:6|max:11',
            'address' => 'nullable|min:6|max:100',
            'primary' => 'required|min:6|max:100',
            'primary_sy' => 'required|min:9|max:9',
            'intermediate' => 'required|min:6|max:100',
            'intermediate_sy' => 'required|min:9|max:9',
            'secondary' => 'required|min:6|max:100',
            'secondary_sy' => 'required|min:9|max:9',
            'date_graduated' => 'nullable|date',
            'email' => 'nullable',
            'password' => 'nullable|confirmed|min:4',
        ]);

        // Handle File Upload
        if ($request->hasFile('profile_picture')) {
            // Get just ext
            $extension = $request->file('profile_picture')->getClientOriginalExtension();

            $filename = $request->input('student_no') . '.' . $extension;

            $request->file('profile_picture')
                        ->storeAs('/profile_pictures', $filename, "public");
        }

        // Update Student
        $user = User::find($id);

        if ($request->hasFile('profile_picture')) {
            $user->profile_picture = $filename;
        }

        $user->first_name = $request->input('first_name');
        $user->middle_name = $request->input('middle_name');
        $user->last_name = $request->input('last_name');
        $user->gender = $request->input('gender');
        $user->birthdate = $request->input('birthdate');
        $user->contact_no = $request->input('contact_no');
        $user->address = $request->input('address');
        $user->username = $request->input('username');
        $user->email = $request->input('email');

        if($request->input('password') != null) {
            $user->password = Hash::make($request->input('password'));
        }

        $user->save();

        $student_no = $user->student->student_no;

        $student = Student::find($student_no);
        $student->student_no = $request->input('student_no');
        $student->primary = $request->input('primary');
        $student->primary_sy = $request->input('primary_sy');
        $student->intermediate = $request->input('intermediate');
        $student->intermediate_sy = $request->input('intermediate_sy');
        $student->secondary = $request->input('secondary');
        $student->secondary_sy = $request->input('secondary_sy');
        $student->student_type = $request->input('student_type');
        $student->date_graduated = $request->input('date_graduated');
        $student->curriculum_id = $request->input('curriculum_id');
        $student->acad_term_admitted_id = $request->input('acad_term_admitted_id');
        $student->save();

        return redirect('/students/' . $user->id)
                ->with('success', 'Student ' . $student->getStudentNo() . ' Updated.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::find($id);

        Storage::disk('public')->delete('profile_pictures/'. $user->profile_picture);

        $student_no =  $user->student->getStudentNo();

        $user->delete();

        return redirect('/students')->with('success', 'Student ' . $student_no .' Deleted');
    }
}
