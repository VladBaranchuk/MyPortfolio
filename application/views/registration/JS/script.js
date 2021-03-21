import Global from "../../template/JS/cls_Global.js";

let login = document.querySelector('#login');  // items
let signup = document.querySelector('#signup');
let loginClass = document.querySelector('.login');  
let signupClass = document.querySelector('.signup');

document.querySelector('#signup').onclick = () => {

	//#signup opacity
	Global.animate({
		draw: (progress) => {
			//элемент,   свойство,   начальное значение,   конечное значение
			//item,      property,   initialParam,         finalParam 
			//поля требуют реализации

			let item = signup;
            let property = 'opacity';
            let initialParam = window.getComputedStyle(signup).opacity;
            let finalParam = 1;

            let frame = 0;

            let func = (step) => {
                frame += initialParam - progress * step; 
                item.style[property] = frame;
            }

            func(initialParam - finalParam);
        
		}, 
		duration: 300,  				//duration
		timing: (timeFraction) => {	//timing function
		 	return timeFraction;
		}
	});

	//#login opacity
	Global.animate({
		draw: (progress) => {
			//элемент,   свойство,   начальное значение,   конечное значение
			//item,      property,   initialParam,         finalParam 
			//поля требуют реализации

			let item = login;
            let property = 'opacity';
            let initialParam = window.getComputedStyle(login).opacity;
            let finalParam = 0.6;

            let frame = 0;

            let func = (step) => {
                frame += initialParam - progress * step; 
                item.style[property] = frame;
            }

            func(initialParam - finalParam);
        
		}, 
		duration: 300,  				//duration
		timing: (timeFraction) => {	//timing function
		 	return timeFraction;
		}
	});


	// .signup opasity
	loginClass.style.display = 'none';
	loginClass.style.opacity = 0;
	signupClass.style.display = 'block';
		Global.animate({
			draw: (progress) => {
				//элемент,   свойство,   начальное значение,   конечное значение
				//item,      property,   initialParam,         finalParam 
				//поля требуют реализации

				let item = signupClass;
	            let property = 'opacity';
	            let initialParam = window.getComputedStyle(signupClass).opacity;
	            let finalParam = 1;

	            let frame = 0;

	            let func = (step) => {
	                frame += initialParam - progress * step; 
	                item.style[property] = frame;
	            }

	            func(initialParam - finalParam);
            
			}, 
			duration: 500,  				//duration
			timing: (timeFraction) => {	//timing function
		 		return timeFraction;
			}
		})
		
}

document.querySelector('#login').onclick = () => {

	//#login opacity
	Global.animate({
		draw: (progress) => {
			//элемент,   свойство,   начальное значение,   конечное значение
			//item,      property,   initialParam,         finalParam 
			//поля требуют реализации

			let item = login;
            let property = 'opacity';
            let initialParam = window.getComputedStyle(login).opacity;
            let finalParam = 1;

            let frame = 0;

            let func = (step) => {
                frame += initialParam - progress * step; 
                item.style[property] = frame;
                console.log(frame);
            }

            func(initialParam - finalParam);
        
		}, 
		duration: 300,  				//duration
		timing: (timeFraction) => {	//timing function
		 	return timeFraction;
		}
	});

	//#signup opacity
	Global.animate({
		draw: (progress) => {
			//элемент,   свойство,   начальное значение,   конечное значение
			//item,      property,   initialParam,         finalParam 
			//поля требуют реализации

			let item = signup;
            let property = 'opacity';
            let initialParam = window.getComputedStyle(signup).opacity;
            let finalParam = 0.6;

            let frame = 0;

            let func = (step) => {
                frame += initialParam - progress * step; 
                item.style[property] = frame;
            }

            func(initialParam - finalParam);
        
		}, 
		duration: 300,  				//duration
		timing: (timeFraction) => {	//timing function
		 	return timeFraction;
		}
	});


	// .login opasity
	signupClass.style.display = 'none';
	signupClass.style.opacity = 0;
	loginClass.style.display = 'block';
		Global.animate({
			draw: (progress) => {
				//элемент,   свойство,   начальное значение,   конечное значение
				//item,      property,   initialParam,         finalParam 
				//поля требуют реализации

				let item = loginClass;
	            let property = 'opacity';
	            let initialParam = window.getComputedStyle(loginClass).opacity;
	            let finalParam = 1;

	            let frame = 0;

	            let func = (step) => {
	                frame += initialParam - progress * step; 
	                item.style[property] = frame;
	            }

	            func(initialParam - finalParam);
            
			}, 
			duration: 500,  				//duration
			timing: (timeFraction) => {	//timing function
		 		return timeFraction;
			}
		})
		
}
