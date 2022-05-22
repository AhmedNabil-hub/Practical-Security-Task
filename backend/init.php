<?php

  error_reporting(0);
  
  // paths
  $layouts  = "./frontend/layouts/";
  $images   = "./frontend/images/";
  $fonts    = "./frontend/fonts/";
  $libs     = "./frontend/libs/";
  $css      = "./frontend/css/";
  $js       = "./frontend/js/";

  if(!isset($pageTitle)) {
    $pageTitle = 'Book Store';
  }

  include './backend/db_connect.php';
  include './backend/helpers.php';
  include $layouts . 'header.php';
