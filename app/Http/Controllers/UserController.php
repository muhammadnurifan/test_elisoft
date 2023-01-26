<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Carbon\Carbon;
use App\User;
use Validator;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all();
        return view('user.list', compact('users'));
    }

    public function getApi()
    {
        $users = User::all();

        return response()->json([
            'status' => (bool) $users,
            'message' => 'Data has been retrieved successfully',
            'data' => $users
        ], 200);
    }

    public function dashboard()
    {
        return view('dashboard');
    }

    public function terbilang()
    {
        return view('user.terbilang');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // 
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name'     => 'required|max:255',
            'email'    => 'required|email:dns|unique:users',
            'password' => 'required'
        ]);

        $user = new User($request->all());
        $user->password = bcrypt($request->password);
        $user->save();

        // dd($user);

        return redirect('/users')->with('sukses','Data Inputted Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::find($id);
        
        return view('user.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $user = User::find($id);

        $user->update($request->all());
        // $user->password = bcrypt('password');
        $user->save();

        return redirect('/users')->with('sukses','Data Successfully Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // $users = User::find($id);

        if(Auth::user()->id == $id) {
            return back()->with('error', 'Cannot delete data, because you are currently logged in');
        } 

        User::destroy($id);
        // $users->delete();

        return redirect('/users')->with('sukses','Data Successfully Deleted');
    }
}
