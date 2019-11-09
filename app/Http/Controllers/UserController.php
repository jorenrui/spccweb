<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Student;
use App\Models\Employee;
use App\Models\AcadTerm;
use App\Models\Curriculum;
use App\Models\Activity;
use App\Models\Setting;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    /**
     * Display a listing of the users
     *
     * @param  \App\User  $model
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $search = null;

        if( request()->has('search') ) {
            $search = request('search');
            $users = User::whereDoesntHave("roles", function($q) {
                            $q->where('name', 'hidden super admin');
                        })
                        ->where(function($q) use ($search) {
                            $q->Where('username', 'like', '%'.$search.'%')
                              ->orWhere('first_name', 'like', '%'.$search.'%')
                              ->orWhere('middle_name', 'like', '%'.$search.'%')
                              ->orWhere('last_name', 'like', '%'.$search.'%')
                              ->orWhereHas("roles", function($q) use ($search) {
                                $q->where('name', strtolower($search));
                              });
                        })
                        ->orderBy('created_at')
                        ->paginate(15);
            $users->appends(['search' => $search]);
        } else {
            $users = User::whereDoesntHave("roles", function($q) {
                            $q->where('name', 'hidden super admin');
                        })->orderBy('created_at')->paginate(15);
        }

        return view('users.index')
                ->with('users', $users)
                ->with('search', $search);
    }

    public function setAsWriter($id)
    {
        $user = User::find($id);

        $user->assignRole('writer');

        return redirect()->route('user.index')->with('success', $user->getName() . ' has been set as Writer');
    }

    public function unsetAsWriter($id)
    {
        $user = User::find($id);

        $user->removeRole('writer');

        return redirect()->route('user.index')->with('success', $user->getName() . ' has been unset as Writer');
    }

    public function setAsModerator($id)
    {
        $user = User::find($id);

        $user->assignRole('moderator');

        return redirect()->route('user.index')->with('success', $user->getName() . ' has been set as Moderator');
    }

    public function unsetAsModerator($id)
    {
        $user = User::find($id);

        $user->removeRole('moderator');

        return redirect()->route('user.index')->with('success', $user->getName() . ' has been unset as Moderator');
    }

    public function setAsAdmin($id)
    {
        $user = User::find($id);

        $user->assignRole('admin');

        return redirect()->route('user.index')->with('success', $user->getName() . ' has been set as Admin');
    }

    public function unsetAsAdmin($id)
    {
        $user = User::find($id);

        $user->removeRole('admin');

        return redirect()->route('user.index')->with('success', $user->getName() . ' has been unset as Admin');
    }

    public function log()
    {
        $search = null;

        if( request()->has('search') ) {
            $search = request('search');
            $activities = Activity::join('users', 'users.id', '=', 'activity.user_id')
                        ->where('users.username', 'like', '%'.$search.'%')
                        ->orWhere('users.first_name', 'like', '%'.$search.'%')
                        ->orWhere('users.middle_name', 'like', '%'.$search.'%')
                        ->orWhere('users.last_name', 'like', '%'.$search.'%')
                        ->orWhere('activity.description', 'like', '%'.$search.'%')
                        ->orWhere('activity.timestamp', 'like', '%'.$search.'%')
                        ->orderBy('timestamp', 'desc')
                        ->paginate(15);
            $activities->appends(['search' => $search]);
        } else {
            $activities = Activity::orderBy('timestamp', 'desc')->paginate(15);
        }

        return view('users.log')
                ->with('activities', $activities)
                ->with('search', $search);
    }

    public function logDestroy($id)
    {
        $activity = Activity::find($id);

        $activity->delete();

        return redirect('/user/log')->with('success', 'Activity has been deleted.');
    }

    public function logDestroyAll()
    {
        Activity::truncate();

        return redirect('/user/log')->with('success', 'All activities have been deleted.');
    }

    /**
     * Show the form for creating a new user
     *
     * @return \Illuminate\View\View
     */
    public function createEmployee()
    {
        return view('users.employee.create');
    }

    /**
     * Store a newly created user in storage
     *
     * @param  \App\Http\Requests\UserRequest  $request
     * @param  \App\User  $model
     * @return \Illuminate\Http\RedirectResponse
     */
    public function storeEmployee(Request $request)
    {
        $this->validate($request, [
            'profile_picture' => 'nullable|mimes:jpeg,bmp,jpg,png|between:1, 3000',
            'employee_no' => 'required|unique:employee|min:4|max:5',
            'employee_type' => 'required',
            'date_employed' => 'required|date',
            'first_name' => 'required|min:3|max:50',
            'middle_name' => 'nullable|min:3|max:50',
            'last_name' => 'required|min:3|max:50',
            'birthdate' => 'required|date',
            'contact_no' => 'nullable|min:6|max:11',
            'address' => 'nullable|min:6|max:100',
            'email' => 'nullable|unique:users',
            'password' => 'required|confirmed|min:4',
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
        // Username: Employee No
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
        $user->password = Hash::make($request->input('password'));
        $user->save();

        $user->assignRole($request->input('employee_type'));

        $employee = new Employee;
        $employee->employee_no = $request->input('employee_no');
        $employee->date_employed = $request->input('date_employed');
        $employee->user_id = $user->id;
        $employee->save();

        return redirect()->route('user.index')
                ->with('success', 'Employee ' . $employee->getEmployeeNo() . ' Created. Default username is the Employee No. with no dashes.');
    }

    /**
     * Show the form for creating a new user
     *
     * @return \Illuminate\View\View
     */
    public function createStudent()
    {
        $curriculums = Curriculum::all();
        $acad_terms = AcadTerm::all();
        $cur_acad_term = Setting::where('name', 'LIKE', 'Current Acad Term')->first()->value;
        $cur_curriculum_id = Setting::where('name', 'LIKE', 'Current Curriculum')->first()->value;

        return view('users.student.create')
                    ->with('curriculums', $curriculums)
                    ->with('acad_terms', $acad_terms)
                    ->with('cur_acad_term', $cur_acad_term)
                    ->with('cur_curriculum_id', $cur_curriculum_id);
    }

    /**
     * Store a newly created user in storage
     *
     * @param  \App\Http\Requests\UserRequest  $request
     * @param  \App\User  $model
     * @return \Illuminate\Http\RedirectResponse
     */
    public function storeStudent(Request $request)
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
            'email' => 'nullable|unique:users',
            'password' => 'required|confirmed|min:4',
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
        // Username: Student No
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
        $user->password = Hash::make($request->input('password'));
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

        return redirect()->route('user.index')
                ->with('success', 'Student ' . $student->getStudentNo() . ' Created. Default username is the Student No. with no dashes');
    }

    public function showEmployee($id)
    {
        $user = User::find($id);

        return view('users.employee.show')->with('user', $user);
    }

    public function showStudent($id)
    {
        $user = User::find($id);
        $curriculums = Curriculum::all();
        $acad_terms = AcadTerm::all();

        return view('users.student.show')
                    ->with('user', $user)
                    ->with('curriculums', $curriculums)
                    ->with('acad_terms', $acad_terms);
    }

    /**
     * Show the form for editing the specified user
     *
     * @param  \App\User  $user
     * @return \Illuminate\View\View
     */
    public function editEmployee($id)
    {
        $user = User::find($id);

        return view('users.employee.edit')->with('user', $user);
    }

    /**
     * Update the specified user in storage
     *
     * @param  \App\Http\Requests\UserRequest  $request
     * @param  \App\User  $user
     * @return \Illuminate\Http\RedirectResponse
     */
    public function updateEmployee(Request $request, $id)
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

        return redirect()->route('user.index')
                ->with('success', 'Employee ' . $employee->getEmployeeNo() . ' Updated.');
    }

    /**
     * Show the form for editing the specified user
     *
     * @param  \App\User  $user
     * @return \Illuminate\View\View
     */
    public function editStudent($id)
    {
        $user = User::find($id);
        $curriculums = Curriculum::all();
        $acad_terms = AcadTerm::all();

        return view('users.student.edit')
                    ->with('user', $user)
                    ->with('curriculums', $curriculums)
                    ->with('acad_terms', $acad_terms);
    }

    /**
     * Update the specified user in storage
     *
     * @param  \App\Http\Requests\UserRequest  $request
     * @param  \App\User  $user
     * @return \Illuminate\Http\RedirectResponse
     */
    public function updateStudent(Request $request, $id)
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

        return redirect()->route('user.index')
                ->with('success', 'Student ' . $student->getStudentNo() . ' Updated.');
    }

    /**
     * Remove the specified user from storage
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {
        $user = User::find($id);

        Storage::disk('public')->delete('profile_pictures/'. $user->profile_picture);

        $user->delete();

        return redirect()->route('user.index')->withStatus('User successfully deleted.');
    }
}
