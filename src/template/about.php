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
