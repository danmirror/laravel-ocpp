<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

use App\Models\User;
use App\Models\DataUser;

class authController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function login()
    {
        return view('auth.login');
    }

    public function loginStore(Request $request)
    {
        $name = $request->username;
        $password = $request->password;

        $data = user::where('name',$name)->first();
        if($data){ 
            if(Hash::check($password,$data->password)){
                Session::put('name',$data->name);
                Session::put('role',$data->role);
                Session::put('email',$data->email);
                Session::put('login',TRUE);
                
                return redirect('/');
            }
            else{
                return redirect('auth/login')->with('alert','Password atau Email, Salah !');
            }
        }
        else{
            return redirect('auth/login')->with('alert','Password atau Email, Salah!');
        }
    }

    public function create()
    {
        return view('auth.registration');
    }

    public function store(Request $request)
    {

        $this->validate($request, [
            'username'  => 'required',
            'email' => 'required|min:4|email',
            'password' => 'required',
            'repassword' => 'required|same:password',
        ]);

        // dd("done");
        $data = User::where('email',$request->email)->first();
        $username = User::where('name',$request->username)->first();
        if(!$data && !$username){
            $role = "user";

            if($request->username == "adminocpp"){
                $role="admin";
            }
            else{
                $dataUser=  new DataUser();
                $dataUser->name = $request->username;
                $dataUser->status ="actived";
                $dataUser->save();
            }
            
            if($request->password == $request->repassword){
                $data =  new User();
                $data->name = $request->username;
                $data->email = $request->email;
                $data->password = bcrypt($request->password);
                $data->role = $role;
                $data->save();
                return redirect('auth/login')->with('alert-success','Kamu berhasil Register');
            }
            else{
                return redirect('auth/registration')->with('alert','Password atau Email, Salah !');
            }
        }
        else{
            return redirect('auth/registration')->with('alert','Email atau Username sudah terdaftar !');
        }
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
       
    }
    public function logout()
    {
        Session::flush();
        return redirect('auth/login')->with('alert','Kamu sudah logout');
    }
}
