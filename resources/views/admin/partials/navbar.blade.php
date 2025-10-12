<link href="/public/eProject_Sem2_Template_Admin/main.css" rel="stylesheet">
<link href="/public/eProject_Sem2_Template_Admin/my_style.css" rel="stylesheet">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">

<div class="app-header header-shadow">
    <div class="app-header__logo">
        <div class="logo-src"></div>
        <div class="header__pane ml-auto">
            <button type="button" class="hamburger close-sidebar-btn hamburger--elastic" data-class="closed-sidebar">
                <span class="hamburger-box">
                    <span class="hamburger-inner"></span>
                </span>
            </button>
        </div>
    </div>
    <div class="app-header__mobile-menu">
        <button type="button" class="hamburger hamburger--elastic mobile-toggle-nav">
            <span class="hamburger-box">
                <span class="hamburger-inner"></span>
            </span>
        </button>
    </div>
    <div class="app-header__menu">
        <button type="button" class="btn-icon btn-icon-only btn btn-primary btn-sm mobile-toggle-header-nav">
            <span class="btn-icon-wrapper">
                <i class="fa fa-ellipsis-v fa-w-6"></i>
            </span>
        </button>
    </div>
    <div class="app-header__content">
        <div class="app-header-left">
            <div class="search-wrapper">
                <div class="input-holder">
                    <input type="text" class="search-input" placeholder="Tìm kiếm...">
                    <button class="search-icon"><span></span></button>
                </div>
                <button class="close"></button>
            </div>
        </div>
        <div class="app-header-right d-flex align-items-center justify-content-end" style="min-width:220px;">
            <div class="header-dots d-flex align-items-center w-100 justify-content-end gap-3">
                <div class="d-flex align-items-center gap-2">
                    <img src="{{ asset('img/user.png') }}" alt="Admin Avatar" width="38" height="38" class="rounded-circle border border-2 bg-white" style="object-fit:cover;">
                    <span class="fw-semibold text-dark" style="font-size:1.08rem;">{{ Auth::guard('admin')->user()->name ?? 'Admin' }}</span>
                </div>
                <form id="logout-form-navbar" action="{{ route('admin.logout') }}" method="POST" class="ms-2">
                    @csrf
                    <button type="submit" class="btn btn-outline-danger btn-sm" style="padding: 6px 16px; font-weight: 500; border-radius: 20px;">Đăng xuất</button>
                </form>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<style>
    .app-header__content {
        display: flex;
        align-items: center;
        justify-content: space-between;
        width: 100%;
        min-height: 60px;
        padding: 0 18px;
    }
    .app-header-left {
        flex: 1 1 0%;
        display: flex;
        align-items: center;
    }
    .app-header-right {
        flex: 0 0 auto;
    }
    .header-dots img.rounded-circle {
        box-shadow: 0 2px 8px rgba(0,0,0,0.07);
    }
    .header-dots span {
        font-size: 1.08rem;
        font-weight: 500;
        color: #222;
    }
    @media (max-width: 768px) {
        .app-header__content {
            flex-direction: column;
            align-items: stretch;
            padding: 0 6px;
        }
        .app-header-left, .app-header-right {
            justify-content: center;
            padding: 4px 0;
        }
    }
</style>