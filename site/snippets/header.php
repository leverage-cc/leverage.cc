<?php
  $other_lang = $site->language() == 'en'?'de':'en';
?>
<header data-id="mainheader">
  <?php if(!$page->isHomePage()): ?><a href="<?=$site->homePage()->url()?>" class="title"><?php endif ?>
  <h1><?=$site->title()->html()?></h1>
  <?php if(!$page->isHomePage()): ?></a><?php endif ?>
  <p><?=$site->homePage()->text()->html()?></p>
  <nav>
  <?php foreach ($pages->visible() as $page) : ?>
    <a href="#!<?=$page->uid()?>"><?=$page->title()->html()?></a><br>
  <?php endforeach ?>
    <a href="https://github.com/leverage-cc" class="social github" title="GitHub"><img src="<?=url('assets/images/github.svg')?>" alt="GitHub"></a>
    <a href="https://twitter.com/leverage_cc" class="social twitter" title="Twitter"><img src="<?=url('assets/images/twitter.svg')?>" alt="Twitter"></a><br>
    <a href="<?=$site->page()->url($other_lang)?>" class="lang"><?=$other_lang?></a><br>
    </nav>
</header>
