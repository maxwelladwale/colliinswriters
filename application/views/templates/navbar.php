<body>
    <!--[if lte IE 9]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="https://browsehappy.com/">upgrade your browser</a> to improve your experience and security.</p>
        <![endif]-->

    <!-- header-start -->
    <header>
        <div class="header-area " style="background:#c1c1c1;">
            <div id="sticky-header" class="main-header-area">
                <div class="container-fluid p-0">
                    <div class="row align-items-center no-gutters">
                        <div class="col-xl-2 col-lg-2">
                            <div class="logo-img">
                                <a href="index.html">
                                    <img src="img/logo.png" alt="">
                                </a>
                            </div>
                        </div>
                        <div class="col-xl-8 col-lg-8">
                            <div class="main-menu  d-none d-lg-block text-center">
                                <nav>
                                  <ul id="navigation">
                                  <?php if($this->session->userdata('logged_in')) : ?>
                                        <li><a href="">How It works</a></li>
                                        <li><a href="<?php echo base_url();?>/student/create">Post Job</a></li>
                                        <li><a href="<?php echo base_url();?>/student/timeline">Timeline</a></li>
                                        <li><a href="contact.html">Contact</a></li>
                                  <?php endif; ?>

                                  <?php if(!$this->session->userdata('logged_in')) : ?>
                                    <li><a href="">How It works</a></li>
                                    <li><a href="projects">Find Work</a></li>
                                    <li><a href="contact.html">Contact</a></li>
                                  </ul>
                                  <?php endif; ?>

                                </nav>
                            </div>
                        </div>
                        <div class="col-lg-2 d-none d-lg-block">
                            <div class="log_chat_area d-flex align-items-end">
                            <?php if($this->session->userdata('logged_in')) : ?>
                              <a href="<?php echo base_url();?>users/logout" class="say_hi">Logout</a>
                            <?php endif; ?>
                            <?php if(!$this->session->userdata('logged_in')) : ?>
                              <a href="<?php echo base_url();?>users/login" class="say_hi">Login</a>
                            <?php endif; ?>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="mobile_menu d-block d-lg-none"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <!-- header-end -->
