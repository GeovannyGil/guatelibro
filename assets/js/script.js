'use strict'

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