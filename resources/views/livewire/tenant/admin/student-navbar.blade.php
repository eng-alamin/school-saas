<div class="card-custom profile-card p-4 mb-4">
    <!-- Avatar + Info -->
    <div class="d-flex flex-wrap gap-4 align-items-start">
    <div class="avatar-wrap me-2">
        <img src="https://i.pravatar.cc/160?img=11" alt="Max Smith"/>
        <span class="online-dot"></span>
    </div>
    <div class="flex-grow-1">
        <!-- Name + Actions row -->
        <div class="d-flex flex-wrap justify-content-between align-items-start mb-2 gap-2">
        <div>
            <div class="d-flex align-items-center gap-2 mb-1">
            <a href="#" class="text-decoration-none text-dark fw-bold fs-4">Max Smith</a>
            <i class="bi bi-patch-check-fill badge-verified fs-5"></i>
            </div>
            <div class="d-flex flex-wrap gap-3" style="font-size:.88rem;">
            <a href="#" class="text-muted text-decoration-none d-flex align-items-center gap-1">
                <span class="material-icons-round fs-6">dashboard</span>ISC-0001</a>
            <a href="#" class="text-muted text-decoration-none d-flex align-items-center gap-1">
                <span class="material-icons-round fs-6">calendar_today</span>Admitted: 28 Apr 2026</a>
            <a href="#" class="text-muted text-decoration-none d-flex align-items-center gap-1">
                <span class="material-icons-round fs-6">email</span>alamin1@ramom.com</a>
            <a href="#" class="text-muted text-decoration-none d-flex align-items-center gap-1">
                <span class="material-icons-round fs-6">phone</span>01795041057</a>
            </div>
        </div>
        </div>

        <div class="hero-badges">
        <span class="badge bg-dark">10th Grade · Section A</span>
        <span class="badge bg-dark">General</span>
        <span class="badge bg-dark">Male · O+</span>
        <span class="badge bg-dark">Islam</span>
        <span class="badge bg-dark">Roll: 09</span>
        </div>

        <!-- Stats + Progress -->
        <div class="d-flex flex-wrap align-items-center gap-3 mt-3">
        <div class="stat-box">
            <div class="d-flex align-items-center gap-1">
            <i class="bi bi-arrow-up text-success"></i>
            <span class="stat-num">2026–27</span>
            </div>
            <div class="stat-label">Academic Year</div>
        </div>
        <div class="stat-box">
            <div class="d-flex align-items-center gap-1">
            <i class="bi bi-arrow-down text-danger"></i>
            <span class="stat-num">09</span>
            </div>
            <div class="stat-label">Roll No</div>
        </div>
        <div class="stat-box">
            <div class="d-flex align-items-center gap-1">
            <i class="bi bi-arrow-up text-success"></i>
            <span class="stat-num">Class 10</span>
            </div>
            <div class="stat-label">Class</div>
        </div>
        <div class="stat-box">
            <div class="d-flex align-items-center gap-1">
            <i class="bi bi-arrow-up text-success"></i>
            <span class="stat-num">A</span>
            </div>
            <div class="stat-label">Section</div>
        </div>
        </div>
        
    </div>
    </div>

    <!-- Profile Tabs -->
    <ul class="nav profile-tabs border-bottom mt-4 flex-nowrap overflow-auto">
    <li class="nav-item"><a class="nav-link {{ request()->routeIs('admin.student.overview') ? 'active' : '' }}" href="{{route('admin.student.overview', $student->id)}}">Overview</a></li>
    <li class="nav-item"><a class="nav-link {{ request()->routeIs('admin.student.invoice') ? 'active' : '' }}" href="{{route('admin.student.invoice', $student->id)}}">Invoice</a></li>
    <li wire:ignore class="nav-item"><a class="nav-link {{ request()->routeIs('admin.student.payment.add') ? 'active' : '' }}" href="{{route('admin.student.payment.add', $student->id)}}">Payment</a></li>
    <li class="nav-item"><a class="nav-link" href="#">Campaigns</a></li>
    <li class="nav-item"><a class="nav-link" href="#">Documents</a></li>
    <li class="nav-item"><a class="nav-link" href="#">Followers</a></li>
    <li class="nav-item"><a class="nav-link" href="#">Activity</a></li>
    </ul>
</div>