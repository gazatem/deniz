<?php

namespace App\Http\Controllers\BackOffice;

use Auth;
use Carbon\Carbon;
use DB;
use Illuminate\Routing\Controller;
use App\Models\User;

use App\Http\Requests\ProfileUpdateRequest;

/**
 * Class DashboardController.
 */
class ProfileController extends Controller
{
 
    public function edit(User $user)
    {
        $user = Auth::user();
        return view('backend.profile.edit', compact('user'));
    }    

    public function update(ProfileUpdateRequest $request)
    {
        $user = Auth::user();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        if ($user->save()) {
            return redirect(route('backoffice.profile.edit', $user->id))->with('success', 'Profile has been updated!');
        }
        $error = $user->errors()->all(':message');
        return redirect(route('backoffice.profile.edit'))->with('error', $error)->withInput();
    }
}
