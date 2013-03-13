<html>
<head>
<link rel="stylesheet" type="text/css" href="<?= base_url() ?>css/main.css">
<title>BSG Online - <?= $page_title ?></title>

<link rel="icon" type="image/vnd.microsoft.icon" href="<?= base_url() ?>images/favicon.ico">

</head>

<body>

<div id="content">

<div id="banner">

	<center><a href="<?= base_url() ?>"><img src="<?= base_url() ?>images/wordmark-white.png"></a></center>

</div>

<div id="navbar">

	<p><?= anchor('/pages/bsg', 'BSG')?> | <?= anchor('/orgs', 'Orgs')?> | <?= anchor('/pages/services', 'Services')?> || 
	<? if(is_logged_in()):?>
		<?= anchor('users/show/'.alias(), nickname())?> (<?= anchor('users/logout', 'logout')?>)
	<? else: ?>
		<?= anchor('users/login', 'login')?>
	<? endif; ?>
	</p>

</div>

<div id="subcontent">
	
	<div id="column1">
	<p>Maybe additional navigation or information or something can go in this column.</p> 
	<p>Hello world! How's it going out there?</p>
	</div>
	
	<?= $content?>
	
</div>

<div id="footer">

	<p>Code is Law - BSG 2.0 | <?= anchor('/pages/about', 'About')?> | <?= anchor('/pages/help', 'Help')?> | <?= anchor('/pages/feedback', 'Feedback')?></p>

</div>

</div>

</body>

</html>