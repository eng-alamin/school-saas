<aside class="sidebar no-print" id="mainSidebar">

  <!-- Brand -->
  <div class="sidebar-brand">
    <div class="brand-icon">
      <span class="material-icons-round">dashboard</span>
    </div>
    <div class="brand-text">
      <div class="brand-name" id="brandName">Material Dashboard</div>
      <div class="brand-sub" id="brandSub">PRO Bootstrap 5</div>
    </div>
  </div>

  <!-- User -->
  <div class="sidebar-user" id="userToggle">
    <img src="https://i.pravatar.cc/80?img=47" class="user-avatar" alt="Brooklyn">
    <span class="user-name" id="userNameSidebar">Brooklyn Alice</span>
    <span class="material-icons-round user-arrow" id="userArrow">expand_more</span>
  </div>
  <div class="user-dropdown" id="userDropdown">
    <a href="#"><span class="ud-icon">MP</span> <span id="ud-profile">My Profile</span></a>
    <a href="#"><span class="ud-icon">S</span> <span id="ud-settings">Settings</span></a>
    <a href="#"><span class="ud-icon">L</span> <span id="ud-logout">Logout</span></a>
  </div>

  <!-- Scrollable nav -->
  <div class="sidebar-scroll">

    <ul>
      <li class="nav1-item">
        <div class="nav1-link" onclick="toggleNav1(this)">
          <span class="material-icons-round nav-icon">space_dashboard</span>
          <span class="nav-label" id="nav-dashboards">Dashboards</span>
          <span class="material-icons-round nav-arrow">expand_more</span>
        </div>
        <div class="nav2-collapse">
          <ul>
            <li class="nav2-item"><div class="nav2-link"><span class="nav2-icon">A</span><span class="nav2-label" id="nav-analytics">Analytics</span></div></li>
            <li class="nav2-item"><div class="nav2-link"><span class="nav2-icon">D</span><span class="nav2-label" id="nav-discover">Discover</span></div></li>
            <li class="nav2-item"><div class="nav2-link"><span class="nav2-icon">S</span><span class="nav2-label" id="nav-sales">Sales</span></div></li>
            <li class="nav2-item"><div class="nav2-link"><span class="nav2-icon">A</span><span class="nav2-label" id="nav-automotive">Automotive</span></div></li>
            <li class="nav2-item"><div class="nav2-link"><span class="nav2-icon">S</span><span class="nav2-label" id="nav-smarthome">Smart Home</span></div></li>
          </ul>
        </div>
      </li>
    </ul>

    <ul>
      <li class="nav1-item">
        <div class="nav1-link {{ str_contains(request()->url(), 'inventory/') == true ? 'active open' : '' }}" onclick="toggleNav1(this)">
          <span class="material-icons-round nav-icon">inventory_2</span>
          <span class="nav-label" id="nav-inventory">Inventory</span>
          <span class="material-icons-round nav-arrow">expand_more</span>
        </div>
        <div class="nav2-collapse {{ str_contains(request()->url(), 'inventory/') == true ? 'show' : '' }}">
          <ul>
            <li class="nav2-item"><a href="{{ route('admin.inventory.products', ['tenant' => tenant('id')]) }}" class="nav2-link {{ Route::is('admin.inventory.products') == true ? 'active' : '' }}"><span class="nav2-icon">C</span><span class="nav2-label" id="nav-products">Products</span></a></li>
            <li class="nav2-item"><a href="{{route('admin.inventory.stores', ['tenant' => tenant('id')]) }}" class="nav2-link {{ Route::is('admin.inventory.stores') == true ? 'active' : '' }}"><span class="nav2-icon">C</span><span class="nav2-label" id="nav-products">Stores</span></a></li>
            <li class="nav2-item"><a href="{{route('admin.inventory.suppliers', ['tenant' => tenant('id')]) }}" class="nav2-link {{ Route::is('admin.inventory.suppliers') == true ? 'active' : '' }}"><span class="nav2-icon">C</span><span class="nav2-label" id="nav-products">Suppliers</span></a></li>
            <li class="nav2-item"><a href="{{route('admin.inventory.purchase.list', ['tenant' => tenant('id')]) }}" class="nav2-link {{ str_contains(request()->url(), 'purchase') == true ? 'active' : '' }}"><span class="nav2-icon">C</span><span class="nav2-label" id="nav-products">Purchases</span></a></li>
            <li class="nav2-item"><a href="{{route('admin.inventory.sale.list', ['tenant' => tenant('id')]) }}" class="nav2-link {{ str_contains(request()->url(), 'sale') == true ? 'active' : '' }}"><span class="nav2-icon">C</span><span class="nav2-label" id="nav-products">Sales</span></a></li>
          </ul>
        </div>
      </li>

      <li class="nav1-item">
        <div class="nav1-link {{ Route::is('admin.student.add') == true ? 'active open' : '' }}" onclick="toggleNav1(this)">
          <span class="material-icons-round nav-icon">how_to_reg</span>
          <span class="nav-label" id="nav-admission">Admission</span>
          <span class="material-icons-round nav-arrow">expand_more</span>
        </div>
        <div class="nav2-collapse {{ Route::is('admin.student.add') == true ? 'show' : '' }}">
          <ul>
            <li class="nav2-item"><a href="{{route('admin.student.add', ['tenant' => tenant('id')]) }}" class="nav2-link {{ Route::is('admin.student.add') == true ? 'active' : '' }}"><span class="nav2-icon">C</span><span class="nav2-label" id="nav-createadmission">Create Admission</span></a></li>
            <li class="nav2-item"><a href="#" class="nav2-link"><span class="nav2-icon">O</span><span class="nav2-label" id="nav-onlineadmission">Online Admission</span></a></li>
          </ul>
        </div>
      </li>

      <li class="nav1-item">
        <a class="nav1-link {{ Route::is('admin.student.list', 'admin.student.edit') == true ? 'active' : '' }}" href="{{route('admin.student.list', ['tenant' => tenant('id')]) }}">
          <span class="material-icons-round nav-icon">school</span>
          <span class="nav-label" id="nav-students">Students</span>
        </a>
      </li>

      <li class="nav1-item">
        <a class="nav1-link {{ str_contains(request()->url(), 'parent/') == true ? 'active' : '' }}" href="{{route('admin.parent.list', ['tenant' => tenant('id')]) }}">
          <span class="material-icons-round nav-icon">groups</span>
          <span class="nav-label" id="nav-parents">Parents</span>
        </a>
      </li>

      <li class="nav1-item">
        <div class="nav1-link {{ str_contains(request()->url(), 'employee/') == true ? 'active open' : '' }}" onclick="toggleNav1(this)">
          <span class="material-icons-round nav-icon">badge</span>
          <span class="nav-label" id="nav-employees">Employees</span>
          <span class="material-icons-round nav-arrow">expand_more</span>
        </div>
        <div class="nav2-collapse {{ str_contains(request()->url(), 'employee/') == true ? 'show' : '' }}">
          <ul>
            <li class="nav2-item"><a href="{{route('admin.employee.list', ['tenant' => tenant('id')]) }}" class="nav2-link {{ request()->is('employee/list', 'employee/add', 'employee/edit/*') ? 'active' : '' }}"><span class="nav2-icon">L</span><span class="nav2-label" id="nav-employee-list">Employee List</span></a></li>
            <li class="nav2-item"><a href="{{route('admin.employee.departments', ['tenant' => tenant('id')]) }}" class="nav2-link {{ str_contains(request()->url(), 'employee/departments') == true ? 'active' : '' }}"><span class="nav2-icon">D</span><span class="nav2-label" id="nav-department">Department</span></a></li>
            <li class="nav2-item"><a href="{{route('admin.employee.designations', ['tenant' => tenant('id')]) }}" class="nav2-link {{ str_contains(request()->url(), 'employee/designations') == true ? 'active' : '' }}"><span class="nav2-icon">D</span><span class="nav2-label" id="nav-designation">Designation</span></a></li>
          </ul>
        </div>
      </li>

      <li class="nav1-item">
        <div class="nav1-link {{ str_contains(request()->url(), 'card/') == true ? 'active open' : '' }}" onclick="toggleNav1(this)">
          <span class="material-icons-round nav-icon">credit_card</span>
          <span class="nav-label" id="nav-card-management">Card Management</span>
          <span class="material-icons-round nav-arrow">expand_more</span>
        </div>
        <div class="nav2-collapse {{ str_contains(request()->url(), 'card/') == true ? 'show' : '' }}">
          <ul>
            <li class="nav2-item"><a href="{{route('admin.card.id-card-templates', ['tenant' => tenant('id')]) }}" class="nav2-link {{ str_contains(request()->url(), 'card/id-card-templates') == true ? 'active' : '' }}"><span class="nav2-icon">G</span><span class="nav2-label" id="nav-idcard-template">Id Card Templete</span></a></li>
            <li class="nav2-item"><a href="{{route('admin.card.student-id-cards', ['tenant' => tenant('id')]) }}" class="nav2-link {{ str_contains(request()->url(), 'card/student-id-cards') == true ? 'active' : '' }}"><span class="nav2-icon">T</span><span class="nav2-label" id="nav-student-id-card">Student Id Card</span></a></li>
            <li class="nav2-item"><a href="{{route('admin.card.employee-id-cards', ['tenant' => tenant('id')]) }}" class="nav2-link {{ str_contains(request()->url(), 'card/employee-id-cards') == true ? 'active' : '' }}"><span class="nav2-icon">N</span><span class="nav2-label" id="nav-employee-id-card">Employee Id Card</span></a></li>
            <li class="nav2-item"><a href="{{route('admin.card.admit-card-templates', ['tenant' => tenant('id')]) }}" class="nav2-link {{ str_contains(request()->url(), 'card/admit-card-templates') == true ? 'active' : '' }}"><span class="nav2-icon">N</span><span class="nav2-label" id="nav-admit-card-template">Admit Card Templete</span></a></li>
            <li class="nav2-item"><a href="{{route('admin.card.generate-admit-cards', ['tenant' => tenant('id')]) }}" class="nav2-link {{ str_contains(request()->url(), 'card/generate-admit-cards') == true ? 'active' : '' }}"><span class="nav2-icon">N</span><span class="nav2-label" id="nav-admit-card-generate">Admit Card Generate</span></a></li>
          </ul>
        </div>
      </li>

      <li class="nav1-item">
        <div class="nav1-link {{ str_contains(request()->url(), 'certificate/') == true ? 'active open' : '' }}" onclick="toggleNav1(this)">
          <span class="material-icons-round nav-icon">workspace_premium</span>
          <span class="nav-label" id="nav-certificate">Certificate</span>
          <span class="material-icons-round nav-arrow">expand_more</span>
        </div>
        <div class="nav2-collapse {{ str_contains(request()->url(), 'certificate/') == true ? 'show' : '' }}">
          <ul>
            <li class="nav2-item"><a href="{{route('admin.certificate.list-template', ['tenant' => tenant('id')]) }}" class="nav2-link {{ str_contains(request()->url(), 'certificate/list-template') == true ? 'active' : '' }}"><span class="nav2-icon">G</span><span class="nav2-label" id="nav-idcard-template">Certificate Templete</span></a></li>
            <li class="nav2-item"><a href="{{route('admin.certificate.generate-student', ['tenant' => tenant('id')]) }}" class="nav2-link {{ str_contains(request()->url(), 'certificate/generate-student') == true ? 'active' : '' }}"><span class="nav2-icon">T</span><span class="nav2-label" id="nav-student-id-card">Generate Student</span></a></li>
            <li class="nav2-item"><a href="{{route('admin.certificate.generate-employee', ['tenant' => tenant('id')]) }}" class="nav2-link {{ str_contains(request()->url(), 'certificate/generate-employee') == true ? 'active' : '' }}"><span class="nav2-icon">N</span><span class="nav2-label" id="nav-employee-id-card">Generate Employee</span></a></li>
          </ul>
        </div>
      </li>

      <li class="nav1-item">
        <div class="nav1-link {{ str_contains(request()->url(), 'salary') || str_contains(request()->url(), 'leave') ? 'active open' : '' }}" onclick="toggleNav1(this)">
          <span class="material-icons-round nav-icon">manage_accounts</span>
          <span class="nav-label" id="nav-human-resource">Human Resource</span>
          <span class="material-icons-round nav-arrow">expand_more</span>
        </div>
        <div class="nav2-collapse {{ str_contains(request()->url(), 'salary') || str_contains(request()->url(), 'leave') == true ? 'show' : '' }}">
          <ul>
            <li class="nav2-item"><a href="{{route('admin.salary.list-template', ['tenant' => tenant('id')]) }}" class="nav2-link {{ str_contains(request()->url(), 'admin.salary.list-template') == true ? 'active' : '' }}"><span class="nav2-icon">T</span><span class="nav2-label" id="nav-idcard-template">Salary Template</span></a></li>
            <li class="nav2-item"><a href="{{route('admin.salary.assign', ['tenant' => tenant('id')]) }}" class="nav2-link {{ str_contains(request()->url(), 'admin.salary.assign') == true ? 'active' : '' }}"><span class="nav2-icon">A</span><span class="nav2-label" id="nav-idcard-template">Salary Assign</span></a></li>
            <li class="nav2-item"><a href="{{route('admin.salary.payment', ['tenant' => tenant('id')]) }}" class="nav2-link {{ str_contains(request()->url(), 'admin.salary.payment') == true ? 'active' : '' }}"><span class="nav2-icon">P</span><span class="nav2-label" id="nav-idcard-template">Salary Payment</span></a></li>
            <li class="nav2-item"><a href="{{route('admin.leave.applications', ['tenant' => tenant('id')]) }}" class="nav2-link {{ str_contains(request()->url(), 'leave') == true ? 'active' : '' }}"><span class="nav2-icon">P</span><span class="nav2-label" id="nav-idcard-template">Leaves</span></a></li>
          </ul>
        </div>
      </li>

      <li class="nav1-item">
        <div class="nav1-link {{ str_contains(request()->url(), 'academic') == true ? 'active open' : '' }}" onclick="toggleNav1(this)">
          <span class="material-icons-round nav-icon">menu_book</span>
          <span class="nav-label" id="nav-academic">Academic</span>
          <span class="material-icons-round nav-arrow">expand_more</span>
        </div>
        <div class="nav2-collapse {{ str_contains(request()->url(), 'academic') == true ? 'show' : '' }}">
          <ul>
            <li class="nav2-item"><a href="{{route('tenant.academic.classes', ['tenant' => tenant('id')]) }}" class="nav2-link {{ str_contains(request()->url(), 'academic/classes') == true ? 'active' : '' }}"><span class="nav2-icon">C</span><span class="nav2-label" id="nav-class-section">Class & Section</span></a></li>
            <li class="nav2-item"><a href="{{route('tenant.academic.subjects', ['tenant' => tenant('id')]) }}" class="nav2-link {{ str_contains(request()->url(), 'academic/subjects') == true ? 'active' : '' }}"><span class="nav2-icon">S</span><span class="nav2-label" id="nav-subject">Subject</span></a></li>
            <li class="nav2-item"><a href="{{route('tenant.academic.class-assign', ['tenant' => tenant('id')]) }}" class="nav2-link {{ str_contains(request()->url(), 'academic/class-assign') == true ? 'active' : '' }}"><span class="nav2-icon">C</span><span class="nav2-label" id="nav-class-assign">Class Assign</span></a></li>
            <li class="nav2-item"><a href="{{route('tenant.academic.teacher-assign', ['tenant' => tenant('id')]) }}" class="nav2-link {{ str_contains(request()->url(), 'academic/teacher-assign') == true ? 'active' : '' }}"><span class="nav2-icon">T</span><span class="nav2-label" id="nav-class-assign">Teacher Assign</span></a></li>
            <li class="nav2-item"><a href="{{route('tenant.academic.class-schedule.list', ['tenant' => tenant('id')]) }}" class="nav2-link {{ str_contains(request()->url(), 'academic/class-schedule') == true ? 'active' : '' }}"><span class="nav2-icon">C</span><span class="nav2-label" id="nav-class-schedule">Class Schedule</span></a></li>
            <li class="nav2-item"><a href="{{route('tenant.academic.teacher-schedule', ['tenant' => tenant('id')]) }}" class="nav2-link {{ str_contains(request()->url(), 'academic/teacher-schedule') == true ? 'active' : '' }}"><span class="nav2-icon">T</span><span class="nav2-label" id="nav-teacher-schedule">Teacher Schedule</span></a></li>
            <li class="nav2-item"><a href="{{route('tenant.academic.student-promotion', ['tenant' => tenant('id')]) }}" class="nav2-link {{ str_contains(request()->url(), 'academic/student-promotion') == true ? 'active' : '' }}"><span class="nav2-icon">S</span><span class="nav2-label" id="nav-student-promotion">Student Promotion</span></a></li>
          </ul>
        </div>
      </li>

      <li class="nav1-item">
        <a class="nav1-link {{ str_contains(request()->url(), 'homework') == true ? 'active' : '' }}" href="{{ route('admin.homework.list', ['tenant' => tenant('id')])  }}">
          <span class="material-icons-round nav-icon">assignment</span>
          <span class="nav-label" id="nav-home-work">Home Work</span>
        </a>
      </li>

      <li class="nav1-item">
        <div class="nav1-link {{ str_contains(request()->url(), 'exam/') == true ? 'active open' : '' }}" onclick="toggleNav1(this)">
          <span class="material-icons-round nav-icon">quiz</span>
          <span class="nav-label" id="nav-exam-master">Exam Master</span>
          <span class="material-icons-round nav-arrow">expand_more</span>
        </div>
        <div class="nav2-collapse {{ str_contains(request()->url(), 'exam') == true ? 'show' : '' }}">
          <ul>
            <li class="nav2-item"><a href="{{route('admin.exam.setups', ['tenant' => tenant('id')]) }}" class="nav2-link {{ str_contains(request()->url(), 'exam/setups') == true ? 'active' : '' }}"><span class="nav2-icon">G</span><span class="nav2-label" id="nav-exams">Exams</span></a></li>
            <li class="nav2-item"><a href="{{route('admin.exam.schedule.list', ['tenant' => tenant('id')]) }}" class="nav2-link {{ str_contains(request()->url(), 'exam/schedule') == true ? 'active' : '' }}"><span class="nav2-icon">T</span><span class="nav2-label" id="nav-exam-schedule">Exam Schedule</span></a></li>
            <li class="nav2-item"><div class="nav2-link"><span class="nav2-icon">N</span><span class="nav2-label" id="nav-marks">Marks</span></div></li>
          </ul>
        </div>
      </li>

      <li class="nav1-item">
        <div class="nav1-link {{ str_contains(request()->url(), 'attendance') == true ? 'active open' : '' }}" onclick="toggleNav1(this)">
          <span class="material-icons-round nav-icon">event_available</span>
          <span class="nav-label" id="nav-attendance">Attendance</span>
          <span class="material-icons-round nav-arrow">expand_more</span>
        </div>
        <div class="nav2-collapse {{ str_contains(request()->url(), 'attendance') == true ? 'show' : '' }}">
          <ul>
            <li class="nav2-item"><a href="{{route('admin.attendance.students', ['tenant' => tenant('id')]) }}" class="nav2-link {{ str_contains(request()->url(), 'attendance/students') == true ? 'active' : '' }}"><span class="nav2-icon">G</span><span class="nav2-label" id="nav-student">Student</span></a></li>
            <li class="nav2-item"><a href="{{route('admin.attendance.employees', ['tenant' => tenant('id')]) }}" class="nav2-link {{ str_contains(request()->url(), 'attendance/employees') == true ? 'active' : '' }}"><span class="nav2-icon">G</span><span class="nav2-label" id="nav-student">Enployee</span></a></li>
            <li class="nav2-item"><a href="{{route('admin.attendance.exams', ['tenant' => tenant('id')]) }}" class="nav2-link {{ str_contains(request()->url(), 'attendance/exams') == true ? 'active' : '' }}"><span class="nav2-icon">G</span><span class="nav2-label" id="nav-student">Exam</span></a></li>
          </ul>
        </div>
      </li>

      <li class="nav1-item">
        <a href="{{route('admin.event.list', ['tenant' => tenant('id')]) }}" class="nav1-link {{ str_contains(request()->url(), 'event') == true ? 'active' : '' }}">
          <span class="material-icons-round nav-icon">event</span>
          <span class="nav-label" id="nav-events">Events</span>
        </a>
      </li>

      <li class="nav1-item">
        <div class="nav1-link" onclick="toggleNav1(this)">
          <span class="material-icons-round nav-icon">sms</span>
          <span class="nav-label" id="nav-bulk-sms-email">Bulk Sms And Email</span>
          <span class="material-icons-round nav-arrow">expand_more</span>
        </div>
        <div class="nav2-collapse">
          <ul>
            <li class="nav2-item"><div class="nav2-link"><span class="nav2-icon">G</span><span class="nav2-label" id="nav-general">General</span></div></li>
            <li class="nav2-item"><div class="nav2-link"><span class="nav2-icon">T</span><span class="nav2-label" id="nav-timeline">Timeline</span></div></li>
            <li class="nav2-item"><div class="nav2-link"><span class="nav2-icon">N</span><span class="nav2-label" id="nav-newproject">New Project</span></div></li>
          </ul>
        </div>
      </li>

      <li class="nav1-item">
        <div class="nav1-link {{ str_contains(request()->url(), 'student-accounting') == true ? 'active open' : '' }}" onclick="toggleNav1(this)">
          <span class="material-icons-round nav-icon">account_balance_wallet</span>
          <span class="nav-label" id="nav-student-accounting">Student Accounting</span>
          <span class="material-icons-round nav-arrow">expand_more</span>
        </div>
        <div class="nav2-collapse {{ str_contains(request()->url(), 'student-accounting') == true ? 'show' : '' }}">
          <ul>
            <li class="nav2-item"><a href="{{route('admin.student-accounting.fee.types', ['tenant' => tenant('id')]) }}" class="nav2-link {{ str_contains(request()->url(), 'student-accounting/fee-types') == true ? 'active' : '' }}"><span class="nav2-icon">G</span><span class="nav2-label" id="nav-fees-type">Fees Type</span></a></li>
            <li class="nav2-item"><a href="{{route('admin.student-accounting.fee.groups', ['tenant' => tenant('id')]) }}" class="nav2-link {{ str_contains(request()->url(), 'student-accounting/fee-groups') == true ? 'active' : '' }}"><span class="nav2-icon">T</span><span class="nav2-label" id="nav-timeline">Fees Group</span></a></li>
            <li class="nav2-item"><a href="{{route('admin.student-accounting.fee.fines', ['tenant' => tenant('id')]) }}" class="nav2-link {{ str_contains(request()->url(), 'student-accounting/fee-fines') == true ? 'active' : '' }}"><span class="nav2-icon">N</span><span class="nav2-label" id="nav-fine-setup">Fine Setup</span></a></li>
            <li class="nav2-item"><a href="{{route('admin.student-accounting.fee.allocations', ['tenant' => tenant('id')]) }}" class="nav2-link {{ str_contains(request()->url(), 'student-accounting/fee-allocations') == true ? 'active' : '' }}"><span class="nav2-icon">N</span><span class="nav2-label" id="nav-fees-allocation">Fees Allocation</span></a></li>
            <li class="nav2-item"><a href="{{route('admin.student-accounting.fee.invoices', ['tenant' => tenant('id')]) }}" class="nav2-link {{ str_contains(request()->url(), 'student-accounting/fee-invoices') == true ? 'active' : '' }}"><span class="nav2-icon">N</span><span class="nav2-label" id="nav-fees-pay-invoice">Fees Pay / Invoice</span></a></li>
            <li class="nav2-item"><a href="{{route('admin.student-accounting.fee.types', ['tenant' => tenant('id')]) }}" class="nav2-link {{ str_contains(request()->url(), 'student-accounting/fee-types') == true ? 'active' : '' }}"><span class="nav2-icon">N</span><span class="nav2-label" id="nav-due-fees-invoice">Due Fees Invoice</span></a></li>
            <li class="nav2-item"><a href="{{route('admin.student-accounting.fee.types', ['tenant' => tenant('id')]) }}" class="nav2-link {{ str_contains(request()->url(), 'student-accounting/fee-types') == true ? 'active' : '' }}"><span class="nav2-icon">N</span><span class="nav2-label" id="nav-fees-reminder">Fees Reminder</span></a></li>
          </ul>
        </div>
      </li>

      <li class="nav1-item">
        <div class="nav1-link {{ str_contains(request()->url(), 'office-accounting') == true ? 'active open' : '' }}" onclick="toggleNav1(this)">
          <span class="material-icons-round nav-icon">business_center</span>
          <span class="nav-label" id="nav-office-accounting">Office Accounting</span>
          <span class="material-icons-round nav-arrow">expand_more</span>
        </div>
        <div class="nav2-collapse {{ str_contains(request()->url(), 'office-accounting') == true ? 'show' : '' }}">
          <ul>
            <li class="nav2-item"><a href="{{route('admin.office-accounting.accounts', ['tenant' => tenant('id')]) }}" class="nav2-link {{ str_contains(request()->url(), 'office-accounting/accounts') == true ? 'active' : '' }}"><span class="nav2-icon">A</span><span class="nav2-label" id="nav-account">Account</span></a></li>
            <li class="nav2-item"><a href="{{route('admin.office-accounting.deposit.list', ['tenant' => tenant('id')]) }}" class="nav2-link {{ str_contains(request()->url(), 'office-accounting/voucher-deposit-list') == true ? 'active' : '' }}"><span class="nav2-icon">D</span><span class="nav2-label" id="nav-new-deposit">Deposit</span></a></li>
            <li class="nav2-item"><a href="{{route('admin.office-accounting.expense.list', ['tenant' => tenant('id')]) }}" class="nav2-link {{ str_contains(request()->url(), 'office-accounting/voucher-expense-list') == true ? 'active' : '' }}"><span class="nav2-icon">E</span><span class="nav2-label" id="nav-new-expense">Expense</span></a></li>
            <li class="nav2-item"><a href="{{route('admin.office-accounting.transactions', ['tenant' => tenant('id')]) }}" class="nav2-link {{ str_contains(request()->url(), 'office-accounting/transactions') == true ? 'active' : '' }}"><span class="nav2-icon">T</span><span class="nav2-label" id="nav-all-transactions">Transactions</span></a></li>
            <li class="nav2-item"><a href="{{route('admin.office-accounting.heads', ['tenant' => tenant('id')]) }}" class="nav2-link {{ str_contains(request()->url(), 'office-accounting/voucher-head') == true ? 'active' : '' }}"><span class="nav2-icon">H</span><span class="nav2-label" id="nav-voucher-head">Voucher Head</span></a></li>
          </ul>
        </div>
      </li>

      <li class="nav1-item">
        <div class="nav1-link">
          <span class="material-icons-round nav-icon">chat</span>
          <span class="nav-label" id="nav-message">Message</span>
        </div>
      </li>
            
      <li class="nav1-item">
        <div class="nav1-link" onclick="toggleNav1(this)">
          <span class="material-icons-round nav-icon">bar_chart</span>
          <span class="nav-label" id="nav-reports">Reports</span>
          <span class="material-icons-round nav-arrow">expand_more</span>
        </div>
        <div class="nav2-collapse">
          <ul>
            <li class="nav2-item"><div class="nav2-link"><span class="nav2-icon">G</span><span class="nav2-label" id="nav-student">Student Reports</span></div></li>
            <li class="nav2-item"><div class="nav2-link"><span class="nav2-icon">T</span><span class="nav2-label" id="nav-fees">Fees Reports</span></div></li>
            <li class="nav2-item"><div class="nav2-link"><span class="nav2-icon">N</span><span class="nav2-label" id="nav-financial">Financial Reports</span></div></li>
            <li class="nav2-item"><div class="nav2-link"><span class="nav2-icon">N</span><span class="nav2-label" id="nav-attendance">Attendance Reports</span></div></li>
            <li class="nav2-item"><div class="nav2-link"><span class="nav2-icon">N</span><span class="nav2-label" id="nav-human">Human Resource</span></div></li>
            <li class="nav2-item"><div class="nav2-link"><span class="nav2-icon">N</span><span class="nav2-label" id="nav-examination">Examination</span></div></li>
            <li class="nav2-item"><div class="nav2-link"><span class="nav2-icon">N</span><span class="nav2-label" id="nav-inventory">Inventory</span></div></li>
          </ul>
        </div>
      </li>

      <li class="nav1-item">
        <div class="nav1-link" onclick="toggleNav1(this)">
          <span class="material-icons-round nav-icon">diversity_3</span>
          <span class="nav-label" id="nav-alumni">Alumni</span>
          <span class="material-icons-round nav-arrow">expand_more</span>
        </div>
        <div class="nav2-collapse">
          <ul>
            <li class="nav2-item"><div class="nav2-link"><span class="nav2-icon">G</span><span class="nav2-label" id="nav-manage-alumni">Manage Alumni</span></div></li>
            <li class="nav2-item"><div class="nav2-link"><span class="nav2-icon">T</span><span class="nav2-label" id="nav-events">Events</span></div></li>
          </ul>
        </div>
      </li>

      <li class="nav1-item">
        <div class="nav1-link {{ str_contains(request()->url(), 'setting') == true ? 'active open' : '' }}" onclick="toggleNav1(this)">
          <span class="material-icons-round nav-icon">settings</span>
          <span class="nav-label" id="nav-settings">Settings</span>
          <span class="material-icons-round nav-arrow">expand_more</span>
        </div>
        <div class="nav2-collapse {{ str_contains(request()->url(), 'setting') == true ? 'show' : '' }}">
          <ul>
            <li class="nav2-item"><a href="{{route('admin.setting.school', ['tenant' => tenant('id')]) }}" class="nav2-link {{ str_contains(request()->url(), 'setting/school') == true ? 'active' : '' }}"><span class="nav2-icon">S</span><span class="nav2-label" id="nav-school-settings">School Settings</span></a></li>
            <li class="nav2-item"><a href="{{route('admin.setting.sessions', ['tenant' => tenant('id')]) }}" class="nav2-link {{ str_contains(request()->url(), 'setting/sessions') == true ? 'active' : '' }}"><span class="nav2-icon">S</span><span class="nav2-label" id="nav-session-settings">Session Settings</span></a></li>
            <li class="nav2-item"><a href="{{route('admin.setting.backups', ['tenant' => tenant('id')]) }}" class="nav2-link {{ str_contains(request()->url(), 'setting/backups') == true ? 'active' : '' }}"><span class="nav2-icon">B</span><span class="nav2-label" id="nav-session-settings">Database Backup</span></a></li>
            <li class="nav2-item"><div class="nav2-link"><span class="nav2-icon">T</span><span class="nav2-label" id="nav-translations">Translations</span></div></li>
            <li class="nav2-item"><div class="nav2-link"><span class="nav2-icon">N</span><span class="nav2-label" id="nav-cronjob">Cron Job</span></div></li>
            <li class="nav2-item"><div class="nav2-link"><span class="nav2-icon">N</span><span class="nav2-label" id="nav-system-student-field">System Student Field</span></div></li>
            <li class="nav2-item"><div class="nav2-link"><span class="nav2-icon">N</span><span class="nav2-label" id="nav-custom-field">Custom Field</span></div></li>
            <li class="nav2-item"><div class="nav2-link"><span class="nav2-icon">N</span><span class="nav2-label" id="nav-user-login-log">User Login Log</span></div></li>
          </ul>
        </div>
      </li>
    </ul>

  </div>
</aside>