<!-- Navbar -->
<nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl " id="navbarBlur" data-scroll="false">
    <div class="container-fluid py-1 px-3">

        <div class="collapse navbar-collapse mt-sm-0 mt-2 me-md-0 me-sm-4" id="navbar">
            <div class="ms-md-auto pe-md-3 d-flex align-items-center">
                <div class="input-group">
                    <span class="input-group-text text-body"><i class="fas fa-search" aria-hidden="true"></i></span>
                    <input type="text" class="form-control" placeholder="Type here...">
                </div>
            </div>
            <ul class="navbar-nav justify-content-end mx-1">
                <li class="nav-item d-flex align-items-center">
                    <a href="javascript:;" id="btnProfile"
                       class="bg-white rounded-3 d-flex align-items-center text-decoration-none px-2 py-1"
                       style="gap: 8px; border: 1px solid #e0e0e0;">
                        <img src="https://ui-avatars.com/api/?name={{ urlencode(Auth::user()->username) }}&background=random&size=32"
                             class="rounded-circle"
                             width="32" height="32" alt="avatar"
                             style="object-fit: cover;">
                        <span class="text-dark fw-semibold text-capitalize" style="font-size: 0.9rem;">
                {{ Auth::user()->username }}
            </span>
                    </a>
                </li>
            </ul>





        </div>
    </div>
</nav>
<!-- End Navbar -->

<!-- Profile Card -->
<div id="profileCardContainer" style="display:none; position:absolute; top:70px; right:40px; z-index:1050;">
    <div class="p-3 shadow-sm bg-white rounded-4" style="width: 260px;">
        <div class="d-flex align-items-center mb-2">
            <div class="rounded-circle d-flex justify-content-center align-items-center"
                 style="width: 40px; height: 40px; background-color: #647CF9;">
                <i class="fa fa-user text-white"></i>
            </div>
            <h6 class="mb-0 ms-3 text-capitalize" style="font-weight: 600; color: #333;">
                {{ Auth::user()->username }}
            </h6>
        </div>
        <p id="lastSeenText"
           class="mb-0 ms-1"
           data-last-seen="{{ \Carbon\Carbon::parse(Auth::user()->last_seen_at)->timestamp }}"
           style="color: #6c757d; font-size: 0.95rem;">
            terakhir login ...
        </p>
    </div>
</div>

<!-- JS for toggle & real-time last login -->
<script>
    const btnProfile = document.getElementById('btnProfile');
    const profileCard = document.getElementById('profileCardContainer');

    btnProfile.addEventListener('click', function (e) {
        e.stopPropagation();
        profileCard.style.display = (profileCard.style.display === 'none' || profileCard.style.display === '') ? 'block' : 'none';
    });

    document.addEventListener('click', function (e) {
        if (!profileCard.contains(e.target) && e.target.id !== 'btnProfile') {
            profileCard.style.display = 'none';
        }
    });

    function updateLastSeenText() {
        const el = document.getElementById('lastSeenText');
        const lastSeen = parseInt(el.dataset.lastSeen);
        const now = Math.floor(Date.now() / 1000);
        const diff = now - lastSeen;

        let displayText = 'baru saja';
        if (diff >= 60 && diff < 3600) {
            const minutes = Math.floor(diff / 60);
            displayText = `terakhir login ${minutes} menit lalu`;
        } else if (diff >= 3600 && diff < 86400) {
            const hours = Math.floor(diff / 3600);
            displayText = `terakhir login ${hours} jam lalu`;
        } else if (diff >= 86400) {
            const days = Math.floor(diff / 86400);
            displayText = `terakhir login ${days} hari lalu`;
        } else if (diff < 60) {
            displayText = `terakhir login ${diff} detik lalu`;
        }

        el.textContent = displayText;
    }

    updateLastSeenText();
    setInterval(updateLastSeenText, 15000); // update setiap 15 detik
</script>

