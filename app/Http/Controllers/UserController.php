<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\User;
use Auth;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //
        return $request->user();
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
    public function register(Request $request)
    {
        //
        $request->validate([
            'name'=>'required',
            'email'=> 'required|email|unique:users',
            'password'=> 'required',
        ]);

        $result = User::create([
            'name'=> $request->name,
            'email'=>$request->email,
            'password'=> Hash::make($request->password),
        ]);

        return response()->json($result,201);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function login(Request $request)
    {
        //
        $auth =  $request->only(['email','password']);

        if (Auth::attempt($auth)){
            $user = Auth::user();
            $token = md5 (time()).'.'.md5($request->email);
            $user->forceFill(['api_token'=>$token,])->save();
            return response()->json($user,200);
        }
        return response()->json('fail');
    }

    public function logout(Request $request)
    {
        $request->user()->forceFill(['api_token'=>null])->save();
        return response()->json('logout!!!');
    }

    public function show($id)
    {
        $user = User::findOrFail($id);
        return response()->json($user,201);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    public function update(Request $request,User $user)
    {
        $user->update($request->all());
        return response()->json($user, 200);
    }

    public function updateavatar(Request $request,User $user)
    {
        $user->update($request->all());
        return response()->json($user, 200);
    }

    public function getbook(Request $request,$id)
    {
        $u = User::find($id);
        $book_borrow = array();
        foreach($u->borrow as $borrow){
            $borrow->book;
            $book_borrow[]= $borrow;
        }
        return response()->json($book_borrow,200);
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