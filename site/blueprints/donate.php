<?php if(!defined('KIRBY')) exit ?>

title: Page
pages: donate_item
files: true
fields:
  title:
    label: Title
    type:  text
  subtitle:
    label: Subtitle
    type:  text
  text:
    label: Text
    type:  textarea
  donated:
    label: Donated
    type:  number
    validate: num
  paypal_url:
    label: PayPal URL
    type: url
  flattr_url:
    label: Flattr URL
    type: url
  button_info:
    label: Button Info
    type: textarea
  bank_account_title:
    label: Bank Account Title
    type: text
  bank_account:
    label: Bank Account
    type: textarea
  bank_small_text:
    label: Bank Small Text
    type: textarea
