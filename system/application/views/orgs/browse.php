<div id="column2">

	<h2><?= $page_title ?></h2>
	
	<p>See a gap in the offerings? <?=anchor('orgs/create', 'Start a club!')?></p>
	
	<ul>
	
	<? foreach($orgs as $org): ?>
	
	<li><strong><?= anchor('/orgs/show/'.$org->slug, $org->name) ?></strong> 
	<? if($org->url):?>(<?=anchor($org->url, 'w')?>)<? endif; ?> 
	<? if($org->facebook):?>(<?= anchor('http://www.facebook.com/'.$org->facebook, 'f')?>)<? endif; ?> 
	<? if($org->twitter):?>(<?= anchor('http://www.twitter.com/'.$org->twitter, 't')?>)<? endif; ?> 
	<br/><?= substr($org->desc, 0, 65) ?><?php if(strlen($org->desc) > 65) echo '...' ?></li>
	
	<? endforeach; ?>
	
	</ul>

</div>

<div id="column3">
	<script src="http://widgets.twimg.com/j/2/widget.js"></script>
	<script>
	new TWTR.Widget({
	  version: 2,
	  type: 'list',
	  rpp: 30,
	  interval: 6000,
	  title: '',
	  subject: 'Student Organizations',
	  width: 250,
	  height: 300,
	  theme: {
	    shell: {
	      background: '#000000',
	      color: '#ffffff'
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
	    avatars: true,
	    behavior: 'all'
	  }
	}).render().setList('bowdoinorient', 'student-orgs').start();
	</script>
</div>