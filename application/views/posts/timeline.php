<!-- Tabs -->
<!-- <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.3.0/jquery.min/js"> </script>
<script src="https://code.jquery.com/jquery-1.12.4.min.js"> </script> -->

<!-- <script>
            setInterval(
                function(){
                    $('#nav-tabContent').load('<?php echo base_url()?>posts/timeline');              
            }, 3000);
</script> -->

<section class="blog_area single-post-area section-padding" id="tabs">
            <div class="container">
                <h2>Jobs</h2>
                <div class="row">
                    <div class="col-xs-12 ">
                        <nav>
                            <div class="nav nav-tabs nav-fill" id="nav-tab" role="tablist">
                                <a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true">In Progress</a>
                                <a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="false">In Review</a>
                                <a class="nav-item nav-link" id="nav-contact-tab" data-toggle="tab" href="#nav-contact" role="tab" aria-controls="nav-contact" aria-selected="false">Pending Payment</a>
                                <a class="nav-item nav-link" id="nav-about-tab" data-toggle="tab" href="#nav-about" role="tab" aria-controls="nav-about" aria-selected="false">Completed</a>
                            </div>
                        </nav>
                        <div class="tab-content py-3 px-3 px-sm-0" id="nav-tabContent">
                            <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
                                <P>Contracts you're actively working on will appear here</P>
                                <table id="datatable" class="table table-striped table-bordered" cellspacing="0" width="100%">
                                <!-- Table head -->
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Order No</th> 
                                            <th>Title</th>
                                            <th>Client</th>
                                            <th>Rate</th>
                                            <th>Due On</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <!-- table footer -->
                                    <tfoot>
                                        <tr>
                                            <th>#</th>
                                            <th>Order No</th>
                                            <th>Title</th>
                                            <th>Client</th>
                                            <th>Rate</th>
                                            <th>Due On</th>
                                            <th>Action</th>
                                        </tr>
                                    </tfoot>
                
                                    <tbody>
                                    <?php foreach($bids as $bid) : ?>

                                        <tr>
                                            <td>1</td>
                                            <td><?php echo $bid['bid']?></td>
                                            <td><?php echo $bid['jtitle']?></td>
                                            <td><?php echo $bid['fname']?> <?php echo $bid['sname']?></td>
                                            <td>$ <?php echo $bid['price']?></td>
                                            <td>2011/10/25</td>
                                            <td><a class="d-inline-block" href="<?php echo site_url('/posts/finishedproject/' .$bid['jid']); ?>">
                                            <p><button class="btn btn-primary btn-xs"><span class="fa fa-arrow-right"></span></button></p></a></td>
                                        </tr>

                                    <?php endforeach; ?>

                                    </tbody>
                                </table>
                            </div>

                            <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
                                <p>Completed bids pending review from client</p>

                                <table id="datatable" class="table table-striped table-bordered" cellspacing="0" width="100%">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Order No</th> 
                                            <th>Title</th>
                                            <th>Client</th>
                                            <th>Rate</th>
                                            <th>Submitted On</th>
                                        </tr>
                                    </thead>
                
                                    <tfoot>
                                        <tr>
                                            <th>#</th>
                                            <th>Order No</th>
                                            <th>Title</th>
                                            <th>Client</th>
                                            <th>Rate</th>
                                            <th>Submitted On</th>
                                        </tr>
                                    </tfoot>
                
                                    <tbody>
                                    <?php foreach ($bidsreviews as $bidreview) : ?>
                                        <tr>
                                            <td><?php echo $bidreview['bid']?></td>
                                            <td>Ex1222</td>
                                            <td><?php echo $bidreview['jtitle']?></td>
                                            <td><?php echo $bidreview['fname']?> <?php echo $bidreview['sname']?></td>
                                            <td><?php echo $bidreview['price']?></td>
                                            <td>2011/14/25</td>
                                        </tr>
                                    <?php endforeach; ?>
                                    </tbody>
                                </table>
                                Et et consectetur ipsum labore excepteur est proident excepteur ad velit occaecat qui minim occaecat veniam. Fugiat veniam incididunt anim aliqua enim pariatur veniam sunt est aute sit dolor anim. Velit non irure adipisicing aliqua ullamco irure incididunt irure non esse consectetur nostrud minim non minim occaecat. Amet duis do nisi duis veniam non est eiusmod tempor incididunt tempor dolor ipsum in qui sit. Exercitation mollit sit culpa nisi culpa non adipisicing reprehenderit do dolore. Duis reprehenderit occaecat anim ullamco ad duis occaecat ex.
                            </div>
                            <div class="tab-pane fade" id="nav-contact" role="tabpanel" aria-labelledby="nav-contact-tab">
                            <p>Completed bids pending payment from client</p>

                                <table id="datatable" class="table table-striped table-bordered" cellspacing="0" width="100%">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Order No</th> 
                                            <th>Title</th>
                                            <th>Client</th>
                                            <th>Rate</th>
                                            <th>Submitted On</th>
                                        </tr>
                                    </thead>
                
                                    <tfoot>
                                        <tr>
                                            <th>#</th>
                                            <th>Order No</th>
                                            <th>Title</th>
                                            <th>Client</th>
                                            <th>Rate</th>
                                            <th>Submitted On</th>
                                        </tr>
                                    </tfoot>
                
                                    <tbody>
                                    <?php foreach ($bidspending as $bidpending) : ?>
                                        <tr>
                                            <td>01</td>
                                            <td>Ex1222</td>
                                            <td><?php echo $bidpending['jtitle']?></td>
                                            <td><?php echo $bidpending['fname']?> <?php echo $bidpending['sname']?></td>
                                            <td><?php echo $bidpending['price']?></td>
                                            <td>2011/04/25</td>
                                        </tr>
                                        <?php endforeach; ?>
                                    </tbody>

                                </table>
                            </div>
                            <div class="tab-pane fade" id="nav-about" role="tabpanel" aria-labelledby="nav-about-tab">
                                <p>Well done. Completed bids</p>

                                <table id="datatable" class="table table-striped table-bordered" cellspacing="0" width="100%">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Order No</th> 
                                            <th>Title</th>
                                            <th>Client</th>
                                            <th>Rate</th>
                                            <th>Submitted On</th>
                                        </tr>
                                    </thead>
                
                                    <tfoot>
                                        <tr>
                                            <th>#</th>
                                            <th>Order No</th>
                                            <th>Title</th>
                                            <th>Client</th>
                                            <th>Rate</th>
                                            <th>Submitted On</th>
                                        </tr>
                                    </tfoot>
                
                                    <tbody>
                                    <?php foreach ($bidspaid as $bidpaid): ?>
                                        <tr>
                                            <td>01</td>
                                            <td>Ex1222</td>
                                            <td><?php echo $bidpaid['jtitle'] ?></td>
                                            <td><?php echo $bidpaid['fname'] ?> <?php echo$bidpaid ['sname'] ?></td>
                                            <td><?php echo $bidpaid['price'] ?></td>
                                            <td>2011/04/25</td>
                                        </tr>
                                    <?php endforeach; ?>
                                    </tbody>
                                </table>
                                Et et consectetur ipsum labore excepteur est proident excepteur ad velit occaecat qui minim occaecat veniam. Fugiat veniam incididunt anim aliqua enim pariatur veniam sunt est aute sit dolor anim. Velit non irure adipisicing aliqua ullamco irure incididunt irure non esse consectetur nostrud minim non minim occaecat. Amet duis do nisi duis veniam non est eiusmod tempor incididunt tempor dolor ipsum in qui sit. Exercitation mollit sit culpa nisi culpa non adipisicing reprehenderit do dolore. Duis reprehenderit occaecat anim ullamco ad duis occaecat ex.
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--/Tabs -->
