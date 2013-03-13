<div id="column2">

	<h2><?= anchor('/orgs/show/'.$org->slug, $page_title) ?> (editing)</h2>
	<h3>Info | <?= anchor('/orgs/editmembers/'.$org->slug, 'Members')?></h3>
	
	<?= form_open('orgs/edit/'.$org->slug) ?>
	
	<p>Name: <?= form_input('name', $org->name)?></p>
	
	<p>Category: <?= form_dropdown('category', $category_options, $org->category)?></p>
	
	<p>Parent: <?= form_dropdown('parent_idorgs', $parent_options, $org->parent_idorgs)?></p>
	
	<? $membership_options = array(
		'open' => 'Open to all',
		'approval' => 'Approval required',
		'closed' => 'Closed (by appointment only)'
		);
	?>
	
	<p>Membership: <?= form_dropdown('membership', $membership_options, $org->membership)?></p>
	
	<p>Description: <?= form_textarea('desc', $org->desc)?></p>
	
	<h3><?=$org->name?> around the web:</h3>
	
	<p>Facebook Fan Page username: <?= form_input('facebook', $org->facebook)?></p>
	
	<p>Twitter username: <?= form_input('twitter', $org->twitter)?></p>
	
	<p>Club web site: <?= form_input('url', $org->url)?></p>
	
	<p><?= form_submit('submit','GO')?></p>
	
	<?= form_close() ?>
	
</div>

<div id="column3">

	<p>Maybe we could have some help text here or something! Y'know?</p>

</div>