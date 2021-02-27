import Global from "../../template/JS/cls_Global.js";

let rectangle = document.querySelector(".lift svg rect"); 	// items
let triangle = document.querySelector(".lift svg path");   	//
let lift = document.querySelector(".lift svg path");		//

let rectOpacity = window.getComputedStyle(rectangle).strokeOpacity;		// текущее значение прозрачности границы
let triangOpacity = window.getComputedStyle(triangle).fillOpacity;		// текущее значение прозрачности элемента

document.querySelector(".lift svg").onclick = () => {

	let scrollHeight = window.pageYOffset;

	//window scrollTo()
	Global.animate({
		draw: (progress) => {
			//элемент,   свойство,   начальное значение,   конечное значение
			//item,      property,   initialParam,         finalParam 
			//поля требуют реализации

			let item = window;
            // let property = 'transform';
            let initialParam = scrollHeight;
            let finalParam = 0;

            let frame = 0;

            let func = (step) => {
                frame += initialParam - progress * step; 
                item.scrollTo(0, frame);
            }

            func(initialParam - finalParam);
        
		}, 
		duration: 300,  				//duration
		timing: (timeFraction) => {	//timing function
		 	return timeFraction;
		}
	});
}

document.querySelector(".lift svg").onmouseenter = () => {

	// rectangle strokeOpacity
	Global.animate({
		draw: (progress) => {
			//элемент,   свойство,   начальное значение,   конечное значение
			//item,      property,   initialParam,         finalParam 
			//поля требуют реализации

			let item = rectangle;
            let property = 'strokeOpacity';
            let initialParam = rectOpacity;
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

document.querySelector(".lift svg").onmouseleave = () => {
	
	// rectangle strokeOpacity
	Global.animate({
		draw: (progress) => {
			//элемент,   свойство,   начальное значение,   конечное значение
			//item,      property,   initialParam,         finalParam 
			//поля требуют реализации

			let item = rectangle;
            let property = 'strokeOpacity';
            let initialParam = 1;
            let finalParam = rectOpacity;

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