<?php
  $USER = 'DB_USER';
  $PASS = 'DB_PASS';
  $DB = 'DB_NAME';
  $ROOT = 'ROOT DOMAIN'; //For example, da.s

  global $config;
  $config = compact('USER', 'PASS', 'DB', 'ROOT');