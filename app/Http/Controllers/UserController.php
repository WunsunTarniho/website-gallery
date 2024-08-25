<?php

namespace App\Http\Controllers;

use App\Models\Album;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    public function __construct()
    {
        $this->middleware('auth')->except(['index', 'create', 'store']);
        $this->middleware('guest')->only(['show', 'edit', 'update', 'destroy']);
    }
    
    public function index()
    {
        
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('verification.register', [
            'title' => 'Register',
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'username' => 'required|min:3|max:30',
            'email' => 'required|email:dns|',
            'password' => 'required|min:8|regex:/^(?=.*[0-9!@#$%^&*])/',
        ]);

        $user = User::create($validated);

        Album::create([
            'name' => 'Uncategory',
            'user_id' => $user->id,
        ]);

        return redirect('/login')->with('success', 'Register succes, login now !');
    }

    /**
     * Display the specified resource.
     */
    public function show(String $id)
    {
        $user = User::find($id);

        return view('media.posts', [
            'title' => 'Media',
            'user' => $user,
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
