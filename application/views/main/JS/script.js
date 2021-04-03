import Global from "../../template/JS/cls_Global.js";

let masonry = function(){

	var grid = document.querySelector('.gallery-container');
	var msnry = new Masonry( grid, {

	  itemSelector: '.art-container',
	  columnWidth: 378,
	  gutter: 49
	});
}

function findAncestor (el, cls) { // Поиск родительсого элемента
    while ((el = el.parentElement) && !el.classList.contains(cls));
    return el;
}

window.onload = masonry;

document.querySelector('.gallery-container').addEventListener("mouseover", (e) => {

	if(e.target.className == 'inner-space'){

		let innerSpace = e.target;

		innerSpace.addEventListener("mouseenter", (e) => {

			innerSpace = e.target;

			// inner-space fillOpacity
			Global.animate({
				draw: (progress) => {
					//элемент,   свойство,   начальное значение,   конечное значение
					//item,      property,   initialParam,         finalParam 
					//поля требуют реализации

					let item = innerSpace;
		            let property = 'opacity';
		            let initialParam = window.getComputedStyle(innerSpace).opacity;
		            let finalParam = 0.8;

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

			let outerSpace = innerSpace.parentNode.nextSibling;

			// outer-space fillOpacity
			Global.animate({
				draw: (progress) => {
					//элемент,   свойство,   начальное значение,   конечное значение
					//item,      property,   initialParam,         finalParam 
					//поля требуют реализации

					let item = outerSpace;
		            let property = 'opacity';
		            let initialParam = window.getComputedStyle(outerSpace).opacity;
		            let finalParam = 0.6;

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

			let outerBgColor = window.getComputedStyle(outerSpace).backgroundColor.match(/^rgba\((\d+),\s*(\d+),\s*(\d+),\s*(\d+|\d.\d+)\)$/);

			// outer-space background color
			Global.animate({
				draw: (progress) => {
					//элемент,   свойство,   начальное значение,   конечное значение
					//item,      property,   initialParam,         finalParam 
					//поля требуют реализации

					let item = outerSpace;
		            let property = 'backgroundColor';
		            let initialParam = 0.7;
		            let finalParam = 0;

		            let frame = 0;

		            let func = (step) => {
		                frame += initialParam - progress * step; 
		                item.style[property] = 'rgba(' + outerBgColor[1] + ', ' + outerBgColor[2] + ', ' + outerBgColor[3] + ', ' + frame + ')';
		            }

		            func(initialParam - finalParam);
		        
				}, 
				duration: 100,  				//duration
				timing: (timeFraction) => {	//timing function
				 	return timeFraction;
				}
			});		

		})
	}

	if(e.target.className == 'outer-space'){
		let outerSpace = e.target;
		let like = outerSpace.querySelector('.likes');
		let id = findAncestor(like, 'art-container').id;

		like.onclick = (e) =>{
			const url = '/gallery/';

			const body = new FormData();
			body.set('id', id);

			
			function sendRequest(method, url, body = null) {
			  const headers = {
			  }

			  return fetch(url, {
			    method: method,
			    body: body,
			    headers: headers
			  }).then(response => {
			    if (response.ok) {
			      return response.text();
			    }

			    return response.text().then(error => {
			      const e = new Error('Что-то пошло не так')
			      e.data = error
			      throw e
			    })
			  })
			}

			sendRequest('POST', url, body)
			  .then((data)=>{

			  	console.log(data);

			  	let likePath = like.querySelector('path');
			  	let likeValue = outerSpace.querySelector('#likes');
			  	let likeValueGet = outerSpace.querySelector('#likes').textContent;

			  	if(data == 'true'){

			  		// like fillOpacity
					Global.animate({
						draw: (progress) => {
							//элемент,   свойство,   начальное значение,   конечное значение
							//item,      property,   initialParam,         finalParam 
							//поля требуют реализации

							let item = likePath;
				            let property = 'fillOpacity';
				            let initialParam = window.getComputedStyle(likePath).fillOpacity;
				            let finalParam = 1;

				            console.log(initialParam);

				            let frame = 0;

				            let func = (step) => {
				                frame += initialParam - progress * step; 
				                item.style[property] = frame;
				            }

				            func(initialParam - finalParam);
				        
						}, 
						duration: 50,  				//duration
						timing: (timeFraction) => {	//timing function
						 	return timeFraction;
						}
					});

					likeValue.innerText = Number(likeValueGet) + 1;


			  	}if(data == 'false'){

			  		// like fillOpacity
					Global.animate({
						draw: (progress) => {
							//элемент,   свойство,   начальное значение,   конечное значение
							//item,      property,   initialParam,         finalParam 
							//поля требуют реализации

							let item = likePath;
				            let property = 'fillOpacity';
				            let initialParam = window.getComputedStyle(likePath).fillOpacity;
				            let finalParam = 0;

				            console.log(initialParam);

				            let frame = 0;

				            let func = (step) => {
				                frame += initialParam - progress * step; 
				                item.style[property] = frame;
				            }

				            func(initialParam - finalParam);
				        
						}, 
						duration: 50,  				//duration
						timing: (timeFraction) => {	//timing function
						 	return timeFraction;
						}
					});

					likeValue.innerText = Number(likeValueGet) - 1;

			  	}


			  })
			  .catch(err => console.log(err))
			};
	}
  		
});

document.querySelector('.gallery-container').addEventListener("mouseout", (e) => {

	if(e.target.className == 'inner-space'){

  		let innerSpace = e.target;

  		if (innerSpace.parentNode.parentNode.contains(e.relatedTarget)) {  //innerSpace.parentNode.parentNode innerSpace -> a ->space
  			// inner-space fillOpacity									// contains проверяет наследственность элемента (outerSpace к space)
			Global.animate({
				draw: (progress) => {
					//элемент,   свойство,   начальное значение,   конечное значение
					//item,      property,   initialParam,         finalParam 
					//поля требуют реализации

					let item = innerSpace;
		            let property = 'opacity';
		            let initialParam = 0.8;
		            let finalParam = 0.6;

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

			let outerSpace = innerSpace.parentNode.nextSibling;

			// outer-space fillOpacity
			Global.animate({
				draw: (progress) => {
					//элемент,   свойство,   начальное значение,   конечное значение
					//item,      property,   initialParam,         finalParam 
					//поля требуют реализации

					let item = outerSpace;
		            let property = 'opacity';
		            let initialParam = window.getComputedStyle(outerSpace).opacity;
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

			let outerBgColor = window.getComputedStyle(outerSpace).backgroundColor.match(/^rgba\((\d+),\s*(\d+),\s*(\d+),\s*(\d+|\d.\d+)\)$/);

			// outer-space background color
			Global.animate({
				draw: (progress) => {
					//элемент,   свойство,   начальное значение,   конечное значение
					//item,      property,   initialParam,         finalParam 
					//поля требуют реализации

					let item = outerSpace;
		            let property = 'backgroundColor';
		            let initialParam = 0;
		            let finalParam = 0.7;

		            let frame = 0;

		            let func = (step) => {
		                frame += initialParam - progress * step; 
		                item.style[property] = 'rgba(' + outerBgColor[1] + ', ' + outerBgColor[2] + ', ' + outerBgColor[3] + ', ' + frame + ')';
		            }

		            func(initialParam - finalParam);
		        
				}, 
				duration: 100,  				//duration
				timing: (timeFraction) => {	//timing function
				 	return timeFraction;
				}
			});
  		}
  		else{

  			// inner-space fillOpacity	
			Global.animate({
				draw: (progress) => {
					//элемент,   свойство,   начальное значение,   конечное значение
					//item,      property,   initialParam,         finalParam 
					//поля требуют реализации

					let item = innerSpace;
		            let property = 'opacity';
		            let initialParam = 0.6;
		            let finalParam = 0;

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

			let outerSpace = innerSpace.parentNode.nextSibling;

			// outer-space fillOpacity
			Global.animate({
				draw: (progress) => {
					//элемент,   свойство,   начальное значение,   конечное значение
					//item,      property,   initialParam,         finalParam 
					//поля требуют реализации

					let item = outerSpace;
		            let property = 'opacity';
		            let initialParam = 1;
		            let finalParam = 0;

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
	}
});
