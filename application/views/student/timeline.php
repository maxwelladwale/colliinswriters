<section class="blog_area single-post-area section-padding" id="tabs" style="padding-top:150px;">
            <div class="container">
                <h2><?php echo $title;?></h2>
                <div class="row">
                    <div class="col-xs-12 ">
                        <nav>
                            <div class="nav nav-tabs nav-fill" id="nav-tab" role="tablist">
                                <a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true">Posted</a>
                                <a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-workshop" role="tab" aria-controls="nav-profile" aria-selected="false">In Workshop</a>
                                <a class="nav-item nav-link" id="nav-about-tab" data-toggle="tab" href="#nav-completed" role="tab" aria-controls="nav-about" aria-selected="false">Completed</a>
                                <a class="nav-item nav-link " id="nav-home-tab" data-toggle="tab" href="#nav-paid" role="tab" aria-controls="nav-home" aria-selected="true">Paid</a>

                            </div>
                        </nav>
                        
                        <div class="tab-content py-3 px-3 px-sm-0" id="nav-tabContent">
                            <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
                                <p>Projects posted awaiting assignemnt.</p>

                                <table id="datatable" class="table table-striped table-bordered" cellspacing="0" width="100%">
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
                                    <?php foreach ($projects as $project): ?>
                                        <tr>
                                        <tr>
                                            <td>1</td>
                                            <td><?php echo $project['jid']?></td>
                                            <td><?php echo $project['jtitle']?></td>
                                            <td><?php echo $project['fname']?> <?php echo $project['sname']?></td>
                                            <td>$ <?php echo $project['price']?></td>
                                            <td>2011/10/25</td>
                                            <td><a class="d-inline-block" href="<?php echo site_url('students/singleproject/' .$project['jid']); ?>">
                                            <p><button class="btn btn-primary btn-xs"><span class="fa fa-arrow-right"></span></button></p></a></td>
                                        </tr>
                                    <?php endforeach; ?>
                                    </tbody>
                                </table>
                                Et et consectetur ipsum labore excepteur est proident excepteur ad velit occaecat qui minim occaecat veniam. Fugiat veniam incididunt anim aliqua enim pariatur veniam sunt est aute sit dolor anim. Velit non irure adipisicing aliqua ullamco irure incididunt irure non esse consectetur nostrud minim non minim occaecat. Amet duis do nisi duis veniam non est eiusmod tempor incididunt tempor dolor ipsum in qui sit. Exercitation mollit sit culpa nisi culpa non adipisicing reprehenderit do dolore. Duis reprehenderit occaecat anim ullamco ad duis occaecat ex.
                            </div>

                            <div class="tab-pane fade" id="nav-workshop" role="tabpanel" aria-labelledby="nav-workshop-tab">
                                <p>Below are your projects been worked on. You will receive them at specified timeline.</p>

                                <table id="datatable" class="table table-striped table-bordered" cellspacing="0" width="100%">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Order No</th> 
                                            <th>Title</th>
                                            <th>Client</th>
                                            <th>Rate</th>
                                            <th>Due Date</th>
                                        </tr>
                                    </thead>
                
                                    <tfoot>
                                        <tr>
                                            <th>#</th>
                                            <th>Order No</th>
                                            <th>Title</th>
                                            <th>Client</th>
                                            <th>Rate</th>
                                            <th>Due Date</th>
                                        </tr>
                                    </tfoot>
                
                                    <tbody>
                                    <?php foreach ($projects_workshop as $project_workshop) : ?>
                                        <tr>
                                            <td><?php echo $project_workshop['jid']?></td>
                                            <td>Ex1222</td>
                                            <td><?php echo $project_workshop['jtitle']?></td>
                                            <td><?php echo $project_workshop['fname']?> <?php echo $project_workshop['sname']?></td>
                                            <td><?php echo $project_workshop['price']?></td>
                                            <td>2011/14/25</td>
                                        </tr>
                                    <?php endforeach; ?>
                                    </tbody>
                                </table>
                                Et et consectetur ipsum labore excepteur est proident excepteur ad velit occaecat qui minim occaecat veniam. Fugiat veniam incididunt anim aliqua enim pariatur veniam sunt est aute sit dolor anim. Velit non irure adipisicing aliqua ullamco irure incididunt irure non esse consectetur nostrud minim non minim occaecat. Amet duis do nisi duis veniam non est eiusmod tempor incididunt tempor dolor ipsum in qui sit. Exercitation mollit sit culpa nisi culpa non adipisicing reprehenderit do dolore. Duis reprehenderit occaecat anim ullamco ad duis occaecat ex.
                            </div>
                            
                            <div class="tab-pane fade" id="nav-completed" role="tabpanel" aria-labelledby="nav-completed-tab">
                                <?php
                                if ($projects_completed = NULL) {?>
                                <p>Projects that require your attention.</p>
                                <?php 
                                }else {?>
                                    <p>Projects that require your attention.</p>
<?php
                                }                              
                                
?>
                                <table id="datatable" class="table table-striped table-bordered" cellspacing="0" width="100%">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Order No</th> 
                                            <th>Title</th>
                                            <th>Client</th>
                                            <th>Rate</th>
                                            <th>Submitted On</th>
                                            <th>Action</th>
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
                                            <th>Action</th>
                                        </tr>
                                    </tfoot>
                
                                    <tbody>

                                    <?php foreach ($projects_completed as $project_completed): ?>
                                        <tr>
                                            <td><?php echo $project_completed['jid'] ?></td>
                                            <td>Ex1222</td>
                                            <td><?php echo $project_completed['jtitle'] ?></td>
                                            <td><?php echo $project_completed['fname'] ?> <?php echo$project_completed ['sname'] ?></td>
                                            <td><?php echo $project_completed['price'] ?></td>
                                            <td>2011/04/25</td>
                                            <td><a class="d-inline-block" href="<?php echo site_url('students/finishedproject/' .$project['jid']); ?>">
                                                <p><button class="btn btn-primary btn-xs"><span class="fa fa-arrow-right"></span></button></p></a>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                    </tbody>
                                </table>
                                Et et consectetur ipsum labore excepteur est proident excepteur ad velit occaecat qui minim occaecat veniam. Fugiat veniam incididunt anim aliqua enim pariatur veniam sunt est aute sit dolor anim. Velit non irure adipisicing aliqua ullamco irure incididunt irure non esse consectetur nostrud minim non minim occaecat. Amet duis do nisi duis veniam non est eiusmod tempor incididunt tempor dolor ipsum in qui sit. Exercitation mollit sit culpa nisi culpa non adipisicing reprehenderit do dolore. Duis reprehenderit occaecat anim ullamco ad duis occaecat ex.
                            </div>

                            <div class="tab-pane fade" id="nav-paid" role="tabpanel" aria-labelledby="nav-home-tab">
                                <p>Well done. Below are your completed and paid projects</p>

                                <table id="datatable" class="table table-striped table-bordered" cellspacing="0" width="100%">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Order No</th> 
                                            <th>Title</th>
                                            <th>Transaction Id</th>
                                            <th>Rate</th>
                                            <th>Paid On</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                
                                    <tfoot>
                                        <tr>
                                            <th>#</th>
                                            <th>Order No</th> 
                                            <th>Title</th>
                                            <th>Transaction Id</th>
                                            <th>Rate</th>
                                            <th>Paid On</th>
                                            <th>Action</th>
                                        </tr>
                                    </tfoot>
                
                                    <tbody>
                                    <?php foreach ($projects_paid as $project_paid): ?>
                                        <tr>
                                        <tr>
                                            <td>1</td>
                                            <td><?php echo $project_paid['jid']?></td>
                                            <td><?php echo $project_paid['jtitle']?></td>
                                            <td><?php echo $project_paid['fname']?> <?php echo $project_paid['sname']?></td>
                                            <td>$ <?php echo $project_paid['price']?></td>
                                            <td>2011/10/25</td>
                                            <td><a class="d-inline-block" href="<?php echo site_url('students/singleproject/' .$project['jid']); ?>">
                                            <p><button class="btn btn-success btn-xs"><span class="fa fa-arrow-right"></span></button></p></a></td>
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
