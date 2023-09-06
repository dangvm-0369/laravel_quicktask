<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('users.index', [
            'users' => User::with(['roles', 'cars'])->get(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('users.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreUserRequest $request)
    {
        $request->validated();

        $user = new User();

        $user->first_name = $request->first_name;
        $user->last_name = $request->last_name;
        $user->username = $request->username;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->is_admin = false;
        $user->is_active = true;

        $user->save();

        $user->roles()->attach(config('app.role_user_id'));

        return redirect()->route('users.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        return view('users.show', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        return view('users.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateUserRequest $request, User $user)
    {
        $request->validated();

        $user->username = $request->username;
        $user->first_name = $request->first_name;
        $user->last_name = $request->last_name;
        $user->save();

        return redirect()->route('users.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        DB::transaction(function () use ($user) {
            $user->cars()->delete();
            $user->roles()->delete();
            $user->delete();
        }, config('database.connections.mysql.max_attempts'));

        return redirect()->route('users.index');
    }
}
