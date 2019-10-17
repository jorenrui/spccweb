<?php

namespace App\Http\Controllers;

use Hash;

use App\Models\User;
use App\Models\Employee;
use App\Models\SClass;
use App\Models\Grade;
use App\Models\AcadTerm;
use App\Models\Setting;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class FacultyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $faculties = User::whereHas("roles", function($q){ $q->where('name', 'faculty'); })->paginate(8);

        return view('faculties.index')->with('faculties', $faculties);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('faculties.create');
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
            'employee_no' => 'required',
            'date_employed' => 'required',
            'first_name' => 'required',
            'last_name' => 'required',
            'birthdate' => 'required',
            'address' => 'required'
        ]);

        // Handle File Upload
        if ($request->hasFile('profile_picture')) {
            // Get just ext
            $extension = $request->file('profile_picture')->getClientOriginalExtension();

            $filename = $request->input('employee_no') . '.' . $extension;

            $request->file('profile_picture')
                        ->storeAs('/profile_pictures', $filename, "public");
        } else {
            $filename = 'default.png';
        }

        // Add Faculty
        // Default Credentials:
        // Username: Employee No, Password: Birthdate
        $user = new User;
        $user->profile_picture = $filename;
        $user->first_name = $request->input('first_name');
        $user->middle_name = $request->input('middle_name');
        $user->last_name = $request->input('last_name');
        $user->gender = $request->input('gender');
        $user->birthdate = $request->input('birthdate');
        $user->contact_no = $request->input('contact_no');
        $user->address = $request->input('address');
        $user->username = $request->input('employee_no');
        $user->email = $request->input('email');
        $user->password = Hash::make($request->input('birthdate'));
        $user->save();

        $user->assignRole('faculty');

        $faculty = new Employee;
        $faculty->employee_no = $request->input('employee_no');
        $faculty->date_employed = $request->input('date_employed');
        $faculty->user_id = $user->id;
        $faculty->save();

        return redirect('/faculties/' . $user->id)->with('success', 'Faculty Created. Default username is the Employee No. while the default password is the user\'s birthdate.');
    }

    private function getClassesByDay($employee_no, $day)
    {
        $cur_acad_term = Setting::where('name', 'LIKE', 'Current Acad Term')->get()[0]->value;

        $classes = SClass::where('acad_term_id', 'LIKE', $cur_acad_term)
                            ->where('instructor_id', 'LIKE', $employee_no)
                            ->where('day', 'LIKE', $day)
                            ->get();

        return $classes;
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

        $degree = Setting::where('name', 'LIKE', 'Degree')->get()[0]->value;

        $employee_no = $user->employee->employee_no;

        $m_class = $this->getClassesByDay($employee_no, 'M');
        $t_class = $this->getClassesByDay($employee_no, 'T');
        $w_class = $this->getClassesByDay($employee_no, 'W');
        $th_class = $this->getClassesByDay($employee_no, 'TH');
        $f_class = $this->getClassesByDay($employee_no, 'F');

        $totalClasses = count($m_class) + count($t_class) +count($w_class) +
                        count($th_class) + count($f_class);

        return view('faculties.show')
                ->with('user', $user)
                ->with('totalClasses', $totalClasses)
                ->with('m_class', $m_class)
                ->with('t_class', $t_class)
                ->with('w_class', $w_class)
                ->with('th_class', $th_class)
                ->with('f_class', $f_class)
                ->with('degree', $degree);
    }

    public function load($id)
    {
        $user = User::find($id);

        $cur_acad_term = Setting::where('name', 'LIKE', 'Current Acad Term')->get()[0]->value;
        $curAcadTerm = AcadTerm::find($cur_acad_term);

        $degree = Setting::where('name', 'LIKE', 'Degree')->get()[0]->value;
        $acad_terms = AcadTerm::where('acad_term_id', '<=', $cur_acad_term)->get();

        if( request()->has('select_acad_term') ) {
            $selected_acad_term = request('select_acad_term');
        }
        else {
            $selected_acad_term = $cur_acad_term;
        }

        $classes = SClass::where('acad_term_id', 'LIKE', $selected_acad_term)
                            ->where('instructor_id', 'LIKE', $user->employee->employee_no)
                            ->paginate(10);

        return view('faculty.load')
            ->with('degree', $degree)
            ->with('user', $user)
            ->with('classes', $classes)
            ->with('acad_terms', $acad_terms)
            ->with('curAcadTerm', $curAcadTerm)
            ->with('cur_acad_term', $cur_acad_term)
            ->with('selected_acad_term', $selected_acad_term);
    }

    public function classGrades($id, $class_id)
    {
        $sclass = SClass::find($class_id);
        $grades = Grade::where('class_id', 'LIKE', $class_id)->orderBy('student_no')->paginate(8);
        $cur_acad_term = Setting::where('name', 'LIKE', 'Current Acad Term')->get()[0]->value;

        $degree = Setting::where('name', 'LIKE', 'Degree')->get()[0]->value;

        return view('faculty.show')
                ->with('sclass', $sclass)
                ->with('grades', $grades)
                ->with('degree', $degree)
                ->with('cur_acad_term', $cur_acad_term);
    }

    public function encodeGrades($id, $class_id)
    {
        $sclass = SClass::find($class_id);
        $grades = Grade::where('class_id', 'LIKE', $class_id)->orderBy('student_no')->get();

        return view('faculty.encode')
                ->with('sclass', $sclass)
                ->with('grades', $grades);
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

        return view('faculties.edit')->with('user', $user);
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
            'employee_no' => 'required',
            'date_employed' => 'required',
            'first_name' => 'required',
            'last_name' => 'required',
            'birthdate' => 'required',
            'address' => 'required'
        ]);

        // Handle File Upload
        if ($request->hasFile('profile_picture')) {
            // Get just ext
            $extension = $request->file('profile_picture')->getClientOriginalExtension();

            $filename = $request->input('employee_no') . '.' . $extension;

            $request->file('profile_picture')
                        ->storeAs('/profile_pictures', $filename, "public");
        }

        // Update Faculty
        // Default Credentials:
        // Username: Employee No, Password: Birthdate
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
        $user->username = $request->input('employee_no');
        $user->email = $request->input('email');
        $user->password = Hash::make($request->input('birthdate'));
        $user->save();

        $employee_no = $user->employee->employee_no;

        $faculty = Employee::find($employee_no);
        $faculty->date_employed = $request->input('date_employed');
        $faculty->save();

        return redirect('/faculties/' . $user->id)->with('success', 'Faculty Updated');
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

        $user->delete();

        return redirect('/faculties')->with('success', 'Faculty Deleted');
    }
}
