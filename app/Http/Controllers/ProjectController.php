<?php

namespace App\Http\Controllers;

use App\Models\Project;

use Illuminate\Http\Request;
use App\Http\Requests\SavePojectRequest;

class ProjectController extends Controller
{
    public  function __construct()
    {
            $this->middleware('auth')->except('index','show');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        return view('projects.index', [
            'projects' => Project::latest('updated_at')->paginate()
        ]);
    }

    public function show(project $project)
    {

        // return $project;
        return view('projects.show', [
                'project' => $project
        ]);
    }

    public function create()
    {
        return view('projects.create', [
            'project' => new Project
        ]);
    }
    public function store(SavePojectRequest $request)
    {

                 Project::create($request->validated());


            return redirect()->route('projects.index')
            ->with('status', 'Proyecto creado con éxito!!');
    }

    public function edit(project $project)
    {
         return view('projects.edit', [
                'project' => $project
        ]);
    }
        public function update(project $project, SavePojectRequest $request)
        {
         $project->update($request->validated());
         return redirect()->route('projects.show', $project)
         ->with('status', 'Proyecto actualizado con éxito!!');
        }

        public function destroy(project $project)
        {
            $project->delete();

            return redirect()->route('projects.index')
            ->with('status', 'Proyecto eliminado permanentemente!!');
        }
}
