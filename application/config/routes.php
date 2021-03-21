<?php 

	return array(
		
		'films/([0-9]+)' => 'films/view/$1',
		'gallery/([0-9]+)' => 'gallery/view/$1',
		'films' => 'films/index',
		'gallery' => 'gallery/index',
		'registration' => 'registration/index',
		'' => 'main/index'
	);

 ?>