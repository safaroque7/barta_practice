<?php

namespace App\Http\Controllers;

use App\Http\Requests\StudentEnrollmentRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Flasher\Laravel\Facade\Flasher;
use Flasher\Prime\FlasherInterface;

class HomeController extends Controller
{

    public function index()
    {
        // $users = DB::table('user')->get();
        $users = DB::table('users')->orderBy('id', 'desc')->get(['id', 'first_name', 'last_name', 'email', 'bio']);
        // dd($users);

        return view("welcome", compact("users"));
    }


    public function profile()
    {
        $allUsers = DB::table("users")->limit(1)->orderBy('id', 'desc')->get();
        return view("profile", ["users" => $allUsers]);
    }

    public function editProfile()
    {
        return view("editProfile");
    }


    public function registerUser()
    {
        return view("register");
    }

    public function registrationPost(StudentEnrollmentRequest $request, FlasherInterface $flasher)
    {

        $validated = $request->validated();
        dd($validated);

 
        $user = [
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'bio' => $request->bio,
        ];

        DB::table("users")->insert($user);

        $flasher->addSuccess("Registration Successful");

        return redirect()->route('signIn');
    }

    public function signIn()
    {
        return view("signIn");
    }


    public function form()
    {
        return view("form");
    }

    public function posts(){
        $posts = DB::table("wpej_posts")->get();
        return view("posts", compact("posts"));
    }
}
