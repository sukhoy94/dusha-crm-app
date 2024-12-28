<?php

declare(strict_types=1);

namespace App\Http\Controllers\Projects;

use App\Enum\ProjectType;
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
        return view('projects.create', [
            'projectTypes' => ProjectType::cases(),
        ]);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|unique:projects|max:255',
            'description' => 'required',
            'type' => ['required', 'integer', 'in:' . implode(',', array_map(fn($type) => $type->getId(), ProjectType::cases()))],
        ]);

        $project = Project::create($validated);

        return redirect()->route('projects.index');
    }

    public function edit(Project $project)
    {
        return view(
            'projects.edit',
            [
                'project' => $project,
                'projectTypes' => ProjectType::cases(),
            ]
        );
    }

    public function update(Request $request, Project $project)
    {
        $project->update($request->toArray());

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
