import Global from "../../template/JS/cls_Global.js";

function fetchSort(){

	const url = '/';

	const count = document.querySelectorAll('.film').length;

	const body = new FormData();
	body.set('more', count);


	function sendRequest(method, url, body = null) {
	  const headers = {
	  }

	  return fetch(url, {
	    method: method,
	    body: body,
	    headers: headers
	  }).then(response => {
	    if (response.ok) {
	      return response.json();
	    }

	    return response.json().then(error => {
	      const e = new Error('Что-то пошло не так')
	      e.data = error
	      throw e
	    })
	  })
	}


	sendRequest('POST', url, body)
	  .then((data) => {

	  let container = document.querySelector('.film-container');
	  let html;

	  	for(let i = 0; i < data.length; i++){

	  	let film = document.createElement('div');
	  		film.className = 'film';
	  		film.style.backgroundImage = "url('/application/views/template/images/films/" + data[i].film_id + ".jpg')";
	  		film.style.opacity = 0;

	  		html = "<div class='info'>"
                        +	"<div class='name'>"
                            +	"<a href='/films/" + data[i].film_id + "' >"
                                +	 data[i].name
                            +	"</a>"
                        +	"</div>"
                        + 	"<div class='price-date-status'>"
                            +   "<div class='price'>"
                                +   data[i].price + " BYN"
                            +   "</div>"
                            +   "<div class='date-status'>"
                                +   "<div>"
                                    +  	Global.getDate(data[i].date)
                                +   "</div>"
                                +   "<div>"
                                    +  	data[i].status
                                +   "</div>"
                            +   "</div>"
                        +   "</div>"
                    +   "</div>";
	  		
	  		film.innerHTML = html;

	  		container.appendChild(film);

			// film Opacity
			Global.animate({
				draw: (progress) => {
					//элемент,   свойство,   начальное значение,   конечное значение
					//item,      property,   initialParam,         finalParam 
					//поля требуют реализации

					let item = film;
		            let property = 'opacity';
		            let initialParam = 0;
		            let finalParam = 1;

		            let frame = 0;

		            let func = (step) => {
		                frame += initialParam - progress * step; 
		                item.style[property] = frame;
		            }

		            func(initialParam - finalParam);
		        
				}, 
				duration: 200,  				//duration
				timing: (timeFraction) => {	//timing function
				 	return timeFraction;
				}
			});
	  	}
	  })
	  .catch(err => console.log(err))
}

document.querySelector('.more').onclick = () => {

	fetchSort();
}