<section id="home">

 <!--  Language bar -->
<!-- Not working -->
   <div class="bfh-selectbox bfh-languages" data-language="pl_PL" data-available="en_US,pl_PL" data-flags="true" data-blank="false">
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
      <textarea rows="2" class="form-control" id="op-message" name="opinion" placeholder="<?php echo __("Your opinion") ?>*" required></textarea>
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

