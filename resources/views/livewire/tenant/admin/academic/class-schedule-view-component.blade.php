    <div class="mat-card" style="padding-top:28px">

        <!-- Floating Header -->
        <div class="mat-card-header header-pink-gradient">
            <h5><span class="material-icons-round" style="font-size:18px;vertical-align:middle;margin-right:6px">how_to_reg</span>View Schedule</h5>
            <p>Create new student admission record</p>
        </div>

        <div class="section-card">
            <div class="section-head">
                <div class="section-icon"><span class="material-icons-round">school</span></div>
                <span class="section-title">Select Ground</span>
            </div>
            <div class="fgrid fgrid-3">
                <div class="f"><div class="f-lbl">Class</div><div class="f-val">{{$schedule->class->name}}</div></div>
                <div class="f"><div class="f-lbl">Section</div><div class="f-val">{{$schedule->section->name}}</div></div>
                <div class="f no-br"><div class="f-lbl">Day</div><div class="f-val">{{$schedule->day}}</div></div>
            </div>
        </div>

        <div class="section-card">
            <div class="section-head">
            <div class="section-icon"><span class="material-icons-round">person</span></div>
            <span class="section-title">Schedule Details</span>
            </div>
            <div class="table-responsive">
                <table class="table table-bordered align-middle mb-0" 
                    style="background:#2d2d2d;color:#fff">
                    <tbody>
                        @foreach($days as $day)
                        @php $schedule = $schedules[$day] ?? null; @endphp
                        <tr>
                            <td class="fw-bold text-center" style="width:120px">
                                {{ strtoupper($day) }}
                            </td>

                            @if($schedule && count($schedule->data))
                                @foreach($schedule->data as $item)
                                <td class="text-center">
                                    <div class="fw-bold">{{ $item['subject'] }}</div>
                                    <div class="small">({{ $item['start_time'] }} - {{ $item['end_time'] }})</div>
                                    <div class="small">Teacher : {{ $item['teacher'] }}</div>
                                </td>
                                @endforeach

                                {{-- বাকি empty column fill করো --}}
                                @for($i = count($schedule->data); $i < $maxCols; $i++)
                                <td class="text-center text-muted">N/A</td>
                                @endfor
                            @else
                                {{-- কোনো schedule নেই --}}
                                @for($i = 0; $i < $maxCols; $i++)
                                <td class="text-center text-muted">N/A</td>
                                @endfor
                            @endif
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>


        <!-- Form Footer -->

        <div class="form-footer">
            <a href="{{route('tenant.academic.class-schedule.list')}}" class="btn-outline" type="button" wire:click="resetForm">
                <span class="material-icons-round" style="font-size:16px">refresh</span> Back
            </a>
        </div>

    </div>



    @push('scripts')
    <script>
        document.addEventListener('livewire:initialized', () => {

            // ✅ Custom select এর value sync করার function
            function syncCustomSelects(root) {
                (root || document).querySelectorAll('.input-group-outline .form-select').forEach(function(select) {
                    var wrapper = select.parentNode.querySelector('.custom-select-wrapper');
                    
                    // wrapper না থাকলে build করো
                    if (!wrapper) {
                        buildCustomSelect(select);
                        wrapper = select.parentNode.querySelector('.custom-select-wrapper');
                    }

                    if (!wrapper) return;

                    // Native select এর current value অনুযায়ী trigger text update করো
                    var selectedOpt = select.options[select.selectedIndex];
                    if (selectedOpt && selectedOpt.value !== '') {
                        var trigText = wrapper.querySelector('.trigger-text');
                        if (trigText) trigText.textContent = selectedOpt.textContent;
                        wrapper.classList.add('has-value');
                    }
                });
            }

            // ✅ Livewire data load হওয়ার পর sync
            // 'init' এর পরে Livewire property set হয়, তাই একটু দেরিতে run করো
            setTimeout(() => syncCustomSelects(), 300);

            Livewire.hook('morph.updated', ({ el }) => {
                setTimeout(() => {

                    // Select re-init + sync
                    el.querySelectorAll('.input-group-outline .form-select').forEach(function(select) {
                        var wrapper = select.nextElementSibling;
                        if (!wrapper || !wrapper.classList.contains('custom-select-wrapper')) {
                            buildCustomSelect(select);
                        }
                    });

                    // ✅ Value sync — re-render এর পর
                    syncCustomSelects(el);

                    // Text/Time input
                    el.querySelectorAll('.input-group-outline input').forEach(function(input) {
                        var group = input.closest('.input-group');
                        if (!group) return;

                        if (input.value && input.value.trim() !== '') {
                            group.classList.add('is-filled');
                        } else {
                            group.classList.remove('is-filled');
                        }

                        if (input._materialInit) return;
                        input._materialInit = true;

                        input.addEventListener('focus', function() { group.classList.add('is-focused'); });
                        input.addEventListener('blur', function() {
                            group.classList.remove('is-focused');
                            group.classList.toggle('is-filled', !!input.value.trim());
                        });
                        input.addEventListener('input', function() {
                            group.classList.toggle('is-filled', !!input.value.trim());
                        });
                    });

                }, 50);
            });
        });
    </script>
    @endpush