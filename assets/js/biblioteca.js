'use strict'
const img_product = document.getElementById('img_product');
const title_product = document.getElementById('title_product');
const description_product = document.getElementById('description_product');
const member_up = document.getElementById('id_member_up');
const date_up = document.getElementById('date_up_book');
const btn_view_pdf = document.getElementById('view_pdf');

const cargarDatos = (id) => {
    //Cargar Datos
    let formData = new FormData();
    formData.append('id_product', id);

    var xhr = new XMLHttpRequest();
    xhr.open('POST', "http://localhost/guatelibro/Modales/Product", true);
    xhr.setRequestHeader('X-Requested-With', 'XMLHttpRequest');
    xhr.onreadystatechange = function () {
        if (xhr.readyState == 4 && xhr.status == 200) {
            var resultado = xhr.responseText;
            var json = JSON.parse(resultado);
            console.log(json);
            let url_btn = btn_view_pdf.getAttribute('href');
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

