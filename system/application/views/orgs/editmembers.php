<div id="column2">

	<h2><?= anchor('/orgs/show/'.$org->slug, $page_title) ?> (editing)</h2>
	<h3><?= anchor('orgs/edit/'.$org->slug, 'Info')?> | Members</h3>
	
	<h3>Available Position Types:</h3>
	
	<? foreach($position_types as $position_type):?>
	
		<p><strong><?=$position_type->name?></strong> - <?= $position_type->desc ?>
		<br/>Selection: <?= $position_type->selection ?>
		<br/>Selector: <?= $position_type->selector ?>
		<br/>Eligibility: <?= $position_type->eligibility ?>
		<br/>Privileges: <?= $position_type->privileges ?>
	
	<? endforeach; ?>
	
	<p>Create Position Type</p>
	
	<? if($members):?>
	<h3>Current Members:</h3>
	
	<?= form_open('orgs/editmembers/'.$org->slug) ?>
	
	<? foreach($members as $member):?>
	
		<p><strong><?= anchor('users/show/'.$member->alias, $member->fullname) ?></strong> - <?= form_dropdown('current_position_type[]', $position_options, $member->idpositions_types)?> Remove? <?= form_checkbox('current_remove[]', $member->idusers, FALSE);?></p>
	
	<? endforeach; ?>
	<? endif; ?>
	
	<p><?= form_submit('submit','GO')?></p>
	
	<?= form_close() ?>
	
</div>

<div id="column3">

	<p>Note: at the moment, a person may only hold one position in any given group. Additionally, there is no way for a group administrator to add members. Members must join the group themselves.</p>

</div>