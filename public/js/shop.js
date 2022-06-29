function chiudiRecensioni(event){
  const button=event.currentTarget;
  const recContainer =button.parentNode;
  const div=recContainer.lastChild;
  div.innerHTML="";
  button.addEventListener('click',visualizzaRecensioni);
}

function onJsonRec(json){
    console.log(json);
    // ritorna username da controller
  for(let res of json){
    const container=document.getElementById(res.articolo);
    const recContainer=container.lastChild;
    const div=recContainer.lastChild;

    const user=document.createElement('p');
    const rec=document.createElement('p');

    user.textContent=res.username;
    rec.textContent=res.recensione;
    user.appendChild(rec);
    div.appendChild(user);

    recContainer.appendChild(div);
  }
}
function onResponseRec(response){
    console.log(response);
    return response.json();
}

function visualizzaRecensioni(event){
    const button= event.currentTarget;
    button.removeEventListener('click',visualizzaRecensioni);
    button.addEventListener('click',chiudiRecensioni);
    fetch(BASE_URL+"/shop/review/"+button.parentNode.parentNode.dataset.art).then(onResponseRec).then(onJsonRec);
}
function fetchArticoli(){
    fetch(BASE_URL+"/shop/products").then(onResponseShop).then(onJsonShop);
}

function onResponseShop(response){
    console.log(response);
    return response.json();
}

/*function onJsonAggiungi(json){
  console.log(json);
}*/
function responseAggiungi(response){
  console.log(response);
  //return response.json();
}

function aggiungiCarrello(event){
  //rivedi
  const button = event.currentTarget;
  const articolo=button.parentNode;
  const div= articolo.childNodes[5];
  const misura= div.firstChild.firstChild;
  const selezione= misura.selectedIndex;
  var valoreSelezionato = misura.options[selezione];
  console.log(valoreSelezionato.value);
  const codice=button.parentNode.dataset.art;
  const m=valoreSelezionato.value;
  console.log(codice);
  fetch(BASE_URL +"/shop/carrello/"+
  encodeURIComponent(codice)+"/"+encodeURIComponent(m)).then(responseAggiungi);//.then(onJsonAggiungi);
}

function onJsonMisure(json){
  console.log(json);
    const form=document.createElement("form");
    const select=document.createElement("select");
    select.id="misura";
    form.appendChild(select);
    for(let res of json){
      const option= document.createElement('option');
      option.value=res.misura;
      option.textContent=res.misura;
      select.appendChild(option);
    }
    const articolo= document.getElementById(json[0].codice);
    const container=articolo.childNodes[5];
    container.appendChild(form);
}
function onResponseMisure(response){
  return response.json();
}
function fetchMisure(articolo){
  fetch(BASE_URL+"/shop/misure/"+articolo).then(onResponseMisure).then(onJsonMisure);
}
function onJsonShop(json){
    console.log(json);

    const container= document.querySelector('section');
    container.innerHTML="";
    for(let result of json ){
        const div= document.createElement('div');
        container.appendChild(div);
        div.classList.add('articoli');
        div.dataset.art=result.id;
        div.id=result.id;
        const image=document.createElement('img');
        image.src=result.image;
        div.appendChild(image);

        const descrizione=document.createElement('h2');
        descrizione.textContent=result.descrizione;
        div.appendChild(descrizione);

        const marca= document.createElement('p');
        marca.textContent="Marca: "+ result.marca;
        div.appendChild(marca);

        const codice =document.createElement('p');
        codice.textContent="Codice Articolo "+result.id;
        codice.dataset.art=result.id;
        div.appendChild(codice);

        const prezzo= document.createElement("em");
        prezzo.textContent="Prezzo " +result.prezzo + " €";
        div.appendChild(prezzo);

        const misure=document.createElement('div');
        div.appendChild(misure);

        fetchMisure(result.id);
        const button= document.createElement('button');
        button.textContent="Aggiungi al carrello";
        div.appendChild(button);
        
        const recensioni= document.createElement('div');
        const b= document.createElement('button');
        const p=document.createElement('p');
        p.textContent=result.num_recensioni;
        const pic= document.createElement('img');
        pic.src="css/immagini/recensioni1.png";
        recensioni.classList.add('recensioni');
        b.addEventListener('click',visualizzaRecensioni);

        const containerRecensioni=document.createElement('div');

        b.appendChild(pic);
        b.appendChild(p);
        recensioni.appendChild(b);
        recensioni.appendChild(containerRecensioni);
        div.appendChild(recensioni);
        button.addEventListener('click',aggiungiCarrello);

    }

}

function ricercaArticoli(event){
  event.preventDefault();
  const ricerca= document.getElementById("testo");
  fetch(BASE_URL+"/shop/search/"+encodeURIComponent(ricerca.value)).then(onResponseShop).then(onJsonShop);
}
const formRicerca= document.forms.search;
formRicerca.addEventListener("submit",ricercaArticoli);


fetchArticoli();

