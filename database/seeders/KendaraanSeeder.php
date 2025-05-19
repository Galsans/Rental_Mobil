<?php

namespace Database\Seeders;

use App\Models\Kendaraan;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class KendaraanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Kendaraan::create([
            "nama_kendaraan" => 'Avanza',
            "deskripsi" => "lorem ipsum dolor sit emet",
            'img' => '/kendaraan/GBykJZJe6uxCERZMyOlcQeOZs7V6yEiUNkkjFNOA.webp',
            "category_id" => "d9afa434-c236-49f4-9ead-ad8bd081e8b5",
            "plat_nomor" => 'B 1407 SJA',
            "tahun" => '2017',
            "harga" => 200000,
            "user_id" => 1,
            "status" => 'tersedia',
        ]);

        Kendaraan::create([
            "nama_kendaraan" => 'Xenia',
            "deskripsi" => "lorem ipsum dolor sit emet",
            'img' => '/kendaraan/MrfuSN70guqfMEXdXrYpkt0oQb6FtUeVTp67occg.webp',
            "category_id" => "1ad9d3d6-2b58-42e2-92a5-5ffff755368e",
            "plat_nomor" => 'B 1407 SHA',
            "tahun" => '2016',
            "harga" => 130000,
            "user_id" => 1,
            "status" => 'tersedia',
        ]);
    }
}
