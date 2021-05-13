<?php 

	return array(

		'user/(@[A-Za-z0-9]+)' => 'user/view/$1',
		'cabinet' => 'cabinet/index',
		'films/([0-9]+)' => 'films/view/$1',
		'films' => 'films/index',
		'gallery/([0-9]+)' => 'gallery/view/$1',
		'gallery' => 'gallery/index',
		'registration' => 'registration/index',
		'' => 'main/index'
	);

 ?>