<?php

use App\Http\Controllers\Login;
use App\Http\Controllers\GeneratePdf;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LeaveController;
use App\Http\Controllers\MediaController;
use App\Http\Controllers\StaffController;
use App\Http\Controllers\TrashController;
use App\Http\Controllers\OrdersController;
use App\Http\Controllers\PayoutController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\InquiryController;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\StaffOrderDetails;
use App\Http\Controllers\FrontendController;
use App\Http\Controllers\ReceptonController;
use App\Http\Controllers\DeleteAllController;
use App\Http\Controllers\ReceiptVerification;
use App\Http\Controllers\AdminIndexController;
use App\Http\Controllers\AttendanceController;
use App\Http\Controllers\StaffIndexController;
use App\Http\Controllers\StaffLeaveController;
use App\Http\Controllers\TableModelController;
use App\Http\Controllers\UserAccessController;
use App\Http\Controllers\AjaxRequestController;
use App\Http\Controllers\ChefPanelOrderDetails;
use App\Http\Controllers\PricingUnitController;
use App\Http\Controllers\CustomerAjaxController;
use App\Http\Controllers\LoyaltyModelController;
use App\Http\Controllers\ProductModelController;
use App\Http\Controllers\SettingModelController;
use App\Http\Controllers\StaffPaymentController;
use App\Http\Controllers\StaffProfileController;
use App\Http\Controllers\ChefDashboardController;
use App\Http\Controllers\CreatePaymentController;
use App\Http\Controllers\AdvancePaymentController;
use App\Http\Controllers\CustomersModelController;
use App\Http\Controllers\ReleasePaymentController;
use App\Http\Controllers\ProductCategoryController;
use App\Http\Controllers\ProductMaterialController;
use App\Http\Controllers\StaffAttendanceController;
use App\Http\Controllers\StaffPanelProfileController;
use App\Http\Controllers\ReceptionDashboardController;
use App\Http\Controllers\customer\CustomerLoginController;
use App\Http\Controllers\customer\CustomerOrderController;
use App\Http\Controllers\customer\CustomerShoppingController;
use App\Http\Controllers\customer\CustomerDashboardController;
use App\Http\Controllers\CustomerLoyaltyPointsModelController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
// ------------------ Front End Route Start ------------------
Route::controller(FrontendController::class)->group(function(){
    Route::get('/', 'index')->name('frontend-index');
});
//  ----------------- Admin Login Controller Start ----------------
Route::controller(Login::class)->group(function () {
    Route::get('/login', 'index')->name('login-view');
    Route::post('/login', 'login')->name('login-check');
    Route::post('/otp-verification', 'loginOtpVerification')->name('login-otp-verification');
    Route::get('/reset-otp-verification', 'resetOtpVerification')->name('reset-otp-verification');

    // ================== Reset Passowrd =============
    Route::get('/reset-password', 'showPasswordResetPage')->name('showPasswordResetPage');
    Route::post('/reset-password', 'passwordResetCheckUser')->name('passwordResetCheckUser');
    Route::post('/reset-password-otp-check', 'passwordResetOtpCheck')->name('passwordResetOtpCheck');
    Route::get('/cancel-reset-password', 'cancelPasswordReset')->name('cancelPasswordReset');
    Route::post('/update-passwordd', 'updatePassword')->name('updatePassword');
    Route::get('/goto-login', 'GotoLogin')->name('GotoLogin');
});

//  ----------------- Admin Login Controller End ----------------


// ********************* Delete All Controller Start **********************
Route::controller(DeleteAllController::class)->group(function () {
    Route::get('/deleteall', 'deleteAll')->name('deleteAll');
});
// ********************* Delete All Controller End **********************




// [================== Adming Route  Start ==================]
// [================== Adming Route  Start ==================]

Route::middleware('adminLogin')->group(function () {

    Route::controller(AjaxRequestController::class)->prefix('admin')->name('admin.')->group(function () {
        Route::post('/ajax-request', 'ajaxRequest')->name('ajaxRequest');
    });


    Route::controller(TrashController::class)->prefix('admin')->name('admin.')->group(function () {
        Route::get('/trash/{trash_of}', 'Trash')->name('Trash');
        Route::get('/get-trash-data', 'getTrashData')->name('getTrashData');
    });

    // ============ Media route start ============
    Route::controller(MediaController::class)->prefix('admin')->name('admin.')->group(function () {
        Route::get('/add-media', 'index')->name('addMediaIndex');
        Route::post('/add-media', 'save')->name('saveMediaIndex');
        Route::get('/show-media', 'mediaIndex')->name('mediaIndex');
        Route::get('/edit-media/{id}', 'editMedia')->name('editMedia');
        Route::post('/edit-media/{id}', 'updateMedia')->name('updateMedia');
        Route::get('/media-datatable-data', 'getMediaData')->name('getMediaData');
    });
    // ============ Media route End ============

    // ***************** Admin Index Page  Route Start**************************

    Route::controller(AdminIndexController::class)->prefix('admin')->name('admin.')->group(function () {
        Route::get('/dashboard', 'index')->name('indexView');
        Route::get('/logout', 'logout')->name('logout');
    });

    // ***************** Admin Index Page  Route End**************************


    Route::controller(ProductCategoryController::class)->prefix('admin')->name('admin.')->group(function () {
        Route::get('/add-category', 'addCategoryIndex')->name('addCategoryIndex');
        Route::post('/add-category', 'saveCategory')->name('saveCategory');
        Route::get('/show-category', 'showCategory')->name('showCategory');
        Route::get('/edit-category/{id}', 'editCategory')->name('editCategory');
        Route::post('/edit-category/{id}', 'updateCategory')->name('updateCategory');
    });


    Route::controller(PricingUnitController::class)->prefix('admin')->name('admin.')->group(function () {
        Route::get('/add-pricing-unit', 'addPricingUnitIndex')->name('addPricingUnitIndex');
        Route::post('/add-pricing-unit', 'savePricingUnit')->name('savePricingUnit');
        Route::get('/show-pricing-unit', 'showPricingUnit')->name('showPricingUnit');
        Route::get('/edit-pricing-unit/{id}', 'editPricingUnit')->name('editPricingUnit');
        Route::post('/edit-pricing-unit/{id}', 'updatePricingUnit')->name('updatePricingUnit');
    });

    Route::controller(ProductModelController::class)->prefix('admin')->name('admin.')->group(function () {
        Route::get('/add-products', 'addProducts')->name('addProducts');
        Route::post('/add-products', 'saveProducts')->name('saveProducts');
        Route::get('/edit-products/{id}', 'editProducts')->name('editProducts');
        Route::post('/edit-products/{id}', 'updateProducts')->name('updateProducts');
        Route::get('/show-products', 'showProducts')->name('showProducts');
    });

    Route::controller(ProductMaterialController::class)->prefix('admin')->name('admin.')->group(function () {
        Route::get('/add-material', 'addMaterialIndex')->name('addMaterialIndex');
        Route::post('/add-material', 'saveMaterial')->name('saveMaterial');
        Route::get('/edit-material/{id}', 'editMaterial')->name('editMaterial');
        Route::post('/edit-material/{id}', 'updateMaterial')->name('updateMaterial');
        Route::get('/show-material', 'showMaterial')->name('showMaterial');
    });

    Route::controller(TableModelController::class)->prefix('admin')->name('admin.')->group(function () {
        Route::get('/add-table', 'addTableIndex')->name('addTableIndex');
        Route::post('/add-table', 'saveTable')->name('saveTable');
        Route::get('/edit-table/{id}', 'editTable')->name('editTable');
        Route::post('/edit-table/{id}', 'updateTable')->name('updateTable');
        Route::get('/show-table', 'showTable')->name('showTable');
        Route::get('/generate-table-qr/{table_no}', 'generateTableQr')->name('generateTableQr');
    });

    Route::controller(BookingController::class)->prefix('admin')->name('admin.')->group(function () {
        Route::get('/add-booking', 'addBooking')->name('addBooking');
        Route::post('/add-booking', 'saveBooking')->name('saveBooking');
        Route::get('/edit-booking/{id}', 'editBooking')->name('editBooking');
        Route::post('/edit-booking/{id}', 'updateBooking')->name('updateBooking');
        Route::get('/show-booking', 'showBooking')->name('showBooking');
        Route::post('/cancel-booking', 'cancelBooking')->name('cancelBooking');
    });

    Route::controller(OrdersController::class)->prefix('admin')->name('admin.')->group(function () {
        Route::get('/order', 'addOrder')->name('addOrder');
        Route::post('/save-order', 'saveOrder')->name('saveOrder');
        Route::post('/update-order', 'updateOrder')->name('updateOrder');
        Route::post('/save-and-settle', 'orderCompleted')->name('orderCompleted');
        Route::post('/get-order-details', 'getOrderDetails')->name('getOrderDetails');
        Route::get('/view-order-details', 'showOrderDetails')->name('showOrderDetails');
        Route::get('/order-detail/{order_id}', 'orderDetails')->name('orderDetails');

        Route::post('/order-details/{order_id}', 'updateOrderStatus')->name('updateOrderStatus');
    });

    Route::controller(CustomersModelController::class)->prefix('admin')->name('admin.')->group(function () {
        Route::post('/add-customer', 'addCustomer')->name('addCustomer');
        Route::get('/view-customer-details', 'getCustomersData')->name('getCustomersData');
        Route::get('/export-customer-data', 'exportCustomers')->name('exportCustomers');
        Route::get('/customer-profile/{customer_id}', 'customerProfile')->name('customerProfile');
    });


    Route::controller(StaffController::class)->prefix('admin')->name('admin.')->group(function () {
        Route::get('/add-staff', 'addStaffIndex')->name('addStaffIndex');
        Route::post('/add-staff', 'addStaffSave')->name('addStaffSave');
        Route::get('/show-staff', 'showStaffIndex')->name('showStaffIndex');
        Route::get('/edit-staff/{id}', 'editStaffIndex')->name('editStaffIndex');
        Route::post('/edit-staff/{id}', 'updateStaffIndex')->name('updateStaffIndex');

        Route::get('/staff-datatable-data', 'getStaffData')->name('getStaffData');  // Data Table Fetch
        Route::get('/export-staff', 'export')->name('staffExport');  // Data Export
    });

    Route::controller(PayoutController::class)->prefix('admin')->name('admin.')->group(function () {

        // staff account detains start 
        Route::get('/add-account-details', 'addAccountDetailsIndex')->name('addAccountDetailsIndex');
        Route::post('/add-account-details', 'saveAccountDetails')->name('saveAccountDetails');
        Route::get('/show-staff-account-details', 'accountDetailsIndex')->name('accountDetailsIndex');
        Route::get('/edit-staff-account-details/{id}', 'editAccountDetailsIndex')->name('editAccountDetailsIndex');
        Route::post('/edit-staff-account-details/{id}', 'updateAccountDetailsIndex')->name('updateAccountDetailsIndex');
        Route::get('/export-staff-account-details', 'staffAccountDetailsExport')->name('staffAccountDetailsExport');  // export data
        Route::get('/staff-account-details-datatable-data', 'getStaffAccountDetails')->name('getStaffAccountDetails');  // Data Table Fetch
        // staff account detains end 

        // define salary start 
        Route::get('/define-salary', 'defineSalaryIndex')->name('defineSalaryIndex');
        Route::post('/define-salary', 'saveDefineSalary')->name('saveDefineSalary');
        Route::get('/show-define-salary', 'showDefineSalaryIndex')->name('showDefineSalaryIndex');
        Route::get('/edit-define-salary/{id}', 'editDefineSalaryIndex')->name('editDefineSalaryIndex');
        Route::post('/edit-define-salary/{id}', 'updateDefineSalary')->name('updateDefineSalary');
        Route::get('/show-define-salary-datatable-data', 'getDefineSalary')->name('getDefineSalary'); // data table fetch
        Route::get('/export-define-salary', 'exportDefineSalary')->name('exportDefineSalary'); // export data
        // define salary end 


        // Salary Increment Start

        Route::get('/add-salary-increment', 'addSalaryIncrementIndex')->name('addSalaryIncrementIndex');
        Route::post('/add-salary-increment', 'saveSalaryIncrement')->name('saveSalaryIncrement');
        Route::get('/show-salary-increment', 'showSalaryIncrement')->name('showSalaryIncrement');
        Route::get('/edit-salary-increment/{id}', 'editSalaryIncrement')->name('editSalaryIncrement');
        Route::post('/edit-salary-increment/{id}', 'updateSalaryIncrement')->name('updateSalaryIncrement');
        Route::get('/show-incremented-salary-datatable-data', 'getSalaryIncrementData')->name('getSalaryIncrementData');  // data table fetch
        Route::get('/export-salary-increment', 'exportSalaryIncrementData')->name('exportSalaryIncrementData');  // export

        // Salary Increment End

    });

    Route::controller(CreatePaymentController::class)->prefix('admin')->name('admin.')->group(function () {
        Route::get('/create-payment', 'createPayment')->name('createPayment');
        Route::post('/create-payment', 'saveCreatePayment')->name('saveCreatePayment');
        Route::get('/edit-created-payment/{id}', 'editCreatePayment')->name('editCreatePayment');
        Route::post('/edit-created-payment/{id}', 'updateCreatePayment')->name('updateCreatePayment');
        Route::get('/show-created-payment', 'showCreatedPayment')->name('showCreatedPayment');
        Route::get('/get-created-payment-datatable', 'getCreatedPayment')->name('getCreatedPayment');  // datatable
        Route::get('/export-created-payment', 'exportCreatedPayment')->name('exportCreatedPayment');  //export

    });

    Route::controller(ReleasePaymentController::class)->prefix('admin')->name('admin.')->group(function () {
        Route::get('/release-payment/{id}', 'releasePaymentIndex')->name('releasePaymentIndex');
        Route::post('/release-payment/{id}', 'saveReleasePayment')->name('saveReleasePayment');
        Route::get('/show-release-payment', 'showReleasedPayment')->name('showReleasedPayment');
        Route::get('/edit-release-payment/{id}', 'editReleasePayment')->name('editReleasePayment');
        Route::post('/edit-release-payment/{id}', 'updateReleasePayment')->name('updateReleasePayment');
        Route::get('/get-released-payment-datatable', 'getReleasePayment')->name('getReleasePayment');  // data table 
        Route::get('/export-released-payment', 'exportReleasePayment')->name('exportReleasePayment'); // export 
    });

    Route::controller(AdvancePaymentController::class)->prefix('admin')->name('admin.')->group(function () {
        Route::get('/add-advance-payment', 'addAdvancePaymentIndex')->name('addAdvancePaymentIndex');
        Route::post('/add-advance-payment', 'saveAdvancePayment')->name('saveAdvancePayment');
        Route::get('/edit-advance-payment/{id}', 'editAdvancePaymentIndex')->name('editAdvancePaymentIndex');
        Route::post('/edit-advance-payment/{id}', 'updateAdvancePayment')->name('updateAdvancePayment');
        Route::get('/show-advance-payment', 'showAdvancePaymentIndex')->name('showAdvancePaymentIndex');
        Route::get('/show-advance-payment-datatable-data', 'getAdvancePaymentData')->name('getAdvancePaymentData');  // data table fetch
        Route::get('/export-advance-payment', 'exportAdvancePaymentData')->name('exportAdvancePaymentData');  // export data
    });



    Route::controller(LeaveController::class)->prefix('admin')->name('admin.')->group(function () {
        Route::get('/add-leave', 'addLeave')->name('addLeave');
        Route::post('/add-leave', 'saveLeave')->name('saveLeave');
        Route::get('/edit-leave/{id}', 'editLeave')->name('editLeave');
        Route::post('/edit-leave/{id}', 'updateLeave')->name('updateLeave');
        Route::get('/show-leave', 'showAllLeave')->name('showAllLeave');
        Route::get('/show-pending-leave', 'showPendingLeave')->name('showPendingLeave');
        Route::get('/get-leave-datatable', 'getLeaveData')->name('getLeaveData'); // data table
        Route::get('/export-leave-datatable', 'exportLeaveData')->name('exportLeaveData'); // export
    });


    Route::controller(UserAccessController::class)->prefix('admin')->name('admin.')->group(function () {
        Route::get('/add-users', 'addUsers')->name('addUsers');
        Route::post('/add-users', 'saveUsers')->name('saveUsers');
        Route::get('/edit-users/{id}', 'editUsers')->name('editUsers');
        Route::post('/edit-users/{id}', 'updateUsers')->name('updateUsers');
        Route::get('/show-users', 'showUsers')->name('showUsers');
        Route::get('/get-users-datatable-data', 'getUsersData')->name('getUsersData');
    });

    Route::controller(AttendanceController::class)->prefix('admin')->name('admin.')->group(function () {
        Route::get('/add-attendance', 'addAttendance')->name('addAttendance');
        Route::post('/add-attendance', 'saveAttendance')->name('saveAttendance');
        Route::get('/edit-attendance/{id}', 'editAttendance')->name('editAttendance');
        Route::post('/edit-attendance/{id}', 'updateAttendance')->name('updateAttendance');
        Route::get('/show-attendance', 'showAttendance')->name('showAttendance');
        Route::get('/get-attendance-datatable', 'getAttendanceData')->name('getAttendanceData');  // data table fetch
        Route::get('/export-attendance', 'exportAttendanceData')->name('exportAttendanceData');  // export data
    });

    Route::controller(StaffProfileController::class)->prefix('admin')->name('admin.')->group(function () {
        Route::get('/staff-profile/{id}', 'staffProfile')->name('staffProfile');
        Route::get('/staff-profile-get-attendance', 'getStaffProfileAttendance')->name('getStaffProfileAttendance');
        Route::get('/staff-profile-get-leave', 'getStaffProfileleave')->name('getStaffProfileleave');
        Route::get('/staff-profile-get-worksheet', 'getStaffProfileworksheet')->name('getStaffProfileworksheet');
        Route::get('/staff-profile-get-payout', 'getStaffProfilepayout')->name('getStaffProfilepayout');
    });
    Route::controller(LoyaltyModelController::class)->prefix('admin')->name('admin.')->group(function () {
        Route::get('/loyalty-setup', 'loyaltySetup')->name('loyaltySetup');
        Route::post('/loyalty-setup', 'saveLoyaltySetup')->name('saveLoyaltySetup');
        Route::get('/edit-loyalty-setup/{id}', 'editLoyaltySetup')->name('editLoyaltySetup');
        Route::post('/edit-loyalty-setup/{id}', 'updateLoyaltySetup')->name('updateLoyaltySetup');
        Route::get('/show-loyalty', 'showLoyaltySetup')->name('showLoyaltySetup');
        Route::get('/get-loyalty', 'getLoyaltySetup')->name('getLoyaltySetup');
    });
    Route::controller(CustomerLoyaltyPointsModelController::class)->prefix('admin')->name('admin.')->group(function () {
        Route::post('/save-customer-loyalty-point', 'saveLoyaltyPoint')->name('saveLoyaltyPoint');
    });

    Route::controller(SettingModelController::class)->prefix('admin')->name('admin.')->group(function () {
        Route::get('/settings', 'settings')->name('settings');
        Route::post('/save-settings', 'saveSettings')->name('saveSettings');
    });
});

// [================== Admin Route  End ==================]
// [================== Admin Route  End ==================]



Route::middleware('staffLogin')->group(function () {

    Route::controller(StaffIndexController::class)->prefix('staff')->name('staff.')->group(function () {
        Route::get('/dashboard', 'index')->name('indexView');
        Route::get('/logout', 'logout')->name('logout');
    });

    Route::controller(StaffAttendanceController::class)->prefix('staff')->name('staff.')->group(function () {
        Route::get('/add-attendance', 'addAttendance')->name('addAttendance');
        Route::post('/add-attendance', 'saveAttendance')->name('saveAttendance');
        Route::get('/show-attendance', 'showAttendance')->name('showAttendance');
        Route::get('/edit-attendance/{id}', 'editAttendance')->name('editAttendance');
        Route::post('/edit-attendance/{id}', 'updateAttendance')->name('updateAttendance');
        Route::get('/get-attendance-datatable', 'getAttendanceData')->name('getAttendanceData');
    });



    Route::controller(StaffLeaveController::class)->prefix('staff')->name('staff.')->group(function () {
        Route::get('/leave-request', 'leaveRequest')->name('leaveRequest');
        Route::post('/leave-request', 'saveLeaveRequest')->name('saveLeaveRequest');
        Route::get('/edit-leave-request/{id}', 'editLeaveRequest')->name('editLeaveRequest');
        Route::post('/edit-leave-request/{id}', 'updateLeaveRequest')->name('updateLeaveRequest');
        Route::get('/show-leave-request', 'showLeaveRequest')->name('showLeaveRequest');
        Route::get('/get-leave-request-datatable', 'getLeaveRequest')->name('getLeaveRequest');
    });

    Route::controller(StaffPaymentController::class)->prefix('staff')->name('staff.')->group(function () {
        Route::get('/account-details', 'accountDetails')->name('accountDetails');
        Route::get('/incrementd-payment-details', 'incrementedPaymentDetails')->name('incrementedPaymentDetails');
        Route::get('/advance-payment-details', 'advancePaymentDetails')->name('advancePaymentDetails');
        Route::get('/received-payment-details', 'receivedPaymentDetails')->name('receivedPaymentDetails');
    });

    Route::controller(StaffPanelProfileController::class)->prefix('staff')->name('staff.')->group(function () {
        Route::get('/profile/{uid}', 'profile')->name('profile');
    });

    Route::controller(StaffOrderDetails::class)->prefix('staff')->name('staff.')->group(function () {
        Route::get('/show-orders', 'allOrder')->name('allOrder');
        Route::get('/order-detail/{order_id}', 'orderDetails')->name('orderDetails');
    });
});

// =============== Staff Route End =================

// Reception Started


Route::middleware('receptionLogin')->group(function () {

    Route::controller(ReceptionDashboardController::class)->prefix('reception')->name('reception.')->group(function () {
        Route::get('/dashboard', 'index')->name('indexView');
        Route::get('/logout', 'logout')->name('logout');
    });

    Route::controller(InquiryController::class)->prefix('reception')->name('reception.')->group(function () {
        Route::get('/add-inquiry', 'addInquiryIndex')->name('addInquiryIndex');
        Route::post('/add-inquiry', 'saveInquiry')->name('saveInquiry');
        Route::get('/edit-inquiry/{id}', 'editInquiryIndex')->name('editInquiryIndex');
        Route::post('/edit-inquiry{id}', 'updateInquiry')->name('updateInquiry');
        Route::get('/show-inquiry', 'showInquiry')->name('showInquiry');
        Route::get('/get-inquiry-datatable-data', 'getInquiryData')->name('getInquiryData');  // data table fetch
        Route::get('/export-inquiry', 'exportInquiryData')->name('exportInquiryData');  // export data

        // =========== Follow up inquiry start
        Route::get('/move-into-followup-inquiry/{id}', 'followUpInquiryIndex')->name('followUpInquiryIndex');
        Route::post('/move-into-followup-inquiry/{id}', 'saveFollowUpInquiry')->name('saveFollowUpInquiry');
        Route::get('/show-followup-inquiry', 'showFollowUpInquiry')->name('showFollowUpInquiry');
        Route::get('/remove-follow-up', 'removeFollowUp')->name('removeFollowUp');
        Route::get('/get-follow-up-inquiry', 'getFollowUpInquiryData')->name('getFollowUpInquiryData');  // data table fetch
        Route::get('/upcomming-inquiry', 'upcommingInquiry')->name('upcommingInquiry');
        Route::get('/get-upcomming-inquiry-datatable-data', 'getUpcommingInquiryData')->name('getUpcommingInquiryData');  // data table fetch
        Route::get('/export-follow-up-inquiry', 'exportFollowUpInquiryData')->name('exportFollowUpInquiryData');  // get data
        // =========== Follow up inquiry end

        // =========== successfull inquiry start
        Route::get('/move-into-successfull-inquiry/{id}', 'successfullInquiryIndex')->name('successfullInquiryIndex');
        Route::post('/move-into-successfull-inquiry/{id}', 'saveSuccessfullInquiry')->name('saveSuccessfullInquiry');
        Route::get('/show-successfull-inquiry', 'showSuccessfullInquiry')->name('showSuccessfullInquiry');
        Route::get('/remove-successfull', 'removeSuccessfullInquiry')->name('removeSuccessfullInquiry');
        Route::get('/get-successfull-inquiry', 'getSuccessfullInquiryData')->name('getSuccessfullInquiryData');  // data table fetch
        Route::get('/export-successfull-inquiry', 'exportSuccessfullInquiryData')->name('exportSuccessfullInquiryData');  // get data
        // =========== successfull inquiry end

    });

    Route::controller(ReceptonController::class)->prefix('reception')->name('reception.')->group(function () {
        Route::get('/add-reception', 'addReceptionIndex')->name('addReceptionIndex');
        Route::post('/add-reception', 'saveReception')->name('saveReception');
        Route::get('/show-reception', 'showReceptionIndex')->name('showReceptionIndex');
        Route::get('/edit-reception/{id}', 'editReceptionIndex')->name('editReceptionIndex');
        Route::post('/edit-reception/{id}', 'updateReception')->name('updateReception');
        Route::get('/get-reception-datatable-data', 'getReceptionData')->name('getReception'); // data table fetch
        Route::get('/export-reception', 'exportReception')->name('exportReception'); // export reception log
    });
});

// Reception Ended 

// chef panel started

Route::middleware('chefLogin')->group(function () {
    Route::controller(ChefDashboardController::class)->prefix('chef')->name('chef.')->group(function () {
        Route::get('/dashboard', 'index')->name('indexView');
        Route::get('/logout', 'logout')->name('logout');
    });
    Route::controller(ChefPanelOrderDetails::class)->prefix('chef')->name('chef.')->group(function () {
        Route::get('/order-details/{order_id}', 'singleOrder')->name('singleOrder');
        Route::post('/order-details/{order_id}', 'updateOrder')->name('updateOrder');
        Route::get('/show-orders', 'allOrder')->name('allOrder');
    });
});

// chef panel ended 

Route::controller(GeneratePdf::class)->prefix('admin')->group(function () {
    Route::get('/pdf', 'generatePdf')->name('generatePdf');
});

// receipt verification 
Route::get('/receipt-verification/{order_id}', [ReceiptVerification::class, 'verification']);

Route::controller(CustomerLoginController::class)->prefix('customer')->name('customer.')->group(function () {
    Route::get('/login', 'login')->name('login');
    Route::get('/sign-up', 'signUp')->name('signUp');
    Route::get('/account', 'account')->name('account');
    Route::post('/sign-in', 'signIn')->name('signIn');
    Route::get('/logout', 'logout')->name('logout');
    Route::post('/update-data/{id}', 'updateCustomerData')->name('updateCustomerData');
});

Route::controller(CustomerDashboardController::class)->prefix('customer')->name('customer.')->group(function () {
    Route::get('/dashboard', 'index')->name('index');
});
Route::controller(CustomerShoppingController::class)->prefix('customer')->name('customer.')->group(function () {
    Route::get('/shop/{table_no?}', 'customerShopping')->name('customerShopping');
    Route::get('/payment', 'customerShoppingPayment')->name('customerShoppingPayment');
    Route::post('/place-order', 'placeOrder')->name('placeOrder');
    Route::get('/order-details/{order_id}', 'orderDetails')->name('orderDetails');
    Route::get('/payment/{order_id}', 'paymentData')->name('paymentData');
    Route::post('/generate-bill', 'generateBill')->name('generateBill');
    Route::post('/get-order-details/{order_id}', 'getOrderDetails')->name('getOrderDetails');
});
Route::controller(CustomerOrderController::class)->name('customer.')->group(function () {
    Route::get('/place-order/{table_no}', 'PlaceOrder')->name('PlaceOrder');
    // Route::post('/place-customer-order', 'placeCustomerOrder')->name('placeCustomerOrder');
});
Route::controller(CustomerAjaxController::class)->name('customer.')->group(function () {
    Route::post('/customer-ajax', 'customerAjax')->name('customerAjax');
});
