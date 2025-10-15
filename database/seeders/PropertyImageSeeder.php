<?php

namespace Database\Seeders;

use App\Models\Property;
use App\Models\PropertyImage;
use Illuminate\Database\Seeder;

class PropertyImageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Pastikan sudah ada data di tabel properties
        $properties = Property::all();

        if ($properties->isEmpty()) {
            $this->command->warn('Cannot found properties data. Run PropertySeeder.');
            return;
        }

        foreach ($properties as $property) {
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
                PropertyImage::create([
                    'property_id' => $property->id,
                    'image_path' => $imageLink,
                ]);
            }
        }

        $this->command->info('PropertyImageSeeder successfully added.');
    }
}
