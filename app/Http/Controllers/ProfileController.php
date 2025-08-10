<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProfileController extends Controller
{
    public function index(User $user)
    {
        return view('profiles.index', compact('user'));
    }

    public function edit(User $user)
    {
        if (auth()->id() !== $user->id) {
            abort(403, 'Unauthorized action.');
        }
        
        return view('profiles.edit', compact('user'));
    }

    public function update(Request $request, User $user)
    {
        if (auth()->id() !== $user->id) {
            abort(403, 'Unauthorized action.');
        }

        $data = $request->validate([
            'name' => 'required',
            'username' => 'required',
            'bio' => 'nullable',
            'profile_image' => 'image|nullable|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        if ($request->hasFile('profile_image')) {
            // Delete old profile image from S3 if exists
            if ($user->profile_image) {
                Storage::disk('profile_pic')->delete($user->profile_image);
            }
            
            // Store new profile image on S3 disk 'profile_pic'
            // No folder specified since 'root' => 'profile_pics' already set in disk config
            $imagePath = $request->file('profile_image')->store('', 'profile_pic');
            $data['profile_image'] = $imagePath;
        }

        $user->update($data);

        return redirect("/profile/{$user->id}");
    }
}
