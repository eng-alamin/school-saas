    <div class="mat-card" style="padding-top:28px">

        <!-- Floating Header -->
        <div class="mat-card-header header-pink-gradient">
            <h5><span class="material-icons-round" style="font-size:18px;vertical-align:middle;margin-right:6px">how_to_reg</span>Student Admission</h5>
            <p>Create new student admission record</p>
        </div>

        <!-- ══ ACADEMIC DETAILS ══ -->
        <div class="form-section" style="padding-top:40px">
            <div class="section-heading">
            <span class="material-icons-round">school</span> Academic Details
            </div>
            <div class="row g-4">
            <div class="col-md-3">
                <div class="input-group input-group-outline" wire:ignore>
                    <label class="form-label">Academic Year <span class="req">*</span></label>
                    <select wire:model="academic_year" class="form-select">
                        <option value="2026-2027">2026-2027</option>
                        <option value="2025-2026">2025-2026</option>
                        <option value="2024-2025">2024-2025</option>
                    </select>
                </div>
                @error('academic_year') <span class="text-danger">{{ $message }}</span> @enderror
            </div>
            <div class="col-md-3">
                <div class="input-group input-group-outline">
                    <label class="form-label">Register No <span class="req">*</span></label>
                    <input type="text" wire:model="register_no" class="form-control" value="ISC-0001" onfocus="focused(this)" onfocusout="defocused(this)">
                     @error('register_no') <span class="text-danger">{{ $message }}</span> @enderror
                </div>
            </div>
            <div class="col-md-3">
                <div class="input-group input-group-outline">
                    <label class="form-label">Roll</label>
                    <input type="text" wire:model="roll_no" class="form-control" placeholder=" " onfocus="focused(this)" onfocusout="defocused(this)">
                     @error('roll_no') <span class="text-danger">{{ $message }}</span> @enderror
                </div>
            </div>
            <div class="col-md-3">
                <div class="input-group input-group-outline" wire:ignore>
                    <label class="form-label">Admission Date <span class="req">*</span></label>
                    <input type="date" wire:model="admission_date" class="form-control">
                     @error('admission_date') <span class="text-danger">{{ $message }}</span> @enderror
                </div>
            </div>
            <div class="col-md-4">
                <div class="input-group input-group-outline" wire:ignore>
                    <label class="form-label">Class <span class="req">*</span></label>
                    <select wire:model="class_id" class="form-select" id="classSelect">
                        <option value="">Select</option>
                        <option value="1">Class 1</option>
                        <option value="2">Class 2</option>
                        <option value="3">Class 3</option>
                        <option value="4">Class 4</option>
                        <option value="5">Class 5</option>
                        <option value="6">Class 6</option>
                        <option value="7">Class 7</option>
                        <option value="8">Class 8</option>
                        <option value="9">Class 9</option>
                        <option value="10">Class 10</option>
                    </select>
                     @error('class_id') <span class="text-danger">{{ $message }}</span> @enderror
                </div>
            </div>
            <div class="col-md-4">
                <div class="input-group input-group-outline" wire:ignore>
                    <label class="form-label">Section <span class="req">*</span></label>
                    <select wire:model="section_id" class="form-select" id="sectionSelect">
                        <option value="">Select Class First</option>
                        <option value="1">A</option>
                        <option value="2">B</option>
                        <option value="3">C</option>
                        <option value="4">D</option>
                        <option value="5">E</option>
                        <option value="6">F</option>
                    </select>
                    @error('section_id') <span class="text-danger">{{ $message }}</span> @enderror
                </div>
            </div>
            <div class="col-md-4">
                <div class="input-group input-group-outline" wire:ignore>
                    <label class="form-label">Category <span class="req">*</span></label>
                    <select wire:model="category_id" class="form-select">
                        <option value="">Select</option>
                        <option value="1">General</option>
                        <option value="2">OBC</option>
                        <option value="3">SC</option>
                        <option value="4">ST</option>
                    </select>
                    @error('category_id') <span class="text-danger">{{ $message }}</span> @enderror
                </div>
            </div>
            </div>
        </div>

        <!-- ══ STUDENT DETAILS ══ -->
        <div class="form-section">
            <div class="section-heading">
            <span class="material-icons-round">person</span> Student Details
            </div>
            <div class="row g-4">
            <div class="col-md-6">
                    <div class="input-group input-group-outline">
                    <label class="form-label">Full Name <span class="req">*</span></label>
                    <input type="text" wire:model="full_name" class="form-control" placeholder=" " onfocus="focused(this)" onfocusout="defocused(this)">
                    @error('full_name') <span class="text-danger">{{ $message }}</span> @enderror
                </div>
            </div>
            <div class="col-md-6">
                <div class="input-group input-group-outline" wire:ignore>
                    <label class="form-label">Gender</label>
                    <select wire:model="gender" class="form-select">
                        <option value="male" selected>Male</option>
                        <option value="female">Female</option>
                        <option value="other">Other</option>
                    </select>
                    @error('gender') <span class="text-danger">{{ $message }}</span> @enderror
                </div>
            </div>
            <div class="col-md-6">
                <div class="input-group input-group-outline" wire:ignore>
                    <label class="form-label">Blood Group</label>
                    <select wire:model="blood_group" class="form-select">
                        <option value="">Select</option>
                        <option value="A+">A+</option>
                        <option value="A-">A-</option>
                        <option value="B+">B+</option>
                        <option value="B-">B-</option>
                        <option value="AB+">AB+</option>
                        <option value="AB-">AB-</option>
                        <option value="O+">O+</option>
                        <option value="O-">O-</option>
                    </select>
                    @error('blood_group') <span class="text-danger">{{ $message }}</span> @enderror
                </div>
            </div>
            <div class="col-md-6">
                <div class="input-group input-group-outline" wire:ignore>
                    <label class="form-label">Date Of Birth</label>
                    <input type="date" wire:model="dob" class="form-control" placeholder=" " onfocus="focused(this)" onfocusout="defocused(this)">
                    @error('dob') <span class="text-danger">{{ $message }}</span> @enderror     
                </div>
            </div>
            <div class="col-md-4">
                <div class="input-group input-group-outline" wire:ignore>
                    <label class="form-label">Religion</label>
                    <select wire:model="religion" class="form-select">
                        <option value="">Select</option>
                        <option value="muslim">Muslim</option>
                        <option value="hindu">Hindu</option>
                        <option value="christian">Christian</option>
                        <option value="buddhist">Buddhist</option>
                    </select>
                </div>
            </div>
            <div class="col-md-4">
                <div class="input-group input-group-outline">
                    <label class="form-label">Mobile No</label>
                    <input type="tel" wire:model="mobile" class="form-control" placeholder=" " onfocus="focused(this)" onfocusout="defocused(this)">
                </div>
            </div>
            <div class="col-md-4">
                <div class="input-group input-group-outline">
                <label class="form-label">Email</label>
                <input type="email" wire:model="email" class="form-control" placeholder=" " onfocus="focused(this)" onfocusout="defocused(this)">
                </div>
            </div>
            <div class="col-md-12">
                <div class="input-group input-group-outline">
                <label class="form-label">Present Address</label>
                <textarea wire:model="present_address" class="form-control" placeholder=" " onfocus="focused(this)" onfocusout="defocused(this)"></textarea>
                </div>
            </div>
            <div class="col-md-12">
                <div class="input-group input-group-outline">
                <label class="form-label">Permanent Address</label>
                <textarea wire:model="permanent_address" class="form-control" placeholder=" " onfocus="focused(this)" onfocusout="defocused(this)"></textarea>
                </div>
            </div>
            <div class="col-12">
                <label style="font-size:.73rem;font-weight:600;color:var(--muted);display:block;margin-bottom:8px">Profile Picture</label>
                <div class="photo-upload-box" id="studentPhotoBox">
                <span class="material-icons-round">person</span>
                <span class="lbl">Click to upload student photo</span>
                <small style="color:#bbb;font-size:.7rem">JPG, PNG up to 2MB</small>
                <input type="file" accept="image/*" onchange="previewPhoto(this,'studentPhotoBox')">
                </div>
            </div>
            </div>
        </div>

        <!-- ══ LOGIN DETAILS ══ -->
        <div class="form-section">
            <div class="section-heading">
            <span class="material-icons-round">lock</span> Login Details
            </div>
            <div class="row g-4">
            <div class="col-md-4">
                <div class="input-group input-group-outline">
                    <label class="form-label">Username <span class="req">*</span></label>
                    <input type="text" wire:model="username" class="form-control" value="admin@ramom.com" onfocus="focused(this)" onfocusout="defocused(this)">
                    @error('username') <span class="text-danger">{{ $message }}</span> @enderror     
                </div>
            </div>
            <div class="col-md-4">
                <div class="input-group input-group-outline">
                    <label class="form-label">Password <span class="req">*</span></label>
                    <input type="password" wire:model="password" class="form-control" value="1234" onfocus="focused(this)" onfocusout="defocused(this)">
                    @error('password') <span class="text-danger">{{ $message }}</span> @enderror     
                </div>
            </div>
            <div class="col-md-4">
                <div class="input-group input-group-outline">
                    <label class="form-label">Retype Password <span class="req">*</span></label>
                    <input type="password" wire:model="password_confirmation" class="form-control" placeholder=" " onfocus="focused(this)" onfocusout="defocused(this)">
                    @error('password_confirmation') <span class="text-danger">{{ $message }}</span> @enderror     
                </div>
            </div>
            </div>
        </div>

        <!-- ══ GUARDIAN DETAILS ══ -->
        <div class="form-section">
            <div class="section-heading">
                <span class="material-icons-round">supervisor_account</span> Guardian Details
            </div>
            <div class="row g-4 mb-2">
                <div class="col-12">
                    <div class="form-check">
                        <input wire:model.live="guardian_exists" class="form-check-input" type="checkbox" id="guardianExist">
                        <label class="form-check-label" for="guardianExist">Guardian Already Exist</label>
                    </div>
                </div>
            </div>

            {{-- EXISTING GUARDIAN --}}
            <div class="row g-4 {{ $guardian_exists ? '' : 'd-none' }}">
                <div class="col-md-6 @if($this->guardian_exists === false) d-none @else d-block @endif">
                    <div class="input-group input-group-outline" wire:ignore>
                        <label class="form-label">Guardian</label>
                        <select wire:model="guardian_id" class="form-select">
                            <option value="">Select</option>
                            @foreach ($guardians as $item)
                                <option value="{{ $item->id }}">{{ $item->name }}</option>
                            @endforeach
                        </select>
                        @error('guardian_id') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>
                </div>
            </div>

            {{-- NEW GUARDIAN --}}
            <div class="row g-4 {{ $guardian_exists ? 'd-none' : '' }}">
                <div class="col-md-6">
                    <div class="input-group input-group-outline">
                        <label class="form-label">Name <span class="req">*</span></label>
                        <input type="text" wire:model="guardian_name" class="form-control" placeholder=" " onfocus="focused(this)" onfocusout="defocused(this)">
                        @error('guardian_name') <span class="text-danger">{{ $message }}</span> @enderror     
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="input-group input-group-outline">
                        <label class="form-label">Relation <span class="req">*</span></label>
                        <input type="text" wire:model="guardian_relation" class="form-control" placeholder=" " onfocus="focused(this)" onfocusout="defocused(this)">
                        @error('guardian_relation') <span class="text-danger">{{ $message }}</span> @enderror     
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="input-group input-group-outline">
                        <label class="form-label">Father Name</label>
                        <input type="text" wire:model="guardian_father_name" class="form-control" placeholder=" " onfocus="focused(this)" onfocusout="defocused(this)">
                        @error('guardian_father_name') <span class="text-danger">{{ $message }}</span> @enderror     
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="input-group input-group-outline">
                        <label class="form-label">Mother Name</label>
                        <input type="text" wire:model="guardian_mother_name" class="form-control" placeholder=" " onfocus="focused(this)" onfocusout="defocused(this)">
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="input-group input-group-outline">
                        <label class="form-label">Occupation <span class="req">*</span></label>
                        <input type="text" wire:model="guardian_occupation" class="form-control" placeholder=" " onfocus="focused(this)" onfocusout="defocused(this)">
                        @error('guardian_occupation') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="input-group input-group-outline">
                        <label class="form-label">Income</label>
                        <input type="text" wire:model="guardian_income" class="form-control" placeholder=" " onfocus="focused(this)" onfocusout="defocused(this)">
                        @error('guardian_income') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="input-group input-group-outline">
                        <label class="form-label">Education</label>
                        <input type="text" wire:model="guardian_education" class="form-control" placeholder=" " onfocus="focused(this)" onfocusout="defocused(this)">
                        @error('guardian_education') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="input-group input-group-outline">
                        <label class="form-label">Mobile No <span class="req">*</span></label>
                        <input type="tel" wire:model="guardian_mobile" class="form-control" placeholder=" " onfocus="focused(this)" onfocusout="defocused(this)">
                        @error('guardian_mobile') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="input-group input-group-outline">
                        <label class="form-label">Email</label>
                        <input type="email" wire:model="guardian_email" class="form-control" placeholder=" " onfocus="focused(this)" onfocusout="defocused(this)">
                        @error('guardian_email') <span class="text-danger">{{ $message }}</span> @enderror  
                    </div>
                </div>
                <div class="col-12">
                    <div class="input-group input-group-outline">
                        <label class="form-label">Address <span class="req">*</span></label>
                        <textarea wire:model="guardian_address" class="form-control" placeholder=" " onfocus="focused(this)" onfocusout="defocused(this)"></textarea>
                    </div>
                </div>
                <div class="col-12">
                    <label style="font-size:.73rem;font-weight:600;color:var(--muted);display:block;margin-bottom:8px">Guardian Picture</label>
                    <div class="photo-upload-box" id="guardianPhotoBox">
                    <span class="material-icons-round">person</span>
                    <span class="lbl">Click to upload guardian photo</span>
                    <small style="color:#bbb;font-size:.7rem">JPG, PNG up to 2MB</small>
                    <input type="file" accept="image/*" onchange="previewPhoto(this,'guardianPhotoBox')">
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="input-group input-group-outline">
                        <label class="form-label">Username <span class="req">*</span></label>
                        <input type="text" wire:model="guardian_username" class="form-control" placeholder=" " onfocus="focused(this)" onfocusout="defocused(this)">
                        @error('guardian_username') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="input-group input-group-outline">
                        <label class="form-label">Password <span class="req">*</span></label>
                        <input type="password" wire:model="guardian_password" class="form-control" placeholder=" " onfocus="focused(this)" onfocusout="defocused(this)">
                        @error('guardian_password') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="input-group input-group-outline">
                    <label class="form-label">Retype Password <span class="req">*</span></label>
                    <input type="password" wire:model="guardian_password_confirmation" class="form-control" placeholder=" " onfocus="focused(this)" onfocusout="defocused(this)">
                    @error('guardian_password_confirmation') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>
                </div>
            </div>
        </div>

        <!-- ══ PREVIOUS SCHOOL DETAILS ══ -->
        <div class="form-section">
            <div class="section-heading">
            <span class="material-icons-round">history_edu</span> Previous School Details
            </div>
            <div class="row g-4">
            <div class="col-md-6">
                <div class="input-group input-group-outline">
                    <label class="form-label">School Name</label>
                    <textarea wire:model="previous_school" class="form-control" placeholder=" " style="min-height:64px" onfocus="focused(this)" onfocusout="defocused(this)"></textarea>
                </div>
                @error('previous_school') <span class="text-danger">{{ $message }}</span> @enderror
            </div>
            <div class="col-md-6">
                <div class="input-group input-group-outline">
                    <label class="form-label">Qualification</label>
                    <textarea wire:model="qualification" class="form-control" placeholder=" " style="min-height:64px" onfocus="focused(this)" onfocusout="defocused(this)"></textarea>
                </div>
                @error('qualification') <span class="text-danger">{{ $message }}</span> @enderror
            </div>
            <div class="col-12">
                <div class="input-group input-group-outline">
                    <label class="form-label">Remarks</label>
                    <textarea wire:model="remarks" class="form-control" placeholder=" " style="min-height:80px" onfocus="focused(this)" onfocusout="defocused(this)"></textarea>
                </div>
                @error('remarks') <span class="text-danger">{{ $message }}</span> @enderror
            </div>
            </div>
        </div>

        <!-- Form Footer -->

        <div class="form-footer">
            <button class="btn-outline" type="button" wire:click="resetForm">
                <span class="material-icons-round" style="font-size:16px">refresh</span> Reset
            </button>

            <button class="btn-pink" type="button" wire:click="save" wire:loading.attr="disabled" wire:target="save">
                <span wire:loading.remove wire:target="save">
                    <span class="material-icons-round">save</span> Save
                </span>

                <span wire:loading wire:target="save">
                    <span class="material-icons-round" style="font-size:16px;animation:spin .7s linear infinite">sync</span>
                    Saving...
                </span>
            </button>
        </div>


    </div>

    @push('scripts')
        {{-- <script src="\assets\js\datepicker.js"></script> --}}
    @endpush