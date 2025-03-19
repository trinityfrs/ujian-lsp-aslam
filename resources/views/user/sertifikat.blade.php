<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite('resources/css/app.css')
    <title>Sertifikat Saya</title>
</head>
<body class="flex justify-center items-center min-h-screen bg-gradient-to-r from-blue-900 to-blue-600">
    <div class="relative w-[90%] h-screen bg-white border-[10px] border-yellow-500 shadow-2xl p-12 flex flex-col justify-center items-center text-center rounded-lg">
        
        <!-- Border dekoratif dalam -->
        <div class="absolute inset-4 border-[5px] border-yellow-400"></div>

        <!-- Judul Sertifikat -->
        <h1 class="text-5xl font-extrabold text-gray-800 font-serif uppercase mt-10">Sertifikat Penghargaan</h1>
        <p class="text-lg text-gray-600 mt-2">Diberikan kepada</p>

        <!-- Nama Penerima -->
        <h2 class="text-4xl font-bold text-blue-900 uppercase mt-4">{{ $peserta->nama }}</h2>
        <p class="text-lg text-gray-700 mt-2">No. Sertifikat: <span class="font-semibold">{{ $peserta->no_sertif }}</span></p>

        <!-- Detail Pelatihan -->
        <p class="text-lg text-gray-700 mt-6">Sebagai peserta dalam</p>
        <h3 class="text-3xl font-semibold text-yellow-500 mt-2">{{ $peserta->tema_pelatihan }}</h3>
        <p class="text-lg text-gray-700 mt-2">Yang diselenggarakan oleh</p>
        <h3 class="text-2xl font-medium text-blue-800 mt-2">{{ $peserta->setting->instansi_pengajar }}</h3>

        <!-- Lokasi & Tanggal -->
        <p class="text-lg text-gray-600 mt-6">
            Diberikan di <span class="font-semibold">{{ $peserta->setting->tempat }}</span>, 
            {{ \Carbon\Carbon::parse($peserta->setting->tanggal_sertifikat)->format('d F Y') }}
        </p>

        <!-- Tanda Tangan -->
        <div class="flex justify-between w-full px-20 mt-16">
            <div class="text-center">
                <img src="{{ asset('storage/' . $peserta->setting->ttd_pimpinan) }}" class="h-20 mx-auto" alt="Tanda Tangan Pimpinan">
                <p class="font-medium text-gray-700 mt-2">Pimpinan</p>
                <p class="font-semibold">{{ $peserta->setting->ceo }}</p>
            </div>
            <div class="text-center">
                <img src="{{ asset('storage/' . $peserta->setting->ttd_pengajar) }}" class="h-20 mx-auto" alt="Tanda Tangan Pengajar">
                <p class="font-medium text-gray-700 mt-2">Pengajar</p>
                <p class="font-semibold">{{ $peserta->setting->nama_pengajar }}</p>
            </div>
        </div>

    </div>
</body>
</html>
