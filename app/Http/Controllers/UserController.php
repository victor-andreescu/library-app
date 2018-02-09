<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function edit()
    {
        return view('user.overview')->with([
            'user' => \Auth::user()
        ]);
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $user = \Auth::user();
        $user->update([
            'name' => $request['name'],
            'email' => $request['email']
        ]);
        return back();
    }


    public function editPassword()
    {
        return view('user.password')->with([
            'user' => \Auth::user()
        ]);
    }

    public function updatePassword(Request $request)
    {
        $this->validate($request, [
            'old_password' => "required",
            'password' => "required|string|confirmed|min:6",
            'password_confirmation' => "required"
        ]);

        if ( !(\Hash::check($request->get('old_password'), \Auth::user()->password)) ) {
            return redirect()->back()->withErrors([
                'old_password' => 'The current password doesn\'t match with your input.'
            ]);
        }

        $user = \Auth::user();
        $user->password = bcrypt($request->get('password'));
        $user->save();

        return back();
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
