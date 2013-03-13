<div id="column2">

	<h2><?= $page_title ?></h2>
	
	<?= form_open('users/create') ?>
	
	<p>alias: <?= form_input('alias', '')?></p>
	
	<p>full name: <?= form_input('fullname', '')?></p>
	
	<p>nickname: <?= form_input('nickname', '')?></p>
	
	<?php 
	
	$options = array(
		'2010' => '2010',
		'2011' => '2011',
		'2012' => '2012',
		'2013' => '2013'
		);
	
	?>
	
	<p>classyear: <?= form_dropdown('classyear', $options, '2010')?></p>
	
	<p>major: <?= form_input('major', '')?></p>
	
	<p>bio: <?= form_textarea('bio', '')?></p>
	
	<h3>You around the web:</h3>
	
	<p>facebook username: <?= form_input('facebook', '')?></p>
	
	<p>twitter username: <?= form_input('twitter', '')?></p>
	
	<p>personal web site: <?= form_input('url', '')?></p>
	
	<p><?= form_submit('submit','GO')?></p>
	
	<?= form_close() ?>
	
</div>

<div id="column3">

	<p>Maybe we could have some help text here or something! Y'know?</p>

</div>