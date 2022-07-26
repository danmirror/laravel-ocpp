<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\DataUser;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class userController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(Session::get('role') !="admin")
		{
			return redirect('/')->with('alert','login');
		}
        $user=[];
        $userData = DataUser::all();
        $userAll = User::all();

        $count = 0;
        foreach($userAll as $users){
            foreach($userData as $usersData){
                if($users->name == $usersData->name){
                    
                    if($users->role != "admin"){
                        $user[] = [
                            'name' => $users->name,
                            'email' => $users->email,
                            'no' => $usersData->no,
                        ];
                        $count++;
                    }
                }
            }
            // dd($user, $userAll);
        }


        return view('user.user', [
            'user'=>$user,
            'count'=>$count,
        ]);
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $Datauser = DataUser::where('name',$id)->first();
        $user = User::where('name',$id)->first();

        // dd($user->role);
        return view('user.detail',[
            'Datauser'=> $Datauser,
            'user'=>$user,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $Datauser = DataUser::where('name',$id)->first();
        $user = User::where('name',$id)->first();
        return view('user.edit',[
            'Datauser'=> $Datauser,
            'user'=>$user,
        ]);
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
        $emailCheck = User::where('email',$request->email)->first();
        $user = User::where('name',$request->id)->first();
        
        if($emailCheck && $user->email != $request->email )
            return redirect('/user/edit/'.$id)->with('alert','email is already register');

        $user->name = $request->username;
        $user->email = $request->email;
        $user->save();

        $data = DataUser::where('name',$request->id)->first();
        $data->name = $request->username;
        $data->no = $request->telp;
        $data->save();

        Session::put('name',$request->username);
        return redirect('/user/'.$data->name)->with('success','updated');
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
