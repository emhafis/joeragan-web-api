<?php

namespace App\Http\Controllers\Api\V1;

use App\Models\Project;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use App\Http\Resources\ProjectResource;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\StoreProjectRequest;
use App\Http\Requests\UpdateProjectRequest;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): JsonResponse
    {
        $projects = Project::latest()->paginate(10);

        return response()->json([
            'success' => true,
            'massage' => 'List of projects retrieved successfully.',
            'data' => ProjectResource::collection($projects),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreProjectRequest $request): JsonResponse
    {
        $validated = $request->validated();

        if ($request->hasFile('featured_image')) {
            $validated['featured_image'] = $request
                ->file('featured_image')
                ->store('project-images', 'public');
        }

        $project = Project::create($validated);

        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $file) {
                $path = $file->store('project-images', 'public');
                $project->images()->create(['image_path' => $path]);
            }
        }

        return response()->json([
            'success' => true,
            'massage' => 'Project created successfully.',
            'data' => new ProjectResource($project->load('images'))
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateProjectRequest $request, Project $project)
    {
        $validated = $request->validated();

        if ($request->hasFile('featured_image')) {
            if ($project->featured_image && Storage::disk('public')->exists($project->featured_image)) {
                Storage::disk('public')->delete($project->featured_image);
            }

            $validated['featured_image'] = $request
                ->file('featured_image')
                ->store('project-images', 'public');
        }

        $project->update($validated);

        // Ganti semua gambar jika dikirim ulang
        if ($request->hasFile('images')) {
            // Hapus file lama
            foreach ($project->images as $img) {
                if (Storage::disk('public')->exists($img->image_path)) {
                    Storage::disk('public')->delete($img->image_path);
                }
            }
            $project->images()->delete();

            foreach ($request->file('images') as $file) {
                $path = $file->store('project-images', 'public');
                $project->images()->create(['image_path' => $path]);
            }
        }

        return response()->json([
            'success' => true,
            'message' => 'Property updated successfully.',
            'data' => new ProjectResource($project->load('images')),
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Project $project): JsonResponse
    {
        if ($project->featured_image && Storage::disk('public')->exists($project->featured_image)) {
            Storage::disk('public')->delete($project->featured_image);
        }

        foreach ($project->images as $img) {
            if (Storage::disk('public')->exists($img->image_path)) {
                Storage::disk('public')->delete($img->image_path);
            }
        }

        $project->images()->delete();
        $project->delete();

        return response()->json([
            'success' => true,
            'message' => 'Property and all related images deleted successfully.',
        ]);
    }
}
