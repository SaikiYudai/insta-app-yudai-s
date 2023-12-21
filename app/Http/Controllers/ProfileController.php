<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    private $user;

    public function __construct(User $user)
    {
        $this->user = $user;
    }

    public function show($id)
    {
        $user = $this ->user-> findOrFail($id);

        return view('users.profile.show')->with('user', $user);
    }

    public function edit($id)
    {
        $user = $this ->user-> findOrFail($id);

        return view('users.profile.edit')
        ->with('user', $user);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|min:1|max:50',
            'email' => 'required|email|max:50|unique:users,email,' . $id, //<-without this, previous email can not be accepted
            'avatar' => 'mimes:jpg,jpeg,png,gif||max:1048',
            'introduction' => 'max:100',

        ]);

        // get the user to be updated
        $user = $this ->user-> findOrFail($id);
        $user -> name = $request->name;
        $user -> email = $request->email;
        $user -> introduction = $request->introduction;

        if($request->avatar){
            $user->avatar = 'data:image/' . $request->avatar->extension() . ';base64,' . base64_encode(file_get_contents($request->avatar));
        }
        $user->save();

        return redirect()->route('profile.show', $id);
    }

    public function followers($id)
    {
        $user = $this ->user-> findOrFail($id);

        return view('users.profile.followers')->with('user', $user);
    }
}
