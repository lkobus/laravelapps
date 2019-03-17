<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth; 
use App\UserInfo;
use App\User;
use Illuminate\Support\Facades\Hash;

class UserInfoController extends Controller
{

    public function profile(){
        //return 123;
        return view('business.userInfo.profile');
    }

    public function find($id){
        return UserInfo::findOrfail($id);
    }

    public function getLoggedUser(){
        return redirect('/home');
    }

    public function login()
    {
        if(Auth::attempt(['email' => request('email'), 'password' => request('password')])){ 
            $user = Auth::user(); 
            $success['token'] =  $user->createToken('MyApp')-> accessToken; 
            $success['user'] = $user;
            return response()->json(['success' => $success]); 
        } 
        else{ 
            return response()->json(['error'=>'Unauthorised'], 401); 
        } 
    }

    public function register(Request $request) {
        try{            
            $users=  User::where('name', $request->input('name'))->get();            
            if(empty($users)){
                return response()->json([
                    'error' => true,
                    'message' => 'User already exist in database'
                ], 409);
            } else {
                return User::create([
                    'name' => $request->input(['name']),
                    'email' => $request->input(['email']),
                    'photo' => '/imgs/misc/usr-default.svg',
                    'password' => Hash::make($request->input(['password'])),
                ]);
            }
        } catch(Exception $ex) {
            return $ex;
        }
        
        
    }

    public function create(){
        $this->validate($request, [
            'name' => 'required',
            'cover_image' => 'image|max:1999'
        ]);                
        $path = $request->file('profile_image')->storeAs('public/imgs/users/'+auth()->user()->id, 'user.png');        
        $user = User::find(auth()->user()->id);
        $user->photo = 'imgs/users/'.auth()->user()->id.'user.png';
        $user->save();
        
        $userInfo = UserInfo::create([
            'name' => $request->input(['name']),
            'user_id' => auth()->user()->id,
            'lastname' => $request->input(['lastname']),
            'birthday' => $request->input(['birthday'])
        ]);
        
        return $userInfo;
    }

    public function update(){
        $user = Contact::findOrfail($id)->update(
            [
                'name' => $request->input(['name']),
                'user_id' => auth()->user()->id,
                'lastname' => $request->input(['lastname']),
                'birthday' => $request->input(['birthday'])
            ]    
        );            
        return $user;
    }    

}
