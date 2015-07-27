<?php
$lang = $site->language()->code();
$other_lang = $lang == 'en'?'de':'en';
$blog_entry = $page;
?>
<!DOCTYPE html>
<html lang="<?=$lang?>">
<head>
	<title><?=$site->title()?> – <?=$page->title()?></title>
	<meta charset="utf-8">
	<meta name="keywords" content="<?=$blog_entry->keywords()?>">
	<meta property="og:description" name="description" content="<?=$blog_entry->text()->excerpt(40,'words')?>">
	<meta property="og:title" content="<?=$blog_entry->title()?>">
	<meta property="og:site_name" content="<?=$site->title()?>">
	<meta property="og:type" content="article">
	<meta property="article:published_time" content="<?=$blog_entry->date('Y-m-d')?>">
	<meta property="og:image" content="<?=$site->url?>/assets/images/fb_share_<?=$lang?>.jpg">
	<meta property="og:locale" content="<?=$lang==='en'?'en_gb':'de_de'?>">
	<meta property="og:locale:alternate" content="<?=$lang==='en'?'de_de':'en_gb'?>">
	<script type="text/javascript" src="<?=$site->url?>/assets/javascript/script-min.js" async></script>
	<link rel="stylesheet" type="text/css" href="<?=$site->url?>/assets/css/style.css">
	<link rel="alternate" href="<?=$page->url($other_lang)?>" hreflang="<?=($lang == 'en')?'de':'en'?>">
	<meta content="initial-scale=1.0, width=device-width, maximum-scale=1.0" name="viewport">
</head>
<body>
	<?php snippet('header') ?>
	<section data-id="weblog">
		<h1 hidden>Weblog</h1>
		<article id="<?=$blog_entry->uid()?>" data-title="<?=$blog_entry->title()->html()?>" itemscope itemtype="http://schema.org/Article">
			<header>
				<h1 itemprop="name"><?=$blog_entry->title()->html()?></h1>
				<time datetime="<?=$blog_entry->date('Y-m-d')?>" itemprop="datePublished" content="<?=$blog_entry->date('Y-m-d')?>"><?=$blog_entry->date('Y/m/d')?></time>
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
	</section>
	<?php snippet('windows') ?>
</body>
</html>

<?php snippet('stats', array('param' => $page->uri())); ?>
