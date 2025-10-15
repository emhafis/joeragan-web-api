<?php

namespace Database\Seeders;

use App\Models\Project;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ProjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $projects = [
            [
                'title' => 'Renovasi Kantor Pusat Afaris Group',
                'category' => 'Konstruksi',
                'location' => 'Jakarta Selatan',
                'description' => 'Proyek renovasi total gedung kantor pusat Afaris Group dengan desain modern dan efisien energi.',
                'client_name' => 'Afaris Group',
            ],
            [
                'title' => 'Desain Interior Rumah Mewah Pondok Indah',
                'category' => 'Interior',
                'location' => 'Pondok Indah, Jakarta',
                'description' => 'Desain interior rumah bergaya kontemporer dengan nuansa hangat dan elegan.',
                'client_name' => 'Bapak Ahmad Sulaiman',
            ],
            [
                'title' => 'Pembangunan Gudang Logistik BI Logistics',
                'category' => 'Konstruksi',
                'location' => 'Bekasi',
                'description' => 'Pembangunan gudang logistik berkapasitas besar untuk penyimpanan barang industri.',
                'client_name' => 'BI Logistics',
            ],
            [
                'title' => 'Desain Kantor Startup TechHive',
                'category' => 'Interior',
                'location' => 'BSD City, Tangerang',
                'description' => 'Desain kantor terbuka dengan konsep coworking space yang kreatif dan produktif.',
                'client_name' => 'TechHive Indonesia',
            ],
            [
                'title' => 'Renovasi Apartemen The Mansion',
                'category' => 'Interior',
                'location' => 'Kemayoran, Jakarta',
                'description' => 'Renovasi unit apartemen premium dengan desain minimalis modern.',
                'client_name' => 'Ibu Ratna Dewi',
            ],
            [
                'title' => 'Pembangunan Villa Lembah Hijau',
                'category' => 'Konstruksi',
                'location' => 'Puncak, Bogor',
                'description' => 'Pembangunan villa pribadi di kawasan pegunungan dengan konsep tropis.',
                'client_name' => 'PT Lembah Hijau Sejahtera',
            ],
            [
                'title' => 'Desain Interior Restoran Kopi Tepi Danau',
                'category' => 'Interior',
                'location' => 'Bandung',
                'description' => 'Desain interior kafe bernuansa alam dengan sentuhan kayu alami dan pencahayaan lembut.',
                'client_name' => 'Kopi Tepi Danau',
            ],
            [
                'title' => 'Renovasi Gedung Sekolah Cendekia',
                'category' => 'Konstruksi',
                'location' => 'Depok',
                'description' => 'Peremajaan bangunan sekolah agar lebih modern dan ramah lingkungan.',
                'client_name' => 'Yayasan Cendekia Muda',
            ],
            [
                'title' => 'Desain Interior Kantor Bank Syariah Nusantara',
                'category' => 'Interior',
                'location' => 'Jakarta Pusat',
                'description' => 'Desain interior kantor bank dengan nuansa profesional dan islami.',
                'client_name' => 'Bank Syariah Nusantara',
            ],
            [
                'title' => 'Pembangunan Gedung Serbaguna Afaris Convention Center',
                'category' => 'Konstruksi',
                'location' => 'Bogor',
                'description' => 'Pembangunan gedung serbaguna untuk acara bisnis, pameran, dan pernikahan.',
                'client_name' => 'Afaris Group',
            ],
        ];

        foreach ($projects as $project) {
            Project::create([
                'title' => $project['title'],
                'slug' => \Illuminate\Support\Str::slug($project['title']),
                'category' => $project['category'],
                'location' => $project['location'],
                'description' => $project['description'],
                'client_name' => $project['client_name'],
                'featured_image' => null,
            ]);
        }
    }
}
