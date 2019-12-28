<?php

namespace App\Http\Controllers;

use Hash;

use App\Models\User;
use App\Models\Employee;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class RegistrarController extends Controller
{
    private function getRegistrars($search, $is_active)
    {
        if( $search != null ) {
            $registrars = User::join('employee', 'users.id', '=', 'employee.user_id')
                        ->where('is_active', $is_active)
                        ->whereHas("roles", function($q){
                            $q->where('name', 'registrar');
                        })
                        ->where('employee_no', 'like', '%'.$search.'%')
                        ->orWhere('first_name', 'like', '%'.$search.'%')
                        ->orWhere('middle_name', 'like', '%'.$search.'%')
                        ->orWhere('last_name', 'like', '%'.$search.'%')
                        ->orderBy('users.last_name')
                        ->paginate(15);
            $registrars->appends(['search' => $search]);
        } else {
            $registrars = User::join('employee', 'users.id', '=', 'employee.user_id')
                        ->where('is_active', $is_active)
                        ->whereHas("roles", function($q){
                            $q->where('name', 'registrar');
                        })
                        ->orderBy('users.last_name')
                        ->paginate(15);
        }

        return $registrars;
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

        $registrars = $this->getRegistrars($search, true);

        return view('registrars.index')
                ->with('registrars', $registrars)
                ->with('search', $search);
    }

    public function archived()
    {
        if ( request()->has('search') )
            $search = request('search');
        else
            $search = null;

        $registrars = $this->getRegistrars($search, false);

        return view('registrars.archived')
                ->with('registrars', $registrars)
                ->with('search', $search);
    }

    public function setAsArchived($id)
    {
        $user = User::find($id);
        $user->is_active = false;
        $user->save();

        return redirect('/registrars')
                ->with('success', 'Employee ' . $user->employee->getEmployeeNo() . ' ' . $user->getName() . ' has been archived');
    }

    public function setAsUnarchived($id)
    {
        $user = User::find($id);
        $user->is_active = true;
        $user->save();

        return redirect('/archived/registrars')
                ->with('success', 'Employee ' . $user->employee->getEmployeeNo() . ' ' . $user->getName() . ' has been unarchived');
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

        $user->assignRole('registrar');

        $employee = new Employee;
        $employee->employee_no = $request->input('employee_no');
        $employee->date_employed = $request->input('date_employed');
        $employee->user_id = $user->id;
        $employee->save();

        return redirect('/registrars/' . $user->id)
                ->with('success', 'Employee ' . $employee->getEmployeeNo() . ' Created. Default username is the Employee No. with no dashes while the default password is the user\'s birthdate (YYYY-MM-DD).');
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

        return view('registrars.show')->with('user', $user);
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

        return redirect('/registrars/' . $user->id)
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

        $user->delete();

        return redirect('/registrars')->with('success', 'Registrar Deleted');
    }
}
