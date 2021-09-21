//variables globales
const selectDpaDireccion = document.getElementById("dpaDireccion");
const selectMunDireccion = document.getElementById("munDireccion");


//JSON Direcciones
let arregloDepartamentos = [
  { id: 1, departamento: "Alta Verapaz" },
  { id: 2, departamento: "Baja Verapaz" },
  { id: 3, departamento: "Chimaltenango" },
  { id: 4, departamento: "Chiquimula" },
  { id: 5, departamento: "Guatemala" },
  { id: 6, departamento: "El Progreso" },
  { id: 7, departamento: "Escuintla" },
  { id: 8, departamento: "Huehuetenango" },
  { id: 9, departamento: "Izabal" },
  { id: 10, departamento: "Jalapa" },
  { id: 11, departamento: "Jutiapa" },
  { id: 12, departamento: "Petén" },
  { id: 13, departamento: "Quetzaltenango" },
  { id: 14, departamento: "Quiché" },
  { id: 15, departamento: "Retalhuleu" },
  { id: 16, departamento: "Sacatepéquez" },
  { id: 17, departamento: "San Marcos" },
  { id: 18, departamento: "Santa Rosa" },
  { id: 19, departamento: "Sololá" },
  { id: 20, departamento: "Suchitepéquez" },
  { id: 21, departamento: "Totonicapán" },
  { id: 22, departamento: "Zacapa" },
];

let arregloMunicipios =
{
  "Alta Verapaz": [
    "Cahabón",
    "Chahal",
    "Chisec",
    "Cobán",
    "Fray Bartolomé de las Casas",
    "Lanquín",
    "Panzós",
    "Raxruha",
    "San Cristóbal Verapaz",
    "San Juan Chamelco",
    "San Pedro Carchá",
    "Santa Cruz Verapaz",
    "Senahú",
    "Tactic",
    "Tamahú",
    "Tucurú",
    "Santa Catarina La Tinta"
  ],
  "Baja Verapaz": [
    "Cubulco",
    "Granados",
    "Purulhá",
    "Rabinal",
    "Salamá",
    "San Jerónimo",
    "San Miguel Chicaj",
    "Santa Cruz El Chol"
  ],
  "Chimaltenango": [
    "Acatenango",
    "Chimaltenango",
    "El Tejar",
    "Parramos",
    "Patzicía",
    "Patzún",
    "Pochuta",
    "San Andrés Itzapa",
    "San José Poaquil",
    "San Juan Comalapa",
    "San Martín Jilotepeque",
    "Santa Apolonia",
    "Santa Cruz Balanyá",
    "Tecpán Guatemala",
    "Yepocapa",
    "Zaragoza"
  ],
  "Chiquimula": [
    "Camotán",
    "Chiquimula",
    "Concepción Las Minas",
    "Esquipulas",
    "Ipala",
    "Jocotán",
    "Olopa",
    "Quezaltepeque",
    "San Jacinto",
    "San José La Arada",
    "San Juan Ermita"
  ],
  "El Progreso": [
    "El Jícaro",
    "Guastatoya",
    "Morazán",
    "San Agustín Acasaguastlán",
    "San Antonio La Paz",
    "San Cristóbal Acasaguastlán",
    "Sanarate"
  ],
  "Escuintla": [
    "Escuintla",
    "Guanagazapa",
    "Iztapa",
    "La Democracia",
    "La Gomera",
    "Masagua",
    "Nueva Concepción",
    "Palín",
    "San José",
    "San Vicente Pacaya",
    "Santa Lucía Cotzumalguapa",
    "Siquinalá",
    "Tiquisate"
  ],
  "Guatemala": [
    "Guatemala",
    "Chinautla",
    "Chuarrancho",
    "Fraijanes",
    "Amatitlán",
    "Mixco",
    "Palencia",
    "Petapa",
    "San José del Golfo",
    "San José Pinula",
    "San Juan Sacatepéquez",
    "San Pedro Ayampuc",
    "San Pedro Sacatepéquez",
    "San Raymundo",
    "Santa Catarina Pinula",
    "Villa Canales"
  ],
  "Huehuetenango": [
    "Aguacatán",
    "Chiantla",
    "Colotenango",
    "Concepción Huista",
    "Cuilco",
    "Huehuetenango",
    "Ixtahuacán",
    "Jacaltenango",
    "La Democracia",
    "La Libertad",
    "Malacatancito",
    "Nentón",
    "San Antonio Huista",
    "San Gaspar Ixchil",
    "San Juan Atitán",
    "San Juan Ixcoy",
    "San Mateo Ixtatán",
    "San Miguel Acatán",
    "San Pedro Necta",
    "San Rafael La Independencia",
    "San Rafael Petzal",
    "San Sebastián Coatán",
    "San Sebastián Huehuetenango",
    "Santa Ana Huista",
    "Santa Bárbara",
    "Santa Cruz Barillas",
    "Santa Eulalia",
    "Santiago Chimaltenango",
    "Soloma",
    "Tectitán",
    "Todos Santos Cuchumatan"
  ],
  "Izabal": [
    "El Estor",
    "Livingston",
    "Los Amates",
    "Morales",
    "Puerto Barrios"
  ],
  "Jutiapa": [
    "Agua Blanca",
    "Asunción Mita",
    "Atescatempa",
    "Comapa",
    "Conguaco",
    "El Adelanto",
    "El Progreso",
    "Jalpatagua",
    "Jerez",
    "Jutiapa",
    "Moyuta",
    "Pasaco",
    "Quezada",
    "San José Acatempa",
    "Santa Catarina Mita",
    "Yupiltepeque",
    "Zapotitlán"
  ],
  "Petén": [
    "Dolores",
    "Flores",
    "La Libertad",
    "Melchor de Mencos",
    "Poptún",
    "San Andrés",
    "San Benito",
    "San Francisco",
    "San José",
    "San Luis",
    "Santa Ana",
    "Sayaxché",
    "Las Cruces"
  ],
  "Quetzaltenango": [
    "Almolonga",
    "Cabricán",
    "Cajolá",
    "Cantel",
    "Coatepeque",
    "Colomba",
    "Concepción Chiquirichapa",
    "El Palmar",
    "Flores Costa Cuca",
    "Génova",
    "Huitán",
    "La Esperanza",
    "Olintepeque",
    "Ostuncalco",
    "Palestina de Los Altos",
    "Quetzaltenango",
    "Salcajá",
    "San Carlos Sija",
    "San Francisco La Unión",
    "San Martín Sacatepéquez",
    "San Mateo",
    "San Miguel Sigüilá",
    "Sibilia",
    "Zunil"
  ],
  "Quiché": [
    "Canillá",
    "Chajul",
    "Chicamán",
    "Chiché",
    "Chichicastenango",
    "Chinique",
    "Cunén",
    "Ixcán",
    "Joyabaj",
    "Nebaj",
    "Pachalum",
    "Patzité",
    "Sacapulas",
    "San Andrés Sajcabajá",
    "San Antonio Ilotenango",
    "San Bartolomé Jocotenango",
    "San Juan Cotzal",
    "San Pedro Jocopilas",
    "Santa Cruz del Quiché",
    "Uspantán",
    "Zacualpa"
  ],
  "Retalhuleu": [
    "Champerico",
    "El Asintal",
    "Nuevo San Carlos",
    "Retalhuleu",
    "San Andrés Villa Seca",
    "San Felipe",
    "San Martín Zapotitlán",
    "San Sebastián",
    "Santa Cruz Muluá"
  ],
  "Sacatepéquez": [
    "Alotenango",
    "Antigua",
    "Ciudad Vieja",
    "Jocotenango",
    "Magdalena Milpas Altas",
    "Pastores",
    "San Antonio Aguas Calientes",
    "San Bartolomé Milpas Altas",
    "San Lucas Sacatepéquez",
    "San Miguel Dueñas",
    "Santa Catarina Barahona",
    "Santa Lucía Milpas Altas",
    "Santa María de Jesús",
    "Santiago Sacatepéquez",
    "Santo Domingo Xenacoj",
    "Sumpango"
  ],
  "San Marcos": [
    "Ayutla",
    "Catarina",
    "Comitancillo",
    "Concepción Tutuapa",
    "El Quetzal",
    "El Rodeo",
    "El Tumbador",
    "Esquipulas Palo Gordo",
    "Ixchiguan",
    "La Reforma",
    "Malacatán",
    "Nuevo Progreso",
    "Ocos",
    "Pajapita",
    "Río Blanco",
    "San Antonio Sacatepéquez",
    "San Cristóbal Cucho",
    "San José Ojetenam",
    "San Lorenzo",
    "San Marcos",
    "San Miguel Ixtahuacán",
    "San Pablo",
    "San Pedro Sacatepéquez",
    "San Rafael Pie de La Cuesta",
    "San Sibinal",
    "Sipacapa",
    "Tacaná",
    "Tajumulco",
    "Tejutla"
  ],
  "Jalapa": [
    "Jalapa",
    "Mataquescuintla",
    "Monjas",
    "San Carlos Alzatate",
    "San Luis Jilotepeque",
    "San Pedro Pinula",
    "San Manuel Chaparrón"
  ],
  "Santa Rosa": [
    "Barberena",
    "Casillas",
    "Chiquimulilla",
    "Cuilapa",
    "Guazacapán",
    "Nueva Santa Rosa",
    "Oratorio",
    "Pueblo Nuevo Viñas",
    "San Juan Tecuaco",
    "San Rafael Las Flores",
    "Santa Cruz Naranjo",
    "Santa María Ixhuatán",
    "Santa Rosa de Lima",
    "Taxisco"
  ],
  "Sololá": [
    "Concepción",
    "Nahualá",
    "Panajachel",
    "San Andrés Semetabaj",
    "San Antonio Palopó",
    "San José Chacaya",
    "San Juan La Laguna",
    "San Lucas Tolimán",
    "San Marcos La Laguna",
    "San Pablo La Laguna",
    "San Pedro La Laguna",
    "Santa Catarina Ixtahuacan",
    "Santa Catarina Palopó",
    "Santa Clara La Laguna",
    "Santa Cruz La Laguna",
    "Santa Lucía Utatlán",
    "Santa María Visitación",
    "Santiago Atitlán",
    "Sololá"
  ],
  "Suchitepéquez": [
    "Chicacao",
    "Cuyotenango",
    "Mazatenango",
    "Patulul",
    "Pueblo Nuevo",
    "Río Bravo",
    "Samayac",
    "San Antonio Suchitepéquez",
    "San Bernardino",
    "San Francisco Zapotitlán",
    "San Gabriel",
    "San José El Idolo",
    "San Juan Bautista",
    "San Lorenzo",
    "San Miguel Panán",
    "San Pablo Jocopilas",
    "Santa Bárbara",
    "Santo Domingo Suchitepequez",
    "Santo Tomas La Unión",
    "Zunilito"
  ],
  "Totonicapán": [
    "Momostenango",
    "San Andrés Xecul",
    "San Bartolo",
    "San Cristóbal Totonicapán",
    "San Francisco El Alto",
    "Santa Lucía La Reforma",
    "Santa María Chiquimula",
    "Totonicapán"
  ],
  "Zacapa": [
    "Cabañas",
    "Estanzuela",
    "Gualán",
    "Huité",
    "La Unión",
    "Río Hondo",
    "San Diego",
    "Teculután",
    "Usumatlán",
    "Zacapa"
  ]
};

//Seleccionar Dirección
selectDpaDireccion.onchange = () => {
  let departamentElegido = selectDpaDireccion.options[selectDpaDireccion.selectedIndex].text;
  limpiarMunicipio(selectMunDireccion);
  ordenarMunicipio(departamentElegido, selectMunDireccion);
}

//Llena a los select con los nombres de los departamentos
const llenarDepartamentos = (select, muniSelect) => {
  arregloDepartamentos.forEach((c) => {
    const option = document.createElement("option");
    if (c.departamento == "Guatemala") {
      option.setAttribute("selected", "selected");
      limpiarMunicipio(muniSelect);
      ordenarMunicipio(c.departamento, muniSelect);
    }
    option.classList.add('select2-results__option');
    option.value = c.id;
    option.innerText = c.departamento;
    select.appendChild(option);
  });
};

const limpiarMunicipio = (muniSelect) => {
  for (let i = muniSelect.options.length; i >= 0; i--) {
    muniSelect.remove(i);
  }
}

const ordenarMunicipio = (departamentElegido, muniSelect) => {
  for (let i = 0; i < arregloMunicipios[departamentElegido].length; i++) {
    const option = document.createElement("option");
    option.value = arregloMunicipios[departamentElegido][i];
    option.innerText = arregloMunicipios[departamentElegido][i];
    muniSelect.appendChild(option);
  }
}
const seleccionarInSelect = (InputSelect, datoBuscar) => {
  for (var i = 1; i < InputSelect.length; i++) {
    if (InputSelect.options[i].text == datoBuscar) {
      // seleccionamos el valor que coincide
      InputSelect.selectedIndex = i;
    }
  }
}

const buscarSelectDpa = (InputSelect, datoBuscar, InputSelectMun) => {
  for (var i = 1; i < InputSelect.length; i++) {
    if (InputSelect.options[i].text == datoBuscar) {
      // seleccionamos el valor que coincide
      InputSelect.selectedIndex = i;
      limpiarMunicipio(InputSelectMun);
      ordenarMunicipio(datoBuscar, InputSelectMun);
    }
  }
}


//Toast
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

//Funciones llamadas
llenarDepartamentos(selectDpaDireccion, selectMunDireccion);

const nitIsValid = (nit) => {
  if (!nit) {
    return true;
  }

  let nitRegExp = new RegExp('^[0-9]+(-?[0-9kK])?$');

  if (!nitRegExp.test(nit)) {
    return false;
  }

  nit = nit.replace(/-/, '');
  let lastChar = nit.length - 1;
  let number = nit.substring(0, lastChar);
  let expectedCheker = nit.substring(lastChar, lastChar + 1).toLowerCase();

  let factor = number.length + 1;
  let total = 0;

  for (let i = 0; i < number.length; i++) {
    let character = number.substring(i, i + 1);
    let digit = parseInt(character, 10);

    total += (digit * factor);
    factor = factor - 1;
  }

  let modulus = (11 - (total % 11)) % 11;
  let computedChecker = (modulus == 10 ? "k" : modulus.toString());

  return expectedCheker === computedChecker;
}

$(function () {
  //para validad el numero de NIT
  $('#nit_input').bind('change paste keyup ', function (e) {
    let $this = $(this);
    /*    let $parent = $this.parent();
       let $next = $this.next(); */
    let nit = $this.val();

    if (nit === 'CF') {
      $('#nit_client').addClass('inputValidated');
      $('#nit_client').removeClass('inputInvalidated');
      $("#nitVerification").text("Consumidor Final");
      $("#nitVerification").removeClass("badge-danger");
      $("#nitVerification").addClass("badge-success");
    } else if (nit && nitIsValid(nit)) {
      $('#nit_client').addClass('inputValidated');
      $('#nit_client').removeClass('inputInvalidated');
      $("#nitVerification").text("Nit Correcto");
      $("#nitVerification").removeClass("badge-danger");
      $("#nitVerification").addClass("badge-success");
    } else if (nit) {
      $("#nitVerification").text("Nit Incorrecto");
      $("#nitVerification").removeClass("badge-success");
      $("#nitVerification").addClass("badge-danger");
      $('#nit_client').addClass('inputInvalidated');
      $('#nit_client').removeClass('inputValidated');
    } else {
      $("#nitVerification").text("");
      $('#nit_client').removeClass('inputInvalidated');
      $('#nit_client').removeClass('inputValidated');
    }
  });
});


