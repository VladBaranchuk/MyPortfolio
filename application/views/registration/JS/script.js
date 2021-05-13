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

document.forms.signup.onsubmit = () => {

	let regName = /^([А-Я]|[A-Z])([а-я]|[a-z]){1,19}$/;
	let regEmail = /^\w+@[a-zA-Z_]+?\.[a-zA-Z]{2,6}/;
	let regLog = /^@[a-z]{1,15}$/;
	let regPassword = /^(?=.*[0-9])(?=.*[a-z])(?=.*[A-Z])[0-9a-zA-Z!@#$%^&*]{9,}/;

	let signup = document.forms.signup;

	let name = signup.name.value;
	let surname = signup.surname.value;
	let log = signup.login.value;
	let middleName = signup.middlename.value;
	let email = signup.email.value;
	let password = signup.password.value;
	let cPassword = signup.confirmPassword.value;

	let boolName = false;
	let boolSurname = false;
	let boolLog = false;
	let boolMiddleName = false;
	let boolEmail = false;
	let boolPassword = false;

	if(name.match(regName)){
		boolName = true;
	}
	else{
		alert('Не верно указано Имя, оно должно содержать русские и англ символы верх или нижн регистра');
	}

	if(surname.match(regName)){
		boolSurname = true;
	}
	else{
		alert('Не верно указана Фамилия, она должна содержать русские и англ символы верх или нижн регистра');
	}

	if(middleName.match(regName)){
		boolMiddleName = true;
	}
	else{
		alert('Не верно указано Отчество, оно должно содержать русские и англ символы верх или нижн регистра');
	}

	if(log.match(regLog)){
		boolLog = true;
	}
	else{
		alert('Не верно указан Логин, он должен содержать англ символы нижн регистра');
	}

	if(email.match(regEmail)){
		boolEmail = true;
	}
	else{
		alert('Не верно указан Email');
	}

	if(password.match(regPassword)){
		if(cPassword.match(regPassword)){
			if(password == cPassword){
				boolPassword = true;
			}
			else{
				alert('поля Пароль и Повторить Пароль не совпадают');
			}
		}
		else{
			alert('Не верно указанo поле Повторить Пароль');
		}
	}
	else{
		alert('Не верно указан Пароль');
	}

	if(boolPassword && boolEmail && boolLog && boolSurname && boolName && boolMiddleName){
		let input = document.createElement('input');
		input.name = "type";
		input.value = "signup";
		signup.append(input);


		return true;
	}

	return false;
}

document.forms.login.onsubmit = () => {

	let regLog = /^@[a-z]{1,15}$/;
	let regPassword = /^(?=.*[0-9])(?=.*[a-z])(?=.*[A-Z])[0-9a-zA-Z!@#$%^&*]{9,}/;

	let login = document.forms.login;

	let log = login.login.value;
	let password = login.password.value;
	let cPassword = login.confirmPassword.value;

	let boolLog = false;
	let boolPassword = false;

	if(log.match(regLog)){
		boolLog = true;
	}
	else{
		alert('Не верно указан Логин, он должен содержать англ символы нижн регистра');
	}

	if(password.match(regPassword)){
		if(cPassword.match(regPassword)){
			if(password == cPassword){
				boolPassword = true;
			}
			else{
				alert('поля Пароль и Повторить Пароль не совпадают');
			}
		}
		else{
			alert('Не верно указанo поле Повторить Пароль');
		}
	}
	else{
		alert('Не верно указан Пароль');
	}

	if(boolPassword && boolLog){
		let input = document.createElement('input');
		input.name = "type";
		input.value = "login";
		login.append(input);

		return true;
	}

	return false;
}

	

document.forms.signup.login.oninput = () =>{
	let input = document.forms.signup.login;

	input.value = input.value.toLowerCase();

	if(input.value[0] != "@"){
		input.value = "@" + input.value.toLowerCase();
	}
}
document.forms.login.login.oninput = () =>{
	let input = document.forms.login.login;

	input.value = input.value.toLowerCase();

	if(input.value[0] != "@"){
		input.value = "@" + input.value.toLowerCase();
	}
}