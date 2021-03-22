import Global from "../../template/JS/cls_Global.js";

let masonry = function(){

	var grid = document.querySelector('.gallery-container');
	var msnry = new Masonry( grid, {

	  itemSelector: '.art-container',
	  columnWidth: 378,
	  gutter: 49
	});
}

window.onload = masonry;

function fetchSort(){

	const url = '/gallery/';

	const count = document.querySelectorAll('.art-container').length;

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

	function lk(i,id){
  		for(let j = 0; j < data[id].length; j++){
       		if(data[0][i].art_id == data[id][j].art_id){

                return '<span id="likes" width="21px">' + data[id][j].likes + '</span>'
            }
        }
	}

	function lk2(i,id){
  		for(let j = 0; j < data[id].length; j++){
       		if(data[0][i].art_id == data[id][j].art_id){

                return '<span id="comments">' + data[id][j].comments + '</span>'
            }
        }
	}

	  let container = document.querySelector('.gallery-container');
	  let html;

	  	for(let i = 0; i < data[0].length; i++){

		  	let art = document.createElement('div');
		  		art.className = 'art-container';
		  		art.style.opacity = 0;

		  		html = "<img src='/application/views/template/images/arts/" + data[0][i].art_id + ".jpg' data-type='picture' alt=''>"
	                    +"<div class='space'>"
	                        +"<a href=''>"
	                            +"<div class='inner-space'>"
	                                +"<svg id='first' class='corner' width='13' height='13' viewBox='0 0 13 13' fill='none' xmlns='http://www.w3.org/2000/svg'>"
	                                    +"<path d='M0.5 12.5V0.5H12.5' stroke='#FFFFFF' />"
	                               	+"</svg>"
	                                +"<svg id='second' class='corner' width='14' height='13' viewBox='0 0 14 13' fill='none' xmlns='http://www.w3.org/2000/svg'>"
	                                    +"<path d='M0.500024 1.47556L12.5 1.5L12.4756 13.5' stroke='#FFFFFF'/>"
	                                +"</svg>"
	                                +"<svg id='third' class='corner' width='13' height='13' viewBox='0 0 13 13' fill='none' xmlns='http://www.w3.org/2000/svg'>"
	                                    +"<path d='M12.5244 0.499048L12.5 12.499L0.500025 12.4746' stroke='#FFFFFF' />"
	                                +"</svg>"
	                                +"<svg id='fourth' class='corner' width='13' height='13' viewBox='0 0 13 13' fill='none' xmlns='http://www.w3.org/2000/svg'>"
	                                    +"<path d='M12.5 12.5L0.5 12.5L0.499999 0.5' stroke='#FFFFFF' />"
	                                +"</svg>"
	                            +"</div>"
	                        +'</a><div class="outer-space">'
	                            +'<div class="icons">'
	                                +'<svg class="likes" width="21" height="18" viewBox="0 0 21 18" fill="none" xmlns="http://www.w3.org/2000/svg">'
	                                    +'<path d="M12.2 0.5L9.5 3.32353L6.8 0.5H3.2L0.5 3.32353V7.08824L9.5 16.5L18.5 7.08824V3.32353L15.8 0.5H12.2Z" stroke="#FFFFFF"/>'
	                                +'</svg>'
	                                +'<svg class="comments" width="21" height="15" viewBox="0 0 21 15" fill="none" xmlns="http://www.w3.org/2000/svg">'
	                                    +'<rect x="0.5" y="0.5" width="20" height="14" stroke="#FFFFFF"/>'
	                                    +'<path d="M0.477295 0.46875L10.5 7.5L20.5227 0.46875" stroke="#FFFFFF"/>'
	                                +'</svg>'
	                                +'<svg class="share" width="21" height="18" viewBox="0 0 21 18" fill="none" xmlns="http://www.w3.org/2000/svg">'
	                                    +'<path d="M0.5 5.5V16.5H10H19.5V5.5" stroke="#FFFFFF"/>'
	                                    +'<path d="M10.3536 0.146446C10.1583 -0.0488157 9.84171 -0.0488157 9.64645 0.146446L6.46447 3.32843C6.2692 3.52369 6.2692 3.84027 6.46447 4.03553C6.65973 4.2308 6.97631 4.2308 7.17157 4.03553L10 1.20711L12.8284 4.03553C13.0237 4.2308 13.3403 4.2308 13.5355 4.03553C13.7308 3.84027 13.7308 3.52369 13.5355 3.32843L10.3536 0.146446ZM10.5 10.5L10.5 0.5L9.5 0.5L9.5 10.5L10.5 10.5Z" fill="#FFFFFF"/>'
	                                +'</svg>'
	                            +'</div>'
	                            +'<div class="stat">'
		                           	+ lk(i, 1)
				                    + lk2(i, 2)
	                                +'<span id="share"></span>'
	                            +'</div>'                
	                        +'</div>' 
	                    +'</div>' 
	                    +'<a href="">'
	                        + data[0][i].login
	                    +'</a>'
	  		
	  		art.innerHTML = html;

	  		container.appendChild(art);	  		

			// film Opacity
			Global.animate({
				draw: (progress) => {
					//элемент,   свойство,   начальное значение,   конечное значение
					//item,      property,   initialParam,         finalParam 
					//поля требуют реализации

					let item = art;
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
				duration: 540,  				//duration
				timing: (timeFraction) => {	//timing function
				 	return Math.pow(timeFraction, 4);
				}
			});
	  	}
	  })
	  .catch(err => console.log(err))

	setInterval(() => {
		masonry();
	}, 200);
}

document.querySelector('.more').onclick = () => {

	fetchSort();
}

let triangle = document.querySelector('.disclaimer svg path');  // items
let corner = document.querySelector('.corner');


let triangOpacity = window.getComputedStyle(triangle).fillOpacity;		// текущее значение прозрачности элемента

document.querySelector('.disclaimer svg').onclick = () => {

	let scrollArts = document.querySelector('.gallery-container').getBoundingClientRect().top + pageYOffset - 120; 	// текущее значение высоты c учетом margin 120px	

	//window scrollTo()
	Global.animate({
		draw: (progress) => {
			//элемент,   свойство,   начальное значение,   конечное значение
			//item,      property,   initialParam,         finalParam 
			//поля требуют реализации

			let item = window;
            // let property = 'transform';
            let initialParam = pageYOffset;
            let finalParam = scrollArts;

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

// document.querySelectorAll('.inner-space').forEach(function(e) {
//   	e.addEventListener("mouseenter", (e) => {

//   		let innerSpace = e.target;

// 		// inner-space fillOpacity
// 		Global.animate({
// 			draw: (progress) => {
// 				//элемент,   свойство,   начальное значение,   конечное значение
// 				//item,      property,   initialParam,         finalParam 
// 				//поля требуют реализации

// 				let item = innerSpace;
// 	            let property = 'opacity';
// 	            let initialParam = window.getComputedStyle(innerSpace).opacity;
// 	            let finalParam = 0.8;

// 	            let frame = 0;

// 	            let func = (step) => {
// 	                frame += initialParam - progress * step; 
// 	                item.style[property] = frame;
// 	            }

// 	            func(initialParam - finalParam);
	        
// 			}, 
// 			duration: 100,  				//duration
// 			timing: (timeFraction) => {	//timing function
// 			 	return timeFraction;
// 			}
// 		});

// 		let outerSpace = innerSpace.parentNode.nextSibling;

// 		// outer-space fillOpacity
// 		Global.animate({
// 			draw: (progress) => {
// 				//элемент,   свойство,   начальное значение,   конечное значение
// 				//item,      property,   initialParam,         finalParam 
// 				//поля требуют реализации

// 				let item = outerSpace;
// 	            let property = 'opacity';
// 	            let initialParam = window.getComputedStyle(outerSpace).opacity;
// 	            let finalParam = 0.6;

// 	            let frame = 0;

// 	            let func = (step) => {
// 	                frame += initialParam - progress * step; 
// 	                item.style[property] = frame;
// 	            }

// 	            func(initialParam - finalParam);
	        
// 			}, 
// 			duration: 100,  				//duration
// 			timing: (timeFraction) => {	//timing function
// 			 	return timeFraction;
// 			}
// 		});

// 		let outerBgColor = window.getComputedStyle(outerSpace).backgroundColor.match(/^rgba\((\d+),\s*(\d+),\s*(\d+),\s*(\d+|\d.\d+)\)$/);

// 			// outer-space background color
// 			Global.animate({
// 				draw: (progress) => {
// 					//элемент,   свойство,   начальное значение,   конечное значение
// 					//item,      property,   initialParam,         finalParam 
// 					//поля требуют реализации

// 					let item = outerSpace;
// 		            let property = 'backgroundColor';
// 		            let initialParam = 0.7;
// 		            let finalParam = 0;

// 		            let frame = 0;

// 		            let func = (step) => {
// 		                frame += initialParam - progress * step; 
// 		                item.style[property] = 'rgba(' + outerBgColor[1] + ', ' + outerBgColor[2] + ', ' + outerBgColor[3] + ', ' + frame + ')';
// 		            }

// 		            func(initialParam - finalParam);
		        
// 				}, 
// 				duration: 100,  				//duration
// 				timing: (timeFraction) => {	//timing function
// 				 	return timeFraction;
// 				}
// 			});		
//   	});
// });

// document.querySelectorAll('.inner-space').forEach(function(e) {
//   	e.addEventListener("mouseout", (e) => {

//   		let innerSpace = e.target;

//   		if (innerSpace.parentNode.parentNode.contains(e.relatedTarget)) {  //innerSpace.parentNode.parentNode innerSpace -> a ->space
//   			// inner-space fillOpacity									// contains проверяет наследственность элемента (outerSpace к space)
// 			Global.animate({
// 				draw: (progress) => {
// 					//элемент,   свойство,   начальное значение,   конечное значение
// 					//item,      property,   initialParam,         finalParam 
// 					//поля требуют реализации

// 					let item = innerSpace;
// 		            let property = 'opacity';
// 		            let initialParam = 0.8;
// 		            let finalParam = 0.6;

// 		            let frame = 0;

// 		            let func = (step) => {
// 		                frame += initialParam - progress * step; 
// 		                item.style[property] = frame;
// 		            }

// 		            func(initialParam - finalParam);
		        
// 				}, 
// 				duration: 100,  				//duration
// 				timing: (timeFraction) => {	//timing function
// 				 	return timeFraction;
// 				}
// 			});

// 			let outerSpace = innerSpace.parentNode.nextSibling;

// 			// outer-space fillOpacity
// 			Global.animate({
// 				draw: (progress) => {
// 					//элемент,   свойство,   начальное значение,   конечное значение
// 					//item,      property,   initialParam,         finalParam 
// 					//поля требуют реализации

// 					let item = outerSpace;
// 		            let property = 'opacity';
// 		            let initialParam = window.getComputedStyle(outerSpace).opacity;
// 		            let finalParam = 1;

// 		            let frame = 0;

// 		            let func = (step) => {
// 		                frame += initialParam - progress * step; 
// 		                item.style[property] = frame;
// 		            }

// 		            func(initialParam - finalParam);
		        
// 				}, 
// 				duration: 100,  				//duration
// 				timing: (timeFraction) => {	//timing function
// 				 	return timeFraction;
// 				}
// 			});

// 			let outerBgColor = window.getComputedStyle(outerSpace).backgroundColor.match(/^rgba\((\d+),\s*(\d+),\s*(\d+),\s*(\d+|\d.\d+)\)$/);

// 			// outer-space background color
// 			Global.animate({
// 				draw: (progress) => {
// 					//элемент,   свойство,   начальное значение,   конечное значение
// 					//item,      property,   initialParam,         finalParam 
// 					//поля требуют реализации

// 					let item = outerSpace;
// 		            let property = 'backgroundColor';
// 		            let initialParam = 0;
// 		            let finalParam = 0.7;

// 		            let frame = 0;

// 		            let func = (step) => {
// 		                frame += initialParam - progress * step; 
// 		                item.style[property] = 'rgba(' + outerBgColor[1] + ', ' + outerBgColor[2] + ', ' + outerBgColor[3] + ', ' + frame + ')';
// 		            }

// 		            func(initialParam - finalParam);
		        
// 				}, 
// 				duration: 100,  				//duration
// 				timing: (timeFraction) => {	//timing function
// 				 	return timeFraction;
// 				}
// 			});

//   		}
//   		else{

//   			// inner-space fillOpacity	
// 			Global.animate({
// 				draw: (progress) => {
// 					//элемент,   свойство,   начальное значение,   конечное значение
// 					//item,      property,   initialParam,         finalParam 
// 					//поля требуют реализации

// 					let item = innerSpace;
// 		            let property = 'opacity';
// 		            let initialParam = 0.6;
// 		            let finalParam = 0;

// 		            let frame = 0;

// 		            let func = (step) => {
// 		                frame += initialParam - progress * step; 
// 		                item.style[property] = frame;
// 		            }

// 		            func(initialParam - finalParam);
		        
// 				}, 
// 				duration: 100,  				//duration
// 				timing: (timeFraction) => {	//timing function
// 				 	return timeFraction;
// 				}
// 			});

// 			let outerSpace = innerSpace.parentNode.nextSibling;

// 			// outer-space fillOpacity
// 			Global.animate({
// 				draw: (progress) => {
// 					//элемент,   свойство,   начальное значение,   конечное значение
// 					//item,      property,   initialParam,         finalParam 
// 					//поля требуют реализации

// 					let item = outerSpace;
// 		            let property = 'opacity';
// 		            let initialParam = 1;
// 		            let finalParam = 0;

// 		            let frame = 0;

// 		            let func = (step) => {
// 		                frame += initialParam - progress * step; 
// 		                item.style[property] = frame;
// 		            }

// 		            func(initialParam - finalParam);
		        
// 				}, 
// 				duration: 100,  				//duration
// 				timing: (timeFraction) => {	//timing function
// 				 	return timeFraction;
// 				}
// 			});
									
//   		}
//   	});
// });

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
