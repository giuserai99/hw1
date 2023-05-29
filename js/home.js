function notifica(){
  alert("Prima devi effettuare il login!");
}


function onCategorieJson(json){
    console.log("Caricamento..");
    const space = document.querySelector('#vetrina');

    for(let i in json){
        const name = json[i].nome;
        const link_img = json[i].img;
        const categoria = document.createElement('div');
        const img = document.createElement('img');
        img.src = link_img;
        const nome = document.createElement('h1');
        nome.innerText = name;
        categoria.appendChild(img);
        categoria.appendChild(nome);
        space.appendChild(categoria);
    }
}


function onCategorieResponse(response) {
    return response.json();
  }

  function carica_categorie() {
    fetch("carica_categorie.php").then(onCategorieResponse).then(onCategorieJson);
  }


  function mobileMenu(menu) {
    menu.classList.toggle('open');
  }

  carica_categorie();
 