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
  
  function onEvidenzaJson(json){
    console.log("Carico le sneakers in evidenza..");
    const e = document.querySelector("#in_evidenza-view");
  
    for(let i in json){
      const snkrs_img = json[i].img;
      const name = json[i].nome;
      const price = json[i].prezzo;
      const snkrs = document.createElement('div');
      snkrs.classList.add('snkrs');
      const img = document.createElement('img');
      img.src = snkrs_img;
      const nome = document.createElement('span');
      nome.classList.add('nome');
      nome.textContent = name;
      const prezzo = document.createElement('span');
      prezzo.classList.add('prezzo');
      prezzo.textContent = price + " " + "$";
      
      const carrello = document.createElement('a');
      carrello.innerText = "Aggiungi al carrello";
      carrello.addEventListener('click', addCarrello);
  
      snkrs.appendChild(img);
      snkrs.appendChild(nome);
      snkrs.appendChild(prezzo);
      snkrs.appendChild(carrello);
      e.appendChild(snkrs);
    }
  }
  
  function onJsonCarrello(json){
    console.log("Aggiunto: " + json.esito);
  }
  
  function onCategorieResponse(response) {
      return response.json();
    }
  
    function carica_categorie() {
      fetch("carica_categorie.php").then(onCategorieResponse).then(onCategorieJson);
    }
    
    function carica_evidenza() {
      fetch("carica_evidenza.php").then(onCategorieResponse).then(onEvidenzaJson);
    }
  
   function addCarrello(event){
    const button = event.currentTarget;
  
    const formData = new FormData();
    formData.append('img', button.parentNode.querySelector('img').src);
    formData.append('name', button.parentNode.querySelector('.nome').textContent);
    formData.append('price', button.parentNode.querySelector('.prezzo').textContent);
    
    fetch("add_carrello.php",{method: 'post', body: formData}).then(onCategorieResponse).then(onJsonCarrello);
  
    button.parentNode.querySelector('a').innerText = "Aggiunto!";
    button.parentNode.querySelector('a').classList.add('added');
  
   }
  
  
  
  
    function mobileMenu(menu) {
      menu.classList.toggle('open');
    }
  
    carica_categorie();
    carica_evidenza();