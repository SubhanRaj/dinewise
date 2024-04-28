function initServerSideDataTable(
    table_id,
    ajaxurl,
    selectedItem,
    columns,
    table_action_box,
    checkcbox = true
) {
    let checkbox_col = [
        {
            targets: 0,
            checkboxes: {
                // 'selectRow':true,
                stateSave: false,
                selectCallback: function () {
                    var selected_row = table.column(0).checkboxes.selected();
                    var selected_check_arr = [];
                    $.each(selected_row, function (index, row) {
                        selected_check_arr.push(row);
                    });
                    if (selected_check_arr.length != 0) {
                        $("#" + table_action_box + " .disabled-btn").prop(
                            "disabled",
                            false
                        );
                        $(
                            "#" +
                            table_action_box +
                            " .disabled-btn input[type=hidden]"
                        ).val(selected_check_arr);
                    } else {
                        $("#" + table_action_box + " .disabled-btn").prop(
                            "disabled",
                            true
                        );
                        $(
                            "#" +
                            table_action_box +
                            " .disabled-btn input[type=hidden]"
                        ).val("");
                    }
                    showCheckboxSelectedItems(
                        selectedItem,
                        selected_row.length
                    );
                },
            },
        },
    ];

    let options = {
        processing: true,
        serverSide: true,
        stateSave: true,
        scrollY: "550px",
        scrollCollapse: true,
        scrollX: true,
        colReorder: true,
        autoWidth: false,
        lengthMenu: [
            [10, 25, 50, 100, 250, 500, -1],
            [10, 25, 50, 100, 250, 500, "All"],
        ],
        ajax: {
            url: ajaxurl,
            type: "GET",
            dataSrc: function (json) {
                return json.data;
            },
        },
        search: {
            caseInsensitive: true, // Enable case-insensitive searching
        },
        order: [],
        columns: columns,
        dom: "Bfrtip",

        buttons: [
            {
                extend: "pageLength",
                className: "DT_pageLenght",
            },

            {
                extend: "colvis",
                text: "<i class='fa-solid fa-line-columns' data-bs-toggle='tooltip' data-bs-title='Column Visibility' data-bs-placement='auto'></i>",
                className: "DT_columnVisibility",
            },
            {
                extend: "excel",
                text: "<i class='fas fa-file-excel' data-bs-toggle='tooltip' data-bs-title='Export Into Excel' data-bs-placement='auto'></i>",
                className: "DT_ExcelExport",
                exportOptions: {
                    columns: ':visible'
                }
            },

            {
                extend: "csv",
                text: "<i class='fa-solid fa-file-csv' data-bs-toggle='tooltip' data-bs-title='Export Into CSV' data-bs-placement='auto'></i>",
                className: "DT_CSVExport",
                exportOptions: {
                    columns: ':visible'
                }
            },
            {
                extend: "pdf",
                text: "<i class='fa-solid fa-file-pdf' data-bs-toggle='tooltip' data-bs-title='Export Into PDF' data-bs-placement='auto'></i>",
                className: "DT_Pdf",
                exportOptions: {
                    columns: ':visible'
                }
            },
            {
                extend: "print",
                text: "<i class='fa-solid fa-print' data-bs-toggle='tooltip' data-bs-title='Print Data' data-bs-placement='auto'></i>",
                className: "DT_print",
                messageTop: "Data Printing",
                exportOptions: {
                    stripHtml: false,
                    columns: ':visible'
                }
            },
            {
                extend: "copy",
                text: "<i class='fa-regular fa-copy' data-bs-toggle='tooltip' data-bs-title='Copy Data' data-bs-placement='auto'></i>",
                className: "DT_copy",
                exportOptions: {
                    columns: ':visible'
                }
            },
            {
                text: "<i class='fa-solid fa-repeat' data-bs-toggle='tooltip' data-bs-title='Reset Table' data-bs-placement='auto'></i>",
                className: "DT_ResetTable",
                action: function () {
                    table.state.clear();
                    window.location.reload();
                }
            },

        ],

        select: false,
    };
    if (checkcbox == true) {
        options["columnDefs"] = checkbox_col;
    }

    var table = $("#" + table_id).DataTable(options);


}




function createColumn(
    col_arr,
    checkbox = true,
    action = true,
    created_at = true,
    updated_at = true,
    deleted_at = false
) {
    let checkbox_col = {
        data: "checkbox",
        name: "checkbox",
        orderable: false,
        searchable: false,
    };
    let action_col = {
        data: "action",
        name: "action",
        orderable: false,
        searchable: false,
    };

    let created_at_col = {
        data: "created_at",
        name: "created_at",
    };
    let updated_at_col = {
        data: "updated_at",
        name: "updated_at",
    };
    let deleted_at_col = {
        data: "deleted_at",
        name: "deleted_at",
    };

    let column = [];
    // adding checkbox column
    if (checkbox === true) {
        column.push(checkbox_col);
    }

    // adding array column
    col_arr.forEach((element) => {
        column.push({
            data: element,
            name: element,
        });
    });

    // adding created at column
    if (deleted_at === true) {
        column.push(deleted_at_col);
    }
    // adding created at column
    if (created_at === true) {
        column.push(created_at_col);
    }
    // adding updated at column
    if (updated_at === true) {
        column.push(updated_at_col);
    }
    // adding action column
    if (action === true) {
        column.push(action_col);
    }

    return column;
}

// 😊😒😂👍😘😍 Admin Panel Started 😊😒😂👍😘😍
// 😊😒😂👍😘😍 Admin Panel Started 😊😒😂👍😘😍

// MEDIA STARTED

let mediaColumn = ["img_name"];
let Trash_mediaColumn = mediaColumn;
initServerSideDataTable(
    "media-table",
    "/admin/media-datatable-data",
    "media-selected",
    createColumn(mediaColumn),
    "media-table-action"
);

// MEDIA ENDED



// pricing unit column started

let PricingUnitColumn = ["unit"];
let Trash_PricingUnitColumn = PricingUnitColumn;

initServerSideDataTable(
    "pricing-unit-table",
    "/admin/show-pricing-unit",
    "pricing-unit-selected",
    createColumn(PricingUnitColumn),
    "pricing-unit-table-action"
);

// pricing unit column ended

// all product column started

let AllProductColumn = [
    "cat_id",
    "product_id",
    "product_name",
    "product_image",
    "stock",
    "price",
];
let Trash_AllProductColumn = AllProductColumn;
initServerSideDataTable(
    "Product-table",
    "/admin/show-products",
    "Product-selected",
    createColumn(AllProductColumn),
    "Product-table-action"
);
// all product column ended

// product material details started

let ProductMaterialColumn = ["material", "status"];
let Trash_ProductMaterialColumn = ProductMaterialColumn;
initServerSideDataTable(
    "material-table",
    "/admin/show-material",
    "material-selected",
    createColumn(ProductMaterialColumn),
    "material-table-action"
);
// product material details ended

// product table column started

let TablesColumn = ["table_no", "capacity"];
let Trash_TablesColumn = TablesColumn;

initServerSideDataTable(
    "tables-table",
    "/admin/show-table",
    "tables-selected",
    createColumn(TablesColumn),
    "tables-table-action"
);
// product table column ended

// booking column started

// data table on page
let BookingTablesColumn = [
    "booking_id",
    "name",
    "mobile",
    "email",
    "address",
    "no_of_people",
    "event",
    "booked_from",
    "booked_to",
    "amount",
    "description",
];

let cancelled_BookingTablesColumn = [
    "booking_id",
    "name",
    "mobile",
    "email",
    "address",
    "no_of_people",
    "event",
    "booked_from",
    "booked_to",
    "amount",
    "description",
    "cancel_reason",
];
let Trash_BookingTablesColumn = BookingTablesColumn;
// data table on page
// booking column ended


// order table col ended

// customers table col started

let CustomersTablesColumn = ["name", "phone", "email", "dob", "doa"];
let Trash_CustomersTablesColumn = ["name", "phone", "email", "dob", "doa"];

initServerSideDataTable(
    "customers-table",
    "/admin/view-customer-details",
    "customers-selected",
    createColumn(CustomersTablesColumn),
    "customers-table-action"
);

// customers table col ended

// staff col started

let staffColumn = [
    "profile_picture",
    "name",
    "uid",
    "email",
    "phone",
    "work_ex",
    "designation",
    "doj",
    "address",
    "documents",
];
let Trash_staffColumn = staffColumn;

initServerSideDataTable(
    "Staff-table",
    "/admin/staff-datatable-data",
    "Staff-selected",
    createColumn(staffColumn),
    "Staff-table-action"
);
// staff col ended

// staff account col started

let staffAccountColumn = [
    "profile_picture",
    "name",
    "uid",
    "bank_name",
    "account_holder_name",
    "acc_no",
    "ifsc_code",
    "phone_number",
    "gpay",
    "phonepay",
    "paytm",
];
let Trash_staffAccountColumn = staffAccountColumn;

initServerSideDataTable(
    "staff-account-table",
    "/admin/staff-account-details-datatable-data",
    "staff-account-selected",
    createColumn(staffAccountColumn),
    "staff-account-table-action"
);

// staff account col ended

let staffDefineSalaryColumn = [
    "profile_picture",
    "name",
    "uid",
    "starting_salary",
    "salary_incremented",
    "increment_count",
    "current_salary",
    "per_day",
];
let Trash_staffDefineSalaryColumn = staffDefineSalaryColumn;
initServerSideDataTable(
    "staff-define-payment-table",
    "/admin/show-define-salary-datatable-data",
    "staff-define-payment-selected",
    createColumn(staffDefineSalaryColumn),
    "staff-define-payment-table-action"
);

// staff salary incremented col started

let staffIncrementSalaryColumn = ["profile_picture", "name", "uid", "amount"];
let Trash_staffIncrementSalaryColumn = staffIncrementSalaryColumn;

initServerSideDataTable(
    "staff-incremented-payment-table",
    "/admin/show-incremented-salary-datatable-data",
    "staff-incremented-payment-selected",
    createColumn(staffIncrementSalaryColumn),
    "staff-incremented-payment-table-action"
);
// staff salary incremented col ended

// staff advance salary col started

let AdvanceSalaryColumn = [
    "profile_picture",
    "name",
    "uid",
    "amount",
    "year",
    "month",
    "date",
];
let Trash_AdvanceSalaryColumn = AdvanceSalaryColumn;
initServerSideDataTable(
    "advance-payment-table",
    "/admin/show-advance-payment-datatable-data",
    "advance-payment-selected",
    createColumn(AdvanceSalaryColumn),
    "advance-payment-table-action"
);
// staff advance salary col ended

let createdPaymentColumn = [
    "profile_picture",
    "name",
    "uid",
    "year",
    "month",
    "deduction",
    "bonus",
    "final_amount",
    "comment",
    "status",
];
let Trash_createdPaymentColumn = createdPaymentColumn;
initServerSideDataTable(
    "created-payment-table",
    "/admin/get-created-payment-datatable",
    "created-payment-selected",
    createColumn(createdPaymentColumn),
    "created-payment-table-action"
);

let releasedPaymentCol = [
    "profile_picture",
    "name",
    "uid",
    "paid_amount",
    "rest_amount",
    "method",
    "transaction_id",
    "date_time",
];
let Trash_releasedPaymentCol = releasedPaymentCol;
initServerSideDataTable(
    "released-payment-table",
    "/admin/get-released-payment-datatable",
    "released-payment-selected",
    createColumn(releasedPaymentCol),
    "released-payment-table-action"
);

// leave col started

let leaveColumn = [
    "profile_picture",
    "name",
    "uid",
    "l_from",
    "l_to",
    "des",
    "year",
    "month",
    "date",
    "status",
];
let Trash_leaveColumn = leaveColumn;

initServerSideDataTable(
    "leave-table",
    "/admin/get-leave-datatable",
    "leave-selected",
    createColumn(leaveColumn),
    "leave-table-action"
);
initServerSideDataTable(
    "pendingleave-table",
    "/admin/get-leave-datatable?status=pending",
    "pendingleave-selected",
    createColumn(leaveColumn),
    "pendingleave-table-action"
);
// leave col ended

let attendanceColumn = [
    "profile_picture",
    "name",
    "uid",
    "date",
    "year",
    "month",
    "status",
    "login",
    "logout",
];
let Trash_attendanceColumn = attendanceColumn;

initServerSideDataTable(
    "attendance-table",
    "/admin/get-attendance-datatable",
    "attendance-selected",
    createColumn(attendanceColumn),
    "attendance-table-action"
);

// user column started

let UserColumn = [
    "profile_picture",
    "name",
    "user_id",
    "email",
    "phone",
    "two_fa_email",
];
initServerSideDataTable(
    "users-table",
    "/admin/get-users-datatable-data",
    "users-selected",
    createColumn(UserColumn),
    "users-table-action"
);

// user column Ended

// ====================== Staff Profile Started==================
// ====================== Staff Profile Started==================
let StaffProfile_attendanceColumn = [
    "status",
    "login",
    "logout",
    "year",
    "month",
    "date",
];
let staff_profile_leaveColumn = [
    "l_from",
    "l_to",
    "des",
    "year",
    "month",
    "date",
    "status",
];
let staff_profile_paymentColumn = [
    "paid_amount",
    "rest_amount",
    "method",
    "transaction_id",
    "date_time",
];
// ====================== Staff Profile Ended==================
// ====================== Staff Profile Ended==================

// 😊😒😂👍😘😍 Admin Panel Ended 😊😒😂👍😘😍
// 😊😒😂👍😘😍 Admin Panel Ended 😊😒😂👍😘😍

// 😊😒😂👍😘😍 Staff Panel Started 😊😒😂👍😘😍
// 😊😒😂👍😘😍 Staff Panel Started 😊😒😂👍😘😍

let Staff_OrderTablesColumn = [
    "order_id",
    "selectedTable",
    "no_of_people",
    "customer_name",
    "customer_mobile",
    // "paid_amount",
    "status",
    "view",
];

initServerSideDataTable(
    "staff-order-table",
    "/staff/show-orders",
    "",
    createColumn(Staff_OrderTablesColumn, false, false, true, true, false),
    "staff-order-table-action",
    false
);

let staffPanelAdvanceSalaryColumn = ["amount", "year", "month", "date"];

initServerSideDataTable(
    "staff-panel-advance-payment-table",
    "/staff/advance-payment-details",
    "staff-panel-advance-payment-selected",
    createColumn(
        staffPanelAdvanceSalaryColumn,
        false,
        false,
        true,
        true,
        false
    ),
    "staff-panel-advance-payment-table-action",
    false
);

let staff_panelreleasedPaymentCol = [
    "paid_amount",
    "rest_amount",
    "method",
    "transaction_id",
    "date_time",
];

initServerSideDataTable(
    "staff-panel-released-payment-table",
    "/staff/received-payment-details",
    "staff-panel-released-payment-selected",
    createColumn(
        staff_panelreleasedPaymentCol,
        false,
        false,
        true,
        true,
        false
    ),
    "staff-panel-released-payment-table-action",
    false
);

let StaffLeaveColumn = [
    "l_from",
    "l_to",
    "des",
    "year",
    "month",
    "date",
    "status",
];
initServerSideDataTable(
    "staff-leave-table",
    "/staff/get-leave-request-datatable",
    "staff-leave-selected",
    createColumn(StaffLeaveColumn, false, true, true, true, false),
    "staff-leave-table-action",
    false
);

let Staff_attendanceColumn = [
    "status",
    "login",
    "logout",
    "year",
    "month",
    "date",
];
initServerSideDataTable(
    "staff_attendance-table",
    "/staff/get-attendance-datatable",
    "staff_attendance-selected",
    createColumn(Staff_attendanceColumn, false, true, true, true, false),
    "staff_attendance-table-action",
    false
);
let staffPanelIncrementSalaryColumn = ["amount"];
initServerSideDataTable(
    "staff-panel-incremented-payment-table",
    "/staff/incrementd-payment-details",
    "staff-panel-incremented-payment-selected",
    createColumn(
        staffPanelIncrementSalaryColumn,
        false,
        false,
        true,
        true,
        false
    ),
    "staff-panel-incremented-payment-table-action",
    false
);

// 😊😒😂👍😘😍 Staff Panel Ended 😊😒😂👍😘😍
// 😊😒😂👍😘😍 Staff Panel Ended 😊😒😂👍😘😍

// 😊😒😂👍😘😍 Reception Panel Started 😊😒😂👍😘😍
// 😊😒😂👍😘😍 Reception Panel Started 😊😒😂👍😘😍

// reception col started

let receptionColumn = [
    "name",
    "phone",
    "purpose",
    "year",
    "month",
    "date",
    "entry_time",
    "exit_time",
];
let Trash_receptionCol = receptionColumn;
initServerSideDataTable(
    "reception-table",
    "/reception/get-reception-datatable-data",
    "reception-selected",
    createColumn(receptionColumn),
    "reception-table-action"
);
// reception col Ended

// inquiry column started

let InquiryColumn = [
    "client_name",
    "req",
    "email",
    "phone",
    "whatsapp",
    "address",
    "business",
    "website",
    "source",
    "year",
    "month",
    "date",
];

initServerSideDataTable(
    "inquiry-table",
    "/reception/get-inquiry-datatable-data",
    "inquiry-selected",
    createColumn(InquiryColumn),
    "inquiry-table-action"
);

let FolloUPInquiryColumn = [
    "client_name",
    "req",
    "email",
    "phone",
    "whatsapp",
    "address",
    "business",
    "website",
    "source",
    "year",
    "month",
    "date",
    "follow_up_date",
];
initServerSideDataTable(
    "follow-up-inquiry-table",
    "/reception/get-follow-up-inquiry",
    "follow-up-inquiry-selected",
    createColumn(FolloUPInquiryColumn),
    "follow-up-inquiry-table-action"
);

let upcommingInquiryColumn = [
    "client_name",
    "req",
    "email",
    "phone",
    "whatsapp",
    "address",
    "business",
    "website",
    "source",
    "year",
    "month",
    "date",
    "follow_up_date",
];
initServerSideDataTable(
    "upcomming-inquiry-table",
    "/reception/get-upcomming-inquiry-datatable-data",
    "upcomming-inquiry-selected",
    createColumn(upcommingInquiryColumn),
    "upcomming-inquiry-table-action"
);
let SuccessfullInquiryColumn = [
    "client_name",
    "req",
    "email",
    "phone",
    "whatsapp",
    "address",
    "business",
    "website",
    "source",
    "year",
    "month",
    "date",
    "service_taken",
];

initServerSideDataTable(
    "Successfull-inquiry-table",
    "/reception/get-successfull-inquiry",
    "Successfull-inquiry-selected",
    createColumn(SuccessfullInquiryColumn),
    "Successfull-inquiry-table-action"
);

// inquiry column Ended

// 😊😒😂👍😘😍 Reception Panel Ended 😊😒😂👍😘😍
// 😊😒😂👍😘😍 Reception Panel Ended 😊😒😂👍😘😍

// 😊😒😂👍😘😍 Chef Panel Started 😊😒😂👍😘😍
// 😊😒😂👍😘😍 Chef Panel Started 😊😒😂👍😘😍

let Chef_OrderTablesColumn = ["order_id", "orderInstruction", "chef_status", "view"];

initServerSideDataTable(
    "chef-order-table",
    "/chef/show-orders",
    "",
    createColumn(Chef_OrderTablesColumn, false, false, true, true, false),
    "chef-order-table-action",
    false
);

// 😊😒😂👍😘😍 Chef Panel Ended 😊😒😂👍😘😍
// 😊😒😂👍😘😍 Chef Panel Ended 😊😒😂👍😘😍
