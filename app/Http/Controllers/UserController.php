<?php

namespace App\Http\Controllers;

use App\User;
use App\UserType;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users=User::all();
        return view('admin.showalluser',['users'=>$users]);
        //
    }
    public function userlist()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $userTypes=UserType::all();
        return view('admin.adduser',['userTypes'=>$userTypes]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $req
     * @return \Illuminate\Http\Response
     */
    public function store(Request $req)
    {
        $validatedData = $req->validate([
            'email' => 'required|unique:users|max:255|email',
            'password' => 'required|min:6',

        ]);
        // if($validatedData->fails())
        // {
        //     return back()
		// 			->with('errors', $validatedData->errors())
		// 			->withInput();
        // }

        $flight = UserType::where('userTypeName', $req->userTypeId)->first();
        //
        $user 			= new User;
		$user->userName 	= $req->userName;
		$user->email = $req->email;
		$user->password 	= $req->password;
		$user->address 	= $req->address;
        $user->phone= $req->phone;
        $user->dob= $req->dob;
		$user->userTypeId 	= $flight->userTypeId ;

		if($user->save()){
			return redirect()->route('user.index');
		}else{
			return redirect()->route('user.create');
		}
    }



    /**
     * Display the specified resource.
     *
     * @param  \App\user  $user
     * @return \Illuminate\Http\Response
     */
    public function show(user $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\user  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(user $user)
    {
        //
        $userTypes=UserType::all();
        $users = User::find($user->uid);
        return view('admin.showuser',['users'=>$users,'userTypes'=>$userTypes]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Req  $request
     * @param  \App\user  $user
     * @return \Illuminate\Http\Response
     */
    public function update(user $u,Request $req )
    {
        $validatedData = $req->validate([

            'password' => 'required|min:6',

        ]);
        // if($validatedData->fails())
        // {
        //     return back()
		// 			->with('errors', $validatedData->errors())
		// 			->withInput();
        // }
        //
        $user=User::find($u->uid)->first();
		$user->userName 	= $req->userName;
		$user->email = $req->email;
		$user->password 	= $req->password;
		$user->address 	= $req->address;
        $user->phone= $req->phone;
        $user->dob= $req->dob;
		$user->userTypeId 	= $req->userTypeId ;

		if($user->save()){
			return redirect()->route('user.index');
		}else{
			return redirect()->route('user.edit',$user);
		}
    }

    public function updateuser(Request $req ,$id)
    {
        //

        $a=$req->uid;
        $user=User::where('uid', $a)->firstOrFail();
        echo $user;
		$user->userName 	= $req->userName;

		$user->password 	= $req->password;
		$user->address 	= $req->address;
        $user->phone= $req->phone;
        $user->dob= $req->dob;
		$user->userTypeId 	= $req->userTypeId ;

		if($user->save()){
			return redirect()->route('user.index');
		}else{
			return redirect()->route('user.edit',$user);
		}
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\user  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(user $user)
    {
        //
        return redirect()->route('user.index');
        $res = User::destroy($user->uid);
        if ($res) {
            return redirect()->route('user.index');

        }
        else {
            return redirect()->route('user.destroy',$user);

        }
    }
    public function delete(user $user)
    {
        //


        if (User::destroy($user->uid)) {
            return redirect()->route('user.index');

        }
        else {
            return redirect()->route('user.destroy',$user);

        }
    }



}
