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
            <ul class="navbar-nav justify-content-end">
                <li class="nav-item d-flex align-items-center">
                    <a href="javascript:;" id="btnProfile" class="nav-link text-dark font-weight-bold px-0">
                        <i class="fa fa-user me-sm-1"></i>
                        <span class="d-sm-inline d-none">Profile</span>
                    </a>
                </li>
            </ul>
        </div>
    </div>
</nav>
<!-- End Navbar -->

<!-- Profile Card Container -->
<div id="profileCardContainer" class="card shadow-sm" style="display:none; position:absolute; top:70px; right:40px; z-index:1050; width: 250px;">
    <div class="card-body p-3">
        <div class="d-flex align-items-center mb-3">
            <i class="fa fa-user-circle fa-2x me-2 text-primary"></i>
            <div>
                <h6 class="mb-0">{{ Auth::user()->username }}</h6>
            </div>
        </div>
        <hr>
    </div>
</div>

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
</script>
