<?php
$lang = $site->language()->code();
?>
<!DOCTYPE html>
<html lang="<?=$lang?>">
<head>
	<title><?=$site->title()?></title>
	<meta charset="utf-8">
	<meta name="keywords" content="<?=$site->keywords()?>">
	<meta property="og:description" name="description" content="<?=$site->description()?>">
	<meta property="og:title" content="<?=$site->title()?>">
	<meta property="og:site_name" content="<?=$site->title()?>">
	<meta property="og:type" content="website">
	<meta property="og:image" content="<?=$site->url?>/assets/images/fb_share_<?=$lang?>.jpg">
	<meta property="og:locale" content="<?=$lang==='en'?'en_gb':'de_de'?>">
	<meta property="og:locale:alternate" content="<?=$lang==='en'?'de_de':'en_gb'?>">
	<script type="text/javascript" src="<?=$site->url?>/assets/javascript/script-min.js" async></script>
	<link rel="stylesheet" type="text/css" href="<?=$site->url?>/assets/css/style.css">
	<link rel="alternate" href="<?=$site->url()?><?=$lang==='en'?'/de':null?>" hreflang="<?=($lang == 'en')?'de':'en'?>" title="<?=$site->title()?>">
  <link rel="alternate" type="application/rss+xml" href="<?=url('rss')?>">
	<meta content="initial-scale=1.0, width=device-width, maximum-scale=1.0" name="viewport">
</head>
<body>
	<?php snippet('header') ?>
	<section data-id="weblog">
		<h1 hidden>Weblog</h1>
		<?php
		foreach ($pages->find('blog')->children()->sortBy('date','desc') as $blog_entry) :
			if (!empty($site->user()) OR $blog_entry->isVisible()) :
		?>
		<article id="<?=$blog_entry->uid()?>" data-title="<?=$blog_entry->title()->html()?>" itemscope itemtype="http://schema.org/Article">
			<header>
				<h1 itemprop="name"><?=$blog_entry->title()->html()?></h1>
				<a itemprop="url" href="<?=$blog_entry->url()?>" class="time">
  				<time datetime="<?=$blog_entry->date('Y-m-d')?>" itemprop="datePublished" content="<?=$blog_entry->date('Y-m-d')?>">
  				  <?=$blog_entry->date('Y/m/d')?>
  				</time>
  		  </a>
				<ul class="keywords">
				<?php
					$keywords = a::sort($blog_entry->keywords()->split(','),null,'asc');
					$n = 0;
					foreach($keywords as $keyword):
						$n++;
				?>
					<li><?=$keyword?></li>
				<?php
					endforeach
				?>
				</ul>
				<span hidden itemprop="author"><?=$blog_entry->author()?></span>
			</header>
			<div itemprop="articleSection">
				<?=$blog_entry->text()->kirbytext()?>
			</div>
		</article>
		<?php
			endif;
		endforeach;
		?>
	</section>
	<?php snippet('windows') ?>
</body>
</html>

<?php snippet('stats', array('param' => $page->uri())); ?>
