<!DOCTYPE html>
<html lang="en">
<head>
   <meta http-equiv="Content-Type" content="text/html" charset="utf-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <meta name="description" content="">
   <meta name="keywords" content="">
   <meta name="author" content="">

   <title>GoToSkool</title>

  <link href="<?php echo base_url('assets/css/bootstrap.min.css') ?>" rel="stylesheet">
  <link href="<?php echo base_url('assets/css/font-awesome.css') ?>" rel="stylesheet">
  <link href="<?php echo base_url('assets/css/custom.css') ?>" rel="stylesheet">

  <script src="//ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
  <script src="//ajax.googleapis.com/ajax/libs/jqueryui/1.8.18/jquery-ui.min.js"></script>
  <script src="<?php echo base_url('assets/js/bootstrap.min.js') ?>"></script>
  <script src="<?php echo base_url('assets/js/custom.js') ?>"></script>
  <script src="<?php echo base_url('assets/js/submitBtn.js') ?>"></script>
</head>
<body>

   <div class="navbar">
     <div class="navbar-inner">
      <img src="<?php echo base_url('assets/img/navbar-img.jpg') ?>" class="img-rounded pull-left">
       <a class="brand" href="<?php echo base_url('index.php/category/') ?>">GoToSkool</a>
       <ul class="nav">
         <li class="active"><a href="<?php echo base_url('index.php/category/') ?>">Home</a></li>
         <li><a href="<?php echo base_url('index.php/calendar/') ?>">Calendar</a></li>

           <ul class="nav">
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                Courses
                <b class="caret"></b>
              </a>
              <ul class="dropdown-menu">
                <li>
                  <a href="<?php echo base_url('index.php/category/view/1') ?>">Primary</a>
                </li>
                <li>
                  <a href="<?php echo base_url('index.php/category/view/2') ?>">Secondary</a>
                </li>
                <li>
                  <a href="<?php echo base_url('index.php/category/view/3') ?>">Tertiary</a>
                </li>
              </ul>
            </li>
          </ul>
       </ul>
     </div>
   </div>
