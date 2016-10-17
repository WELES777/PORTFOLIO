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
