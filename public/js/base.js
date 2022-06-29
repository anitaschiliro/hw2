
function onResponseWeather(response){
  //console.log(response.json());
  return response.json();
}

function onJsonWeather(json){
  console.log(json);
  const results = json.DailyForecasts;
 
  const weather= document.querySelector("#weather");
  weather.innerHTML='';

  const h1= document.createElement('h1');
  h1.textContent= "Catania";

  const p= document.createElement('p');
  p.textContent= results[0].Day.IconPhrase;

  const image= document.createElement('img');

  if(results[0].Day.HasPrecipitation===true){
    image.src="css/immagini/pioggia.png";
  }else{
    image.src="css/immagini/sole.png";
  }
  weather.appendChild(h1);
  weather.appendChild(p);
  weather.appendChild(image);
}

function chiudiMenu(event){
  const logo= document.querySelector("#logo");
  logo.classList.remove("hidden");
  const ext= document.querySelector("#menu_ext");
  ext.classList.remove("show");
  ext.classList.add("hidden");
  const nav= document.querySelector("nav");
  nav.classList.remove("navmenu");
  const header= document.querySelector("header");
  header.classList.remove("headermenu");
  const menu= document.querySelector("#menu");
  menu.removeEventListener("click",chiudiMenu);
  menu.addEventListener("click",apriMenu);
}

function apriMenu(event){
  const menu= event.currentTarget;
  const nav= document.querySelector("nav");
  nav.classList.add("navmenu");
  const header= document.querySelector("header");
  header.classList.add("headermenu");
  const ext= document.querySelector("#menu_ext");
  ext.classList.remove("hidden");
  ext.classList.add("show");
  const logo= document.querySelector("#logo");
  logo.classList.add("hidden");
  menu.addEventListener("click",chiudiMenu);
}

const menu = document.querySelector("#menu");
menu.addEventListener("click",apriMenu);

fetch(BASE_URL+"/home/weather").then(onResponseWeather).then(onJsonWeather);
