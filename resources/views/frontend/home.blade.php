<!doctype html>
<html lang="id">

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Beranda - DonasiApp</title>

    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
</head>

<body class="bg-gray-100 flex justify-center">

<div class="w-full max-w-[480px] bg-white min-h-screen shadow-xl relative">

    {{-- HEADER --}}
    @include('frontend.partials.header')

    {{-- BANNER --}}
    <div class="p-4">
        <div class="swiper mySwiper rounded-xl overflow-hidden shadow">
            <div class="swiper-wrapper">
                @foreach($banners as $banner)
                <div class="swiper-slide">
                    <img src="{{ $banner }}" class="w-full h-48 object-cover">
                </div>
                @endforeach
            </div>
            <div class="swiper-pagination"></div>
        </div>
    </div>

    {{-- CAMPAIGN LIST --}}
    <div id="campaignList" class="grid grid-cols-2 gap-3 px-4 pb-24">

        @foreach($campaigns as $item)
        <div class="campaign-card bg-white rounded-xl shadow overflow-hidden">

            {{-- GAMBAR FIX --}}
            <a href="/campaign/{{ $item->slug }}">
                <img 
                    src="{{ $item->image ? asset('storage/' . $item->image) : '/images/default.jpg' }}" 
                    class="h-28 w-full object-cover"
                    onerror="this.src='/images/default.jpg';"
                >
            </a>

            <div class="p-3">

                <a href="/campaign/{{ $item->slug }}">
                    <h3 class="text-sm font-semibold leading-tight">{{ $item->title }}</h3>
                </a>

                <p class="text-[11px] text-gray-500 mt-1">
                    Batas waktu:
                    @if($item->end_date)
                        {{ \Carbon\Carbon::parse($item->end_date)->diffForHumans() }}
                    @else
                        tidak ada
                    @endif
                </p>

                {{-- PROGRESS BAR --}}
                <div class="w-full bg-gray-200 h-2 rounded mt-2">
                    <div class="h-2 bg-green-600 rounded"
                         style="width: {{ $item->target_amount > 0 ? ($item->collected_amount / $item->target_amount * 100) : 0 }}%">
                    </div>
                </div>

                <p class="text-[11px] text-gray-600 mt-1">
                    Rp {{ number_format($item->collected_amount) }} /
                    Rp {{ number_format($item->target_amount) }}
                </p>

                {{-- LOGIKA TOMBOL DONASI --}}
                @if($item->status == 'active')
                    <a href="/donasi/{{ $item->id }}"
                        class="block w-full bg-green-600 text-white text-xs text-center font-semibold py-2 rounded mt-2">
                        DONASI SEKARANG
                    </a>
                @else
                    <div class="block w-full bg-gray-400 text-white text-xs text-center font-semibold py-2 rounded mt-2">
                        CAMPAIGN CLOSED
                    </div>
                @endif

            </div>
        </div>
        @endforeach
    </div>

    @include('frontend.partials.bottomnav')
</div>

{{-- JS --}}
<script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>

<script>
var swiper = new Swiper(".mySwiper", {
    loop: true,
    autoplay: { delay: 3000 },
    pagination: { el: ".swiper-pagination" },
});
</script>

{{-- SEARCH --}}
<script>
const input = document.getElementById('searchInput');
const list  = document.getElementById('campaignList');

if (input) {
    input.addEventListener('keyup', function () {
        let q = this.value.trim();

        if (q.length === 0) {
            location.reload(); 
            return;
        }

        fetch(`/api/search?q=${q}`)
            .then(res => res.json())
            .then(data => {
                list.innerHTML = "";

                if (data.length === 0) {
                    list.innerHTML = `
                        <p class="text-center w-full text-gray-500 col-span-2 mt-10">
                            Tidak ada program ditemukan
                        </p>`;
                    return;
                }

                data.forEach(item => {
                    list.innerHTML += `
                        <div class="campaign-card bg-white rounded-xl shadow overflow-hidden">
                            <a href="/campaign/${item.slug}">
                                <img src="/storage/${item.image}" onerror="this.src='/images/default.jpg';"
                                    class="h-28 w-full object-cover">
                            </a>

                            <div class="p-3">
                                <a href="/campaign/${item.slug}">
                                    <h3 class="text-sm font-semibold leading-tight">${item.title}</h3>
                                </a>

                                <a href="/donasi/${item.id}"
                                    class="block w-full bg-green-600 text-white text-xs text-center font-semibold py-2 rounded mt-2">
                                    DONASI SEKARANG
                                </a>
                            </div>
                        </div>`;
                });
            });
    });
}
</script>

</body>
</html>
