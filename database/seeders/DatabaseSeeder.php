<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Barang;
use App\Models\Pendaftaran;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\File;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // 1. Create Admin User
        User::updateOrCreate(
            ['email' => 'admin@store.com'],
            [
                'name' => 'Administrator',
                'password' => bcrypt('admin123'),
            ]
        );

        // 2. Ensure product images exist in storage/app/public/barangs
        $targetDir = storage_path('app/public/barangs');
        if (!File::exists($targetDir)) {
            File::makeDirectory($targetDir, 0755, true, true);
        }

        $sourceDir = public_path('store/gambar');
        if (File::exists($sourceDir)) {
            $images = ['celana.jpg', 'jaket.png', 'kaos.jpeg', 'back(1).jpg'];
            foreach ($images as $img) {
                $src = $sourceDir . '/' . $img;
                $dst = $targetDir . '/' . $img;
                if (File::exists($src) && !File::exists($dst)) {
                    File::copy($src, $dst);
                }
            }
        }

        // 3. Seed default goods (barangs)
        Barang::updateOrCreate(
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

        Barang::updateOrCreate(
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

        Barang::updateOrCreate(
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

        // 4. Seed default pendaftarans (for UTS & UAS Pendaftaran data)
        Pendaftaran::updateOrCreate(
            ['nama' => 'Ahmad Fauzi', 'tanggal_lahir' => '2002-05-14'],
            [
                'tempat_lahir' => 'Jakarta',
                'jk' => 'Laki-laki',
                'alamat' => 'Jl. Merdeka No. 10, Jakarta Pusat',
                'sekolah_asal' => 'SMA',
                'nama_sekolah' => 'SMAN 1 Jakarta',
                'matematika' => 88,
                'inggris' => 90,
                'indonesia' => 92,
                'pilihan1' => 'Teknik Informatika',
                'pilihan2' => 'Sistem Informasi',
                'alasan' => 'Berminat pada pengembangan perangkat lunak dan kecerdasan buatan.'
            ]
        );

        Pendaftaran::updateOrCreate(
            ['nama' => 'Siti Nurhaliza', 'tanggal_lahir' => '2003-08-22'],
            [
                'tempat_lahir' => 'Bandung',
                'jk' => 'Perempuan',
                'alamat' => 'Jl. Asia Afrika No. 45, Bandung',
                'sekolah_asal' => 'SMA',
                'nama_sekolah' => 'SMAN 3 Bandung',
                'matematika' => 95,
                'inggris' => 92,
                'indonesia' => 94,
                'pilihan1' => 'Teknik Informatika',
                'pilihan2' => 'Data Science',
                'alasan' => 'Ingin memperdalam ilmu analisis data dan machine learning.'
            ]
        );

        Pendaftaran::updateOrCreate(
            ['nama' => 'Budi Santoso', 'tanggal_lahir' => '2002-11-10'],
            [
                'tempat_lahir' => 'Surabaya',
                'jk' => 'Laki-laki',
                'alamat' => 'Jl. Pemuda No. 12, Surabaya',
                'sekolah_asal' => 'SMK',
                'nama_sekolah' => 'SMKN 1 Surabaya',
                'matematika' => 82,
                'inggris' => 85,
                'indonesia' => 88,
                'pilihan1' => 'Sistem Informasi',
                'pilihan2' => 'Teknik Informatika',
                'alasan' => 'Tertarik dengan manajemen sistem dan arsitektur database.'
            ]
        );
    }
}

