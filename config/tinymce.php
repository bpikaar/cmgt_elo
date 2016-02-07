<?php

return [

	'cdn' => config('app.url').'/vendor/js/tinymce/tinymce.min.js',

	'params' => [
		"selector" => "#tinymce", //id for textarea
		"language" => 'nl', //pt_BR
		"theme" => "modern",
		"menubar" => "false",
		"skin" => "lightgray",
//		"plugins" => [
//	         "advlist autolink link image lists charmap print preview hr anchor pagebreak spellchecker",
//	         "searchreplace wordcount visualblocks visualchars code fullscreen insertdatetime media nonbreaking",
//	         "save table contextmenu directionality emoticons template paste textcolor"
//		],
		"plugins" => [
	         "advlist autolink link image lists charmap preview hr anchor pagebreak spellchecker",
	         "searchreplace wordcount visualblocks visualchars code fullscreen insertdatetime nonbreaking",
	         "save table contextmenu directionality emoticons template paste textcolor"
		],
		"toolbar" => "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | preview fullpage | forecolor backcolor",
	]

];