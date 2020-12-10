<?php

namespace App\Http\Controllers;

use App\Transformer\UserTransformer;
use Dingo\Api\Routing\Helpers;
use Illuminate\Http\Request;
use App\Repository\UsersRepository;
use App\User;

class UserController extends Controller
{
    use Helpers;

    protected $userRepository;
    protected $userTransformer;

    public function __construct(UsersRepository $userRepository, UserTransformer $userTransformer)
    {
        $this->userRepository = $userRepository;
        $this->userTransformer = $userTransformer;
    }
    public function show(){
        $user = $this->userRepository->getAll();

        $response = $this->response->item($user,new UserTransformer());
        return $response;
    }

    public function showPengguna(){
        $user = $this->userRepository->getAllPengguna();

        $response = $this->response->item($user,new UserTransformer());
        return $response;
    }

    public function showPeserta(){
        $user = $this->userRepository->getAllPeserta();

        $response = $this->response->item($user,new UserTransformer());
        return $response;
    }
    
    // public function view($id){
    //     $user = $this->userRepository->getByid($id);

    //     $response = $this->response->item($user,new UserTransformer());
    //     return $response;
    // }

    public function view($id){
        // $question = Question::where('id',$id)->get();
        // return response ($question);

        $model = User::find($id);

        $result=array(
                "users"  => $model,
        );

        return response($result);
    }

    public function update(Request $request, $id){
        $user = User::where('id',$id)->first();
        $user->fullname = $request->input('fullname');
        $user->email = $request->input('email');
        $user->city = $request->input('city');
        $user->role = $request->input('role');
        $user->status = $request->input('status');
        $user->save();
    
        return response('Berhasil Merubah Data');
    }
    
    public function logininfo(Request $request) {
        return $request->user();
    }

    public function logout(Request $request)
    {
    $request->user()->token()->revoke();
    return response()->json([
        'message' => 'Successfully logged out'
        ]);
    }

    public function cekEmail(Request $request){
        $cek = User::select('email')->where('email',$request->email)->first();
        if($cek != null) {
            $cek = false;
        } else {
            $cek = true;
        }
        return response()->json([
            'message'  => $cek,
        ]);
    }

    public function register(Request $request)
    {
        $this->validate($request, [
            'email' => 'required|email|unique:users',
            'password' => 'required'
        ]);
 
        // $hasher = app()->make('hash');
        $fullname = $request->input('fullname');
        $email = $request->input('email');
        $password = \Illuminate\Support\Facades\Hash::make($request->input('password'));
        $city = $request->input('city');
        $role = $request->input('role');
        $status = $request->input('status');

        $user = User::create([
            'email' => $email,
            'password' => $password,
            'fullname' => $fullname,
            'city' => $city,
            'role' => $role,
            'status' => $status
        ]);
 
        $res['success'] = true;
        $res['message'] = 'Success register!';
        $res['data'] = $user;
        return response($res);
    }
}