function onProductsJson(json){
    console.log("Carico i prodotti..");
    const p = document.querySelector("#products");
  
    for(let i in json){
      const product_id = json[i].id;  
      const snkrs_img = json[i].img;
      const name = json[i].nome;
      const price = json[i].prezzo;
      const size = json[i].taglia;
      const snkrs = document.createElement('div');
      //snkrs.className = 'snkrs';
      snkrs.classList.add('snkrs');
      id = document.createElement('span');
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
      carrello.innerText = "Aggiungi al carrello";
      carrello.addEventListener('click', addCarrello);

      
      
      snkrs.appendChild(id);
      snkrs.appendChild(img);
      snkrs.appendChild(nome);
      snkrs.appendChild(prezzo);
      snkrs.appendChild(taglia);
      snkrs.appendChild(carrello);
      p.appendChild(snkrs);
    }
  }

function onProductsResponse(response) {
    return response.json();
}

function onJsonCarrello(json) {
  console.log("Aggiunto: "+ json.esito);
}


function addCarrello(event){
    const button = event.currentTarget;
  
    const formData = new FormData();
   
    formData.append('product_id', button.parentNode.querySelector('span').textContent);
    formData.append('img', button.parentNode.querySelector('img').src);
    formData.append('name', button.parentNode.querySelector('.nome').textContent);
    formData.append('price', button.parentNode.querySelector('.prezzo').textContent);
    formData.append('size', button.parentNode.querySelector('label').textContent);
    
    fetch("add_carrello.php", {method: 'post', body: formData}).then(onJsonCarrello).then(onProductsJson);

  

    button.parentNode.querySelector('a').innerText = "Aggiunto!";
    button.parentNode.querySelector('a').classList.add('added');
  
   }

function carica_prodotti() {
    fetch('carica_prodotti.php').then(onProductsResponse).then(onProductsJson);
}

function mobileMenu(menu) {
  menu.classList.toggle('open');
}

carica_prodotti();


/*function reindirizza(event){
  window.location.href = "prodotto.php";
}

const conteiner = document.querySelector('#products');
conteiner.addEventListener('click', reindirizza);
*/