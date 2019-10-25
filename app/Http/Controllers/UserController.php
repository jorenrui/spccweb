<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Activity;

use App\Http\Requests\UserRequest;
use Illuminate\Support\Facades\Hash;

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
                        ->orderBy('timestamp', 'desc')
                        ->paginate(15);
        } else {
            $activities = Activity::orderBy('timestamp', 'desc')->paginate(15);
        }

        return view('users.log')
                ->with('activities', $activities)
                ->with('search', $search);
    }

    /**
     * Show the form for creating a new user
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('users.create');
    }

    /**
     * Store a newly created user in storage
     *
     * @param  \App\Http\Requests\UserRequest  $request
     * @param  \App\User  $model
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(UserRequest $request, User $model)
    {
        $model->create($request->merge(['password' => Hash::make($request->get('password'))])->all());

        return redirect()->route('user.index')->withStatus('User successfully created.');
    }

    /**
     * Show the form for editing the specified user
     *
     * @param  \App\User  $user
     * @return \Illuminate\View\View
     */
    public function edit(User $user)
    {
        return view('users.edit', compact('user'));
    }

    /**
     * Update the specified user in storage
     *
     * @param  \App\Http\Requests\UserRequest  $request
     * @param  \App\User  $user
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(UserRequest $request, User  $user)
    {
        $user->update(
            $request->merge(['password' => Hash::make($request->get('password'))])
                ->except([$request->get('password') ? '' : 'password']
        ));

        return redirect()->route('user.index')->withStatus('User successfully updated.');
    }

    /**
     * Remove the specified user from storage
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(User  $user)
    {
        $user->delete();

        return redirect()->route('user.index')->withStatus('User successfully deleted.');
    }
}
