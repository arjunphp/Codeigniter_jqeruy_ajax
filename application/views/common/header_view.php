<html>
<head>
	<title>Welcome to CodeIgniter / JQuery / Ajax page load Demo</title>
</head>
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
 <script> 
    // using JQUERY's ready method to know when all dom elements are rendered
    $( document ).ready(function () {

     // show ajax loader
      $(document).ajaxStart(function () {
          $("#loading").removeClass('hide');
      }).ajaxStop(function () {
          $("#loading").addClass('hide');
      });
      // set an on click on the button
      $(".ajaxLink").click(function (event) {
      	// prevent default behaviour
      	  event.preventDefault();
      	  var url = $(this).attr('href');
       // get the page if clicked via an ajax get queury
        // see the code in the controller Welcome.php
        $.get(url, function (data) {
          // update the div#response with the data
          $("#response").html(data);
        });

        //to change the browser URL to the given link location
        if(url!=window.location){
           window.history.pushState({path:url},'about Us',url);
        }

      });
    });
  </script>
  <style type="text/css">.hide { display: none; }</style>
<body>

<header>
    <h1>Welcome to CodeIgniter / JQuery / Ajax page load Demo</h1>
</header>

<hr/>

<nav>
    <ul>
        <li><?php echo anchor('welcome/page/about_us','About Us',array('class' => 'ajaxLink')); ?></li>
        <li><?php echo anchor('welcome/page/contact_us','contact Us',array('class' => 'ajaxLink')); ?></li>
    </ul>
</nav>

<hr/>
<?php echo img(array('src' => '/img/ajax-loader.gif','class' => 'hide','id' => 'loading')); ?>
<div id="response"> 
