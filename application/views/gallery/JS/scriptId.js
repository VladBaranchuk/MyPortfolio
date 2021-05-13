import Global from "../../template/JS/cls_Global.js";

document.querySelector('.scale').onclick = () => {

	let scrollArts = document.querySelector('.full-image').getBoundingClientRect().top + pageYOffset; 	// текущее значение высоты c учетом margin 120px	

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

document.querySelector('.background').onmouseover = (e) => {

	if(e.target.className == 'control'){

		let control = e.target;

		control.onmouseenter = (e) =>{

			let triangle = e.target.querySelector('path');  // items
			let triangOpacity = window.getComputedStyle(triangle).fillOpacity;

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
	}
}

document.querySelector('.background').onmouseout = (e) => {

	if(e.target.className == 'control'){

		let control = e.target;

		control.onmouseleave = (e) =>{

			let triangle = e.target.querySelector('path');  // items
			let triangOpacity = window.getComputedStyle(triangle).fillOpacity;

			// triangle fillOpacity
			Global.animate({
				draw: (progress) => {
					//элемент,   свойство,   начальное значение,   конечное значение
					//item,      property,   initialParam,         finalParam 
					//поля требуют реализации

					let item = triangle;
		            let property = 'fillOpacity';
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
}

	let outerSpace = document.querySelector('.outer-space-top');
	let like = outerSpace.querySelector('.likes-top');
	let id = outerSpace.id;

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
		  	let likeValue = outerSpace.querySelector('#likes-top');
		  	let likeValueGet = outerSpace.querySelector('#likes-top').textContent;

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

document.querySelector('.submit').onclick = (e) => {
	e.preventDefault();

	let form = document.querySelector('form').elements;
	let message = form['message'].value;
	let id = document.querySelector('.image').id;

	const url = '/gallery/' + id + '/';

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