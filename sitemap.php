<?php 
define('DS', DIRECTORY_SEPARATOR);
require(__DIR__ . DS . 'kirby' . DS . 'bootstrap.php');
require(__DIR__ . DS . 'site' . DS . 'config/config.php');
$site = kirby()->site();
$pages = kirby()->site()->pages();
header('Content-type: text/xml; charset="utf-8"');
echo '<?xml version="1.0" encoding="utf-8"?>';
?>

<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9" xmlns:xhtml="http://www.w3.org/1999/xhtml">
  <url>
    <loc>https://leverage.cc</loc>
    <xhtml:link xmlns:xhtml="http://www.w3.org/1999/xhtml" rel="alternate" hreflang="de" href="https://leverage.cc/de/" />
  </url>
<?php foreach($pages->visible() as $page): ?>
  <url>
    <loc>https://leverage.cc/#!<?=$page->uid()?></loc>
    <xhtml:link xmlns:xhtml="http://www.w3.org/1999/xhtml" rel="alternate" hreflang="de" href="https://leverage.cc/de/#!<?=$page->uid()?>" />
  </url>
<?php endforeach ?>  
<?php foreach($pages->find('blog')->children()->visible()->flip() as $page): ?>
  <url>
    <loc>https://leverage.cc/blog/<?=$page->uid()?></loc>
    <xhtml:link xmlns:xhtml="http://www.w3.org/1999/xhtml" rel="alternate" hreflang="de" href="https://leverage.cc/de/blog/<?=$page->uid()?>" />
  </url>
<?php endforeach ?>  
</urlset>