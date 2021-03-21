import Global from "../../template/JS/cls_Global.js";

function fetchSort(name){

	const url = '/films/';

	const category = document.querySelector(name);

	const body = new FormData();
	body.set('name', category.innerText);


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

	  container.innerHTML = "";

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


	// artistic Opacity
	Global.animate({
		draw: (progress) => {
			//элемент,   свойство,   начальное значение,   конечное значение
			//item,      property,   initialParam,         finalParam 
			//поля требуют реализации

			let item = category;
            let property = 'opacity';
            let initialParam = window.getComputedStyle(category).opacity;
            let finalParam = 1;

            let frame = 0;

            let func = (step) => {
                frame += initialParam - progress * step; 
                item.style[property] = frame;
            }

            func(initialParam - finalParam);
        
		}, 
		duration: 100,  				//duration
		timing: (timeFraction) => {	//timing function
		 	return timeFraction;
		}
	});
}

function Category(){

	document.querySelectorAll('.genre ul li').forEach((item, i, arr) => {

		item.style.opacity = '0.6';
	})
}

let triangle = document.querySelector('.disclaimer svg path');  // items

let triangOpacity = window.getComputedStyle(triangle).fillOpacity;		// текущее значение прозрачности элемента

document.querySelector('.disclaimer svg').onclick = () => {

	let scrollFilms = document.querySelector('.films').getBoundingClientRect().top + pageYOffset - 120; 	// текущее значение высоты c учетом margin 120px	

	//window scrollTo()
	Global.animate({
		draw: (progress) => {
			//элемент,   свойство,   начальное значение,   конечное значение
			//item,      property,   initialParam,         finalParam 
			//поля требуют реализации

			let item = window;
            // let property = 'transform';
            let initialParam = pageYOffset;
            let finalParam = scrollFilms;

            let frame = 0;

            let func = (step) => {
                frame += initialParam - progress * step; 
                item.scrollTo(0, frame);
            }

            func(initialParam - finalParam);
        
		}, 
		duration: 500,  				//duration
		timing: (timeFraction) => {	//timing function
		 	return timeFraction;
		}
	});
}

document.querySelector('.disclaimer svg').onmouseenter = () => {

	// triangle fillOpacity
	Global.animate({
		draw: (progress) => {
			//элемент,   свойство,   начальное значение,   конечное значение
			//item,      property,   initialParam,         finalParam 
			//поля требуют реализации

			let item = triangle;
            let property = 'fillOpacity';
            let initialParam = triangOpacity;
            let finalParam = 1;

            let frame = 0;

            let func = (step) => {
                frame += initialParam - progress * step; 
                item.style[property] = frame;
            }

            func(initialParam - finalParam);
        
		}, 
		duration: 100,  				//duration
		timing: (timeFraction) => {	//timing function
		 	return timeFraction;
		}
	});
}

document.querySelector('.disclaimer svg').onmouseleave = () => {

	// triangle fillOpacity
	Global.animate({
		draw: (progress) => {
			//элемент,   свойство,   начальное значение,   конечное значение
			//item,      property,   initialParam,         finalParam 
			//поля требуют реализации

			let item = triangle;
            let property = 'fillOpacity';
            let initialParam = 1;
            let finalParam = triangOpacity;

            let frame = 0;

            let func = (step) => {
                frame += initialParam - progress * step; 
                item.style[property] = frame;
            }

            func(initialParam - finalParam);
        
		}, 
		duration: 100,  				//duration
		timing: (timeFraction) => {	//timing function
		 	return timeFraction;
		}
	});
}

document.querySelector('#all').onclick = () => {

	const name = '#all';

	Category()

	fetchSort(name);
}

document.querySelector('#artistic').onclick = () => {

	const name = '#artistic';

	Category()

	fetchSort(name);
}

document.querySelector('#documentary').onclick = () => {

	const name = '#documentary';

	Category()

	fetchSort(name);
}

document.querySelector('#historical').onclick = () => {

	const name = '#historical';

	Category()

	fetchSort(name);
}



