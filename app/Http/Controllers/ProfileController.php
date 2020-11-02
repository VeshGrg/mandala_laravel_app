<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateMainDetailsRequest;
use App\Http\Requests\ChangePasswordRequest;
use App\Http\Requests\UpdateProfileDetails;

use App\Models\Profile;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class ProfileController extends Controller
{
    
    function index()
    {
        $user = auth()->user();

        return view('profile.index', compact('user'));
    }

    public function updateMainDetails(UpdateMainDetailsRequest $request)
    {
        $user = auth()->user();

        $user->update($request->validated());

        if($request->hasFile('image')) {
            $user->updateProfilePhoto($request->image);
        }

        return redirect()
            ->route('profile')
            ->withSuccess('Main Details succesfully updated.');
    }

    public function updateProfileDetails(UpdateProfileDetails $request)
    {
        Profile::updateOrCreate(['user_id' => auth()->id()], $request->validated());

        return redirect()
            ->route('profile')
            ->withSuccess('Main Details succesfully updated.');
    }

    public function changePassword(ChangePasswordRequest $request)
    {
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
