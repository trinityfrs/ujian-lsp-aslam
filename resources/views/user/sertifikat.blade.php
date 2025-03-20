<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite('resources/css/app.css')
    <title>Sertifikat Saya</title>
    <style>
        .border-dekoratif {
            background: url('https://www.transparenttextures.com/patterns/groovepaper.png');
        }
    </style>
</head>
<body class="flex justify-center items-center min-h-screen bg-[#FFF5E1]">
    <div class="relative w-[90%] max-w-[1280px] aspect-[16/9] bg-white border-[16px] border-yellow-500 shadow-2xl p-12 flex flex-col justify-center items-center text-center rounded-lg border-dekoratif">

        <!-- Border dekoratif dalam -->
        <div class="absolute inset-4 border-[10px] border-yellow-400 rounded-lg w-[98%] h-[97%]"></div>

        <!-- Elemen dekoratif sudut -->
        <div class="absolute top-2 left-2 w-12 h-12 border-4 border-yellow-500 rounded-full"></div>
        <div class="absolute top-2 right-2 w-12 h-12 border-4 border-yellow-500 rounded-full"></div>
        <div class="absolute bottom-2 left-2 w-12 h-12 border-4 border-yellow-500 rounded-full"></div>
        <div class="absolute bottom-2 right-2 w-12 h-12 border-4 border-yellow-500 rounded-full"></div>

        <!-- Judul Sertifikat -->
        <h1 class="text-5xl font-extrabold text-gray-800 font-serif uppercase mt-10 drop-shadow-md">Sertifikat Penghargaan</h1>
        <p class="text-lg text-gray-600 mt-2 italic">Diberikan kepada</p>

        <!-- Nama Penerima -->
        <h2 class="text-4xl font-bold text-blue-900 uppercase mt-4 bg-yellow-300 px-6 py-2 rounded-lg shadow-md">{{ $peserta->nama }}</h2>
        <p class="text-lg text-gray-700 mt-2">No. Sertifikat: <span class="font-semibold">{{ $peserta->no_sertif }}</span></p>

        <!-- Detail Pelatihan -->
        <p class="text-lg text-gray-700 mt-6">Sebagai peserta dalam</p>
        <h3 class="text-3xl font-semibold text-yellow-500 mt-2 italic">{{ $peserta->tema_pelatihan }}</h3>
        <p class="text-lg text-gray-700 mt-2">Yang diselenggarakan oleh</p>
        <h3 class="text-2xl font-medium text-blue-800 mt-2 font-serif">{{ $peserta->setting->instansi_pengajar }}</h3>

        <!-- Lokasi & Tanggal -->
        <p class="text-lg text-gray-600 mt-6">
            Diberikan di <span class="font-semibold">{{ $peserta->setting->tempat }}</span>,
            {{ \Carbon\Carbon::parse($peserta->setting->tanggal_sertifikat)->format('d F Y') }}
        </p>

        <!-- Tanda Tangan -->
        <div class="flex justify-between w-full px-20 mt-16">
            <div class="text-center">
                <img src="{{ asset('storage/' . $peserta->setting->ttd_pimpinan) }}" class="h-20 mx-auto border-b-2 border-gray-500" alt="Tanda Tangan Pimpinan">
                <p class="font-medium text-gray-700 mt-2 italic">Pimpinan</p>
                <p class="font-semibold text-blue-900">{{ $peserta->setting->ceo }}</p>
            </div>
            <div class="text-center">
                <img src="{{ asset('storage/' . $peserta->setting->ttd_pengajar) }}" class="h-20 mx-auto border-b-2 border-gray-500" alt="Tanda Tangan Pengajar">
                <p class="font-medium text-gray-700 mt-2 italic">Pengajar</p>
                <p class="font-semibold text-blue-900">{{ $peserta->setting->nama_pengajar }}</p>
            </div>
        </div>
    </div>
</body>
</html>
