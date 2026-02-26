<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProfileController extends Controller
{
    public function edit(Request $request)
    {
        $validated = $request->validate([
            'profile_pic' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'status'      => 'nullable|string|max:100',
        ]);

        $user = auth()->user();

        if ($request->hasFile('profile_pic')) {
            // If user has a profile pic, delete the profile pic
            if ($user->profile_pic) {
                Storage::disk('public')->delete($user->profile_pic);
            }

            $path = $request->file('profile_pic')->store('profile_pics', 'public');

            $user->profile_pic = $path;
        }

        if ($request->filled('status')) {
            $user->status = $request->status;
        }

        $user->save();

        return redirect()->back()->with('success', 'Profile updated successfully.');
    }
}
