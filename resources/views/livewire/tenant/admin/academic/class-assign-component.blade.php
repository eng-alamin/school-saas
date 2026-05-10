<div class="mat-card" style="padding-top:28px">

      <!-- floating header -->
      <div class="mat-card-header header-pink-gradient">
        <h5 id="cardHeaderTitleAllassigns">All Class Assign</h5>
        <p id="cardHeaderSubtitle">A lightweight, extendable, dependency-free javascript HTML table plugin.</p>
      </div>

      <!-- Table Card -->
      <div class="table-card">
        <!-- toolbar -->
        <div class="card-toolbar">
          <div class="card-toolbar-title">
            <!-- search in table -->
            <div style="position:relative;display:inline-flex;align-items:center">
              <span class="material-icons-round" style="position:absolute;left:10px;font-size:17px;color:var(--muted);pointer-events:none">search</span>
              <input type="text" id="tableSearch" placeholder="Search pages…" style="border:1px solid rgba(0,0,0,.1);border-radius:8px;padding:7px 12px 7px 32px;font-size:.78rem;font-family:inherit;color:var(--dark);outline:none;background:#f8f9fa;width:220px"/>
            </div>
          </div>

          <!-- buttons right -->
          <button class="btn-outline bg-dark text-white" data-bs-toggle="modal" data-bs-target="#openCreateModal">
            <span class="material-icons-round">add</span> <span id="newAssignBtn">New Assign</span>
          </button>

        </div>

        <!-- table -->
        <div class="table-responsive">
          <table class="mat-table" id="productsTable">
            <thead>
              <tr>
                <th onclick="sortTable(0)" id="sl"><span id="th-sl-lbl">SL</span> <span class="sort-icon"></span></th>
                <th onclick="sortTable(1)" id="th-class"><span id="th-class-lbl">Class</span> <span class="sort-icon"></span></th>
                <th onclick="sortTable(2)" id="th-section"><span id="th-section-lbl">Section</span> <span class="sort-icon"></span></th>
                <th onclick="sortTable(3)" id="th-subject"><span id="th-subject-lbl">Subject</span> <span class="sort-icon"></span></th>
                <th id="th-actions"><span id="th-actions-lbl">Action</span></th>
              </tr>
            </thead>
            <tbody id="tableBody"></tbody>
          </table>
        </div>

        <!-- pagination -->
        <div style="display:flex;align-items:center;justify-content:space-between;padding:14px 18px 18px;flex-wrap:wrap;gap:10px">
          <span style="font-size:.75rem;color:var(--muted)" id="pageInfo"></span>
          <div style="display:flex;gap:4px" id="paginationBtns"></div>
        </div>
      </div>

    <!-- ═══════ Open Create Modal ═══════ -->
    <div wire:ignore.self class="modal fade" id="openCreateModal" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header border-0">
                    <h5 class="modal-title">Add New Assign</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body p-4" style="display:flex;flex-direction:column;gap:14px">
                    <div>
                        <label style="font-size:.75rem;font-weight:600;color:var(--dark);display:block;margin-bottom:4px">Class</label>
                        <select wire:model="class_id" style="width:100%;border:1px solid rgba(0,0,0,.12);border-radius:8px;padding:8px 12px;font-size:.82rem;font-family:inherit;outline:none;background:#fff">
                            <option value="">Select Class</option>
                            @foreach($classes as $c)
                                <option value="{{ $c->id }}">{{ $c->name }}</option>
                            @endforeach
                        </select>
                        @error('class_id') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>

                    <div>
                        <label style="font-size:.75rem;font-weight:600;color:var(--dark);display:block;margin-bottom:4px">Section</label>
                        <select wire:model="section_id" style="width:100%;border:1px solid rgba(0,0,0,.12);border-radius:8px;padding:8px 12px;font-size:.82rem;font-family:inherit;outline:none;background:#fff">
                            <option value="">Select Section</option>
                            @foreach($sections as $s)
                                <option value="{{ $s->id }}">{{ $s->name }}</option>
                            @endforeach
                        </select>
                        @error('section_id') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>

                    <div>
                        <label style="font-size:.75rem;font-weight:600;color:var(--dark);display:block;margin-bottom:4px">Subject</label>
                        <div wire:ignore>
                            <select wire:model="subject_array" multiple title="Select Subject..." class="form-control selectpicker" >
                                @foreach($subjects as $key => $label)
                                    <option value="{{ $label }}">{{ $label }}</option>
                                @endforeach
                            </select>
                        </div>
                        @error('subject_array') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>

                </div>
                <div class="modal-footer border-0 gap-2">
                    <button class="btn-outline" data-bs-dismiss="modal">Cancel</button>
                    <button type="button" wire:click="save" class="btn-pink"><span class="material-icons-round" style="font-size:16px">add</span> Save</button>
                </div>
            </div>
        </div>
    </div>

    <!-- ═══════ Open Edit Modal ═══════ -->
    <div wire:ignore.self class="modal fade" id="openEditModal" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">

                <div class="modal-header border-0">
                    <h5 class="modal-title">Edit Subject</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>

                <div class="modal-body p-4" style="display:flex;flex-direction:column;gap:14px">
                    <div>
                        <label style="font-size:.75rem;font-weight:600;color:var(--dark);display:block;margin-bottom:4px">Class</label>
                        <select wire:model="class_id" style="width:100%;border:1px solid rgba(0,0,0,.12);border-radius:8px;padding:8px 12px;font-size:.82rem;font-family:inherit;outline:none;background:#fff">
                            <option value="">Select Class</option>
                            @foreach($classes as $c)
                                <option value="{{ $c->id }}">{{ $c->name }}</option>
                            @endforeach
                        </select>
                        @error('class_id') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>

                    <div>
                        <label style="font-size:.75rem;font-weight:600;color:var(--dark);display:block;margin-bottom:4px">Section</label>
                        <select wire:model="section_id" style="width:100%;border:1px solid rgba(0,0,0,.12);border-radius:8px;padding:8px 12px;font-size:.82rem;font-family:inherit;outline:none;background:#fff">
                            <option value="">Select Section</option>
                            @foreach($sections as $s)
                                <option value="{{ $s->id }}">{{ $s->name }}</option>
                            @endforeach
                        </select>
                        @error('section_id') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>

                    <div>
                        <label style="font-size:.75rem;font-weight:600;color:var(--dark);display:block;margin-bottom:4px">Subject</label>
                         <div wire:ignore>
                            <select wire:model="subject_array" multiple title="Select Subject..." class="form-control selectpicker" >
                                @foreach($subjects as $key => $label)
                                    <option value="{{ $label }}">{{ $label }}</option>
                                @endforeach
                            </select>
                        </div>
                        @error('subject_array') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>

                </div>

                <div class="modal-footer border-0">
                    <button class="btn-outline" data-bs-dismiss="modal">Cancel</button>
                    <button type="button" wire:click="update({{ $assign_id }})" class="btn-pink">Update</button>
                </div>

            </div>
        </div>
    </div>

    <!-- ═══════ DELETE CONFIRM MODAL ═══════ -->
    <div class="modal fade" id="deleteModal" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered modal-sm">
            <div class="modal-content text-center p-3">
            <div style="width:52px;height:52px;border-radius:50%;background:var(--pink-light);display:flex;align-items:center;justify-content:center;margin:12px auto">
                <span class="material-icons-round" style="color:var(--pink);font-size:26px">delete_outline</span>
            </div>
            <h6 style="font-weight:700;margin:8px 0 4px">Delete this subject?</h6>
            <p style="font-size:.78rem;color:var(--muted);margin-bottom:16px" id="deleteName">This action cannot be undone.</p>
            <div style="display:flex;gap:8px;justify-content:center">
                <button class="btn-outline" data-bs-dismiss="modal">Cancel</button>
                <button class="btn-pink" onclick="confirmDelete()">Delete</button>
            </div>
            </div>
        </div>
    </div>

</div>

    @push('scripts')
    <script>
        // DATA
        const assigns = @json($assigns);
        const perPage = 10;
        let currentPage = 1;
        let sortCol = -1, sortAsc = true;
        let filteredData = [...assigns];
        let deleteTargetId = null;

        function renderTable() {
            const start = (currentPage - 1) * perPage;
            const rows  = filteredData.slice(start, start + perPage);
            const tbody = document.getElementById('tableBody');

            tbody.innerHTML = rows.map((p, index) => `
                <tr id="row-${p.id}">
                    <td data-label="SL"><span class="">${start + index + 1}</span></td>
                    <td data-label="Class"><span class="">${p.class?.name ?? 'N/A'}</span></td>
                    <td data-label="Section"><span class="">${p.section?.name ?? 'N/A'}</span></td>
                    <td data-label="Subject"><span class="">${p.subjects ?? 'N/A'}</span></td>
                    <td data-label="Actions">
                    <div class="action-btns">
                        <button class="act-btn edit" title="Edit" wire:click="edit(${p.id})">
                            <span class="material-icons-round">drive_file_rename_outline</span>
                        </button>
                        <button class="act-btn delete" title="Delete" onclick="openDeleteModal(${p.id})">
                            <span class="material-icons-round">delete</span>
                        </button>
                    </div>
                </td>
            </tr>
            `).join('');

            renderPagination();
        }

        function renderPagination() {
            const total = Math.ceil(filteredData.length / perPage);
            const info  = document.getElementById('pageInfo');
            const wrap  = document.getElementById('paginationBtns');
            const s = (currentPage-1)*perPage+1, e = Math.min(currentPage*perPage, filteredData.length);
            info.textContent = filteredData.length ? `Showing ${s}–${e} of ${filteredData.length}` : 'No results';

            const btnStyle = (active) => `
            display:inline-flex;align-items:center;justify-content:center;
            width:32px;height:32px;border-radius:8px;border:1px solid rgba(0,0,0,.1);
            font-size:.78rem;font-weight:600;cursor:pointer;font-family:inherit;
            background:${active?'linear-gradient(195deg,#ec407a,#d81b60)':'#fff'};
            color:${active?'#fff':'var(--dark)'};
            box-shadow:${active?'0 4px 12px var(--pink-shadow)':'none'};
            `;

            let html = `<button style="${btnStyle(false)}" onclick="changePage(${currentPage-1})" ${currentPage===1?'disabled':''}>‹</button>`;
            for (let i=1;i<=total;i++) {
            html += `<button style="${btnStyle(i===currentPage)}" onclick="changePage(${i})">${i}</button>`;
            }
            html += `<button style="${btnStyle(false)}" onclick="changePage(${currentPage+1})" ${currentPage===total||total===0?'disabled':''}>›</button>`;
            wrap.innerHTML = html;
        }

        function changePage(p) {
            const total = Math.ceil(filteredData.length / perPage);
            if (p < 1 || p > total) return;
            currentPage = p;
            renderTable();
        }

        /* Search */
        document.getElementById('tableSearch').addEventListener('input', function() {
            const q = this.value.toLowerCase();
            filteredData = assigns.filter(p =>
                String(p.sl ?? '').toLowerCase().includes(q) ||
                String(p.class.name ?? '').toLowerCase().includes(q) ||
                String(p.section?.name ?? '').toLowerCase().includes(q) ||
                String(p.subjects ?? '').toLowerCase().includes(q)
            );
            currentPage = 1;
            renderTable();
        });

        /* Sort */
        function sortTable(col) { 
            const ths = document.querySelectorAll('.mat-table th');
            ths.forEach(th => th.classList.remove('sorted-asc','sorted-desc'));

            if (sortCol === col) sortAsc = !sortAsc;
            else { sortCol = col; sortAsc = true; }

            ths[col].classList.add(sortAsc ? 'sorted-asc' : 'sorted-desc');

            if (col === 0) {
                filteredData.sort((a, b) => sortAsc ? a.id - b.id : b.id - a.id);
            } else {
                const keys = ['class.name', 'section.name', 'subjects'];
                const k = keys[col - 1];

                filteredData.sort((a, b) => {
                    const av = a[k] ?? '';
                    const bv = b[k] ?? '';

                    if (typeof av === 'number') return sortAsc ? av - bv : bv - av;
                    return sortAsc 
                        ? String(av).localeCompare(String(bv)) 
                        : String(bv).localeCompare(String(av));
                });
            }

            renderTable();
        }

        // Open Delete Modal
        function openDeleteModal(id) {
            deleteTargetId = id;
            const p = assigns.find(x => x.id === id);
            if (!p) return;
            document.getElementById('deleteName').textContent = `"${p?.class.name}" will be permanently deleted.`;
            new bootstrap.Modal(document.getElementById('deleteModal')).show();
        }
        // Confirm delete action
        function confirmDelete() {
            Livewire.dispatch('deleteConfirmed', {
                id: deleteTargetId
            });

            Livewire.on('refresh-list', () => {
                window.location.reload();
            });

            const idx = assigns.findIndex(x => x.id === deleteTargetId);
            if (idx > -1) {
                assigns.splice(idx, 1);
                filteredData = [...assigns];
                renderTable();
            }
            bootstrap.Modal.getInstance(document.getElementById('deleteModal')).hide();
            
        }

        /* init */
        renderTable();
    </script>
    @endpush

@push('styles')
        {{-- selectpicker --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.14.0-beta3/dist/css/bootstrap-select.min.css">
@endpush
@push('scripts')
    {{-- selectpicker --}}
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.7.0/dist/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.14.0-beta3/dist/js/bootstrap-select.min.js"></script>
    <script>
        // $('.selectpicker').selectpicker();
        document.addEventListener('livewire:init', function () {

            function refreshPicker() {
                $('.selectpicker').selectpicker('refresh');
            }

            function initPicker() {
                $('.selectpicker').selectpicker();
                // refreshPicker();
            }

            // initial load
            setTimeout(() => {
                initPicker();
            }, 300);

            // Livewire update fix
            Livewire.hook('message.processed', () => {
                setTimeout(() => {
                    refreshPicker();
                }, 50);
            });

            // sync value
            $(document).on('changed.bs.select', '.selectpicker', function () {
                @this.set('subject_array', $(this).val());
            });

            // 🔥 THIS IS THE MOST IMPORTANT FIX
            Livewire.on('showModalChanged', () => {
                setTimeout(() => {
                    initPicker();
                }, 300);
            });

        });
    </script>
@endpush