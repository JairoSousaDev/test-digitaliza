<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreProjectRequest;
use App\Mail\Contact;
use App\Models\Commission;
use App\Models\Councilor;
use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;

class ProjectController extends Controller
{

    public function allProjects()
    {

        $projects = DB::table('projects')
                ->orderBy('number')->paginate(3);
        return view('index', compact('projects'));
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //PROJETOS DO VEREADOR LOGADO

        $projects = DB::table('councilor_project')
        ->join('projects', 'councilor_project.project_id', 'projects.id')
        ->join('councilors', 'councilor_project.councilor_id', 'councilors.id')
        ->where('councilors.id', '=', Auth::user()->id)
        ->select('projects.number', 'projects.year', 'projects.type', 'projects.author', 'projects.date', 'projects.summary')
        ->paginate(3);

        return view('admin.projects', compact('projects'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $commisions = Commission::all();
        return view('admin.newProject', compact('commisions'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreProjectRequest $request)
    {
        $extension = $request->file->getClientOriginalExtension();
        $date = str_replace("/", "-", $request->date);
        $date = date('Y-m-d', strtotime($date));
        
        $project = Project::create([
            'number' => $request->number,
            'year' => $request->year,
            'date' => $date,
            'author' => $request->author,
            'type' => $request->type,
            'summary' => $request->summary,
            'file' => $request->file->storeAs('projects', $request->number.".{$extension}"),
            'status' => false,
        ]);

        $project = Project::find($project->id);
        $project->councilors()->attach(Auth::user()->id);

        $email = DB::table('councilors')->select('email')->get();
        Mail::to($email)->send(new Contact);

        return redirect()->route('myProjects');
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
