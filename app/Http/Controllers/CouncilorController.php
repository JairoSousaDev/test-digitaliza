<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCouncilorRequest;
use App\Models\Councilor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class CouncilorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.newCouncilor');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        try {
            $councilor = Councilor::create([
                'name' => $request->name,
                'cpf' => $request->cpf,
                'email' => $request->email,
                'user' => $request->cpf,
                'password' => Hash::make('123'),
            ]);

            return redirect()->route('allProjects');
        } catch (\Throwable $th) {
            $msg = "Não Foi Possivel cadastrar o Vereador.";
            return redirect()->back()->withErrors( $th)->withInput();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
