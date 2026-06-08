{{-- livewire/tenant/theme/event-component.blade.php --}}

<div>
    {{-- ===== Page Header / Breadcrumb ===== --}}
    <div class="page-header-area">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="page-header-content text-center">
                        <h2>{{ __('Events') }}</h2>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb justify-content-center">
                                <li class="breadcrumb-item">
                                    <a href="{{route('theme.home', ['tenant' => tenant('id')]) }}">{{ __('Home') }}</a>
                                </li>
                                <li class="breadcrumb-item active" aria-current="page">
                                    {{ __('Events') }}
                                </li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{-- ===== End Page Header ===== --}}

    {{-- ===== Events Section ===== --}}
    <section class="events-section section-padding">
        <div class="container">

            {{-- Section Title --}}
            <div class="row">
                <div class="col-12">
                    <div class="section-title mb-4">
                        <h3>{{ __('Upcoming Events') }}</h3>
                        <p>{{ $setting->event_description ?? '' }}</p>
                    </div>
                </div>
            </div>
            {{-- End Section Title --}}

            {{-- Events List --}}
            <div class="row">
                @forelse ($events as $event)
                    <div class="col-lg-12 mb-4">
                        <div class="event-card">
                            <div class="row align-items-center">

                                {{-- Event Image --}}
                                <div class="col-md-4">
                                    <div class="event-img">
                                        <a href="#">
                                            <img
                                                src="{{ $event->image ? asset('uploads/frontend/events/' . $event->image) : asset('uploads/frontend/events/default.jpg') }}"
                                                alt="{{ $event->title }}"
                                                class="img-fluid w-100"
                                            />
                                        </a>
                                    </div>
                                </div>
                                {{-- End Event Image --}}

                                {{-- Event Info --}}
                                <div class="col-md-8">
                                    <div class="event-content">

                                        {{-- Title --}}
                                        <h5 class="event-title">
                                            <a href="#">
                                                {{ $event->title }}
                                            </a>
                                        </h5>

                                        {{-- Dates --}}
                                        <ul class="event-meta list-inline">
                                            <li class="list-inline-item">
                                                <i class="far fa-calendar-alt"></i>
                                                {{ \Carbon\Carbon::parse($event->start_date)->format('d.M.Y') }}
                                            </li>
                                            <li class="list-inline-item">
                                                <i class="far fa-calendar-check"></i>
                                                {{ \Carbon\Carbon::parse($event->end_date)->format('d.M.Y') }}
                                            </li>
                                        </ul>

                                        {{-- Posted On --}}
                                        <p class="event-posted">
                                            {{ __('Posted on') }} -
                                            {{ \Carbon\Carbon::parse($event->created_at)->format('d.M.Y') }}
                                        </p>

                                        {{-- Short Description --}}
                                        <p class="event-description">
                                            {{ \Illuminate\Support\Str::limit(strip_tags($event->description), 100) }}
                                        </p>

                                        {{-- Read More --}}
                                        <a href="#" class="btn btn-primary btn-sm">
                                            {{ __('Read More') }}
                                        </a>

                                    </div>
                                </div>
                                {{-- End Event Info --}}

                            </div>
                        </div>
                    </div>
                @empty
                    <div class="col-12 text-center py-5">
                        <p class="text-muted">{{ __('No events found.') }}</p>
                    </div>
                @endforelse
            </div>
            {{-- End Events List --}}

        </div>
    </section>
    {{-- ===== End Events Section ===== --}}
</div>