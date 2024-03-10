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

const showHideCart = (show_or_hide) => {
    showProductAndActivateActiveClass();
    if (show_or_hide == 'show') {
        getAddedProductDetails()
        $('.cart-container').css('bottom', '0')
        $('body').css('overflow-y', 'hidden')
    } else {
        $('.cart-container').css('bottom', '-150%')
        $('body').css('overflow-y', 'auto')
    }
}

const showQrCode = (this_value) => {
    if (this_value == 'qr-code') {
        $('#payment-qr-code').removeClass('d-none').addClass('d-flex')
    } else {
        $('#payment-qr-code').removeClass('d-flex').addClass('d-none')
    }
}

const showHideSubUnit = (show_or_hide) => {
    showProductAndActivateActiveClass();
    if (show_or_hide == 'show') {
        $('.sub-unit-container').css('bottom', '0')
        $('body').css('overflow-y', 'hidden')
    } else {
        $('.sub-unit-container').css('bottom', '-150%')
        $('body').css('overflow-y', 'auto')
    }
}

const shopPage = () => {
    let shop_page_url = sessionStorage.getItem('shop_page')
    window.location.href = shop_page_url
}

const showOrder = (url) => {
    let order_detail_url = sessionStorage.getItem('order-details-url')
    if (order_detail_url == null) {
        window.location.href = url
    } else {
        window.location.href = order_detail_url
    }
}

const cartItemCount = () => {
    let products = sessionStorage.getItem('products');
    let cart_total = 0;
    if (products !== null) {
        products = JSON.parse(products)
        cart_total = products.length;
    }
    $('.cart-count').html(`${cart_total}`)
}

const termConditionsCheckbox = (event) => {
    if ($(event.target).prop('checked')) {
        console.log('checked');
    } else {
        console.log('not-checked');
    }
}

//  select category 
const selectCategory = (cat_id) => {
    sessionStorage.setItem('category', cat_id)
    activeCategory()
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

                let dynamic_id;

                product.forEach(element => {

                    dynamic_id = Math.ceil(Math.random() * 10000000000)

                    let unit_and_price = element['price']

                    let unit = []
                    let price = []
                    unit_and_price.forEach(unit_and_price_element => {
                        unit.push(unit_and_price_element[0])
                        price.push(unit_and_price_element[1])
                    });

                    // set plus button to minus if the product is selected 

                    let selected_products
                    let qty = 0;
                    let selected_pro_id = '';
                    let id = [];
                    let product_count = []

                    if (sessionStorage.getItem('products') !== null) {
                        selected_products = JSON.parse(sessionStorage.getItem('products'))
                        if (selected_products.length > 0) {
                            for (let i = 0; i < selected_products.length; i++) {
                                let selected_product_element = selected_products[i];
                                let product_id = selected_product_element['product_id'];
                                if (product_id == element['auto_product_id']) {
                                    qty += selected_product_element['product_qty']
                                    selected_pro_id = selected_product_element['product_id']
                                    id.push(selected_product_element['id'])
                                    product_count.push(product_id)
                                }
                            }
                        }
                    }

                    let unit_length = unit.length;

                    let action_btn;
                    if (product_count.length > 1) {
                        action_btn = `<div class="qty-btn">
                        <button type="button" onclick="showSubCatQtyBox('${dynamic_id}','${id}')">
                            <i class="fa-solid fa-minus"></i>
                        </button>
                        <span   >${qty}</span>
                        <button type="button" onclick="showSubCatQtyBox('${dynamic_id}','${id}')">
                            <i class="fa-solid fa-plus"></i>
                        </button>
                    </div>`
                    } else if (product_count.length == 1) {
                        action_btn = `<div class="qty-btn">
                        <button type="button" onclick="updateQty('${id[0]}','${selected_pro_id}','dec','${dynamic_id}')" >
                            <i class="fa-solid fa-minus"></i>
                        </button>
                        <span id="pro_qty_${dynamic_id}" >${qty}</span>
                        <button type="button" onclick="updateQty('${id[0]}','${selected_pro_id}','inc','${dynamic_id}')">
                            <i class="fa-solid fa-plus"></i>
                        </button>
                    </div>`
                    } else {
                        action_btn = `<div class="add-btn"><button type="button" onclick="selectProduct('${dynamic_id}')" > Add</button></div>`
                    }


                    $('.product-row').append(`
                    <div class="product-style-1" id='product_box_${dynamic_id}'>
                        <input type='hidden' name='unit_and_price' value='${JSON.stringify(unit_and_price)}' id='unit_price${dynamic_id}' >
                        
                        <div class="product-style-img">
                        ${element['img']}
                        </div>
                        <div class="product-style-content">
                            <div class="product-style-cat">
                                <span>${element['category']}</span>
                            </div>
                            <strong class="product-style-name">${element['name']}</strong>
                            <div class="product-style-price-box">
                                <strong class="product-style-price">₹${price[0]}</strong>
                                <div class="add-product" id="action_box_${dynamic_id}">
                                ${action_btn}
                            </div>
                        </div>
                            <input type='hidden' value='${unit[0]}' id='unit_val_${dynamic_id}'>
                            <input type='hidden' value='${price[0]}' id='price_val_${dynamic_id}'>
                            <input type='hidden' value='${element['auto_product_id']}' id='auto_product_id_${dynamic_id}'>
                            <input type='hidden' value='${element['name']}' id='product_name_${dynamic_id}'>
                            <input type='hidden' value="${element['img']}" id='product_img_${dynamic_id}'>
                      </div>
                    `);

                });
            }
        }
    });
}

const activeCategory = () => {
    let cat_id = sessionStorage.getItem('category')
    $.each($('.show-cat-box'), function () {
        $(this).removeClass('active')
        let dataCatId = $(this).attr('data-catid')
        if (dataCatId == cat_id) {
            $(this).addClass('active')
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
            console.log("Selected Category: ", response)
            $('.product-row').html('')
            if (response['status']) {
                let product = response['product']

                let dynamic_id;

                product.forEach(element => {

                    dynamic_id = Math.ceil(Math.random() * 10000000000)

                    let unit_and_price = element['price']

                    let unit = []
                    let price = []
                    unit_and_price.forEach(unit_and_price_element => {
                        unit.push(unit_and_price_element[0])
                        price.push(unit_and_price_element[1])
                    });

                    // set plus button to minus if the product is selected 

                    let selected_products
                    let qty = 0;
                    let selected_pro_id = '';
                    let id = [];
                    let product_count = []

                    if (sessionStorage.getItem('products') !== null) {
                        selected_products = JSON.parse(sessionStorage.getItem('products'))
                        if (selected_products.length > 0) {
                            for (let i = 0; i < selected_products.length; i++) {
                                let selected_product_element = selected_products[i];
                                let product_id = selected_product_element['product_id'];
                                if (product_id == element['auto_product_id']) {
                                    qty += selected_product_element['product_qty']
                                    selected_pro_id = selected_product_element['product_id']
                                    id.push(selected_product_element['id'])
                                    product_count.push(product_id)
                                }
                            }
                        }
                    }

                    let unit_length = unit.length;

                    let action_btn;
                    if (product_count.length > 1) {
                        action_btn = `<div class="qty-btn">
                        <button type="button" onclick="showSubCatQtyBox('${dynamic_id}','${id}')">
                            <i class="fa-solid fa-minus"></i>
                        </button>
                        <span   >${qty}</span>
                        <button type="button" onclick="showSubCatQtyBox('${dynamic_id}','${id}')">
                            <i class="fa-solid fa-plus"></i>
                        </button>
                    </div>`
                    } else if (product_count.length == 1) {
                        action_btn = `<div class="qty-btn">
                        <button type="button" onclick="updateQty('${id[0]}','${selected_pro_id}','dec','${dynamic_id}')" >
                            <i class="fa-solid fa-minus"></i>
                        </button>
                        <span id="pro_qty_${dynamic_id}" >${qty}</span>
                        <button type="button" onclick="updateQty('${id[0]}','${selected_pro_id}','inc','${dynamic_id}')">
                            <i class="fa-solid fa-plus"></i>
                        </button>
                    </div>`
                    } else {
                        action_btn = `<div class="add-btn"><button type="button" onclick="selectProduct('${dynamic_id}')" > Add</button></div>`
                    }


                    $('.product-row').append(`
                    <div class="product-style-1" id='product_box_${dynamic_id}'>
                        <input type='hidden' name='unit_and_price' value='${JSON.stringify(unit_and_price)}' id='unit_price${dynamic_id}' >
                        
                        <div class="product-style-img">
                        ${element['img']}
                        </div>
                        <div class="product-style-content">
                            <div class="product-style-cat">
                                <span>${element['category']}</span>
                            </div>
                            <strong class="product-style-name">${element['name']}</strong>
                            <div class="product-style-price-box">
                                <strong class="product-style-price">₹${price[0]}</strong>
                                <div class="add-product" id="action_box_${dynamic_id}">
                                ${action_btn}
                            </div>
                        </div>
                            <input type='hidden' value='${unit[0]}' id='unit_val_${dynamic_id}'>
                            <input type='hidden' value='${price[0]}' id='price_val_${dynamic_id}'>
                            <input type='hidden' value='${element['auto_product_id']}' id='auto_product_id_${dynamic_id}'>
                            <input type='hidden' value='${element['name']}' id='product_name_${dynamic_id}'>
                            <input type='hidden' value="${element['img']}" id='product_img_${dynamic_id}'>
                      </div>
                    `);

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
    activeCategory()

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

    let unit_and_price_json = $('#unit_price' + dynamic_id).val()
    let unit_and_price = JSON.parse(unit_and_price_json);

    let unit = $('#unit_val_' + dynamic_id).val()
    let price = $('#price_val_' + dynamic_id).val() // this is price of product according to per unit
    let product_id = $('#auto_product_id_' + dynamic_id).val()
    let product_name = $('#product_name_' + dynamic_id).val()
    let product_img = $('#product_img_' + dynamic_id).val()

    if (unit_and_price.length > 0) {
        $('#sub-unit-wrapper').html('')
        let n
        unit_and_price.forEach(element => {
            let n = Math.ceil(Math.random() * 100000000);
            $('#sub-unit-wrapper').append(`
            <div class="sub-unit-product-details">
            <div class="sub-unit-product-content">
                <div class="sub-unit-product-img">
                    ${product_img}
                </div>
                <div class="sub-unit-product-name-box">
                    <span class="sub-unit-product-unit">${element[0]}</span>
                    <strong class="sub-unit-product-price">₹${element[1]}</strong>
                </div>
            </div>

            <div class="sub-unit-product-qty" id='action_box_${n}'>
                <div class="add-btn"><button type="button" onclick="selectSubUnitProduct('${n}')">Add</button></div>
            </div>
            <input type='hidden' name='unit_and_price' value='${unit_and_price_json}' id='unit_price${n}' >
            <input type='hidden' value='${element[0]}' id='sub_unit_val_${n}'>
            <input type='hidden' value='${element[1]}' id='sub_price_val_${n}'>
            <input type='hidden' value='${product_id}' id='sub_auto_product_id_${n}'>
            <input type='hidden' value='${product_name}' id='sub_product_name_${n}'>
            <input type='hidden' value="${product_img}" id='sub_product_img_${n}'>
            </div> 
            `)


        });
        showHideSubUnit('show');
    } else {

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
                product_img: product_img,
                product_unit: unit,
                product_qty: 1,
                price_per_unit: price,
                product_price: price,
                status: 'unsave',
                order_status: 'Recieved',
                id: product_id + unit
            }
            // store the product data into session storage 
            products.push(product_data);

            sessionStorage.setItem('products', JSON.stringify(products));

            let id = product_id + unit
            $("#action_box_" + dynamic_id).html(`
            <div class="qty-btn">
                <button type="button" onclick="updateQty('${id}','${product_id}','dec','${dynamic_id}')" >
                    <i class="fa-solid fa-minus"></i>
                </button>
                <span id="pro_qty_${dynamic_id}" >1</span>
                <button type="button" onclick="updateQty('${id}','${product_id}','inc','${dynamic_id}')">
                    <i class="fa-solid fa-plus"></i>
                </button>
            </div>
            `)
        }
        getAddedProductDetails()
        calculateAmountDetails()
        cartItemCount()
    }
}


const selectSubUnitProduct = (dynamic_id) => {
    let unit = $('#sub_unit_val_' + dynamic_id).val()
    let price = $('#sub_price_val_' + dynamic_id).val() // this is price of product according to per unit 
    let product_id = $('#sub_auto_product_id_' + dynamic_id).val()
    let product_name = $('#sub_product_name_' + dynamic_id).val()
    let product_img = $('#sub_product_img_' + dynamic_id).val()


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
            product_img: product_img,
            product_unit: unit,
            product_qty: 1,
            price_per_unit: price,
            product_price: price,
            status: 'unsave',
            order_status: 'Recieved',
            id: product_id + unit
        }
        // store the product data into session storage 
        products.push(product_data);

        sessionStorage.setItem('products', JSON.stringify(products));

        let id = product_id + unit
        $("#action_box_" + dynamic_id).html(`
         <div class="qty-btn">
         <button type="button" onclick="updateQty('${id}','${product_id}','dec','${dynamic_id}',true)" >
             <i class="fa-solid fa-minus"></i>
         </button>
         <span id="pro_qty_${dynamic_id}" >1</span>
         <button type="button" onclick="updateQty('${id}','${product_id}','inc','${dynamic_id}',true)">
             <i class="fa-solid fa-plus"></i>
         </button>
        </div>
        `)
    }
    getAddedProductDetails()
    calculateAmountDetails()
    cartItemCount()
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
        if (products.length > 0) {
            $('#selected-products').html('')
            let index = 0;
            products.forEach((single_product) => {

                let dynamic_id = Math.ceil(Math.random() * 1000000000)

                let id = single_product['id']
                let pro_id = single_product['product_id']
                let pro_unit = single_product['product_unit']
                let pro_name = single_product['product_name']
                let pro_price = single_product['product_price']
                let pro_img = single_product['product_img']
                let product_status = single_product['status']
                let pro_qty = single_product['product_qty']

                if (product_status == 'unsave') {
                    $('#selected-products').append(`
                    <div class="cart-product-details">
                    <div class="cart-product-content">
                        <div class="cart-product-img">
                             ${pro_img}
                        </div>
                        <div class="cart-product-name-box">
                            <strong class="cart-product-name">${pro_name}</strong>
                            <span class="cart-product-unit">${pro_unit}</span>
                            <strong class="cart-product-price">₹${pro_price}</strong>
                        </div>
                    </div>
                    <div class="cart-product-qty">
                        <div class="qty-btn">
                            <button type="button" onclick="updateQty('${id}','${pro_id}','dec','${dynamic_id}')" >
                                <i class="fa-solid fa-minus"></i>
                            </button>
                            <span id="pro_qty_${dynamic_id}">${pro_qty}</span>
                            <button type="button" onclick="updateQty('${id}','${pro_id}','inc','${dynamic_id}')" >
                                <i class="fa-solid fa-plus"></i>
                            </button>
                        </div>
                    </div>
                </div>
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
            $('#selected-products').html(`<h5 class='text-danger no-product'>0 item selected</h5>`)
        }
    } else {
        $('#selected-products').html(`<h5 class='text-danger no-product'>0 item selected</h5>`)
    }

    calculateAmountDetails()
}

const updateQty = (id, product_id, inc_dec, dynamic_id, sub_unit = false) => {
    let products = sessionStorage.getItem('products');
    products = JSON.parse(products)

    let product_qty
    let product_price_per_unit
    let product_unit
    let index
    for (i = 0; i < products.length; i++) {
        if (Object.values(products[i]).includes(id)) {
            product_qty = Object.values(products[i])[4]
            product_price_per_unit = Object.values(products[i])[5]
            product_unit = Object.values(products[i])[3]
            index = i
            break
        }
    }

    // let product_price = 0;

    if (inc_dec == 'inc') {
        product_qty++;
        product_price = product_price_per_unit * product_qty
        products[index]['product_qty'] = product_qty
        products[index]['product_price'] = product_price
        $('#pro_qty_' + dynamic_id).html(product_qty)
    } else {
        if (product_qty <= 1) {
            products.splice(index, 1)
            showProductAndActivateActiveClass()

            if (sub_unit == false || sub_unit == 'false') {
                $("#action_box_" + dynamic_id).html(`<div class="add-btn"><button type="button" onclick="selectProduct('${dynamic_id}')" > Add</button></div>`)
            } else if (sub_unit == 'true' || sub_unit == true) {
                $("#action_box_" + dynamic_id).html(`<div class="add-btn"><button type="button" onclick="selectSubUnitProduct('${dynamic_id}')" > Add</button></div>`)

            }
        } else if (product_qty > 1) {
            product_qty--
            product_price = product_price_per_unit * product_qty
            products[index]['product_qty'] = product_qty
            products[index]['product_price'] = product_price
            $('#pro_qty_' + dynamic_id).html(product_qty)
        }
    }

    sessionStorage.setItem('products', JSON.stringify(products))
    calculateAmountDetails()
    cartItemCount()
    getAddedProductDetails()
}

const showSubCatQtyBox = (dynamic_id, id_arr) => {

    id_arr = id_arr.split(',')
    let unit_and_price_json = $('#unit_price' + dynamic_id).val();
    let unit_and_price = JSON.parse(unit_and_price_json);


    let products = sessionStorage.getItem('products');
    products = JSON.parse(products)


    let product_id = $('#auto_product_id_' + dynamic_id).val()
    let product_name = $('#product_name_' + dynamic_id).val()
    let product_img = $('#product_img_' + dynamic_id).val()

    if (unit_and_price.length > 0) {
        $('#sub-unit-wrapper').html('')
        let n = Math.ceil(Math.random() * 10000000);
        let i = 0;
        unit_and_price.forEach(element => {
            let qty
            let id = id_arr[i]
            for (let j = 0; j < products.length; j++) {
                if (Object.values(products[j]).includes(id)) {
                    qty = Object.values(products[j])[4]
                    break
                }
            }

            $('#sub-unit-wrapper').append(`
            <div class="sub-unit-product-details">
            <div class="sub-unit-product-content">
                <div class="sub-unit-product-img">
                    ${product_img}
                </div>
                <div class="sub-unit-product-name-box">
                    <span class="sub-unit-product-unit">${element[0]}</span>
                    <strong class="sub-unit-product-price">₹${element[1]}</strong>
                </div>
            </div>

            <div class="sub-unit-product-qty" id='action_box_${dynamic_id}'>
                <div class="qty-btn">
                    <button type="button" onclick="updateQty('${id}','${product_id}','dec','${dynamic_id}',true)">
                        <i class="fa-solid fa-minus"></i>
                    </button>
                    <span id="pro_qty_${dynamic_id}" >${qty}</span>
                    <button type="button" onclick="updateQty('${id}','${product_id}','inc','${dynamic_id}',true)">
                        <i class="fa-solid fa-plus"></i>
                    </button>
                </div>
            </div>
            <input type='hidden' name='unit_and_price' value='${unit_and_price_json}' id='unit_price${n}' >
            <input type='hidden' value='${element[0]}' id='unit_val_${n}'>
            <input type='hidden' value='${element[1]}' id='price_val_${n}'>
            <input type='hidden' value='${product_id}' id='auto_product_id_${n}'>
            <input type='hidden' value='${product_name}' id='product_name_${n}'>
            <input type='hidden' value="${product_img}" id='product_img_${n}'>

        </div> 
            `)

            i++;

        });
        showHideSubUnit('show');
    }

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
    let amount = sessionStorage.getItem('amount')

    let total_item;
    let product_amount;
    let gst_amount;
    let total_amount;

    if (amount != null) {
        amount = JSON.parse(amount)
        total_item = amount['items'];
        product_amount = amount['product_amount'];
        gst_amount = amount['gst'];
        total_amount = amount['total_amount'];
    } else {
        total_item = 0;
        product_amount = 0;
        gst_amount = 0;
        total_amount = 0;
    }

    $('#bill-total-item').html(`${total_item}`)
    $('#bill-sub-total').html(`₹${product_amount}`)
    $('#bill-tax').html(`₹${gst_amount}`)
    $('#bill-grand-total').html(`₹${total_amount}`)

}

const footerMenuActiveClass = (menu_name) => {
    sessionStorage.setItem('menu_name', menu_name)

    $('.footer-menu').removeClass('active')
    if (menu_name == 'shop') {
        $('#footer-shop').addClass('active')
    } else if (menu_name == 'order') {
        $('#footer-order-details').addClass('active')
    } else if (menu_name == 'cart') {
        $('#footer-cart').addClass('active')
    }
}

// show customer details 

const customerDetails = () => {

    let customer_details = sessionStorage.getItem('customer_details')
    let order_instruction = sessionStorage.getItem('order_instruction')
    if (customer_details !== null) {

        customer_details = JSON.parse(customer_details)

        $("#customer-details input[name='name']").val(customer_details['name']).attr('readonly', true)
        $("#customer-details input[name='phone']").val(customer_details['phone']).attr('readonly', true)
        $("#customer-details input[name='email']").val(customer_details['email']).attr('readonly', true)
        $("#customer-details input[name='no_of_people']").val(customer_details['no_of_people']).attr('readonly', true)
        $("#customer-details input[name='dob']").val(customer_details['dob']).attr('readonly', true)
    }

    $('#order_instruction').val(order_instruction)
}

const placeOrder = () => {

    let placeOrderBtn = $('#place-order-btn').html()
    $('#place-order-btn').html(`<button type='button' class='custom-btn'>Processing...</button>`)

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
            let order_instruction = $('#order_instruction').val()
            let customer_details = {
                name: name,
                phone: phone,
                email: email,
                no_of_people: no_of_people,
            }

            sessionStorage.setItem('customer_details', JSON.stringify(customer_details))
            sessionStorage.setItem('order_instruction', order_instruction)

            // table id 
            let table_no = sessionStorage.getItem('table_no')
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
                        order_instruction: order_instruction,
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
                        order_instruction: order_instruction,
                        table_no: table_no,
                    }
                }

                $.ajax({
                    type: "post",
                    url: "/customer/place-order",
                    data: ajax_data,
                    success: function (response) {

                        console.log(response)

                        if (response['status']) {

                            sessionStorage.removeItem('products')
                            sessionStorage.removeItem('amount')

                            round_alert('success', response['msg'])
                            $('#place-order-btn').html(placeOrderBtn)

                            let order_id = response['order_id']
                            sessionStorage.setItem("order_id", order_id)

                            $('#order-alert').html(`
                            <div class="alert alert-success" role="alert">
                             <strong>Order saved successfully. Your order id is ${order_id}. Please note down your order id for further use.</strong>
                            </div>`)

                            initializeOrder()

                            sessionStorage.setItem('ordered_products', JSON.stringify(response['ordered_products']))
                            sessionStorage.setItem('order-details-url', response['redirect'])
                            window.location.href = response['redirect']

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

const getOrderDetailsUsingOrderId = (order_id) => {

    if (order_id != '') {
        $.ajax({
            type: "post",
            url: `/customer/get-order-details/${order_id}`,
            data: {
                order_id: order_id
            },
            success: function (response) {
                console.log(response)
                let order_data = response['order_data']
                let products = JSON.parse(order_data['productData'])
                let customer = order_data['customer']
                let order_detail_url = response['order_detail_url']
                sessionStorage.setItem('ordered_products', JSON.stringify(products))
                sessionStorage.setItem('order-details-url', order_detail_url)
                sessionStorage.setItem('order_id', order_data['order_id'])

                let customer_details =
                {
                    name: customer['name'], phone: customer['phone'], email: customer['email'], no_of_people
                        : order_data['no_of_people']
                }
                sessionStorage.setItem('customer_details', JSON.stringify(customer_details))
            }
        });
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
    // getAddedProductDetails()
    calculateAmountDetails()
    customerDetails()
    // showAmountDetails()
    cartItemCount()
    if (sessionStorage.getItem('order_id') !== null) {
        $('#reset-button').attr('disabled', true)
        $('#order-details-accordian-box').addClass('d-block').removeClass('d-none')
        $('.login-or-box').hide()
        $('.login-box').hide()
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

const generateBill = (order_id, route, event) => {
    $(event.target).attr('disabled', true).html('Processing...')
    let payment_method;
    $.each($('.payment-checkbox'), function () {
        if ($(this).prop('checked')) {
            payment_method = $(this).val()
        }
    });
    if (payment_method != undefined) {
        if (order_id !== null) {
            $.ajax({
                type: "POST",
                url: route,
                data: {
                    order_id: order_id,
                    payment_method: payment_method,
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
                    $(event.target).attr('disabled', false).html('Generate Bill')
                }
            });
        } else {
            round_alert('error', 'Order not completed');
            $(event.target).attr('disabled', false).html('Generate Bill')
        }
    } else {
        round_alert('error', 'Please choose a payment method');
        $(event.target).attr('disabled', false).html('Generate Bill')
    }
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

function setAlertData(alertmsg, alertbox) {
    localStorage.setItem("alertMessage", alertmsg);
    localStorage.setItem("alertBoxId", alertbox);
    localStorage.setItem("alertCount", "0");
}
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
