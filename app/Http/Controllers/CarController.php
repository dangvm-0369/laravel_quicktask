<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCarRequest;
use App\Http\Requests\UpdateCarRequest;
use App\Models\Car;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CarController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(User $user)
    {
        return view('cars.create', compact('user'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCarRequest $request, User $user)
    {
        $request->validated();

        DB::table('cars')->insert([
            'name' => $request->name,
            'cost' => $request->cost,
            'user_id' => $user->id,
            'created_at' => Carbon::now(),
        ]);

        return redirect()->route('users.show', [$user->id]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Car $car)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Car $car)
    {
        return view('cars.edit', compact('car'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCarRequest $request, Car $car)
    {
        $request->validated();

        $car->update([
            'name' => $request->name,
            'cost' => $request->cost,
            'updated_at' => Carbon::now(),
        ]);

        return redirect()->route('users.show', ['user' => $car->user_id]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Car $car)
    {
        $car->delete();

        return redirect()->route('users.show', ['user' => $car->user_id]);
    }
}
