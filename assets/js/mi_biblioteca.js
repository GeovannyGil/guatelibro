'use strict'
const delete_book_library = document.getElementById('delete_book_library');
let id_member = 0;
let id_product = 0;
let id_member_u = 0;
let id_product_u = 0;
let id_user_library = 0;

const img_product = document.getElementById('img_product');
const title_product = document.getElementById('title_product');
const description_product = document.getElementById('description_product');
const member_up = document.getElementById('id_member_up');
const date_up = document.getElementById('date_up_book');
const btn_view_pdf = document.getElementById('view_pdf');

const btnEnviar = document.getElementById('btnSave');
const btnUpdate = document.getElementById('btnUpdate');
const btnDelete = document.getElementById('btnDelete');

const formProduct = document.getElementById('formProducts');
const productName = document.getElementById('productName').value;
const selectMember = document.getElementById('selectMember').value;
const description = document.getElementById('description').value;
const file_img = document.getElementById('file-upload1').value;
const file_document = document.getElementById('file').value;
const dateRegister = document.getElementById('dateRegister').value;
const select_category = document.getElementById('select_category').value;

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

const cargarDatosBiblioteca = (id, key_member) => {
    id_product = id;
    id_member = key_member;
    //Cargar Datos
    let formData = new FormData();
    formData.append('id_product', id);
    formData.append('id_member', key_member)

    var xhr = new XMLHttpRequest();
    xhr.open('POST', "http://localhost/guatelibro/Modales/Product", true);
    xhr.setRequestHeader('X-Requested-With', 'XMLHttpRequest');
    xhr.onreadystatechange = function () {
        if (xhr.readyState == 4 && xhr.status == 200) {
            var resultado = xhr.responseText;
            var json = JSON.parse(resultado);
            console.log(json);
            id_user_library = json.libro_existe[0].id_user;
            img_product.setAttribute("src", "http://localhost/guatelibro/assets/img/portadas/" + json.consulta[0]['image_product']);
            btn_view_pdf.setAttribute('href', 'http://localhost/guatelibro/ver/verLibro&p=' + json.consulta[0]['id_product']);
            title_product.innerText = json.consulta[0]['name_product'];
            description_product.innerText = json.consulta[0]['description_product'];
            member_up.innerText = json.consulta[0]['id_member'];
            date_up.innerText = json.consulta[0]['date_register'];
        }
    }
    xhr.send(formData);
}
const cargarDatosLibrosMios = (id, key_member) => {
    id_product_u = id;
    id_member_u = key_member;
    //Cargar Datos
    let formData = new FormData();
    formData.append('id_product', id);
    formData.append('id_member', key_member)

    var xhr = new XMLHttpRequest();
    xhr.open('POST', "http://localhost/guatelibro/Modales/Product", true);
    xhr.setRequestHeader('X-Requested-With', 'XMLHttpRequest');
    xhr.onreadystatechange = function () {
        if (xhr.readyState == 4 && xhr.status == 200) {
            var resultado = xhr.responseText;
            var json = JSON.parse(resultado);
            console.log(json);
            document.getElementById('view_pdf2').setAttribute('href', 'http://localhost/guatelibro/ver/verLibro&p=' + id_product_u);
            document.getElementById('keyProduct').value = id_product_u;
            document.getElementById('selectMemberU').value = id_member_u;
            document.getElementById('productNameU').value = json.consulta[0].name_product;
            document.getElementById('descriptionU').value = json.consulta[0].description_product;
            document.getElementById('descriptionU').value = json.consulta[0].description_product;
            $("#portadaProduct").attr("src", "../assets/img/portadas/" + json.consulta[0].image_product);
            document.getElementById('dateRegisterU').value = json.consulta[0].date_register;
            document.getElementById('selectCategoryU').value = json.consulta[0].id_category;
        }
    }
    xhr.send(formData);
}

delete_book_library.onclick = () => {
    delete_library();
}

function delete_library() {
    let formData = new FormData();
    formData.append('id_user', id_user_library);

    var xhr = new XMLHttpRequest();
    xhr.open('POST', 'http://localhost/guatelibro/Eliminar/library_user', true);
    xhr.setRequestHeader('X-Requested-With', 'XMLHttpRequest');
    xhr.onreadystatechange = function () {
        if (xhr.readyState == 4 && xhr.status == 200) {
            var resultado = xhr.responseText;
            console.log(resultado);
            var json = JSON.parse(resultado);
            console.log(json);
            if (json.icon == "success") {
                Toast.fire({
                    icon: json.icon,
                    title: "Libro eliminado exitosamente"
                })
                setTimeout(() => {
                    location.reload();
                }, 1000)
            } else {
                Toast.fire({
                    icon: json.icon,
                    title: "No se pudo eliminar el libro"
                })
            }
        }
    }
    xhr.send(formData);

}

const send_data = () => {
    let formData = new FormData(formProduct);

    console.log(formData);
    var xhr = new XMLHttpRequest();
    xhr.open('POST', 'http://localhost/guatelibro/Insertar/product', true);
    xhr.setRequestHeader('X-Requested-With', 'XMLHttpRequest');
    xhr.onreadystatechange = function () {
        if (xhr.readyState == 4 && xhr.status == 200) {
            var resultado = xhr.responseText;
            console.log(resultado);
            var json = JSON.parse(resultado);
            console.log(json);
            if (json.type_message == "success") {
                Swal.fire({
                    icon: json.type_message,
                    title: '¡Éxito!',
                    text: json.message,
                }).then((response) => {
                    if (response.isConfirmed === true) {
                        window.location.href = 'http://localhost/guatelibro/ver/mibiblioteca';
                    }
                })
            } else {
                Swal.fire({
                    icon: json.type_message,
                    title: '¡Éxito!',
                    text: json.message,
                })
            }
        }
    }
    xhr.send(formData);
}

btnEnviar.onclick = () => { send_data() }

btnUpdate.onclick = () => { actualizar_product() }



const actualizar_product = () => {
    var formData = new FormData(document.getElementById('formProductsU'));

    var xhr = new XMLHttpRequest();
    xhr.open('POST', 'http://localhost/guatelibro/Modificar/product', true);
    xhr.setRequestHeader('X-Requested-With', 'XMLHttpRequest');
    xhr.onreadystatechange = function () {
        if (xhr.readyState == 4 && xhr.status == 200) {
            var resultado = xhr.responseText;
            console.log(resultado);
            var json = JSON.parse(resultado);
            console.log(json);
            if (json.type_message == "success") {
                Swal.fire({
                    icon: json.type_message,
                    title: '¡Éxito!',
                    text: json.message,
                }).then((response) => {
                    if (response.isConfirmed === true) {
                        location.reload();
                    }
                })
            } else {
                Swal.fire({
                    icon: json.type_message,
                    title: '¡Éxito!',
                    text: json.message,
                })
            }
        }
    }
    xhr.send(formData);
}

btnDelete.onclick = () => { deleteRegister(id_product_u) }

const deleteRegister = (id) => {
    Swal.fire({
        title: "¿Está seguro eliminar el dato",
        text: "Esta acción es irreversible",
        icon: "warning",
        showDenyButton: true,
        confirmButtonText: 'Si, deseo eliminarlo',
        denyButtonText: `Cancelar`,
        dangerMode: true
    }).then((response) => {
        if (response.isConfirmed === true) {
            var formData = new FormData();
            formData.append('id_product', id);

            var xhr = new XMLHttpRequest();
            xhr.open('POST', "http://localhost/guatelibro/Eliminar/product", true);
            xhr.setRequestHeader('X-Requested-With', 'XMLHttpRequest');
            xhr.onreadystatechange = function () {
                if (xhr.readyState == 4 && xhr.status == 200) {
                    var resultado = xhr.responseText;
                    console.log(resultado);
                    var json = JSON.parse(resultado);
                    console.log(json);
                    if (json.consulta == true) {
                        Swal.fire({
                            icon: 'success',
                            title: '¡Éxito!',
                            text: 'Datos Eliminados',
                        }).then((response) => {
                            if (response.isConfirmed === true) {
                                location.reload();
                            }
                        })
                    } else {
                        Swal.fire({
                            icon: 'error',
                            title: '¡Erorr!',
                            text: 'El dato no pudo eliminarse',
                        })
                    }
                }
            }
            xhr.send(formData);
        }
    });
}

const input = document.querySelectorAll('.btn-category');
const bloque = document.querySelectorAll('.title-category');

// Recorriendo todos los LI
input.forEach((cadaLi, i) => {
    // Asignando un CLICK a CADALI
    input[i].addEventListener('click', () => {

        // Recorrer TODOS los .li
        input.forEach((cadaLi, i) => {
            // Quitando la clase activo de cada li
            input[i].classList.remove('active')
            // Quitando la clase activo de cada bloque
            bloque[i].classList.remove('active')
        })

        // En el li que hemos click le añadimos la clase activo
        input[i].classList.add('active')
        // En el bloque con la misma posición le añadimos la clase activo
        bloque[i].classList.add('active')

    })
})


const inp = document.querySelectorAll('.btn-libro');
const bloe = document.querySelectorAll('.title-libro');

inp.forEach((cadaLi, e) => {
    // Asignando un CLICK a CADALI
    inp[e].addEventListener('click', () => {

        // Recorrer TODOS los .li
        inp.forEach((cadaLi, e) => {
            // Quitando la clase activo de cada li
            inp[e].classList.remove('active')
            // Quitando la clase activo de cada bloque
            bloe[e].classList.remove('active')
        })

        // En el li que hemos click le añadimos la clase activo
        inp[e].classList.add('active')
        // En el bloque con la misma posición le añadimos la clase activo
        bloe[e].classList.add('active')

    })
})


$('.input-file').each(function () {
    var $input = $(this),
        $label = $input.next('.js-labelFile'),
        labelVal = $label.html();

    $input.on('change', function (element) {
        var fileName = '';
        if (element.target.value) fileName = element.target.value.split('\\').pop();
        fileName ? $label.addClass('has-file').find('.js-fileName').html(fileName) : $label.removeClass('has-file').html(labelVal);
    });
});

$('.input-file2').each(function () {
    var $input = $(this),
        $label = $input.next('.js-labelFile2'),
        labelVal = $label.html();

    $input.on('change', function (element) {
        var fileName = '';
        if (element.target.value) fileName = element.target.value.split('\\').pop();
        fileName ? $label.addClass('has-file').find('.js-fileName2').html(fileName) : $label.removeClass('has-file').html(labelVal);
    });
});