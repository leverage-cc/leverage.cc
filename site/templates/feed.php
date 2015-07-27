<?php 
  header::type('text/xml');
  echo '<?xml version="1.0" encoding="utf-8"?>';
  $items = page('blog')->children()->visible()->flip()->limit(20);
?>
<rss version="2.0" xmlns:atom="http://www.w3.org/2005/Atom">
  <channel>
    <title><?=$site->title()?></title>
    <link><?=$site->homePage()->url()?></link>
    <lastBuildDate><?= $items->first()->date('r','date') ?></lastBuildDate>
    <atom:link href="<?=url('rss')?>" rel="self" type="application/rss+xml" />
    <description><?=$site->description()->xml()?></description>
    <?php foreach($items as $item): ?>
    <item>
      <title><?= xml($item->title()) ?></title>
      <link><?= xml($item->url()) ?></link>
      <guid><?= xml($item->url()) ?></guid>
      <pubDate><?= $item->date('r', 'date') ?></pubDate>
      <description><![CDATA[<?= $item->text()->kirbytext() ?>]]></description>
    </item>
    <?php endforeach ?>
  </channel>
</rss>
