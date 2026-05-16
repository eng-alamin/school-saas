<div class="mat-card" style="padding-top:28px">

      <!-- floating header -->
      <div class="mat-card-header header-pink-gradient">
        <h5 id="cardHeaderTitleAlldesignations">All Employees</h5>
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

          <a href="{{ route('admin.employee.add', ['tenant' => tenant('id')]) }}" target="_blank" id="newEmployeeBtn" class="btn-outline btn-outline bg-dark text-white">
            <span class="material-icons-round">add</span> <span id="newEmployeeBtn">New Employee</span>
          </a>

        </div>

        <!-- table -->
        <div class="table-responsive">
          <table class="mat-table" id="productsTable">
            <thead>
              <tr>
                <th onclick="sortTable(0)" id="sl"><span id="th-sl-lbl">SL</span> <span class="sort-icon"></span></th>
                <th onclick="sortTable(1)" id="th-name"><span id="th-name-lbl">Name</span> <span class="sort-icon"></span></th>
                <th onclick="sortTable(2)" id="th-designation"><span id="th-designation-lbl">Designation</span> <span class="sort-icon"></span></th>
                <th onclick="sortTable(3)" id="th-department"><span id="th-department-lbl">Department</span> <span class="sort-icon"></span></th>
                <th onclick="sortTable(4)" id="th-email"><span id="th-email-lbl">Email</span> <span class="sort-icon"></span></th>
                <th onclick="sortTable(5)" id="th-phone"><span id="th-phone-lbl">Phone</span> <span class="sort-icon"></span></th>
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
                    <h5 class="modal-title">Add New Designation</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body p-4" style="display:flex;flex-direction:column;gap:14px">
                    <div>
                        <label style="font-size:.75rem;font-weight:600;color:var(--dark);display:block;margin-bottom:4px">Name *</label>
                        <input wire:model="name" type="text" placeholder="e.g. Science" style="width:100%;border:1px solid rgba(0,0,0,.12);border-radius:8px;padding:8px 12px;font-size:.82rem;font-family:inherit;outline:none"/>
                        @error('name') <span class="text-danger">{{ $message }}</span> @enderror
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
                    <h5 class="modal-title">Edit Designation</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>

                <div class="modal-body p-4" style="display:flex;flex-direction:column;gap:14px">
                    
                    <input type="hidden" wire:model="employee_id"/>

                    <div>
                        <label style="font-size:.75rem;font-weight:600;color:var(--dark);display:block;margin-bottom:4px">Name *</label>
                        <input wire:model="name" type="text" placeholder="e.g. A" style="width:100%;border:1px solid rgba(0,0,0,.12);border-radius:8px;padding:8px 12px;font-size:.82rem;font-family:inherit;outline:none"/>
                        @error('name') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>

                </div>

                <div class="modal-footer border-0">
                    <button class="btn-outline" data-bs-dismiss="modal">Cancel</button>
                    <button type="button" wire:click="update({{ $employee_id }})" class="btn-pink">Update</button>
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
            <h6 style="font-weight:700;margin:8px 0 4px">Delete this designation?</h6>
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
        const employees = @json($employees);
        const perPage = 10;
        let currentPage = 1;
        let sortCol = -1, sortAsc = true;
        let filteredData = [...employees];
        let deleteTargetId = null;

        function getVal(p, col) {
            switch(col) {
                case 0: return p.id;
                case 1: return p.name ?? p.name ?? '';
                case 2: return p.designation?.name ?? '';
                case 3: return p.department?.name ?? '';
                case 4: return p.email ?? '';
                case 5: return p.phone ?? '';
                default: return '';
            }
        }

        function renderTable() {
            const start = (currentPage - 1) * perPage;
            const rows  = filteredData.slice(start, start + perPage);
            const tbody = document.getElementById('tableBody');

            tbody.innerHTML = rows.map((p, index) => `
                <tr id="row-${p.id}">
                    <td data-label="SL"><span>${start + index + 1}</span></td>
                    <td data-label="Name">
                        <div class="prod-cell">
                            <img src="${p.photo ? p.photo : '/assets/img/default-user.jpg'}" class="prod-thumb" alt="${p.name ?? p.name ?? ''}"/>
                            <span class="prod-name">${p.name ?? p.name ?? ''}</span>
                        </div>
                    </td>
                    <td data-label="Designation"><span>${p.designation?.name ?? 'N/A'}</span></td>
                    <td data-label="Department"><span>${p.department?.name ?? 'N/A'}</span></td>
                    <td data-label="Email"><span>${p.email ?? ''}</span></td>
                    <td data-label="Phone"><span>${p.phone ?? ''}</span></td>
                    <td data-label="Actions">
                        <div class="action-btns">
                            <a href="/employee/edit/${p.id}" target="_blank" class="act-btn edit" title="Edit">
                                <span class="material-icons-round">drive_file_rename_outline</span>
                            </a>
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
            filteredData = employees.filter(p =>
                String(p.id ?? '').toLowerCase().includes(q) ||
                String(p.name ?? p.name ?? '').toLowerCase().includes(q) ||
                String(p.designation?.name ?? '').toLowerCase().includes(q) ||
                String(p.department?.name ?? '').toLowerCase().includes(q) ||
                String(p.email ?? '').toLowerCase().includes(q) ||
                String(p.phone ?? '').toLowerCase().includes(q)
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

            filteredData.sort((a, b) => {
                const av = getVal(a, col);
                const bv = getVal(b, col);
                if (typeof av === 'number' && typeof bv === 'number') {
                    return sortAsc ? av - bv : bv - av;
                }
                return sortAsc
                    ? String(av).localeCompare(String(bv))
                    : String(bv).localeCompare(String(av));
            });

            renderTable();
        }

        // Open Edit Modal
        function openEditModal(id) {
            @this.call('edit', id);
            new bootstrap.Modal(document.getElementById('openEditModal')).show();
        }

        // Open Delete Modal
        function openDeleteModal(id) {
            deleteTargetId = id;
            const p = employees.find(x => x.id === id);
            if (!p) return;
            const displayName = p.name ?? p.name ?? 'This record';
            document.getElementById('deleteName').textContent = `"${displayName}" will be permanently deleted.`;
            new bootstrap.Modal(document.getElementById('deleteModal')).show();
        }

        // Confirm delete
        function confirmDelete() {
            Livewire.dispatch('deleteConfirmed', { id: deleteTargetId });

            const idx = employees.findIndex(x => x.id === deleteTargetId);
            if (idx > -1) {
                employees.splice(idx, 1);
                filteredData = [...employees];
                renderTable();
            }
            bootstrap.Modal.getInstance(document.getElementById('deleteModal')).hide();
        }

        // Save/Update এর পর refresh
        document.addEventListener('livewire:initialized', () => {
            Livewire.on('refresh-list', (data) => {
                const newData = data[0];
                employees.length = 0;
                newData.forEach(d => employees.push(d));
                filteredData = [...employees];
                renderTable();

                document.querySelectorAll('.modal.show').forEach(m => {
                    bootstrap.Modal.getInstance(m)?.hide();
                });
            });
        });

        /* init */
        renderTable();
    </script>
@endpush