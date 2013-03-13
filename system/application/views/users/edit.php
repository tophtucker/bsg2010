<div id="column2">

	<h2><?= anchor('/users/show/'.$user->alias, $page_title) ?> (editing)</h2>
	
	<?= form_open('users/edit/'.$user->alias) ?>
	
	<p>full name: <?= form_input('fullname', $user->fullname)?></p>
	
	<p>nickname: <?= form_input('nickname', $user->nickname)?></p>
	
	<?php 
	
	$options = array(
		'2010' => '2010',
		'2011' => '2011',
		'2012' => '2012',
		'2013' => '2013'
		);
	
	?>
	
	<p>classyear: <?= form_dropdown('classyear', $options, $user->classyear)?></p>
	
	<p>major: <?= form_input('major', $user->major)?></p>
	
	<p>bio: <?= form_textarea('bio', $user->bio)?></p>
	
	<h3><?= $user->nickname ?> around the web:</h3>
	
	<p>facebook username: <?= form_input('facebook', $user->facebook)?></p>
	
	<p>twitter username: <?= form_input('twitter', $user->twitter)?></p>
	
	<p>personal web site: <?= form_input('url', $user->url)?></p>
	
	<p><?= form_submit('submit','GO')?></p>
	
	<?= form_close() ?>
	
</div>

<div id="column3">

	<p>Maybe we could have some help text here or something! Y'know?</p>

</div>