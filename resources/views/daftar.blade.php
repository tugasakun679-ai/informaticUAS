@extends('layouts.app')

@section('title', 'Formulir Pendaftaran Mahasiswa Baru - Informatics Store')

@section('content')
<div class="animate-fade-in max-w-4xl mx-auto space-y-8">
    <!-- Header -->
    <div class="text-center py-4">
        <h1 class="font-outfit font-extrabold text-3xl sm:text-4xl text-white tracking-tight">
            Pendaftaran Mahasiswa Baru
        </h1>
        <p class="mt-2 text-slate-400 text-sm max-w-xl mx-auto">
            Silakan lengkapi formulir pendaftaran di bawah ini dengan data yang benar dan sah untuk bergabung dengan UNIROW.
        </p>
    </div>

    <!-- Form -->
    <form action="{{ route('uas.daftar.store') }}" method="POST" class="space-y-6">
        @csrf

        <!-- Section 1: Data Diri -->
        <div class="glass-card p-6 sm:p-8 rounded-3xl space-y-6">
            <h2 class="font-outfit font-bold text-xl text-white flex items-center gap-2 pb-3 border-b border-slate-800">
                <span class="h-7 w-7 rounded-lg bg-sky-500/10 text-sky-400 text-sm flex items-center justify-center font-bold">1</span>
                Data Diri Pendaftar
            </h2>

            <div class="grid grid-cols-1 sm:grid-cols-2 gap-5">
                <!-- Nama Lengkap -->
                <div class="sm:col-span-2 space-y-1.5">
                    <label for="nama" class="text-xs text-slate-450 font-bold uppercase tracking-wider">Nama Lengkap</label>
                    <input type="text" name="nama" id="nama" value="{{ old('nama') }}" required placeholder="Masukkan nama lengkap sesuai ijazah"
                           class="w-full px-4 py-2.5 bg-slate-900 border border-slate-700/80 rounded-xl text-slate-200 placeholder-slate-500 focus:outline-none focus:border-sky-500 transition-colors text-sm @error('nama') border-rose-500 @enderror">
                    @error('nama')
                        <p class="text-xs text-rose-400 mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Tempat Lahir -->
                <div class="space-y-1.5">
                    <label for="tempat_lahir" class="text-xs text-slate-450 font-bold uppercase tracking-wider">Tempat Lahir</label>
                    <input type="text" name="tempat_lahir" id="tempat_lahir" value="{{ old('tempat_lahir') }}" required placeholder="Contoh: Tuban"
                           class="w-full px-4 py-2.5 bg-slate-900 border border-slate-700/80 rounded-xl text-slate-200 placeholder-slate-500 focus:outline-none focus:border-sky-500 transition-colors text-sm @error('tempat_lahir') border-rose-500 @enderror">
                    @error('tempat_lahir')
                        <p class="text-xs text-rose-400 mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Tanggal Lahir -->
                <div class="space-y-1.5">
                    <label for="tanggal_lahir" class="text-xs text-slate-450 font-bold uppercase tracking-wider">Tanggal Lahir</label>
                    <input type="date" name="tanggal_lahir" id="tanggal_lahir" value="{{ old('tanggal_lahir') }}" required
                           class="w-full px-4 py-2.5 bg-slate-900 border border-slate-700/80 rounded-xl text-slate-200 focus:outline-none focus:border-sky-500 transition-colors text-sm @error('tanggal_lahir') border-rose-500 @enderror">
                    @error('tanggal_lahir')
                        <p class="text-xs text-rose-400 mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Jenis Kelamin -->
                <div class="sm:col-span-2 space-y-2">
                    <label class="text-xs text-slate-450 font-bold uppercase tracking-wider block">Jenis Kelamin</label>
                    <div class="flex gap-6 mt-1">
                        <label class="flex items-center gap-2 cursor-pointer text-sm text-slate-300">
                            <input type="radio" name="jk" value="Laki-laki" {{ old('jk') == 'Laki-laki' ? 'checked' : '' }} required
                                   class="h-4 w-4 text-sky-500 focus:ring-sky-500 bg-slate-900 border-slate-700">
                            Laki-laki
                        </label>
                        <label class="flex items-center gap-2 cursor-pointer text-sm text-slate-300">
                            <input type="radio" name="jk" value="Perempuan" {{ old('jk') == 'Perempuan' ? 'checked' : '' }} required
                                   class="h-4 w-4 text-sky-500 focus:ring-sky-500 bg-slate-900 border-slate-700">
                            Perempuan
                        </label>
                    </div>
                    @error('jk')
                        <p class="text-xs text-rose-400 mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Alamat Lengkap -->
                <div class="sm:col-span-2 space-y-1.5">
                    <label for="alamat" class="text-xs text-slate-450 font-bold uppercase tracking-wider">Alamat Lengkap</label>
                    <textarea name="alamat" id="alamat" rows="3" required placeholder="Tuliskan alamat domisili lengkap saat ini..."
                              class="w-full px-4 py-2.5 bg-slate-900 border border-slate-700/80 rounded-xl text-slate-200 placeholder-slate-500 focus:outline-none focus:border-sky-500 transition-colors text-sm @error('alamat') border-rose-500 @enderror">{{ old('alamat') }}</textarea>
                    @error('alamat')
                        <p class="text-xs text-rose-400 mt-1">{{ $message }}</p>
                    @enderror
                </div>
            </div>
        </div>

        <!-- Section 2: Data Pendidikan & Nilai -->
        <div class="glass-card p-6 sm:p-8 rounded-3xl space-y-6">
            <h2 class="font-outfit font-bold text-xl text-white flex items-center gap-2 pb-3 border-b border-slate-800">
                <span class="h-7 w-7 rounded-lg bg-sky-500/10 text-sky-400 text-sm flex items-center justify-center font-bold">2</span>
                Asal Sekolah & Nilai UAN
            </h2>

            <div class="grid grid-cols-1 sm:grid-cols-3 gap-5">
                <!-- Sekolah Asal (Jenis) -->
                <div class="sm:col-span-1 space-y-2">
                    <label class="text-xs text-slate-450 font-bold uppercase tracking-wider block">Jenis Sekolah</label>
                    <div class="flex flex-col gap-2.5 mt-1">
                        <label class="flex items-center gap-2 cursor-pointer text-sm text-slate-300">
                            <input type="radio" name="sekolah" value="SMA" {{ old('sekolah') == 'SMA' ? 'checked' : '' }} required
                                   class="h-4 w-4 text-sky-500 focus:ring-sky-500 bg-slate-900 border-slate-700">
                            SMA (Sekolah Menengah Atas)
                        </label>
                        <label class="flex items-center gap-2 cursor-pointer text-sm text-slate-300">
                            <input type="radio" name="sekolah" value="MA" {{ old('sekolah') == 'MA' ? 'checked' : '' }} required
                                   class="h-4 w-4 text-sky-500 focus:ring-sky-500 bg-slate-900 border-slate-700">
                            MA (Madrasah Aliyah)
                        </label>
                        <label class="flex items-center gap-2 cursor-pointer text-sm text-slate-300">
                            <input type="radio" name="sekolah" value="SMK" {{ old('sekolah') == 'SMK' ? 'checked' : '' }} required
                                   class="h-4 w-4 text-sky-500 focus:ring-sky-500 bg-slate-900 border-slate-700">
                            SMK (Sekolah Menengah Kejuruan)
                        </label>
                    </div>
                    @error('sekolah')
                        <p class="text-xs text-rose-400 mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Nama Sekolah -->
                <div class="sm:col-span-2 space-y-1.5">
                    <label for="sekolah_nama" class="text-xs text-slate-450 font-bold uppercase tracking-wider">Nama Sekolah</label>
                    <input type="text" name="sekolah_nama" id="sekolah_nama" value="{{ old('sekolah_nama') }}" required placeholder="Contoh: SMA Negeri 1 Tuban"
                           class="w-full px-4 py-2.5 bg-slate-900 border border-slate-700/80 rounded-xl text-slate-200 placeholder-slate-500 focus:outline-none focus:border-sky-500 transition-colors text-sm @error('sekolah_nama') border-rose-500 @enderror">
                    @error('sekolah_nama')
                        <p class="text-xs text-rose-400 mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Nilai UAN Matematika -->
                <div class="space-y-1.5">
                    <label for="mtk" class="text-xs text-slate-450 font-bold uppercase tracking-wider">Nilai Matematika</label>
                    <input type="number" step="0.01" name="mtk" id="mtk" value="{{ old('mtk') }}" required placeholder="0.00" min="0" max="100"
                           class="w-full px-4 py-2.5 bg-slate-900 border border-slate-700/80 rounded-xl text-slate-200 placeholder-slate-500 focus:outline-none focus:border-sky-500 transition-colors text-sm @error('mtk') border-rose-500 @enderror">
                    @error('mtk')
                        <p class="text-xs text-rose-400 mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Nilai UAN Inggris -->
                <div class="space-y-1.5">
                    <label for="inggris" class="text-xs text-slate-450 font-bold uppercase tracking-wider">Nilai B. Inggris</label>
                    <input type="number" step="0.01" name="inggris" id="inggris" value="{{ old('inggris') }}" required placeholder="0.00" min="0" max="100"
                           class="w-full px-4 py-2.5 bg-slate-900 border border-slate-700/80 rounded-xl text-slate-200 placeholder-slate-500 focus:outline-none focus:border-sky-500 transition-colors text-sm @error('inggris') border-rose-500 @enderror">
                    @error('inggris')
                        <p class="text-xs text-rose-400 mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Nilai UAN Indonesia -->
                <div class="space-y-1.5">
                    <label for="indo" class="text-xs text-slate-450 font-bold uppercase tracking-wider">Nilai B. Indonesia</label>
                    <input type="number" step="0.01" name="indo" id="indo" value="{{ old('indo') }}" required placeholder="0.00" min="0" max="100"
                           class="w-full px-4 py-2.5 bg-slate-900 border border-slate-700/80 rounded-xl text-slate-200 placeholder-slate-500 focus:outline-none focus:border-sky-500 transition-colors text-sm @error('indo') border-rose-500 @enderror">
                    @error('indo')
                        <p class="text-xs text-rose-400 mt-1">{{ $message }}</p>
                    @enderror
                </div>
            </div>
        </div>

        <!-- Section 3: Pilihan Jurusan & Alasan -->
        <div class="glass-card p-6 sm:p-8 rounded-3xl space-y-6">
            <h2 class="font-outfit font-bold text-xl text-white flex items-center gap-2 pb-3 border-b border-slate-800">
                <span class="h-7 w-7 rounded-lg bg-sky-500/10 text-sky-400 text-sm flex items-center justify-center font-bold">3</span>
                Pilihan Jurusan & Komitmen
            </h2>

            <div class="grid grid-cols-1 sm:grid-cols-2 gap-5">
                <!-- Pilihan 1 -->
                <div class="space-y-1.5">
                    <label for="jurusan1" class="text-xs text-slate-450 font-bold uppercase tracking-wider">Jurusan Pilihan 1</label>
                    <select name="jurusan1" id="jurusan1" required
                            class="w-full px-4 py-2.5 bg-slate-900 border border-slate-700/80 rounded-xl text-slate-250 focus:outline-none focus:border-sky-500 transition-colors text-sm">
                        <option value="TEKNIK INFORMATIKA" {{ old('jurusan1') == 'TEKNIK INFORMATIKA' ? 'selected' : '' }}>TEKNIK INFORMATIKA</option>
                        <option value="SISTEM INFORMASI" {{ old('jurusan1') == 'SISTEM INFORMASI' ? 'selected' : '' }}>SISTEM INFORMASI</option>
                        <option value="TEKNIK INDUSTRI" {{ old('jurusan1') == 'TEKNIK INDUSTRI' ? 'selected' : '' }}>TEKNIK INDUSTRI</option>
                    </select>
                    @error('jurusan1')
                        <p class="text-xs text-rose-400 mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Pilihan 2 -->
                <div class="space-y-1.5">
                    <label for="jurusan2" class="text-xs text-slate-450 font-bold uppercase tracking-wider">Jurusan Pilihan 2</label>
                    <select name="jurusan2" id="jurusan2" required
                            class="w-full px-4 py-2.5 bg-slate-900 border border-slate-700/80 rounded-xl text-slate-250 focus:outline-none focus:border-sky-500 transition-colors text-sm">
                        <option value="SISTEM INFORMASI" {{ old('jurusan2') == 'SISTEM INFORMASI' ? 'selected' : '' }}>SISTEM INFORMASI</option>
                        <option value="TEKNIK INFORMATIKA" {{ old('jurusan2') == 'TEKNIK INFORMATIKA' ? 'selected' : '' }}>TEKNIK INFORMATIKA</option>
                        <option value="TEKNIK INDUSTRI" {{ old('jurusan2') == 'TEKNIK INDUSTRI' ? 'selected' : '' }}>TEKNIK INDUSTRI</option>
                    </select>
                    @error('jurusan2')
                        <p class="text-xs text-rose-400 mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Alasan Masuk UNIROW -->
                <div class="sm:col-span-2 space-y-1.5">
                    <label for="alasan" class="text-xs text-slate-450 font-bold uppercase tracking-wider">Alasan Masuk UNIROW</label>
                    <textarea name="alasan" id="alasan" rows="3" required placeholder="Tuliskan motivasi dan alasan Anda memilih berkuliah di UNIROW..."
                              class="w-full px-4 py-2.5 bg-slate-900 border border-slate-700/80 rounded-xl text-slate-200 placeholder-slate-500 focus:outline-none focus:border-sky-500 transition-colors text-sm @error('alasan') border-rose-500 @enderror">{{ old('alasan') }}</textarea>
                    @error('alasan')
                        <p class="text-xs text-rose-400 mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Agreement Checkbox -->
                <div class="sm:col-span-2 pt-2">
                    <label class="flex items-start gap-3 cursor-pointer text-xs text-slate-400 leading-normal">
                        <input type="checkbox" name="setuju" required class="h-4.5 w-4.5 text-sky-500 focus:ring-sky-500 bg-slate-900 border-slate-700 rounded mt-0.5">
                        <span>Saya menyatakan bahwa seluruh data yang diberikan adalah benar dan sesuai dengan keadaan yang sebenarnya. Saya bersedia menerima sanksi apabila data yang saya berikan terbukti tidak benar.</span>
                    </label>
                </div>
            </div>
        </div>

        <!-- Buttons -->
        <div class="flex items-center justify-end gap-4 pt-4">
            <button type="reset" class="px-6 py-3 rounded-xl border border-slate-700 text-slate-400 hover:text-white hover:bg-slate-800 transition-all font-semibold text-sm">
                Batal
            </button>
            <button type="submit" class="glow-btn px-8 py-3 rounded-xl text-slate-900 bg-gradient-to-r from-sky-400 to-blue-500 font-extrabold text-sm shadow-md shadow-sky-500/10">
                Kirim Pendaftaran
            </button>
        </div>
    </form>
</div>
@endsection
