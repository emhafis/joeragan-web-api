<?php

namespace App\Http\Controllers\Api\V1;

use App\Models\Property;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use App\Http\Resources\PropertyResource;
use App\Http\Requests\StorePropertyRequest;
use App\Http\Requests\UpdatePropertyRequest;

class PropertyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): JsonResponse
    {
        $properties = Property::latest()->get();

        return response()->json(
            [
                'success' => true,
                'massage' => 'List of properties retrieved successfully.',
                'data' => PropertyResource::collection($properties),
            ]
        );
    }

    public function showBySlug($slug): JsonResponse
    {
        // Ambil property berdasarkan slug, beserta relasi images
        $property = Property::with('images')->where('slug', $slug)->first();

        // Jika tidak ditemukan
        if (!$property) {
            return response()->json(
                [
                    'success' => false,
                    'message' => 'Property not found.'
                ],
                404
            );
        }

        // Jika ditemukan, kembalikan data
        return response()->json(
            [
                'success' => true,
                'message' => 'Property retrieved successfully.',
                'data' => new PropertyResource($property),
            ]
        );
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePropertyRequest $request): JsonResponse
    {
        $validated = $request->validated();

        // Simpan featured image ke storage
        if ($request->hasFile('featured_image')) {
            $validated['featured_image'] = $request
                ->file('featured_image')
                ->store('property-images', 'public');
        }

        // Simpan data property
        $property = Property::create($validated);

        // Simpan gambar tambahan
        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $file) {
                $path = $file->store('property-images', 'public');
                $property->images()->create(['image_path' => $path]);
            }
        }

        return response()->json([
            'success' => true,
            'message' => 'Property created successfully.',
            'data' => new PropertyResource($property->load('images')),
        ], 201);
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
    public function update(UpdatePropertyRequest $request, Property $property): JsonResponse
    {
        $validated = $request->validated();

        // Update featured image jika ada file baru
        if ($request->hasFile('featured_image')) {
            if ($property->featured_image && Storage::disk('public')->exists($property->featured_image)) {
                Storage::disk('public')->delete($property->featured_image);
            }

            $validated['featured_image'] = $request
                ->file('featured_image')
                ->store('property-images', 'public');
        }

        if (isset($validated['name'])) {
            $property->slug = Property::generateUniqueSlug($validated['name'], $property->id);
        }

        $property->update($validated);

        // Ganti semua gambar jika dikirim ulang
        if ($request->hasFile('images')) {
            // Hapus file lama
            foreach ($property->images as $img) {
                if (Storage::disk('public')->exists($img->image_path)) {
                    Storage::disk('public')->delete($img->image_path);
                }
            }
            $property->images()->delete();

            // Simpan file baru
            foreach ($request->file('images') as $file) {
                $path = $file->store('property-images', 'public');
                $property->images()->create(['image_path' => $path]);
            }
        }

        return response()->json([
            'success' => true,
            'message' => 'Property updated successfully.',
            'data' => new PropertyResource($property->load('images')),
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Property $property): JsonResponse
    {
        // Hapus featured image jika ada
        if ($property->featured_image && Storage::disk('public')->exists($property->featured_image)) {
            Storage::disk('public')->delete($property->featured_image);
        }

        // Hapus semua gambar tambahan (dari relasi images)
        foreach ($property->images as $img) {
            if (Storage::disk('public')->exists($img->image_path)) {
                Storage::disk('public')->delete($img->image_path);
            }
        }

        // Hapus record relasi di database
        $property->images()->delete();

        // Hapus property utama
        $property->delete();

        return response()->json([
            'success' => true,
            'message' => 'Property and all related images deleted successfully.',
        ]);
    }
}
