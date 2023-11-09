<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PostsController extends Controller
{
    public function index()
    {
        // $posts = Post::orderBy("created_at","desc")->paginate(10);
        // return view("", compact(""));
        return view("postsDashboard");
    }

    public function store(Request $request)
    {

        $request->validate([
            "title" => "required",
        ]);

        $data = [
            "title" => $request->title,
        ];

        DB::table("post")->insert($data);

        $data = DB::table("post")->get();
        return view('postsDashboard', compact('data'));
    }

    public function show($id)
    {
        $data = DB::table("post")->where("id", $id);
        // dd($data);

        return view("posts", compact("data"));
    }
}