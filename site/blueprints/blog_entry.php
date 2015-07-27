<?php if(!defined('KIRBY')) exit ?>

title: Blog Article
pages: false
files: true
fields:
  title:
    label: Title
    type:  text
  date:
  	label: Date
  	type: date
  	default: today
  	width: 1/2
  	required: true
  author:
  	label: Author
  	type: user
  	width: 1/2
  	required: true
  keywords: 
  	label: Keywords
  	type: tags
  	required: true
  text:
    label: Text
    type:  textarea
  	required: true
