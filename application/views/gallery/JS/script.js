import Global from "../../template/JS/cls_Global.js";

window.onload = function(){

	var grid = document.querySelector('.gallery-container');
	var msnry = new Masonry( grid, {

	  itemSelector: '.art-container',
	  columnWidth: 378,
	  gutter: 49
	});
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

document.querySelectorAll('.inner-space').forEach(function(e) {
  	e.addEventListener("mouseenter", (e) => {

  		let innerSpace = e.target;

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
  	});
});

document.querySelectorAll('.inner-space').forEach(function(e) {
  	e.addEventListener("mouseout", (e) => {

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
  	});
});

