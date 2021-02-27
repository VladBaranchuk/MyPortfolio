import Global from "../../template/JS/cls_Global.js";

let check = false;		// переменная положения язычка расширенного меню

let exHeight = document.querySelector(".extended-menu").clientHeight;	// текущее значение высоты для extended-menu
		
document.querySelector(".extended-menu").style.height = '0px';	// закрытие расширенного меню при загрузке страницы 	

document.querySelector(".open svg").onclick = () => {  // функция события нажатия на язычок

	let ex = document.querySelector(".extended-menu"); 					// items
	let triangle = document.querySelector(".open svg path");			//
	let exContainer = document.querySelector(".extended-container");	//

	if(check){
		check = !check;

		// exContainer opasity
		Global.animate({
			draw: (progress) => {
				//элемент,   свойство,   начальное значение,   конечное значение
				//item,      property,   initialParam,         finalParam 
				//поля требуют реализации

				let item = exContainer;
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
			 	return -Math.pow(timeFraction, 2) + 2*timeFraction;
			}
		})
		exContainer.style.pointerEvents = 'none';

		// triangle rotate
		Global.animate({
			draw: (progress) => {
				//элемент,   свойство,   начальное значение,   конечное значение
				//item,      property,   initialParam,         finalParam 
				//поля требуют реализации

				let item = triangle;
	            let property = 'transform';
	            let initialParam = 0;
	            let finalParam = 180;

	            let frame = 0;

	            let func = (step) => {
	                frame += initialParam - progress * step; 
	                item.style[property] = 'rotateX(' + frame + 'deg)';
	            }

	            func(initialParam - finalParam);
            
			}, 
			duration: 300,  				//duration
			timing: (timeFraction) => {	//timing function
			 	return -Math.pow(timeFraction, 2) + 2*timeFraction;
			}
		});

		// extended-menu height
		Global.animate({
			draw: (progress) => {
				//элемент,   свойство,   начальное значение,   конечное значение
				//item,      property,   initialParam,         finalParam 
				//поля требуют реализации

				let item = ex;
	            let property = 'height';
	            let initialParam = exHeight;
	            let finalParam = 0;

	            let frame = 0;

	            let func = (step) => {
	                frame += initialParam - progress * step; 
	                item.style[property] = frame + 'px';
	            }

	            func(initialParam - finalParam);
            
			}, 
			duration: 300,  				//duration
			timing: (timeFraction) => {	//timing function
			 	return Math.pow(timeFraction, 2);
			}
		});
	}
	else{
		check = !check;

		// exContainer opasity
		Global.animate({
			draw: (progress) => {
				//элемент,   свойство,   начальное значение,   конечное значение
				//item,      property,   initialParam,         finalParam 
				//поля требуют реализации

				let item = exContainer;
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
			duration: 400,  				//duration
			timing: (timeFraction) => {	//timing function
			 	return Math.pow(timeFraction, 6);
			}
		})
		exContainer.style.pointerEvents = 'visible';

		// triangle rotate
		Global.animate({
			draw: (progress) => {
				//элемент,   свойство,   начальное значение,   конечное значение
				//item,      property,   initialParam,         finalParam 
				//поля требуют реализации

				let item = triangle;
	            let property = 'transform';
	            let initialParam = 180;
	            let finalParam = 0;

	            let frame = 0;

	            let func = (step) => {
	                frame += initialParam - progress * step; 
	                item.style[property] = 'rotateX(' + frame + 'deg)';
	            }

	            func(initialParam - finalParam);
            
			}, 
			duration: 300,  				//duration
			timing: (timeFraction) => {	//timing function
			 	return -Math.pow(timeFraction, 2) + 2*timeFraction;
			}
		});

		// extended-menu height
		Global.animate({
			draw: (progress) => {
				//элемент,   свойство,   начальное значение,   конечное значение
				//item,      property,   initialParam,         finalParam 
				//поля требуют реализации

				let item = ex;
	            let property = 'height';
	            let initialParam = 0;
	            let finalParam = exHeight;

	            let frame = 0;

	            let func = (step) => {
	                frame += initialParam - progress * step; 
	                item.style[property] = frame + 'px';
	            }

	            func(initialParam - finalParam);
            
			}, 
			duration: 300,  				//duration
			timing: (timeFraction) => {	//timing function
			 	return Math.pow(timeFraction, 2);
			}
		});
	}


}