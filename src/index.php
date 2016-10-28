<?php include "getlang.php" ; ?>
<!DOCTYPE html>
<!--[if lt IE 7 ]> <html lang="en" class="no-js ie6"> <![endif]-->
<!--[if IE 7 ]>    <html lang="en" class="no-js ie7"> <![endif]-->
<!--[if IE 8 ]>    <html lang="en" class="no-js ie8"> <![endif]-->
<!--[if IE 9 ]>    <html lang="en" class="no-js ie9"> <![endif]-->
<!--[if (gt IE 9)|!(IE)]><!-->
<html lang="en" class="no-js" >
<!--<![endif]-->

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script>
    $(window).on('load', function() {
  // Preloader
  $('#status').fadeOut();
  $('#preloader').delay(150).fadeOut('slow');
  $('body').delay(350).css({ 'overflow': 'visible' });
});
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-85749536-1', 'auto');
  ga('send', 'pageview');

</script>
    <meta name="msapplication-config" content="browserconfig.xml" />

    <meta name="keywords" content="Developer, junior, PHP, ,JavaScript, Portfolio, Web, HTML&CSS, work, programista, praca, staż" />
    <meta name="author" content="VASYL DEMIANIUK" />
  <!-- Open Graph data -->
<meta property="fb:app_id" content="359934191012288" />
<meta property="og:title" content="Vasyl Demianiuk - My PORTFOLIO" />
<meta property="og:type" content="website" />
<meta property="og:url" content="https://vasyldemianiuk.com/" />
<meta property="og:image" content="https://vasyldemianiuk.com/img/port.jpg" />
<meta property="og:image:type" content="image/jpeg" />
<meta property="og:image:width" content="200" />
<meta property="og:image:height" content="300" />
<meta property="og:description" content="Cześć! Jestem początkującym web developerem. Uczę się technologii front-endu od prawie 2 lat, terz mam pobierznie interesuję się back-endem i administracją sieci informatycznych." />

    <!--[if lt IE 9]>
        <script src="//css3-mediaqueries-js.googlecode.com/svn/trunk/css3-mediaqueries.js"></script>
      <![endif]-->
      <!--[if IE]><link rel="shortcut icon" href="favicon.ico"><![endif]-->

      <!-- Reloading firefox fix hidden problem -->
      <link rel="shortcut icon" type="image/png" href="/favicon.ico"/>
        <link rel="shortcut icon" type="image/png" href="//vasyldemianiuk.com/favicon.ico"/>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link type="text/plain" rel="author" href="//vasyldemianiuk.com/humans.txt" />
    <link rel="apple-touch-icon" sizes="180x180" href="/apple-touch-icon.png">
    <link rel="icon" type="image/png" href="/favicon-32x32.png" sizes="32x32">
    <link rel="icon" type="image/png" href="/favicon-16x16.png" sizes="16x16">
    <link rel="manifest" href="/manifest.json">
    <meta name="theme-color" content="#d9d9d9">
     <title>Vasyl Demianiuk - My PORTFOLIO</title>
    <link href='//fonts.googleapis.com/css?family=Patua+One' rel='stylesheet' type='text/css'>

    <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/main.css">
</head>

<body>
<script>
  window.fbAsyncInit = function() {
    FB.init({
      appId      : '359934191012288',
      xfbml      : true,
      version    : 'v2.8'
    });
  };

  (function(d, s, id){
     var js, fjs = d.getElementsByTagName(s)[0];
     if (d.getElementById(id)) {return;}
     js = d.createElement(s); js.id = id;
     js.src = "//connect.facebook.net/en_US/sdk.js";
     fjs.parentNode.insertBefore(js, fjs);
   }(document, 'script', 'facebook-jssdk'));
</script>
    <!--[if lt IE 7]>
         <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->
    <!--[if lt IE 8]>
         <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->
    <!--[if lte IE 9]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->

    <noscript><?php echo __("Your browser does not support JavaScript!To turn it on use <a href='http://enable-javascript.com/'>this</a> instuction"); ?></noscript>
    <!-- Preloader -->
<div id="preloader">
    <div id="status">&nbsp;</div>
</div>

    <!-- Careful with white spaces -->
    //= template/home.php
    //= template/header.php
    //= template/about.php
    //= template/skills.php
    //= template/works.php
    //= template/get-in-touch.php
    //= template/footer.php
    <!--  Footer libs -->
    <script src="js/main.js"></script>
          </body>

</html>
