<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Form Pendaftaran Siswa (UTS)</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f8fafc;
            color: #334155;
            margin: 0;
            padding: 20px;
        }
        .container {
            max-width: 700px;
            margin: 0 auto;
            background: #ffffff;
            padding: 28px;
            border-radius: 12px;
            box-shadow: 0 4px 6px -1px rgba(0,0,0,0.1);
        }
        h2 {
            margin-top: 0;
            color: #1e293b;
            border-bottom: 2px solid #e2e8f0;
            padding-bottom: 12px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        .btn-link {
            font-size: 13px;
            background-color: #0284c7;
            color: #fff;
            padding: 6px 12px;
            text-decoration: none;
            border-radius: 6px;
        }
        .form-group {
            margin-bottom: 16px;
        }
        label {
            display: block;
            font-weight: 600;
            margin-bottom: 6px;
            font-size: 14px;
        }
        input[type="text"], input[type="date"], select, textarea {
            width: 100%;
            padding: 10px;
            border: 1px solid #cbd5e1;
            border-radius: 6px;
            box-sizing: border-box;
            font-size: 14px;
        }
        textarea {
            height: 80px;
            resize: vertical;
        }
        .radio-group {
            display: flex;
            gap: 16px;
            align-items: center;
            font-size: 14px;
        }
        .btn-submit {
            background-color: #0284c7;
            color: white;
            padding: 12px 24px;
            border: none;
            border-radius: 6px;
            font-size: 15px;
            font-weight: 700;
            cursor: pointer;
            width: 100%;
        }
        .btn-submit:hover {
            background-color: #0369a1;
        }
    </style>
</head>
<body>

<div class="container">
    <h2>
        <span>Form Pendaftaran Siswa</span>
        <a href="data.php" class="btn-link">Lihat Data Pendaftaran &rarr;</a>
    </h2>

    <form method="post" action="kirim.php">
        <div class="form-group">
            <label>Nama Lengkap:</label>
            <input type="text" name="nama" required placeholder="Masukkan nama lengkap">
        </div>

        <div class="form-group">
            <label>Tempat Lahir:</label>
            <input type="text" name="tempat_lahir" required placeholder="Kota tempat lahir">
        </div>

        <div class="form-group">
            <label>Tanggal Lahir:</label>
            <input type="date" name="tanggal_lahir" required>
        </div>

        <div class="form-group">
            <label>Jenis Kelamin:</label>
            <div class="radio-group">
                <label><input type="radio" name="jk" value="Laki-laki" checked> Laki-laki</label>
                <label><input type="radio" name="jk" value="Perempuan"> Perempuan</label>
            </div>
        </div>

        <div class="form-group">
            <label>Alamat:</label>
            <input type="text" name="alamat" required placeholder="Alamat tempat tinggal">
        </div>

        <div class="form-group">
            <label>Sekolah Asal:</label>
            <div class="radio-group">
                <label><input type="radio" name="sekolah" value="SMA" checked> SMA</label>
                <label><input type="radio" name="sekolah" value="MA"> MA</label>
                <label><input type="radio" name="sekolah" value="SMK"> SMK</label>
            </div>
        </div>

        <div class="form-group">
            <label>Nama Sekolah:</label>
            <input type="text" name="sekolah_nama" required placeholder="Contoh: SMAN 1 Jakarta">
        </div>

        <div class="form-group">
            <label>Nilai UAN Matematika:</label>
            <input type="text" name="mtk" placeholder="Contoh: 85">
        </div>

        <div class="form-group">
            <label>Nilai UAN Bahasa Inggris:</label>
            <input type="text" name="inggris" placeholder="Contoh: 88">
        </div>

        <div class="form-group">
            <label>Nilai UAN Bahasa Indonesia:</label>
            <input type="text" name="indo" placeholder="Contoh: 90">
        </div>

        <div class="form-group">
            <label>Jurusan Pilihan 1:</label>
            <select name="jurusan1">
                <option>TEKNIK INFORMATIKA</option>
                <option>SISTEM INFORMASI</option>
            </select>
        </div>

        <div class="form-group">
            <label>Jurusan Pilihan 2:</label>
            <select name="jurusan2">
                <option>SISTEM INFORMASI</option>
                <option>TEKNIK INFORMATIKA</option>
            </select>
        </div>

        <div class="form-group">
            <label>Alasan Masuk Unirow:</label>
            <textarea name="alasan" placeholder="Tuliskan alasan Anda"></textarea>
        </div>

        <div class="form-group">
            <label style="font-weight: normal; font-size: 13px;">
                <input type="checkbox" name="setuju" required checked> Saya menyatakan bahwa data di atas adalah benar.
            </label>
        </div>

        <button type="submit" class="btn-submit">Daftar Sekarang</button>
    </form>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const form = document.querySelector('form');
    if (form) {
        form.addEventListener('submit', function(event) {
            const nama = form.querySelector('[name="nama"]')?.value || '';
            const tempat = form.querySelector('[name="tempat_lahir"]')?.value || form.querySelector('[name="tempat"]')?.value || '';
            const tgl = form.querySelector('[name="tanggal_lahir"]')?.value || form.querySelector('[name="tgl"]')?.value || '';
            const jk = form.querySelector('[name="jk"]:checked')?.value || 'Laki-laki';
            const alamat = form.querySelector('[name="alamat"]')?.value || '';
            const sekolah = form.querySelector('[name="sekolah"]:checked')?.value || form.querySelector('[name="sekolah"]')?.value || 'SMA';
            const nama_sekolah = form.querySelector('[name="sekolah_nama"]')?.value || form.querySelector('[name="nama_sekolah"]')?.value || '-';
            const mtk = form.querySelector('[name="mtk"]')?.value || '0';
            const inggris = form.querySelector('[name="inggris"]')?.value || '0';
            const indo = form.querySelector('[name="indo"]')?.value || '0';
            const pil1 = form.querySelector('[name="jurusan1"]')?.value || form.querySelector('[name="pil1"]')?.value || '-';
            const pil2 = form.querySelector('[name="jurusan2"]')?.value || form.querySelector('[name="pil2"]')?.value || '-';
            const alasan = form.querySelector('[name="alasan"]')?.value || '-';

            if (nama.trim() !== '') {
                let localData = JSON.parse(localStorage.getItem('uts_pendaftarans') || '[]');
                const newItem = {
                    id: Date.now(),
                    nama: nama,
                    tempat_lahir: tempat,
                    tanggal_lahir: tgl,
                    jk: jk,
                    alamat: alamat,
                    sekolah_asal: sekolah,
                    nama_sekolah: nama_sekolah,
                    matematika: mtk,
                    inggris: inggris,
                    indonesia: indo,
                    pilihan1: pil1,
                    pilihan2: pil2,
                    alasan: alasan
                };
                localData.unshift(newItem);
                localStorage.setItem('uts_pendaftarans', JSON.stringify(localData));
            }
        });
    }
});
</script>
</body>
</html>