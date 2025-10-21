<?php

namespace Database\Seeders;

use App\Models\Project;
use App\Models\ProjectImage;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ProjectImageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Ambil semua data project
        $projects = Project::all();

        if ($projects->isEmpty()) {
            $this->command->warn('⚠️ Tidak ditemukan data Project. Jalankan ProjectSeeder terlebih dahulu.');
            return;
        }

        // Daftar contoh gambar (bebas kamu ganti)
        $imageLinks = [
            'https://images.unsplash.com/photo-1600585154340-be6161a56a0c',
            'https://images.unsplash.com/photo-1572120360610-d971b9b78825',
            'https://images.unsplash.com/photo-1599423300746-b62533397364',
            'https://images.unsplash.com/photo-1560448204-e02f11c3d0e2',
            'https://images.unsplash.com/photo-1570129477492-45c003edd2be',
        ];

        // Kategori tetap untuk setiap project
        $categories = ['before', 'progress', 'after'];

        foreach ($projects as $project) {
            foreach ($categories as $category) {
                // Tentukan jumlah gambar acak per kategori
                $count = rand(2, 4);

                foreach (array_slice($imageLinks, 0, $count) as $imageLink) {
                    ProjectImage::create([
                        'project_id' => $project->id,
                        'category'   => $category,
                        'image_path' => $imageLink,
                    ]);
                }
            }
        }

        $this->command->info('✅ ProjectImageSeeder berhasil menambahkan gambar untuk setiap kategori (before, progress, after).');
    }
}
