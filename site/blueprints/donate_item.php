<?php if(!defined('KIRBY')) exit ?>

title: Donate Item
pages: false
files: true
fields:
  title:
    label: Title
    type:  text
  price:
    label: Price
    type:  number
    validate: num
  link:
  	label: Link
  	type:  url
