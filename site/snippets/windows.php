<section data-id="about" class="window" hidden>
  <?php
    $about = $site->find('about');
  ?>
  <h1 hidden><?=$about->title()->html()?></h1>
  <div class="cite">
    <?=$about->cite()->kirbytext()?>
  </div>
  <?php if ($about->children()->visible()->count() > 1) : ?>
  <nav class="subnav">
  <?php
    $i = 0;
    foreach($about->children()->visible() as $about_sub) :
  ?>
    <a href="#!<?=$about_sub->uri()?>"<?=($i === 0)?' class="active"':null?>><?=$about_sub->title()->html()?></a>
  <?php
    $i++;
    endforeach
  ?>
  </nav>
  <?php endif ?>
  <div class="sections">
  <?php foreach($about->children()->visible() as $about_sub) { ?>
    <article data-id="<?=$about_sub->uri()?>">
      <h1 hidden><?=$about->title()->html()?></h1>
      <?=$about_sub->text()->kirbytext()?>
    </article>
  <?php } ?>
  </div>
</section>
<section data-id="donate" class="window" hidden>
  <?php
    $donate = $site->find('donate');
  ?>
  <div class="text">
    <h1><?=$donate->subtitle()->html()?></h1>
    <div class="description">
      <?=$donate->text()->kirbytext()?>
    </div>
    <h2><?=$donate->bank_account_title()->html()?></h2>
    <div class="bank_info">
      <?=$donate->bank_account()->kirbytext()?>
      <small><?=$donate->bank_small_text()->html()?></small>
    </div>
    <div class="buttons">
      <a href="<?=$donate->paypal_url()?>" class="button paypal">Donate by PayPal</a><br>
      <small><?=$donate->button_info()->html()?></small>
    </div>
  </div>
  <?php
    $donate_items = $donate->children()->visible()->sortBy('price','desc');
    $sum = 0;
    foreach ($donate_items as $donate_item) {
      $sum += html($donate_item->price());
    }
    $dec_point = ',';
    $thousands_sep = '.';
    if ($site->language() == 'en') {
      $dec_point = '.';
      $thousands_sep = ',';
    }
    $sum = number_format($sum,0,$dec_point,$thousands_sep);
    $donated = number_format(html($donate->donated()),0,$dec_point,$thousands_sep);
  ?>
  <div class="donation_meter" data-sum="<?=$sum?>" data-donated="<?=$donated?>">
    <strong><?=$sum?> €</strong>
    <ul>
    <?php
      foreach ($donate_items as $donate_item) :
        $title = $donate_item->title();
        $price = $donate_item->price();
        $link = $donate_item->link();
    ?>
      <li>
        <em><?=number_format(html($price),0,$dec_point,$thousands_sep)?> €</em>
        <?=!$link->isEmpty() ? '<a href="'.$link.'">' : null ?>
        <?=$title->html()?>
        <?=!$link->isEmpty() ? '</a>' : null ?>
      </li>
    <?php
      endforeach
    ?>
    </ul>
    <div class="donated">
      <strong><?=$donated?> €</strong>
    </div>
  </div>
</section>
<section data-id="links" class="window" hidden>
  <?php
    $links = $site->find('links');
    $links_items = $links->children();
  ?>
  <ul>
  <?php
    foreach ($links_items as $link_item) :
  ?>
    <li>
      <a href="<?=$link_item->link()?>">
        <ul class="keywords">
        <?php
          $keywords = a::sort($link_item->keywords()->split(','),null,'asc');
          $n = 0;
          foreach($keywords as $keyword):
            $n++;
        ?>
          <li>
            <?=$keyword?>
          </li>
        <?php
          endforeach
        ?>
        </ul>
        <span class="language">
          <?=$link_item->language()?>
        </span>
        <strong><?=$link_item->title()?></strong>
        <?=$link_item->subtitle()?>
      </a>
    </li>
    <?php
      endforeach
    ?>
  </ul>
</section>
