<div id="column2">

	<h2>
		<?= $page_title ?> (<?= $user->alias?>)
		<? if($user->url):?>(<?=anchor($user->url, 'www')?>)<? endif; ?>
		<? if($user->facebook):?>(<?= anchor('http://www.facebook.com/'.$user->facebook, 'Facebook')?>)<? endif; ?> 
		<? if($user->twitter):?>(<?= anchor('http://www.twitter.com/'.$user->twitter, 'Twitter')?>)<? endif; ?>
		(<?= anchor('users/edit/'.$user->alias, 'edit')?>)
	</h2>
	
	<p><strong>Nickname:</strong> <?= $user->nickname ?></p>
	<p><strong>Class:</strong> <?= $user->classyear ?></p>
	<p><strong>Major:</strong> <?= $user->major ?></p>
	<p><strong>Bio:</strong> <?= $user->bio ?></p>
	
	<h3>Clubs:</h3>
	
	<? if($orgs):?>
		<ul>
			<? foreach($orgs as $org): ?>
			<li><strong><?= anchor('/orgs/show/'.$org->slug, $org->org_name) ?></strong> - <?= $org->position_name ?></li>
			<? endforeach; ?>
		</ul>
	<? else: ?>
		<p><?= $user->nickname ?> is not currently a member of any clubs.</p>
	<? endif; ?>
	
</div>

<div id="column3">

	<? if($user->twitter):?>
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
			}).render().setUser('<?=$user->twitter?>').start();
			</script>
	<? endif; ?>

</div>