<div id="column2">

	<h2><?= $page_title ?></h2>
	
	<?= form_open('orgs/create') ?>
	
	<p>Creator and first administrator: <?= nickname() ?> (you)</p>
	
	<p>Name: <?= form_input('name', '')?></p>
	
	<p>Abbreviation: <?= form_input('slug', '')?></p>
	
	<p>Category: <?= form_dropdown('category', $category_options, '0')?></p>
	
	<p>Parent Club (if any): <?= form_dropdown('parent_idorgs', $parent_options, $parent_idorgs)?></p>
	
	<? $membership_options = array(
		'open' => 'Open to all',
		'approval' => 'Approval required',
		'closed' => 'Closed (by appointment only)'
		);
	?>
	
	<p>Membership: <?= form_dropdown('membership', $membership_options, 'open')?></p>
	
	<p>Description: <?= form_textarea('desc', '')?></p>
	
	<h3>Your club around the web:</h3>
	
	<p>Facebook Fan Page username: <?= form_input('facebook', '')?></p>
	
	<p>Twitter Username: <?= form_input('twitter', '')?></p>
	
	<p>Club web site: <?= form_input('url', '')?></p>
	
	<p><?= form_submit('submit','GO')?></p>
	
	<?= form_close() ?>

</div>

<div id="column3">
	
	<p>Maybe we could have some help text here or something! Y'know?</p>
	
</div>