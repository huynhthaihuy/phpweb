<?php

namespace App\Http\Controllers;
use App\User;
use App\Post;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //lay ra 2 du lieu
        //$posts = Post::with('category')->take(2)->get();
        // $users = DB::table('users')->get();
        $users = User::all();
        return view('Admin.index', ['users' => $users]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $categories = Category::all();
        return view('create',['categories' => $categories]);
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
        // User::create([
        //     'name' => $request->name,
        //     'email' => $request->email,
        //     'password'=> $request->password
        // ]);
        // dd($request->ct_id);
        // dd($request->all());
       $posts = Post::create([
        'title' => $request->title,
        'description' => $request->description,
        'content' => $request->content,
       ]);
       $posts->categories()->attach($request->categories);
       return redirect()->route('posts.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $posts = Post::with('categories')->find($id);
        //  dd($users);
        // $users = DB::table('users')->where('id', $id)->get();
        // dd($categories);
        return view('show', ['post' => $posts
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
        //
        $posts = Post::with('categories')->find($id);
        return view('edit', ['post' => $posts]);
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
        // dd($request->all());
        $post = Post::find($id);
        $post->title = $request->title;
        $post->save();
        return redirect()->route('posts.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $posts = Post::with('categories')->find($id)->delete();
        // dd($user);
        return redirect()->route('posts.index');
    }
}