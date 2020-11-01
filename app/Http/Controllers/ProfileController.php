<?php

namespace App\Http\Controllers;

use App\Profile;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    
    function index()
    {
        $user = auth()->user();

        return view('profile.index', compact('user'));
    }

    public function updateMainDetails(Request $request)
    {
        $request->validate([
            'name'  => 'required',
            'email' => 'required|email',
            'image' => 'image|nullable'
        ]);

        $user = auth()->user();

        $user->update([
            'name'  => $request->name,
            'email' => $request->email
        ]);

        if($request->hasFile('image')) {
            $user->updateProfilePhoto($request->image);
        } 

        return redirect()
            ->route('profile')
            ->withSuccess('Main Details succesfully updated.');
    }

    public function updateProfileDetails(Request $request)
    {
        $validated = $request->validate([
            'birthday' => 'date|nullable',
            'gender'   => 'in:male,female|nullable',
            'bio'      => 'string|nullable'
        ]);

        Profile::updateOrCreate(['user_id' => auth()->id()], $validated);

        return redirect()
            ->route('profile')
            ->withSuccess('Main Details succesfully updated.');
    }

    public function changePassword(Request $request)
    {
        $request->validate([
            'old_password' => 'required',
            'new_password' => 'required|confirmed|min:2'
        ]);

        $user = auth()->user();

        if (!Hash::check($request->old_password, $user->password)) {
            throw ValidationException::withMessages([
                'old_password' => 'Old password doesn\'t match.'
            ]);
        }

        $user->update(['password' => bcrypt($request->new_password)]);

        return redirect()
            ->route('profile')
            ->withSuccess('Password is now changed.');
    }
}
