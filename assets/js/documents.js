
//Tables
let table_products = document.getElementById('table_Products');
let table_body_product = document.getElementById('table_body_product');

//modal AddProduct
const modal_add_product = document.getElementById('modal_add_product');
const input_code_product = document.getElementById('code_product');
const input_quantity_product = document.getElementById('quantity_product');
const input_priceUnit_product = document.getElementById('price_unit_product');
const input_description_product = document.getElementById('description_product');
const input_discount_product = document.getElementById('discount_product');
const input_total_product = document.getElementById('total_product');
//modal UpdateProduct
const modal_update_product = document.getElementById('modal_update_product');
const input_code_productA = document.getElementById('code_productA');
const input_quantity_productA = document.getElementById('quantity_productA');
const input_priceUnit_productA = document.getElementById('price_unit_productA');
const input_description_productA = document.getElementById('description_productA');
const input_discount_productA = document.getElementById('discount_productA');
const input_total_productA = document.getElementById('total_productA');
//Etiquetas de monto
const label_Subtotal = document.getElementById('label_subtotal');
const label_discount = document.getElementById('label_discount');
const label_total = document.getElementById('label_total');

//Buttons
const btn_add_product = document.getElementById('btn_add_product');
const btn_cancel_product = document.getElementById('btn_cancel_product');

const btn_update_product = document.getElementById('btn_update_product');
const btn_cancelU_product = document.getElementById('btn_cancelU_product');

const btn_generate_document = document.getElementById('btn_generate_document');
const btn_cancel_document = document.getElementById('btn_cancel_document');


//Variables y funciones Globales
const Toast = Swal.mixin({
  toast: true,
  position: 'bottom-start',
  showConfirmButton: false,
  timer: 2000,
  timerProgressBar: true,
  didOpen: (toast) => {
    toast.addEventListener('mouseenter', Swal.stopTimer)
    toast.addEventListener('mouseleave', Swal.resumeTimer)
  }
})

let subTotal_shopping = new Number(0);
let discount_shopping = new Number(0);
let total_shopping = new Number(0);
let $id = 1;

//arreglos
// let array_co = [];
// let facturas = [];
let arrayProducts = [];

//Esta funciona para dibujar la tabla
const add_product_table = () => {
  table_body_product.innerHTML = "";
  arrayProducts.forEach((product) => {
    let row = document.createElement("TR");
    row.setAttribute("id", "product_" + product.code);
    row.innerHTML = `<td>${product.quantity}</td>
                      <td>${product.description}</td>
                      <td>${parseFloat(product.price_unit).toFixed(2)}</td>
                      <td>${parseFloat(product.discount).toFixed(2)}</td>
                      <td>${parseFloat(product.total).toFixed(2)}</td>
                      `;
    let tdActions = document.createElement("td");
    tdActions.innerHTML = `<button type="button" class="btn btn-watsy text-white mx-1" onclick="cargarDatos(${product.code})" data-toggle="modal" data-target="#modal_update_product"><i class="fas fa-edit"></i></button>`;

    let btnDelete = document.createElement("button");
    let iconDelete = document.createElement('i');
    iconDelete.classList.add("fas", "fa-trash");
    btnDelete.onclick = () => {
      deleteProduct(product.code);
    };

    btnDelete.classList.add("btn", "btn-watsy", "text-white", "mx-1");
    btnDelete.appendChild(iconDelete);
    tdActions.appendChild(btnDelete);
    row.appendChild(tdActions);
    table_body_product.appendChild(row);
  })
};

const inputNull = (input, state = true, valueText = "") => {
  if (state == true) {
    if (input.value == valueText) {
      input.classList.add("remarcar");
    }
  } else {
    input.classList.remove("remarcar");
  }
}

btn_add_product.onclick = () => {
  if (input_description_product.value == "" || input_quantity_product.value == "" || input_priceUnit_product.value == "" || input_total_product.value == "") {
    Toast.fire({
      icon: 'warning',
      title: 'Los campos remarcados no puedene estar vacios'
    })

    inputNull(input_description_product);
    inputNull(input_quantity_product);
    inputNull(input_priceUnit_product);
    inputNull(input_total_product);

  } else {
    input_code_product.value = $id;
    $id++;
    let unit_price = parseFloat(input_priceUnit_product.value).toFixed(2);
    input_discount_product.value = input_discount_product.value || 0.0;
    let discount_price = parseFloat(input_discount_product.value).toFixed(2);
    let total_price = parseFloat(input_total_product.value).toFixed(2);

    const objProduct = {
      code: input_code_product.value,
      quantity: input_quantity_product.value,
      description: input_description_product.value,
      price_unit: unit_price,
      discount: discount_price,
      total: total_price
    };
    arrayProducts.push(objProduct);

    subTotal_shopping += parseFloat(objProduct.total);
    label_Subtotal.innerText = subTotal_shopping.toFixed(2).toLocaleString("en-US");
    discount_shopping += parseFloat(objProduct.discount);
    label_discount.innerText = discount_shopping.toFixed(2).toLocaleString("en-US");
    total_shopping = parseFloat(subTotal_shopping) - parseFloat(discount_shopping);
    label_total.innerText = total_shopping.toFixed(2).toLocaleString("en-US");

    btn_cancel_document.classList.remove('hide');
    btn_generate_document.removeAttribute("disabled");
    add_product_table();
    clean_form_product();
    $(modal_add_product).modal('hide');
    console.log(arrayProducts);
  }
}

const deleteProduct = (id) => {
  arrayProducts = arrayProducts.filter((product) => {
    if (+id !== +product.code) {
      return product;
    } else {
      subTotal_shopping -= parseFloat(product.total);
      label_Subtotal.innerText = subTotal_shopping.toFixed(2).toLocaleString("en-US");

      discount_shopping -= parseFloat(product.discount);
      label_discount.innerText = discount_shopping.toFixed(2).toLocaleString("en-US");

      total_shopping = subTotal_shopping - discount_shopping;
      label_total.innerText = total_shopping.toFixed(2).toLocaleString("en-US");
      document.querySelector("#product_" + product.code).remove();
    }
  });
  if (arrayProducts.length == 0) {
    $id = 1;
    btn_generate_document.setAttribute("disabled", "disabled");
    btn_cancel_document.classList.add('hide');
  }
};

btn_update_product.onclick = () => {
  let codeP = input_code_productA.value;

  if (input_description_productA.value == "" || input_quantity_productA.value == "" || input_priceUnit_productA.value == "" || input_total_productA.value == "") {
    Toast.fire({
      icon: 'warning',
      title: 'Los campos remarcados no puedene estar vacios'
    })

    inputNull(input_description_productA);
    inputNull(input_quantity_productA);
    inputNull(input_priceUnit_productA);
    inputNull(input_total_productA);

  } else {
    arrayProducts = arrayProducts.map((product) => {
      if (+codeP === +product.code) {
        let row = document.querySelector("#product_" + codeP);
        row.children[0].innerText = input_quantity_productA.value;
        row.children[1].innerText = input_description_productA.value;
        row.children[2].innerText = parseFloat(input_priceUnit_productA.value).toFixed(2);
        row.children[3].innerText = parseFloat(input_discount_productA.value).toFixed(2);
        row.children[4].innerText = input_total_productA.value;

        let diffDiscount;
        let diffTotal;

        if (+input_discount_productA.value > +product.discount) {
          diffDiscount = parseFloat(input_discount_productA.value - product.discount);
          discount_shopping += diffDiscount;
        } else if (+input_discount_productA.value < +product.discount) {
          diffDiscount = parseFloat(product.discount - input_discount_productA.value);
          discount_shopping -= diffDiscount;
        } else if (+input_discount_productA.value == 0) {
          discount_shopping -= input_discount_productA.value;
        }


        if (+input_total_productA.value > +product.total) {
          diffTotal = parseFloat(input_total_productA.value - product.total);
          subTotal_shopping += diffTotal;
        } else if (+input_total_productA.value < +product.total) {
          diffTotal = parseFloat(product.total - input_total_productA.value);
          subTotal_shopping -= diffTotal;
        } else if (+input_total_productA.value == 0) {
          subTotal_shopping -= input_total_productA.value;
        } else if (+input_total_productA.value == +product.total) {
          subTotal_shopping += 0;
        }

        total_shopping = parseFloat(subTotal_shopping - discount_shopping);

        label_Subtotal.innerText = subTotal_shopping.toFixed(2).toLocaleString("en-US");
        label_discount.innerText = discount_shopping.toFixed(2).toLocaleString("en-US");
        label_total.innerText = total_shopping.toFixed(2).toLocaleString("en-US");

        return {
          code: codeP,
          quantity: input_quantity_productA.value,
          description: input_description_productA.value,
          price_unit: parseFloat(input_priceUnit_productA.value).toFixed(2),
          discount: parseFloat(input_discount_productA.value).toFixed(2),
          total: parseFloat(input_total_productA.value).toFixed(2)
        }
      }
      return product;
    });
    $('#modal_update_product').modal('hide');
  }
}

btn_cancel_product.onclick = () => {
  clean_form_product();
}

btn_cancelU_product.onclick = () => {
  clean_form_productA();
}


const clean_form_product = () => {
  input_quantity_product.value = "";
  input_priceUnit_product.value = "";
  input_description_product.value = "";
  input_discount_product.value = "";
  input_total_product.value = "";
  inputNull(input_description_product, false);
  inputNull(input_quantity_product, false);
  inputNull(input_priceUnit_product, false);
  inputNull(input_total_product, false);
  document.getElementById("limit_description_product").innerText = "165";
}

const clean_form_productA = () => {
  input_quantity_productA.value = "";
  input_priceUnit_productA.value = "";
  input_description_productA.value = "";
  input_discount_productA.value = "";
  input_total_productA.value = "";
  inputNull(input_description_productA, false);
  inputNull(input_quantity_productA, false);
  inputNull(input_priceUnit_productA, false);
  inputNull(input_total_productA, false);
  document.getElementById("limit_description_productA").innerText = "165";
}

const clean_all = () => {
  $id = 1;
  table_body_product.innerHTML = "";
  arrayProducts = [];
  subTotal_shopping = 0;
  label_Subtotal.innerText = "0.0";
  discount_shopping = 0;
  label_discount.innerText = "0.0";
  total_shopping = 0;
  label_total.innerText = "0.0";
  clean_data_client();
  input_description_work.value = "";
  document.getElementById("limit_description_work").innerText = "840";
  btn_cancel_document.classList.add('hide');
  btn_generate_document.setAttribute('disabled', "disabled");
}

const cargarDatos = (code) => {
  arrayProducts.find((product) => {
    if (+code === +product.code) {
      // { input_code_productA.value, input_quantity_productA.value, input_priceUnit_productA.value, input_description_productA.value, input_discount_productA.value, input_total_productA.value } = ...product;
      input_code_productA.value = +code;
      input_quantity_productA.value = product.quantity;
      input_priceUnit_productA.value = product.price_unit;
      input_description_productA.value = product.description;
      input_discount_productA.value = product.discount;
      input_total_productA.value = product.total;
    }
  });
}


btn_cancel_document.onclick = () => {
  clean_all();
}

//Inputs Modal ADD
input_quantity_product.onkeyup = () => {
  input_total_product.value = parseFloat(+input_quantity_product.value * input_priceUnit_product.value).toFixed(2);
}
input_priceUnit_product.onkeyup = () => {
  input_total_product.value = parseFloat(+input_quantity_product.value * input_priceUnit_product.value).toFixed(2);
}


//inputs Modal Update
input_quantity_productA.onkeyup = () => {
  input_total_productA.value = parseFloat(+input_quantity_productA.value * input_priceUnit_productA.value).toFixed(2);
}

input_priceUnit_productA.onkeyup = () => {
  input_total_productA.value = parseFloat(+input_quantity_productA.value * input_priceUnit_productA.value).toFixed(2);
}



//Globales
$(input_description_product).maxLength(166, {
  showNumber: "#limit_description_product",
  revert: true
});

