<!doctype html>
<html lang="id">

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Status Pembayaran</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100 flex justify-center">

<div class="w-full max-w-[480px] bg-white min-h-screen shadow-xl relative p-4">
@include('frontend.partials.header2')

    <h1 class="text-xl font-bold mb-3">Status Pembayaran</h1>

    <div class="bg-white p-4 rounded-xl shadow">
        <p class="text-sm"><b>Invoice:</b> {{ $donation->invoice }}</p>
        <p class="text-sm"><b>Nominal:</b> Rp {{ number_format($donation->amount) }}</p>
        <p class="text-sm"><b>Status:</b> {{ strtoupper($donation->status) }}</p>
    </div>

    <!-- BOTTOM NAV -->
    @include('frontend.partials.bottomnav')

</div>

</body>
</html>
