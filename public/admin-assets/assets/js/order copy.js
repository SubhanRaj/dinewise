if (localStorage.getItem('edit_order_id') !== null) {
    let order_id = localStorage.getItem('edit_order_id')
 
    $.ajax({
        type: "POST",
        url: "/admin/get-order-details",
        data: {
            order_id: order_id
        },
        success: function (response) {
 

            setCustomerLoyaltyPoints(response['customer_id_or_booking_id'])

            localStorage.setItem('orderSelectedCategory', 'stared')
            localStorage.setItem('total_item', response['total_item'])
            localStorage.setItem('total_amount', response['total_amount'])
            localStorage.setItem('customer_id_or_booking_id', response['customer_id_or_booking_id'])
            localStorage.setItem('customer_or_booking', response['customer_or_booking'])
            localStorage.setItem('discount_amount', response['discount_amount'])
            localStorage.setItem('grand_amount', response['grand_amount'])
            localStorage.setItem('gst_amount', response['gst_amount'])
            localStorage.setItem('orderInstruction', response['orderInstruction'])
            localStorage.setItem('payable_amount', response['payable_amount'])
            localStorage.setItem('loyalty_discount', response['loyalty_discount'])
            localStorage.setItem('loyalty_points_using', response['loyalty_points_using'])

            if (response['payment_method'] != '') {
                localStorage.setItem('payment_method', response['payment_method'])
                localStorage.setItem('other_method', response['other_method'])
            }

            localStorage.setItem('productData', JSON.stringify(response['productData']))
            localStorage.setItem('selectedTables', response['selectedTable'])
            localStorage.setItem('no_of_people', response['no_of_people'])
            localStorage.setItem('saved', true)
            localStorage.setItem('saved_order_id', order_id)

            getProducts()
            getSelectedItem()
            setCustomerSelectionButton()
            showOrderInstruction()
            calculateAmountDetails()
            discountAndPayableAmountDetails()
            showOrderStatus()
            getOrderDetails()
            getNumberOfPeople()
            getPaymentMethod()

            
           
        }
    });
}

function downloadPDF(url, filename) {
    fetch(url)
        .then(response => response.blob())
        .then(blob => {
            const url = URL.createObjectURL(blob);
            const link = document.createElement('a');
            link.href = url;
            link.download = filename;
            link.click();
            URL.revokeObjectURL(url);
        });
}


// ================= billing section started ================
// ================= billing section started ================
// ================= billing section started ================
// ================= billing section started ================
// ================= billing section started ================
// ================= billing section started ================
// ================= billing section started ================
// ================= billing section started ================

$.each($('.billing-toggle'), function () {
    $(this).on('click', function () {

        let dataBillingBox = $(this).attr('data-billing-box')
        $('.billing-box').addClass('d-none').removeClass('d-block')
        $('#' + dataBillingBox).addClass('d-block').removeClass('d-none')
        $('.billing-toggle').removeClass('active')
        $(this).addClass('active')

        let toggle_btn_id = $(this).attr('id');
        localStorage.setItem('toggleBillingBoxBtn', toggle_btn_id)
        localStorage.setItem('toggleBillingBox', dataBillingBox)
    })
})


$.each($('.collect-payment-method'), function () {
    $(this).on('change', function () {
        if ($(this).prop('checked')) {
            let this_value = $(this).val();
            if (this_value == 'other') {
                $('#collect-payment-other').removeClass('d-none')
            } else {
                $('#collect-payment-other').addClass('d-none')
            }
        }
    })
});


// get product of category

function orderCategory(cat) {

    localStorage.setItem('orderSelectedCategory', cat)

    $('.order-product-box .order-spiner').removeClass('d-none').addClass('d-flex')
    $('.order-navigation .list-group-item').removeClass('active');
    $.each($('.order-navigation .list-group-item'), function () {
        if ($(this).attr('data-category') == cat) {
            $(this).addClass('active');
        } else {
            $(this).removeClass('active');
        }
    });

    $.ajax({
        type: "POST",
        url: "/admin/ajax-request",
        data: ({
            isset_select_category: 1,
            cat_id: cat
        }),
        success: function (response) {
            $('#order-product-data').html('')
            let status = response['status']
            let data = response['data']

            if (status === true) {
                data.forEach(e => {
                    let auto_product_id = e['auto_product_id']
                    let name = e['name']
                    let img = e['img']
                    let price_arr = e['price']
                    let stared = e['stared']
                    let multiplePrice;
                    let enableDropDown;
                    let selectProduct;
                    let star_icon;
                    let dropdown = `<div class="dropend">
                    <ul class="dropdown-menu bg-info">`;

                    if (price_arr.length > 1) {
                        price_arr.forEach(element => {
                            let unit_name = element[0]
                            let price = element[1]
                            dropdown += `<li><a class="dropdown-item text-dark d-flex justify-content-between" href="javascript:;" onclick=selectProduct('${auto_product_id}','${unit_name}','${price}','${auto_product_id}')><span> ${unit_name}</span> <span>₹ ${price}</span></a>
                        </li>`
                        });
                        multiplePrice = true;
                        enableDropDown = `data-bs-toggle="dropdown"`
                        selectProduct = '';
                    } else {
                        let price_unit = price_arr[0][0]
                        let price = price_arr[0][1]
                        multiplePrice = false
                        enableDropDown = ''
                        selectProduct = `onclick=selectProduct('${auto_product_id}','${price_unit}','${price}','${auto_product_id}')`;
                    }
                    dropdown += `</ul>
                  </div>`

                    if (stared === true) {
                        star_icon = `<i class="star-icon fa-sharp fa-solid fa-star font-18 text-warning" ></i>`
                    } else {
                        star_icon = `<i class="star-icon fa-thin fa-star text-info" ></i>`
                    }

                    // set green color if product is selected 
                    let selected_or_not = '';
                    let matched = 0;
                    if (localStorage.getItem('productData') !== null) {
                        productData = JSON.parse(localStorage.getItem('productData'))
                        productData.forEach(element => {
                            let product_id = element['product_id'];
                            if (product_id == auto_product_id) {
                                matched++;
                            }
                        });
                    }

                    if (matched > 0) {
                        selected_or_not = 'order-product-selected'
                    } else {
                        selected_or_not = ''
                    }


                    $('#order-product-data').append(`
                   <div class="col-lg-4 col-md-4 col-sm-6">
                    <div class="card radius-10 order-product-card ${selected_or_not}" id='${auto_product_id}' ${enableDropDown} data-price-type='${multiplePrice}' ${selectProduct}>
                      <div class="card-body pb-0">
                          <div>
                              <div class="d-flex align-items-center">
                                  <div class="order-product-img p-1 rounded">
                                      ${img}
                                  </div>
                              </div>
                              <p>  ${name}
                              </p>
                              <div class="order-product-star ms-auto font-13" onclick=markStar('${auto_product_id}',event)>
                                 ${star_icon}
                              </div>
                          </div>
                      </div>
                      ${dropdown}
                   </div>
                   </div>
                   `)
                });

            } else {
                $('#order-product-data').html(`<img src="${websiteUrl}/admin-assets/assets/images/icons/not-found.webp" class='order-not-found'>`)
            }

            $('.order-product-box .order-spiner').removeClass('d-flex').addClass('d-none')

        }
    });
}




// initialize order data default on page load 
function getProducts() {
    if (localStorage.getItem('orderSelectedCategory') === null) {
        orderCategory('stared')
    } else {
        let orderSelectedCategory = localStorage.getItem('orderSelectedCategory');
        orderCategory(orderSelectedCategory)
    }

}
getProducts()

// mark star

function markStar(auto_product_id, event) {
    event.preventDefault();
    $.ajax({
        type: "POST",
        url: "/admin/ajax-request",
        data: {
            isset_mark_star: 1,
            product_id: auto_product_id
        },
        success: function (response) {
            let data = response['data']
            orderCategory(localStorage.getItem('orderSelectedCategory'))
            $('#stared-count').text(data)
        }
    });
}


// select table modal 

function selectTableModal(modal_id) {
    $('#order-table-details').html('')
    $('#' + modal_id).modal('show')
    $('#table-select-modal .order-spiner').removeClass('d-none').addClass('d-flex')
    $.ajax({
        type: "POST",
        url: "/admin/ajax-request",
        data: {
            isset_table_selection: 1
        },
        success: function (response) {
            let data = response['data']
            // get selected table from localstorage 
            let selectedTables = localStorage.getItem('selectedTables')
            let selectTable_arr = []
            if (selectedTables === null) {
                selectTable_arr = []
            } else {
                selectTable_arr = JSON.parse(selectedTables)
            }

            data.forEach(element => {
                let table_no = element['table_no']
                let status = element['status']

                let selectedCard;
                let selectedInput;
                if (selectTable_arr.indexOf(table_no) > -1) {
                    selectedCard = 'order-product-selected-table';  // add selected class
                    selectedInput = 'checked' // make selected checkbox
                } else {
                    selectedCard = ''
                    selectedInput = ''
                }

                if (status === 'available') {
                    $('#order-table-details').append(`
                 <div class="col-lg-2 col-md-3 col-6 mb-2">
                    <label for='table${table_no}' class='d-block'>
                     <div class="position-relative card radius-10 select-order-table ${selectedCard}" data-table-no='${table_no}'  id='select-table-card${table_no}'>
                       <input type = 'checkbox' value='${table_no}' class='form-check-input position-absolute my-2 mx-2' id='table${table_no}' onchange=markTable('table${table_no}','select-table-card${table_no}')  ${selectedInput}>
                         <div class="card-body pb-0 position-relative">
                             <div class="text-center">
                                 <div class="widgets-icons rounded-circle mx-auto bg-gradient-blues text-white mb-3">
                                     <i class="fa-solid fa-utensils"></i>
                                 </div>
                                 <h4>${table_no}</h4>
                             </div>
                         </div>
                     </div>
                    </label> 
                </div>
                 `)
                } else {
                    $('#order-table-details').append(`
                    <div class="col-lg-2 col-md-3 col-6 mb-2"  >
                        <div class="card radius-10"  >
                            <div class="card-body pb-0 position-relative">
                                <div class="text-center">
                                    <div
                                        class="widgets-icons rounded-circle mx-auto bg-light-danger text-danger mb-3">
                                        <i class="fa-solid fa-fork-knife"></i>
                                    </div>
                                    <h4>${table_no}</h4>
                                </div>
                                
                            </div>
                        </div>
                    </div>
                    `)
                }
                {/* <a href='javascript:;' class='cursor-pointer' > <i class="fa-light fa-circle-info text-info font-18 order-table-select-i" ></i></a> */ }

            });

            $('#table-select-modal .order-spiner').removeClass('d-flex').addClass('d-none')
        }
    });
}

// selection table function 

function markTable(table_input_id, tableSelectionCard) {
    let selection_input_value = $('#' + table_input_id)

    if (selection_input_value.prop('checked')) {
        $('#' + tableSelectionCard).addClass('order-product-selected-table')
    } else {
        $('#' + tableSelectionCard).removeClass('order-product-selected-table')
    }
}

// select table from dashboard 

function selectTableFromDashboard(table_no, url) {
    let tables = [table_no]
    localStorage.clear()
    localStorage.setItem('selectedTables', JSON.stringify(tables))
    window.location.href = url
}

function selectTable() {
    let tables_box = $('.select-order-table input[type=checkbox]')

    let selectedArr = [];

    for (let i = 0; i < tables_box.length; i++) {
        if ($(tables_box[i]).prop('checked')) {
            let value = $(tables_box[i]).val();
            selectedArr.push(value)
        }
    }

    if (selectedArr.length != 0) {
        localStorage.setItem('selectedTables', JSON.stringify(selectedArr))
        round_alert('success', 'Table selected successfully')
        $('#table-select-modal').modal('hide')
    } else {
        round_alert('error', 'Table not selected')
    }
}

// customer search function 

function searchCustomer(this_value, search_in, search_result_area, search_input_id) {
    // here search_in means either customer search in customer database of booking database 
    let search_input = $("#" + search_input_id);
    $('#' + search_result_area + ' .search-ul').html('')

    if (this_value == '' || this_value.length == 0) {
        $('#' + search_result_area).hide()
    } else {

        $.ajax({
            type: "POST",
            url: "/admin/ajax-request",
            data: ({
                isset_search_customer: 1,
                search_in: search_in,
                search_value: this_value
            }),
            success: function (response) {
                let data = response['data']
                $('#' + search_result_area + ' .search-ul').html('')
                if (data.length != 0) {
                    data.forEach(element => {
                        let id = element['id']
                        let name = element['name']

                        $("#" + search_result_area).show()
                        $('#' + search_result_area + ' .search-ul').append(`
                           <li><a href='javascript:;' onclick=selectCustomerModal('${id}','${search_in}')>${name}</a></li>
                       `)
                    });
                } else {
                    $('#' + search_result_area + ' .search-ul').append(`
                         <li><a href='javascript:;'>0 Search Result</a></li>
                         `)
                }
            }
        });

    }
}


function selectCustomerModal(id, search_in) {
    $('#selected-customer-details').modal('show')
    // customer-details-data
    $.ajax({
        type: "POST",
        url: "/admin/ajax-request",
        data: ({
            isset_selected_customer_details: 1,
            id: id,
            search_in: search_in
        }),
        success: function (response) {
            let data = response['data']

            if (data.length != 0) {
                if (search_in == 'customers') {
                    let id = data['id']
                    let name = data['name']
                    let phone = data['phone']
                    let email = data['email']
                    let dob = data['dob']
                    let doa = data['doa']

                    $('#customer_or_booking').val(`customers`)
                    $('#customer_id_or_booking_id').val(`${id}`)

                    $('#customer-details-data').html(`
                     <li class="list-group-item"><span>Name</span> <span> ${name}</span></li>
                     <li class="list-group-item"><span>Phone</span> <span> ${phone}</span></li>
                     <li class="list-group-item"><span>Email</span> <span> ${email}</span></li>
                     <li class="list-group-item"><span>Date Of Birth</span> <span> ${dob}</span></li>
                     <li class="list-group-item"><span>Date Of Anniversary</span> <span> ${doa}</span></li>
                   `)
                } else if (search_in == 'bookings') {
                    let id = data['id']
                    let booking_id = data['booking_id']
                    let name = data['name']
                    let phone = data['phone']
                    let email = data['email']
                    let address = data['address']
                    let no_of_people = data['no_of_people']
                    let event = data['event']
                    let booked_from = data['booked_from']
                    let booked_to = data['booked_to']
                    let tables = data['tables']
                    let amount = data['amount']
                    let description = data['description']
                    let created_at = data['created_at']

                    $('#customer_or_booking').val(`bookings`)
                    $('#customer_id_or_booking_id').val(`${id}`)

                    $('#customer-details-data').html(`
                        <li class="list-group-item"><span>Booking Id</span> <span> ${booking_id}</span></li>
                        <li class="list-group-item"><span>Name</span> <span> ${name}</span></li>
                        <li class="list-group-item"><span>Phone Number</span> <span> ${phone}</span></li>
                        <li class="list-group-item"><span>Email</span> <span> ${email}</span></li>
                        <li class="list-group-item"><span>Address</span> <span> ${address}</span></li>
                        <li class="list-group-item"><span>No. Of People</span> <span> ${no_of_people}</span></li>
                        <li class="list-group-item"><span>Event</span> <span> ${event}</span></li>
                        <li class="list-group-item"><span>Booked From</span> <span> ${booked_from}</span></li>
                        <li class="list-group-item"><span>Booked To</span> <span> ${booked_to}</span></li>
                      
                        <li class="list-group-item"><span>Amount</span> <span> ${amount}</span></li>
                        <li class="list-group-item"><span>Dated</span> <span> ${created_at}</span></li>
                        <li class="list-group-item text-center"> <span>Description <i class='fa-solid fa-arrow-down text-primary'> </i></span>   </li>
                        <li class="list-group-item text-center"> ${description}</li>
                      `)
                }
            } else {

            }

            if (localStorage.getItem('customer_or_booking') !== null && localStorage.getItem('customer_id_or_booking_id') !== null) {
                $('#customer-selection-dis-selection-btn').html(`
                                 <button type="button" data-bs-toggle="tooltip" data-bs-title="Select"
                                     data-bs-placement="auto" class="btn btn-danger" onclick="setCustomer('minus')">
                                     <i class="fa-regular fa-trash"></i>
                                 </button>
                 `)
            } else {
                $('#customer-selection-dis-selection-btn').html(`
                <button type="button" data-bs-toggle="tooltip" data-bs-title="Select"
                    data-bs-placement="auto" class="btn btn-warning" onclick="setCustomer('plus')">
                    <i class="fa-regular fa-plus"></i>
                </button>
                `)
            }


        }
    });
}

// set customer type and customer id in locastorage

function setCustomerLoyaltyPoints(customer_id) {
    // get loyalty points of this customer 
    $.ajax({
        type: "post",
        url: "/admin/ajax-request",
        data: {
            isset_get_customer_loyalty_points: 1,
            customer_id_or_booking_id: customer_id
        },
        success: function (response) {
            localStorage.setItem('customer_loyalty_points', response)
            showLoyaltyCheckbox()
        }
    });
}

function setCustomer(plus_minus) {

    if (plus_minus == 'plus') {
        let customer_or_booking = $('#customer_or_booking').val()
        let customer_id_or_booking_id = $('#customer_id_or_booking_id').val()

        localStorage.setItem('customer_or_booking', customer_or_booking)
        localStorage.setItem('customer_id_or_booking_id', customer_id_or_booking_id)

        setCustomerLoyaltyPoints(customer_id_or_booking_id)

        setAlertData('Customer Selected', false)
    } else {
        localStorage.removeItem('customer_or_booking')
        localStorage.removeItem('customer_id_or_booking_id')
        localStorage.removeItem('customer_loyalty_points')
    }

    window.location.reload()
}

// set the customer selection button 

function setCustomerSelectionButton() {
    if (localStorage.getItem('customer_or_booking') !== null && localStorage.getItem('customer_id_or_booking_id') !== null) {
        let customer_or_booking = localStorage.getItem('customer_or_booking');
        let customer_id_or_booking_id = localStorage.getItem('customer_id_or_booking_id');
        $('#customer-selection-btn').html(`
          <button type="button" data-bs-toggle="tooltip" data-bs-title='Customer Details'
                data-bs-placement='auto' class="btn btn-success ms-2"
              onclick="selectCustomerModal('${customer_id_or_booking_id}','${customer_or_booking}')"><i class="fa-solid fa-user-check"></i>
     </button>
      `)
    } else {
        $('#customer-selection-btn').html(`
    <button type="button" data-bs-toggle="tooltip" data-bs-title='Customer Details'
            data-bs-placement='auto' class="btn btn-white ms-2"
            onclick="show_modal('order-customer-details')"><i class="fa-solid fa-user"></i>
    </button> 
    `)
    }
}

setCustomerSelectionButton()

// set number of people 

function saveNumberOfPeople() {
    let people = $('#number_of_people').val();
    if (people > 0) {
        localStorage.setItem('no_of_people', people)
        $('#order-no-of-people').modal('hide')
        round_alert('success', 'Number of people set');
    } else {
        round_alert('error', 'Please enter a valid number')
    }

}

function getNumberOfPeople() {
    if (localStorage.getItem('no_of_people') !== null) {
        let people = localStorage.getItem('no_of_people')
        $('#number_of_people').val(people)
    }
}
getNumberOfPeople()


// reset order 

function resetOrder() {
    localStorage.clear();

    window.location.reload();

}

// select products 
function selectProduct(pro_id, pro_unit, pro_price, this_id) {
    let productData
    let n = 0;
    if (localStorage.getItem('productData') === null) {
        productData = []
    } else {
        productData = JSON.parse(localStorage.getItem('productData'))
        productData.forEach(element => {
            let product_id = element['product_id'];
            let product_unit = element['product_unit'];
            if (product_id == pro_id && product_unit == pro_unit) {
                n++;
            }
        });

    }

    if (n == 0) {
        let pro_obj = {
            product_id: pro_id,
            product_unit: pro_unit,
            product_qty: 1,
            price_per_unit: pro_price,
            product_price: pro_price,
            order_status: 'Recieved'
        }
        productData.push(pro_obj)
        localStorage.setItem('productData', JSON.stringify(productData))

        $('#' + this_id).addClass('order-product-selected')

        let product_name = $('#' + this_id + ' p').text()

        $('#selected-item-tbody').append(`
             <tr id = tr${pro_id + pro_unit}>
             <td style="width:20px" class="p-0 align-middle"> <button type="button"
                     class="order-remove-btn" onclick=removeProductFromSelectedItem('${pro_id}${pro_unit}')> <i
                         class="fa-regular fa-circle-xmark text-danger"></i></button>
             </td>
             <td class="font-13 px-0 align-middle">
                   ${product_name}
                 <span class="order-item-unit text-secondary">${pro_unit}</span>
             </td>
             <td>
                 <div class="order-quantity-box">
                     <div class="input-group flex-nowrap">
                         <button class="input-group-text" onclick=increaseQuantity('${pro_id}${pro_unit}','minus')>
                             <i class="fa-regular fa-minus"></i>
                         </button>
                         <input type="text" class="form-control pe-none" style="max-width:50px"
                             value="1" readonly>
                         <button class="input-group-text" onclick=increaseQuantity('${pro_id}${pro_unit}','plus')>
                             <i class="fa-regular fa-plus"></i>
                         </button>
                     </div>
                 </div>
             </td>
             <td class="text-end item-price">
                 ${pro_price}
                 </td>
             </tr>
         
        `)
    }
    showHideEmptyIcon()
    calculateAmountDetails()
    reInitiateAmountDetails()

}

// get selected item when page reload

function getSelectedItem() {
    if (localStorage.getItem('productData') !== null) {
        let productData = JSON.parse(localStorage.getItem('productData'));

        productData.forEach(element => {
            let product_id = element['product_id']
            let product_unit = element['product_unit']
            let product_qty = element['product_qty']
            let product_price = element['product_price']

            $.ajax({
                type: "POSt",
                url: "/admin/ajax-request",
                data: {
                    isset_product_name: true,
                    product_id: product_id
                },
                success: function (response) {
                    let product_name = response['name']
                    $('#selected-item-tbody').append(`
                <tr id = tr${product_id + product_unit}>
                  <td style="width:20px" class="p-0 align-middle"> <button type="button"
                          class="order-remove-btn" onclick=removeProductFromSelectedItem('${product_id}${product_unit}')> <i
                              class="fa-regular fa-circle-xmark text-danger"></i></button>
                  </td>
                   <td class="font-13 px-0 align-middle">
                         ${product_name}
                       <span class="order-item-unit text-secondary">${product_unit}</span>
                   </td>
                <td>
                    <div class="order-quantity-box">
                        <div class="input-group flex-nowrap">
                            <button class="input-group-text" onclick=increaseQuantity('${product_id}${product_unit}','minus')>
                                <i class="fa-regular fa-minus"></i>
                            </button>
                            <input type="text" class="form-control pe-none" style="max-width:50px"
                                value="${product_qty}" readonly >
                            <button class="input-group-text"  onclick=increaseQuantity('${product_id}${product_unit}','plus')>
                                <i class="fa-regular fa-plus"></i>
                            </button>
                        </div>
                    </div>
                </td>
                <td class="text-end item-price">
                    ${product_price}
                    </td>
                </tr>
            
               `)
                }
            });

        });
    }


    showHideEmptyIcon()

}
getSelectedItem()

// remove product from selected item 

function removeProductFromSelectedItem(given_pro_unit) {

    let pro_data = JSON.parse(localStorage.getItem('productData'))

    let new_pro_arr = []

    pro_data.forEach(element => {
        let pro_id = element['product_id']
        let price_per_unit = element['price_per_unit']
        let pro_price = element['product_price']
        let pro_qty = element['product_qty']
        let pro_unit = element['product_unit']

        let create_product_unit = pro_id + pro_unit
        if (given_pro_unit != create_product_unit) {
            let pro_obj = {
                product_id: pro_id,
                product_unit: pro_unit,
                product_qty: pro_qty,
                price_per_unit: price_per_unit,
                product_price: pro_price,
                order_status: element['order_status']
            }

            new_pro_arr.push(pro_obj)
        }
    });

    localStorage.setItem('productData', JSON.stringify(new_pro_arr))
    $('#tr' + given_pro_unit).remove()
    getProducts()

    showHideEmptyIcon()
    calculateAmountDetails()
    reInitiateAmountDetails()

}





function increaseQuantity(given_pro_unit, plus_minus) {

    let pro_data = JSON.parse(localStorage.getItem('productData'))

    let new_pro_arr = []

    pro_data.forEach(element => {
        let pro_id = element['product_id']
        let pro_price = parseFloat(element['product_price'])
        let price_per_unit = parseFloat(element['price_per_unit'])
        let pro_qty = element['product_qty']
        let pro_unit = element['product_unit']

        let create_pro_id = pro_id + pro_unit
        if (given_pro_unit == create_pro_id) {
            if (plus_minus == 'plus') {
                pro_price += price_per_unit
                pro_qty++
            } else {
                if (pro_qty > 1) {
                    pro_qty--
                    pro_price -= price_per_unit
                }

            }
            $('#tr' + given_pro_unit + ' input').val(pro_qty)
            $('#tr' + given_pro_unit + ' .item-price').text(pro_price)
        }


        let pro_obj = {
            product_id: pro_id,
            product_unit: pro_unit,
            product_qty: pro_qty,
            price_per_unit: price_per_unit,
            product_price: pro_price,
            order_status: element['order_status']
        }
        new_pro_arr.push(pro_obj)
    });

    localStorage.setItem('productData', JSON.stringify(new_pro_arr))

    calculateAmountDetails()
    reInitiateAmountDetails()

}


function showHideEmptyIcon() {
    let productData = localStorage.getItem('productData');
    if (productData !== null) {
        if (JSON.parse(productData).length != 0) {
            $('.empty-selected-item').addClass('d-none').removeClass('d-block')
        } else {
            $('.empty-selected-item').addClass('d-block').removeClass('d-none')
        }
    } else {
        $('.empty-selected-item').addClass('d-block').removeClass('d-none')
    }
}

// show order instruction default

function showOrderInstruction() {
    if (localStorage.getItem('orderInstruction') !== null) {
        $('#order-instructions').val(localStorage.getItem('orderInstruction'))
    }
}

showOrderInstruction()


// save order instruction 

function saveOrderInstruction(order_instruction) {
    let orderInstruction_data = $('#' + order_instruction).val()
    if (orderInstruction_data != '') {
        localStorage.setItem('orderInstruction', orderInstruction_data)
        success_noti('Order instruction saved successfully')
    } else {
        danger_noti('Please enter order instruction')
    }

}

function generateKOT(btn_span_id, print_or_download) {

    let productData = localStorage.getItem('productData');
    let selectedTables = localStorage.getItem('selectedTables')

    let old_btn = $('#' + btn_span_id).html();
    $('#' + btn_span_id).html('<span class="spinner-border spinner-border-sm"></span>')

    if (productData === null) {
        danger_noti('Please select product first')
        $('#' + btn_span_id).html(old_btn)
    } else if (JSON.parse(productData).length == 0) {
        danger_noti('Please select product first')
        $('#' + btn_span_id).html(old_btn)

    } else if (selectedTables === null) {
        danger_noti('Please select table')
        $('#' + btn_span_id).html(old_btn)
    } else if (JSON.parse(selectedTables).length == 0) {
        danger_noti('Please select table')
        $('#' + btn_span_id).html(old_btn)
    } else {
        if (JSON.parse(productData).length != 0) {
            $.ajax({
                type: "POST",
                url: "/admin/ajax-request",
                data: {
                    isset_generate_kot: true,
                    tables: JSON.parse(selectedTables),
                    product_data: JSON.parse(productData),
                    orderInstruction: localStorage.getItem('orderInstruction')
                },
                success: function (response) {
                    if (response['status']) {
                        $('#' + btn_span_id).html(old_btn)
                        let url = response['url']
                        let filename = response['filename']
                        if (print_or_download == 'download') {
                            downloadPDF(url, filename)
                        } else {
                            window.open(url, '_blank')
                        }

                    } else {
                        console.log(response)
                    }
                }
            });
        } else {
            danger_noti('Please select product first')
            $('#' + btn_span_id).html(old_btn)
        }
    }
}


// convert number into indian currency 
const toIndianCurrency = (num) => {
    const curr = num.toLocaleString('en-IN', {
        style: 'currency',
        currency: 'INR'
    });
    return curr;
};

// convert numbers into indian number system 

const toIndiaNumberSystem = (num) => {
    const number = num.toLocaleString('en-IN');
    return number;
}

// calculate amount details . this will work when page reload

function calculateAmountDetails() {

    let total_item = 0;
    let total_amount = 0;
    let gst_amount = 0;
    let grand_amount = 0;


    if (localStorage.getItem('productData') !== null) {
        let productData = JSON.parse(localStorage.getItem('productData'))
        if (productData.length != 0) {
            total_item = productData.length;
            total_amount = 0;

            productData.forEach(element => {
                let pro_id = element['product_id']
                let pro_price = parseFloat(element['product_price'])
                let price_per_unit = parseFloat(element['price_per_unit'])
                let pro_qty = element['product_qty']
                let pro_unit = element['product_unit']

                total_amount += parseFloat(pro_price)
            })

            $("#amount-details-total-item").text(toIndiaNumberSystem(total_item))
            $("#amount-details-total-amount").text(toIndianCurrency(total_amount))

            // calculate gst amount 
            gst_amount = Math.ceil((total_amount * 20) / 100)
            $("#amount-details-gst-amount").text(toIndianCurrency(gst_amount))

            grand_amount = total_amount + gst_amount
            $("#amount-details-grand-amount").text(toIndianCurrency(grand_amount))

        }
    } else {
        $("#amount-details-total-item").text('0')
        $("#amount-details-total-amount").text('0')
        $("#amount-details-gst-amount").text('0')
        $("#amount-details-grand-amount").text('0')

    }

    localStorage.setItem('total_item', total_item)
    localStorage.setItem('total_amount', total_amount)
    localStorage.setItem('gst_amount', gst_amount)
    localStorage.setItem('grand_amount', grand_amount)


}

calculateAmountDetails()

// set discount and Payable amount 

function setDiscountAndPayableAmount() {
    let grandAmount = localStorage.getItem('grand_amount')
    let loyalty_discount = localStorage.getItem('loyalty_discount')

    let discount_amount = $('#discount-input').val()
    let payable_amount = $("#payable-amount-input").val()


    if (loyalty_discount !== null && loyalty_discount != 'null') {
        payable_amount = parseInt(grandAmount) - parseInt(discount_amount) - parseInt(loyalty_discount)
    }

    localStorage.setItem('discount_amount', discount_amount)
    localStorage.setItem('payable_amount', payable_amount)

    success_noti('Amount details saved !')

    discountAndPayableAmountDetails()
}



// calculate payable amount

function calculatePayableAmount(this_value) {
    let discount = this_value;
    let grandAmount = localStorage.getItem('grand_amount')
    let loyalty_discount = localStorage.getItem('loyalty_discount')
    let payableAmount;
    if (loyalty_discount !== null) {
        payableAmount = grandAmount - discount - parseInt(loyalty_discount)
    } else {
        payableAmount = grandAmount - discount
    }

    $("#payable-amount-input").val(payableAmount)


}

// calculate due amount  


function discountAndPayableAmountDetails() {

    let discount_amount = localStorage.getItem('discount_amount')
    let payable_amount = localStorage.getItem('payable_amount')

    $('#discount-input').val(discount_amount);
    $("#payable-amount-input").val(payable_amount)
}

discountAndPayableAmountDetails()

// re- initiate amount details

function reInitiateAmountDetails() {
    localStorage.setItem('discount_amount', 0)
    localStorage.setItem('payable_amount', 0)

    discountAndPayableAmountDetails()
}

// save payment method details 

function savePaymentMethod() {
    let PaymentMethod_input = $('#payment-method input')
    let payment_method = '';
    $.each(PaymentMethod_input, function () {
        if ($(this).prop('checked')) {
            payment_method = $(this).val()
        }
    });

    let other_method;
    if (payment_method == 'other') {
        other_method = $('#payment-method input[name=other_method]').val()
    } else {
        other_method = '';
    }

    // get Payable amount 
    let payable_amount = localStorage.getItem('payable_amount');

    if (payable_amount != '0' || payable_amount != 0) {
        if (payment_method != '') {
            if (payment_method != 'other') {
                localStorage.setItem('payment_method', payment_method)
                localStorage.setItem('other_method', other_method)
                success_noti('Payment method saved')
            } else {
                if (other_method != '') {
                    localStorage.setItem('payment_method', payment_method)
                    localStorage.setItem('other_method', other_method)
                    success_noti('Payment method saved')
                } else {
                    danger_noti('Please fill required field')
                }
            }

        } else {
            danger_noti('Please select a payment method')
        }

    } else {
        round_alert('error', 'Invalid Amount Details.')
    }

}


// get payment method 

function getPaymentMethod() {
    let payment_method = localStorage.getItem('payment_method')
    let other_method = localStorage.getItem('other_method')

    if (payment_method !== null) {
        $(`#payment-method input[value=${payment_method}]`).prop('checked', true)
        if (other_method !== null) {
            $('#payment-method input[name=other_method]').val(other_method)
            $('#collect-payment-other').removeClass('d-none')
        }
    }

}

getPaymentMethod()


function saveOrder() {
    // get product data
    let productData = localStorage.getItem('productData')
    // get selected table 
    let selectedTable = localStorage.getItem('selectedTables')
    // get customer or booking data
    let customer_or_booking = localStorage.getItem('customer_or_booking')
    let customer_id_or_booking_id = localStorage.getItem('customer_id_or_booking_id');

    // get order instruction
    let orderInstruction = localStorage.getItem('orderInstruction');
    // get number of people 
    let people = localStorage.getItem('no_of_people')

    // get amount details 
    let total_item = localStorage.getItem('total_item');
    let total_amount = localStorage.getItem('total_amount');
    let gst_amount = localStorage.getItem('gst_amount');
    let discount_amount = localStorage.getItem('discount_amount');
    let loyalty_points_using = localStorage.getItem('loyalty_points_using') !== null ? localStorage.getItem('loyalty_points_using') : 0;
    let loyalty_discount = localStorage.getItem('loyalty_discount') !== null ? localStorage.getItem('loyalty_discount') : 0;
    let payable_amount = localStorage.getItem('payable_amount');
    let payment_method = localStorage.getItem('payment_method');
    let other_method = localStorage.getItem('other_method');
    let grand_amount = localStorage.getItem('grand_amount');

    if (productData === null) {
        danger_noti('Please select at least 1 product')
    } else if (productData !== null && JSON.parse(productData).length == 0) {
        danger_noti('Please select at least 1 product')
    } else if (selectedTable === null) {
        danger_noti('Please choose table')
    } else if (customer_id_or_booking_id === null) {
        danger_noti('Please add customer details')
    } else if (people === null) {
        danger_noti('Please add number of people')
    } else {
        let saved_status = localStorage.getItem('saved')
        let saved_order_id = localStorage.getItem('saved_order_id');
        let url, data;

        if (saved_status === true || saved_status === 'true' || saved_status === 'partial_saved') {
            url = "/admin/update-order"
            data = {
                isset_save_order_details: true,
                order_id: saved_order_id,
                productData: productData,
                selectedTable: selectedTable,
                customer_or_booking: customer_or_booking,
                customer_id_or_booking_id: customer_id_or_booking_id,
                orderInstruction: orderInstruction,
                total_item: total_item,
                total_amount: total_amount,
                gst_amount: gst_amount,
                discount_amount: discount_amount,
                payable_amount: payable_amount,
                payment_method: payment_method,
                other_method: other_method,
                grand_amount: grand_amount,
                no_of_people: people,
                loyalty_points_using: loyalty_points_using,
                loyalty_discount: loyalty_discount,
            }
        } else {
            url = "/admin/save-order"
            data = {
                isset_save_order_details: true,
                productData: productData,
                selectedTable: selectedTable,
                customer_or_booking: customer_or_booking,
                customer_id_or_booking_id: customer_id_or_booking_id,
                orderInstruction: orderInstruction,
                total_item: total_item,
                total_amount: total_amount,
                gst_amount: gst_amount,
                discount_amount: discount_amount,
                payable_amount: payable_amount,
                payment_method: payment_method,
                other_method: other_method,
                grand_amount: grand_amount,
                no_of_people: people,
                loyalty_points_using: loyalty_points_using,
                loyalty_discount: loyalty_discount,
            }
        }

        $.ajax({
            type: "POST",
            url: url,
            data: data,
            success: function (response) {
                console.log(response)
                if (response['status'] === true) {
                    let data = response['data']
                    localStorage.setItem('saved', true)
                    localStorage.setItem('saved_order_id', data);
                    success_noti(response['msg'])
                    showOrderStatus()  // show order status 
                    getOrderDetails() // get order details

                } else {
                    danger_noti(response['msg'])
                }
            }
        });
    }
}


function changeSaveButton() {
    let saved_status = localStorage.setItem('saved', 'partial_saved')
}

function showOrderStatus() {
    let order_status = localStorage.getItem('saved')
    if (order_status === 'true') {
        $('#order-detail-btn').removeClass('d-none')
        $('#order-status-btn').removeClass('d-none')
    }
}

showOrderStatus()

function getOrderDetails() {
    let order_id = localStorage.getItem('saved_order_id');

    if (order_id !== null) {
        $.ajax({
            type: "POST",
            url: "/admin/get-order-details",
            data: {
                isset_get_order_details: true,
                order_id: order_id
            },
            success: function (response) {

                
                if (response.length !== 0) {
                    let productData = response['productData']
                    let selectedTable = JSON.parse(response['selectedTable']).toString()
                    let customer_or_booking = response['customer_or_booking']
                    let customer_id_or_booking_id = response['customer_id_or_booking_id']
                    let orderInstruction = response['orderInstruction']
                    let total_item = response['total_item']
                    let total_amount = response['total_amount']
                    let gst_amount = response['gst_amount']
                    let discount_amount = response['discount_amount']
                    let loyalty_discount = response['loyalty_discount']
                    let payable_amount = response['payable_amount']
                    let payment_method = response['payment_method']
                    let other_method = response['other_method']
                    let grand_amount = response['grand_amount']
                    let payment_status = response['payment_status']
                    let status = response['status']
                    let customerData = response['customerData']
                    let people = response['no_of_people']

                         
                    showOrderStatusTab(productData)

                    calculateLoyaltyReward(parseInt(total_amount) + parseInt(gst_amount))

                    let order_status_show;
                    //  check where order completed or not 
                    if (status == 'completed') {
                        order_status_show = "<span class='badge rounded-pill text-bg-success p-3 font-14'>Order Completed</span>"
                    } else {
                        order_status_show = "<span class='badge rounded-pill text-bg-danger p-3 font-14'>Not Completed</span>"
                    }

                    // customer data 
                    let customertable = ``;
                    if (customer_or_booking === 'customers') {
                        customertable = `
                       <tr>
                           <td>Name</td>
                           <td>${customerData['name']}</td>
                       </tr>
                       <tr>
                           <td>Phone</td>
                           <td>${customerData['phone']}</td>
                       </tr>
                       <tr>
                           <td>Email</td>
                           <td>${customerData['email']}</td>
                       </tr>
                       <tr>
                           <td>Dob</td>
                           <td>${customerData['dob']}</td>
                       </tr>
                       <tr>
                           <td>Doa</td>
                           <td>${customerData['doa']}</td>
                       </tr>`;
                    } else {
                        customertable = `  
                        <tr>
                            <td>Booking Id</td>
                            <td>${customerData['booking_id']}</td>
                        </tr>
                        <tr>
                            <td>Name</td>
                            <td>${customerData['name']}</td>
                        </tr>
                        <tr>
                            <td>phone</td>
                            <td>${customerData['phone']}</td>
                        </tr>
                        <tr>
                            <td>Email</td>
                            <td>${customerData['email']}</td>
                        </tr>
                        <tr>
                            <td>Address</td>
                            <td>${customerData['address']}</td>
                        </tr>
                        <tr>
                            <td>No. of people</td>
                            <td>${customerData['no_of_people']}</td>
                        </tr>
                        <tr>
                           <td>Event</td>
                           <td>${customerData['event']}</td>
                       </tr>
                       <tr>
                           <td>Booked From</td>
                           <td>${customerData['booked_from']}</td>
                       </tr>
                       <tr>
                           <td>Booked To</td>
                           <td>${customerData['booked_to']}</td>
                       </tr>
                       <tr>
                           <td>Tables</td>
                           <td>${customerData['tables']}</td>
                       </tr>
                       <tr>
                           <td>Amount</td>
                           <td>${customerData['amount']}</td>
                       </tr>
                       <tr>
                           <td>Description </td>
                       </tr>
                       <tr>
                           <td colspan='2'>${customerData['description']}</td>
                       </tr>
                       `
                    }

                    // product data 
                    let productDataTable = ``;
                    productData.forEach(element => {
                        productDataTable += `
                          <tr>
                             <td class='text-start'>${element['product_name']}</td>
                             <td class='text-center'>${element['product_qty']}</td>
                             <td class='text-center'>${element['product_unit']}</td>
                             <td class='text-center'>${element['price_per_unit']}</td>
                             <td class='text-center'>${element['product_price']}</td>
                         </tr>
                           `
                    });

                    $('#order-data').html(`
                    <table class='table table-borderless mb-2 p-0 border'>
                      <tr>
                          <td class='text-center'>${order_status_show}</td>
                      </tr>
                    </table>
                    <table class="table table-borderless mb-2 p-0 border">
                    <tr>
                        <th><i class="fa-solid fa-circle text-info"></i> Table Details</th>
                    </tr>
                    <tr>
                        <td>Table Number</td>
                        <td> ${selectedTable}</td>
                    </tr>
                    <tr>
                        <td>No. Of People</td>
                        <td> ${people}</td>
                    </tr>
                    </table>
                    <table class="w-100 table table-borderless mb-2 p-0 border">
                        <tr>
                            <th colspan='2'><i class="fa-solid fa-circle text-info"></i> Customer's Details</th>
                        </tr>
                         ${customertable}
                    </table>
                    <table class="w-100 table table-borderless mb-2 p-0 border">
                    <tr>
                        <th><i class="fa-solid fa-circle text-info"></i> Item Details</th>
                    </tr>
                    <tr class='table-secondary'>
                        <th class='text-center text-nowrap' >Product Name</th>
                        <th class='text-center text-nowrap' >Quantity</th>
                        <th class='text-center text-nowrap' >Unit</th>
                        <th class='text-center text-nowrap' >Price</th>
                        <th class='text-center text-nowrap' >Total Price</th>
                    </tr>
                    ${productDataTable}
                    </table>
                    <table class="table table-borderless mb-2 p-0 border">
                        <tr>
                            <th><i class="fa-solid fa-circle text-info"></i> Order Instruction </th>
                        </tr>
                        <tr>
                            <td> ${orderInstruction}</td>
                        </tr>
                    </table>
                    <table class="table table-borderless mb-2 p-0 border">
                    <tr>
                        <th><i class="fa-solid fa-circle text-info"></i> Payment Details</th>
                    </tr>
                    <tr>
                        <td>Payment Status</td>
                        <td>${payment_status}</td>
                    </tr>
                    <tr>
                        <td>Total Item</td>
                        <td>${total_item}</td>
                    </tr>
                    <tr>
                        <td>Total Amount</td>
                        <td>${total_amount}</td>
                    </tr>
                    <tr>
                        <td>Gst Amount</td>
                        <td>${gst_amount}</td>
                    </tr>
                   
                    <tr>
                        <td>Discount</td>
                        <td>${discount_amount}</td>
                    </tr>
                    <tr>
                        <td>Loyalty Discount</td>
                        <td>${loyalty_discount}</td>
                    </tr>
                    <tr>
                        <td>Payable Amount</td>
                        <td>${payable_amount}</td>
                    </tr>
                     
                    <tr>
                        <td>Payment Method</td>
                        <td>${payment_method}</td>
                     </tr>
                     </table>


                     <table class="table table-borderless mb-2 p-0 border">
                    <tr>
                        <th><i class="fa-solid fa-circle text-info"></i> Loyalty Reward: <b id='loyalty-reward' class='float-end'></b></th>
                    </tr>
                     

                    </table>
                  `)

                    $("#order-detail .order-spiner").addClass('d-none')
                } else {
                    $("#order-detail .order-spiner").addClass('d-none')
                    $('#order-data').html(`
                     <h4 class='text-center my-3'> Not Found</h4>
                    `)
                }
            }
        })
    }

}
getOrderDetails()


function showOrderStatusTab(productdata){
    console.log(productdata)
}


function productSearch(this_value) {

    $('.order-product-box .order-spiner').removeClass('d-none').addClass('d-flex')

    if (this_value.length > 0) {
        $.ajax({
            type: "POST",
            url: "/admin/ajax-request",
            data: {
                isset_search_product: true,
                search_query: this_value
            },
            success: function (response) {
                $('#order-product-data').html('')
                if (response.length != 0) {
                    response.forEach(e => {
                        let auto_product_id = e['auto_product_id']
                        let name = e['name']
                        let img = e['img']
                        let price_arr = e['price']
                        let stared = e['stared']
                        let multiplePrice;
                        let enableDropDown;
                        let selectProduct;
                        let star_icon;
                        let dropdown = `<div class="dropend">
                        <ul class="dropdown-menu bg-info">`;

                        if (price_arr.length > 1) {
                            price_arr.forEach(element => {
                                let unit_name = element[0]
                                let price = element[1]
                                dropdown += `<li><a class="dropdown-item text-dark d-flex justify-content-between" href="javascript:;" onclick=selectProduct('${auto_product_id}','${unit_name}','${price}','${auto_product_id}')><span> ${unit_name}</span> <span>₹ ${price}</span></a>
                            </li>`
                            });
                            multiplePrice = true;
                            enableDropDown = `data-bs-toggle="dropdown"`
                            selectProduct = '';
                        } else {
                            let price_unit = price_arr[0][0]
                            let price = price_arr[0][1]
                            multiplePrice = false
                            enableDropDown = ''
                            selectProduct = `onclick=selectProduct('${auto_product_id}','${price_unit}','${price}','${auto_product_id}')`;
                        }
                        dropdown += `</ul>
                      </div>`

                        if (stared === true) {
                            star_icon = `<i class="star-icon fa-sharp fa-solid fa-star font-18 text-warning" ></i>`
                        } else {
                            star_icon = `<i class="star-icon fa-thin fa-star text-info" ></i>`
                        }

                        // set green color if product is selected 
                        let selected_or_not = '';
                        let matched = 0;
                        if (localStorage.getItem('productData') !== null) {
                            productData = JSON.parse(localStorage.getItem('productData'))
                            productData.forEach(element => {
                                let product_id = element['product_id'];
                                if (product_id == auto_product_id) {
                                    matched++;
                                }
                            });
                        }

                        if (matched > 0) {
                            selected_or_not = 'order-product-selected'
                        } else {
                            selected_or_not = ''
                        }


                        $('#order-product-data').append(`
                       <div class="col-lg-4 col-md-4 col-sm-6">
                        <div class="card radius-10 order-product-card ${selected_or_not}" id='${auto_product_id}' ${enableDropDown} data-price-type='${multiplePrice}' ${selectProduct}>
                          <div class="card-body pb-0">
                              <div>
                                  <div class="d-flex align-items-center">
                                      <div class="order-product-img p-1 rounded">
                                          ${img}
                                      </div>
                                  </div>
                                  <p>  ${name}
                                  </p>
                                  <div class="order-product-star ms-auto font-13" onclick=markStar('${auto_product_id}',event)>
                                     ${star_icon}
                                  </div>
                              </div>
                          </div>
                          ${dropdown}
                       </div>
                       </div>
                       `)
                    });

                } else {
                    $('#order-product-data').html(`<img src="${websiteUrl}/admin-assets/assets/images/icons/not-found.webp" class='order-not-found'>`)
                }

                $('.order-product-box .order-spiner').removeClass('d-flex').addClass('d-none')
            }
        });
    } else {
        $('.order-product-box .order-spiner').removeClass('d-flex').addClass('d-done')
        getProducts()
    }
}

// save and settle order 

function completedOrder() {
    let order_id = localStorage.getItem('saved_order_id')

    $.confirm({
        icon: 'fas fa-exclamation-triangle ',
        title: 'Alert',
        content: 'Are you sure you want to save & settle order data ?. Make sure you have saved order data',
        type: 'orange',
        typeAnimated: true,
        draggable: false,
        theme: 'modern',
        columnClass: 'm',
        buttons: {
            delete: {
                text: 'Procced',
                btnClass: 'btn-orange',
                action: function () {
                    Preloader('flex')
                    $.ajax({
                        type: "POST",
                        url: '/admin/save-and-settle',
                        data: {
                            isset_save_and_settle_order: true,
                            order_id: order_id
                        },
                        success: function (response) {
                            if (response['status'] === true) {
                                localStorage.clear();
                                setAlertData('Order completed.', false)
                                window.location.reload();
                            } else {
                                round_alert('error', response['msg'])
                            }
                        }
                    });
                }
            },
            cancel: function () {

            }
        }
    });
}



// print & download bill 

function printAndDownloadBill(print_or_download, o_id = null) {

    let order_id
    if (o_id !== null) {
        order_id = o_id
    } else {
        order_id = localStorage.getItem('saved_order_id');
    }

    if (order_id !== null) {
        $('.loading-box').removeClass('d-none').addClass('d-flex')
        $.ajax({
            type: "POST",
            url: "/admin/ajax-request",
            data: {
                isset_print_bill: true,
                order_id: order_id
            },
            success: function (response) {
                if (response['status'] === true) {
                    $('.loading-box').removeClass('d-flex').addClass('d-none')
                    let url = response['url']
                    let filename = response['filename']
                    if (print_or_download == 'download') {
                        downloadPDF(url, filename)
                    } else {
                        window.open(url, '_blank')
                    }
                } else {
                    $('.loading-box').removeClass('d-flex').addClass('d-none')
                    round_alert('error', response['msg'])
                }
            }
        });
    } else {
        round_alert('error', 'Order not completed');
    }
}



// function getLoyaltyPoints(amount) {
//     $.ajax({
//         type: "get",
//         url: "/admin/get-loyalty",
//         data: {
//             amount: amount
//         },
//         success: function (response) {

//             $('#loyalty-checkboxes').html('')

//             response.forEach(element => {
//                 console.log(element['amount'])
//                 if (parseInt(amount) < parseInt(element['amount'])) {
//                     $('#loyalty-checkboxes').append(`
//                     <div class="loyalty-box danger">
//                     <label class="d-flex">
//                         <input type="radio" class="form-check-input" value='${element['points']}' name="loyalty" disabled>
//                         <div class="ps-3">
//                             <p class="mb-0 pb-0"> ${element['points']} points on order of minimum
//                                 ₹${element['amount']}.
//                             </p>
//                             <ul class='pb-0 mb-0'>
//                             <li>Min Order Amount: ₹${element['amount']}</li>
//                                 <li>Loyalty Points: ${element['points']}</li>
//                             </ul>
//                         </div>
//                     </label>
//                 </div>
//                     `)

//                 } else {
//                     $('#loyalty-checkboxes').append(`
//                     <div class="loyalty-box success">
//                     <label class="d-flex">
//                         <input type="radio" class="form-check-input" value='${element['points']}' name="loyalty" >
//                         <div class="ps-3">
//                             <p class="mb-0 pb-0"> ${element['points']} points on order of minimum
//                                 ₹${element['amount']}.
//                             </p>
//                             <ul class='pb-0 mb-0'>
//                             <li>Min Order Amount: ₹${element['amount']}</li>
//                                 <li>Loyalty Points: ${element['points']}</li>
//                             </ul>
//                         </div>
//                     </label>
//                 </div>
//                     `)
//                 }

//             });
//         }
//     });
// }


// function saveLoyaltyPoints() {

//     let customer_id_or_booking_id = localStorage.getItem('customer_id_or_booking_id')

//     if (localStorage.getItem('loyalty_point') !== null) {
//         round_alert('error', 'Loyalty points already added into customer account.')
//     } else {
//         $.each($("#loyalty-checkboxes input[name='loyalty']"), function () {
//             if ($(this).prop('checked')) {
//                 let loyalty_point = $(this).val()
//                 $.ajax({
//                     type: "post",
//                     url: "/admin/save-customer-loyalty-point",
//                     data: {
//                         customer_id_or_booking_id: customer_id_or_booking_id,
//                         loyalty_point: loyalty_point
//                     },
//                     success: function (response) {
//                         if (response['status']) {
//                             localStorage.setItem('loyalty_point', loyalty_point)
//                             round_alert('success', response['message'])
//                         } else {
//                             round_alert('error', response['message'])
//                         }
//                     }
//                 });
//             }
//         });
//     }
// }



function showLoyaltyCheckbox() {
    let customer_loyalty_points = localStorage.getItem('customer_loyalty_points');
    let loyalty_discount = localStorage.getItem('loyalty_discount')
    let loyalty_points_using = localStorage.getItem('loyalty_points_using')

    $('#loyalty-discount-input').val(loyalty_discount)

    if (customer_loyalty_points !== null) {
        let loyalty_checked;
        if (loyalty_discount !== null) {
            loyalty_checked = 'checked'
        } else {
            loyalty_checked = ''
        }

        $('#loyalty-discount-checkbox').html(`
         <p class="mb-0 mt-3 text-info">Enter points to apply loyalty discount</p>
         <div class="payment-box-loyalty-points ">
             <label class="d-flex">
                 <input type="checkbox" ${loyalty_checked} class="form-check-input"
                     onchange="setLoyaltyDiscount(event)" >
                 <p class="ps-2 pb-0 mb-0">
                     <strong class="d-block"> Loyalty Discount</strong>
                     <span id="loyalty-point-span">${customer_loyalty_points} points</span>
                 </p>
             </label>
             <input type="text" class="form-control loyalty-input"
                 onkeyup="typeLoyaltyPoints(event)" ${loyalty_checked == 'checked' ? '' : 'readonly'} value='${loyalty_points_using !== null ? loyalty_points_using : ''}' >
         </div>
         `)
    }
}

showLoyaltyCheckbox()


function setLoyaltyDiscount(e) {

    let customer_loyalty_points = localStorage.getItem('customer_loyalty_points')

    if ($(e.target).prop('checked')) {
        $(".loyalty-input").prop('readonly', false)
    } else {
        $(".loyalty-input").prop('readonly', true)
        $('.loyalty-input').val('')
        localStorage.removeItem('loyalty_discount')
        localStorage.removeItem('loyalty_points_using')
        $('#loyalty-discount-input').val(0)
    }

    reInitiateAmountDetails()
}

function typeLoyaltyPoints(e) {
    let type_loyalty_val = parseInt($(e.target).val());
    let customer_loyalty_points = parseInt(localStorage.getItem('customer_loyalty_points'))

    if (localStorage.getItem('customer_loyalty_points') !== null) {
        if (type_loyalty_val > customer_loyalty_points) {
            round_alert('error', 'Enter valid loyalty points.')
            $(e.target).css({
                border: '2px solid red'
            })
        } else {
            $(e.target).css({
                border: '2px solid green'
            })
            $.ajax({
                type: "post",
                url: "/admin/ajax-request",
                data: ({
                    isset_loyalty_discount: 1,
                    points: type_loyalty_val
                }),
                success: function (response) {

                    $('#loyalty-discount-input').val(response)

                    let discount = $('#discount-input').val()
                    let grand_amount = localStorage.getItem('grand_amount')
                    let payable_amount = parseInt(grand_amount) - parseInt(discount) - parseInt(response)
                    $('#payable-amount-input').val(payable_amount)

                    localStorage.setItem('payable_amount', payable_amount)

                    localStorage.setItem('loyalty_discount', response)
                    localStorage.setItem('loyalty_points_using', type_loyalty_val)


                }
            });
        }
    } else {
        round_alert('error', 'Please choose customer first.')
    }


}


function calculateLoyaltyReward(shopping_amount) {
    $.ajax({
        type: "post",
        url: "/admin/ajax-request",
        data: {
            isset_calculate_shopping_amount: 1,
            shopping_amount: shopping_amount
        },
        success: function (response) {
            $('#loyalty-reward').html(`${response} points`)
        }
    });
}



// ================= billing section ended ================
// ================= billing section ended ================
// ================= billing section ended ================
// ================= billing section ended ================
// ================= billing section ended ================
// ================= billing section ended ================
// ================= billing section ended ================
// ================= billing section ended ================