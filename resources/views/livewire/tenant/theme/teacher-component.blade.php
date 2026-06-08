{{-- livewire/tenant/theme/teacher-component.blade.php --}}

<div>
    {{-- ===== Page Header / Breadcrumb ===== --}}
    <div class="page-header-area">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="page-header-content text-center">
                        <h2>{{ __('Teachers') }}</h2>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb justify-content-center">
                                <li class="breadcrumb-item">
                                    <a href="{{route('theme.home', ['tenant' => tenant('id')]) }}">{{ __('Home') }}</a>
                                </li>
                                <li class="breadcrumb-item active" aria-current="page">
                                    {{ __('Teachers') }}
                                </li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{-- ===== End Page Header ===== --}}

    {{-- ===== Teachers Section ===== --}}
    <section class="teachers-section section-padding">
        <div class="container">

            {{-- Department Filter Tabs --}}
            <div class="row">
                <div class="col-12">
                    <div class="department-filter text-center mb-5">
                        <ul class="filter-list list-inline">

                            {{-- All Departments --}}
                            <li class="list-inline-item">
                                <button
                                    wire:click="filterByDepartment('all')"
                                    class="filter-btn {{ $activeDepartment === 'all' ? 'active' : '' }}"
                                >
                                    {{ __('All Departments') }}
                                </button>
                            </li>

                            {{-- Dynamic Department Tabs --}}
                            @foreach ($departments as $department)
                                <li class="list-inline-item">
                                    <button
                                        wire:click="filterByDepartment('{{ $department->name }}')"
                                        class="filter-btn {{ $activeDepartment === $department->name ? 'active' : '' }}"
                                    >
                                        {{ $department->name }}
                                    </button>
                                </li>
                            @endforeach

                        </ul>
                    </div>
                </div>
            </div>
            {{-- End Department Filter --}}

            {{-- Teachers Grid --}}
            <div class="row">
                @forelse ($teachers as $teacher)
                    <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6 mb-4">
                        <div class="teacher-card text-center">

                            {{-- Photo --}}
                            <div class="teacher-img">
                                <img
                                    src="{{ $teacher->photo ? asset($teacher->photo) : 'https://ui-avatars.com/api/?name=' . urlencode($teacher->name) . '&size=64&background=random' }}"
                                    {{-- src="{{ $teacher->photo ? asset('uploads/images/staff/' . $teacher->photo) : asset('uploads/images/staff/default.png') }}" --}}
                                    alt="{{ $teacher->name }}"
                                    class="img-fluid"
                                />

                                {{-- Social Links Overlay --}}
                                <div class="teacher-social">
                                    <ul class="list-inline">
                                        <li class="list-inline-item">
                                            <a href="{{ $teacher->facebook ?? '#' }}"
                                            target="{{ $teacher->facebook ? '_blank' : '_self' }}"
                                            rel="noopener noreferrer">
                                                <i class="fab fa-facebook-f"></i>
                                            </a>
                                        </li>
                                        <li class="list-inline-item">
                                            <a href="{{ $teacher->linkedin ?? '#' }}"
                                            target="{{ $teacher->linkedin ? '_blank' : '_self' }}"
                                            rel="noopener noreferrer">
                                                <i class="fab fa-linkedin-in"></i>
                                            </a>
                                        </li>
                                        <li class="list-inline-item">
                                            <a href="{{ $teacher->twitter ?? '#' }}"
                                            target="{{ $teacher->twitter ? '_blank' : '_self' }}"
                                            rel="noopener noreferrer">
                                                <i class="fab fa-twitter"></i>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                                {{-- End Social Links --}}
                            </div>
                            {{-- End Photo --}}

                            {{-- Teacher Info --}}
                            <div class="teacher-info">
                                <h5 class="teacher-name">{{ $teacher->name }}</h5>
                                <span class="teacher-department">
                                    {{ $teacher->department->name ?? '' }}
                                </span>
                            </div>
                            {{-- End Teacher Info --}}

                        </div>
                    </div>
                @empty
                    <div class="col-12 text-center py-5">
                        <p class="text-muted">{{ __('No teachers found.') }}</p>
                    </div>
                @endforelse
            </div>
            {{-- End Teachers Grid --}}

        </div>
    </section>
    {{-- ===== End Teachers Section ===== --}}
</div>