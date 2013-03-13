<div id="column2">

	<h2>
		<?= $page_title ?>  
		<? if($org->url):?>(<?=anchor($org->url, 'www')?>)<? endif; ?>
		<? if($org->facebook):?>(<?= anchor('http://www.facebook.com/'.$org->facebook, 'Facebook')?>)<? endif; ?> 
		<? if($org->twitter):?>(<?= anchor('http://www.twitter.com/'.$org->twitter, 'Twitter')?>)<? endif; ?>
		<? if($is_org_admin) { echo anchor('/orgs/edit/'.$org->slug, '(edit)'); }?>
	</h2>
	
	<p><? if($parent):?>a subclub of <strong><?= anchor('orgs/show/'.$parent->slug, $parent->name)?></strong><? endif; ?></p>
	
	<p><?= $org->desc ?></p>
	
	<? if(!$is_member):?>
		<p><?= anchor('orgs/join/'.$org->slug, 'Join this club!')?></p>
	<? else: ?>
		<p><?= anchor('orgs/leave/'.$org->slug, 'Leave this club!')?></p>
	<? endif; ?>
	
	<? if($children):?>
		<h3>Sub-groups</h3>
		<ul>
			<? foreach($children as $child):?>
			<li><strong><?= anchor('/orgs/show/'.$child->slug, $child->name) ?></strong> 
			<? if($child->url):?>(<?=anchor($child->url, 'w')?>)<? endif; ?> 
			<? if($child->facebook):?>(<?= anchor('http://www.facebook.com/'.$child->facebook, 'f')?>)<? endif; ?> 
			<? if($child->twitter):?>(<?= anchor('http://www.twitter.com/'.$child->twitter, 't')?>)<? endif; ?> 
			- <?= $child->desc ?></li>
			<? endforeach; ?>
		</ul>
		<p><?= anchor('/orgs/create/'.$org->idorgs, 'Create a sub-group')?></p>
	<? endif; ?>
	
	<? if($members):?>
		<h3>Members <? if($is_org_admin) { echo anchor('/orgs/editmembers/'.$org->slug, '(edit)'); }?></h3>
		<ul>
			<? foreach($members as $member):?>
			<li><strong><?= anchor('users/show/'.$member->alias, $member->fullname) ?></strong> - <?= $member->name ?></li>
			<? endforeach; ?>
		</ul>
	<? endif; ?>
	
	</div>

<div id="column3">

	<? if($org->twitter):?>
			<script src="http://widgets.twimg.com/j/2/widget.js"></script>
			<script>
			new TWTR.Widget({
			  version: 2,
			  type: 'profile',
			  rpp: 10,
			  interval: 6000,
			  width: 250,
			  height: 300,
			  theme: {
			    shell: {
			      background: '#e5e5da',
			      color: '#000000'
			    },
			    tweets: {
			      background: '#ffffff',
			      color: '#000000',
			      links: '#712a29'
			    }
			  },
			  features: {
			    scrollbar: true,
			    loop: false,
			    live: true,
			    hashtags: true,
			    timestamp: true,
			    avatars: false,
			    behavior: 'all'
			  }
			}).render().setUser('<?=$org->twitter?>').start();
			</script>
	<? endif; ?>

</div>