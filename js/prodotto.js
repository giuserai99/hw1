//const overlay = document.getElementById("overlay");
//overlay.classList.add("hidden");



function onProductJson(json){ //sonia dice di passare come parametro nella funzione anche un $id
    console.log("Caricamento..");
    const space = document.querySelector('#product');

    for(let i in json){
        const product_id = json[i].id;
        const name = json[i].nome;
        const link_img = json[i].img;
        const price = json[i].prezzo;
        const size = json[i].taglia;
        const id = document.createElement('a');
        id.innerText = product_id;
        // creare classe e aggiungere nel css un hidden in modo da nascondere lo span
        const prodotto = document.createElement('div');
        const img = document.createElement('img');
        img.src = link_img;
        const nome = document.createElement('h1');
        nome.innerText = name;
        const prezzo = document.createElement('span');
        prezzo.innerText = price;
        const taglia = document.createElement('label');
        taglia.innerText = size;
        
        prodotto.appendChild(id);
        prodotto.appendChild(img);
        prodotto.appendChild(nome);
        prodotto.appendChild(prezzo);
        prodotto.appendChild(taglia);
        space.appendChild(prodotto);
    }
}

function onProductResponse(response) {
    return response.json();
}

function carica_prodotto() {// aggiungere variabile id

    fetch('carica_prodotto.php', {method: 'post', body: formData}).then(onProductResponse).then(onProductJson);
}



function mobileMenu(menu) {
    menu.classList.toggle('open');
  }

  carica_prodotto();