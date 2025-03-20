<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite('resources/css/app.css')
    <title>Akses Sertifikat</title>
</head>
<body>
    <header class="absolute top-4 right-4">
        @if (Route::has('login'))
            <nav class="flex items-center gap-4">
                @auth
                    <a href="{{ url('/dashboard') }}"
                        class="px-5 py-1.5 border border-gray-300 text-gray-800 rounded-md hover:bg-gray-100">
                        Dashboard
                    </a>
                @else
                    <a href="{{ route('login') }}"
                        class="px-5 py-1.5 border border-gray-300 text-gray-800 rounded-md hover:bg-gray-100">
                        Log in
                    </a>

                    @if (Route::has('register'))
                        <a href="{{ route('register') }}"
                            class="px-5 py-1.5 border border-blue-500 text-blue-600 rounded-md hover:bg-blue-100">
                            Register
                        </a>
                    @endif
                @endauth
            </nav>
        @endif
    </header>

    <div class="flex items-center justify-center h-screen ">
        <div class="w-full max-w-xl p-6 text-center bg-white">
            <h1 class="mb-4 font-serif text-2xl font-bold text-center text-gray-800">Akses Sertifikat Anda</h1>

            <form action="{{ route('search.sertifikat') }}" method="POST">
                @csrf
                <input type="text" name="nama" id="nama" placeholder="John Doe"
                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                <p class="mt-1 mb-1 text-center text-gray-600">Masukkan nama lengkap Anda untuk mengakses sertifikat.</p>

                <button type="submit"
                    class="w-full py-2 mt-4 font-semibold text-white transition bg-blue-600 rounded-lg hover:bg-blue-700">
                    Akses Sertifikat
                </button>
            </form>


        </div>
    </div>
</body>
</html>
