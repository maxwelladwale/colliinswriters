<!--================Blog Area =================-->
<section class="blog_area section-padding">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 mb-5 mb-lg-0">
                    <div class="blog_left_sidebar">
                        <article class="blog_item">

                        <?php foreach($jobs as $job) : ?>
                            <div class="blog_details">
                                    <a class="d-inline-block" href="<?php echo site_url('/projects/' .$job['jid']); ?>">
                                        <h2><?php echo $job['jtitle']; ?></h2>
                                        <ul class="blog-info-link">
                                            <li style="color: rgb(19, 199, 49);"><i class="fa fa-money"></i><?php echo $job['pname']; ?>  | $ <?php echo $job['price']?> | <?php echo $job['jpstdt']; ?></li>
                                        </ul>
                                    </a>
                                    <p><?php echo word_limiter($job['jdescription'], 60); ?></p>
                                    <p> <?php echo $this->session->userdata ('usrtype');?></p>
                                    <ul class="blog-info-link">
                                        <li><a href="#"><i class="fa fa-cog"></i> <?php echo $job['cname']; ?></a></li>
                                        <li><a href="#"><i class="fa fa-heart"></i> 03 Bids</a></li>
                                    </ul>
                            </div>
                        <?php endforeach; ?>

                            
                        </article>

                        <nav class="blog-pagination justify-content-center d-flex">
                            <ul class="pagination">
                                <li class="page-item">
                                    <a href="#" class="page-link" aria-label="Previous">
                                        <i class="ti-angle-left"></i>
                                    </a>
                                </li>
                                <li class="page-item">
                                    <a href="#" class="page-link">1</a>
                                </li>
                                <li class="page-item active">
                                    <a href="#" class="page-link">2</a>
                                </li>
                                <li class="page-item">
                                    <a href="#" class="page-link" aria-label="Next">
                                        <i class="ti-angle-right"></i>
                                    </a>
                                </li>
                            </ul>
                        </nav>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="blog_right_sidebar">
                        <aside class="single_sidebar_widget post_category_widget">
                            <h4 class="widget_title">Category</h4>

                            <?php foreach($categories as $category) : ?>
                            <ul class="list cat-list">
                                <li>
                                    <a href="#" class="d-flex">
                                        <p><?php echo $category['cname']; ?></p>
                                        <p>(37)</p>
                                    </a>
                                </li>
                            </ul>
                            <?php endforeach; ?>
                        </aside>

                        <aside class="single_sidebar_widget popular_post_widget">
                            <h3 class="widget_title">Recent Jobs</h3>
                            <div class="media post_item">
                                <div class="media-body">
                                    <a href="singleproject.html">
                                        <h3>From life was you fish...</h3>
                                    </a>
                                    <p>posted: January 12, 2019</p>
                                </div>
                            </div>
                            <div class="media post_item">
                                <div class="media-body">
                                    <a href="singleproject.html">
                                        <h3>The Amazing Hubble</h3>
                                    </a>
                                    <p>Posted: 02 Hours ago</p>
                                </div>
                            </div>
                            <div class="media post_item">
                                <div class="media-body">
                                    <a href="singleproject.html">
                                        <h3>Astronomy Or Astrology</h3>
                                    </a>
                                    <p>Posted: 03 Hours ago</p>
                                </div>
                            </div>
                            <div class="media post_item">
                                <div class="media-body">
                                    <a href="singleproject.html">
                                        <h3>Asteroids telescope</h3>
                                    </a>
                                    <p>Posted: 01 Hours ago</p>
                                </div>
                            </div>
                        </aside>

                        <aside class="single_sidebar_widget newsletter_widget">
                            <h4 class="widget_title">Newsletter</h4>

                            <form action="#">
                                <div class="form-group">
                                    <input type="email" class="form-control" onfocus="this.placeholder = ''"
                                        onblur="this.placeholder = 'Enter email'" placeholder='Enter email' required>
                                </div>
                                <button class="button rounded-0 primary-bg text-white w-100 btn_1 boxed-btn"
                                    type="submit">Subscribe</button>
                            </form>
                        </aside>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--================Blog Area =================-->