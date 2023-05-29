function mobileMenu(menu) {
    menu.classList.toggle('open');
  }

function onCarrelloJson(json){
  console.log("Carico i prodotti..");
  const p = document.querySelector("#carrello-view");
  
  for(let i in json){
    const product_id = json[i].id;  
    const snkrs_img = json[i].img;
    const name = json[i].nome;
    const price = json[i].prezzo;
    const size = json[i].taglia;
    const snkrs = document.createElement('div');
    snkrs.classList.add('snkrs');
    id = document.createElement('p');
    //id.classList.add('id');
    id.textContent = product_id;
    const img = document.createElement('img');
    img.src = snkrs_img;
    const nome = document.createElement('span');
    nome.classList.add('nome');
    nome.textContent = name;
    const prezzo = document.createElement('span');
    prezzo.classList.add('prezzo');
    prezzo.textContent = price + " " + "$";
    const taglia = document.createElement('label');
    taglia.classList.add('taglia');
    taglia.textContent = size;
      
    const carrello = document.createElement('a');
    carrello.setAttribute('id', 'carrello');
    carrello.innerText = "Rimuovi dal carrello";
    carrello.addEventListener('click', removeCarrello);

      
      
    snkrs.appendChild(id);
    snkrs.appendChild(img);
    snkrs.appendChild(nome);
    snkrs.appendChild(prezzo);
    snkrs.appendChild(taglia);
    snkrs.appendChild(carrello);
    p.appendChild(snkrs);
  }
}


function onResponse(response) {
  return response.json();
}

function caricaCarrello() {
  fetch("carica_carrello.php").then(onResponse).then(onCarrelloJson);
}

function removeCarrelloJson(json) {
  if(json.esito == true) {
    const result = document.querySelector('#carrello-view');
    result.innerHTML = '';
    caricaCarrello();
  }
}

function removeCarrello(event) {
  const button = event.currentTarget;

  const formData = new FormData();
  formData.append('id', button.parentNode.querySelector('p').textContent);

  fetch("remove_carrello.php", {method: 'post', body: formData}).then(onResponse).then(removeCarrelloJson);

}



function paypal(){
 

  //const price 
  
  fetch("api_carrello.php").then(onResponse).then(onCarrelloJson);

}

caricaCarrello();
