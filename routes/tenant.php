<?php

declare(strict_types=1);

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Tenant Routes
|--------------------------------------------------------------------------
|
| Here you can register the tenant routes for your application.
| These routes are loaded by the TenantRouteServiceProvider.
|
| Feel free to customize them however you want. Good luck!
|
*/

Route::middleware('guest')->group(function () {
        Route::get('/login', \App\Livewire\Tenant\Auth\LoginComponent::class)->name('tenant.login');
    });

Route::get('/', function () {dd(DB::connection()->getDatabaseName()); })->name('home');
// Route::get('/login', \App\Livewire\Tenant\Auth\LoginComponent::class)->name('tenant.login');

// Route::middleware(['auth'])->group(function () {
    Route::domain('{tenant}.school-saas.test')->group(function () {
        
        Route::get('/dashboard', \App\Livewire\Tenant\Admin\DashboardComponent::class)->name('tenant.dashboard');
        Route::get('/student/create', \App\Livewire\Tenant\Admin\Student\StudentAddComponent::class)->name('admin.student.add');
        Route::get('/student/list', \App\Livewire\Tenant\Admin\Student\StudentListComponent::class)->name('admin.student.list');
        Route::get('/student/{id}/edit', \App\Livewire\Tenant\Admin\Student\StudentEditComponent::class)->name('admin.student.edit');
        Route::get('/student/{id}/overview', \App\Livewire\Tenant\Admin\StudentOverviewComponent::class)->name('admin.student.overview');
        // Academic
        Route::get('/academic/categories', \App\Livewire\Tenant\Admin\Academic\CategoryComponent::class)->name('tenant.academic.categories');
        Route::get('/academic/classes', \App\Livewire\Tenant\Admin\Academic\ClassComponent::class)->name('tenant.academic.classes');
        Route::get('/academic/sections', \App\Livewire\Tenant\Admin\Academic\SectionComponent::class)->name('tenant.academic.sections');
        Route::get('/academic/subjects', \App\Livewire\Tenant\Admin\Academic\SubjectComponent::class)->name('tenant.academic.subjects');
        Route::get('/academic/class-assign', \App\Livewire\Tenant\Admin\Academic\ClassAssignComponent::class)->name('tenant.academic.class-assign');
        Route::get('/academic/teacher-assign', \App\Livewire\Tenant\Admin\Academic\TeacherAssignComponent::class)->name('tenant.academic.teacher-assign');
        Route::get('/academic/class-schedule/create', \App\Livewire\Tenant\Admin\Academic\ClassScheduleCreateComponent::class)->name('tenant.academic.class-schedule.create');
        Route::get('/academic/class-schedule/list', \App\Livewire\Tenant\Admin\Academic\ClassScheduleListComponent::class)->name('tenant.academic.class-schedule.list');
        Route::get('/academic/teacher-schedule', \App\Livewire\Tenant\Admin\Academic\TeacherScheduleComponent::class)->name('tenant.academic.teacher-schedule');
        Route::get('/academic/student-promotion', \App\Livewire\Tenant\Admin\Academic\StudentPromotionComponent::class)->name('tenant.academic.student-promotion');

        Route::get('/employee/departments', \App\Livewire\Tenant\Admin\Employee\DepartmentComponent::class)->name('admin.employee.departments');
        Route::get('/employee/designations', \App\Livewire\Tenant\Admin\Employee\DesignationComponent::class)->name('admin.employee.designations');
        Route::get('/employee/list', \App\Livewire\Tenant\Admin\Employee\EmployeeListComponent::class)->name('admin.employee.list');
        Route::get('/employee/add', \App\Livewire\Tenant\Admin\Employee\EmployeeAddComponent::class)->name('admin.employee.add');
        Route::get('/employee/edit/{id}', \App\Livewire\Tenant\Admin\Employee\EmployeeEditComponent::class)->name('admin.employee.edit');

        Route::get('parent/list', \App\Livewire\Tenant\Admin\Parent\ParentListComponent::class)->name('admin.parent.list');
        Route::get('parent/add', \App\Livewire\Tenant\Admin\Parent\ParentAddComponent::class)->name('admin.parent.add');
        Route::get('parent/edit/{id}', \App\Livewire\Tenant\Admin\Parent\ParentEditComponent::class)->name('admin.parent.edit');
         Route::get('parent/{id}/overview', \App\Livewire\Tenant\Admin\Parent\ParentOverviewComponent::class)->name('admin.parent.overview');
         Route::get('parent/{id}/child', \App\Livewire\Tenant\Admin\Parent\ParentChildComponent::class)->name('admin.parent.child');

        Route::get('/homework/add', \App\Livewire\Tenant\Admin\Homework\HomeworkAddComponent::class)->name('admin.homework.add');
        Route::get('/homework/list', \App\Livewire\Tenant\Admin\Homework\HomeworkListComponent::class)->name('admin.homework.list');
        Route::get('/homework/edit/{id}', \App\Livewire\Tenant\Admin\Homework\HomeworkEditComponent::class)->name('admin.homework.edit');

        Route::get('/card/id-card-templates', \App\Livewire\Tenant\Admin\Card\IdCardTemplateComponent::class)->name('admin.card.id-card-templates');
        Route::get('/card/student-id-cards', \App\Livewire\Tenant\Admin\Card\StudentIdCardComponent::class)->name('admin.card.student-id-cards');
        Route::get('/card/employee-id-cards', \App\Livewire\Tenant\Admin\Card\EmployeeIdCardComponent::class)->name('admin.card.employee-id-cards');    
        Route::get('/card/admit-card-templates', \App\Livewire\Tenant\Admin\Card\AdmitCardTemplateComponent::class)->name('admin.card.admit-card-templates');
        Route::get('/card/generate-admit-cards', \App\Livewire\Tenant\Admin\Card\GenerateAdmitCardComponent::class)->name('admin.card.generate-admit-cards');

        Route::get('certificate/add-template', \App\Livewire\Tenant\Admin\Certificate\AddTemplateComponent::class)->name('admin.certificate.add-template');
        Route::get('certificate/{id}/edit-template', \App\Livewire\Tenant\Admin\Certificate\EditTemplateComponent::class)->name('admin.certificate.edit-template');
        Route::get('certificate/list-template', \App\Livewire\Tenant\Admin\Certificate\ListTemplateComponent::class)->name('admin.certificate.list-template');
        Route::get('certificate/generate-student', \App\Livewire\Tenant\Admin\Certificate\GenerateStudentComponent::class)->name('admin.certificate.generate-student');
        Route::get('certificate/generate-employee', \App\Livewire\Tenant\Admin\Certificate\GenerateEmployeeComponent::class)->name('admin.certificate.generate-employee');
         
        Route::get('salary/add-template', \App\Livewire\Tenant\Admin\Salary\AddTemplateComponent::class)->name('admin.salary.add-template');
        Route::get('salary/{id}/edit-template', \App\Livewire\Tenant\Admin\Salary\EditTemplateComponent::class)->name('admin.salary.edit-template');
        Route::get('salary/list-template', \App\Livewire\Tenant\Admin\Salary\ListTemplateComponent::class)->name('admin.salary.list-template');
        Route::get('salary/assign', \App\Livewire\Tenant\Admin\Salary\AssignComponent::class)->name('admin.salary.assign');
        Route::get('salary/{id}/{month}/add-payment', \App\Livewire\Tenant\Admin\Salary\AddPaymentComponent::class)->name('admin.salary.add-payment');
        Route::get('salary/{id}/{month}/invoice-payment', \App\Livewire\Tenant\Admin\Salary\InvoicePaymentComponent::class)->name('admin.salary.invoice-payment');
        Route::get('salary/payment', \App\Livewire\Tenant\Admin\Salary\PaymentComponent::class)->name('admin.salary.payment');

        Route::get('leave/categories', \App\Livewire\Tenant\Admin\Leave\CategoryComponent::class)->name('admin.leave.categories');
        Route::get('leave/applications', \App\Livewire\Tenant\Admin\Leave\ApplicationComponent::class)->name('admin.leave.applications');
        
        Route::get('/exam/terms', \App\Livewire\Tenant\Admin\Exam\TermComponent::class)->name('admin.exam.terms');
        Route::get('/exam/halls', \App\Livewire\Tenant\Admin\Exam\HallComponent::class)->name('admin.exam.halls');
        Route::get('/exam/marks', \App\Livewire\Tenant\Admin\Exam\MarkComponent::class)->name('admin.exam.marks');    
        Route::get('/exam/types', \App\Livewire\Tenant\Admin\Exam\TypeComponent::class)->name('admin.exam.types');    
        Route::get('/exam/setups', \App\Livewire\Tenant\Admin\Exam\ExamSetupComponent::class)->name('admin.exam.setups');
        Route::get('/exam/schedule/add', \App\Livewire\Tenant\Admin\Exam\ScheduleAddComponent::class)->name('admin.exam.schedule.add');       
        Route::get('/exam/schedule/list', \App\Livewire\Tenant\Admin\Exam\ScheduleListComponent::class)->name('admin.exam.schedule.list');    
        
        Route::get('/exam/grades', \App\Livewire\Tenant\Admin\Exam\GradeComponent::class)->name('admin.exam.grades');

        Route::get('/attendance/students', \App\Livewire\Tenant\Admin\Attendance\StudentComponent::class)->name('admin.attendance.students');
        Route::get('/attendance/employees', \App\Livewire\Tenant\Admin\Attendance\EmployeeComponent::class)->name('admin.attendance.employees');
        Route::get('/attendance/exams', \App\Livewire\Tenant\Admin\Attendance\ExamComponent::class)->name('admin.attendance.exams');

        Route::get('/event/types', \App\Livewire\Tenant\Admin\Event\TypeComponent::class)->name('admin.event.types');
        Route::get('/event/add', \App\Livewire\Tenant\Admin\Event\AddComponent::class)->name('admin.event.add');
        Route::get('/events/{id}/edit', \App\Livewire\Tenant\Admin\Event\EditComponent::class)->name('admin.event.edit');
        Route::get('/event/list', \App\Livewire\Tenant\Admin\Event\ListComponent::class)->name('admin.event.list');
        
        Route::get('/office-accounting/accounts', \App\Livewire\Tenant\Admin\OfficeAccounting\AccountComponent::class)->name('admin.office-accounting.accounts');
        Route::get('/office-accounting/voucher-head', \App\Livewire\Tenant\Admin\OfficeAccounting\HeadComponent::class)->name('admin.office-accounting.heads');
        Route::get('/office-accounting/voucher-deposit-add', \App\Livewire\Tenant\Admin\OfficeAccounting\DepositAddComponent::class)->name('admin.office-accounting.deposit.add');
        Route::get('/office-accounting/{id}/voucher-deposit-edit', \App\Livewire\Tenant\Admin\OfficeAccounting\DepositEditComponent::class)->name('admin.office-accounting.deposit.edit');
        Route::get('/office-accounting/voucher-deposit-list', \App\Livewire\Tenant\Admin\OfficeAccounting\DepositListComponent::class)->name('admin.office-accounting.deposit.list');
        Route::get('/office-accounting/voucher-expense-add', \App\Livewire\Tenant\Admin\OfficeAccounting\ExpenseAddComponent::class)->name('admin.office-accounting.expense.add');
        Route::get('/office-accounting/{id}/voucher-expense-edit', \App\Livewire\Tenant\Admin\OfficeAccounting\ExpenseEditComponent::class)->name('admin.office-accounting.expense.edit');
        Route::get('/office-accounting/voucher-expense-list', \App\Livewire\Tenant\Admin\OfficeAccounting\ExpenseListComponent::class)->name('admin.office-accounting.expense.list');
        Route::get('/office-accounting/transactions', \App\Livewire\Tenant\Admin\OfficeAccounting\TransactionComponent::class)->name('admin.office-accounting.transactions');

        Route::get('/student-accounting/fee-types', \App\Livewire\Tenant\Admin\StudentAccounting\FeeTypeComponent::class)->name('admin.student-accounting.fee.types');
        Route::get('/student-accounting/fee-groups', \App\Livewire\Tenant\Admin\StudentAccounting\FeeGroupComponent::class)->name('admin.student-accounting.fee.groups');
        Route::get('/student-accounting/fee-fines', \App\Livewire\Tenant\Admin\StudentAccounting\FeeFineComponent::class)->name('admin.student-accounting.fee.fines');
        Route::get('/student-accounting/fee-allocations', \App\Livewire\Tenant\Admin\StudentAccounting\FeeAllocationComponent::class)->name('admin.student-accounting.fee.allocations');
        Route::get('/student-accounting/fee-invoices', \App\Livewire\Tenant\Admin\StudentAccounting\FeeInvoiceComponent::class)->name('admin.student-accounting.fee.invoices');

        Route::get('/student/{id}/invoice', \App\Livewire\Tenant\Admin\StudentInvoiceComponent::class)->name('admin.student.invoice');
        Route::get('/student/{id}/payment/add', \App\Livewire\Tenant\Admin\StudentAccounting\PaymentAddComponent::class)->name('admin.student.payment.add');

        Route::get('/inventory/units', \App\Livewire\Tenant\Admin\Inventory\UnitComponent::class)->name('admin.inventory.units');
        Route::get('/inventory/categories', \App\Livewire\Tenant\Admin\Inventory\CategoryComponent::class)->name('admin.inventory.categories');
        Route::get('/inventory/stores', \App\Livewire\Tenant\Admin\Inventory\StoreComponent::class)->name('admin.inventory.stores');
        Route::get('/inventory/suppliers', \App\Livewire\Tenant\Admin\Inventory\SupplierComponent::class)->name('admin.inventory.suppliers');
        Route::get('/inventory/products', \App\Livewire\Tenant\Admin\Inventory\ProductComponent::class)->name('admin.inventory.products');
        Route::get('/inventory/purchase/list', \App\Livewire\Tenant\Admin\Inventory\PurchaseListComponent::class)->name('admin.inventory.purchase.list');
        Route::get('/inventory/purchase/add', \App\Livewire\Tenant\Admin\Inventory\PurchaseAddComponent::class)->name('admin.inventory.purchase.add');
        Route::get('/inventory/purchase/{id}/edit', \App\Livewire\Tenant\Admin\Inventory\PurchaseEditComponent::class)->name('admin.inventory.purchase.edit');
        Route::get('/inventory/sale/list', \App\Livewire\Tenant\Admin\Inventory\SaleListComponent::class)->name('admin.inventory.sale.list');
        Route::get('/inventory/sale/add', \App\Livewire\Tenant\Admin\Inventory\SaleAddComponent::class)->name('admin.inventory.sale.add');
        Route::get('/inventory/sale/{id}/edit', \App\Livewire\Tenant\Admin\Inventory\SaleEditComponent::class)->name('admin.inventory.sale.edit');
        
        Route::get('setting/school', \App\Livewire\Tenant\Admin\Setting\SchoolComponent::class)->name('admin.setting.school');
    // });
});