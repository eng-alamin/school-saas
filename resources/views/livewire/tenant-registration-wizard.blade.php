<div>

    {{-- =========================================================
        STYLES
    ========================================================== --}}
    <style>
        :root{
            --primary:#4f46e5;
            --primary-dark:#4338ca;
            --success:#10b981;
            --danger:#ef4444;
            --light:#f8fafc;
            --border:#e5e7eb;
            --text:#111827;
            --muted:#6b7280;
        }

        body{
            background:
                radial-gradient(circle at top left,#6366f1 0%,transparent 30%),
                radial-gradient(circle at bottom right,#8b5cf6 0%,transparent 30%),
                #0f172a;
        }

        .wizard-wrapper{
            min-height:100vh;
            padding:40px 0;
        }

        .wizard-card{
            border:none;
            border-radius:30px;
            overflow:hidden;
            background:rgba(255,255,255,.96);
            backdrop-filter: blur(15px);
            box-shadow:
                0 10px 40px rgba(0,0,0,.15),
                0 2px 8px rgba(0,0,0,.05);
        }

        .wizard-sidebar{
            background:
                linear-gradient(
                    180deg,
                    #4f46e5 0%,
                    #7c3aed 100%
                );
            color:white;
            padding:50px 40px;
            height:100%;
            position:relative;
            overflow:hidden;
        }

        .wizard-sidebar::before{
            content:'';
            position:absolute;
            width:400px;
            height:400px;
            background:rgba(255,255,255,.08);
            border-radius:50%;
            top:-150px;
            right:-150px;
        }

        .wizard-sidebar::after{
            content:'';
            position:absolute;
            width:250px;
            height:250px;
            background:rgba(255,255,255,.08);
            border-radius:50%;
            bottom:-100px;
            left:-100px;
        }

        .brand-logo{
            width:70px;
            height:70px;
            border-radius:20px;
            background:rgba(255,255,255,.15);
            display:flex;
            align-items:center;
            justify-content:center;
            font-size:28px;
            margin-bottom:25px;
            backdrop-filter: blur(10px);
        }

        .sidebar-title{
            font-size:34px;
            font-weight:800;
            line-height:1.2;
        }

        .sidebar-subtitle{
            opacity:.85;
            margin-top:15px;
            line-height:1.8;
        }

        .step-list{
            margin-top:60px;
        }

        .step-item{
            display:flex;
            align-items:center;
            margin-bottom:30px;
            position:relative;
            z-index:2;
        }

        .step-circle{
            width:48px;
            height:48px;
            border-radius:50%;
            background:rgba(255,255,255,.15);
            display:flex;
            align-items:center;
            justify-content:center;
            font-weight:700;
            margin-right:18px;
            transition:.3s;
            border:2px solid rgba(255,255,255,.2);
        }

        .step-item.active .step-circle{
            background:white;
            color:var(--primary);
            transform:scale(1.08);
        }

        .step-item.completed .step-circle{
            background:var(--success);
            border-color:var(--success);
        }

        .step-title{
            font-weight:700;
            margin-bottom:3px;
        }

        .step-desc{
            opacity:.8;
            font-size:13px;
        }

        .wizard-content{
            padding:50px;
        }

        .top-progress{
            height:10px;
            border-radius:30px;
            background:#eef2ff;
            overflow:hidden;
            margin-bottom:40px;
        }

        .top-progress-bar{
            height:100%;
            background:linear-gradient(
                90deg,
                #4f46e5,
                #8b5cf6
            );
            border-radius:30px;
            transition:width .4s ease;
        }

        .wizard-heading{
            font-size:32px;
            font-weight:800;
            color:var(--text);
            margin-bottom:10px;
        }

        .wizard-text{
            color:var(--muted);
            margin-bottom:35px;
        }

        .form-label{
            font-weight:700;
            color:#374151;
            margin-bottom:10px;
        }

        .form-control,
        .form-select{
            border-radius:16px;
            min-height:56px;
            border:1px solid var(--border);
            padding-left:18px;
            font-size:15px;
            transition:.25s;
        }

        .form-control:focus,
        .form-select:focus{
            border-color:var(--primary);
            box-shadow:
                0 0 0 4px rgba(79,70,229,.1);
        }

        .input-group-text{
            border-radius:16px 0 0 16px;
            border:1px solid var(--border);
            background:#f9fafb;
        }

        .domain-preview{
            background:#eef2ff;
            border-radius:14px;
            padding:14px 18px;
            margin-top:15px;
            font-size:14px;
            color:#4338ca;
            font-weight:600;
        }

        .availability{
            margin-top:12px;
            font-size:14px;
            font-weight:600;
        }

        .availability.success{
            color:var(--success);
        }

        .availability.danger{
            color:var(--danger);
        }

        .wizard-btn{
            min-height:56px;
            border-radius:16px;
            font-weight:700;
            padding:0 30px;
            transition:.25s;
        }

        .btn-primary{
            background:var(--primary);
            border:none;
        }

        .btn-primary:hover{
            background:var(--primary-dark);
            transform:translateY(-2px);
        }

        .btn-light-custom{
            background:#f3f4f6;
            border:none;
        }

        .upload-box{
            border:2px dashed #c7d2fe;
            border-radius:20px;
            padding:35px;
            text-align:center;
            background:#f8faff;
            transition:.25s;
        }

        .upload-box:hover{
            border-color:var(--primary);
            background:#eef2ff;
        }

        .feature-box{
            border-radius:20px;
            background:#f8fafc;
            padding:25px;
            border:1px solid #eef2f7;
            height:100%;
        }

        .feature-icon{
            width:55px;
            height:55px;
            border-radius:16px;
            display:flex;
            align-items:center;
            justify-content:center;
            background:#eef2ff;
            color:var(--primary);
            font-size:22px;
            margin-bottom:18px;
        }

        .summary-box{
            border-radius:20px;
            background:#f8fafc;
            border:1px solid #eef2f7;
            padding:25px;
        }

        .summary-item{
            display:flex;
            justify-content:space-between;
            margin-bottom:15px;
        }

        .summary-item:last-child{
            margin-bottom:0;
        }

        .summary-label{
            color:#6b7280;
            font-weight:600;
        }

        .summary-value{
            font-weight:700;
            color:#111827;
        }

        .success-animation{
            width:120px;
            height:120px;
            border-radius:50%;
            background:#dcfce7;
            display:flex;
            align-items:center;
            justify-content:center;
            margin:auto;
            font-size:55px;
            color:#16a34a;
            animation:pulse 2s infinite;
        }

        @keyframes pulse{
            0%{
                transform:scale(1);
                box-shadow:0 0 0 0 rgba(16,185,129,.4);
            }

            70%{
                transform:scale(1.05);
                box-shadow:0 0 0 20px rgba(16,185,129,0);
            }

            100%{
                transform:scale(1);
            }
        }

        @media(max-width:991px){

            .wizard-content{
                padding:35px 25px;
            }

            .wizard-sidebar{
                padding:35px 25px;
            }

            .sidebar-title{
                font-size:28px;
            }
        }
    </style>

    {{-- =========================================================
        WRAPPER
    ========================================================== --}}

    <div class="container wizard-wrapper">

        <div class="row justify-content-center">

            <div class="col-12 col-xl-11">

                <div class="card wizard-card">

                    <div class="row g-0">

                        {{-- =========================================================
                            SIDEBAR
                        ========================================================== --}}

                        <div class="col-lg-4">

                            <div class="wizard-sidebar h-100">

                                <div class="brand-logo">
                                    <i class="bi bi-mortarboard-fill"></i>
                                </div>

                                <h2 class="sidebar-title">
                                    Launch Your School ERP
                                </h2>

                                <p class="sidebar-subtitle">
                                    Create your school management platform
                                    in less than 2 minutes with automatic
                                    tenant provisioning.
                                </p>

                                {{-- STEPS --}}

                                <div class="step-list">

                                    {{-- STEP 1 --}}

                                    <div class="step-item
                                        {{ $currentStep >= 1 ? 'active' : '' }}
                                        {{ $currentStep > 1 ? 'completed' : '' }}
                                    ">

                                        <div class="step-circle">

                                            @if($currentStep > 1)
                                                <i class="bi bi-check-lg"></i>
                                            @else
                                                1
                                            @endif

                                        </div>

                                        <div>

                                            <div class="step-title">
                                                School Information
                                            </div>

                                            <div class="step-desc">
                                                Setup school profile
                                            </div>

                                        </div>

                                    </div>

                                    {{-- STEP 2 --}}

                                    <div class="step-item
                                        {{ $currentStep >= 2 ? 'active' : '' }}
                                        {{ $currentStep > 2 ? 'completed' : '' }}
                                    ">

                                        <div class="step-circle">

                                            @if($currentStep > 2)
                                                <i class="bi bi-check-lg"></i>
                                            @else
                                                2
                                            @endif

                                        </div>

                                        <div>

                                            <div class="step-title">
                                                Tenant Setup
                                            </div>

                                            <div class="step-desc">
                                                Domain configuration
                                            </div>

                                        </div>

                                    </div>

                                    {{-- STEP 3 --}}

                                    <div class="step-item
                                        {{ $currentStep >= 3 ? 'active' : '' }}
                                        {{ $currentStep > 3 ? 'completed' : '' }}
                                    ">

                                        <div class="step-circle">

                                            @if($currentStep > 3)
                                                <i class="bi bi-check-lg"></i>
                                            @else
                                                3
                                            @endif

                                        </div>

                                        <div>

                                            <div class="step-title">
                                                Admin Account
                                            </div>

                                            <div class="step-desc">
                                                Create super admin
                                            </div>

                                        </div>

                                    </div>

                                    {{-- STEP 4 --}}

                                    <div class="step-item
                                        {{ $currentStep >= 4 ? 'active' : '' }}
                                    ">

                                        <div class="step-circle">
                                            4
                                        </div>

                                        <div>

                                            <div class="step-title">
                                                Confirmation
                                            </div>

                                            <div class="step-desc">
                                                Complete onboarding
                                            </div>

                                        </div>

                                    </div>

                                </div>

                            </div>

                        </div>

                        {{-- =========================================================
                            CONTENT
                        ========================================================== --}}

                        <div class="col-lg-8">

                            <div class="wizard-content">

                                {{-- PROGRESS BAR --}}

                                <div class="top-progress">

                                    <div
                                        class="top-progress-bar"
                                        style="
                                            width:
                                            {{
                                                match($currentStep){
                                                    1 => '25%',
                                                    2 => '50%',
                                                    3 => '75%',
                                                    4 => '100%',
                                                }
                                            }}
                                        "
                                    ></div>

                                </div>

                                {{-- =====================================================
                                    STEP 1
                                ====================================================== --}}

                                @if($currentStep === 1)

                                    <div wire:key="step-1">

                                        <h2 class="wizard-heading">
                                            School Information
                                        </h2>

                                        <p class="wizard-text">
                                            Tell us about your institution.
                                        </p>

                                        <div class="row">

                                            <div class="col-md-6 mb-4">

                                                <label class="form-label">
                                                    School Name
                                                </label>

                                                <input
                                                    type="text"
                                                    class="form-control @error('school_name') is-invalid @enderror"
                                                    wire:model.live="school_name"
                                                    placeholder="Green Valley School"
                                                >

                                                @error('school_name')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror

                                            </div>

                                            <div class="col-md-6 mb-4">

                                                <label class="form-label">
                                                    School Type
                                                </label>

                                                <select
                                                    class="form-select @error('school_type') is-invalid @enderror"
                                                    wire:model.live="school_type"
                                                >
                                                    <option value="">
                                                        Select Type
                                                    </option>

                                                    <option value="school">
                                                        School
                                                    </option>

                                                    <option value="college">
                                                        College
                                                    </option>

                                                    <option value="madrasa">
                                                        Madrasa
                                                    </option>

                                                    <option value="university">
                                                        University
                                                    </option>

                                                </select>

                                            </div>

                                            <div class="col-md-6 mb-4">

                                                <label class="form-label">
                                                    Email Address
                                                </label>

                                                <input
                                                    type="email"
                                                    class="form-control"
                                                    wire:model.live="email"
                                                    placeholder="school@example.com"
                                                >

                                            </div>

                                            <div class="col-md-6 mb-4">

                                                <label class="form-label">
                                                    Phone Number
                                                </label>

                                                <input
                                                    type="text"
                                                    class="form-control"
                                                    wire:model.live="phone"
                                                    placeholder="+8801XXXXXXXXX"
                                                >

                                            </div>

                                            <div class="col-12 mb-4">

                                                <label class="form-label">
                                                    School Logo
                                                </label>

                                                <label class="upload-box w-100">

                                                    <input
                                                        type="file"
                                                        class="d-none"
                                                        wire:model="logo"
                                                    >

                                                    <i class="bi bi-cloud-arrow-up-fill fs-1 text-primary"></i>

                                                    <div class="mt-3 fw-bold">
                                                        Upload School Logo
                                                    </div>

                                                    <div class="text-muted small mt-2">
                                                        PNG, JPG up to 2MB
                                                    </div>

                                                </label>

                                            </div>

                                        </div>

                                        {{-- FEATURES --}}

                                        <div class="row mt-2">

                                            <div class="col-md-4 mb-3">

                                                <div class="feature-box">

                                                    <div class="feature-icon">
                                                        <i class="bi bi-database-fill-lock"></i>
                                                    </div>

                                                    <h6 class="fw-bold">
                                                        Isolated Database
                                                    </h6>

                                                    <p class="text-muted small mb-0">
                                                        Separate database
                                                        for each school.
                                                    </p>

                                                </div>

                                            </div>

                                            <div class="col-md-4 mb-3">

                                                <div class="feature-box">

                                                    <div class="feature-icon">
                                                        <i class="bi bi-lightning-charge-fill"></i>
                                                    </div>

                                                    <h6 class="fw-bold">
                                                        Instant Setup
                                                    </h6>

                                                    <p class="text-muted small mb-0">
                                                        Auto provisioning
                                                        within seconds.
                                                    </p>

                                                </div>

                                            </div>

                                            <div class="col-md-4 mb-3">

                                                <div class="feature-box">

                                                    <div class="feature-icon">
                                                        <i class="bi bi-shield-lock-fill"></i>
                                                    </div>

                                                    <h6 class="fw-bold">
                                                        Secure Access
                                                    </h6>

                                                    <p class="text-muted small mb-0">
                                                        Enterprise-grade
                                                        protection system.
                                                    </p>

                                                </div>

                                            </div>

                                        </div>

                                    </div>

                                @endif

                                {{-- =====================================================
                                    STEP 2
                                ====================================================== --}}

                                @if($currentStep === 2)

                                    <div wire:key="step-2">

                                        <h2 class="wizard-heading">
                                            Tenant Setup
                                        </h2>

                                        <p class="wizard-text">
                                            Configure your subdomain and access.
                                        </p>

                                        <div class="mb-4">

                                            <label class="form-label">
                                                Choose Subdomain
                                            </label>

                                            <div class="input-group">

                                                <input
                                                    type="text"
                                                    class="form-control"
                                                    wire:model.live.debounce.500ms="subdomain"
                                                    placeholder="greenvalley"
                                                >

                                                <span class="input-group-text">
                                                    .school.letsgochinaofficial.com
                                                </span>

                                            </div>

                                            <div class="domain-preview">

                                                https://{{ $subdomain ?: 'your-school' }}.school.letsgochinaofficial.com

                                            </div>

                                            @if($subdomain)

                                                @if($isSubdomainAvailable)

                                                    <div class="availability success">
                                                        <i class="bi bi-check-circle-fill"></i>
                                                        Subdomain Available
                                                    </div>

                                                @else

                                                    <div class="availability danger">
                                                        <i class="bi bi-x-circle-fill"></i>
                                                        Subdomain Already Taken
                                                    </div>

                                                @endif

                                            @endif

                                        </div>

                                        <div class="row">

                                            <div class="col-md-6 mb-4">

                                                <label class="form-label">
                                                    Plan
                                                </label>

                                                <input
                                                    type="text"
                                                    class="form-control"
                                                    value="Free Plan"
                                                    disabled
                                                >

                                            </div>

                                            <div class="col-md-6 mb-4">

                                                <label class="form-label">
                                                    Storage
                                                </label>

                                                <input
                                                    type="text"
                                                    class="form-control"
                                                    value="2GB SSD"
                                                    disabled
                                                >

                                            </div>

                                        </div>

                                        <div class="summary-box">

                                            <h5 class="fw-bold mb-4">
                                                What's Included
                                            </h5>

                                            <div class="summary-item">
                                                <div class="summary-label">
                                                    Student Management
                                                </div>

                                                <div class="summary-value">
                                                    Included
                                                </div>
                                            </div>

                                            <div class="summary-item">
                                                <div class="summary-label">
                                                    Attendance System
                                                </div>

                                                <div class="summary-value">
                                                    Included
                                                </div>
                                            </div>

                                            <div class="summary-item">
                                                <div class="summary-label">
                                                    Result Management
                                                </div>

                                                <div class="summary-value">
                                                    Included
                                                </div>
                                            </div>

                                            <div class="summary-item">
                                                <div class="summary-label">
                                                    Multi User Access
                                                </div>

                                                <div class="summary-value">
                                                    Included
                                                </div>
                                            </div>

                                        </div>

                                    </div>

                                @endif

                                {{-- =====================================================
                                    STEP 3
                                ====================================================== --}}

                                @if($currentStep === 3)

                                    <div wire:key="step-3">

                                        <h2 class="wizard-heading">
                                            Create Admin Account
                                        </h2>

                                        <p class="wizard-text">
                                            Setup your super administrator account.
                                        </p>

                                        <div class="row">

                                            <div class="col-md-6 mb-4">

                                                <label class="form-label">
                                                    Full Name
                                                </label>

                                                <input
                                                    type="text"
                                                    class="form-control"
                                                    wire:model.live="admin_name"
                                                    placeholder="John Doe"
                                                >

                                            </div>

                                            <div class="col-md-6 mb-4">

                                                <label class="form-label">
                                                    Email Address
                                                </label>

                                                <input
                                                    type="email"
                                                    class="form-control"
                                                    wire:model.live="admin_email"
                                                    placeholder="admin@example.com"
                                                >

                                            </div>

                                            <div class="col-md-6 mb-4">

                                                <label class="form-label">
                                                    Password
                                                </label>

                                                <input
                                                    type="password"
                                                    class="form-control"
                                                    wire:model.live="password"
                                                    placeholder="********"
                                                >

                                            </div>

                                            <div class="col-md-6 mb-4">

                                                <label class="form-label">
                                                    Confirm Password
                                                </label>

                                                <input
                                                    type="password"
                                                    class="form-control"
                                                    wire:model.live="password_confirmation"
                                                    placeholder="********"
                                                >

                                            </div>

                                        </div>

                                        {{-- SECURITY BOX --}}

                                        <div class="summary-box">

                                            <div class="d-flex align-items-center">

                                                <div class="feature-icon me-3 mb-0">
                                                    <i class="bi bi-shield-check"></i>
                                                </div>

                                                <div>

                                                    <h6 class="fw-bold mb-1">
                                                        Enterprise Security
                                                    </h6>

                                                    <div class="text-muted small">
                                                        Your account is protected
                                                        with encrypted credentials
                                                        and tenant isolation.
                                                    </div>

                                                </div>

                                            </div>

                                        </div>

                                    </div>

                                @endif

                                {{-- =====================================================
                                    STEP 4
                                ====================================================== --}}

                                @if($currentStep === 4)

                                    <div wire:key="step-4">

                                        <div class="text-center">

                                            <div class="success-animation mb-4">
                                                <i class="bi bi-check-lg"></i>
                                            </div>

                                            <h2 class="wizard-heading">
                                                Ready To Launch 🚀
                                            </h2>

                                            <p class="wizard-text">
                                                Your school platform is ready to deploy.
                                            </p>

                                        </div>

                                        <div class="summary-box mt-5">

                                            <h5 class="fw-bold mb-4">
                                                Registration Summary
                                            </h5>

                                            <div class="summary-item">
                                                <div class="summary-label">
                                                    School
                                                </div>

                                                <div class="summary-value">
                                                    {{ $school_name }}
                                                </div>
                                            </div>

                                            <div class="summary-item">
                                                <div class="summary-label">
                                                    Domain
                                                </div>

                                                <div class="summary-value">
                                                    {{ $subdomain }}.school.letsgochinaofficial.com
                                                </div>
                                            </div>

                                            <div class="summary-item">
                                                <div class="summary-label">
                                                    Admin
                                                </div>

                                                <div class="summary-value">
                                                    {{ $admin_email }}
                                                </div>
                                            </div>

                                            <div class="summary-item">
                                                <div class="summary-label">
                                                    Plan
                                                </div>

                                                <div class="summary-value">
                                                    Free
                                                </div>
                                            </div>

                                        </div>

                                    </div>

                                @endif

                                {{-- =====================================================
                                    BUTTONS
                                ====================================================== --}}

                                <div class="d-flex justify-content-between mt-5">

                                    <div>

                                        @if($currentStep > 1)

                                            <button
                                                type="button"
                                                class="btn btn-light-custom wizard-btn"
                                                wire:click="previousStep"
                                            >
                                                <i class="bi bi-arrow-left"></i>
                                                Previous
                                            </button>

                                        @endif

                                    </div>

                                    <div>

                                        @if($currentStep < 4)

                                            <button
                                                type="button"
                                                class="btn btn-primary wizard-btn"
                                                wire:click="nextStep"
                                            >

                                                Continue

                                                <i class="bi bi-arrow-right ms-2"></i>

                                            </button>

                                        @endif

                                        @if($currentStep === 4)

                                            <button
                                                type="button"
                                                class="btn btn-primary wizard-btn px-5"
                                                wire:click="register"
                                                wire:loading.attr="disabled"
                                            >

                                                <span wire:loading.remove>
                                                    Launch School
                                                </span>

                                                <span wire:loading>

                                                    <span class="spinner-border spinner-border-sm me-2"></span>

                                                    Provisioning...

                                                </span>

                                            </button>

                                        @endif

                                    </div>

                                </div>

                            </div>

                        </div>

                    </div>

                </div>

            </div>

        </div>

    </div>

</div>