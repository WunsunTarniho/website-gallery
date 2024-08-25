<?php

namespace App\Http\Controllers;

use App\Models\Album;
use App\Models\Comment;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Nette\Utils\Image;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('home', [
            'title' => 'Beranda',
            'posts' => Post::latest()->search(request(['search']))->paginate(20),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('create', [
            'title' => 'Buat Post',
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|min:5',
            'album_id' => 'required',
            'image' => 'required|file|image',
        ]);

        $image = Image::fromFile($request->file('image'));

        $validated['user_id'] = Auth::user()->id;

        // Dari method Objek Request
        $validated['description'] = $request->input('description');
        $validated['image'] = $request->file('image')->store('file-image');
        $validated['type'] = $request->file('image')->getMimeType();
        $validated['size'] = ($request->file('image')->getSize() / 1000000) . " MB";

        // Dari Libary bawaan laravel Nette/Utils/Image
        $validated['resolution'] = $image->getWidth() . " x " . $image->getHeight();

        Post::create($validated);

        return redirect("/")->with('success', 'Foto berhasil diupload');
    }

    /**
     * Display the specified resource.
     */
    public function show(String $id)
    {
        $post = Post::with('user')->find($id);
        $comments = $post->comments();

        $liked = count($post->likes()->where('user_id', Auth::id())->get());

        return view('post', [
            'title' => $post->title,
            'post' => $post,
            'like' => $post->likes()->count(),
            'comments' => $comments->latest()->get(),
            'totalComment' => $comments->count(),
            'liked' => $liked,
        ]);
    }

    // Method yang dibuat sendiri untuk mengatur download file

    public function download(String $image){
        return Storage::download('/file-image/' . $image);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(String $id)
    {
        $post = Post::find($id);

        if($post->user->id !== Auth::user()->id){
            abort(403);
        }

        return view('edit', [
            'title' => 'Edit Post',
            'post' => $post,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, String $id)
    {
        $validated = $request->validate([
            'title' => 'required|min:5',
            'album_id' => 'required',
        ]);

        $validated['description'] = $request->input('description');

        Post::find($id)->update($validated);

        return redirect("/post/$id")->with('success', 'Postingan berhasil diedit');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(String $id)
    {
        Post::destroy($id);
        Storage::delete(Post::find($id)->image);

        return redirect('/')->with('success', 'Postingan berhasil dihapus');
    }
}
