<?php

namespace App\Http\Controllers;

use App\Models\Chirp;
use Illuminate\Http\Request;

class ChirpController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view( 'cositas'  , [
            "chirps" => Chirp::with('user')->latest()->get(),
        ]
    );
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

        $request -> validate([
            "message" => ["required" ,"min:3" ,"max:255"],
        ]);

        $request -> user() ->chirps() -> create([
            "message" => $request -> message,
        ]);

        // Chirp::create([
        //     "message" => $request -> message,
        //     "user_id" => auth()->id(),

        // ]);



         return to_route('Chirps')->with("success", "Chirp created successfully");

    }

    /**
     * Display the specified resource.
     */
    public function show(Chirp $chirp)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Chirp $chirp)
    {
        return view('editCositas', ['chirp' => $chirp]);
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Chirp $chirp)
    {
        if ($request->user()->cannot('update', $chirp)) {
            abort(403);
        }
        $request->validate([
            "message" => ["required", "min:3", "max:255"],
        ]);

        $chirp->update([
            "message" => $request->message,
        ]);

        return to_route('Chirps')->with("success", "Chirp update successfully");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Chirp $chirp)
    {
        //
    }
}
