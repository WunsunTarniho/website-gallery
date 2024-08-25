<?php

namespace App\Http\Controllers;

use App\Models\Album;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AlbumController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'album' => 'required',
        ]);

        Album::create([
            'user_id' => Auth::user()->id,
            'description' => '',
            'name' => $request->input('album'),
        ]);

        return back()->with('success', 'Album Berhasil dibuat!');
    }

    /**
     * Display the specified resource.
     */
    public function show(String $id)
    {
        $album = Album::find($id);

        return view('media.postAlbum', [
            'title' => $album->name,
            'posts' => $album->posts,
        ]);
    }

    // Method yang dibuat untuk mengambil album yang dimiliki user tertentu

    public function album(String $id)
    {
        $user = User::find($id);

        return view('media.album', [
            'title' => 'Album',
            'user' => $user,
            'albums' => Album::where('user_id', $id)->get(),
            'posts' => $user->posts,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
