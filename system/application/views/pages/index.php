<div id="column2">

	<h2><?= $page_title ?></h2>
	
	<p>The Bowdoin Student Government stands on campus as the democratically-elected, autonomous representative of the Student Body and receives its authority from those whom it serves. It seeks to be a partner to the faculty and administration in the leadership of the College, while being a relentless advocate for student needs and desires. Above all, it strives to refine the College's most important goal... whatever that may be.</p>
	
</div>

<div id="column3">

	<script src="http://widgets.twimg.com/j/2/widget.js"></script>
	<script>
	new TWTR.Widget({
	  version: 2,
	  type: 'profile',
	  rpp: 4,
	  interval: 6000,
	  width: 250,
	  height: 300,
	  theme: {
	    shell: {
	      background: '#000000',
	      color: '#ffffff'
	    },
	    tweets: {
	      background: '#fafafa',
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
	}).render().setUser('bsgupdates').start();
	</script>

</div>