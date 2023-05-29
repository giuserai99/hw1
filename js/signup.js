function controllaCampi(event) {
    if((nome.value.length === 0) || (cognome.value.length === 0) || (usr.value.length === 0) || (em.value.length === 0) || (pass.value.length === 0) || (c_pass.value.length === 0)) {
      event.preventDefault();
      document.querySelector('#error').innerHTML = "Inserisci tutti i campi";
      document.querySelector('#error').classList.add('log_error');
    }
  }
  
  function userJson(json) {
    if(json.esiste == true) {
      document.querySelector('.username span').textContent = "Nome utente già esistente!";
      document.querySelector('.username span').classList.add('errore');
    } else {
      document.querySelector('.username span').textContent = "";
      document.querySelector('.username span').classList.remove('errore');
    }
  }
  
  function emailJson(json) {
    if(json.esiste == true) {
      document.querySelector('.email span').textContent = 'E-mail già usata!';
      document.querySelector('.email span').classList.add('errore');
    } else {
      document.querySelector('.email span').textContent = '';
      document.querySelector('.email span').classList.remove('errore');
    }
  }
  
  function onResponse(response) {
    return response.json();
  }
  
  function checkNome(event) {
    const nom =document.querySelector('.nome input');
  
    if(nom.value.length == 0) {
      nom.parentNode.parentNode.querySelector('span').textContent = 'Non hai scritto bene il tuo nome!';
      nom.parentNode.parentNode.querySelector('span').classList.add('errore');
    } else {
      nom.parentNode.parentNode.querySelector('span').textContent = '';
      nom.parentNode.parentNode.querySelector('span').classList.remove('errore');
    }
  }
  
  function checkCognome(event) {
    const cog = document.querySelector('.cognome input');
    if(cog.value.length == 0) {
      cog.parentNode.parentNode.querySelector('span').textContent = 'Non hai scritto bene il tuo cognome!';
      cog.parentNode.parentNode.querySelector('span').classList.add('errore');
    } else {
      cog.parentNode.parentNode.querySelector('span').textContent = '';
      cog.parentNode.parentNode.querySelector('span').classList.remove('errore');
    }
  }
  
  function check_user(event) {
    const user = document.querySelector('.username input');
    if(!/^[a-zA-Z0-9]{1,8}$/.test(user.value)) {
      user.parentNode.parentNode.querySelector('span').textContent = 'Username non valido! (max. 8 caratteri)';
      user.parentNode.parentNode.querySelector('span').classList.add('errore');
    } else {
      const u = encodeURIComponent(user.value);
      fetch("check_user.php?q="+u).then(onResponse).then(userJson);
    }
  }
  
  function check_email(event) {
    const email = document.querySelector('.email input');
    if(!/^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/.test(email.value)) {
      email.parentNode.parentNode.querySelector('span').textContent = 'E-mail non valida!';
      email.parentNode.parentNode.querySelector('span').classList.add('errore');
    } else {
      const e = encodeURIComponent(email.value);
      fetch("check_email.php?q="+e).then(onResponse).then(emailJson);
    }
  }
  
  function checkPassword(event) {
    const passw = document.querySelector('.password input');
    if(passw.value.length < 8) {
      passw.parentNode.parentNode.querySelector('span').textContent = 'Password troppo corta!';
      passw.parentNode.parentNode.querySelector('span').classList.add('errore');
    } else {
      passw.parentNode.parentNode.querySelector('span').textContent = '';
      passw.parentNode.parentNode.querySelector('span').classList.remove('errore');
    }
  }
  
  function checkConfermaPassword(event) {
    const c_pass= document.querySelector('.conferma_password input');
    const pass = document.querySelector('.password input');
    if(c_pass.value === pass.value) {
      c_pass.parentNode.parentNode.querySelector('span').textContent = '';
      c_pass.parentNode.parentNode.querySelector('span').classList.remove('errore');
    } else {
      c_pass.parentNode.parentNode.querySelector('span').textContent = 'Le password non coincidono!';
      c_pass.parentNode.parentNode.querySelector('span').classList.add('errore');
    }
  }

  function checkCitta(event) {
    const city = document.querySelector('.citta input');
  
    if(city.value.length == 0) {
      city.parentNode.parentNode.querySelector('span').textContent = 'Non hai scritto la tua città';
      city.parentNode.parentNode.querySelector('span').classList.add('errore');
    } else {
      city.parentNode.parentNode.querySelector('span').textContent = '';
      city.parentNode.parentNode.querySelector('span').classList.remove('errore');
    }
  }

  function checkCap(event) {
    const c = document.querySelector('.cap input');
  
    if(c.value.length == 0) {
      c.parentNode.parentNode.querySelector('span').textContent = 'Non hai scritto il tuo Cap';
      c.parentNode.parentNode.querySelector('span').classList.add('errore');
    } else {
      c.parentNode.parentNode.querySelector('span').textContent = '';
      c.parentNode.parentNode.querySelector('span').classList.remove('errore');
    }
  }

  function checkIndirizzo(event) {
    const address = document.querySelector('.indirizzo input');
  
    if(address.value.length == 0) {
      address.parentNode.parentNode.querySelector('span').textContent = 'Non hai scritto il tuo indirizzo';
      address.parentNode.parentNode.querySelector('span').classList.add('errore');
    } else {
      address.parentNode.parentNode.querySelector('span').textContent = '';
      address.parentNode.parentNode.querySelector('span').classList.remove('errore');
    }
  }

  
  function checkCellulare(event) {
    const numero = document.querySelector('.cellulare input');
  
    if(numero.value.length == 0) {
      numero.parentNode.parentNode.querySelector('span').textContent = 'Non hai scritto il tuo numero';
      numero.parentNode.parentNode.querySelector('span').classList.add('errore');
    } else {
      numero.parentNode.parentNode.querySelector('span').textContent = '';
      numero.parentNode.parentNode.querySelector('span').classList.remove('errore');
    }
  }
  
  const nome = document.querySelector('.nome input');
  nome.addEventListener('blur', checkNome);
  const cognome = document.querySelector('.cognome input');
  cognome.addEventListener('blur', checkCognome);
  const usr = document.querySelector('.username input');
  usr.addEventListener('blur', check_user);
  const em = document.querySelector('.email input');
  em.addEventListener('blur', check_email);
  const pass = document.querySelector('.password input');
  pass.addEventListener('blur', checkPassword);
  const c_pass = document.querySelector('.conferma_password input');
  c_pass.addEventListener('blur', checkConfermaPassword);
  const citta = document.querySelector('.citta input');
  citta.addEventListener('blur', checkCitta);
  const cap = document.querySelector('.cap input');
  cap.addEventListener('blur', checkCap);
  const indirizzo = document.querySelector('.indirizzo input');
  indirizzo.addEventListener('blur', checkIndirizzo);
  const cellulare = document.querySelector('.cellualare input');
  cellulare.addEventListener('blur', checkCellulare);
  
  const form = document.querySelector('form').addEventListener('submit', controllaCampi);