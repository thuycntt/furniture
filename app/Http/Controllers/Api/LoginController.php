<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
//use App\Models\User;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Tymon\JWTAuth\Facades\JWTAuth;
use Tymon\JWTAuth\Facades\JWTFactory;
use Tymon\JWTAuth\Exceptions\JWTException;
use Tymon\JWTAuth\Contracts\JWTSubject;
//use Tymon\JWTAuth\Contracts\Validator;
use Tymon\JWTAuth\PayloadFactory;
use Tymon\JWTAuth\Exceptions\TokenExpiredException;
use Tymon\JWTAuth\Exceptions\TokenInvalidException;
use Tymon\JWTAuth\JWTManager as JWT;
use Illuminate\Support\Facades\Validator;
use PharIo\Manifest\Email;
use Tymon\JWTAuth\JWTAuth as JWTAuthJWTAuth;

class LoginController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $user = User::all();
        return response()->json($user);
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
        $user = new User();
       /* $user->id = $request->input('id');
        $user->email = $request->input('email');
        $user->password = $request->input('password');
        $user->level = $request->input('level');
        $user->api_token = $request->input('api_token');
        $user->save();*/
        $user = new User;
        $user->email = $request->email;
        $user->username = $request->username;
        $user->password = Hash::make($request->password);       
        //$user->api_token = $request->api_token;
        $user->save();
        return response()->json($user);
       
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //return $id;
        $user = User::find($id);
        return response()->json($user); 
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
        $user = User::find($id);
        $user->email = $request->email;
        $user->username = $request->username;
        $user->password =Hash::make($request->password);        
        //$user->api_token = $request->api_token;
        $user->save();

        //$user->save();
        return response()->json($user);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        //
        $user = User::find($id);
        $user->delete();
        return response()->json($user);
    }
    public function register(Request $request){
       $validator = Validator::make($request->json()->all(),[            
            'email' =>'required|string|max:191|unique:a_users',
            'username' =>'required|string|max:191|unique:a_users',
            'password'=>'required|string|min:6',
           
        ]);
        if($validator->fails()){
            return response()->json($validator->errors()->toJson(),400);
        }
        $user = User::create([           
            'email' =>$request->json()->get('email'),
            'username' =>$request->json()->get('username'),
            'password'=>Hash::make($request->json()->get('password')),
           
        ]);
        
        $token = JWTAuth::fromUser($user);     
        return response()->json(compact('user','token'),201);
    }
    public function login(Request $request){
        $credentials = $request->json()->all();
        try{
            if(!$token = JWTAuth::attempt($credentials)){
                return response()->json(['error'=>'Email hoặc mật khẩu không đúng'],400);
            }
        }catch(JWTException $e){
            return response()->json(['error' =>'could_not_create_token'],500);
        }        
        return response()->json(compact('token'));
    }
    public function getAuthenticatedUser(){
        try{
            if(!$user = JWTAuth::parseToken()->authenticate()){
                return response()->json(['user_not_found'],404);
            }
        }catch (TokenExpiredException $e) {

            return response()->json(['token_expired']);
        }catch (TokenInvalidException $e) {

            return response()->json(['token_invalid']);
        }catch (JWTException $e) {

            return response()->json(['token_absent']);
        }
        return response()->json(compact('user'));
        
    }
}
