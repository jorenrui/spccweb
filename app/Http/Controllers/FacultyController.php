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
    private function getFaculties($search, $is_active)
    {
        if( $search != null ) {
            $faculties = User::join('employee', 'users.id', '=', 'employee.user_id')
                        ->where('is_active', $is_active)
                        ->whereHas("roles", function($q){
                            $q->where('name', 'faculty');
                        })
                        ->where(function($q) use ($search) {
                            $q->where('employee_no', 'like', '%'.$search.'%')
                            ->orWhere('first_name', 'like', '%'.$search.'%')
                            ->orWhere('middle_name', 'like', '%'.$search.'%')
                            ->orWhere('last_name', 'like', '%'.$search.'%');
                        })
                        ->orderBy('last_name')
                        ->paginate(15);
            $faculties->appends(['search' => $search]);
        } else {
            $faculties = User::join('employee', 'users.id', '=', 'employee.user_id')
                        ->where('is_active', $is_active)
                        ->whereHas("roles", function($q){
                            $q->where('name', 'faculty');
                        })
                        ->orderBy('last_name')
                        ->paginate(15);
        }

        return $faculties;
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

        $faculties = $this->getFaculties($search, true);

        return view('faculties.index')
                ->with('faculties', $faculties)
                ->with('search', $search);
    }

    public function archived()
    {
        if ( request()->has('search') )
            $search = request('search');
        else
            $search = null;

        $faculties = $this->getFaculties($search, false);

        return view('faculties.archived')
                ->with('faculties', $faculties)
                ->with('search', $search);
    }

    public function setAsArchived($id)
    {
        $user = User::find($id);
        $user->is_active = false;
        $user->save();

        return redirect('/faculties')
                ->with('success', 'Employee ' . $user->employee->getEmployeeNo() . ' ' . $user->getName() . ' has been archived');
    }

    public function setAsUnarchived($id)
    {
        $user = User::find($id);
        $user->is_active = true;
        $user->save();

        return redirect('/archived/faculties')
                ->with('success', 'Employee ' . $user->employee->getEmployeeNo() . ' ' . $user->getName() . ' has been unarchived');
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
            'employee_no' => 'required|unique:employee|min:4|max:5',
            'date_employed' => 'required|date',
            'first_name' => 'required|min:3|max:50',
            'middle_name' => 'nullable|min:3|max:50',
            'last_name' => 'required|min:3|max:50',
            'birthdate' => 'required|date',
            'contact_no' => 'nullable|min:6|max:11',
            'address' => 'nullable|min:6|max:100',
            'email' => 'nullable|unique:users',
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

        // Add Employee
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

        $employee = new Employee;
        $employee->employee_no = $request->input('employee_no');
        $employee->date_employed = $request->input('date_employed');
        $employee->user_id = $user->id;
        $employee->save();

        return redirect('/faculties/' . $user->id)
                ->with('success', 'Employee ' . $employee->getEmployeeNo() . ' Created. Default username is the Employee No. with no dashes while the default password is the user\'s birthdate (YYYY-MM-DD).');
    }

    private function getClassesByDay($classes, $day)
    {
        $filtered_classes = collect([]);

        foreach ($classes as $sclass) {

            if ($sclass->lec_day == $day || $sclass->getLabDay() == $day) {

                if ($sclass->lec_day == $day) {

                    $new_class = array(
                        'time_start' => $sclass->lec_time_start,
                        'time_end' => $sclass->lec_time_end,
                        'time' => $sclass->getLecTime(),
                        'course' => $sclass->getCourse() . ' (LEC)',
                        'credits' => $sclass->course->getCredits(),
                        'room' => $sclass->room == null ? '-' : $sclass->room,
                        'total_students' => $sclass->getTotalStudents()
                    );

                    $filtered_classes->push($new_class);

                }

                if ($sclass->getLabDay() == $day) {

                    $new_class = array(
                        'time_start' => $sclass->lab_time_start,
                        'time_end' => $sclass->lab_time_end,
                        'time' => $sclass->getLabTime(),
                        'course' => $sclass->getCourse() . ' (LAB)',
                        'credits' => $sclass->course->getCredits(),
                        'room' => $sclass->room == null ? '-' : $sclass->room,
                        'total_students' => $sclass->getTotalStudents()
                    );

                    $filtered_classes->push($new_class);
                }

            }
        }

        $sorted = $filtered_classes->sortBy('time_start');

        return $sorted->values()->all();
    }

    private function getFacultyLoad($employee_no)
    {
        $cur_acad_term = Setting::where('name', 'LIKE', 'Current Acad Term')->first()->value;

        $load = SClass::where('acad_term_id', 'LIKE', $cur_acad_term)
                    ->where('instructor_id', 'LIKE', $employee_no)
                    ->get();

        return $load;
    }

    private function getClasses($load)
    {
        $classes = collect();

        $sclass = $this->getClassesByDay($load, 'M');
        $classes->push([ 'day' => 'Monday', 'classes' => $sclass]);
        $sclass = $this->getClassesByDay($load, 'T');
        $classes->push([ 'day' => 'Tuesday', 'classes' => $sclass]);
        $sclass = $this->getClassesByDay($load, 'W');
        $classes->push([ 'day' => 'Wednesday', 'classes' => $sclass]);
        $sclass = $this->getClassesByDay($load, 'TH');
        $classes->push([ 'day' => 'Thursday', 'classes' => $sclass]);
        $sclass = $this->getClassesByDay($load, 'F');
        $classes->push([ 'day' => 'Friday', 'classes' => $sclass]);

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

        $degree = Setting::where('name', 'LIKE', 'Degree')->first()->value;

        $employee_no = $user->employee->employee_no;

        $load = $this->getFacultyLoad($employee_no);
        $classes = $this->getClasses($load);

        return view('faculties.show')
                ->with('user', $user)
                ->with('classes', $classes)
                ->with('total_classes', count($load))
                ->with('degree', $degree);
    }

    public function load($id)
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
        $cur_acad_term = Setting::where('name', 'LIKE', 'Current Acad Term')->first()->value;

        $degree = Setting::where('name', 'LIKE', 'Degree')->first()->value;

        return view('faculty.show')
                ->with('sclass', $sclass)
                ->with('grades', $grades)
                ->with('acad_term', $sclass->acadTerm)
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
            'employee_no' => 'required|min:4|max:5',
            'date_employed' => 'required|date',
            'first_name' => 'required|min:3|max:50',
            'middle_name' => 'nullable|min:3|max:50',
            'last_name' => 'required|min:3|max:50',
            'birthdate' => 'required|date',
            'contact_no' => 'nullable|min:6|max:11',
            'address' => 'nullable|min:6|max:100',
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

        // Update Employee
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
        $user->username = $request->input('username');
        $user->email = $request->input('email');

        if($request->input('password') != null) {
            $user->password = Hash::make($request->input('password'));
        }

        $user->save();

        $employee_no = $user->employee->employee_no;

        $employee = Employee::find($employee_no);
        $employee->employee_no = $request->input('employee_no');
        $employee->date_employed = $request->input('date_employed');
        $employee->save();

        return redirect('/faculties/' . $user->id)
                ->with('success', 'Employee ' . $employee->getEmployeeNo() . ' Updated.');
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

        $employee_no =  $user->employee->getEmployeeNo();

        $user->delete();

        return redirect('/faculties')->with('success', 'Employee' . $employee_no . ' Deleted');
    }
}
