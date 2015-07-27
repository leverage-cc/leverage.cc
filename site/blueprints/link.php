<?php if(!defined('KIRBY')) exit ?>

title: Link
pages: false
files: false
fields:
  title:
    label: Title
    type:  text
    width: 3/4
  language:
    label: Language
    type: select
    options:
      de: de
      en: en
      de/en: de/en
    width: 1/4
  subtitle:
    label: Subtitle
    type:  text
  link:
    label: Link
    type: url
  keywords:
    label: Tags
    type: tags
    index: siblings
