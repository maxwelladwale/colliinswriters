<!--================Paper Area =================-->
<section class="blog_area single-post-area section-padding">
      <div class="container">
         <div class="row">
            <div class="col-lg-12 posts-list">
               <div class="single-post">
                  <div class="blog_details">
                     <h2><?php echo $kill['jtitle']; ?>
                     </h2>
                     <ul class="blog-info-link mt-3 mb-4">
                        <li><a href="#"><i class="fa fa-money"></i> <?php echo $kill['pname']; ?>, $ <?php echo $kill['price']; ?></a></li>
                        <li><a href="#"><i class="fa fa-heart"></i> 3 Bids</a></li>

                        <?php if(!$this->session->userdata('logged_in')) : ?>
                           <li><button type="button" class="btn btn-success btn-md" data-toggle="modal" data-target="#exampleModalLong" style="width: 50px;"><i class="fa fa-heart"></i></button></li>
                        <?php endif; ?>

                        <?php if($this->session->userdata('logged_in')) : ?>
                           <?php echo form_open('posts/placebid/'.$kill['jid']); ?>
                              <input type="hidden" value="<?php echo $kill['jid'];?>" name="jobid">
                              <input type="hidden" value="<?php echo $kill['jowna'];?>" name="jowna">
                              <li><button type="submit" class="btn btn-info btn-md"><i class="fa fa-heart"></i></button></li>
                           <?php echo form_close(); ?>
                        <?php endif; ?>

                     </ul>
                     <p class="excert">
                        <?php echo $kill['jdescription']; ?>
                     </p>

                     <h4>Attachments</h4>
                     <div class="quote-wrapper">
                        <div class="quotes">
                           <li>
                              <ul><i class="fa fa-paperclip"></i> Marketing 101.pdf</ul>
                              <ul><i class="fa fa-paperclip"></i> Marketing structure.jpg</ul>
                           </li>
                        </div>
                     </div>

                  </div>
               </div>
               <div class="navigation-top">
                  <div class="d-sm-flex justify-content-between text-center">
                     <li><a href="#"><i class="fa fa-money"></i> <?php echo $kill['pname']; ?>, $ <?php echo $kill['price']; ?></a></li>

                     <p class="like-info"><span class="align-middle"><i class="fa fa-heart"></i></span> 4 people bidded this</p>
                     <div class="col-sm-4 text-center my-2 my-sm-0">
                        <p class="comment-count"><span class="align-middle"><i class="fa fa-comment"></i></span> 06 Comments</p>
                           <li><button type="button" class="btn btn-success btn-md show-toast" data-toggle="modal" data-target="#exampleModalLong" style="width: 50px;"><i class="fa fa-heart"></i></button></li>
                           
                           <?php if($this->session->userdata('logged_in')) : ?>
                              <?php echo form_open('posts/placebid'); ?>
                                 <li><button type="submit" class="btn btn-info btn-md"><i class="fa fa-heart"></i></button></li>
                                 <input type="hidden" value="<?php echo $kill['jid'];?>" name="jobid">
                                 <input type="hidden" value="<?php echo $kill['jowna'];?>" name="jowna">
                              <?php echo form_close(); ?>
                        <?php endif; ?>
                     </div>

                  </div>

               </div>

               </div>

            </div>

         </div>
      </div>
   </section>
   <!--================ Paper Area end =================-->
   <!--job post Modal-->

      <div class="container">
            <div class="modal fade" data-backdrop="false" id="exampleModalLong" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true" >
               <div class="modal-dialog" role="document">
               <div class="modal-content">
                    <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Bid success</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    </div>
                    <div class="modal-body">
                    <h4></h4>
                    <p>ALERT!!!!</p>
                    <p>Login to place your bid please</p>
                    <P><i class="fa fa-pdf"></i></P>
                    </div>
                    <div class="modal-footer">
                    <a href="projects"><button type="button" class="btn btn-primary">Back to projects</button>
                    </a>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    </div>
                </div>
                </div>
            </div>
    
        </div>
        <!--/ job post Modal-->