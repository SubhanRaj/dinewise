$.ajaxSetup({
    headers: {
        "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
    },
});

$(window).on('scroll', () => {
    let scroll_top = $(window).scrollTop()
    let window_height = $(window).height();

    if (scroll_top > 50) {
        $('.cust-middle-header').addClass('sticky')
    } else {
        $('.cust-middle-header').removeClass('sticky')
    }

    // handle back to top 

    let last_scroll = sessionStorage.getItem('last_scroll');
    if (last_scroll != null) {
        if (last_scroll > window_height && last_scroll > scroll_top) {
            $('.back-top').css('display', 'flex')
        } else {
            $('.back-top').css('display', 'none')
        }
    }
    sessionStorage.setItem('last_scroll', scroll_top)
})


const backToTop = () => {
    $(window).scrollTop(0);
}

const showSearchBar = (show_or_hide) => {
    if (show_or_hide == 'show') {
        $('.page-title-search-box').css('display', 'block')
    } else {
        $('.page-title-search-box').css('display', 'none')
    }
}


// set category_active class to category button 
const activateCategory = () => {
    let cat_id = sessionStorage.getItem('category')
    $('.category_button').removeClass('category_active')
    $('#category_' + cat_id).addClass('category_active')
}

//  select category 
const selectCategory = (cat_id) => {
    sessionStorage.setItem('category', cat_id)
    activateCategory()
    $.ajax({
        type: "post",
        url: "/customer-ajax",
        data: {
            isset_get_product_according_to_category: true,
            cat_id: cat_id
        },

        success: function (response) {
            $('.product-row').html('')
            if (response['status']) {
                let product = response['product']

                let dynamic_id = 0;
                product.forEach(element => {

                    let unit_and_price = element['price']

                    let unit = []
                    let price = []
                    unit_and_price.forEach(unit_and_price_element => {
                        unit.push(unit_and_price_element[0])
                        price.push(unit_and_price_element[1])
                    });

                    let unit_option = '';
                    let unit_select = '';
                    // if (unit.length > 1) {
                    //     unit.forEach(unit_element => {
                    //         unit_option += `<option value='${unit_element}'>${unit_element}</option>`
                    //     });
                    //     unit_select = `<select onchange=getPrice('price_${dynamic_id}','unit_price${dynamic_id}','price_val_${dynamic_id}',event) class='unit-select'>${unit_option}</select>`
                    // } else {
                    //     unit_select = unit[0]
                    // }
                    unit.forEach(unit_element => {
                        unit_option += `<option value='${unit_element}'>${unit_element}</option>`
                    });

                    unit_select = `<select id='unit_select_${dynamic_id}' onchange=getPrice('price_${dynamic_id}','unit_price${dynamic_id}','price_val_${dynamic_id}',event) class='unit-select'>${unit_option}</select>`

                    // set plus button to minus if the product is selected 
                    let selected_or_not = '';
                    let selected_products
                    let matched = 0;
                    let index = 0;

                    if (sessionStorage.getItem('products') !== null) {
                        selected_products = JSON.parse(sessionStorage.getItem('products'))

                        if (selected_products.length > 0) {
                            for (let i = 0; i < selected_products.length; i++) {
                                let selected_product_element = selected_products[i];
                                let product_id = selected_product_element['product_id'];
                                if (product_id == element['auto_product_id']) {
                                    matched++;
                                    index = i;
                                }
                            }

                        }


                    }
                    let action_btn;
                    if (matched > 0) {
                        action_btn = `<button type="button" class="add-btn" id="action_${dynamic_id}" onclick="removeProduct('${index}')" >  
                        <i class="fa-solid fa-minus"></i> 
                     </button>`
                    } else {
                        action_btn = `<button type="button" class="add-btn" id="action_${dynamic_id}" onclick="selectProduct('${dynamic_id}')">    <i class="fa-solid fa-plus"></i> 
                        </button>`
                    }

                    // $('.product-row').append(`
                    // <div class="col-lg-4 col-6  mb-1 p-md-2 p-1">
                    // <input type='hidden' name='unit_and_price' value='${JSON.stringify(unit_and_price)}' id='unit_price${dynamic_id}' >
                    // <div class="product-box">
                    //     <div class="product-image">
                    //         ${element['img']}
                    //     </div>
                    //     <div class="product-cat-name">
                    //         <span class="product-category">${element['category']}</span>
                    //         <h6 class="product-name">${element['name']}</h6>
                    //     </div>
                    //     <div class="product-add">
                    //         <div class="unit" id='unit_${dynamic_id}'>${unit_select}</div>
                    //         <div class="price" id='price_${dynamic_id}' >Rs.${price[0]}</div>
                    //         <div class="add">
                    //              <input type='hidden' value='${price[0]}' id='price_val_${dynamic_id}'>
                    //              <input type='hidden' value='${element['auto_product_id']}' id='auto_product_id_${dynamic_id}'>
                    //              <input type='hidden' value='${element['name']}' id='product_name_${dynamic_id}'>
                    //            <span id='action_box_${dynamic_id}'>
                    //             ${action_btn}
                    //           </span>
                    //         </div>
                    //     </div>
                    // </div>
                    // </div>
                    // `);
                    $('.product-row').append(`
                    <div class="col-12 p-0 mb-2">
                     <input type='hidden' name='unit_and_price' value='${JSON.stringify(unit_and_price)}' id='unit_price${dynamic_id}' >
                    <div class="product-list-box">
                        <div class="product-list-img">
                        ${element['img']}
                        </div>
                        <div class="product-list-content">
                            <span class="product-list-category">${element['category']}</span>
                            <h6 class="product-list-title">
                             ${element['name']}
                            </h6>
                            <div class="product-add">
                                <div class="unit" id="unit_${dynamic_id}">
                                 ${unit_select}
                                </div>
                                <div class="price" id="price_${dynamic_id}">Rs.${price[0]}</div>
                                <div class="add">
                                    <input type="hidden" value="${price[0]}" id="price_val_${dynamic_id}">
                                    <input type="hidden" value="${element['auto_product_id']}" id="auto_product_id_${dynamic_id}">
                                    <input type="hidden" value="${element['name']}" id="product_name_${dynamic_id}">
                                    <span id="action_box_${dynamic_id}">
                                       ${action_btn}
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                    `);
                    dynamic_id++;
                });
            }
        }
    });
}


const searchProduct = (this_value) => {
    $.ajax({
        type: "post",
        url: "/customer-ajax",
        data: {
            isset_get_product_according_to_search: true,
            search: this_value
        },

        success: function (response) {
            $('.product-row').html('')
            if (response['status']) {
                let product = response['product']

                let dynamic_id = 0;
                product.forEach(element => {

                    let unit_and_price = element['price']

                    let unit = []
                    let price = []
                    unit_and_price.forEach(unit_and_price_element => {
                        unit.push(unit_and_price_element[0])
                        price.push(unit_and_price_element[1])
                    });

                    let unit_option = '';
                    let unit_select = '';
                    // if (unit.length > 1) {
                    //     unit.forEach(unit_element => {
                    //         unit_option += `<option value='${unit_element}'>${unit_element}</option>`
                    //     });
                    //     unit_select = `<select onchange=getPrice('price_${dynamic_id}','unit_price${dynamic_id}','price_val_${dynamic_id}',event) class='unit-select'>${unit_option}</select>`
                    // } else {
                    //     unit_select = unit[0]
                    // }
                    unit.forEach(unit_element => {
                        unit_option += `<option value='${unit_element}'>${unit_element}</option>`
                    });

                    unit_select = `<select id='unit_select_${dynamic_id}' onchange=getPrice('price_${dynamic_id}','unit_price${dynamic_id}','price_val_${dynamic_id}',event) class='unit-select'>${unit_option}</select>`

                    // set plus button to minus if the product is selected 
                    let selected_or_not = '';
                    let selected_products
                    let matched = 0;
                    if (sessionStorage.getItem('products') !== null) {
                        selected_products = JSON.parse(sessionStorage.getItem('products'))
                        selected_products.forEach(selected_product_element => {
                            let product_id = selected_product_element['product_id'];
                            if (product_id == element['auto_product_id']) {
                                matched++;
                            }
                        });
                    }

                    let action_btn;
                    if (matched > 0) {
                        action_btn = `<i class="fa-solid fa-minus"></i>`
                    } else {
                        action_btn = `<i class="fa-solid fa-plus"></i>`
                    }


                    $('.product-row').append(`
                    <div class="col-lg-4 col-6  mb-1 p-md-2 p-1">
                    <input type='hidden' name='unit_and_price' value='${JSON.stringify(unit_and_price)}' id='unit_price${dynamic_id}' >

                    <div class="product-box">
                        <div class="product-image">
                            ${element['img']}
                        </div>
                        <div class="product-cat-name">
                            <span class="product-category">${element['category']}</span>
                            <h6 class="product-name">${element['name']}</h6>
                        </div>
                        <div class="product-add">
                            <div class="unit" id='unit_${dynamic_id}'>${unit_select}</div>
                            <div class="price" id='price_${dynamic_id}' >Rs.${price[0]}</div>
                            <div class="add">
                                 <input type='hidden' value='${price[0]}' id='price_val_${dynamic_id}'>
                                 <input type='hidden' value='${element['auto_product_id']}' id='auto_product_id_${dynamic_id}'>
                                 <input type='hidden' value='${element['name']}' id='product_name_${dynamic_id}'>
 
                                 <span id='action_box_${dynamic_id}'>
                                   <button type="button" class="add-btn" id="action_${dynamic_id}" onclick="selectProduct('${dynamic_id}')" >  ${action_btn}
                                 </button>
                                 </span>
                            </div>
                        </div>
                    </div>
                    </div>
                    `);
                    dynamic_id++;
                });
            }
        }
    });
}


// show product on the basis of selected category 

const showProductAndActivateActiveClass = () => {
    let cat_id = sessionStorage.getItem('category')

    if (cat_id !== null) {
        selectCategory(cat_id) // show product for this category 
    } else {
        selectCategory('all')
    }

    activateCategory() // add category_active class on category button  

}



// change the price of product 

const getPrice = (price_box, unit_and_price, price_input, event) => {

    let this_value = $(event.target).val()
    var unit_and_price_data = $("#" + unit_and_price).val();
    unit_and_price_data = JSON.parse(unit_and_price_data)

    let unit = []
    let price = []
    unit_and_price_data.forEach(unit_and_price_element => {
        unit.push(unit_and_price_element[0])
        price.push(unit_and_price_element[1])
    });

    let unit_price = price[unit.indexOf(this_value)]

    $("#" + price_box).html(`Rs.${unit_price}`)
    $("#" + price_input).val(unit_price)

}


const selectProduct = (dynamic_id) => {
    let unit = $('#unit_select_' + dynamic_id).val()
    let price = $('#price_val_' + dynamic_id).val() // this is price of product according to per unit 
    let product_id = $('#auto_product_id_' + dynamic_id).val()
    let product_name = $('#product_name_' + dynamic_id).val()


    let products
    let n = 0;
    if (sessionStorage.getItem('products') == null) {
        products = []
    } else {
        products = JSON.parse(sessionStorage.getItem('products'))
        products.forEach(element => {
            let selected_product_id = element['product_id'];
            let selected_product_unit = element['product_unit'];
            if (selected_product_id == product_id && selected_product_unit == unit) {
                n++;
            }
        });
    }

    if (n === 0) {
        let product_data = {
            product_id: product_id,
            product_name: product_name,
            product_unit: unit,
            product_qty: 1,
            price_per_unit: price,
            product_price: price,
            status: 'unsave',
            order_status: 'Recieved'
        }
        // store the product data into session storage 
        products.push(product_data);
        sessionStorage.setItem('products', JSON.stringify(products));

        let index = products.length - 1
        $("#action_box_" + dynamic_id).html(`<button type="button" class="add-btn" id="action_${dynamic_id}" onclick="removeProduct('${index}')" >  
           <i class="fa-solid fa-minus"></i> 
        </button>`)

    }

    getAddedProductDetails()
    calculateAmountDetails()

}


// remove product  
const removeProduct = (index) => {
    let products = sessionStorage.getItem('products')
    if (products !== null) {
        products = JSON.parse(products)
        products.splice(index, 1)

        sessionStorage.setItem('products', JSON.stringify(products))
    }

    getAddedProductDetails()
    calculateAmountDetails()
    showProductAndActivateActiveClass()
}


const getAddedProductDetails = () => {
    let products = sessionStorage.getItem('products');
    if (products !== null) {
        products = JSON.parse(products)
        $('#selected-products').html('')

        let index = 0;
        products.forEach((single_product) => {

            let pro_id = single_product['product_id']
            let pro_unit = single_product['product_unit']
            let product_status = single_product['status']

            if (product_status == 'unsave') {
                $('#selected-products').append(`
                 <tr>
                 <td>
                     <div class="order-box">
                         <div class="order-box-wrapper">
                             <p class="order-box-pro-name">${single_product['product_name']} (${single_product['product_unit']}) </p>
                             <strong class="order-box-amount" id="pro_price_${pro_unit}${pro_id}">Rs.${single_product['product_price']}</strong>
                         </div>
                     </div>
                 </td>
                 <td>
                     <div class="qty-wrapper d-flex justify-content-center align-items-center">
                         <div class="qty-box">
                                 <button type="button" class="qty-btn" onclick="updateQty('${index}','${single_product['product_id']}','dec')" >
                                     <i class="fa-solid fa-minus"></i>
                                 </button>
                                   <input type="text" readonly class="qty-input" id="pro_qty_${pro_unit}${pro_id}" value="${single_product['product_qty']}">
                                 <button type="button" class="qty-btn" onclick="updateQty('${index}','${single_product['product_id']}','inc')" >
                                 <i class="fa-solid fa-plus"></i>
                                 </button>
                         </div>
                     </div>
                 </td>
                     <td>
                         <div>
                          <button type='button' class='remove-btn' onclick="removeProduct(${index})">Remove</button>
                         </div>
                     </td>
                 </tr>
                 `)
            } else {
                $('#selected-products').append(`
                <tr>
                <td>
                    <div class="order-box">
                        <div class="order-box-wrapper">
                            <p class="order-box-pro-name">${single_product['product_name']} (${single_product['product_unit']}) </p>
                            <strong class="order-box-amount" id="pro_price_${pro_unit}${pro_id}">Rs.${single_product['product_price']}</strong>
                        </div>
                    </div>
                </td>
                <td>
                ${single_product['product_qty']}
                 </td>
                </tr>
                `)
            }
            index++;
        });
    } else {
        $('#selected-products').html(`<tr><td collspan='2'><h5 class='text-danger no-product'>0 item selected</h5></td></tr>`)
    }

    calculateAmountDetails()
}




const updateQty = (index, product_id, inc_dec) => {
    let products = sessionStorage.getItem('products');
    products = JSON.parse(products)

    let product_qty = parseInt(products[index]['product_qty'])
    let product_price_per_unit = parseInt(products[index]['price_per_unit'])
    let product_unit = products[index]['product_unit']

    if (inc_dec == 'inc') {
        product_qty++;
    } else {
        if (product_qty > 1) {
            product_qty--
        }
    }


    let product_price = product_price_per_unit * product_qty

    products[index]['product_qty'] = product_qty
    products[index]['product_price'] = product_price

    $('#pro_qty_' + product_unit + product_id).val(product_qty)
    $('#pro_price_' + product_unit + product_id).html(`Rs.${product_price}`)

    sessionStorage.setItem('products', JSON.stringify(products))
    calculateAmountDetails()
}


const calculateAmountDetails = () => {


    let total_item = 0;
    let total_amount = 0;
    let product_amount = 0;
    let gst_amount = 0;


    let products = sessionStorage.getItem('products');

    if (products !== null) {

        products = JSON.parse(products)

        total_item = products.length;
        products.forEach(single_product => {
            let product_price = parseInt(single_product['product_price'])
            product_amount += product_price
        });

        gst_amount = Math.ceil((product_amount * 20) / 100)
        total_amount = product_amount + gst_amount;

        let amount_arr = {
            "items": total_item,
            "product_amount": product_amount,
            "gst": gst_amount,
            "total_amount": total_amount
        }

        sessionStorage.setItem('amount', JSON.stringify(amount_arr))

    }

}
const showAmountDetails = () => {

    let total_item = 0;
    let total_amount = 0;
    let product_amount = 0;
    let gst_amount = 0;


    let products = sessionStorage.getItem('ordered_products');
    if (products !== null) {


        products = JSON.parse(products)

        total_item = products.length;
        products.forEach(single_product => {
            let product_price = parseInt(single_product['product_price'])
            product_amount += product_price
        });

        gst_amount = Math.ceil((product_amount * 20) / 100)
        total_amount = product_amount + gst_amount;

        let amount_arr = {
            "items": total_item,
            "product_amount": product_amount,
            "gst": gst_amount,
            "total_amount": total_amount
        }

        sessionStorage.setItem('amount', JSON.stringify(amount_arr))

        $('#payment-table').html(`
        <tr>
        <td><b>Total Item</b></td>
        <td>${total_item}</td>
        </tr>
        <tr>
            <td><b>Product Amount</b></td>
            <td>Rs.${product_amount}</td>
        </tr>
        <tr>
            <td><b>GST %</b></td>
            <td>20%</td>
        </tr>
        <tr>
            <td><b>GST Amount</b></td>
            <td>Rs.${gst_amount}</td>
        </tr>
        <tr>
            <td><b>Total Amount</b></td>
            <td>Rs.${total_amount}</td>
        </tr>
    `)
    }
}
// show customer details 

const customerDetails = () => {

    let customer_details = sessionStorage.getItem('customer_details')
    if (customer_details !== null) {

        customer_details = JSON.parse(customer_details)

        $("#customer-details input[name='name']").val(customer_details['name'])
        $("#customer-details input[name='phone']").val(customer_details['phone'])
        $("#customer-details input[name='email']").val(customer_details['email'])
        $("#customer-details input[name='no_of_people']").val(customer_details['no_of_people'])
        $("#customer-details input[name='dob']").val(customer_details['dob'])
    }
}


const placeOrder = () => {


    let placeOrderBtn = $('#place-order-btn').html()
    $('#place-order-btn').html(`<button type='button' class='btn btn-primary'>Processing...</button>`)

    let products = sessionStorage.getItem('products') // product data

    if (products !== null) {
        products = JSON.parse(products);
        if (products.length > 0) {



            let amount = sessionStorage.getItem('amount') // amount data

            // customer data 
            let name = $("#customer-details input[name='name']").val();
            let phone = $("#customer-details input[name='phone']").val()
            let email = $("#customer-details input[name='email']").val()
            let no_of_people = $("#customer-details input[name='no_of_people']").val()
            let dob = $("#customer-details input[name='dob']").val()

            let customer_details = {
                name: name,
                phone: phone,
                email: email,
                no_of_people: no_of_people,
                dob: dob,
            }

            sessionStorage.setItem('customer_details', JSON.stringify(customer_details))

            // table id 
            let table_no = $("#customer-details input[name='table_no']").val()
            table_no = [table_no] // convert table_no into an array 

            // check if name, phone, no_of_people is not empty 
            if (name != '' && phone != '') {

                products.forEach(single_product => {
                    single_product['status'] = 'saved'
                });

                // check if session contain order id  
                let order_id = sessionStorage.getItem('order_id')
                if (order_id !== null) {
                    //  update order 
                    let ordered_products = sessionStorage.getItem('ordered_products')
                    ordered_products = JSON.parse(ordered_products)

                    let new_products = [...ordered_products, ...products]

                    var ajax_data = {
                        products: new_products,
                        amount: JSON.parse(amount),
                        name: name,
                        phone: phone,
                        email: email,
                        no_of_people: no_of_people,
                        dob: dob,
                        table_no: table_no,
                        order_id: order_id
                    }
                } else {
                    //  add new order 
                    var ajax_data = {
                        products: products,
                        amount: JSON.parse(amount),
                        name: name,
                        phone: phone,
                        email: email,
                        no_of_people: no_of_people,
                        dob: dob,
                        table_no: table_no,
                    }
                }

                $.ajax({
                    type: "post",
                    url: "/place-customer-order",
                    data: ajax_data,
                    success: function (response) {

                        console.log(response)

                        if (response['status']) {

                            sessionStorage.removeItem('products')

                            round_alert('success', response['msg'])
                            $('#place-order-btn').html(placeOrderBtn)

                            let order_id = response['order_id']
                            sessionStorage.setItem("order_id", order_id)

                            $('#order-alert').html(`
                    <div class="alert alert-success" role="alert">
                       <strong>Order saved successfully. Your order id is ${order_id}. Please note down your order id for further use.</strong>
                    </div>`)

                            initializeOrder()
                            getOrderDetailsUsingOrderId(order_id)
                        } else {
                            round_alert('error', response['msg'])
                            $('#place-order-btn').html(placeOrderBtn)
                        }
                    }
                });
            } else {
                round_alert('error', 'Please fill required fields')
                $('#place-order-btn').html(placeOrderBtn)
            }
        } else {
            round_alert('error', 'No product selected')
            $('#place-order-btn').html(placeOrderBtn)
        }
    } else {
        round_alert('error', 'No product selected')
        $('#place-order-btn').html(placeOrderBtn)
    }


}


const resetOrder = () => {
    sessionStorage.clear();
    window.location.reload()
}


const showHideProductDetails = () => {
    getAddedProductDetails()
    $('.sticky-product-details').toggleClass('sticky-product-details-show')
}

const show_modal = (id) => {
    $("#" + id).modal("show");
}

const continue_modal = (id) => {
    if (sessionStorage.getItem('order_id') !== null) {
        $("#customer-details input[name='name']").attr('readonly', true)
        $("#customer-details input[name='phone']").attr('readonly', true)
        $("#customer-details input[name='email']").attr('readonly', true)
        $("#customer-details input[name='no_of_people']").attr('readonly', true)
        $("#customer-details input[name='dob']").attr('readonly', true)
    }
    show_modal(id)
}

const getOrderDetailsUsingOrderId = (order_id) => {
    if (order_id != '') {
        $.ajax({
            type: "post",
            url: `/get-order-details/${order_id}`,
            data: {
                order_id: order_id
            },
            success: function (response) {
                let order_data = response['order_data']
                let products = JSON.parse(order_data['productData'])
                let customer = order_data['customer']

                let customer_data = {
                    name: customer['name'], phone: customer['phone'], email: customer['email'], no_of_people: "1", dob: customer['dob']
                }

                sessionStorage.setItem('ordered_products', JSON.stringify(products))

                if (sessionStorage.getItem('order_id') === null) {
                    sessionStorage.setItem('order_id', order_id)
                }
                if (sessionStorage.getItem('customer_details') === null) {
                    sessionStorage.setItem('customer_details', JSON.stringify(customer_data))
                }

                initializeOrder()

                // get order and customer details after first order placement 
                showOrderedProduct()
                customerDetailsAfterOrder()
                setPlaceOrderButton()
            }
        });
    }
}

const customerDetailsAfterOrder = () => {
    let customer_details = sessionStorage.getItem('customer_details')

    if (customer_details === null) {
        $('#customer-details-after-order').addClass('d-none').removeClass('d-block')
    } else {
        $('#customer-details-after-order').removeClass('d-none').addClass('d-block')
        customer_details = JSON.parse(customer_details)

        $('#customer-details-table').html(`
      <tr>
          <th>Name</th>
          <td>${customer_details['name']}</td>
      </tr>
      <tr>
          <th>Phone</th>
          <td>${customer_details['phone']}</td>
      </tr>
      <tr>
          <th>Email</th>
          <td>${customer_details['email']}</td>
      </tr>
      <tr>
          <th>Date Of Birth</th>
          <td>${customer_details['dob']}</td>
      </tr>
    `)

    }

}


const showOrderedProduct = () => {

    let products = sessionStorage.getItem('ordered_products')

    if (products === null || products.length <= 0) {
        $('#product-details-after-order').addClass('d-none').removeClass('d-block')
    } else {
        $('#product-details-after-order').removeClass('d-none').addClass('d-block')
        products = JSON.parse(products)
        $('#product-details-tbody').html('')
        products.forEach(single_products => {
            let order_status = single_products['order_status']
            let status;
            if (order_status == 'Recieved') {
                status = "<span class='badge text-bg-primary'>Recieved</span>"
            }
            else if (order_status == 'Processing') {
                status = "<span class='badge text-bg-warning'>Processing</span>"
            }
            else if (order_status == 'Prepared') {
                status = "<span class='badge text-bg-success'>Prepared</span>"

            }
            $('#product-details-tbody').append(`
               <tr>
                    <td>${single_products['product_name']}</td>
                    <td class='text-center'>${single_products['product_qty']}</td>
                    <td class='text-center'>${status}</td>
               </tr>
              `)
        });
    }
}


const setPlaceOrderButton = () => {
    let order_id = sessionStorage.getItem('order_id')
    if (order_id !== null) {
        $("#sticky-bottom-button").html(`
         <button type="button" class="order-sticky-button product-details" onclick="showHideProductDetails()">Product
         Details</button>
     <button type="button" class="order-sticky-button product-continue"
         onclick="placeOrder()">Place Order</button>
         `)
    }
}


const initializeOrder = () => {
    showProductAndActivateActiveClass()
    getAddedProductDetails()
    calculateAmountDetails()
    customerDetails()
    showAmountDetails()
    if (sessionStorage.getItem('order_id') !== null) {
        $('#reset-button').attr('disabled', true)
        $('#order-details-accordian-box').addClass('d-block').removeClass('d-none')
    } else {
        $('#order-details-accordian-box').addClass('d-none').removeClass('d-block')
    }
}

initializeOrder()



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

const deleteReceipt = (file_name) => {
    $.ajax({
        type: "post",
        url: "/customer-ajax",
        data: {
            isset_delete_bill: true,
            file_name: file_name
        },
        success: function (response) {
            console.log(response)
        }
    });
}


const generateBill = () => {
    let order_id
    order_id = sessionStorage.getItem('order_id');

    if (order_id !== null) {
        $.ajax({
            type: "POST",
            url: "/customer-ajax",
            data: {
                isset_print_bill: true,
                order_id: order_id
            },
            success: function (response) {
                console.log(response)
                if (response['status'] === true) {
                    let url = response['url']
                    let filename = response['filename']
                    downloadPDF(url, filename)
                    deleteReceipt(filename)
                } else {
                    round_alert('error', response['msg'])
                }
            }
        });
    } else {
        round_alert('error', 'Order not completed');
    }
}
