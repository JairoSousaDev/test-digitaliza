<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCommissionRequest;
use App\Mail\Contact;
use App\Mail\ContactCommission;
use App\Models\Commission;
use App\Models\Councilor;
use DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

class CommissionController extends Controller
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
        $councilors = DB::table('councilors')->orderBy('name')->get();
        return view('admin.newCommission', compact('councilors'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCommissionRequest $request)
    {

        $dateOpening = str_replace("/", "-", $request->opening);
        $dateOpening = date('Y-m-d', strtotime($dateOpening));
        
        $dateClosure = str_replace("/", "-", $request->closure);
        $dateClosure = date('Y-m-d', strtotime($dateClosure));

        try {
            $commission = Commission::create([
                'name' => $request->name,
                'opening' => $dateOpening,
                'closure' => $dateClosure,
            ]);
    
            for ($i=0; $i < count($request->councilors) ; $i++) { 
                $commission = Commission::find($commission->id);
                $commission->councilors()->saveMany([
                    Councilor::find($request->councilors[$i]),
                ]);
            }
    
            for ($i=0; $i < count($request->councilors) ; $i++) { 
                $email = DB::table('councilors')
                    ->where('id', '=',  $commission->id)
                    ->select('email')->first();
                    Mail::to($email)->send(new ContactCommission);
            }
            
            $commission->refresh();
            return redirect()->route('allProjects');
        } catch (\Throwable $th) {
            $msg = "Não Foi Possivel cadastrar a Comissão. Revise os dados.";
            return redirect()->back()->withErrors( $msg )->withInput();
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
