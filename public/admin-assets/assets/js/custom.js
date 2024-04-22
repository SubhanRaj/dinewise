$.ajaxSetup({
    headers: {
        "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
    },
});
function getWebsiteUrl() {
    return location.protocol + "//" + location.host;
}

let websiteUrl = getWebsiteUrl();

// window.addEventListener('load', (event) => {
//     setTimeout(() => {
//         $('.loading-box').hide()
//     }, 1000);

// })

if (localStorage.getItem("theme") != null) {
    let Theme = localStorage.getItem("theme");

    if (Theme == "dark-theme") {
        $(".html").addClass(Theme).removeClass("white-theme");
        $("#theme-change-btn").html(` <i class="bx bx-sun"></i>`);
        $("#theme-change-btn").attr("data-bs-title", "Switch to light mode");
    } else {
        $(".html").addClass(Theme).removeClass("dark-theme");
        $("#theme-change-btn").html(` <i class="bx bx-moon"></i>`);
        $("#theme-change-btn").attr("data-bs-title", "Switch to dark mode");
    }
} else {
    localStorage.setItem("theme", "dark-theme");
}

if (localStorage.getItem("sideBar") != null) {
    let sideBar = localStorage.getItem("sideBar");
    if (sideBar == "toogleOff") {
        $(".logo-sm").addClass("d-none");
        $(".logo-big").removeClass("d-none");
        $(".wrapper").removeClass("toggled");
    } else if (sideBar == "toogleOn") {
        $(".logo-sm").removeClass("d-none");
        $(".logo-big").addClass("d-none");
        $(".wrapper").addClass("toggled");
    }
}

function changeTheme() {
    if (localStorage.getItem("theme") == "white-theme") {
        localStorage.setItem("theme", "dark-theme");
        $("#theme-change-btn").html(`<i class="bx bx-sun"></i>`);
        $("#theme-change-btn").attr("data-bs-title", "Switch to light mode");
    } else {
        localStorage.setItem("theme", "white-theme");
        $("#theme-change-btn").html(` <i class="bx bx-moon"></i>`);
        $("#theme-change-btn").attr("data-bs-title", "Switch to dark mode");
    }

    window.location.reload();
}

function showCheckboxSelectedItems(id, selected) {
    $("#" + id).html(`<span  > ${selected} - Selected</span>`);
}

function progressBtn(width, btn_text) {
    let loadingBtn2 = `
    
    <div class="d-flex justify-content-center align-items-center">
        <span class="spinner-border spinner-border-sm"></span>
        <span class=''>
             ${btn_text}
        </span>
    </div>
     
    `;
    return loadingBtn2;
}

// ===================== Alert and confirm Start =====================

function showAlert(type, dismiss = true, msg) {
    if (dismiss == true) {
        var alert = `<div class="alert alert-${type} border-0 bg-${type} alert-dismissible fade show p-2">
        <div class="text-white px-2">   ${msg}</div>
        <button type="button" class="btn-close pb-2" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>`;
    } else {
        var alert = `<div class="alert alert-${type} border-0 bg-${type} fade show p-2">
        <div class="text-white px-2">   ${msg}</div>`;
    }
    return alert;
}

function successConfirm(content, location) {
    $.confirm({
        icon: "fas fa-check-circle ",
        title: "Successful",
        type: "green",
        content: content,
        typeAnimated: true,
        draggable: false,
        theme: "modern",
        columnClass: "m",
        buttons: {
            ok: {
                text: "Ok",
                btnClass: "btn-green",
                action: function () {
                    if (location == "self") {
                        window.location.reload();
                    } else {
                        window.location.href = location;
                    }
                },
            },
        },
    });
}

function dangerConfirm(content, location) {
    $.confirm({
        icon: "fas fa-times-circle ",
        title: "Failed",
        type: "red",
        content: content,
        typeAnimated: true,
        draggable: false,
        theme: "modern",
        columnClass: "m",
    });
}

function success_noti(msg) {
    Lobibox.notify("success", {
        pauseDelayOnHover: true,
        size: "mini",
        rounded: true,
        icon: "fas fa-check-circle",
        delayIndicator: true,
        continueDelayOnInactiveTab: false,
        position: "top right",
        msg: msg,
    });
}

function danger_noti(msg) {
    Lobibox.notify("error", {
        pauseDelayOnHover: true,
        size: "mini",
        rounded: true,
        delayIndicator: true,
        icon: "fas fa-times-circle",
        continueDelayOnInactiveTab: false,
        position: "top right",
        msg: msg,
    });
}
// ===================== Alert and confirm End =====================

// ===================== Preloader Show Start =====================

function Preloader(display) {
    if (display == "flex") {
        $("html").css("overflow", "hidden");
        $(".preloader-box").removeClass("d-none").addClass("d-flex");
    } else if (display == "none") {
        $("html").css("overflow", "auto");
        $(".preloader-box").removeClass("d-flex").addClass("d-none");
    }
}
// ===================== Preloader Show End =====================

function setAlertData(alertmsg, alertbox) {
    localStorage.setItem("alertMessage", alertmsg);
    localStorage.setItem("alertBoxId", alertbox);
    localStorage.setItem("alertCount", "0");
}

window.onload = (event) => {
    let alertMessage = localStorage.getItem("alertMessage");
    let alertBoxId = localStorage.getItem("alertBoxId");
    let alertCount = localStorage.getItem("alertCount");

    if (alertMessage != null && alertBoxId != null && alertCount != null) {
        if (alertCount == 0) {
            if (alertMessage != false || alertMessage != "false") {
                success_noti(alertMessage);
            }

            if (alertBoxId != false || alertBoxId != "false") {
                let alert_msg = showAlert("success", false, alertMessage);
                $("#" + alertBoxId).html(alert_msg);
            }

            localStorage.setItem("alertCount", "1");
        } else {
            localStorage.removeItem("alertMessage");
            localStorage.removeItem("alertBoxId");
            localStorage.removeItem("alertCount");
        }
    }
};

function uploadData1(formid, route, alertBox, btnBox, event) {
    event.preventDefault();

    // for (instance in CKEDITOR.instances) {
    //     CKEDITOR.instances[instance].updateElement();
    // }

    var form = document.getElementById(formid);
    var formData = new FormData(form); // get form data

    let loadBtn = progressBtn("100%", "");

    var btn_box_html = $("#" + btnBox).html(); // get button box html
    $("#" + btnBox).html(loadBtn); // set button box html in processing state

    $("#" + alertBox).html(""); // remove html of alert box
    $("#" + formid + " [class*='is-invalid']").removeClass("is-invalid"); // remove invalid class from all form fields
    $.ajax({
        type: "post",
        url: route,
        data: formData,
        contentType: false,
        processData: false,
        success: function (response) {
            console.log(response);

            $("#" + btnBox).html(btn_box_html); // reset button box html
            if (response["status"] == false) {
                danger_noti(response["message"]);
                let alert_msg = showAlert("danger", false, response["message"]);
                $("#" + alertBox).html(alert_msg);

                let errors_key = Object.keys(response["errors"]);
                for (var i = 0; i < errors_key.length; i++) {
                    let errors_msg = response["errors"][errors_key[i]];
                    let formField = $(
                        "#" + formid + " [name='" + errors_key[i] + "']"
                    );
                    formField.addClass("is-invalid");
                    let form_feedback = $(
                        "#" +
                        formid +
                        " .form-feedback[data-name='" +
                        errors_key[i] +
                        "']"
                    );
                    form_feedback.html(errors_msg[0]);
                }
            } else {
                setAlertData(response["message"], alertBox);

                $("#" + formid + " [class*='is-invalid']").removeClass(
                    "is-invalid"
                );
                form.reset();
                window.location.reload();
            }
        },
    });
}

function uploadData2(formid, route, alertBox, btnBox, event) {
    event.preventDefault();

    for (instance in CKEDITOR.instances) {
        CKEDITOR.instances[instance].updateElement();
    }

    var form = document.getElementById(formid);
    var formData = new FormData(form); // get form data

    let loadBtn = progressBtn("100%", "Processing...");

    var btn_box_html = $("#" + btnBox).html(); // get button box html
    $("#" + btnBox).html(loadBtn); // set button box html in processing state

    $("#" + alertBox).html(""); // remove html of alert box
    $("#" + formid + " [class*='is-invalid']").removeClass("is-invalid"); // remove invalid class from all form fields
    $.ajax({
        type: "post",
        url: route,
        data: formData,
        contentType: false,
        processData: false,
        success: function (response) {
            // console.log(response);

            $("#" + btnBox).html(btn_box_html); // reset button box html
            if (response["status"] == false) {
                danger_noti(response["message"]);
                let alert_msg = showAlert("danger", false, response["message"]);
                $("#" + alertBox).html(alert_msg);

                let errors_key = Object.keys(response["errors"]);
                for (var i = 0; i < errors_key.length; i++) {
                    let errors_msg = response["errors"][errors_key[i]];
                    let formField = $(
                        "#" + formid + " [name='" + errors_key[i] + "']"
                    );
                    formField.addClass("is-invalid");
                    let form_feedback = $(
                        "#" +
                        formid +
                        " .form-feedback[data-name='" +
                        errors_key[i] +
                        "']"
                    );
                    form_feedback.html(errors_msg[0]);
                }
            } else {
                setAlertData(response["message"], alertBox);

                $("#" + formid + " [class*='is-invalid']").removeClass(
                    "is-invalid"
                );
                form.reset();
                window.location.reload();
            }
        },
    });
}

function deleteConfirm(
    input_id,
    server_side_table,
    file_true_false,
    file_name_arr,
    file_path
) {
    let delete_input = $("#" + input_id).val();
    let delete_input_arr = delete_input.split(",");

    let senddata = {
        table: server_side_table,
        data: delete_input_arr,
        file: file_true_false,
        file_name: file_name_arr,
        file_path: file_path,
    };

    $.confirm({
        icon: "fas fa-exclamation-triangle ",
        title: "Danger",
        content: "Are you sure you want to delete the data ?",
        type: "red",
        typeAnimated: true,
        draggable: false,
        theme: "modern",
        columnClass: "m",
        buttons: {
            delete: {
                text: "Delete",
                btnClass: "btn-red",
                action: function () {
                    Preloader("flex");
                    $.ajax({
                        type: "get",
                        url: "/deleteall",
                        data: senddata,
                        success: function (response) {
                            let status = response["status"];
                            if (status === true) {
                                Preloader("none");
                                successConfirm(
                                    response["message"],
                                    response["redirect"]
                                );
                            } else {
                                Preloader("none");
                                dangerConfirm(
                                    response["message"],
                                    response["redirect"]
                                );
                            }
                        },
                    });
                },
            },
            cancel: function () { },
        },
    });
}

function single_deleteConfirm(
    server_side_table,
    delete_input_arr,
    file_true_false,
    file_name_arr,
    file_path
) {
    let senddata = {
        table: server_side_table,
        data: delete_input_arr,
        file: file_true_false,
        file_name: file_name_arr,
        file_path: file_path,
    };

    $.confirm({
        icon: "fas fa-exclamation-triangle ",
        title: "Danger",
        content: "Are you sure you want to delete the data ?",
        type: "red",
        typeAnimated: true,
        draggable: false,
        theme: "modern",
        columnClass: "m",
        buttons: {
            delete: {
                text: "Delete",
                btnClass: "btn-red",
                action: function () {
                    Preloader("flex");
                    $.ajax({
                        type: "get",
                        url: "/deleteall",
                        data: senddata,
                        success: function (response) {
                            let status = response["status"];
                            if (status === true) {
                                Preloader("none");
                                successConfirm(
                                    response["message"],
                                    response["redirect"]
                                );
                            } else {
                                Preloader("none");
                                dangerConfirm(
                                    response["message"],
                                    response["redirect"]
                                );
                            }
                        },
                    });
                },
            },
            cancel: function () { },
        },
    });
}

function deletePermanentally(
    input_id,
    server_side_table,
    file_true_false,
    file_name_arr,
    file_path
) {
    let delete_input = $("#" + input_id).val();
    let delete_input_arr = delete_input.split(",");

    let senddata = {
        delete: "1",
        table: server_side_table,
        data: delete_input_arr,
        file: file_true_false,
        file_name: file_name_arr,
        file_path: file_path,
    };

    $.confirm({
        icon: "fas fa-exclamation-triangle ",
        title: "Danger",
        content: "Are you sure you want to delete the data permanentally ?",
        type: "red",
        typeAnimated: true,
        draggable: false,
        theme: "modern",
        columnClass: "m",
        buttons: {
            delete: {
                text: "Delete",
                btnClass: "btn-red",
                action: function () {
                    Preloader("flex");
                    $.ajax({
                        type: "get",
                        url: "/deleteall",
                        data: senddata,
                        success: function (response) {
                            let status = response["status"];
                            if (status === true) {
                                Preloader("none");
                                successConfirm(
                                    response["message"],
                                    response["redirect"]
                                );
                            } else {
                                Preloader("none");
                                dangerConfirm(
                                    response["message"],
                                    response["redirect"]
                                );
                            }
                        },
                    });
                },
            },
            cancel: function () { },
        },
    });
}

function restoreDeletedData(
    input_id,
    server_side_table,
    file_true_false,
    file_name_arr,
    file_path
) {
    let delete_input = $("#" + input_id).val();
    let delete_input_arr = delete_input.split(",");

    let senddata = {
        restore: "1",
        table: server_side_table,
        data: delete_input_arr,
        file: file_true_false,
        file_name: file_name_arr,
        file_path: file_path,
    };

    $.confirm({
        icon: "fas fa-exclamation-triangle ",
        title: "Restore",
        content: "Are you sure you want to restore the data ?",
        type: "blue",
        typeAnimated: true,
        draggable: false,
        theme: "modern",
        columnClass: "m",
        buttons: {
            delete: {
                text: "Restore",
                btnClass: "btn-blue",
                action: function () {
                    Preloader("flex");
                    $.ajax({
                        type: "get",
                        url: "/deleteall",
                        data: senddata,
                        success: function (response) {
                            let status = response["status"];
                            if (status === true) {
                                Preloader("none");
                                successConfirm(
                                    response["message"],
                                    response["redirect"]
                                );
                            } else {
                                Preloader("none");
                                dangerConfirm(
                                    response["message"],
                                    response["redirect"]
                                );
                            }
                        },
                    });
                },
            },
            cancel: function () { },
        },
    });
}

function showDocuments(uid) {
    $.ajax({
        type: "post",
        url: "/admin/ajax-request",
        data: {
            isset_show_staff_document: true,
            uid: uid,
        },
        success: function (response) {
            if (response["status"] === true) {
                $("#document-data-row").html(response["data"]);
                showModal("document-modal");
            }
        },
    });
}

function copy_link(link) {
    navigator.clipboard.writeText(link);
    round_alert("success", "Link copied");
}

// ===============Modal Media System Start ==============

function checkMedia(media_id) {
    let multiple = localStorage.getItem("multiple");
    if (multiple == "false") {
        $(".modalone-checkbox").prop("checked", false);
        if ($("#" + media_id).prop("checked")) {
            $("#" + media_id).prop("checked", false);
        } else {
            $("#" + media_id).prop("checked", true);
        }
    } else {
        if ($("#" + media_id).prop("checked")) {
            $("#" + media_id).prop("checked", false);
        } else {
            $("#" + media_id).prop("checked", true);
        }
    }
}

function selectMedia(modal_id) {
    let final_input = localStorage.getItem("finalInput");
    let to = localStorage.getItem("img_box");

    $("#" + final_input).val("");
    $("#" + to)
        .find("img")
        .remove();

    let selectedMediaArr = [];
    let modalCheckbox = $(".modalone-checkbox");
    modalCheckbox.each(function () {
        if ($(this).prop("checked")) {
            let dataurl = $(this).attr("data-url");
            let value = $(this).val();
            $("#" + to).append(
                `<img src='${dataurl}' style='max-height:200px'>`
            );
            let jsonData = {
                file_id: value,
            };
            selectedMediaArr.push(jsonData);
        }
    });

    $("#" + final_input).attr("value", JSON.stringify(selectedMediaArr));
    $(".modalone-checkbox").prop("checked", false);
    $("#" + modal_id).modal("hide");
}

function cancelMedia(modal_id) {
    let final_input = localStorage.getItem("finalInput");
    let to = localStorage.getItem("img_box");
    $("#" + final_input).val("");
    $("#" + to)
        .find("img")
        .remove();
    $(".modalone-checkbox").prop("checked", false);
    $("#" + modal_id).modal("hide");
}

function setMediaSelection(final_input, img_box, multiple) {
    localStorage.setItem("finalInput", final_input);
    localStorage.setItem("img_box", img_box);
    localStorage.setItem("multiple", multiple);
}

$.each($(".btn-success .fa-file-excel"), function () {
    $(this).parent().attr({
        "data-bs-toggle": "tooltip",
        "data-bs-placement": "auto",
        "data-bs-title": "Export",
    });
});

function fullScreen() {
    if (!document.fullscreenElement) {
        document.documentElement.requestFullscreen();
        $("#fullscreen-icon")
            .removeClass("bx-fullscreen")
            .addClass("bx-exit-fullscreen");
    } else if (document.exitFullscreen) {
        document.exitFullscreen();
        $("#fullscreen-icon")
            .removeClass("bx-exit-fullscreen")
            .addClass("bx-fullscreen");
    }
}

function exportSetting(db_table, modal_id, action) {
    $.ajax({
        type: "post",
        url: "/admin/ajax-request",
        data: {
            isset_get_year_data_for_export: true,
            table: db_table,
        },
        success: function (response) {
            let status = response["status"];
            let data = response["data"];
            console.log(data);
            if (status === true) {
                show_modal(modal_id);
                $("#year-select").html(data);
                $("#export-setting-form").attr("action", action);
            }
        },
    });
}

function showDocuments(uid) {
    $.ajax({
        type: "post",
        url: "/admin/ajax-request",
        data: {
            isset_show_staff_document: true,
            uid: uid,
        },
        success: function (response) {
            if (response["status"] === true) {
                $("#document-data-row").html(response["data"]);
                show_modal("document-modal");
            }
        },
    });
}

$(".make_capital").on("keyup", function () {
    let make_cap_input_val = $(this).val();
    $(this).val(make_cap_input_val.toUpperCase());
});

$.each($(".search-select"), function () {
    dselect(this, {
        search: true,
    });
});

function addProductPricing(apend_box) {
    let main_apend_box = $("#" + apend_box);

    $.ajax({
        type: "post",
        url: "/admin/ajax-request",
        data: {
            isset_add_product_pricing: true,
        },
        success: function (response) {
            if (response["status"] === true) {
                let unit_id_arr = response["unit_id"];
                let unit_arr = response["unit"];
                let options;
                for (let i = 0; i < unit_arr.length; i++) {
                    let unit = unit_arr[i];
                    let unit_id = unit_id_arr[i];
                    options += `<option value='${unit_id}'>${unit}</option>`;
                }

                let row_id = Math.random().toString(8).slice(10);

                main_apend_box.append(`
                <div class="row mb-3 position-relative" id='${row_id}'>
                <div class="col-6">
                    <select name="pricing_unit[]" required class="form-select">
                        <option value="">Select Unit</option>
                         ${options}
                    </select>
                </div>
                 <div class="col-6">
                    <input type="number" class="form-control" required name="price[]"
                        placeholder="Price">
                  </div>
                  <div class="product-pricing-remove-btn" >
                  <button type="button" class="btn btn-danger" onclick=removeProductPricing('${row_id}')><i
                          class="fa-regular fa-trash"></i></button>
                  </div>
                </div>

                `);
            } else {
                danger_noti("Ca'nt create more fields");
            }
        },
    });
}

function removeProductPricing(row_id) {
    $("#" + row_id).remove();
}

function checkBookings(booked_from, booked_to) {
    let bookedFrom = $("#" + booked_from).val();
    let bookedTo = $("#" + booked_to).val();

    $.ajax({
        type: "POST",
        url: "/admin/ajax-request",
        data: {
            isset_check_bookings: 1,
            booked_from: bookedFrom,
            booked_to: bookedTo,
        },
        success: function (response) {
            let tableData = response["data"];
            console.table(tableData);
            tableData.forEach((element) => {
                let table_no = element["table_no"];
                let capacity = element["capacity"];
                $(".selection-box").append(`
                    <label class='list-group-item' >
                        <input class='form-check-input me-1' type='checkbox' value='${table_no}' name='tables[]'>  Table No. : ${table_no} & Capacity : ${capacity}
                        </label>
                `);
            });

            $(".booking-field").removeClass("d-none");
        },
    });
}

function allSelectToggle(allselectinput, selectionbox) {
    let allSelectInputBtn = $("#" + allselectinput);
    let inputSelection = $("." + selectionbox + " input[type=checkbox]");
    // console.log(inputSelectionBox);

    if (allSelectInputBtn.prop("checked")) {
        $.each(inputSelection, function () {
            $(this).prop("checked", true);
        });
    } else {
        $.each(inputSelection, function () {
            $(this).prop("checked", false);
        });
    }
}

$.each($(".selection-box input[type=checkbox]"), function () {
    $(this).on("click", function () {
        let allInputs = $(".selection-box input[type=checkbox]");
        let unchecked = 0;
        $(allInputs).each(function (e) {
            if (!$(this).is(":checked")) {
                unchecked++;
            }
        });
        if (unchecked < allInputs.length && unchecked > 0) {
            $(".all-select-input").prop("checked", false);
        } else if (unchecked == 0) {
            $(".all-select-input").prop("checked", true);
        }
    });
});

function setCancelBooking(hidden_input, id) {
    $("#" + hidden_input).val(id);
}

function getQueryParams() {
    let url = window.location.href;
    const new_url = new URL(url);
    const searchParams = new_url.search;

    if (searchParams.length != 0) {
        const paramArr = url.slice(url.indexOf("?") + 1).split("&");
        const params = {};
        paramArr.map((param) => {
            const [key, val] = param.split("=");
            params[key] = decodeURIComponent(val);
        });
        return [params, searchParams];
    } else {
        return 0;
    }
}

function show_modal(id) {
    $("#" + id).modal("show");
}

function showProductData(id) {
    $("#product-data-tbody").html("");
    $.ajax({
        type: "POST",
        url: "/admin/ajax-request",
        data: {
            isset_get_product_data: true,
            id: id,
        },
        success: function (response) {
            if (response["status"] === true) {
                let data = response["data"];

                data.forEach((element) => {
                    $("#product-data-tbody").append(`
                     <tr>
                        <td>${element["product_id"]}</td>
                        <td>${element["product_name"]}</td>
                        <td>${element["product_unit"]}</td>
                        <td>${element["product_qty"]}</td>
                        <td>${element["price_per_unit"]}</td>
                        <td>${element["product_price"]}</td>
                     </tr>
                     `);
                });
                show_modal("product-details-modal");
            }
        },
    });
}

function editOrder(order_id, redirecturl) {
    sessionStorage.clear();
    sessionStorage.setItem("edit_order_id", order_id);
    window.location.href = redirecturl;
}

// redired to function
function redirectTo(url) {
    sessionStorage.clear();
    window.location.href = url;
}

// function to get booking data
function getBookingData(month) {
    $.ajax({
        type: "POSt",
        url: "/admin/ajax-request",
        data: {
            isset_get_booking_data: true,
            month: month,
        },

        success: function (response) {
            $("#booking-data-tbody").html("");
            let data = response["data"];
            if (data.length != 0) {
                data.forEach((element) => {
                    $("#booking-data-tbody").append(`
                        <tr>
                            <td class='text-center'>${element["booking_id"]}</td>
                            <td class='text-center'>${element["name"]}</td>
                            <td class='text-center'>${element["mobile"]}</td>
                            <td class='text-center'>${element["no_of_people"]}</td>
                            <td class='text-center'>${element["booked_from"]}</td>
                            <td class='text-center'>${element["booked_to"]}</td>
                        </tr>
                      `);
                });
            } else {
                $("#booking-data-tbody").html(`
                <div class="data-not-found">
                <img src="../admin-assets/assets/images/icons/not-found.webp"
                    height="100">
                 </div>
                `);
            }
        },
    });
}

// call getbookingdata function on page load
if (sessionStorage.getItem("booking_month") !== null) {
    let month = sessionStorage.getItem("booking_month");
    getBookingData(month);
    $("#booking-filter").val(month);
} else {
    getBookingData("January");
}

// get booking data

function getBookingDataOnChange(id) {
    let month = $("#" + id).val();
    sessionStorage.setItem("booking_month", month);
    getBookingData(month);
}

// function to get order data

function getOrderData(month) {
    $.ajax({
        type: "POSt",
        url: "/admin/ajax-request",
        data: {
            isset_get_order_data: true,
            month: month,
        },
        success: function (response) {
            $("#order-data-tbody").html("");
            let data = response["data"];
            if (data.length != 0) {
                data.forEach((element) => {
                    let status = "";
                    if (element["status"] == "completed") {
                        status =
                            "<span class='badge text-bg-success'>Completed</span>";
                    } else {
                        status =
                            "<span class='badge text- bg-danger text-nowrap'>Not Completed</span>";
                    }
                    $("#order-data-tbody").append(`
                        <tr>
                            <td class='text-center'> <a href='javascript:;' onclick=editOrder('${element["order_id"]}','/admin/')> ${element["order_id"]}</a></td>
                            <td class='text-center'>
                               <a href="javascript:;" onclick="showProductData(${element["id"]})"  class="text-primary">View</a>
                            </td>
                            <td class='text-center'>${status}</td>
                            <td class='text-center'>${element["grand_amount"]}</td>
                            <td class='text-center'>${element["payment_method"]}</td>
                        </tr>
                      `);
                });
            } else {
                $("#order-data-tbody").html(`
                <div class="data-not-found">
                <img src="../admin-assets/assets/images/icons/not-found.webp"
                    height="100">
                 </div>
                `);
            }
        },
    });
}

function getOrderDataOnChange(id) {
    let month = $("#" + id).val();
    sessionStorage.setItem("order_month", month);
    getOrderData(month);
}

// call getorderData function on page load

if (sessionStorage.getItem("order_month") !== null) {
    let month = sessionStorage.getItem("order_month");
    getOrderData(month);
    $("#all-order-filter").val(month);
} else {
    getOrderData("January");
}

function markAttendance(parent_id, btn_id) {
    let parent = $("#" + parent_id);
    let buttons = parent.find("button");
    buttons.removeClass("active");
    $("#" + btn_id).addClass("active");
}

function setLogIn(this_value, secondLogin) {
    $("#" + secondLogin).attr("value", this_value);
}
function setLogOut(this_value, secondLogout) {
    $("#" + secondLogout).attr("value", this_value);
}

function setProfileTab(href) {
    localStorage.setItem("profile-tab", href);
}

function removeFollowUp(inputId) {
    let remove_input = $("#" + inputId).val();
    let remove_input_arr = remove_input.split(",");

    let senddata = {
        input: remove_input_arr,
    };

    $.confirm({
        icon: "fas fa-exclamation-triangle ",
        title: "Warning",
        content:
            "Are you sure you want to remove the data from follow up inquiry ?",
        type: "orange",
        typeAnimated: true,
        draggable: false,
        theme: "modern",
        columnClass: "m",
        buttons: {
            remove: {
                text: "Remove",
                btnClass: "btn-orange",
                action: function () {
                    Preloader("flex");
                    $.ajax({
                        type: "get",
                        url: "/reception/remove-follow-up",
                        data: senddata,
                        success: function (response) {
                            let status = response["status"];
                            if (status === true) {
                                Preloader("none");
                                successConfirm(
                                    response["message"],
                                    response["redirect"]
                                );
                            } else {
                                Preloader("none");
                                dangerConfirm(
                                    response["message"],
                                    response["redirect"]
                                );
                            }
                        },
                    });
                },
            },
            cancel: function () { },
        },
    });
}

function removeSuccessfullInquiry(inputId) {
    let remove_input = $("#" + inputId).val();
    let remove_input_arr = remove_input.split(",");

    let senddata = {
        input: remove_input_arr,
    };

    $.confirm({
        icon: "fas fa-exclamation-triangle ",
        title: "Warning",
        content:
            "Are you sure you want to remove the data from successfully inquiry ?",
        type: "orange",
        typeAnimated: true,
        draggable: false,
        theme: "modern",
        columnClass: "m",
        buttons: {
            remove: {
                text: "Remove",
                btnClass: "btn-orange",
                action: function () {
                    Preloader("flex");
                    $.ajax({
                        type: "get",
                        url: "/reception/remove-successfull",
                        data: senddata,
                        success: function (response) {
                            let status = response["status"];
                            if (status === true) {
                                Preloader("none");
                                successConfirm(
                                    response["message"],
                                    response["redirect"]
                                );
                            } else {
                                Preloader("none");
                                dangerConfirm(
                                    response["message"],
                                    response["redirect"]
                                );
                            }
                        },
                    });
                },
            },
            cancel: function () { },
        },
    });
}

