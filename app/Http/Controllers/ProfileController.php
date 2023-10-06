<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use Illuminate\Support\Facades\Storage;


class ProfileController extends Controller
{
    /**
     * Display the user's profile form.
     */
    public function edit(Request $request): View
    {
        return view('profile.edit', [
            'user' => $request->user(),
        ]);
    }

    /**
     * Update the user's profile information.
     */
    public function update(Request $request) {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . auth()->id(),
            'prof_pic' => 'image|mimes:jpeg,png,jpg,gif|max:2048', // Validate the image upload
        ]);
    
        $user = $request->user();

            // Check if the user already has a profile picture
        if ($user->prof_pic) {
            // Delete the old profile picture
            Storage::disk('public')->delete('profile_pictures/' . $user->prof_pic);
        }
    
        // Handle image upload and storage
        if ($request->hasFile('prof_pic')) {
            $image = $request->file('prof_pic');
            $imageFileName = time() . '.' . $image->getClientOriginalExtension();
            $image->storeAs('public/profile_pictures', $imageFileName); // Store in the "public" disk
    
            // Update the user's profile picture column
            $user->prof_pic = $imageFileName;
        }
    
        // Update other user attributes
        $user->name = $request->input('name');
        $user->email = $request->input('email');
    
        if ($user->isDirty('email')) {
            $user->email_verified_at = null;
        }
    
        $user->save();
    
        return redirect()->route('profile.edit')->with('status', 'profile-updated');
    }
    

    /**
     * Delete the user's account.
     */
    public function destroy(Request $request): RedirectResponse
    {
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current_password'],
        ]);

        $user = $request->user();

        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }
}
