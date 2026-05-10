<div class="mat-card" style="padding-top:28px">

      <!-- floating header -->
      <div class="mat-card-header header-pink-gradient">
        <h5 id="cardHeaderTitleAllStudents">All Students</h5>
        <p id="cardHeaderSubtitle">A lightweight, extendable, dependency-free javascript HTML table plugin.</p>
      </div>

      <div class="row g-4 p-5">
        <div class="col-md-6">
          <div class="input-group input-group-outline">
            <label class="form-label">Class</label>
            <select class="form-select">
              <option value="">Select</option>
              <option value="One">One</option>
              <option value="Two">Two</option>
              <option value="Three">Three</option>
              <option value="Four">Four</option>
            </select>
          </div>
        </div>
        <div class="col-md-6">
          <div class="input-group input-group-outline">
            <label class="form-label">Section</label>
            <select class="form-select">
              <option value="">Select</option>
              <option value="A">A</option>
              <option value="B">B</option>
              <option value="C">C</option>
              <option value="D">D</option>
            </select>
          </div>
        </div>
        <div class="col-md-12 text-center">
            <button class="btn-pink w-100 d-flex justify-content-center align-items-center" type="button" onclick="handleSave(this)">
                Filter
            </button>
        </div>
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
          <button class="btn-outline" data-bs-toggle="modal" data-bs-target="#importModal">
            <span class="material-icons-round" style="font-size:16px">upload</span> <span id="importBtnEl">Import</span>
          </button>
          <button class="btn-outline" id="exportBtn">
            <span class="material-icons-round" style="font-size:16px">download</span> <span id="exportBtnEl">Export CSV</span>
          </button>
          <button class="btn-outline" id="printBtn">
            <span class="material-icons-round" style="font-size:16px">print</span> <span id="printBtnEl">Print</span>
          </button>

        </div>

        <!-- table -->
        <div class="table-responsive">
          <table class="mat-table" id="productsTable">
            <thead>
              <tr>
                <th onclick="sortTable(0)" id="th-name"><span id="th-name-lbl">Name</span> <span class="sort-icon"></span></th>
                <th onclick="sortTable(1)" id="th-class"><span id="th-class-lbl">Class</span> <span class="sort-icon"></span></th>
                <th onclick="sortTable(2)" id="th-section"><span id="th-section-lbl">Section</span> <span class="sort-icon"></span></th>
                <th onclick="sortTable(3)" id="th-gender"><span id="th-gender-lbl">Gender</span> <span class="sort-icon"></span></th>
                <th onclick="sortTable(4)" id="th-register-no"><span id="th-register-lbl">Register No</span> <span class="sort-icon"></span></th>
                <th onclick="sortTable(5)" id="th-roll-no"><span id="th-roll-lbl">Roll No</span> <span class="sort-icon"></span></th>
                <th onclick="sortTable(6)" id="th-guardian-name"><span id="th-guardian-name-lbl">Guardian Name</span> <span class="sort-icon"></span></th>
                <th id="th-actions"><span id="th-actions-lbl">Action</span></th>
              </tr>
            </thead>
            <tbody id="tableBody">
              <!-- rows injected by JS -->
            </tbody>
          </table>
        </div>

        <!-- pagination -->
        <div style="display:flex;align-items:center;justify-content:space-between;padding:14px 18px 18px;flex-wrap:wrap;gap:10px">
          <span style="font-size:.75rem;color:var(--muted)" id="pageInfo"></span>
          <div style="display:flex;gap:4px" id="paginationBtns"></div>
        </div>
      </div>

    </div>

    @push('scripts')
        <!-- ═══════ IMPORT MODAL ═══════ -->
        <div class="modal fade" id="importModal" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Import CSV</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body p-4">
                <div class="drop-zone" onclick="document.getElementById('csvFile').click()">
                <span class="material-icons-round">file_upload</span>
                <p><strong>You can browse your computer for a file.</strong></p>
                <p style="margin-top:4px">Drag &amp; drop or <span style="color:var(--pink);font-weight:600">click to browse</span></p>
                </div>
                <input type="file" id="csvFile" accept=".csv" style="display:none"/>
                <div class="form-check mt-3">
                <input class="form-check-input" type="checkbox" id="termsCheck"/>
                <label class="form-check-label" for="termsCheck" style="font-size:.8rem">
                    I accept the terms and conditions
                </label>
                </div>
            </div>
            <div class="modal-footer gap-2">
                <button class="btn-outline" data-bs-dismiss="modal">Close</button>
                <button class="btn-pink">
                <span class="material-icons-round" style="font-size:16px">upload</span> Upload
                </button>
            </div>
            </div>
        </div>
        </div>

        <!-- ═══════ NEW PRODUCT MODAL ═══════ -->
        <div class="modal fade" id="newPageModal" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
            <div class="modal-header border-0">
                <h5 class="modal-title">Add New Product</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body p-4" style="display:flex;flex-direction:column;gap:14px">

                <div>
                <div class="form-control border dropzone" id="myDropzone"></div>
                </div>

                <div>
                <label style="font-size:.75rem;font-weight:600;color:var(--dark);display:block;margin-bottom:4px">Product Name</label>
                <input type="text" placeholder="e.g. Air Max 2024" style="width:100%;border:1px solid rgba(0,0,0,.12);border-radius:8px;padding:8px 12px;font-size:.82rem;font-family:inherit;outline:none"/>
                </div>
                <div style="display:grid;grid-template-columns:1fr 1fr;gap:12px">
                <div>
                    <label style="font-size:.75rem;font-weight:600;color:var(--dark);display:block;margin-bottom:4px">Category</label>
                    <select style="width:100%;border:1px solid rgba(0,0,0,.12);border-radius:8px;padding:8px 12px;font-size:.82rem;font-family:inherit;outline:none;background:#fff">
                    <option>Clothing</option><option>Electronics</option><option>Furniture</option>
                    <option>Shoes</option><option>Designer</option>
                    </select>
                </div>
                <div>
                    <label style="font-size:.75rem;font-weight:600;color:var(--dark);display:block;margin-bottom:4px">Price ($)</label>
                    <input type="number" placeholder="0.00" style="width:100%;border:1px solid rgba(0,0,0,.12);border-radius:8px;padding:8px 12px;font-size:.82rem;font-family:inherit;outline:none"/>
                </div>
                </div>
                <div style="display:grid;grid-template-columns:1fr 1fr;gap:12px">
                <div>
                    <label style="font-size:.75rem;font-weight:600;color:var(--dark);display:block;margin-bottom:4px">SKU</label>
                    <input type="text" placeholder="e.g. 123456" style="width:100%;border:1px solid rgba(0,0,0,.12);border-radius:8px;padding:8px 12px;font-size:.82rem;font-family:inherit;outline:none"/>
                </div>
                <div>
                    <label style="font-size:.75rem;font-weight:600;color:var(--dark);display:block;margin-bottom:4px">Quantity</label>
                    <input type="number" placeholder="0" style="width:100%;border:1px solid rgba(0,0,0,.12);border-radius:8px;padding:8px 12px;font-size:.82rem;font-family:inherit;outline:none"/>
                </div>
                </div>
            </div>
            <div class="modal-footer border-0 gap-2">
                <button class="btn-outline" data-bs-dismiss="modal">Cancel</button>
                <button class="btn-pink"><span class="material-icons-round" style="font-size:16px">add</span> Add Product</button>
            </div>
            </div>
        </div>
        </div>

        <!-- ═══════ VIEW MODAL ═══════ -->
        <div class="modal fade" id="viewStudentModal" tabindex="-1">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                
                <div class="modal-header border-0">
                    <h5 class="modal-title">Student Details</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>

                <div class="modal-body">

                    <div style="display:flex;gap:20px;flex-wrap:wrap">
                    <div style="width:100px;height:100px;background:var(--surface-2);border-radius:12px;display:flex;align-items:center;justify-content:center;font-size:48px;border:1px solid var(--border);flex-shrink:0">
                        <div style="text-align:center;margin-bottom:12px">
                            <img id="viewPhoto" src="" style="width:80px;height:80px;border-radius:10px"/>
                        </div>
                    </div>
                    <div style="flex:1;min-width:200px">
                        <h5 style="font-weight:700;margin-bottom:4px"> <span id="viewFullName"></span></h5>
                        <div style="font-size:12px;color:#9aa0be;font-family:'JetBrains Mono',monospace;margin-bottom:12px"><span id="viewGender"></span></div>
                        <div style="display:grid;grid-template-columns:1fr 1fr;gap:12px">
                            <div><div style="font-size:11px;color:#9aa0be;font-weight:700;text-transform:uppercase">Class</div><div style="font-weight:600;margin-top:2px"><span id="viewClass"></span></div></div>
                            <div><div style="font-size:11px;color:#9aa0be;font-weight:700;text-transform:uppercase">Section</div><div style="font-weight:700;font-size:18px;color:var(--primary);margin-top:2px"><span id="viewSection"></span></div></div>
                            <div><div style="font-size:11px;color:#9aa0be;font-weight:700;text-transform:uppercase">Category</div><div style="font-weight:600;margin-top:2px"><span id="viewCategory"></span></div></div>
                            <div><div style="font-size:11px;color:#9aa0be;font-weight:700;text-transform:uppercase">Registration No.</div><div style="margin-top:4px"><span id="viewRegisterNo"></span></div></div>
                            <div><div style="font-size:11px;color:#9aa0be;font-weight:700;text-transform:uppercase">Roll No.</div><div style="margin-top:4px"><span id="viewRollNo"></span></div></div>
                            <div><div style="font-size:11px;color:#9aa0be;font-weight:700;text-transform:uppercase">Guardian Name</div><div style="margin-top:4px"><span id="viewGuardianName "></span></div></div>
                        </div>
                    </div>
                    </div>
                </div>

                <div class="modal-footer border-0">
                    <button class="btn-outline" data-bs-dismiss="modal">Close</button>
                </div>

                </div>
            </div>
        </div>

        <!-- EDIT PRODUCT MODAL -->
        <div class="modal fade" id="editProductModal" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">

            <div class="modal-header border-0">
                <h5 class="modal-title">Edit Product</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>

            <div class="modal-body" style="display:flex;flex-direction:column;gap:14px">

                <input type="hidden" id="editId">

                <div>
                <label>Product Name</label>
                <input type="text" id="editName" class="form-control">
                </div>

                <div style="display:grid;grid-template-columns:1fr 1fr;gap:10px">
                <div>
                    <label>Category</label>
                    <select id="editCategory" class="form-control">
                    <option>Clothing</option>
                    <option>Electronics</option>
                    <option>Furniture</option>
                    <option>Shoes</option>
                    <option>Designer</option>
                    </select>
                </div>

                <div>
                    <label>Price</label>
                    <input type="number" id="editPrice" class="form-control">
                </div>
                </div>

                <div style="display:grid;grid-template-columns:1fr 1fr;gap:10px">
                <div>
                    <label>SKU</label>
                    <input type="text" id="editSku" class="form-control">
                </div>

                <div>
                    <label>Quantity</label>
                    <input type="number" id="editQty" class="form-control">
                </div>
                </div>

                <div>
                <label>Status</label>
                <select id="editStatus" class="form-control">
                    <option>In Stock</option>
                    <option>Out of Stock</option>
                </select>
                </div>

            </div>

            <div class="modal-footer border-0">
                <button class="btn-outline" data-bs-dismiss="modal">Cancel</button>
                <button class="btn-pink" onclick="updateProduct()">Save Changes</button>
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
            <h6 style="font-weight:700;margin:8px 0 4px">Delete this product?</h6>
            <p style="font-size:.78rem;color:var(--muted);margin-bottom:16px" id="deleteName">This action cannot be undone.</p>
            <div style="display:flex;gap:8px;justify-content:center">
                <button class="btn-outline" data-bs-dismiss="modal">Cancel</button>
                <button class="btn-pink" onclick="confirmDelete()">Delete</button>
            </div>
            </div>
        </div>
        </div>
        <!-- ═══════ Toast Container ═══════ -->
        <div class="toast-container" id="toastContainer"></div>

        <!-- Bootstrap JS -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Dropzone JS -->
        <script src="https://unpkg.com/dropzone@5/dist/min/dropzone.min.js"></script>
        <!-- Theme JS -->
        <script src="theme.js"></script>


    <script>
        // DATA
        const students = @json($students);
        const perPage = 10;
        let currentPage = 1;
        let sortCol = -1, sortAsc = true;
        let filteredData = [...students];
        let deleteTargetId = null;

        function renderTable() {
            const start = (currentPage - 1) * perPage;
            const rows  = filteredData.slice(start, start + perPage);
            const tbody = document.getElementById('tableBody');

            tbody.innerHTML = rows.map(p => `
                <tr id="row-${p.id}">
                <td class="prod-td" data-label="">
                <div class="prod-cell">
                    <img src="${p.photo ? p.photo : '/assets/img/default-user.jpg'}" class="prod-thumb" alt="${p.full_name}"/>
                    <span class="prod-name">${p.full_name}</span>
                </div>
                </td>
                <td data-label="Class"><span class="">${p.class_id}</span></td>
                <td data-label="Section"><span class="">${p.section_id}</span></td>
                <td data-label="Gender"><span class="">${p.gender}</span></td>
                <td data-label="Register No"><span class="">${p.register_no}</span></td>
                <td data-label="Roll No"><span class="">${p.roll_no}</span></td>
                <td data-label="Guardian Name"><span class="">${p.guardians?.[0]?.name ?? 'No Guardian'}</span></td>
                <td data-label="Actions">
                <div class="action-btns">
                    
                    <button class="act-btn view" title="View"  onclick="openViewModal(${p.id})">
                        <span class="material-icons-round">visibility</span>
                    </button>
                    <button class="act-btn edit"   title="Edit"  onclick="openEditModal(${p.id})">
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
            filteredData = students.filter(p =>
                (p.full_name ?? '').toLowerCase().includes(q) ||
                String(p.class_id ?? '').toLowerCase().includes(q) ||
                String(p.section_id ?? '').toLowerCase().includes(q) ||
                (p.gender ?? '').toLowerCase().includes(q) ||
                (p.register_no ?? '').toLowerCase().includes(q) ||
                String(p.roll_no ?? '').toLowerCase().includes(q) ||
                (p.guardians?.[0]?.name ?? '').toLowerCase().includes(q)
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
            const keys = ['full_name', 'class_id', 'section_id', 'gender', 'register_no', 'roll_no', 'guardian_name'];
            const k = keys[col];
            if (!k) return 0;
            const av = a[k], bv = b[k];
            if (typeof av === 'number') return sortAsc ? av - bv : bv - av;
            return sortAsc ? String(av).localeCompare(String(bv)) : String(bv).localeCompare(String(av));
            });
            renderTable();
        }

        // View Modal
        function openViewModal(id) {
            const p = students.find(item => item.id === id);
            if (!p) return;

            const setText = (id, val) => {
                const el = document.getElementById(id);
                if (el) el.textContent = val ?? '';
            };

            const img = document.getElementById('viewPhoto');
            if (img) img.src = p.photo ? '/storage/' + p.photo : '/assets/img/default-user.jpg';

            setText('viewFullName', p.full_name);
            setText('viewClass', p.class_id);
            setText('viewSection', p.section_id);
            setText('viewCategory', p.category_id);
            setText('viewRegisterNo', p.register_no);
            setText('viewRollNo', p.roll_no);
            setText('viewGender', p.gender);
            setText('viewGuardianName', p.guardians?.[0]?.name);

            new bootstrap.Modal(document.getElementById('viewStudentModal')).show();
        }

        // Delete Modal
        function openDeleteModal(id) {
            deleteTargetId = id;
            const p = students.find(x => x.id === id);
            if (!p) return;
            document.getElementById('deleteName').textContent = `"${p?.full_name}" will be permanently deleted.`;
            new bootstrap.Modal(document.getElementById('deleteModal')).show();
        }

        function confirmDelete() {
            Livewire.dispatch('deleteConfirmed', {
                id: deleteTargetId
            });

            Livewire.on('refresh-list', () => {
                window.location.reload();
            });

            const idx = students.findIndex(x => x.id === deleteTargetId);
            if (idx > -1) {
            students.splice(idx, 1);
            filteredData = [...students];
            renderTable();
            }
            bootstrap.Modal.getInstance(document.getElementById('deleteModal')).hide();

            
        }

        

        /* export CSV */
        document.getElementById('exportBtn').addEventListener('click', function() {
            const header = 'Product,Category,Price,SKU,Quantity,Status\n';
            const rows = filteredData.map(p => `"${p.name}","${p.category}","$${p.price}","${p.sku}","${p.qty}","${p.status}"`).join('\n');
            const blob = new Blob([header + rows], {type:'text/csv'});
            const a = document.createElement('a');
            a.href = URL.createObjectURL(blob);
            a.download = 'products.csv'; a.click();
        });

        /* init */
        renderTable();
    </script>
    @endpush