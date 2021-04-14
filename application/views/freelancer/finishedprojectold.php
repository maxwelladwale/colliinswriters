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
                        <?php echo form_open_multipart('posts/finishedprojectupload');?>
                           <li><input type="text" name="jobid" value="<?php echo $kill['jid'];?>"></li>
                           <li><input type="file" name="userfile" size="20" accept="application/pdf"></li>
                           <li><button type="submit" name="submit" class="btn btn-success btn-sm">UPLOAD</li>
                        </form>

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
                    </div>

                  </div>

               </div>

               </div>

            </div>

         </div>
      </div>
   </section>
   <!--================ Paper Area end =================-->