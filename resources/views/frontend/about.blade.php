<!doctype html>
<html lang="id">

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Tentang Kami</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100 flex justify-center">

<div class="w-full max-w-[480px] bg-white min-h-screen shadow-xl relative">
@include('frontend.partials.header2')
    <!-- HEADER -->
    {{-- <div class="bg-white p-4 shadow flex items-center gap-3 sticky top-0">
        <a href="{{ route('home') }}" class="text-xl font-bold">&larr;</a>
        <h1 class="font-semibold text-lg">Tentang Kami</h1>
    </div> --}}

    <!-- CONTENT -->
    <div class="p-4 text-gray-800 leading-relaxed">
        <h2 class="text-lg font-bold mb-3">Donasi-testing</h2>

        <p class="mb-3">
            Lorem ipsum dolor sit amet, consectetur adipiscing elit. 
            Nullam venenatis, velit sit amet tincidunt dapibus, 
            lorem leo vehicula lorem, vitae pulvinar ipsum ligula non metus.
        </p>

        <p class="mb-3">
            Vivamus ultricies, erat sed sollicitudin varius, 
            sapien justo egestas lorem, vitae facilisis justo neque nec augue.
        </p>

        <p class="mb-3">
            Aplikasi donasi ini dibuat untuk memudahkan masyarakat 
            dalam membantu sesama melalui berbagai program sosial.
        </p>
    </div>

    @include('frontend.partials.bottomnav')

</div>

</body>
</html>
