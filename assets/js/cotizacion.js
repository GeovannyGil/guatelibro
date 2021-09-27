const select_client = document.getElementById('select_client');
const select_phone_client = document.getElementById('select_phone_client');
const select_direction_client = document.getElementById('select_direction_client');

//Labels Client
const label_code_client = document.getElementById('label_code_client');
const label_name_client = document.getElementById('label_name_client');
const label_phone_client = document.getElementById('label_phone_client');
const label_email_client = document.getElementById('label_email_client');
const label_direction_client = document.getElementById('label_direction_client');
const label_directionDM_client = document.getElementById('label_directionDM_client');

//input data-general
const input_number_quotation = document.getElementById('number_quotation');
const input_date_order = document.getElementById('date_order');
const input_days_credit = document.getElementById('days_credit');
const input_date_expiration = document.getElementById('date_expiration');
const input_description_work = document.getElementById('description_Work');

let arrayPhoneClients =
{
  "TaxiMedia S.A": ["5254-9989", "3265-9874"],
  "Jorge Ruiz": ["0247-9989"],
  "SmartCommerce": ["5334-9989", "3697-8962"],
  "Rodrigo Blanco": [],
};



let arrayEmailsClients = {
  "TaxiMedia S.A": ["info@taximedia.com"],
  "Jorge Ruiz": [],
  "SmartCommerce": ["info@smartcommerce.com"],
  "Rodrigo Blanco": ["socio@portafoliodiversificado.com"],
}

let arrayDirectionClients =
{
  "TaxiMedia S.A": ["Calle La Berbena | Guatemala, Guatemala", "7-70 Calle Tzul | Hola, Hola"],
  "Jorge Ruiz": ["8 Avenida 15-8 Zona 4 | Sacatepequéz, Antigua"],
  "SmartCommerce": [],
  "Rodrigo Blanco": ["La Aurora | Guatemala, Villa Nueva"]
};

select_client.onchange = () => {
  let selectionClient = select_client.options[select_client.selectedIndex];
  //HAcer consulta a la base de datos y que regrese los datos reales
  //y presentarlo en el texto
  label_code_client.innerText = selectionClient.value;
  label_name_client.innerText = selectionClient.text;

  list_select(select_phone_client, arrayPhoneClients, selectionClient, label_phone_client);
  list_select_direction(select_direction_client, arrayDirectionClients, selectionClient, label_direction_client, label_directionDM_client);

  if (arrayEmailsClients[selectionClient.text] != "") {
    label_email_client.innerText = arrayEmailsClients[selectionClient.text];
  } else {
    label_email_client.innerText = "-";
  }

}

const list_select = (select, array, selection, label) => {
  select.innerHTML = "";
  if (array[selection.text].length !== 0) {
    for (let i = 0; i < array[selection.text].length; i++) {
      const option = document.createElement("option");
      option.value = i;
      option.innerText = array[selection.text][i];
      select.appendChild(option);
    }
    let selec = select.options[select.selectedIndex];
    label.innerText = selec.text;
  } else {
    label.innerText = "-";
  }
}
const list_select_direction = (select, array, selection, label, labelDM) => {
  select.innerHTML = "";
  if (array[selection.text].length !== 0) {
    let splitDirection, direction, depaMuni;
    for (let i = 0; i < array[selection.text].length; i++) {
      const option = document.createElement("option");
      option.value = i;
      splitDirection = array[selection.text][i].split('|');
      [direction, depaMuni] = splitDirection;
      direction = direction.slice(0, direction.length - 1);
      depaMuni = depaMuni.slice(1);
      option.value = depaMuni;
      option.innerText = direction;
      select.appendChild(option);
    }
    let selec = select.options[select.selectedIndex];
    label.innerText = selec.text;
    labelDM.innerText = select.value;
  } else {
    label.innerText = "-";
    labelDM.innerText = "-";
  }
}

select_phone_client.onchange = () => {
  let selectionPhoneClient = select_phone_client.options[select_phone_client.selectedIndex];
  //HAcer consulta a la base de datos y que regrese los datos reales
  //y presentarlo en el texto
  label_phone_client.innerText = selectionPhoneClient.text;
}

select_direction_client.onchange = () => {
  let selectDirectionClient = select_direction_client.options[select_direction_client.selectedIndex];
  //HAcer consulta a la base de datos y que regrese los datos reales
  //y presentarlo en el texto
  label_direction_client.innerText = selectDirectionClient.text;
}

const clean_data_client = () => {
  label_code_client.innerText = "-";
  label_name_client.innerText = "-";
  label_phone_client.innerText = "-";
  label_email_client.innerText = "-";
  label_direction_client.innerText = "-";
  label_directionDM_client.innerText = "-";
  input_number_quotation.value = "";
  input_date_order.value = "";
  input_days_credit.value = "";
  input_date_expiration.value = "";
}

$(input_description_work).maxLength(840, {
  showNumber: "#limit_description_work",
  revert: true
});