import Global from "../../template/JS/cls_Global.js";

document.querySelector('.submit').onclick = (e) => {
	e.preventDefault();

	let form = document.querySelector('form').elements;
	let message = form['message'].value;
	let id = document.querySelector('.id-information').id;

	const url = '/films/' + id + '/';

	const body = new FormData();
	body.set('message', message);
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
	  .then((data)=>{

	  	form['message'].value = '';

	  	let comments = document.querySelector('.output');

	  	let comment = document.createElement('div');
	  	comment.className = "output-comments";
	  	comment.id = data['id'];

  		let html = '<img src="/application/views/template/images/users/' + data['login'] + '.jpg" alt="" width="50px" height="50px">'
                	+	'<div class="comment-ifn-container">'
                    	+	'<div class="comment-information">'
                        	+	'<div>'
                            	+ 	'<a href="/user/' + data['login'] + '">'
                            		+	data['login']
                            	+	'</a>'
                        	+	'</div>'
                        	+	'<div style="color: #65414580;">'
                   				+	data['date']
                        	+	'</div>'
                    	+	'</div>'
                        +	'<div class="comment">'
                            +	data['message']
                        +	'</div>'
                    +	'</div>'

        comment.innerHTML = html;

  		comments.prepend(comment);
	  })
	  .catch(err => console.log(err))
}

document.querySelector('.likes path').onclick = (e) => {
	let like = document.querySelector('.likes');
	let id = document.querySelector('.id-information').id;

	like.onclick = (e) =>{
		const url = '/films/' + id + '/';

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

		  	let likePath = like.querySelector('path');
		  	let likeValue = document.querySelector('#likes');
		  	let likeValueGet = document.querySelector('#likes').textContent;

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
