<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;

// DEBUGGING
// var_dump() atau dd() atau dump()

class PostController extends Controller
{

    public function __construct()
    {
        // $this->middleware(['auth', 'admin'])->except(['show']);
        $this->middleware(['auth', 'admin']);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Mendapatkan semua rekod di dalam table users dan disimpan
        // di dalam pembolehubah (variable) bernama $posts
        // select * from posts
        // $posts = Post::all();
        $posts = Post::get();

        // Kembalikan view bersama dengan data $posts
        return view('posts.index', [ 'posts' => $posts ]);
        // return view('posts.index')->with([ 'posts' => $posts ]);
        // return view('posts.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // Kembalikan view
        return view('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store()
    {
        // Membuat pengesahan data yang dihantar pengguna
        $this->validate(request(), [
            'title'         => 'required|min:3|max:250',
            'description'   => 'required|min:3|max:250',
            'content'       => 'required|min:3',
        ]);

        // Masukkan ke dalam database
        $post = Post::create([
            'title'         => request('title'),
            'description'   => request('description'),
            'content'       => request('content')
        ]);

        // $post = Post::create([
        //     'title'         => $request->title,
        //     'description'   => $request->description,
        //     'content'       => $request->content,
        // ]);

        // $post = new Post;
        // $post->title         = $request->title;
        // $post->description   = $request->description;
        // $post->content       = $request->content;
        // $post->save();


        // Menggunakan session flash untuk memaparkan mesej sementara
        session()->flash('status', 'Data berjaya dimasukkan.');

        // Redirect pengguna kepada URI baru
        return redirect('posts');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // Mendapatkan rekod dengan id yang diberikan pada URI dan menyimpan rekod ke dalam pembolehubah $post
        // select * from users where id=$id limit 1
        // $post = Post::where('id', $id)->first();
        // $post = Post::whereId($id)->first();
        // $post = Post::find($id);

        // Kes khas - mengembalikan rekod jika ianya wujud, jika tidak redirect kepada halaman 404: Not Found
        $post = Post::findOrFail($id);

        // Kembalikan view bersama data
        return view('posts.show', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // Mendapatkan rekod dengan id yang diberikan pada URI dan menyimpan rekod ke dalam pembolehubah $post
        // select * from users where id=$id limit 1
        $post = Post::findOrFail($id);

        // Kembalikan view bersama data
        return view('posts.edit', compact('post'));
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
        // Membuat pengesahan data yang dihantar pengguna
        $this->validate($request, [
            'title'         => 'required|min:3|max:250',
            'description'   => 'required|min:3|max:250',
            'content'       => 'required|min:3',
        ]);

        // Mendapatkan rekod dengan id yang diberikan pada URI dan menyimpan rekod ke dalam pembolehubah $post
        // select * from users where id=$id limit 1
        $post = Post::findOrFail($id);

        $post->update([
            'title'         => $request->title,
            'description'   => $request->description,
            'content'       => $request->content,
        ]);

        // $post->update([
        //     'title'         => request()->title,
        //     'description'   => request()->description,
        //     'content'       => request()->content,
        // ]);
        //
        // $post->title         = request()->title;
        // $post->description   = request()->description;
        // $post->content       = request()->content;
        // $post->save();

        // Menggunakan session flash untuk memaparkan mesej sementara
        session()->flash('status', 'Data berjaya dikemaskini.');

        // Redirect
        return redirect('posts');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // Mendapatkan rekod dengan id yang diberikan pada URI dan menyimpan rekod ke dalam pembolehubah $post
        // select * from users where id=$id limit 1
        $post = Post::find($id);

        if (empty($post)) {
            session()->flash('status_warning', 'Maaf! rekod yang anda cari tidak dijumpai.');
        } else {
            // Delete post
            $post->delete();
            // Menggunakan session flash untuk memaparkan mesej sementara
            session()->flash('status_danger', 'Rekod berjaya dibuang.');
        }
            return back();
    }
}
