<!doctype html>
<html lang="id">

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Kontak Kami</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100 flex justify-center">

<div class="w-full max-w-[480px] bg-white min-h-screen shadow-xl relative">
@include('frontend.partials.header2')
    <!-- HEADER -->
    {{-- <div class="bg-white p-4 shadow flex items-center gap-3 sticky top-0">
        <a href="{{ route('home') }}" class="text-xl font-bold">&larr;</a>
        <h1 class="font-semibold text-lg">Kontak</h1>
    </div> --}}

    <!-- CONTENT -->
    <div class="p-4 text-gray-800 leading-relaxed">

        <h2 class="text-lg font-bold mb-3">Hubungi Kami</h2>

        <div class="space-y-4">

            <div class="bg-white p-4 rounded-xl shadow">
                <p class="text-sm font-semibold">Alamat Kantor</p>
                <p class="text-sm text-gray-600">Jl. Lorem ipsum No.123</p>
            </div>

            <div class="bg-white p-4 rounded-xl shadow">
                <p class="text-sm font-semibold">Email</p>
                <p class="text-sm text-gray-600">lorem@lorem.com</p>
            </div>

            <div class="bg-white p-4 rounded-xl shadow">
                <p class="text-sm font-semibold">Nomor Telepon</p>
                <p class="text-sm text-gray-600">+62 812 2222 2222</p>
            </div>

            <div class="bg-white p-4 rounded-xl shadow">
                <p class="text-sm font-semibold">WhatsApp</p>
                <a href="https://wa.me/6281234567890" 
                   class="text-sm text-green-600 font-semibold">
                    Chat via WhatsApp
                </a>
            </div>

        </div>

    </div>

    @include('frontend.partials.bottomnav')

</div>

</body>
</html>
