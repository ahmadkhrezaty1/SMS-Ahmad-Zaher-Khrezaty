<!DOCTYPE html>
<html lang="en">

<head>
  <?php if (isset($title)) $getTitle = $title; else $getTitle = '' ?>
  <title><?php echo $getTitle ?></title>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" name="viewport" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  
  <!-- Bootstrap core CSS     -->
  <link href="<?php echo base_url() ?>assets1/css/bootstrap.min.css" rel="stylesheet" />
  <?php if(user()->dir == 'rtl'){ ?>
    <link href="<?php echo base_url() ?>assets1/css/bootstrap-rtl.css" rel="stylesheet" />
  <?php } ?>
  <!--  Material Dashboard CSS    -->
  <link href="<?php echo base_url() ?>assets1/css/material-dashboard.css?v=1.3.0" rel="stylesheet"/>
  <!--     Fonts and icons     -->
  <link href="<?php echo base_url() ?>assets1/css/font-awesome.min.css" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets1/css/google-font.css" />
  <link href="<?php echo base_url() ?>assets1/css/google-font2.css"
      rel="stylesheet">
  <style type="text/css">
      .form-group.is-focused .form-control{
        background-image: linear-gradient(#e91e63, #e91e63), linear-gradient(#D2D2D2, #D2D2D2);
      }
      .btn-group.bootstrap-select.show-tick.open .select-with-transition{
        background-image: linear-gradient(#e91e63, #e91e63), linear-gradient(#D2D2D2, #D2D2D2) !important;
      }
      .dropdown-menu li a:hover, .dropdown-menu li a:focus, .dropdown-menu li a:active {
          background-color: #e91e63;
          color: #FFFFFF;
      }
      .btn.btn-primary, .btn.btn-primary:hover, .btn.btn-primary:focus, .btn.btn-primary:active, .btn.btn-primary.active, .btn.btn-primary:active:focus, .btn.btn-primary:active:hover, .btn.btn-primary.active:focus, .btn.btn-primary.active:hover, .open > .btn.btn-primary.dropdown-toggle, .open > .btn.btn-primary.dropdown-toggle:focus, .open > .btn.btn-primary.dropdown-toggle:hover, .navbar .navbar-nav > li > a.btn.btn-primary, .navbar .navbar-nav > li > a.btn.btn-primary:hover, .navbar .navbar-nav > li > a.btn.btn-primary:focus, .navbar .navbar-nav > li > a.btn.btn-primary:active, .navbar .navbar-nav > li > a.btn.btn-primary.active, .navbar .navbar-nav > li > a.btn.btn-primary:active:focus, .navbar .navbar-nav > li > a.btn.btn-primary:active:hover, .navbar .navbar-nav > li > a.btn.btn-primary.active:focus, .navbar .navbar-nav > li > a.btn.btn-primary.active:hover, .open > .navbar .navbar-nav > li > a.btn.btn-primary.dropdown-toggle, .open > .navbar .navbar-nav > li > a.btn.btn-primary.dropdown-toggle:focus, .open > .navbar .navbar-nav > li > a.btn.btn-primary.dropdown-toggle:hover {
            background-color: #e91e63;
            color: #FFFFFF;
        }
        .dropdown-divider {
            height: 0;
            margin: 0.5rem 0;
            overflow: hidden;
            border-top: 1px solid #e9ecef;
        }
        .form-group .form-control.valid:focus {
            background-image: linear-gradient(#e91e63, #e91e63), linear-gradient(#D2D2D2, #D2D2D2);
        }
  </style>
  
</head>