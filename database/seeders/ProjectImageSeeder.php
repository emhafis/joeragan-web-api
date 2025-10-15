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
        // Pastikan sudah ada data di tabel properties
        $projects = Project::all();

        if ($projects->isEmpty()) {
            $this->command->warn('Cannot found properties data. Run PropertySeeder.');
            return;
        }

        foreach ($projects as $project) {
            // Contoh link gambar nyata (bisa kamu ganti dengan link CDN atau storage lokal)
            $imageLinks = [
                'https://images.unsplash.com/photo-1600585154340-be6161a56a0c',
                'https://images.unsplash.com/photo-1572120360610-d971b9b78825',
                'https://images.unsplash.com/photo-1599423300746-b62533397364',
                'https://images.unsplash.com/photo-1560448204-e02f11c3d0e2',
                'https://images.unsplash.com/photo-1570129477492-45c003edd2be',
            ];

            // Set jumlah gambar per property (acak 2–4 gambar)
            $count = rand(2, 4);

            foreach (array_slice($imageLinks, 0, $count) as $imageLink) {
                ProjectImage::create([
                    'project_id' => $project->id,
                    'image_path' => $imageLink,
                ]);
            }
        }

        $this->command->info('PropertyImageSeeder successfully added.');
    }
}
