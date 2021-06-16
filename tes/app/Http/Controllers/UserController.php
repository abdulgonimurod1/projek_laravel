<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class UserController extends Controller
{
    public function index(){
        $user = User::all();
        return view('admin.user.index', compact('user'));
    }
    
    public function edit($id)
    {
        $user = User::find($id);
        return view('admin.user.edit', compact('user'));
    }
    
    public function update(Request $request, $id)
    {
            $request->validate([
                'name' => 'required',
                'username'     => 'required|alpha_num|min:3|string',
                'email'        => 'required',
            ]);

        $form_data = array(
            'name' => $request->name,
            'username' => $request->username,
            'email' => $request->email,
            'is_active' => $request->is_active,
            'role' => $request->role,
        ); 
        User::whereId($id)->update($form_data);
        return redirect()->route('user.index')->with('success','Data User Berhasil Diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();
        return redirect('/user')->with('success','Data User Berhasil Dihapus');
    }
}
