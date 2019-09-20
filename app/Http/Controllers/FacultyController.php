<?php

namespace App\Http\Controllers;

use Hash;

use App\Models\User;
use App\Models\Employee;
use App\Models\SClass;
use App\Models\Setting;

use Illuminate\Http\Request;

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
            'employee_no' => 'required',
            'date_employed' => 'required',
            'first_name' => 'required',
            'last_name' => 'required',
            'gender' => 'required',
            'birthdate' => 'required',
            'address' => 'required'
        ]);

        // Add Faculty
        // Default Credentials:
        // Username: Employee No, Password: Birthdate
        $user = new User;
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

        return redirect('/faculties')->with('success', 'Faculty Created. Default username is the Employee No. while the default password is the user\'s birthdate.');
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
            'employee_no' => 'required',
            'date_employed' => 'required',
            'first_name' => 'required',
            'last_name' => 'required',
            'gender' => 'required',
            'birthdate' => 'required',
            'address' => 'required'
        ]);

        // Update Faculty
        // Default Credentials:
        // Username: Employee No, Password: Birthdate
        $user = User::find($id);
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

        return redirect('/faculties')->with('success', 'Faculty Updated');
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

        $user->delete();

        return redirect('/faculties')->with('success', 'Faculty Deleted');
    }
}
