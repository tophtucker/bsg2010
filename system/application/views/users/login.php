<div id="column2">

	<h2><?= $page_title ?></h2>
	
	<?= form_open('users/login') ?>
	
	<p>alias: <?= form_input('alias', '')?></p>
	
	<p><?= form_submit('submit','GO')?></p>
	
	<?= form_close() ?>
	
	<p><?= anchor('users/create', 'No account? Sign up!')?></p>

</div>

<div id="column3">

	<p>Maybe we could have some help text here or something! Y'know?</p>

</div>