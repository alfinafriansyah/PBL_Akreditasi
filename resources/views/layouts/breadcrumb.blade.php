<nav aria-label="breadcrumb">
    <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-0 px-3 me-sm-6 me-5">
        <li class="breadcrumb-item text-sm">
            <a class="opacity-5 text-dark" href="javascript:;">Page</a>
        </li>
        <li class="breadcrumb-item text-sm text-dark active" aria-current="page">{{ $breadcrumb->list }}</li>
    </ol>
</nav>

@if(Str::startsWith($activeMenu, 'dashboard'))
    <div class="px-3 mt-1">
        <h4 id="greeting-title" class="text-dark fw-bold">Selamat</h4>
        <p class="text-sm text-dark opacity-75" id="greeting-subtitle">Selamat datang kembali ...</p>
    </div>

    <script>
        function getGreeting() {
            const now = new Date();
            const hour = now.getHours();

            if (hour >= 4 && hour < 11) {
                return "Selamat Pagi";
            } else if (hour >= 11 && hour < 15) {
                return "Selamat Siang";
            } else if (hour >= 15 && hour < 18) {
                return "Selamat Sore";
            } else {
                return "Selamat Malam";
            }
        }

        document.getElementById('greeting-title').textContent = getGreeting();
    </script>
@else
    <div class="px-3 mt-1">
        <h4 class="text-dark fw-bold">{{ $breadcrumb->title }}</h4>
    </div>
@endif
