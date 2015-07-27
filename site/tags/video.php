<?php

kirbytext::$tags['video'] = array(
  'attr' => array(
    'autoplay',
    'loop'
  ),
  'html' => function($tag) {
  	$autoplay = ($tag->attr('autoplay') == 'true')?' autoplay':'';
  	$loop = ($tag->attr('loop') == 'true')?' loop':'';
  	$url = $tag->page()->videos()->find($tag->attr('video'))->url();
    return '<figure><video '.$autoplay.$loop.' src="'.$url.'"></video></figure>';
  }
);
