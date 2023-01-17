<?php

namespace App\Http\Controllers;

use App\Models\Costumer;
use Illuminate\Http\Request;

class CostumerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $costumers = Costumer::paginate(10);
        return response()->json([
            'data' => $costumers
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $costumer = Costumer::create([
            'name' => $request->name,
            'email' => $request->email,
            'username' => $request->username,
            'ponsel' => $request->ponsel,
            'credit_card' => $request->credit_card,
            'profile' => $request->profile,
        ]);
        return response()->json([
            'data' => $costumer
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Costumer  $costumer
     * @return \Illuminate\Http\Response
     */
    public function show(Costumer $costumer)
    {
        return response()->json([
            'data' => $costumer
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Costumer  $costumer
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Costumer $costumer)
    {
        $costumer->name = $request->name;
        $costumer->email = $request->email;
        $costumer->username = $request->username;
        $costumer->ponsel = $request->ponsel;
        $costumer->credit_card = $request->credit_card;
        $costumer->profile = $request->profile;
        $costumer->save();

        return response()->json([
            'data' => $costumer
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Costumer  $costumer
     * @return \Illuminate\Http\Response
     */
    public function destroy(Costumer $costumer)
    {
        $costumer->delete();
        return response()->json([
            'message' => "Costumer has been delete"
        ], 200);
    }
}
