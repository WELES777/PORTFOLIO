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
    <section id="home">
    
     <!--  Language bar -->
    <!-- Not working -->
       <div class="bfh-selectbox bfh-languages"  data-available="en_US,pl_PL" data-flags="true" data-blank="false">
        <input type="hidden" value="">
        <a class="bfh-selectbox-toggle" role="button" data-toggle="bfh-selectbox" href="#">
         <span class="bfh-selectbox-option input-medium" data-option=""></span>
         <b class="caret"></b>
        </a>
        <div class="bfh-selectbox-options">
         <div role="listbox">
          <ul role="option">
          <li><a href="/index.php?lang=pl_PL" data-option="pl_PL"><i class="glyphicon bfh-flag-PL"></i></a>
    
          </li>
           <li><a href="/index.php?lang=en_US" data-option="en_US"><i class="glyphicon bfh-flag-US"></i></a>
    
          </li>
                </ul>
         </div>
        </div>
    
       </div>
    
    
     <div class="container">
      <div class="row">
       <!-- Exit-intent pop-up -->
       <div id="modal_form">
        <span id="modal_close"><i class="fa fa-times-circle" aria-hidden="true"></i></span>
        <form class="form-horizontal ajax-contactx">
         <p><?php echo __("Please leave opinion about this website portfolio") ?></p>
         <div class="form-group" data-aos="zoom-out-up">
          <input type="text" class="form-control" id="op-name" name="fname" placeholder="<?php echo __("Your name") ?>">
         </div>
         <div class="form-group" data-aos="zoom-out-up">
          <input type="text" class="form-control" id="op-email" name="position" placeholder="<?php echo __("Your position") ?>">
         </div>
         <div class="form-group" data-aos="zoom-out-up">
          <textarea rows="2" class="form-control" id="op-message" name="opinion" placeholder="<?php echo __("Your opinion") ?>*" required ></textarea>
         </div>
         <div class="form-group" data-aos="zoom-out-up">
          <button class="btn btn-default sub-btn send-button" id="somebutx"><i class="fa fa-envelope" aria-hidden="true"></i> <?php echo __("SEND") ?>
          </button>
          <button class="btn btn-default sub-btn" id="load_op" ><img src="img/loaders.gif"/ >
          </button>
          <div class="ui-widget form-messages">
           <div class=" ui-corner-all ">
            <p>
             <!-- <span class="ui-icon ui-icon-check" style="width: 20px; height: 20px; z-index: 9999; display: inline-block"></span>-->
            </p>
           </div>
          </div>
         </div>
        </form>
       </div>
       <div id="overlay"></div>
       <div class="col-lg-12 ">
        <div class="home" data-aos="zoom-in" data-aos-delay="600">
         <p><?php echo __("Welcome to my") ?>
           </br>
          <span>
                                       Portfolio
                            </span>
         </p>
        </div>
        <a data-scroll href="#about">
         <div class="scroll-down">
          <span>
                    <i class="fa fa-angle-down fa-2x"></i>
                    <i class="fa fa-angle-down fa-2x"></i>
                       </span>
         </div>
        </a>
       </div>
      </div>
     </div>
    </section>
    <!-- <header id="header">
        <div class="container ">
            <div class="row">
                <div class="col-lg-2 col-md-2 ">
                    <div class="logo" data-aos="zoom-in-right" data-aos-delay="400"><img alt="logo" src="img/logo.svg"/></div>
                </div>
                <div class="col-lg-10 col-md-10">
                    <ul class="header-title ">
                        <li data-aos="zoom-in-left" data-aos-delay="600">
                            <a data-scroll href="#home" >
                            Home
                            </a>
                            
                        </li>
                        <li data-aos="zoom-in-left" data-aos-delay="500">
                            <a data-scroll href="#about" >
                            About
                            </a>
                            
                        </li>
                        <li data-aos="zoom-in-left" data-aos-delay="400">
                            <a data-scroll href="#skills" >
                            Skills
                            </a>
                            
                        </li>
                        <li data-aos="zoom-in-left" data-aos-delay="300">
                            <a data-scroll href="#works" >
                            Portfolio
                            </a>
                            
                        </li>
                        <li data-aos="zoom-in-left" data-aos-delay="200">
                            <a data-scroll href="#contact" >
                             Contact me
                            </a>
                           
                        </li>
                        <li data-aos="zoom-in-left" data-aos-delay="100">
                            <a data-scroll href="#ftitle" >
                            Follow me
                            </a>
                            
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </header>
     -->
     <header>
    <nav class="navbar navbar-default">
     <div class="container">
     <div class="col-lg-2 col-md-2 ">
      <div class="navbar-header">
       <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#menu-bar" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
       </button>
       <a class="navbar-brand" href="#">
        <div class="logo" data-aos="zoom-in-right" data-aos-delay="400"><img alt="logo" src="img/logo.svg" /></div>
       </a>
      </div>
      </div>
      <div class="col-lg-10 col-md-10">
      <div class="collapse navbar-collapse" id="menu-bar">
       <ul class="nav navbar-nav">
        <li data-aos="zoom-in-left" data-aos-delay="600">
         <a data-scroll href="#home">
                            <?php echo __("Home") ?>
                            </a>
        </li>
        <li data-aos="zoom-in-left" data-aos-delay="500">
         <a data-scroll href="#about">
                            <?php echo __("About") ?>
                            </a>
        </li>
        <li data-aos="zoom-in-left" data-aos-delay="400">
         <a data-scroll href="#skills">
                            <?php echo __("Skills") ?>
                            </a>
        </li>
        <li data-aos="zoom-in-left" data-aos-delay="300">
         <a data-scroll href="#works">
                            <?php echo __("Portfolio") ?>
                            </a>
        </li>
        <li data-aos="zoom-in-left" data-aos-delay="200">
         <a data-scroll href="#contact">
                             <?php echo __("Contact me") ?>
                            </a>
        </li>
        <li data-aos="zoom-in-left" data-aos-delay="100">
         <a data-scroll href="#ftitle">
                            <?php echo __("Follow me") ?>
                            </a>
        </li>
       </ul>
      </div>
      </div>
     </div>
    </nav>
    </header>
    <section id="about">
     <div class="container">
      <div class="row">
       <div class="col-sm-12 col-lg-12  ">
        <div class="about">
         <p data-aos="zoom-in-down">
          <?php echo __("ABOUT<span> ME</span>") ?>
         </p>
         <p data-aos="zoom-in-down" data-aos-delay="400">
          <small>
                            <?php echo __("Let me introduce myself") ?>
                        </small>
         </p>
         <div class="col-xs-12 col-sm-9 col-lg-9 ">
          <blockquote class="blockquote-reverse img-responsive">
           <p data-aos="fade-right">
            <?php echo __("Hello there, I'm a beginner web developer. I'm learning front-end development since the beginning of 2015, but my programming journey begun much earlier in 2011 with C/C++ programing languages. New experiences and challenges are my thing. I love spend time on learning new technologies and inplementing them in my work. As regards my interests, my favorites are recording audio books, translating, athletics and paragliding.") ?>
           </p> 
           <p data-aos="fade-right"><?php echo __("Currently I'm completing my masters degree in Czestochowa University of Technology, Institute of Computer Science, and looking for internship or/and full stack job as Junior Front-End Web Developer & Junior JavaScript Developer.") ?></p>
           <span data-aos="fade-right"> <?php echo __("I'm looking for you, you're looking for me, let's <a data-toggle='modal' data-target='#modal-wind' href='#''>find</a> each other.") ?><br/>
                    <?php echo __("My credo:") ?></span>
           <footer data-aos="fade-right" data-aos-anchor-placement="bottom-bottom">
            <?php echo __("Always code as if the guy who ends up maintaining your code will be a violent psychopath who knows where you live.") ?>
           </footer>
           <p>
            </br>
           </p>
          </blockquote>
         </div>
         <div class="col-xs-12 col-sm-3 col-lg-3 ">
          <img class="img-thumbnail" src="/img/face.png" width="200px" data-aos="fade-left" />
          <div class="details">
           <dl class="dl-horizontal">
            <dt data-aos="fade-up">
             <span>
                                        <?php echo __("Name:") ?>
                                    </span>
            </dt>
            <dd data-aos="fade-up">
             <?php echo __("Vasyl Demianiuk") ?>
             <dt data-aos="fade-up" data-aos-anchor-placement="bottom-bottom">
              <span>
                                            <?php echo __("Age:") ?>
                                        </span>
             </dt>
             <dd data-aos="fade-up" data-aos-anchor-placement="bottom-bottom">
              <?php echo __("23 years") ?>
              <dt data-aos="fade-up" data-aos-anchor-placement="bottom-bottom">
               <span>
                                                <?php echo __("Location:") ?>
                                            </span>
              </dt>
              <dd data-aos="fade-up" data-aos-anchor-placement="bottom-bottom">
               <?php echo __("Chestochowa, Poland, Earth") ?>
               <dt data-aos="fade-up" data-aos-anchor-placement="bottom-bottom">
                <span>
                                                    <?php echo __("Status:") ?>
                                                </span>
               </dt>
               <dd data-aos="fade-up" data-aos-anchor-placement="bottom-bottom">
                <?php echo __("Master") ?>
               </dd>
              </dd>
             </dd>
            </dd>
           </dl>
          </div>
         </div>
        </div>
        <div class="modal fade" id="modal-wind" tabindex="-1" role="dialog" aria-labelledby="top-label" aria-hidden="true">
         <div class="modal-dialog">
          <div class="modal-content">
           <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title" id="top-label"><?php echo __("CONTACT") ?></h4>
           </div>
           <div class="modal-body">
            <form class="ajax-contacts">
             <div class="form-group">
              <input type="text" class="form-control" name="name" id="fin-name" placeholder="<?php echo __("Your name") ?>" required>
             </div>
             <div class="form-group">
              <input type="email" class="form-control" name="email" id="fin-email" placeholder="<?php echo __("Your email") ?>" required>
             </div>
             <div class="form-group">
              <textarea class="form-control" name="message" id="fin-message" placeholder="<?php echo __("Drop me a line") ?>" rows="5" required></textarea>
             </div>
            </form>
           </div>
           <div class="modal-footer">
            <div class="ui-widget form-messagess">
             <div class="tempos ui-corner-all">
              <p>
               <!-- <span class="ui-icon ui-icon-check" style="width: 20px; height: 20px; z-index: 9999; display: inline-block"></span>-->
              </p>
             </div>
            </div>
            <button type="submit" class="btn btn-primary " id="somebuts"><?php echo __("SEND") ?></button>
           </div>
          </div>
         </div>
        </div>
       </div>
      </div>
     </div>
     </div>
    </section>
    <section id="skills">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-lg-12 col-sm-12 ">
                    <div class="skills" >
    
                        <p  data-aos="zoom-in-down" >
                            <?php echo __("My <span>Skills</span>") ?>
    
                        </p>
                        <p  data-aos="zoom-in-down" data-aos-delay="400">
                        <small >
                           <?php echo __("Everything is relative") ?>
                        </small>
                    </p>
                        <div class=" col-xs-6 col-lg-6 col-sm-6">
                            <ul>
                                <li  data-aos="zoom-in-down">
                                    <img alt="tech-icon" class="media-object" height="50px" src="/img/css3.png" /><div class="pBar" data-from="0" data-to="80"></div>
                                </li>
                                <li  data-aos="zoom-in-down">
                                    <img alt="tech-icon" class="media-object" height="50px" src="/img/html5.png" /><div class="pBar" data-from="0" data-to="90"></div>
                                </li>
                                <li  data-aos="zoom-in-down">
                                    <img alt="tech-icon" class="media-object" height="50px" src="/img/javascript.png" /><div class="pBar" data-from="0" data-to="30"></div>
                                </li>
                                <li  data-aos="zoom-in-down">
                                    <img alt="tech-icon" class="media-object" height="50px" src="/img/photoshop.png" /><div class="pBar" data-from="0" data-to="10"></div>
                                </li>
                            </ul>
                        </div>
                        <div class="col-xs-6 col-lg-6 col-sm-6">
                            <ul>
                                <li  data-aos="zoom-in-down">
                                    <img alt="tech-icon" class="media-object" height="50px" src="/img/mysql.png" /><div class="pBar" data-from="0" data-to="60"></div>
                                </li>
                                <li  data-aos="zoom-in-down">
                                    <img alt="tech-icon" class="media-object" height="50px" src="/img/php.png" /><div class="pBar" data-from="0" data-to="20"></div>
                                </li>
                                <li  data-aos="zoom-in-down">
                                    <img alt="tech-icon" class="media-object" height="50px" src="/img/git.png" /><div class="pBar" data-from="0" data-to="30"></div>
                                </li>
                                <li  data-aos="zoom-in-down">
                                    <img alt="tech-icon" class="media-object" height="50px"  src="/img/RWD.gif" /><div class="pBar" data-from="0" data-to="40"></div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section id="works">
     <div class="container">
      <div class="row">
       <div class="col-lg-12 ">
        <div class="works">
         <p data-aos="zoom-in-down"><?php echo __("My <span>Works</span>") ?></p>
         <p data-aos="zoom-in-down" data-aos-delay="400">
          <small>
                           <?php echo __("There is no such thing as a boring project. There are only boring executions") ?>
                        </small>
         </p>
         <!-- Preview -->
         <div class="preview-icon">
          <span id="icon1-content">
            <img src="img/scratch1.png" height='400'  />
        </span>
          <span id="icon2-content">
            <img src="img/scratch2.png" width='300'  />
        </span>
          <span id="icon3-content">
            <img src="img/scratch3.png" height='400' />
        </span>
          <span id="icon4-content">
            <img src="img/scratch4.png" height='500'/>
        </span>
          <span id="icon5-content">
            <img src="img/scratch5.png" height='400' />
        </span>
         </div>
    
         <div class=" col-sm-4 col-md-4 col-lg-4" data-aos="fade-right">
          <div class="photo-item">
           <img src="img/fon1.jpg" alt="img01" />
           <div class="after">
            <span><?php echo __("Advertising Park") ?></span>
            <a class="tooltip-custom disabled" data-tooltip-content="#icon1-content"><i class="fa fa-eye" aria-hidden="true" ></i></a>
            <a href="catalog/Park" target="_blank"><i class="fa fa-external-link" aria-hidden="true"></i></a>
            <a href="https://github.com/WELES777/Advertising_park.git" target="_blank"><i class="fa fa-github" aria-hidden="true"></i></a>
           </div>
          </div>
         </div>
         <div class=" col-sm-4 col-md-4 col-lg-4" data-aos="fade-down">
          <div class="photo-item">
           <img src="img/fon2.jpg" alt="img02" />
           <div class="after">
            <span><?php echo __("Clothes shop") ?></span>
            <a class="tooltip-custom disabled" data-tooltip-content="#icon2-content"><i class="fa fa-eye" aria-hidden="true"></i></a>
            <a href="catalog\Clothes_shop" target="_blank"><i class="fa fa-external-link" aria-hidden="true"></i></a>
            <a href= "https://github.com/WELES777/Clothes_shop.git" target="_blank"><i class="fa fa-github" aria-hidden="true"></i></a>
           </div>
          </div>
         </div>
    
         <div class=" col-sm-4 col-md-4 col-lg-4" data-aos="fade-left">
          <div class="photo-item">
           <img src="img/fon3.jpg" alt="img03" />
           <div class="after">
            <span><?php echo __("Computer Shop") ?></span>
            <a class="tooltip-custom disabled" data-tooltip-content="#icon3-content"><i class="fa fa-eye" aria-hidden="true"></i></a>
            <a href="catalog\Computer_comp" target="_blank"><i class="fa fa-external-link" aria-hidden="true"></i></a>
            <a href="https://github.com/WELES777/Computer_comp.git" target="_blank"><i class="fa fa-github" aria-hidden="true"></i></a>
           </div>
          </div>
         </div>
         <div class=" col-sm-4 col-md-4 col-lg-4" data-aos="fade-right">
          <div class="photo-item">
           <img src="img/fon4.jpg" alt="img04" />
           <div class="after">
            <span><?php echo __("Language Courses") ?></span>
            <a class="tooltip-custom disabled" data-tooltip-content="#icon4-content"><i class="fa fa-eye" aria-hidden="true"></i></a>
            <a href="catalog\LenKurs" target="_blank"><i class="fa fa-external-link" aria-hidden="true"></i></a>
            <a href="https://github.com/WELES777/LenKURS.git" target="_blank"><i class="fa fa-github" aria-hidden="true"></i></a>
           </div>
          </div>
         </div>
         <div class=" col-sm-4 col-md-4 col-lg-4" data-aos="fade-down">
          <div class="photo-item">
           <img src="img/fon5.jpg" alt="img05" />
           <div class="after">
            <span><?php echo __("Telecom Shop") ?></span>
            <a class="tooltip-custom disabled" data-tooltip-content="#icon5-content"><i class="fa fa-eye" aria-hidden="true"></i></a>
            <a href="catalog\Tel_shop" target="_blank"><i class="fa fa-external-link" aria-hidden="true"></i></a>
            <a href="https://github.com/WELES777/Tes_shop.git" target="_blank"><i class="fa fa-github" aria-hidden="true"></i></a>
           </div>
          </div>
         </div>
         <div class=" col-sm-4 col-md-4 col-lg-4" data-aos="fade-left">
          <div class="photo-item">
           <p class="more"><span><?php echo __("More...") ?> </span><i class="fa fa-angle-double-right" aria-hidden="true"></i>
           </p>
          </div>
         </div>
         <div class=" col-sm-12 col-md-12 col-lg-12">
          <p class="in-progress"><?php echo __("... working on it") ?></p>
         </div>
        </div>
       </div>
      </div>
     </div>
    </section>
    <section id="contact">
     <div class="container">
      <div class="row">
       <div class="col-lg-12 col-sm-12 "> 
        <div class="contact">
         <p data-aos="zoom-in-down"><?php echo __("Get <span>in touch</span>") ?></p>
         <p data-aos="zoom-in-down" data-aos-delay="400">
          <small> 
                            <?php echo __("Drop me a line") ?>
                        </small>
         </p> 
         <div class="col-lg-offset-1 col-lg-9 col-lg-offset-2 col-sm-offset-1 col-sm-9 col-sm-offset-2">
    
          <form class="form-horizontal ajax-contact"  >
           <div class="form-group" data-aos="zoom-out-up">
            <label for="name" class="col-sm-2 control-label"><?php echo __("Name") ?></label>
            <div class="col-sm-10">
             <input type="text" class="form-control" id="con-name" name="name" placeholder="<?php echo __("John Lennon") ?>" required>
            </div>
           </div>
           <div class="form-group" data-aos="zoom-out-up">
            <label for="email" class="col-sm-2 control-label"><?php echo __("Email") ?></label>
            <div class="col-sm-10">
             <input type="email" class="form-control" id="con-email" name="email" placeholder="<?php echo __("email@example.com") ?>" required>
            </div>
           </div>
           <div class="form-group" data-aos="zoom-out-up">
            <label for="message" class="col-sm-2 control-label"><?php echo __("Message") ?></label>
            <div class="col-sm-10">
             <textarea rows="10" class="form-control" id="con-message" name="message" placeholder="<?php echo __("Your message") ?>" required></textarea>
            </div>
           </div>
           <div class="form-group" data-aos="zoom-out-up">
            <div class="col-sm-offset-2 col-sm-10">
             <button  class="btn btn-default sub-btn " id="somebut"><i class="fa fa-envelope" aria-hidden="true"></i> <?php echo __("SEND") ?>
             </button>
             <div class="ui-widget form-messages" >
              <div class="tempo ui-corner-all " >
               <p>
                <!-- <span class="ui-icon ui-icon-check" style="width: 20px; height: 20px; z-index: 9999; display: inline-block"></span>-->
                
               </p>
              </div>
             </div>
            </div>
           </div>
          </form> 
    
         </div>
        </div>
       </div>
      </div>
     </div>
    </section>
    <section id="footer">
     <div class="container">
      <div class="row">
       <div class="col-lg-12 ">
        <div class="resume text-center">
         <div class="container">
          <div class="strip text-center" data-aos="zoom-in-down">
           <a><img src="img/down.png" alt=" " /></a>
          </div>
          <div class="down shake-little shake-constant shake-constant--hover " data-aos="zoom-in-down"><a href="https://drive.google.com/open?id=0B7xO-GUFarjwQnFSOG16bkpSM1E"  target="_blank" onclick="window.open('https://drive.google.com/open?id=0B7xO-GUFarjwT1ZITVFmOUNHcDg');"><?php echo __("Download My Resume") ?></a></div>
         </div>
        </div>
       </div>
      </div>
      <div class="row">
       <div class="col-lg-12 ">
        <div class="footer">
         <a href="#" id="scrollup"><img src="/img/back-to-top.png" /></a>
         <p id="ftitle" data-aos="zoom-in-down"><?php echo __("Follow me") ?></p>
         <ul class="social-links">
          <div class="col-xs-12">
           <li data-aos="zoom-in-right"><a href="https://www.facebook.com/profile.php?id=100004719167808" target="_blank"><i class="fa fa-facebook"></i><img src="/img/facebook.png" alt=""></a><span class="social-icon"></span></li>
           <li data-aos="zoom-in-right"><a href="https://twitter.com/W_E_L_E_S" target="_blank"><i class="fa fa-twitter"></i><img src="/img/twitter.png" alt=""></a><span class="social-icon"></span></li>
           <li data-aos="zoom-in-right"><a href="https://plus.google.com/u/0/104712600123873261020" target="_blank"><i class="fa fa-google-plus"></i><img src="/img/google-plus.png" alt=""></a><span class="social-icon"></span></li>
    
          </div>
          <div class="col-xs-12">
          <li data-aos="zoom-in-right"><a href="https://www.linkedin.com/in/vasyl-demianiuk-a6a300119?trk=hp-identity-name" target="_blank"><i class="fa fa-linkedin"></i><img src="/img/linkedin.png" alt=""></a><span class="social-icon"></span></li>
           <!-- <li data-aos="zoom-in-up"><a href=#><i class="fa fa-reddit-alien"></i><img src="/img/reddit.png" alt=""></a><span class="social-icon" id="price"></span></li> -->
           <li data-aos="zoom-in-left"><a href="https://vk.com/demianiuk" target="_blank"><i class="fa fa-vk"></i><img src="/img/vk.png" alt=""></a><span class="social-icon"></span></li>
           <!-- <li data-aos="zoom-in-left"><a href=#><i class="fa fa-youtube"></i><img src="/img/youtube.png" alt=""></a><span class="social-icon"></span></li> -->
           <!-- <li data-aos="zoom-in-left"><a href=#><i class="fa fa-codepen"></i><img src="/img/codepen.png" alt=""></a><span class="social-icon"></span></li> -->
           <li data-aos="zoom-in-left"><a href="https://github.com/WELES777" target="_blank"><i class="fa fa-github"></i><img src="/img/github.png" alt=""></a><span class="social-icon"></span></li>
          </div>
         </ul>
        </div>
       </div>
      </div>
     </div>
    </section>
    <section id="copyright">
     <div class="container">
      <div class="row">
       <div class="col-lg-12 ">
        <div class="copyright">
         <p><?php echo __("&#64 COPYRIGHT 2016 - VASYL DEMIANIUK - ALL RIGHTS RESERVED") ?> </p>
    <div
      class="fb-like"
      data-share="true"
      data-width="450"
      data-show-faces="true">
    </div>
        </div>
    
       </div>
      </div>
     </div>
    </section>
    <!--  Footer libs -->
    <script src="js/main.js"></script>
          </body>

</html>