<?php

namespace App\Http\Controllers;

use Hash;

use App\Models\User;
use App\Models\Employee;

use Illuminate\Http\Request;

class RegistrarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $registrars = User::whereHas("roles", function($q){ $q->where('name', 'registrar'); })->paginate(8);

        return view('registrars.index')->with('registrars', $registrars);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('registrars.create');
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

        // Add Registrar
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

        $user->assignRole('registrar');

        $faculty = new Employee;
        $faculty->employee_no = $request->input('employee_no');
        $faculty->date_employed = $request->input('date_employed');
        $faculty->user_id = $user->id;
        $faculty->save();

        return redirect('/registrars')->with('success', 'Registrar Created. Default username is the Employee No. while the default password is the user\'s birthdate.');
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

        return view('registrars.edit')->with('user', $user);
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

        // Update Registrar
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

        return redirect('/registrars')->with('success', 'Registrar Updated');
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

        return redirect('/registrars')->with('success', 'Registrar Deleted');
    }
}
