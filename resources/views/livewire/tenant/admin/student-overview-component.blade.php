<div class="mat-card" style="padding-top:28px">

    <!-- floating header -->
    <div class="mat-card-header header-pink-gradient">
    <h5 id="cardHeaderTitleStudentOverview">Student Overview</h5>
    </div>

    <div class="container-xl mt-4">

        @include('livewire.tenant.admin.student-navbar')


        <!-- START CONTENT -->
        <!-- Academic Details -->
        <div class="section-card">
            <div class="section-head">
            <div class="section-icon"><span class="material-icons-round">school</span></div>
            <span class="section-title">Academic Details</span>
            </div>
            <div class="fgrid fgrid-3">
            <div class="f"><div class="f-lbl">Academic Year</div><div class="f-val">2026-2027</div></div>
            <div class="f"><div class="f-lbl">Register No</div><div class="f-val">ISC-0001</div></div>
            <div class="f no-br"><div class="f-lbl">Roll No</div><div class="f-val">2455</div></div>
            <div class="f no-bb"><div class="f-lbl">Admission Date</div><div class="f-val">28 Apr 2026</div></div>
            <div class="f no-bb"><div class="f-lbl">Class</div><div class="f-val">10th Grade</div></div>
            <div class="f no-bb no-br"><div class="f-lbl">Section · Category</div><div class="f-val">A &nbsp;·&nbsp; General</div></div>
            </div>
        </div>

        <!-- Student Details -->
        <div class="section-card">
            <div class="section-head">
            <div class="section-icon"><span class="material-icons-round">person</span></div>
            <span class="section-title">Student Details</span>
            </div>
            <div class="fgrid fgrid-3">
            <div class="f span2"><div class="f-lbl">Full Name</div><div class="f-val">John Doe</div></div>
            <div class="f no-br"><div class="f-lbl">Gender</div><div class="f-val">Male</div></div>
            <div class="f"><div class="f-lbl">Date of Birth</div><div class="f-val">15 Jun 2005</div></div>
            <div class="f"><div class="f-lbl">Blood Group</div><div class="f-val">O+</div></div>
            <div class="f no-br"><div class="f-lbl">Religion</div><div class="f-val">Islam</div></div>
            <div class="f"><div class="f-lbl">Mobile No</div><div class="f-val">01795041057</div></div>
            <div class="f span2 no-br"><div class="f-lbl">Email</div><div class="f-val">alamin1@ramom.com</div></div>
            <div class="f span3"><div class="f-lbl">Present Address</div><div class="f-val">Housing Estate, Dhaka</div></div>
            <div class="f span3 no-bb"><div class="f-lbl">Permanent Address</div><div class="f-val">Housing Estate, Dhaka</div></div>
            <div class="photo-row no-bb">
                <div class="photo-thumb">
                <span class="material-icons-round">person</span>
                <span>No photo</span>
                </div>
                <div>
                <div class="f-lbl" style="margin-bottom:4px">Profile Picture</div>
                <div style="color:var(--muted);font-size:.8rem;font-style:italic">No photo uploaded</div>
                </div>
            </div>
            </div>
        </div>

        <!-- Login Details -->
        <div class="section-card">
            <div class="section-head">
            <div class="section-icon"><span class="material-icons-round">lock</span></div>
            <span class="section-title">Login Details</span>
            </div>
            <div class="fgrid fgrid-3">
            <div class="f no-bb"><div class="f-lbl">Username</div><div class="f-val">admin@ramom.com</div></div>
            <div class="f no-bb"><div class="f-lbl">Password</div><div class="f-val dots">••••••••</div></div>
            <div class="f no-bb no-br"><div class="f-lbl">Retype Password</div><div class="f-val dots">••••••••</div></div>
            </div>
        </div>

        <!-- Guardian Details -->
        <div class="section-card">
            <div class="section-head">
            <div class="section-icon"><span class="material-icons-round">supervisor_account</span></div>
            <span class="section-title">Guardian Details</span>
            </div>
            <div class="fgrid fgrid-3">
            <div class="f span2"><div class="f-lbl">Name</div><div class="f-val">Karim Molla</div></div>
            <div class="f no-br"><div class="f-lbl">Relation</div><div class="f-val">Child</div></div>
            <div class="f"><div class="f-lbl">Father Name</div><div class="f-val">Abdul Karim</div></div>
            <div class="f span2 no-br"><div class="f-lbl">Mother Name</div><div class="f-val">Amina Khatun</div></div>
            <div class="f"><div class="f-lbl">Occupation</div><div class="f-val">Teacher</div></div>
            <div class="f"><div class="f-lbl">Income</div><div class="f-val">50,000 BDT</div></div>
            <div class="f no-br"><div class="f-lbl">Education</div><div class="f-val">Bachelor's Degree</div></div>
            <div class="f"><div class="f-lbl">Mobile No</div><div class="f-val">01712345678</div></div>
            <div class="f span2 no-br"><div class="f-lbl">Email</div><div class="f-val">karim.molla@example.com</div></div>
            <div class="f span3"><div class="f-lbl">Address</div><div class="f-val">123 Main Street, City, Country</div></div>
            <div class="photo-row">
                <div class="photo-thumb">
                <span class="material-icons-round">person</span>
                <span>No photo</span>
                </div>
                <div>
                <div class="f-lbl" style="margin-bottom:4px">Guardian Picture</div>
                <div style="color:var(--muted);font-size:.8rem;font-style:italic">No photo uploaded</div>
                </div>
            </div>
            <div class="f no-bb"><div class="f-lbl">Username</div><div class="f-val">karim_molla</div></div>
            <div class="f no-bb"><div class="f-lbl">Password</div><div class="f-val dots">••••••••</div></div>
            <div class="f no-bb no-br"><div class="f-lbl">Retype Password</div><div class="f-val dots">••••••••</div></div>
            </div>
        </div>

        <!-- Previous School Details -->
        <div class="section-card">
            <div class="section-head">
            <div class="section-icon"><span class="material-icons-round">history_edu</span></div>
            <span class="section-title">Previous School Details</span>
            </div>
            <div class="fgrid fgrid-2">
            <div class="f"><div class="f-lbl">School Name</div><div class="f-val">Rahim School</div></div>
            <div class="f no-br"><div class="f-lbl">Qualification</div><div class="f-val">Secondary School Certificate</div></div>
            <div class="f span3 no-bb no-br"><div class="f-lbl">Remarks</div><div class="f-val">Good student</div></div>
            </div>
        </div>

        <!-- Footer -->
        <div class="footer-actions">
        <a href="#" class="btn btn-ghost">
            <span class="material-icons-round">edit</span> Edit
        </a>
        <a href="#" class="btn btn-dark">
            <span class="material-icons-round">print</span> Print
        </a>
        </div>
        <!-- END CONTENT -->


    </div>
    <!-- end container -->

</div>
