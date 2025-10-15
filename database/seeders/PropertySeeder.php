<?php

namespace Database\Seeders;

use App\Models\Property;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;

class PropertySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $properties = [
            [
                'name' => 'Kosan Putri Mawar Indah',
                'slug' => Str::slug('Kosan Putri Mawar Indah'),
                'address' => 'Jl. Melati No. 12, Sleman, Yogyakarta',
                'category' => 'kosan',
                'description' => 'Kosan eksklusif untuk putri, lokasi strategis dekat kampus UGM dan UNY.',
                'land_area' => 120,
                'type' => null,
                'price' => 1500000,
                'facilities' => ['WiFi', 'AC', 'Kamar mandi dalam', 'Dapur bersama', 'Parkir motor'],
                'remaining_units' => 3,
                'status' => 'available',
                'featured_image' => null,
            ],
            [
                'name' => 'Kosan Putra Griya Bahagia',
                'slug' => Str::slug('Kosan Putra Griya Bahagia'),
                'address' => 'Jl. Kaliurang Km 5, Sleman, Yogyakarta',
                'category' => 'kosan',
                'description' => 'Kosan nyaman untuk mahasiswa, dekat kampus dan area kuliner.',
                'land_area' => 150,
                'type' => null,
                'price' => 1300000,
                'facilities' => ['WiFi', 'Kamar mandi dalam', 'Parkir motor', 'Dapur umum'],
                'remaining_units' => 5,
                'status' => 'available',
                'featured_image' => null,
            ],
            [
                'name' => 'Afaris Residence Condong Catur',
                'slug' => Str::slug('Afaris Residence Condong Catur'),
                'address' => 'Jl. Anggrek No. 9, Condong Catur, Sleman',
                'category' => 'residence',
                'description' => 'Hunian modern dengan fasilitas lengkap dan keamanan 24 jam.',
                'land_area' => 300,
                'type' => 2,
                'price' => 250000000,
                'facilities' => ['Kolam renang', 'Keamanan 24 jam', 'Garasi', 'Taman', 'AC'],
                'remaining_units' => 2,
                'status' => 'available',
                'featured_image' => null,
            ],
            [
                'name' => 'Kosan Putri Melati Asri',
                'slug' => Str::slug('Kosan Putri Melati Asri'),
                'address' => 'Jl. Cendana No. 5, Depok, Sleman',
                'category' => 'kosan',
                'description' => 'Kosan khusus putri dengan suasana tenang dan nyaman.',
                'land_area' => 100,
                'type' => null,
                'price' => 1200000,
                'facilities' => ['WiFi', 'Kamar mandi dalam', 'Laundry', 'Parkir motor'],
                'remaining_units' => 4,
                'status' => 'available',
                'featured_image' => null,
            ],
            [
                'name' => 'Griya Harmoni Residence',
                'slug' => Str::slug('Griya Harmoni Residence'),
                'address' => 'Jl. Kenanga No. 15, Bantul, Yogyakarta',
                'category' => 'residence',
                'description' => 'Rumah siap huni dengan desain minimalis dan lingkungan asri.',
                'land_area' => 250,
                'type' => 3,
                'price' => 325000000,
                'facilities' => ['Garasi', 'Taman', 'AC', 'Dapur modern', 'Carport'],
                'remaining_units' => 1,
                'status' => 'available',
                'featured_image' => null,
            ],
            [
                'name' => 'Kosan Putra Cendana',
                'slug' => Str::slug('Kosan Putra Cendana'),
                'address' => 'Jl. Cendana No. 21, Sleman, Yogyakarta',
                'category' => 'kosan',
                'description' => 'Kosan murah dan nyaman, cocok untuk mahasiswa dan pekerja.',
                'land_area' => 90,
                'type' => null,
                'price' => 1000000,
                'facilities' => ['WiFi', 'Parkir motor', 'Dapur bersama'],
                'remaining_units' => 6,
                'status' => 'available',
                'featured_image' => null,
            ],
            [
                'name' => 'Afaris Residence Seturan',
                'slug' => Str::slug('Afaris Residence Seturan'),
                'address' => 'Jl. Seturan Raya No. 3, Sleman, Yogyakarta',
                'category' => 'residence',
                'description' => 'Hunian eksklusif dengan konsep modern dan lokasi strategis.',
                'land_area' => 280,
                'type' => 4,
                'price' => 450000000,
                'facilities' => ['Kolam renang', 'CCTV', 'Garasi', 'Taman', 'Air panas'],
                'remaining_units' => 1,
                'status' => 'available',
                'featured_image' => null,
            ],
            [
                'name' => 'Kosan Putri Dahlia',
                'slug' => Str::slug('Kosan Putri Dahlia'),
                'address' => 'Jl. Monjali No. 8, Sleman, Yogyakarta',
                'category' => 'kosan',
                'description' => 'Kosan bersih, aman, dan nyaman untuk mahasiswi.',
                'land_area' => 110,
                'type' => null,
                'price' => 1400000,
                'facilities' => ['WiFi', 'AC', 'Kamar mandi dalam', 'Laundry'],
                'remaining_units' => 2,
                'status' => 'available',
                'featured_image' => null,
            ],
            [
                'name' => 'Afaris Garden Residence',
                'slug' => Str::slug('Afaris Garden Residence'),
                'address' => 'Jl. Lempongsari No. 17, Sleman, Yogyakarta',
                'category' => 'residence',
                'description' => 'Rumah modern dengan taman pribadi dan lingkungan nyaman.',
                'land_area' => 320,
                'type' => 4,
                'price' => 500000000,
                'facilities' => ['Garasi', 'Taman', 'AC', 'Ruang keluarga luas'],
                'remaining_units' => 1,
                'status' => 'available',
                'featured_image' => null,
            ],
            [
                'name' => 'Kosan Putra Wijaya',
                'slug' => Str::slug('Kosan Putra Wijaya'),
                'address' => 'Jl. Pogung Lor No. 22, Sleman, Yogyakarta',
                'category' => 'kosan',
                'description' => 'Kosan dengan fasilitas lengkap dan akses mudah ke kampus.',
                'land_area' => 130,
                'type' => null,
                'price' => 1600000,
                'facilities' => ['WiFi', 'AC', 'Parkir motor', 'Kamar mandi dalam'],
                'remaining_units' => 3,
                'status' => 'available',
                'featured_image' => null,
            ],
        ];

        foreach ($properties as $property) {
            Property::create($property);
        }
    }
}
