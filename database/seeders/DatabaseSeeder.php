<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Create Admin User
        User::updateOrCreate(
            ['email' => 'admin@store.com'],
            [
                'name' => 'Administrator',
                'password' => bcrypt('admin123'),
            ]
        );

        // Seed default goods (barangs)
        \App\Models\Barang::updateOrCreate(
            ['kode_barang' => 'BRG-001'],
            [
                'nama_barang' => 'Celana Skena',
                'kategori' => 'Celana',
                'deskripsi' => 'Celana model skena yang sangat trendy dan nyaman digunakan sehari-hari dengan bahan premium.',
                'harga' => 30000,
                'stok' => 15,
                'gambar' => 'barangs/celana.jpg'
            ]
        );

        \App\Models\Barang::updateOrCreate(
            ['kode_barang' => 'BRG-002'],
            [
                'nama_barang' => 'Jacket Varsity',
                'kategori' => 'Jaket',
                'deskripsi' => 'Jaket berkualitas premium bergaya retro varsity dengan bahan tebal dan hangat.',
                'harga' => 125000,
                'stok' => 8,
                'gambar' => 'barangs/jaket.png'
            ]
        );

        \App\Models\Barang::updateOrCreate(
            ['kode_barang' => 'BRG-003'],
            [
                'nama_barang' => 'Kaos Varsity',
                'kategori' => 'Kaos',
                'deskripsi' => 'Kaos berkualitas tinggi dengan desain varsity yang sporty, cocok untuk hang out.',
                'harga' => 75000,
                'stok' => 25,
                'gambar' => 'barangs/kaos.jpeg'
            ]
        );
    }
}
