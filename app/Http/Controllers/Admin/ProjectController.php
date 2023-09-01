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
    $project = new Project();
    return view('admin.projects.create', compact('project'));
  }

  /**
   * Store a newly created resource in storage.
   */
  public function store(Request $request)
  {

    //! Validazione
    $request->validate([
      'title' => ['required', Rule::unique('projects', 'title')],
      'url' => 'url:http,https|nullable',
      'img' => 'url:http,https|nullable',
      'description' => 'required|string',
    ], [
      'title.required' => 'Il titolo è obbligatorio.',
      'url.url' => 'l\'url non ininzia con http o https.',
      'img.url' => 'l\'url dell\'immagine non ininzia con http o https.',
      'description.required' => 'La descrizione è oblligatoria.',
      'description.string' => 'La descrizione deve essere una stringa.',
    ]);

    $data = $request->all();

    $project = new Project();

    $project->fill($data);

    $project->save();

    return to_route('admin.projects.show', compact('project'))->with('type', 'success')->with('message', 'Il progetto è stato creato con successo!');
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
      'description' => 'required|string',
      'url' => 'url:http,https|nullable',
      'img' => 'url:http,https|nullable',
    ], [
      'title.required' => 'Il titolo è obbligatorio.',
      'url.url' => 'l\'url non ininzia con http o https.',
      'img.url' => 'l\'url dell\'immagine non ininzia con http o https.',
      'description.required' => 'La descrizione è oblligatoria.',
      'description.string' => 'La descrizione deve essere una stringa.',
    ]);

    $data = $request->all();
    $project->update($data);
    return to_route('admin.projects.show', compact('project'))->with('type', 'success')->with('message', 'Il progetto è stato modificato con successo!');
  }

  /**
   * Remove the specified resource from storage.
   */
  public function destroy(Project $project)
  {
    $project->delete();
    return to_route('admin.projects.index')->with('type', 'success')->with('message', 'Il progetto è stato spostato nel cestino!');
  }
}
