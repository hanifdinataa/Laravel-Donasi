<!doctype html>
<html lang="id">

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Donasi untuk {{ $campaign->title }}</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100 flex justify-center">

    <div class="w-full max-w-[480px] bg-white min-h-screen shadow-xl relative">

        <!-- HEADER -->
        <div class="bg-white p-4 shadow flex gap-3 items-center sticky top-0 z-20">
            <a href="{{ $campaign->slug ? route('campaigns.show', $campaign->slug) : route('home') }}"
               class="text-xl font-bold">&larr;</a>
            <h1 class="font-semibold text-lg">Form Donasi</h1>
        </div>

        <!-- FORM -->
        <div class="p-4 pb-[90px]"> <!-- FIX: extra bottom padding -->
            <h2 class="font-bold text-lg mb-3">{{ $campaign->title }}</h2>

            <form action="{{ route('donation.process', $campaign->id) }}" method="POST">
                @csrf

                <!-- Nominal -->
                <label class="font-semibold text-sm">Nominal Donasi</label>
                <input type="number" name="amount" required class="w-full p-3 border rounded-lg my-2"
                       placeholder="Contoh: 50000">

                <div class="grid grid-cols-4 gap-2 mb-4">
                    @foreach ([10000, 25000, 50000, 100000] as $value)
                        <button type="button"
                                onclick="document.querySelector('input[name=amount]').value={{ $value }}"
                                class="border p-2 text-sm rounded-lg bg-gray-50 hover:bg-gray-100">
                            Rp {{ number_format($value) }}
                        </button>
                    @endforeach
                </div>

                <input type="text" name="donor_name" class="w-full p-3 border rounded-lg mb-2"
                       placeholder="Nama (opsional)">
                <input type="text" name="donor_email" class="w-full p-3 border rounded-lg mb-2"
                       placeholder="Email / HP (opsional)">
                <textarea name="message" class="w-full p-3 border rounded-lg mb-4"
                          placeholder="Pesan (opsional)"></textarea>

                <!-- Metode Pembayaran -->
                <label class="font-semibold text-sm block mt-4 mb-2">Metode Pembayaran</label>

                <div class="space-y-2">
                    @foreach([
                        'bca' => 'VA BCA',
                        'bri' => 'VA BRI',
                        'mandiri' => 'VA Mandiri',
                        'qris' => 'QRIS',
                        'gopay' => 'GoPay',
                        'shopeepay' => 'ShopeePay'
                    ] as $key => $label)
                        <label class="flex items-center gap-2">
                            <input type="radio" name="payment_method" value="{{ $key }}" required>
                            <span>{{ $label }}</span>
                        </label>
                    @endforeach
                </div>

                <!-- BUTTON (Now clear from bottom nav) -->
                <button class="w-full bg-green-600 text-white py-3 font-semibold rounded-xl mt-6">
                    Lanjut Pembayaran
                </button>
            </form>
        </div>

        <!-- BOTTOM NAV -->
        <div class="z-30">
            @include('frontend.partials.bottomnav')
        </div>

    </div>

</body>

</html>
