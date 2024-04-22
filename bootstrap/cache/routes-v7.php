<?php

/*
|--------------------------------------------------------------------------
| Load The Cached Routes
|--------------------------------------------------------------------------
|
| Here we will decode and unserialize the RouteCollection instance that
| holds all of the route information for an application. This allows
| us to instantaneously load the entire route map into the router.
|
*/

app('router')->setCompiledRoutes(
    array (
  'compiled' => 
  array (
    0 => false,
    1 => 
    array (
      '/sanctum/csrf-cookie' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'sanctum.csrf-cookie',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/_ignition/health-check' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'ignition.healthCheck',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/_ignition/execute-solution' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'ignition.executeSolution',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/_ignition/update-config' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'ignition.updateConfig',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/user' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::9Tp6H3ELuJ2FEFrj',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'login-view',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/login' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'login-check',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/otp-verification' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'login-otp-verification',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/reset-otp-verification' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'reset-otp-verification',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/reset-password' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'showPasswordResetPage',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'passwordResetCheckUser',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/reset-password-otp-check' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'passwordResetOtpCheck',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/cancel-reset-password' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'cancelPasswordReset',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/update-passwordd' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'updatePassword',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/goto-login' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'GotoLogin',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/deleteall' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'deleteAll',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/ajax-request' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'admin.ajaxRequest',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/get-trash-data' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'admin.getTrashData',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/add-media' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'admin.addMediaIndex',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'admin.saveMediaIndex',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/show-media' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'admin.mediaIndex',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/media-datatable-data' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'admin.getMediaData',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/dashboard' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'admin.indexView',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/logout' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'admin.logout',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/add-category' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'admin.addCategoryIndex',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'admin.saveCategory',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/show-category' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'admin.showCategory',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/add-pricing-unit' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'admin.addPricingUnitIndex',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'admin.savePricingUnit',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/show-pricing-unit' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'admin.showPricingUnit',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/add-products' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'admin.addProducts',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'admin.saveProducts',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/show-products' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'admin.showProducts',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/add-material' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'admin.addMaterialIndex',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'admin.saveMaterial',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/show-material' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'admin.showMaterial',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/add-table' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'admin.addTableIndex',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'admin.saveTable',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/show-table' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'admin.showTable',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/add-booking' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'admin.addBooking',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'admin.saveBooking',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/show-booking' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'admin.showBooking',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/cancel-booking' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'admin.cancelBooking',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/order' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'admin.addOrder',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/save-order' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'admin.saveOrder',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/update-order' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'admin.updateOrder',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/save-and-settle' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'admin.orderCompleted',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/get-order-details' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'admin.getOrderDetails',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/view-order-details' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'admin.showOrderDetails',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/add-customer' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'admin.addCustomer',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/view-customer-details' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'admin.getCustomersData',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/export-customer-data' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'admin.exportCustomers',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/add-staff' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'admin.addStaffIndex',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'admin.addStaffSave',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/show-staff' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'admin.showStaffIndex',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/staff-datatable-data' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'admin.getStaffData',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/export-staff' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'admin.staffExport',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/add-account-details' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'admin.addAccountDetailsIndex',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'admin.saveAccountDetails',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/show-staff-account-details' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'admin.accountDetailsIndex',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/export-staff-account-details' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'admin.staffAccountDetailsExport',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/staff-account-details-datatable-data' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'admin.getStaffAccountDetails',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/define-salary' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'admin.defineSalaryIndex',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'admin.saveDefineSalary',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/show-define-salary' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'admin.showDefineSalaryIndex',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/show-define-salary-datatable-data' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'admin.getDefineSalary',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/export-define-salary' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'admin.exportDefineSalary',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/add-salary-increment' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'admin.addSalaryIncrementIndex',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'admin.saveSalaryIncrement',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/show-salary-increment' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'admin.showSalaryIncrement',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/show-incremented-salary-datatable-data' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'admin.getSalaryIncrementData',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/export-salary-increment' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'admin.exportSalaryIncrementData',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/create-payment' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'admin.createPayment',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'admin.saveCreatePayment',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/show-created-payment' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'admin.showCreatedPayment',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/get-created-payment-datatable' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'admin.getCreatedPayment',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/export-created-payment' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'admin.exportCreatedPayment',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/show-release-payment' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'admin.showReleasedPayment',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/get-released-payment-datatable' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'admin.getReleasePayment',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/export-released-payment' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'admin.exportReleasePayment',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/add-advance-payment' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'admin.addAdvancePaymentIndex',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'admin.saveAdvancePayment',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/show-advance-payment' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'admin.showAdvancePaymentIndex',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/show-advance-payment-datatable-data' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'admin.getAdvancePaymentData',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/export-advance-payment' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'admin.exportAdvancePaymentData',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/add-leave' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'admin.addLeave',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'admin.saveLeave',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/show-leave' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'admin.showAllLeave',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/show-pending-leave' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'admin.showPendingLeave',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/get-leave-datatable' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'admin.getLeaveData',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/export-leave-datatable' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'admin.exportLeaveData',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/add-users' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'admin.addUsers',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'admin.saveUsers',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/show-users' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'admin.showUsers',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/get-users-datatable-data' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'admin.getUsersData',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/add-attendance' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'admin.addAttendance',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'admin.saveAttendance',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/show-attendance' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'admin.showAttendance',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/get-attendance-datatable' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'admin.getAttendanceData',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/export-attendance' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'admin.exportAttendanceData',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/staff-profile-get-attendance' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'admin.getStaffProfileAttendance',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/staff-profile-get-leave' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'admin.getStaffProfileleave',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/staff-profile-get-worksheet' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'admin.getStaffProfileworksheet',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/staff-profile-get-payout' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'admin.getStaffProfilepayout',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/loyalty-setup' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'admin.loyaltySetup',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'admin.saveLoyaltySetup',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/show-loyalty' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'admin.showLoyaltySetup',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/get-loyalty' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'admin.getLoyaltySetup',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/save-customer-loyalty-point' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'admin.saveLoyaltyPoint',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/settings' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'admin.settings',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/save-settings' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'admin.saveSettings',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/staff/dashboard' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'staff.indexView',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/staff/logout' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'staff.logout',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/staff/add-attendance' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'staff.addAttendance',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'staff.saveAttendance',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/staff/show-attendance' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'staff.showAttendance',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/staff/get-attendance-datatable' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'staff.getAttendanceData',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/staff/leave-request' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'staff.leaveRequest',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'staff.saveLeaveRequest',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/staff/show-leave-request' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'staff.showLeaveRequest',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/staff/get-leave-request-datatable' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'staff.getLeaveRequest',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/staff/account-details' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'staff.accountDetails',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/staff/incrementd-payment-details' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'staff.incrementedPaymentDetails',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/staff/advance-payment-details' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'staff.advancePaymentDetails',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/staff/received-payment-details' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'staff.receivedPaymentDetails',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/staff/show-orders' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'staff.allOrder',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/reception/dashboard' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'reception.indexView',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/reception/logout' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'reception.logout',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/reception/add-inquiry' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'reception.addInquiryIndex',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'reception.saveInquiry',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/reception/show-inquiry' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'reception.showInquiry',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/reception/get-inquiry-datatable-data' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'reception.getInquiryData',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/reception/export-inquiry' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'reception.exportInquiryData',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/reception/show-followup-inquiry' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'reception.showFollowUpInquiry',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/reception/remove-follow-up' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'reception.removeFollowUp',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/reception/get-follow-up-inquiry' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'reception.getFollowUpInquiryData',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/reception/upcomming-inquiry' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'reception.upcommingInquiry',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/reception/get-upcomming-inquiry-datatable-data' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'reception.getUpcommingInquiryData',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/reception/export-follow-up-inquiry' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'reception.exportFollowUpInquiryData',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/reception/show-successfull-inquiry' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'reception.showSuccessfullInquiry',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/reception/remove-successfull' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'reception.removeSuccessfullInquiry',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/reception/get-successfull-inquiry' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'reception.getSuccessfullInquiryData',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/reception/export-successfull-inquiry' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'reception.exportSuccessfullInquiryData',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/reception/add-reception' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'reception.addReceptionIndex',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'reception.saveReception',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/reception/show-reception' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'reception.showReceptionIndex',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/reception/get-reception-datatable-data' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'reception.getReception',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/reception/export-reception' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'reception.exportReception',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/chef/dashboard' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'chef.indexView',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/chef/logout' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'chef.logout',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/chef/show-orders' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'chef.allOrder',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/pdf' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generatePdf',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/customer/login' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'customer.login',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/customer/sign-up' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'customer.signUp',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/customer/account' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'customer.account',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/customer/sign-in' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'customer.signIn',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/customer/logout' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'customer.logout',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/customer/dashboard' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'customer.index',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/customer/payment' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'customer.customerShoppingPayment',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/customer/place-order' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'customer.placeOrder',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/customer/generate-bill' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'customer.generateBill',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/customer-ajax' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'customer.customerAjax',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
    ),
    2 => 
    array (
      0 => '{^(?|/admin/(?|trash/([^/]++)(*:31)|edit\\-(?|m(?|edia/([^/]++)(?|(*:67))|aterial/([^/]++)(?|(*:94)))|c(?|ategory/([^/]++)(?|(*:126))|reated\\-payment/([^/]++)(?|(*:162)))|pr(?|icing\\-unit/([^/]++)(?|(*:200))|oducts/([^/]++)(?|(*:227)))|table/([^/]++)(?|(*:254))|booking/([^/]++)(?|(*:282))|s(?|taff(?|/([^/]++)(?|(*:314))|\\-account\\-details/([^/]++)(?|(*:353)))|alary\\-increment/([^/]++)(?|(*:391)))|define\\-salary/([^/]++)(?|(*:427))|release\\-payment/([^/]++)(?|(*:464))|a(?|dvance\\-payment/([^/]++)(?|(*:504))|ttendance/([^/]++)(?|(*:534)))|l(?|eave/([^/]++)(?|(*:564))|oyalty\\-setup/([^/]++)(?|(*:598)))|users/([^/]++)(?|(*:625)))|generate\\-table\\-qr/([^/]++)(*:663)|order\\-detail(?|/([^/]++)(*:696)|s/([^/]++)(*:714))|customer\\-profile/([^/]++)(*:749)|release\\-payment/([^/]++)(?|(*:785))|staff\\-profile/([^/]++)(*:817))|/staff/(?|edit\\-(?|attendance/([^/]++)(?|(*:867))|leave\\-request/([^/]++)(?|(*:902)))|profile/([^/]++)(*:928)|order\\-detail/([^/]++)(*:958))|/rece(?|ption/(?|edit\\-(?|inquiry(?|/([^/]++)(*:1012)|([^/]++)(*:1029))|reception/([^/]++)(?|(*:1060)))|move\\-into\\-(?|followup\\-inquiry/([^/]++)(?|(*:1115))|successfull\\-inquiry/([^/]++)(?|(*:1157))))|ipt\\-verification/([^/]++)(*:1195))|/c(?|hef/order\\-details/([^/]++)(?|(*:1240))|ustomer/(?|update\\-data/([^/]++)(*:1282)|shop(?:/([^/]++))?(*:1309)|order\\-details/([^/]++)(*:1341)|payment/([^/]++)(*:1366)|get\\-order\\-details/([^/]++)(*:1403)))|/place\\-order/([^/]++)(*:1436))/?$}sDu',
    ),
    3 => 
    array (
      31 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'admin.Trash',
          ),
          1 => 
          array (
            0 => 'trash_of',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      67 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'admin.editMedia',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'admin.updateMedia',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      94 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'admin.editMaterial',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'admin.updateMaterial',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      126 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'admin.editCategory',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'admin.updateCategory',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      162 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'admin.editCreatePayment',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'admin.updateCreatePayment',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      200 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'admin.editPricingUnit',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'admin.updatePricingUnit',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      227 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'admin.editProducts',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'admin.updateProducts',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      254 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'admin.editTable',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'admin.updateTable',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      282 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'admin.editBooking',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'admin.updateBooking',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      314 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'admin.editStaffIndex',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'admin.updateStaffIndex',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      353 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'admin.editAccountDetailsIndex',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'admin.updateAccountDetailsIndex',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      391 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'admin.editSalaryIncrement',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'admin.updateSalaryIncrement',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      427 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'admin.editDefineSalaryIndex',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'admin.updateDefineSalary',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      464 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'admin.editReleasePayment',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'admin.updateReleasePayment',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      504 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'admin.editAdvancePaymentIndex',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'admin.updateAdvancePayment',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      534 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'admin.editAttendance',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'admin.updateAttendance',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      564 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'admin.editLeave',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'admin.updateLeave',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      598 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'admin.editLoyaltySetup',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'admin.updateLoyaltySetup',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      625 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'admin.editUsers',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'admin.updateUsers',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      663 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'admin.generateTableQr',
          ),
          1 => 
          array (
            0 => 'table_no',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      696 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'admin.orderDetails',
          ),
          1 => 
          array (
            0 => 'order_id',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      714 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'admin.updateOrderStatus',
          ),
          1 => 
          array (
            0 => 'order_id',
          ),
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      749 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'admin.customerProfile',
          ),
          1 => 
          array (
            0 => 'customer_id',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      785 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'admin.releasePaymentIndex',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'admin.saveReleasePayment',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      817 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'admin.staffProfile',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      867 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'staff.editAttendance',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'staff.updateAttendance',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      902 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'staff.editLeaveRequest',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'staff.updateLeaveRequest',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      928 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'staff.profile',
          ),
          1 => 
          array (
            0 => 'uid',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      958 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'staff.orderDetails',
          ),
          1 => 
          array (
            0 => 'order_id',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      1012 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'reception.editInquiryIndex',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      1029 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'reception.updateInquiry',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      1060 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'reception.editReceptionIndex',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'reception.updateReception',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      1115 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'reception.followUpInquiryIndex',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'reception.saveFollowUpInquiry',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      1157 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'reception.successfullInquiryIndex',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'reception.saveSuccessfullInquiry',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      1195 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::RXnFA6e9viXseA4L',
          ),
          1 => 
          array (
            0 => 'order_id',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      1240 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'chef.singleOrder',
          ),
          1 => 
          array (
            0 => 'order_id',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'chef.updateOrder',
          ),
          1 => 
          array (
            0 => 'order_id',
          ),
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      1282 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'customer.updateCustomerData',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      1309 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'customer.customerShopping',
            'table_no' => NULL,
          ),
          1 => 
          array (
            0 => 'table_no',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      1341 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'customer.orderDetails',
          ),
          1 => 
          array (
            0 => 'order_id',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      1366 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'customer.paymentData',
          ),
          1 => 
          array (
            0 => 'order_id',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      1403 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'customer.getOrderDetails',
          ),
          1 => 
          array (
            0 => 'order_id',
          ),
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      1436 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'customer.PlaceOrder',
          ),
          1 => 
          array (
            0 => 'table_no',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
        1 => 
        array (
          0 => NULL,
          1 => NULL,
          2 => NULL,
          3 => NULL,
          4 => false,
          5 => false,
          6 => 0,
        ),
      ),
    ),
    4 => NULL,
  ),
  'attributes' => 
  array (
    'sanctum.csrf-cookie' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'sanctum/csrf-cookie',
      'action' => 
      array (
        'uses' => 'Laravel\\Sanctum\\Http\\Controllers\\CsrfCookieController@show',
        'controller' => 'Laravel\\Sanctum\\Http\\Controllers\\CsrfCookieController@show',
        'namespace' => NULL,
        'prefix' => 'sanctum',
        'where' => 
        array (
        ),
        'middleware' => 
        array (
          0 => 'web',
        ),
        'as' => 'sanctum.csrf-cookie',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'ignition.healthCheck' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => '_ignition/health-check',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'Spatie\\LaravelIgnition\\Http\\Middleware\\RunnableSolutionsEnabled',
        ),
        'uses' => 'Spatie\\LaravelIgnition\\Http\\Controllers\\HealthCheckController@__invoke',
        'controller' => 'Spatie\\LaravelIgnition\\Http\\Controllers\\HealthCheckController',
        'as' => 'ignition.healthCheck',
        'namespace' => NULL,
        'prefix' => '_ignition',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'ignition.executeSolution' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => '_ignition/execute-solution',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'Spatie\\LaravelIgnition\\Http\\Middleware\\RunnableSolutionsEnabled',
        ),
        'uses' => 'Spatie\\LaravelIgnition\\Http\\Controllers\\ExecuteSolutionController@__invoke',
        'controller' => 'Spatie\\LaravelIgnition\\Http\\Controllers\\ExecuteSolutionController',
        'as' => 'ignition.executeSolution',
        'namespace' => NULL,
        'prefix' => '_ignition',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'ignition.updateConfig' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => '_ignition/update-config',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'Spatie\\LaravelIgnition\\Http\\Middleware\\RunnableSolutionsEnabled',
        ),
        'uses' => 'Spatie\\LaravelIgnition\\Http\\Controllers\\UpdateConfigController@__invoke',
        'controller' => 'Spatie\\LaravelIgnition\\Http\\Controllers\\UpdateConfigController',
        'as' => 'ignition.updateConfig',
        'namespace' => NULL,
        'prefix' => '_ignition',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::9Tp6H3ELuJ2FEFrj' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/user',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'auth:sanctum',
        ),
        'uses' => 'O:55:"Laravel\\SerializableClosure\\UnsignedSerializableClosure":1:{s:12:"serializable";O:46:"Laravel\\SerializableClosure\\Serializers\\Native":5:{s:3:"use";a:0:{}s:8:"function";s:77:"function (\\Illuminate\\Http\\Request $request) {
    return $request->user();
}";s:5:"scope";s:37:"Illuminate\\Routing\\RouteFileRegistrar";s:4:"this";N;s:4:"self";s:32:"00000000000003be0000000000000000";}}',
        'namespace' => NULL,
        'prefix' => 'api',
        'where' => 
        array (
        ),
        'as' => 'generated::9Tp6H3ELuJ2FEFrj',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'login-view' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => '/',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'App\\Http\\Controllers\\Login@index',
        'controller' => 'App\\Http\\Controllers\\Login@index',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'login-view',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'login-check' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'login',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'App\\Http\\Controllers\\Login@login',
        'controller' => 'App\\Http\\Controllers\\Login@login',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'login-check',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'login-otp-verification' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'otp-verification',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'App\\Http\\Controllers\\Login@loginOtpVerification',
        'controller' => 'App\\Http\\Controllers\\Login@loginOtpVerification',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'login-otp-verification',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'reset-otp-verification' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'reset-otp-verification',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'App\\Http\\Controllers\\Login@resetOtpVerification',
        'controller' => 'App\\Http\\Controllers\\Login@resetOtpVerification',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'reset-otp-verification',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'showPasswordResetPage' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'reset-password',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'App\\Http\\Controllers\\Login@showPasswordResetPage',
        'controller' => 'App\\Http\\Controllers\\Login@showPasswordResetPage',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'showPasswordResetPage',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'passwordResetCheckUser' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'reset-password',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'App\\Http\\Controllers\\Login@passwordResetCheckUser',
        'controller' => 'App\\Http\\Controllers\\Login@passwordResetCheckUser',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'passwordResetCheckUser',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'passwordResetOtpCheck' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'reset-password-otp-check',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'App\\Http\\Controllers\\Login@passwordResetOtpCheck',
        'controller' => 'App\\Http\\Controllers\\Login@passwordResetOtpCheck',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'passwordResetOtpCheck',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'cancelPasswordReset' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'cancel-reset-password',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'App\\Http\\Controllers\\Login@cancelPasswordReset',
        'controller' => 'App\\Http\\Controllers\\Login@cancelPasswordReset',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'cancelPasswordReset',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'updatePassword' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'update-passwordd',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'App\\Http\\Controllers\\Login@updatePassword',
        'controller' => 'App\\Http\\Controllers\\Login@updatePassword',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'updatePassword',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'GotoLogin' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'goto-login',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'App\\Http\\Controllers\\Login@GotoLogin',
        'controller' => 'App\\Http\\Controllers\\Login@GotoLogin',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'GotoLogin',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'deleteAll' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'deleteall',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'App\\Http\\Controllers\\DeleteAllController@deleteAll',
        'controller' => 'App\\Http\\Controllers\\DeleteAllController@deleteAll',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'deleteAll',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.ajaxRequest' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'admin/ajax-request',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'adminLogin',
        ),
        'uses' => 'App\\Http\\Controllers\\AjaxRequestController@ajaxRequest',
        'controller' => 'App\\Http\\Controllers\\AjaxRequestController@ajaxRequest',
        'as' => 'admin.ajaxRequest',
        'namespace' => NULL,
        'prefix' => '/admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.Trash' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/trash/{trash_of}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'adminLogin',
        ),
        'uses' => 'App\\Http\\Controllers\\TrashController@Trash',
        'controller' => 'App\\Http\\Controllers\\TrashController@Trash',
        'as' => 'admin.Trash',
        'namespace' => NULL,
        'prefix' => '/admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.getTrashData' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/get-trash-data',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'adminLogin',
        ),
        'uses' => 'App\\Http\\Controllers\\TrashController@getTrashData',
        'controller' => 'App\\Http\\Controllers\\TrashController@getTrashData',
        'as' => 'admin.getTrashData',
        'namespace' => NULL,
        'prefix' => '/admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.addMediaIndex' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/add-media',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'adminLogin',
        ),
        'uses' => 'App\\Http\\Controllers\\MediaController@index',
        'controller' => 'App\\Http\\Controllers\\MediaController@index',
        'as' => 'admin.addMediaIndex',
        'namespace' => NULL,
        'prefix' => '/admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.saveMediaIndex' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'admin/add-media',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'adminLogin',
        ),
        'uses' => 'App\\Http\\Controllers\\MediaController@save',
        'controller' => 'App\\Http\\Controllers\\MediaController@save',
        'as' => 'admin.saveMediaIndex',
        'namespace' => NULL,
        'prefix' => '/admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.mediaIndex' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/show-media',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'adminLogin',
        ),
        'uses' => 'App\\Http\\Controllers\\MediaController@mediaIndex',
        'controller' => 'App\\Http\\Controllers\\MediaController@mediaIndex',
        'as' => 'admin.mediaIndex',
        'namespace' => NULL,
        'prefix' => '/admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.editMedia' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/edit-media/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'adminLogin',
        ),
        'uses' => 'App\\Http\\Controllers\\MediaController@editMedia',
        'controller' => 'App\\Http\\Controllers\\MediaController@editMedia',
        'as' => 'admin.editMedia',
        'namespace' => NULL,
        'prefix' => '/admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.updateMedia' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'admin/edit-media/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'adminLogin',
        ),
        'uses' => 'App\\Http\\Controllers\\MediaController@updateMedia',
        'controller' => 'App\\Http\\Controllers\\MediaController@updateMedia',
        'as' => 'admin.updateMedia',
        'namespace' => NULL,
        'prefix' => '/admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.getMediaData' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/media-datatable-data',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'adminLogin',
        ),
        'uses' => 'App\\Http\\Controllers\\MediaController@getMediaData',
        'controller' => 'App\\Http\\Controllers\\MediaController@getMediaData',
        'as' => 'admin.getMediaData',
        'namespace' => NULL,
        'prefix' => '/admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.indexView' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/dashboard',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'adminLogin',
        ),
        'uses' => 'App\\Http\\Controllers\\AdminIndexController@index',
        'controller' => 'App\\Http\\Controllers\\AdminIndexController@index',
        'as' => 'admin.indexView',
        'namespace' => NULL,
        'prefix' => '/admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.logout' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/logout',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'adminLogin',
        ),
        'uses' => 'App\\Http\\Controllers\\AdminIndexController@logout',
        'controller' => 'App\\Http\\Controllers\\AdminIndexController@logout',
        'as' => 'admin.logout',
        'namespace' => NULL,
        'prefix' => '/admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.addCategoryIndex' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/add-category',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'adminLogin',
        ),
        'uses' => 'App\\Http\\Controllers\\ProductCategoryController@addCategoryIndex',
        'controller' => 'App\\Http\\Controllers\\ProductCategoryController@addCategoryIndex',
        'as' => 'admin.addCategoryIndex',
        'namespace' => NULL,
        'prefix' => '/admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.saveCategory' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'admin/add-category',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'adminLogin',
        ),
        'uses' => 'App\\Http\\Controllers\\ProductCategoryController@saveCategory',
        'controller' => 'App\\Http\\Controllers\\ProductCategoryController@saveCategory',
        'as' => 'admin.saveCategory',
        'namespace' => NULL,
        'prefix' => '/admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.showCategory' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/show-category',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'adminLogin',
        ),
        'uses' => 'App\\Http\\Controllers\\ProductCategoryController@showCategory',
        'controller' => 'App\\Http\\Controllers\\ProductCategoryController@showCategory',
        'as' => 'admin.showCategory',
        'namespace' => NULL,
        'prefix' => '/admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.editCategory' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/edit-category/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'adminLogin',
        ),
        'uses' => 'App\\Http\\Controllers\\ProductCategoryController@editCategory',
        'controller' => 'App\\Http\\Controllers\\ProductCategoryController@editCategory',
        'as' => 'admin.editCategory',
        'namespace' => NULL,
        'prefix' => '/admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.updateCategory' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'admin/edit-category/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'adminLogin',
        ),
        'uses' => 'App\\Http\\Controllers\\ProductCategoryController@updateCategory',
        'controller' => 'App\\Http\\Controllers\\ProductCategoryController@updateCategory',
        'as' => 'admin.updateCategory',
        'namespace' => NULL,
        'prefix' => '/admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.addPricingUnitIndex' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/add-pricing-unit',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'adminLogin',
        ),
        'uses' => 'App\\Http\\Controllers\\PricingUnitController@addPricingUnitIndex',
        'controller' => 'App\\Http\\Controllers\\PricingUnitController@addPricingUnitIndex',
        'as' => 'admin.addPricingUnitIndex',
        'namespace' => NULL,
        'prefix' => '/admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.savePricingUnit' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'admin/add-pricing-unit',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'adminLogin',
        ),
        'uses' => 'App\\Http\\Controllers\\PricingUnitController@savePricingUnit',
        'controller' => 'App\\Http\\Controllers\\PricingUnitController@savePricingUnit',
        'as' => 'admin.savePricingUnit',
        'namespace' => NULL,
        'prefix' => '/admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.showPricingUnit' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/show-pricing-unit',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'adminLogin',
        ),
        'uses' => 'App\\Http\\Controllers\\PricingUnitController@showPricingUnit',
        'controller' => 'App\\Http\\Controllers\\PricingUnitController@showPricingUnit',
        'as' => 'admin.showPricingUnit',
        'namespace' => NULL,
        'prefix' => '/admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.editPricingUnit' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/edit-pricing-unit/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'adminLogin',
        ),
        'uses' => 'App\\Http\\Controllers\\PricingUnitController@editPricingUnit',
        'controller' => 'App\\Http\\Controllers\\PricingUnitController@editPricingUnit',
        'as' => 'admin.editPricingUnit',
        'namespace' => NULL,
        'prefix' => '/admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.updatePricingUnit' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'admin/edit-pricing-unit/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'adminLogin',
        ),
        'uses' => 'App\\Http\\Controllers\\PricingUnitController@updatePricingUnit',
        'controller' => 'App\\Http\\Controllers\\PricingUnitController@updatePricingUnit',
        'as' => 'admin.updatePricingUnit',
        'namespace' => NULL,
        'prefix' => '/admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.addProducts' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/add-products',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'adminLogin',
        ),
        'uses' => 'App\\Http\\Controllers\\ProductModelController@addProducts',
        'controller' => 'App\\Http\\Controllers\\ProductModelController@addProducts',
        'as' => 'admin.addProducts',
        'namespace' => NULL,
        'prefix' => '/admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.saveProducts' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'admin/add-products',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'adminLogin',
        ),
        'uses' => 'App\\Http\\Controllers\\ProductModelController@saveProducts',
        'controller' => 'App\\Http\\Controllers\\ProductModelController@saveProducts',
        'as' => 'admin.saveProducts',
        'namespace' => NULL,
        'prefix' => '/admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.editProducts' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/edit-products/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'adminLogin',
        ),
        'uses' => 'App\\Http\\Controllers\\ProductModelController@editProducts',
        'controller' => 'App\\Http\\Controllers\\ProductModelController@editProducts',
        'as' => 'admin.editProducts',
        'namespace' => NULL,
        'prefix' => '/admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.updateProducts' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'admin/edit-products/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'adminLogin',
        ),
        'uses' => 'App\\Http\\Controllers\\ProductModelController@updateProducts',
        'controller' => 'App\\Http\\Controllers\\ProductModelController@updateProducts',
        'as' => 'admin.updateProducts',
        'namespace' => NULL,
        'prefix' => '/admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.showProducts' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/show-products',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'adminLogin',
        ),
        'uses' => 'App\\Http\\Controllers\\ProductModelController@showProducts',
        'controller' => 'App\\Http\\Controllers\\ProductModelController@showProducts',
        'as' => 'admin.showProducts',
        'namespace' => NULL,
        'prefix' => '/admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.addMaterialIndex' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/add-material',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'adminLogin',
        ),
        'uses' => 'App\\Http\\Controllers\\ProductMaterialController@addMaterialIndex',
        'controller' => 'App\\Http\\Controllers\\ProductMaterialController@addMaterialIndex',
        'as' => 'admin.addMaterialIndex',
        'namespace' => NULL,
        'prefix' => '/admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.saveMaterial' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'admin/add-material',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'adminLogin',
        ),
        'uses' => 'App\\Http\\Controllers\\ProductMaterialController@saveMaterial',
        'controller' => 'App\\Http\\Controllers\\ProductMaterialController@saveMaterial',
        'as' => 'admin.saveMaterial',
        'namespace' => NULL,
        'prefix' => '/admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.editMaterial' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/edit-material/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'adminLogin',
        ),
        'uses' => 'App\\Http\\Controllers\\ProductMaterialController@editMaterial',
        'controller' => 'App\\Http\\Controllers\\ProductMaterialController@editMaterial',
        'as' => 'admin.editMaterial',
        'namespace' => NULL,
        'prefix' => '/admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.updateMaterial' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'admin/edit-material/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'adminLogin',
        ),
        'uses' => 'App\\Http\\Controllers\\ProductMaterialController@updateMaterial',
        'controller' => 'App\\Http\\Controllers\\ProductMaterialController@updateMaterial',
        'as' => 'admin.updateMaterial',
        'namespace' => NULL,
        'prefix' => '/admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.showMaterial' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/show-material',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'adminLogin',
        ),
        'uses' => 'App\\Http\\Controllers\\ProductMaterialController@showMaterial',
        'controller' => 'App\\Http\\Controllers\\ProductMaterialController@showMaterial',
        'as' => 'admin.showMaterial',
        'namespace' => NULL,
        'prefix' => '/admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.addTableIndex' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/add-table',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'adminLogin',
        ),
        'uses' => 'App\\Http\\Controllers\\TableModelController@addTableIndex',
        'controller' => 'App\\Http\\Controllers\\TableModelController@addTableIndex',
        'as' => 'admin.addTableIndex',
        'namespace' => NULL,
        'prefix' => '/admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.saveTable' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'admin/add-table',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'adminLogin',
        ),
        'uses' => 'App\\Http\\Controllers\\TableModelController@saveTable',
        'controller' => 'App\\Http\\Controllers\\TableModelController@saveTable',
        'as' => 'admin.saveTable',
        'namespace' => NULL,
        'prefix' => '/admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.editTable' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/edit-table/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'adminLogin',
        ),
        'uses' => 'App\\Http\\Controllers\\TableModelController@editTable',
        'controller' => 'App\\Http\\Controllers\\TableModelController@editTable',
        'as' => 'admin.editTable',
        'namespace' => NULL,
        'prefix' => '/admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.updateTable' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'admin/edit-table/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'adminLogin',
        ),
        'uses' => 'App\\Http\\Controllers\\TableModelController@updateTable',
        'controller' => 'App\\Http\\Controllers\\TableModelController@updateTable',
        'as' => 'admin.updateTable',
        'namespace' => NULL,
        'prefix' => '/admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.showTable' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/show-table',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'adminLogin',
        ),
        'uses' => 'App\\Http\\Controllers\\TableModelController@showTable',
        'controller' => 'App\\Http\\Controllers\\TableModelController@showTable',
        'as' => 'admin.showTable',
        'namespace' => NULL,
        'prefix' => '/admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.generateTableQr' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/generate-table-qr/{table_no}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'adminLogin',
        ),
        'uses' => 'App\\Http\\Controllers\\TableModelController@generateTableQr',
        'controller' => 'App\\Http\\Controllers\\TableModelController@generateTableQr',
        'as' => 'admin.generateTableQr',
        'namespace' => NULL,
        'prefix' => '/admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.addBooking' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/add-booking',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'adminLogin',
        ),
        'uses' => 'App\\Http\\Controllers\\BookingController@addBooking',
        'controller' => 'App\\Http\\Controllers\\BookingController@addBooking',
        'as' => 'admin.addBooking',
        'namespace' => NULL,
        'prefix' => '/admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.saveBooking' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'admin/add-booking',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'adminLogin',
        ),
        'uses' => 'App\\Http\\Controllers\\BookingController@saveBooking',
        'controller' => 'App\\Http\\Controllers\\BookingController@saveBooking',
        'as' => 'admin.saveBooking',
        'namespace' => NULL,
        'prefix' => '/admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.editBooking' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/edit-booking/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'adminLogin',
        ),
        'uses' => 'App\\Http\\Controllers\\BookingController@editBooking',
        'controller' => 'App\\Http\\Controllers\\BookingController@editBooking',
        'as' => 'admin.editBooking',
        'namespace' => NULL,
        'prefix' => '/admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.updateBooking' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'admin/edit-booking/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'adminLogin',
        ),
        'uses' => 'App\\Http\\Controllers\\BookingController@updateBooking',
        'controller' => 'App\\Http\\Controllers\\BookingController@updateBooking',
        'as' => 'admin.updateBooking',
        'namespace' => NULL,
        'prefix' => '/admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.showBooking' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/show-booking',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'adminLogin',
        ),
        'uses' => 'App\\Http\\Controllers\\BookingController@showBooking',
        'controller' => 'App\\Http\\Controllers\\BookingController@showBooking',
        'as' => 'admin.showBooking',
        'namespace' => NULL,
        'prefix' => '/admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.cancelBooking' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'admin/cancel-booking',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'adminLogin',
        ),
        'uses' => 'App\\Http\\Controllers\\BookingController@cancelBooking',
        'controller' => 'App\\Http\\Controllers\\BookingController@cancelBooking',
        'as' => 'admin.cancelBooking',
        'namespace' => NULL,
        'prefix' => '/admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.addOrder' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/order',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'adminLogin',
        ),
        'uses' => 'App\\Http\\Controllers\\OrdersController@addOrder',
        'controller' => 'App\\Http\\Controllers\\OrdersController@addOrder',
        'as' => 'admin.addOrder',
        'namespace' => NULL,
        'prefix' => '/admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.saveOrder' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'admin/save-order',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'adminLogin',
        ),
        'uses' => 'App\\Http\\Controllers\\OrdersController@saveOrder',
        'controller' => 'App\\Http\\Controllers\\OrdersController@saveOrder',
        'as' => 'admin.saveOrder',
        'namespace' => NULL,
        'prefix' => '/admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.updateOrder' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'admin/update-order',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'adminLogin',
        ),
        'uses' => 'App\\Http\\Controllers\\OrdersController@updateOrder',
        'controller' => 'App\\Http\\Controllers\\OrdersController@updateOrder',
        'as' => 'admin.updateOrder',
        'namespace' => NULL,
        'prefix' => '/admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.orderCompleted' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'admin/save-and-settle',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'adminLogin',
        ),
        'uses' => 'App\\Http\\Controllers\\OrdersController@orderCompleted',
        'controller' => 'App\\Http\\Controllers\\OrdersController@orderCompleted',
        'as' => 'admin.orderCompleted',
        'namespace' => NULL,
        'prefix' => '/admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.getOrderDetails' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'admin/get-order-details',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'adminLogin',
        ),
        'uses' => 'App\\Http\\Controllers\\OrdersController@getOrderDetails',
        'controller' => 'App\\Http\\Controllers\\OrdersController@getOrderDetails',
        'as' => 'admin.getOrderDetails',
        'namespace' => NULL,
        'prefix' => '/admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.showOrderDetails' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/view-order-details',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'adminLogin',
        ),
        'uses' => 'App\\Http\\Controllers\\OrdersController@showOrderDetails',
        'controller' => 'App\\Http\\Controllers\\OrdersController@showOrderDetails',
        'as' => 'admin.showOrderDetails',
        'namespace' => NULL,
        'prefix' => '/admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.orderDetails' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/order-detail/{order_id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'adminLogin',
        ),
        'uses' => 'App\\Http\\Controllers\\OrdersController@orderDetails',
        'controller' => 'App\\Http\\Controllers\\OrdersController@orderDetails',
        'as' => 'admin.orderDetails',
        'namespace' => NULL,
        'prefix' => '/admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.updateOrderStatus' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'admin/order-details/{order_id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'adminLogin',
        ),
        'uses' => 'App\\Http\\Controllers\\OrdersController@updateOrderStatus',
        'controller' => 'App\\Http\\Controllers\\OrdersController@updateOrderStatus',
        'as' => 'admin.updateOrderStatus',
        'namespace' => NULL,
        'prefix' => '/admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.addCustomer' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'admin/add-customer',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'adminLogin',
        ),
        'uses' => 'App\\Http\\Controllers\\CustomersModelController@addCustomer',
        'controller' => 'App\\Http\\Controllers\\CustomersModelController@addCustomer',
        'as' => 'admin.addCustomer',
        'namespace' => NULL,
        'prefix' => '/admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.getCustomersData' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/view-customer-details',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'adminLogin',
        ),
        'uses' => 'App\\Http\\Controllers\\CustomersModelController@getCustomersData',
        'controller' => 'App\\Http\\Controllers\\CustomersModelController@getCustomersData',
        'as' => 'admin.getCustomersData',
        'namespace' => NULL,
        'prefix' => '/admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.exportCustomers' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/export-customer-data',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'adminLogin',
        ),
        'uses' => 'App\\Http\\Controllers\\CustomersModelController@exportCustomers',
        'controller' => 'App\\Http\\Controllers\\CustomersModelController@exportCustomers',
        'as' => 'admin.exportCustomers',
        'namespace' => NULL,
        'prefix' => '/admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.customerProfile' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/customer-profile/{customer_id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'adminLogin',
        ),
        'uses' => 'App\\Http\\Controllers\\CustomersModelController@customerProfile',
        'controller' => 'App\\Http\\Controllers\\CustomersModelController@customerProfile',
        'as' => 'admin.customerProfile',
        'namespace' => NULL,
        'prefix' => '/admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.addStaffIndex' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/add-staff',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'adminLogin',
        ),
        'uses' => 'App\\Http\\Controllers\\StaffController@addStaffIndex',
        'controller' => 'App\\Http\\Controllers\\StaffController@addStaffIndex',
        'as' => 'admin.addStaffIndex',
        'namespace' => NULL,
        'prefix' => '/admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.addStaffSave' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'admin/add-staff',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'adminLogin',
        ),
        'uses' => 'App\\Http\\Controllers\\StaffController@addStaffSave',
        'controller' => 'App\\Http\\Controllers\\StaffController@addStaffSave',
        'as' => 'admin.addStaffSave',
        'namespace' => NULL,
        'prefix' => '/admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.showStaffIndex' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/show-staff',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'adminLogin',
        ),
        'uses' => 'App\\Http\\Controllers\\StaffController@showStaffIndex',
        'controller' => 'App\\Http\\Controllers\\StaffController@showStaffIndex',
        'as' => 'admin.showStaffIndex',
        'namespace' => NULL,
        'prefix' => '/admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.editStaffIndex' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/edit-staff/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'adminLogin',
        ),
        'uses' => 'App\\Http\\Controllers\\StaffController@editStaffIndex',
        'controller' => 'App\\Http\\Controllers\\StaffController@editStaffIndex',
        'as' => 'admin.editStaffIndex',
        'namespace' => NULL,
        'prefix' => '/admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.updateStaffIndex' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'admin/edit-staff/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'adminLogin',
        ),
        'uses' => 'App\\Http\\Controllers\\StaffController@updateStaffIndex',
        'controller' => 'App\\Http\\Controllers\\StaffController@updateStaffIndex',
        'as' => 'admin.updateStaffIndex',
        'namespace' => NULL,
        'prefix' => '/admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.getStaffData' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/staff-datatable-data',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'adminLogin',
        ),
        'uses' => 'App\\Http\\Controllers\\StaffController@getStaffData',
        'controller' => 'App\\Http\\Controllers\\StaffController@getStaffData',
        'as' => 'admin.getStaffData',
        'namespace' => NULL,
        'prefix' => '/admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.staffExport' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/export-staff',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'adminLogin',
        ),
        'uses' => 'App\\Http\\Controllers\\StaffController@export',
        'controller' => 'App\\Http\\Controllers\\StaffController@export',
        'as' => 'admin.staffExport',
        'namespace' => NULL,
        'prefix' => '/admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.addAccountDetailsIndex' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/add-account-details',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'adminLogin',
        ),
        'uses' => 'App\\Http\\Controllers\\PayoutController@addAccountDetailsIndex',
        'controller' => 'App\\Http\\Controllers\\PayoutController@addAccountDetailsIndex',
        'as' => 'admin.addAccountDetailsIndex',
        'namespace' => NULL,
        'prefix' => '/admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.saveAccountDetails' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'admin/add-account-details',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'adminLogin',
        ),
        'uses' => 'App\\Http\\Controllers\\PayoutController@saveAccountDetails',
        'controller' => 'App\\Http\\Controllers\\PayoutController@saveAccountDetails',
        'as' => 'admin.saveAccountDetails',
        'namespace' => NULL,
        'prefix' => '/admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.accountDetailsIndex' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/show-staff-account-details',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'adminLogin',
        ),
        'uses' => 'App\\Http\\Controllers\\PayoutController@accountDetailsIndex',
        'controller' => 'App\\Http\\Controllers\\PayoutController@accountDetailsIndex',
        'as' => 'admin.accountDetailsIndex',
        'namespace' => NULL,
        'prefix' => '/admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.editAccountDetailsIndex' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/edit-staff-account-details/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'adminLogin',
        ),
        'uses' => 'App\\Http\\Controllers\\PayoutController@editAccountDetailsIndex',
        'controller' => 'App\\Http\\Controllers\\PayoutController@editAccountDetailsIndex',
        'as' => 'admin.editAccountDetailsIndex',
        'namespace' => NULL,
        'prefix' => '/admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.updateAccountDetailsIndex' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'admin/edit-staff-account-details/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'adminLogin',
        ),
        'uses' => 'App\\Http\\Controllers\\PayoutController@updateAccountDetailsIndex',
        'controller' => 'App\\Http\\Controllers\\PayoutController@updateAccountDetailsIndex',
        'as' => 'admin.updateAccountDetailsIndex',
        'namespace' => NULL,
        'prefix' => '/admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.staffAccountDetailsExport' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/export-staff-account-details',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'adminLogin',
        ),
        'uses' => 'App\\Http\\Controllers\\PayoutController@staffAccountDetailsExport',
        'controller' => 'App\\Http\\Controllers\\PayoutController@staffAccountDetailsExport',
        'as' => 'admin.staffAccountDetailsExport',
        'namespace' => NULL,
        'prefix' => '/admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.getStaffAccountDetails' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/staff-account-details-datatable-data',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'adminLogin',
        ),
        'uses' => 'App\\Http\\Controllers\\PayoutController@getStaffAccountDetails',
        'controller' => 'App\\Http\\Controllers\\PayoutController@getStaffAccountDetails',
        'as' => 'admin.getStaffAccountDetails',
        'namespace' => NULL,
        'prefix' => '/admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.defineSalaryIndex' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/define-salary',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'adminLogin',
        ),
        'uses' => 'App\\Http\\Controllers\\PayoutController@defineSalaryIndex',
        'controller' => 'App\\Http\\Controllers\\PayoutController@defineSalaryIndex',
        'as' => 'admin.defineSalaryIndex',
        'namespace' => NULL,
        'prefix' => '/admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.saveDefineSalary' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'admin/define-salary',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'adminLogin',
        ),
        'uses' => 'App\\Http\\Controllers\\PayoutController@saveDefineSalary',
        'controller' => 'App\\Http\\Controllers\\PayoutController@saveDefineSalary',
        'as' => 'admin.saveDefineSalary',
        'namespace' => NULL,
        'prefix' => '/admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.showDefineSalaryIndex' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/show-define-salary',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'adminLogin',
        ),
        'uses' => 'App\\Http\\Controllers\\PayoutController@showDefineSalaryIndex',
        'controller' => 'App\\Http\\Controllers\\PayoutController@showDefineSalaryIndex',
        'as' => 'admin.showDefineSalaryIndex',
        'namespace' => NULL,
        'prefix' => '/admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.editDefineSalaryIndex' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/edit-define-salary/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'adminLogin',
        ),
        'uses' => 'App\\Http\\Controllers\\PayoutController@editDefineSalaryIndex',
        'controller' => 'App\\Http\\Controllers\\PayoutController@editDefineSalaryIndex',
        'as' => 'admin.editDefineSalaryIndex',
        'namespace' => NULL,
        'prefix' => '/admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.updateDefineSalary' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'admin/edit-define-salary/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'adminLogin',
        ),
        'uses' => 'App\\Http\\Controllers\\PayoutController@updateDefineSalary',
        'controller' => 'App\\Http\\Controllers\\PayoutController@updateDefineSalary',
        'as' => 'admin.updateDefineSalary',
        'namespace' => NULL,
        'prefix' => '/admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.getDefineSalary' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/show-define-salary-datatable-data',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'adminLogin',
        ),
        'uses' => 'App\\Http\\Controllers\\PayoutController@getDefineSalary',
        'controller' => 'App\\Http\\Controllers\\PayoutController@getDefineSalary',
        'as' => 'admin.getDefineSalary',
        'namespace' => NULL,
        'prefix' => '/admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.exportDefineSalary' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/export-define-salary',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'adminLogin',
        ),
        'uses' => 'App\\Http\\Controllers\\PayoutController@exportDefineSalary',
        'controller' => 'App\\Http\\Controllers\\PayoutController@exportDefineSalary',
        'as' => 'admin.exportDefineSalary',
        'namespace' => NULL,
        'prefix' => '/admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.addSalaryIncrementIndex' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/add-salary-increment',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'adminLogin',
        ),
        'uses' => 'App\\Http\\Controllers\\PayoutController@addSalaryIncrementIndex',
        'controller' => 'App\\Http\\Controllers\\PayoutController@addSalaryIncrementIndex',
        'as' => 'admin.addSalaryIncrementIndex',
        'namespace' => NULL,
        'prefix' => '/admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.saveSalaryIncrement' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'admin/add-salary-increment',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'adminLogin',
        ),
        'uses' => 'App\\Http\\Controllers\\PayoutController@saveSalaryIncrement',
        'controller' => 'App\\Http\\Controllers\\PayoutController@saveSalaryIncrement',
        'as' => 'admin.saveSalaryIncrement',
        'namespace' => NULL,
        'prefix' => '/admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.showSalaryIncrement' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/show-salary-increment',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'adminLogin',
        ),
        'uses' => 'App\\Http\\Controllers\\PayoutController@showSalaryIncrement',
        'controller' => 'App\\Http\\Controllers\\PayoutController@showSalaryIncrement',
        'as' => 'admin.showSalaryIncrement',
        'namespace' => NULL,
        'prefix' => '/admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.editSalaryIncrement' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/edit-salary-increment/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'adminLogin',
        ),
        'uses' => 'App\\Http\\Controllers\\PayoutController@editSalaryIncrement',
        'controller' => 'App\\Http\\Controllers\\PayoutController@editSalaryIncrement',
        'as' => 'admin.editSalaryIncrement',
        'namespace' => NULL,
        'prefix' => '/admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.updateSalaryIncrement' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'admin/edit-salary-increment/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'adminLogin',
        ),
        'uses' => 'App\\Http\\Controllers\\PayoutController@updateSalaryIncrement',
        'controller' => 'App\\Http\\Controllers\\PayoutController@updateSalaryIncrement',
        'as' => 'admin.updateSalaryIncrement',
        'namespace' => NULL,
        'prefix' => '/admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.getSalaryIncrementData' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/show-incremented-salary-datatable-data',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'adminLogin',
        ),
        'uses' => 'App\\Http\\Controllers\\PayoutController@getSalaryIncrementData',
        'controller' => 'App\\Http\\Controllers\\PayoutController@getSalaryIncrementData',
        'as' => 'admin.getSalaryIncrementData',
        'namespace' => NULL,
        'prefix' => '/admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.exportSalaryIncrementData' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/export-salary-increment',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'adminLogin',
        ),
        'uses' => 'App\\Http\\Controllers\\PayoutController@exportSalaryIncrementData',
        'controller' => 'App\\Http\\Controllers\\PayoutController@exportSalaryIncrementData',
        'as' => 'admin.exportSalaryIncrementData',
        'namespace' => NULL,
        'prefix' => '/admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.createPayment' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/create-payment',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'adminLogin',
        ),
        'uses' => 'App\\Http\\Controllers\\CreatePaymentController@createPayment',
        'controller' => 'App\\Http\\Controllers\\CreatePaymentController@createPayment',
        'as' => 'admin.createPayment',
        'namespace' => NULL,
        'prefix' => '/admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.saveCreatePayment' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'admin/create-payment',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'adminLogin',
        ),
        'uses' => 'App\\Http\\Controllers\\CreatePaymentController@saveCreatePayment',
        'controller' => 'App\\Http\\Controllers\\CreatePaymentController@saveCreatePayment',
        'as' => 'admin.saveCreatePayment',
        'namespace' => NULL,
        'prefix' => '/admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.editCreatePayment' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/edit-created-payment/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'adminLogin',
        ),
        'uses' => 'App\\Http\\Controllers\\CreatePaymentController@editCreatePayment',
        'controller' => 'App\\Http\\Controllers\\CreatePaymentController@editCreatePayment',
        'as' => 'admin.editCreatePayment',
        'namespace' => NULL,
        'prefix' => '/admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.updateCreatePayment' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'admin/edit-created-payment/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'adminLogin',
        ),
        'uses' => 'App\\Http\\Controllers\\CreatePaymentController@updateCreatePayment',
        'controller' => 'App\\Http\\Controllers\\CreatePaymentController@updateCreatePayment',
        'as' => 'admin.updateCreatePayment',
        'namespace' => NULL,
        'prefix' => '/admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.showCreatedPayment' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/show-created-payment',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'adminLogin',
        ),
        'uses' => 'App\\Http\\Controllers\\CreatePaymentController@showCreatedPayment',
        'controller' => 'App\\Http\\Controllers\\CreatePaymentController@showCreatedPayment',
        'as' => 'admin.showCreatedPayment',
        'namespace' => NULL,
        'prefix' => '/admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.getCreatedPayment' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/get-created-payment-datatable',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'adminLogin',
        ),
        'uses' => 'App\\Http\\Controllers\\CreatePaymentController@getCreatedPayment',
        'controller' => 'App\\Http\\Controllers\\CreatePaymentController@getCreatedPayment',
        'as' => 'admin.getCreatedPayment',
        'namespace' => NULL,
        'prefix' => '/admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.exportCreatedPayment' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/export-created-payment',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'adminLogin',
        ),
        'uses' => 'App\\Http\\Controllers\\CreatePaymentController@exportCreatedPayment',
        'controller' => 'App\\Http\\Controllers\\CreatePaymentController@exportCreatedPayment',
        'as' => 'admin.exportCreatedPayment',
        'namespace' => NULL,
        'prefix' => '/admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.releasePaymentIndex' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/release-payment/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'adminLogin',
        ),
        'uses' => 'App\\Http\\Controllers\\ReleasePaymentController@releasePaymentIndex',
        'controller' => 'App\\Http\\Controllers\\ReleasePaymentController@releasePaymentIndex',
        'as' => 'admin.releasePaymentIndex',
        'namespace' => NULL,
        'prefix' => '/admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.saveReleasePayment' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'admin/release-payment/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'adminLogin',
        ),
        'uses' => 'App\\Http\\Controllers\\ReleasePaymentController@saveReleasePayment',
        'controller' => 'App\\Http\\Controllers\\ReleasePaymentController@saveReleasePayment',
        'as' => 'admin.saveReleasePayment',
        'namespace' => NULL,
        'prefix' => '/admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.showReleasedPayment' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/show-release-payment',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'adminLogin',
        ),
        'uses' => 'App\\Http\\Controllers\\ReleasePaymentController@showReleasedPayment',
        'controller' => 'App\\Http\\Controllers\\ReleasePaymentController@showReleasedPayment',
        'as' => 'admin.showReleasedPayment',
        'namespace' => NULL,
        'prefix' => '/admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.editReleasePayment' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/edit-release-payment/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'adminLogin',
        ),
        'uses' => 'App\\Http\\Controllers\\ReleasePaymentController@editReleasePayment',
        'controller' => 'App\\Http\\Controllers\\ReleasePaymentController@editReleasePayment',
        'as' => 'admin.editReleasePayment',
        'namespace' => NULL,
        'prefix' => '/admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.updateReleasePayment' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'admin/edit-release-payment/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'adminLogin',
        ),
        'uses' => 'App\\Http\\Controllers\\ReleasePaymentController@updateReleasePayment',
        'controller' => 'App\\Http\\Controllers\\ReleasePaymentController@updateReleasePayment',
        'as' => 'admin.updateReleasePayment',
        'namespace' => NULL,
        'prefix' => '/admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.getReleasePayment' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/get-released-payment-datatable',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'adminLogin',
        ),
        'uses' => 'App\\Http\\Controllers\\ReleasePaymentController@getReleasePayment',
        'controller' => 'App\\Http\\Controllers\\ReleasePaymentController@getReleasePayment',
        'as' => 'admin.getReleasePayment',
        'namespace' => NULL,
        'prefix' => '/admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.exportReleasePayment' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/export-released-payment',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'adminLogin',
        ),
        'uses' => 'App\\Http\\Controllers\\ReleasePaymentController@exportReleasePayment',
        'controller' => 'App\\Http\\Controllers\\ReleasePaymentController@exportReleasePayment',
        'as' => 'admin.exportReleasePayment',
        'namespace' => NULL,
        'prefix' => '/admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.addAdvancePaymentIndex' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/add-advance-payment',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'adminLogin',
        ),
        'uses' => 'App\\Http\\Controllers\\AdvancePaymentController@addAdvancePaymentIndex',
        'controller' => 'App\\Http\\Controllers\\AdvancePaymentController@addAdvancePaymentIndex',
        'as' => 'admin.addAdvancePaymentIndex',
        'namespace' => NULL,
        'prefix' => '/admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.saveAdvancePayment' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'admin/add-advance-payment',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'adminLogin',
        ),
        'uses' => 'App\\Http\\Controllers\\AdvancePaymentController@saveAdvancePayment',
        'controller' => 'App\\Http\\Controllers\\AdvancePaymentController@saveAdvancePayment',
        'as' => 'admin.saveAdvancePayment',
        'namespace' => NULL,
        'prefix' => '/admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.editAdvancePaymentIndex' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/edit-advance-payment/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'adminLogin',
        ),
        'uses' => 'App\\Http\\Controllers\\AdvancePaymentController@editAdvancePaymentIndex',
        'controller' => 'App\\Http\\Controllers\\AdvancePaymentController@editAdvancePaymentIndex',
        'as' => 'admin.editAdvancePaymentIndex',
        'namespace' => NULL,
        'prefix' => '/admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.updateAdvancePayment' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'admin/edit-advance-payment/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'adminLogin',
        ),
        'uses' => 'App\\Http\\Controllers\\AdvancePaymentController@updateAdvancePayment',
        'controller' => 'App\\Http\\Controllers\\AdvancePaymentController@updateAdvancePayment',
        'as' => 'admin.updateAdvancePayment',
        'namespace' => NULL,
        'prefix' => '/admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.showAdvancePaymentIndex' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/show-advance-payment',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'adminLogin',
        ),
        'uses' => 'App\\Http\\Controllers\\AdvancePaymentController@showAdvancePaymentIndex',
        'controller' => 'App\\Http\\Controllers\\AdvancePaymentController@showAdvancePaymentIndex',
        'as' => 'admin.showAdvancePaymentIndex',
        'namespace' => NULL,
        'prefix' => '/admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.getAdvancePaymentData' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/show-advance-payment-datatable-data',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'adminLogin',
        ),
        'uses' => 'App\\Http\\Controllers\\AdvancePaymentController@getAdvancePaymentData',
        'controller' => 'App\\Http\\Controllers\\AdvancePaymentController@getAdvancePaymentData',
        'as' => 'admin.getAdvancePaymentData',
        'namespace' => NULL,
        'prefix' => '/admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.exportAdvancePaymentData' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/export-advance-payment',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'adminLogin',
        ),
        'uses' => 'App\\Http\\Controllers\\AdvancePaymentController@exportAdvancePaymentData',
        'controller' => 'App\\Http\\Controllers\\AdvancePaymentController@exportAdvancePaymentData',
        'as' => 'admin.exportAdvancePaymentData',
        'namespace' => NULL,
        'prefix' => '/admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.addLeave' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/add-leave',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'adminLogin',
        ),
        'uses' => 'App\\Http\\Controllers\\LeaveController@addLeave',
        'controller' => 'App\\Http\\Controllers\\LeaveController@addLeave',
        'as' => 'admin.addLeave',
        'namespace' => NULL,
        'prefix' => '/admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.saveLeave' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'admin/add-leave',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'adminLogin',
        ),
        'uses' => 'App\\Http\\Controllers\\LeaveController@saveLeave',
        'controller' => 'App\\Http\\Controllers\\LeaveController@saveLeave',
        'as' => 'admin.saveLeave',
        'namespace' => NULL,
        'prefix' => '/admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.editLeave' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/edit-leave/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'adminLogin',
        ),
        'uses' => 'App\\Http\\Controllers\\LeaveController@editLeave',
        'controller' => 'App\\Http\\Controllers\\LeaveController@editLeave',
        'as' => 'admin.editLeave',
        'namespace' => NULL,
        'prefix' => '/admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.updateLeave' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'admin/edit-leave/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'adminLogin',
        ),
        'uses' => 'App\\Http\\Controllers\\LeaveController@updateLeave',
        'controller' => 'App\\Http\\Controllers\\LeaveController@updateLeave',
        'as' => 'admin.updateLeave',
        'namespace' => NULL,
        'prefix' => '/admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.showAllLeave' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/show-leave',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'adminLogin',
        ),
        'uses' => 'App\\Http\\Controllers\\LeaveController@showAllLeave',
        'controller' => 'App\\Http\\Controllers\\LeaveController@showAllLeave',
        'as' => 'admin.showAllLeave',
        'namespace' => NULL,
        'prefix' => '/admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.showPendingLeave' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/show-pending-leave',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'adminLogin',
        ),
        'uses' => 'App\\Http\\Controllers\\LeaveController@showPendingLeave',
        'controller' => 'App\\Http\\Controllers\\LeaveController@showPendingLeave',
        'as' => 'admin.showPendingLeave',
        'namespace' => NULL,
        'prefix' => '/admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.getLeaveData' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/get-leave-datatable',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'adminLogin',
        ),
        'uses' => 'App\\Http\\Controllers\\LeaveController@getLeaveData',
        'controller' => 'App\\Http\\Controllers\\LeaveController@getLeaveData',
        'as' => 'admin.getLeaveData',
        'namespace' => NULL,
        'prefix' => '/admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.exportLeaveData' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/export-leave-datatable',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'adminLogin',
        ),
        'uses' => 'App\\Http\\Controllers\\LeaveController@exportLeaveData',
        'controller' => 'App\\Http\\Controllers\\LeaveController@exportLeaveData',
        'as' => 'admin.exportLeaveData',
        'namespace' => NULL,
        'prefix' => '/admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.addUsers' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/add-users',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'adminLogin',
        ),
        'uses' => 'App\\Http\\Controllers\\UserAccessController@addUsers',
        'controller' => 'App\\Http\\Controllers\\UserAccessController@addUsers',
        'as' => 'admin.addUsers',
        'namespace' => NULL,
        'prefix' => '/admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.saveUsers' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'admin/add-users',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'adminLogin',
        ),
        'uses' => 'App\\Http\\Controllers\\UserAccessController@saveUsers',
        'controller' => 'App\\Http\\Controllers\\UserAccessController@saveUsers',
        'as' => 'admin.saveUsers',
        'namespace' => NULL,
        'prefix' => '/admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.editUsers' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/edit-users/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'adminLogin',
        ),
        'uses' => 'App\\Http\\Controllers\\UserAccessController@editUsers',
        'controller' => 'App\\Http\\Controllers\\UserAccessController@editUsers',
        'as' => 'admin.editUsers',
        'namespace' => NULL,
        'prefix' => '/admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.updateUsers' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'admin/edit-users/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'adminLogin',
        ),
        'uses' => 'App\\Http\\Controllers\\UserAccessController@updateUsers',
        'controller' => 'App\\Http\\Controllers\\UserAccessController@updateUsers',
        'as' => 'admin.updateUsers',
        'namespace' => NULL,
        'prefix' => '/admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.showUsers' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/show-users',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'adminLogin',
        ),
        'uses' => 'App\\Http\\Controllers\\UserAccessController@showUsers',
        'controller' => 'App\\Http\\Controllers\\UserAccessController@showUsers',
        'as' => 'admin.showUsers',
        'namespace' => NULL,
        'prefix' => '/admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.getUsersData' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/get-users-datatable-data',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'adminLogin',
        ),
        'uses' => 'App\\Http\\Controllers\\UserAccessController@getUsersData',
        'controller' => 'App\\Http\\Controllers\\UserAccessController@getUsersData',
        'as' => 'admin.getUsersData',
        'namespace' => NULL,
        'prefix' => '/admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.addAttendance' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/add-attendance',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'adminLogin',
        ),
        'uses' => 'App\\Http\\Controllers\\AttendanceController@addAttendance',
        'controller' => 'App\\Http\\Controllers\\AttendanceController@addAttendance',
        'as' => 'admin.addAttendance',
        'namespace' => NULL,
        'prefix' => '/admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.saveAttendance' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'admin/add-attendance',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'adminLogin',
        ),
        'uses' => 'App\\Http\\Controllers\\AttendanceController@saveAttendance',
        'controller' => 'App\\Http\\Controllers\\AttendanceController@saveAttendance',
        'as' => 'admin.saveAttendance',
        'namespace' => NULL,
        'prefix' => '/admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.editAttendance' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/edit-attendance/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'adminLogin',
        ),
        'uses' => 'App\\Http\\Controllers\\AttendanceController@editAttendance',
        'controller' => 'App\\Http\\Controllers\\AttendanceController@editAttendance',
        'as' => 'admin.editAttendance',
        'namespace' => NULL,
        'prefix' => '/admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.updateAttendance' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'admin/edit-attendance/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'adminLogin',
        ),
        'uses' => 'App\\Http\\Controllers\\AttendanceController@updateAttendance',
        'controller' => 'App\\Http\\Controllers\\AttendanceController@updateAttendance',
        'as' => 'admin.updateAttendance',
        'namespace' => NULL,
        'prefix' => '/admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.showAttendance' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/show-attendance',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'adminLogin',
        ),
        'uses' => 'App\\Http\\Controllers\\AttendanceController@showAttendance',
        'controller' => 'App\\Http\\Controllers\\AttendanceController@showAttendance',
        'as' => 'admin.showAttendance',
        'namespace' => NULL,
        'prefix' => '/admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.getAttendanceData' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/get-attendance-datatable',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'adminLogin',
        ),
        'uses' => 'App\\Http\\Controllers\\AttendanceController@getAttendanceData',
        'controller' => 'App\\Http\\Controllers\\AttendanceController@getAttendanceData',
        'as' => 'admin.getAttendanceData',
        'namespace' => NULL,
        'prefix' => '/admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.exportAttendanceData' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/export-attendance',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'adminLogin',
        ),
        'uses' => 'App\\Http\\Controllers\\AttendanceController@exportAttendanceData',
        'controller' => 'App\\Http\\Controllers\\AttendanceController@exportAttendanceData',
        'as' => 'admin.exportAttendanceData',
        'namespace' => NULL,
        'prefix' => '/admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.staffProfile' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/staff-profile/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'adminLogin',
        ),
        'uses' => 'App\\Http\\Controllers\\StaffProfileController@staffProfile',
        'controller' => 'App\\Http\\Controllers\\StaffProfileController@staffProfile',
        'as' => 'admin.staffProfile',
        'namespace' => NULL,
        'prefix' => '/admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.getStaffProfileAttendance' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/staff-profile-get-attendance',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'adminLogin',
        ),
        'uses' => 'App\\Http\\Controllers\\StaffProfileController@getStaffProfileAttendance',
        'controller' => 'App\\Http\\Controllers\\StaffProfileController@getStaffProfileAttendance',
        'as' => 'admin.getStaffProfileAttendance',
        'namespace' => NULL,
        'prefix' => '/admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.getStaffProfileleave' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/staff-profile-get-leave',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'adminLogin',
        ),
        'uses' => 'App\\Http\\Controllers\\StaffProfileController@getStaffProfileleave',
        'controller' => 'App\\Http\\Controllers\\StaffProfileController@getStaffProfileleave',
        'as' => 'admin.getStaffProfileleave',
        'namespace' => NULL,
        'prefix' => '/admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.getStaffProfileworksheet' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/staff-profile-get-worksheet',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'adminLogin',
        ),
        'uses' => 'App\\Http\\Controllers\\StaffProfileController@getStaffProfileworksheet',
        'controller' => 'App\\Http\\Controllers\\StaffProfileController@getStaffProfileworksheet',
        'as' => 'admin.getStaffProfileworksheet',
        'namespace' => NULL,
        'prefix' => '/admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.getStaffProfilepayout' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/staff-profile-get-payout',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'adminLogin',
        ),
        'uses' => 'App\\Http\\Controllers\\StaffProfileController@getStaffProfilepayout',
        'controller' => 'App\\Http\\Controllers\\StaffProfileController@getStaffProfilepayout',
        'as' => 'admin.getStaffProfilepayout',
        'namespace' => NULL,
        'prefix' => '/admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.loyaltySetup' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/loyalty-setup',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'adminLogin',
        ),
        'uses' => 'App\\Http\\Controllers\\LoyaltyModelController@loyaltySetup',
        'controller' => 'App\\Http\\Controllers\\LoyaltyModelController@loyaltySetup',
        'as' => 'admin.loyaltySetup',
        'namespace' => NULL,
        'prefix' => '/admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.saveLoyaltySetup' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'admin/loyalty-setup',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'adminLogin',
        ),
        'uses' => 'App\\Http\\Controllers\\LoyaltyModelController@saveLoyaltySetup',
        'controller' => 'App\\Http\\Controllers\\LoyaltyModelController@saveLoyaltySetup',
        'as' => 'admin.saveLoyaltySetup',
        'namespace' => NULL,
        'prefix' => '/admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.editLoyaltySetup' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/edit-loyalty-setup/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'adminLogin',
        ),
        'uses' => 'App\\Http\\Controllers\\LoyaltyModelController@editLoyaltySetup',
        'controller' => 'App\\Http\\Controllers\\LoyaltyModelController@editLoyaltySetup',
        'as' => 'admin.editLoyaltySetup',
        'namespace' => NULL,
        'prefix' => '/admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.updateLoyaltySetup' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'admin/edit-loyalty-setup/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'adminLogin',
        ),
        'uses' => 'App\\Http\\Controllers\\LoyaltyModelController@updateLoyaltySetup',
        'controller' => 'App\\Http\\Controllers\\LoyaltyModelController@updateLoyaltySetup',
        'as' => 'admin.updateLoyaltySetup',
        'namespace' => NULL,
        'prefix' => '/admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.showLoyaltySetup' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/show-loyalty',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'adminLogin',
        ),
        'uses' => 'App\\Http\\Controllers\\LoyaltyModelController@showLoyaltySetup',
        'controller' => 'App\\Http\\Controllers\\LoyaltyModelController@showLoyaltySetup',
        'as' => 'admin.showLoyaltySetup',
        'namespace' => NULL,
        'prefix' => '/admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.getLoyaltySetup' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/get-loyalty',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'adminLogin',
        ),
        'uses' => 'App\\Http\\Controllers\\LoyaltyModelController@getLoyaltySetup',
        'controller' => 'App\\Http\\Controllers\\LoyaltyModelController@getLoyaltySetup',
        'as' => 'admin.getLoyaltySetup',
        'namespace' => NULL,
        'prefix' => '/admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.saveLoyaltyPoint' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'admin/save-customer-loyalty-point',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'adminLogin',
        ),
        'uses' => 'App\\Http\\Controllers\\CustomerLoyaltyPointsModelController@saveLoyaltyPoint',
        'controller' => 'App\\Http\\Controllers\\CustomerLoyaltyPointsModelController@saveLoyaltyPoint',
        'as' => 'admin.saveLoyaltyPoint',
        'namespace' => NULL,
        'prefix' => '/admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.settings' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/settings',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'adminLogin',
        ),
        'uses' => 'App\\Http\\Controllers\\SettingModelController@settings',
        'controller' => 'App\\Http\\Controllers\\SettingModelController@settings',
        'as' => 'admin.settings',
        'namespace' => NULL,
        'prefix' => '/admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.saveSettings' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'admin/save-settings',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'adminLogin',
        ),
        'uses' => 'App\\Http\\Controllers\\SettingModelController@saveSettings',
        'controller' => 'App\\Http\\Controllers\\SettingModelController@saveSettings',
        'as' => 'admin.saveSettings',
        'namespace' => NULL,
        'prefix' => '/admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'staff.indexView' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'staff/dashboard',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'staffLogin',
        ),
        'uses' => 'App\\Http\\Controllers\\StaffIndexController@index',
        'controller' => 'App\\Http\\Controllers\\StaffIndexController@index',
        'as' => 'staff.indexView',
        'namespace' => NULL,
        'prefix' => '/staff',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'staff.logout' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'staff/logout',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'staffLogin',
        ),
        'uses' => 'App\\Http\\Controllers\\StaffIndexController@logout',
        'controller' => 'App\\Http\\Controllers\\StaffIndexController@logout',
        'as' => 'staff.logout',
        'namespace' => NULL,
        'prefix' => '/staff',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'staff.addAttendance' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'staff/add-attendance',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'staffLogin',
        ),
        'uses' => 'App\\Http\\Controllers\\StaffAttendanceController@addAttendance',
        'controller' => 'App\\Http\\Controllers\\StaffAttendanceController@addAttendance',
        'as' => 'staff.addAttendance',
        'namespace' => NULL,
        'prefix' => '/staff',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'staff.saveAttendance' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'staff/add-attendance',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'staffLogin',
        ),
        'uses' => 'App\\Http\\Controllers\\StaffAttendanceController@saveAttendance',
        'controller' => 'App\\Http\\Controllers\\StaffAttendanceController@saveAttendance',
        'as' => 'staff.saveAttendance',
        'namespace' => NULL,
        'prefix' => '/staff',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'staff.showAttendance' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'staff/show-attendance',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'staffLogin',
        ),
        'uses' => 'App\\Http\\Controllers\\StaffAttendanceController@showAttendance',
        'controller' => 'App\\Http\\Controllers\\StaffAttendanceController@showAttendance',
        'as' => 'staff.showAttendance',
        'namespace' => NULL,
        'prefix' => '/staff',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'staff.editAttendance' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'staff/edit-attendance/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'staffLogin',
        ),
        'uses' => 'App\\Http\\Controllers\\StaffAttendanceController@editAttendance',
        'controller' => 'App\\Http\\Controllers\\StaffAttendanceController@editAttendance',
        'as' => 'staff.editAttendance',
        'namespace' => NULL,
        'prefix' => '/staff',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'staff.updateAttendance' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'staff/edit-attendance/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'staffLogin',
        ),
        'uses' => 'App\\Http\\Controllers\\StaffAttendanceController@updateAttendance',
        'controller' => 'App\\Http\\Controllers\\StaffAttendanceController@updateAttendance',
        'as' => 'staff.updateAttendance',
        'namespace' => NULL,
        'prefix' => '/staff',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'staff.getAttendanceData' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'staff/get-attendance-datatable',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'staffLogin',
        ),
        'uses' => 'App\\Http\\Controllers\\StaffAttendanceController@getAttendanceData',
        'controller' => 'App\\Http\\Controllers\\StaffAttendanceController@getAttendanceData',
        'as' => 'staff.getAttendanceData',
        'namespace' => NULL,
        'prefix' => '/staff',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'staff.leaveRequest' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'staff/leave-request',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'staffLogin',
        ),
        'uses' => 'App\\Http\\Controllers\\StaffLeaveController@leaveRequest',
        'controller' => 'App\\Http\\Controllers\\StaffLeaveController@leaveRequest',
        'as' => 'staff.leaveRequest',
        'namespace' => NULL,
        'prefix' => '/staff',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'staff.saveLeaveRequest' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'staff/leave-request',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'staffLogin',
        ),
        'uses' => 'App\\Http\\Controllers\\StaffLeaveController@saveLeaveRequest',
        'controller' => 'App\\Http\\Controllers\\StaffLeaveController@saveLeaveRequest',
        'as' => 'staff.saveLeaveRequest',
        'namespace' => NULL,
        'prefix' => '/staff',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'staff.editLeaveRequest' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'staff/edit-leave-request/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'staffLogin',
        ),
        'uses' => 'App\\Http\\Controllers\\StaffLeaveController@editLeaveRequest',
        'controller' => 'App\\Http\\Controllers\\StaffLeaveController@editLeaveRequest',
        'as' => 'staff.editLeaveRequest',
        'namespace' => NULL,
        'prefix' => '/staff',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'staff.updateLeaveRequest' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'staff/edit-leave-request/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'staffLogin',
        ),
        'uses' => 'App\\Http\\Controllers\\StaffLeaveController@updateLeaveRequest',
        'controller' => 'App\\Http\\Controllers\\StaffLeaveController@updateLeaveRequest',
        'as' => 'staff.updateLeaveRequest',
        'namespace' => NULL,
        'prefix' => '/staff',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'staff.showLeaveRequest' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'staff/show-leave-request',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'staffLogin',
        ),
        'uses' => 'App\\Http\\Controllers\\StaffLeaveController@showLeaveRequest',
        'controller' => 'App\\Http\\Controllers\\StaffLeaveController@showLeaveRequest',
        'as' => 'staff.showLeaveRequest',
        'namespace' => NULL,
        'prefix' => '/staff',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'staff.getLeaveRequest' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'staff/get-leave-request-datatable',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'staffLogin',
        ),
        'uses' => 'App\\Http\\Controllers\\StaffLeaveController@getLeaveRequest',
        'controller' => 'App\\Http\\Controllers\\StaffLeaveController@getLeaveRequest',
        'as' => 'staff.getLeaveRequest',
        'namespace' => NULL,
        'prefix' => '/staff',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'staff.accountDetails' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'staff/account-details',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'staffLogin',
        ),
        'uses' => 'App\\Http\\Controllers\\StaffPaymentController@accountDetails',
        'controller' => 'App\\Http\\Controllers\\StaffPaymentController@accountDetails',
        'as' => 'staff.accountDetails',
        'namespace' => NULL,
        'prefix' => '/staff',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'staff.incrementedPaymentDetails' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'staff/incrementd-payment-details',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'staffLogin',
        ),
        'uses' => 'App\\Http\\Controllers\\StaffPaymentController@incrementedPaymentDetails',
        'controller' => 'App\\Http\\Controllers\\StaffPaymentController@incrementedPaymentDetails',
        'as' => 'staff.incrementedPaymentDetails',
        'namespace' => NULL,
        'prefix' => '/staff',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'staff.advancePaymentDetails' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'staff/advance-payment-details',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'staffLogin',
        ),
        'uses' => 'App\\Http\\Controllers\\StaffPaymentController@advancePaymentDetails',
        'controller' => 'App\\Http\\Controllers\\StaffPaymentController@advancePaymentDetails',
        'as' => 'staff.advancePaymentDetails',
        'namespace' => NULL,
        'prefix' => '/staff',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'staff.receivedPaymentDetails' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'staff/received-payment-details',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'staffLogin',
        ),
        'uses' => 'App\\Http\\Controllers\\StaffPaymentController@receivedPaymentDetails',
        'controller' => 'App\\Http\\Controllers\\StaffPaymentController@receivedPaymentDetails',
        'as' => 'staff.receivedPaymentDetails',
        'namespace' => NULL,
        'prefix' => '/staff',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'staff.profile' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'staff/profile/{uid}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'staffLogin',
        ),
        'uses' => 'App\\Http\\Controllers\\StaffPanelProfileController@profile',
        'controller' => 'App\\Http\\Controllers\\StaffPanelProfileController@profile',
        'as' => 'staff.profile',
        'namespace' => NULL,
        'prefix' => '/staff',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'staff.allOrder' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'staff/show-orders',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'staffLogin',
        ),
        'uses' => 'App\\Http\\Controllers\\StaffOrderDetails@allOrder',
        'controller' => 'App\\Http\\Controllers\\StaffOrderDetails@allOrder',
        'as' => 'staff.allOrder',
        'namespace' => NULL,
        'prefix' => '/staff',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'staff.orderDetails' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'staff/order-detail/{order_id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'staffLogin',
        ),
        'uses' => 'App\\Http\\Controllers\\StaffOrderDetails@orderDetails',
        'controller' => 'App\\Http\\Controllers\\StaffOrderDetails@orderDetails',
        'as' => 'staff.orderDetails',
        'namespace' => NULL,
        'prefix' => '/staff',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'reception.indexView' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'reception/dashboard',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'receptionLogin',
        ),
        'uses' => 'App\\Http\\Controllers\\ReceptionDashboardController@index',
        'controller' => 'App\\Http\\Controllers\\ReceptionDashboardController@index',
        'as' => 'reception.indexView',
        'namespace' => NULL,
        'prefix' => '/reception',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'reception.logout' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'reception/logout',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'receptionLogin',
        ),
        'uses' => 'App\\Http\\Controllers\\ReceptionDashboardController@logout',
        'controller' => 'App\\Http\\Controllers\\ReceptionDashboardController@logout',
        'as' => 'reception.logout',
        'namespace' => NULL,
        'prefix' => '/reception',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'reception.addInquiryIndex' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'reception/add-inquiry',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'receptionLogin',
        ),
        'uses' => 'App\\Http\\Controllers\\InquiryController@addInquiryIndex',
        'controller' => 'App\\Http\\Controllers\\InquiryController@addInquiryIndex',
        'as' => 'reception.addInquiryIndex',
        'namespace' => NULL,
        'prefix' => '/reception',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'reception.saveInquiry' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'reception/add-inquiry',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'receptionLogin',
        ),
        'uses' => 'App\\Http\\Controllers\\InquiryController@saveInquiry',
        'controller' => 'App\\Http\\Controllers\\InquiryController@saveInquiry',
        'as' => 'reception.saveInquiry',
        'namespace' => NULL,
        'prefix' => '/reception',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'reception.editInquiryIndex' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'reception/edit-inquiry/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'receptionLogin',
        ),
        'uses' => 'App\\Http\\Controllers\\InquiryController@editInquiryIndex',
        'controller' => 'App\\Http\\Controllers\\InquiryController@editInquiryIndex',
        'as' => 'reception.editInquiryIndex',
        'namespace' => NULL,
        'prefix' => '/reception',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'reception.updateInquiry' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'reception/edit-inquiry{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'receptionLogin',
        ),
        'uses' => 'App\\Http\\Controllers\\InquiryController@updateInquiry',
        'controller' => 'App\\Http\\Controllers\\InquiryController@updateInquiry',
        'as' => 'reception.updateInquiry',
        'namespace' => NULL,
        'prefix' => '/reception',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'reception.showInquiry' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'reception/show-inquiry',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'receptionLogin',
        ),
        'uses' => 'App\\Http\\Controllers\\InquiryController@showInquiry',
        'controller' => 'App\\Http\\Controllers\\InquiryController@showInquiry',
        'as' => 'reception.showInquiry',
        'namespace' => NULL,
        'prefix' => '/reception',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'reception.getInquiryData' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'reception/get-inquiry-datatable-data',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'receptionLogin',
        ),
        'uses' => 'App\\Http\\Controllers\\InquiryController@getInquiryData',
        'controller' => 'App\\Http\\Controllers\\InquiryController@getInquiryData',
        'as' => 'reception.getInquiryData',
        'namespace' => NULL,
        'prefix' => '/reception',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'reception.exportInquiryData' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'reception/export-inquiry',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'receptionLogin',
        ),
        'uses' => 'App\\Http\\Controllers\\InquiryController@exportInquiryData',
        'controller' => 'App\\Http\\Controllers\\InquiryController@exportInquiryData',
        'as' => 'reception.exportInquiryData',
        'namespace' => NULL,
        'prefix' => '/reception',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'reception.followUpInquiryIndex' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'reception/move-into-followup-inquiry/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'receptionLogin',
        ),
        'uses' => 'App\\Http\\Controllers\\InquiryController@followUpInquiryIndex',
        'controller' => 'App\\Http\\Controllers\\InquiryController@followUpInquiryIndex',
        'as' => 'reception.followUpInquiryIndex',
        'namespace' => NULL,
        'prefix' => '/reception',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'reception.saveFollowUpInquiry' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'reception/move-into-followup-inquiry/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'receptionLogin',
        ),
        'uses' => 'App\\Http\\Controllers\\InquiryController@saveFollowUpInquiry',
        'controller' => 'App\\Http\\Controllers\\InquiryController@saveFollowUpInquiry',
        'as' => 'reception.saveFollowUpInquiry',
        'namespace' => NULL,
        'prefix' => '/reception',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'reception.showFollowUpInquiry' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'reception/show-followup-inquiry',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'receptionLogin',
        ),
        'uses' => 'App\\Http\\Controllers\\InquiryController@showFollowUpInquiry',
        'controller' => 'App\\Http\\Controllers\\InquiryController@showFollowUpInquiry',
        'as' => 'reception.showFollowUpInquiry',
        'namespace' => NULL,
        'prefix' => '/reception',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'reception.removeFollowUp' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'reception/remove-follow-up',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'receptionLogin',
        ),
        'uses' => 'App\\Http\\Controllers\\InquiryController@removeFollowUp',
        'controller' => 'App\\Http\\Controllers\\InquiryController@removeFollowUp',
        'as' => 'reception.removeFollowUp',
        'namespace' => NULL,
        'prefix' => '/reception',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'reception.getFollowUpInquiryData' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'reception/get-follow-up-inquiry',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'receptionLogin',
        ),
        'uses' => 'App\\Http\\Controllers\\InquiryController@getFollowUpInquiryData',
        'controller' => 'App\\Http\\Controllers\\InquiryController@getFollowUpInquiryData',
        'as' => 'reception.getFollowUpInquiryData',
        'namespace' => NULL,
        'prefix' => '/reception',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'reception.upcommingInquiry' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'reception/upcomming-inquiry',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'receptionLogin',
        ),
        'uses' => 'App\\Http\\Controllers\\InquiryController@upcommingInquiry',
        'controller' => 'App\\Http\\Controllers\\InquiryController@upcommingInquiry',
        'as' => 'reception.upcommingInquiry',
        'namespace' => NULL,
        'prefix' => '/reception',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'reception.getUpcommingInquiryData' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'reception/get-upcomming-inquiry-datatable-data',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'receptionLogin',
        ),
        'uses' => 'App\\Http\\Controllers\\InquiryController@getUpcommingInquiryData',
        'controller' => 'App\\Http\\Controllers\\InquiryController@getUpcommingInquiryData',
        'as' => 'reception.getUpcommingInquiryData',
        'namespace' => NULL,
        'prefix' => '/reception',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'reception.exportFollowUpInquiryData' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'reception/export-follow-up-inquiry',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'receptionLogin',
        ),
        'uses' => 'App\\Http\\Controllers\\InquiryController@exportFollowUpInquiryData',
        'controller' => 'App\\Http\\Controllers\\InquiryController@exportFollowUpInquiryData',
        'as' => 'reception.exportFollowUpInquiryData',
        'namespace' => NULL,
        'prefix' => '/reception',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'reception.successfullInquiryIndex' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'reception/move-into-successfull-inquiry/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'receptionLogin',
        ),
        'uses' => 'App\\Http\\Controllers\\InquiryController@successfullInquiryIndex',
        'controller' => 'App\\Http\\Controllers\\InquiryController@successfullInquiryIndex',
        'as' => 'reception.successfullInquiryIndex',
        'namespace' => NULL,
        'prefix' => '/reception',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'reception.saveSuccessfullInquiry' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'reception/move-into-successfull-inquiry/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'receptionLogin',
        ),
        'uses' => 'App\\Http\\Controllers\\InquiryController@saveSuccessfullInquiry',
        'controller' => 'App\\Http\\Controllers\\InquiryController@saveSuccessfullInquiry',
        'as' => 'reception.saveSuccessfullInquiry',
        'namespace' => NULL,
        'prefix' => '/reception',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'reception.showSuccessfullInquiry' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'reception/show-successfull-inquiry',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'receptionLogin',
        ),
        'uses' => 'App\\Http\\Controllers\\InquiryController@showSuccessfullInquiry',
        'controller' => 'App\\Http\\Controllers\\InquiryController@showSuccessfullInquiry',
        'as' => 'reception.showSuccessfullInquiry',
        'namespace' => NULL,
        'prefix' => '/reception',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'reception.removeSuccessfullInquiry' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'reception/remove-successfull',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'receptionLogin',
        ),
        'uses' => 'App\\Http\\Controllers\\InquiryController@removeSuccessfullInquiry',
        'controller' => 'App\\Http\\Controllers\\InquiryController@removeSuccessfullInquiry',
        'as' => 'reception.removeSuccessfullInquiry',
        'namespace' => NULL,
        'prefix' => '/reception',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'reception.getSuccessfullInquiryData' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'reception/get-successfull-inquiry',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'receptionLogin',
        ),
        'uses' => 'App\\Http\\Controllers\\InquiryController@getSuccessfullInquiryData',
        'controller' => 'App\\Http\\Controllers\\InquiryController@getSuccessfullInquiryData',
        'as' => 'reception.getSuccessfullInquiryData',
        'namespace' => NULL,
        'prefix' => '/reception',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'reception.exportSuccessfullInquiryData' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'reception/export-successfull-inquiry',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'receptionLogin',
        ),
        'uses' => 'App\\Http\\Controllers\\InquiryController@exportSuccessfullInquiryData',
        'controller' => 'App\\Http\\Controllers\\InquiryController@exportSuccessfullInquiryData',
        'as' => 'reception.exportSuccessfullInquiryData',
        'namespace' => NULL,
        'prefix' => '/reception',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'reception.addReceptionIndex' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'reception/add-reception',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'receptionLogin',
        ),
        'uses' => 'App\\Http\\Controllers\\ReceptonController@addReceptionIndex',
        'controller' => 'App\\Http\\Controllers\\ReceptonController@addReceptionIndex',
        'as' => 'reception.addReceptionIndex',
        'namespace' => NULL,
        'prefix' => '/reception',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'reception.saveReception' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'reception/add-reception',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'receptionLogin',
        ),
        'uses' => 'App\\Http\\Controllers\\ReceptonController@saveReception',
        'controller' => 'App\\Http\\Controllers\\ReceptonController@saveReception',
        'as' => 'reception.saveReception',
        'namespace' => NULL,
        'prefix' => '/reception',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'reception.showReceptionIndex' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'reception/show-reception',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'receptionLogin',
        ),
        'uses' => 'App\\Http\\Controllers\\ReceptonController@showReceptionIndex',
        'controller' => 'App\\Http\\Controllers\\ReceptonController@showReceptionIndex',
        'as' => 'reception.showReceptionIndex',
        'namespace' => NULL,
        'prefix' => '/reception',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'reception.editReceptionIndex' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'reception/edit-reception/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'receptionLogin',
        ),
        'uses' => 'App\\Http\\Controllers\\ReceptonController@editReceptionIndex',
        'controller' => 'App\\Http\\Controllers\\ReceptonController@editReceptionIndex',
        'as' => 'reception.editReceptionIndex',
        'namespace' => NULL,
        'prefix' => '/reception',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'reception.updateReception' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'reception/edit-reception/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'receptionLogin',
        ),
        'uses' => 'App\\Http\\Controllers\\ReceptonController@updateReception',
        'controller' => 'App\\Http\\Controllers\\ReceptonController@updateReception',
        'as' => 'reception.updateReception',
        'namespace' => NULL,
        'prefix' => '/reception',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'reception.getReception' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'reception/get-reception-datatable-data',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'receptionLogin',
        ),
        'uses' => 'App\\Http\\Controllers\\ReceptonController@getReceptionData',
        'controller' => 'App\\Http\\Controllers\\ReceptonController@getReceptionData',
        'as' => 'reception.getReception',
        'namespace' => NULL,
        'prefix' => '/reception',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'reception.exportReception' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'reception/export-reception',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'receptionLogin',
        ),
        'uses' => 'App\\Http\\Controllers\\ReceptonController@exportReception',
        'controller' => 'App\\Http\\Controllers\\ReceptonController@exportReception',
        'as' => 'reception.exportReception',
        'namespace' => NULL,
        'prefix' => '/reception',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'chef.indexView' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'chef/dashboard',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'chefLogin',
        ),
        'uses' => 'App\\Http\\Controllers\\ChefDashboardController@index',
        'controller' => 'App\\Http\\Controllers\\ChefDashboardController@index',
        'as' => 'chef.indexView',
        'namespace' => NULL,
        'prefix' => '/chef',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'chef.logout' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'chef/logout',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'chefLogin',
        ),
        'uses' => 'App\\Http\\Controllers\\ChefDashboardController@logout',
        'controller' => 'App\\Http\\Controllers\\ChefDashboardController@logout',
        'as' => 'chef.logout',
        'namespace' => NULL,
        'prefix' => '/chef',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'chef.singleOrder' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'chef/order-details/{order_id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'chefLogin',
        ),
        'uses' => 'App\\Http\\Controllers\\ChefPanelOrderDetails@singleOrder',
        'controller' => 'App\\Http\\Controllers\\ChefPanelOrderDetails@singleOrder',
        'as' => 'chef.singleOrder',
        'namespace' => NULL,
        'prefix' => '/chef',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'chef.updateOrder' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'chef/order-details/{order_id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'chefLogin',
        ),
        'uses' => 'App\\Http\\Controllers\\ChefPanelOrderDetails@updateOrder',
        'controller' => 'App\\Http\\Controllers\\ChefPanelOrderDetails@updateOrder',
        'as' => 'chef.updateOrder',
        'namespace' => NULL,
        'prefix' => '/chef',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'chef.allOrder' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'chef/show-orders',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'chefLogin',
        ),
        'uses' => 'App\\Http\\Controllers\\ChefPanelOrderDetails@allOrder',
        'controller' => 'App\\Http\\Controllers\\ChefPanelOrderDetails@allOrder',
        'as' => 'chef.allOrder',
        'namespace' => NULL,
        'prefix' => '/chef',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generatePdf' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/pdf',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'App\\Http\\Controllers\\GeneratePdf@generatePdf',
        'controller' => 'App\\Http\\Controllers\\GeneratePdf@generatePdf',
        'namespace' => NULL,
        'prefix' => '/admin',
        'where' => 
        array (
        ),
        'as' => 'generatePdf',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::RXnFA6e9viXseA4L' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'receipt-verification/{order_id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'App\\Http\\Controllers\\ReceiptVerification@verification',
        'controller' => 'App\\Http\\Controllers\\ReceiptVerification@verification',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'generated::RXnFA6e9viXseA4L',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'customer.login' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'customer/login',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'App\\Http\\Controllers\\customer\\CustomerLoginController@login',
        'controller' => 'App\\Http\\Controllers\\customer\\CustomerLoginController@login',
        'as' => 'customer.login',
        'namespace' => NULL,
        'prefix' => '/customer',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'customer.signUp' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'customer/sign-up',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'App\\Http\\Controllers\\customer\\CustomerLoginController@signUp',
        'controller' => 'App\\Http\\Controllers\\customer\\CustomerLoginController@signUp',
        'as' => 'customer.signUp',
        'namespace' => NULL,
        'prefix' => '/customer',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'customer.account' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'customer/account',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'App\\Http\\Controllers\\customer\\CustomerLoginController@account',
        'controller' => 'App\\Http\\Controllers\\customer\\CustomerLoginController@account',
        'as' => 'customer.account',
        'namespace' => NULL,
        'prefix' => '/customer',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'customer.signIn' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'customer/sign-in',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'App\\Http\\Controllers\\customer\\CustomerLoginController@signIn',
        'controller' => 'App\\Http\\Controllers\\customer\\CustomerLoginController@signIn',
        'as' => 'customer.signIn',
        'namespace' => NULL,
        'prefix' => '/customer',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'customer.logout' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'customer/logout',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'App\\Http\\Controllers\\customer\\CustomerLoginController@logout',
        'controller' => 'App\\Http\\Controllers\\customer\\CustomerLoginController@logout',
        'as' => 'customer.logout',
        'namespace' => NULL,
        'prefix' => '/customer',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'customer.updateCustomerData' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'customer/update-data/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'App\\Http\\Controllers\\customer\\CustomerLoginController@updateCustomerData',
        'controller' => 'App\\Http\\Controllers\\customer\\CustomerLoginController@updateCustomerData',
        'as' => 'customer.updateCustomerData',
        'namespace' => NULL,
        'prefix' => '/customer',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'customer.index' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'customer/dashboard',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'App\\Http\\Controllers\\customer\\CustomerDashboardController@index',
        'controller' => 'App\\Http\\Controllers\\customer\\CustomerDashboardController@index',
        'as' => 'customer.index',
        'namespace' => NULL,
        'prefix' => '/customer',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'customer.customerShopping' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'customer/shop/{table_no?}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'App\\Http\\Controllers\\customer\\CustomerShoppingController@customerShopping',
        'controller' => 'App\\Http\\Controllers\\customer\\CustomerShoppingController@customerShopping',
        'as' => 'customer.customerShopping',
        'namespace' => NULL,
        'prefix' => '/customer',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'customer.customerShoppingPayment' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'customer/payment',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'App\\Http\\Controllers\\customer\\CustomerShoppingController@customerShoppingPayment',
        'controller' => 'App\\Http\\Controllers\\customer\\CustomerShoppingController@customerShoppingPayment',
        'as' => 'customer.customerShoppingPayment',
        'namespace' => NULL,
        'prefix' => '/customer',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'customer.placeOrder' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'customer/place-order',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'App\\Http\\Controllers\\customer\\CustomerShoppingController@placeOrder',
        'controller' => 'App\\Http\\Controllers\\customer\\CustomerShoppingController@placeOrder',
        'as' => 'customer.placeOrder',
        'namespace' => NULL,
        'prefix' => '/customer',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'customer.orderDetails' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'customer/order-details/{order_id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'App\\Http\\Controllers\\customer\\CustomerShoppingController@orderDetails',
        'controller' => 'App\\Http\\Controllers\\customer\\CustomerShoppingController@orderDetails',
        'as' => 'customer.orderDetails',
        'namespace' => NULL,
        'prefix' => '/customer',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'customer.paymentData' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'customer/payment/{order_id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'App\\Http\\Controllers\\customer\\CustomerShoppingController@paymentData',
        'controller' => 'App\\Http\\Controllers\\customer\\CustomerShoppingController@paymentData',
        'as' => 'customer.paymentData',
        'namespace' => NULL,
        'prefix' => '/customer',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'customer.generateBill' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'customer/generate-bill',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'App\\Http\\Controllers\\customer\\CustomerShoppingController@generateBill',
        'controller' => 'App\\Http\\Controllers\\customer\\CustomerShoppingController@generateBill',
        'as' => 'customer.generateBill',
        'namespace' => NULL,
        'prefix' => '/customer',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'customer.getOrderDetails' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'customer/get-order-details/{order_id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'App\\Http\\Controllers\\customer\\CustomerShoppingController@getOrderDetails',
        'controller' => 'App\\Http\\Controllers\\customer\\CustomerShoppingController@getOrderDetails',
        'as' => 'customer.getOrderDetails',
        'namespace' => NULL,
        'prefix' => '/customer',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'customer.PlaceOrder' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'place-order/{table_no}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'App\\Http\\Controllers\\customer\\CustomerOrderController@PlaceOrder',
        'controller' => 'App\\Http\\Controllers\\customer\\CustomerOrderController@PlaceOrder',
        'as' => 'customer.PlaceOrder',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'customer.customerAjax' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'customer-ajax',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'App\\Http\\Controllers\\CustomerAjaxController@customerAjax',
        'controller' => 'App\\Http\\Controllers\\CustomerAjaxController@customerAjax',
        'as' => 'customer.customerAjax',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
  ),
)
);
