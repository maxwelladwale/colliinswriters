<!--Upload Area-->
<div data-scroll-index="0" class="get_in_tauch_area">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-6">
                    <div class="section_title text-center mb-90">
                        <h3 class="wow fadeInUp" data-wow-duration="1s" data-wow-delay=".3s">Post Project</h3>
                        <p class="wow fadeInUp" data-wow-duration="1s" data-wow-delay=".4s">Fill in the form below to upload your project.</p>
                    </div>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="touch_form">

                    <?php echo validation_errors()?>
                        <?php echo form_open_multipart('posts/updatepost'); ?>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="single_input wow fadeInUp" data-wow-duration="1s" data-wow-delay=".3s">
                                        <h4 class="wow fadeInUp" data-wow-duration="1s" data-wow-delay=".3s">Essential Info</h4>
                                        <input type="text" name= "title" value="<?php echo $kill['jtitle']?>" >
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="single_input wow fadeInUp" data-wow-duration="1s" data-wow-delay=".4s">
                                        <textarea name="editor1" id="editor1" type="text"> <?php echo $kill['jdescription']?> </textarea>
                                    </div>
                                </div>
                                <div class="col-md-12" style="padding-top: 30px;">
                                    <h4 class="wow fadeInUp" data-wow-duration="1s" data-wow-delay=".3s">Category & Skills</h4>
                                </div>

                                <div class="col-md-6" style="padding-top: 30px;">
                                    <div class="single_input wow fadeInUp" data-wow-duration="1s" data-wow-delay=".5s">
                                        <select class="form-control" type="email" name="category" >
                                            <option><?php echo $kill['cname']?></option>

                                            <?php foreach($categories as $category): ?>
                                                <option value="<?php echo $category['cid']; ?>"><?php echo $category['cname']; ?></option>
                                            <?php endforeach; ?>

                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6" style="padding-top: 30px;">
                                    <div class="single_input wow fadeInUp" data-wow-duration="1s" data-wow-delay=".6s">
                                        <select class="form-control" name="subcat" type="email" >
                                            

                                            <?php foreach($subcategories as $subcategory): ?>
                                                <option value="<?php echo $subcategory['sbcid']; ?>"><?php echo $subcategory['sbname']; ?></option>
                                            <?php endforeach; ?>

                                        </select>
                                    </div>
                                </div>

                                <div class="col-md-12" style="padding-top: 30px;">
                                    <div class="single_input wow fadeInUp" data-wow-duration="1s" data-wow-delay=".6s">
                                        <select class="form-control" name="skill" type="email" >
                                            <option>- Required Skills for this project (3 maximum) -</option>

                                            <?php foreach($skills as $skill): ?>
                                                <option value="<?php echo $skill['sid']; ?>"><?php echo $skill['sname']; ?></option>
                                            <?php endforeach; ?>

                                        </select>
                                    </div>
                                </div>

                                <div class="col-md-12" style="padding-top: 30px;">
                                    <h4 class="wow fadeInUp" data-wow-duration="1s" data-wow-delay=".3s">Budget</h4>
                                </div>
                                <div class="col-md-6" style="padding-top: 30px;">
                                    <div class="single_input wow fadeInUp" data-wow-duration="1s" data-wow-delay=".5s">
                                        <select class="form-control" name="plan" type="text" placeholder="Plan" >
                                            <option><?php echo $kill['pname']?></option>

                                            <?php foreach($plans as $plan): ?>
                                                <option value="<?php echo $plan['pid']; ?>"><?php echo $plan['pname']; ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6" style="padding-top: 30px;">
                                    <div class="single_input wow fadeInUp" data-wow-duration="1s" data-wow-delay=".6s">
                                        <select class="form-control" name="currency" type="text" placeholder="Currency" >
                                            <option>- Select Currency -</option>
                                            <option>US Dollar</option>
                                            <option>Japanese Yen</option>
                                            <option>Euro</option>
                                            <option>Kenyan Shilling</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6" style="padding-top: 30px;">
                                    <div class="single_input wow fadeInUp" data-wow-duration="1s" data-wow-delay=".6s">
                                        <input type="text" value="<?php echo $kill['price']?>" name="price"></input>
                                    </div>
                                </div>
                                <div class="col-md-6" style="padding-top: 30px;">
                                        <input type="file" name="userfile"></input>
                                </div>
                                <input type="text" name="id" value=<?php echo $kill['jid'];?>>

                                <div class="col-lg-12" style="padding-top: 30px;">
                                    <div class="submit_btn wow fadeInUp" data-wow-duration="1s" data-wow-delay=".7s">
                                        <button class="boxed-btn3" type="submit">Edit</button>
                                    </div>
                                </div>
                            </div>
                            <?php
                            echo form_close();
                            ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
<!-- / Upload Area-->
