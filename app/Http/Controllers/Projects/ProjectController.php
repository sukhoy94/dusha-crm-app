<?php

declare(strict_types=1);

namespace App\Http\Controllers\Projects;

use App\Http\Controllers\Controller;
use App\Models\Project;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    public function index()
    {
        $projects = Project::orderBy('id')->paginate(30);
        return view('projects.index', compact('projects'));
    }

    public function create()
    {
        return view('projects.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|unique:projects|max:255',
            'description' => 'required',
        ]);

        $project = Project::create($validated);
        return redirect()->route('projects.index');
    }

    public function edit(Project $project)
    {
        return view('projects.edit', compact('project'));
    }

    public function update(Request $request, Project $project)
    {
        $validated = $request->validate([
            'title' => 'required|unique:projects|max:255',
            'description' => 'required',
        ]);
        $project->update($validated);

        return redirect()
            ->route('projects.edit', $project)
            ->with('success', 'Projekt został pomyślnie zaaktualizowany.');
    }

    public function destroy(Project $project)
    {
        $project->delete();
        return redirect()->route('projects.index')->with('success', "Projekt {$project->title} został usunięty");
    }
}
