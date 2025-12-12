<!doctype html>
<html lang="id">

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Pembayaran</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100 flex justify-center">
<div class="w-full max-w-[480px] bg-white min-h-screen shadow-xl">
@include('frontend.partials.header2')

    <div class="bg-white p-4 shadow sticky top-0 flex items-center gap-2">
        <a href="{{ route('home') }}" class="text-xl font-bold">&larr;</a>
        <h1 class="font-semibold text-lg">Pembayaran</h1>
    </div>

    <div class="p-4">

        <h2 class="font-bold text-lg mb-4">Metode: {{ strtoupper($donation->payment_method) }}</h2>

        @if(in_array($donation->payment_method, ['bca','bri','mandiri']))
            <p class="text-sm font-semibold">Nomor Virtual Account:</p>
            <div class="p-3 bg-gray-200 rounded-lg font-mono text-lg text-center mt-2">
                {{ rand(1000000000, 9999999999) }}
            </div>

        @elseif($donation->payment_method === 'qris')
            <p class="text-sm font-semibold mb-2">Scan QRIS untuk membayar:</p>
            <img src="/images/qris_dummy.png" class="w-56 mx-auto rounded-lg shadow">

        @else
            <p class="text-sm font-semibold">Kode Pembayaran:</p>
            <div class="p-3 bg-gray-200 rounded-lg font-mono text-lg text-center mt-2">
                PAY{{ rand(100000,999999) }}
            </div>
        @endif

        <form action="{{ route('donation.finish', $donation->invoice) }}" method="POST" class="mt-6">
            @csrf
            <button class="w-full bg-green-600 text-white py-3 font-semibold rounded-xl">
                SAYA SUDAH BAYAR
            </button>
        </form>

    </div>

</div>
</body>
</html>
