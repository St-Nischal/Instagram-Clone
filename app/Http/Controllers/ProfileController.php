<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProfileController extends Controller
{
    //

    public function index(User $user): View
    {
        return view(view:'profiles.index', data: compact(var_name:'user'));
    }

    public function edit(User $user): View
    {
        if (auth()->id() !== $user->id) {
            abort(code:403, message: 'Unauthorized action.');
        }
        return view(view:'profiles.edit', data: compact(var_name:'user'));
    }

    public function update (Request $request, User $user): RedirectResponse
    {
        if (auth()->id() !== $user->id) {
            abort(code:403, message: 'Unauthorized action.');
        }

        $data = $request->validate(rules: [
            'name' => 'required|string|max:255',
            'username' => 'required|email|max:255|unique:users,email,' . $user->id,
            'bio' => 'nullable|string|max:500',
            'profile_image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        if($request->hasFile(key:'profile_image')){
            //Delete the old profile image if it exists
            if ($user->profile_image) {
                Storage::disk(name:'public')->delete(path:$user->profile_image);
            }
            $imagePath = $request->file(key:'profile_image')->store(path:'profile', options:'public');
            $data['profile_image'] = $imagePath;

        }

        $user->update(attributes: $data);

        return redirect(to:'/profile/' . $user->id)->with(message: 'Profile updated successfully.');
    }

}
