<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use PhpParser\Node\Stmt\Return_;

class ProjectController extends Controller
{
  /**
   * Display a listing of the resource.
   */
  public function index()
  {
    $projects = Project::all();
    return view('admin.projects.index', compact('projects'));
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
    //
  }

  /**
   * Display the specified resource.
   */
  public function show(Project $project)
  {
    return view('admin.projects.show', compact('project'));
  }

  /**
   * Show the form for editing the specified resource.
   */
  public function edit(Project $project)
  {
    return view('admin.projects.edit', compact('project'));
  }

  /**
   * Update the specified resource in storage.
   */
  public function update(Request $request, Project $project)
  {
    //! Validazione
    $request->validate([
      'title' => ['required', Rule::unique('projects', 'title')->ignore($project)],
      'description' => 'string',
      'url' => 'url:http,https|nullable',
      'img' => 'url:http,https|nullable',
    ]);

    $data = $request->all();
    $project->update($data);
    return view('admin.projects.show', compact('project'));
  }

  /**
   * Remove the specified resource from storage.
   */
  public function destroy(Project $project)
  {
    $project->delete();
    return to_route('admin.projects.index');
  }
}
