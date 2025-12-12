<!doctype html>
<html lang="id">

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ $campaign->title }}</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100 flex justify-center">

<div class="w-full max-w-[480px] bg-white min-h-screen shadow-xl relative">

    <!-- HEADER -->
    <div class="bg-white p-4 shadow flex items-center gap-3 sticky top-0 z-40">
        <a href="{{ route('home') }}" class="text-xl font-bold">&larr;</a>
        <p class="font-semibold text-lg">Detail Program</p>
    </div>

    <!-- GAMBAR -->
    <img src="/campaign/{{ $campaign->image }}" class="w-full h-56 object-cover">

    <!-- CONTENT -->
    <div class="p-4">

        <h1 class="text-xl font-bold">{{ $campaign->title }}</h1>

        <!-- PROGRESS -->
        <div class="mt-3">
            <div class="w-full h-3 bg-gray-300 rounded-full">
                <div class="h-3 bg-green-600 rounded-full"
                     style="width: {{ $campaign->target_amount > 0 ? ($campaign->collected_amount / $campaign->target_amount * 100) : 0 }}%">
                </div>
            </div>
            <p class="text-sm text-gray-600 mt-1">
                <b>Rp {{ number_format($campaign->collected_amount) }}</b>
                dari
                <b>Rp {{ number_format($campaign->target_amount) }}</b>
            </p>
        </div>

        <!-- DESKRIPSI -->
        <p class="mt-4 text-gray-800">{!! nl2br(e($campaign->description)) !!}</p>

        <!-- DONASI TERBARU -->
        <h3 class="font-semibold text-lg mt-6 mb-2">Donatur Terbaru</h3>

        <div class="space-y-2">
            @foreach($donations as $don)
            <div class="bg-white p-3 shadow rounded-lg">
                <p class="text-sm font-semibold">{{ $don->donor_name ?? 'Anonim' }}</p>
                <p class="text-xs text-gray-500">
                    Rp {{ number_format($don->amount) }} - {{ $don->created_at->diffForHumans() }}
                </p>
            </div>
            @endforeach
        </div>

    </div>

    <!-- TOMBOL DONASI -->
    <div class="fixed bottom-16 left-1/2 -translate-x-1/2 w-full max-w-[480px] p-4 bg-white shadow-lg">
        <a href="{{ route('donation.form', $campaign->id) }}"
           class="block bg-green-600 text-white text-center text-lg py-3 font-semibold rounded-xl">
           Donasi Sekarang
        </a>
    </div>

    <!-- BOTTOM NAV -->
    @include('frontend.partials.bottomnav')

</div>

</body>
</html>
