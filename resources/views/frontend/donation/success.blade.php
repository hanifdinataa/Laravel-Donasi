<!doctype html>
<html lang="id">

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Pembayaran Berhasil</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100 flex justify-center">
<div class="w-full max-w-[480px] bg-white min-h-screen shadow-xl">
@include('frontend.partials.header2')

    <div class="bg-white p-4 shadow sticky top-0 flex items-center gap-2">
        <a href="{{ route('home') }}" class="text-xl font-bold">&larr;</a>
        <h1 class="font-semibold text-lg">Status Pembayaran</h1>
    </div>

    <div class="p-4 text-center">

        <div class="text-green-600 text-5xl mb-3">✓</div>

        <h2 class="font-bold text-xl mb-2">Pembayaran Berhasil</h2>

        <p class="text-gray-600 mb-4">
            Terima kasih atas donasi Anda!
        </p>

        <div class="bg-gray-200 p-3 rounded-lg text-left text-sm mb-4">
            <p><b>Invoice:</b> {{ $donation->invoice }}</p>
            <p><b>Nominal:</b> Rp {{ number_format($donation->amount) }}</p>
            <p><b>Status:</b> SUCCESS</p>
        </div>

        <a href="{{ route('home') }}"
            class="block bg-green-600 text-white py-3 rounded-xl font-semibold">
            Kembali ke Beranda
        </a>

    </div>

</div>
</body>
</html>
