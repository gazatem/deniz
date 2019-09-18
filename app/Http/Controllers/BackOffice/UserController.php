<?php

namespace App\Http\Controllers\BackOffice;

use Auth;
use Carbon\Carbon;
use DB;
use Illuminate\Routing\Controller;
use App\Models\User;
use App\Models\Role;
use App\Http\Requests\UserRequest;
use App\Http\Requests\UserUpdateRequest;

/**
 * Class DashboardController.
 */
class UserController extends Controller
{
    /**
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $users = User::all();
        return view('backend.users.index', compact('users'));        
    }

    public function create()
    {
        $roles = Role::all();

        return view('backend.users.create_edit', compact('roles'));
    }    

    public function edit(User $user)
    {
        $roles = Role::all();
        return view('backend.users.create_edit', compact('user', 'roles'));
    }    

    public function update(UserUpdateRequest $request, User $user)
    {
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        if ($user->save()) {
            $user->roles()->attach($request->roles);
            return redirect(route('backoffice.users.edit', $user->id))->with('success', 'User has been updated!');
        }
        $error = $user->errors()->all(':message');
        return redirect(route('backoffice.users.create'))->with('error', $error)->withInput();
    }

    public function store(UserRequest $request)
    {
        $user = new User;
        $user->name = $request->name;
        $user->email = $request->email;

        $user->password = bcrypt($request->password);
        if ($user->save()) {
            $user->roles()->attach($request->roles);
            return redirect(route('backoffice.users.edit', $user->id))->with('success', 'New user has been saved!');
        }
        $error = $user->errors()->all(':message');
        return redirect(route('backoffice.users.create'))->with('error', $error)->withInput();
    }    
}
