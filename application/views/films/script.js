import Global from "../template/JS/cls_Global.js";

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