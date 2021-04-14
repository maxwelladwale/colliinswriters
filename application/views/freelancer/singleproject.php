<!doctype html>
<html lang="en">
 

<style>
  .paper {
  background: #fff;
  box-shadow:
        /* The top layer shadow */
        0 -1px 1px rgba(0,0,0,0.15),
    /* The second layer */
    0 -10px 0 -5px #eee,
    /* The second layer shadow */
    0 -10px 1px -4px rgba(0,0,0,0.15),
     /* The third layer */
    0 -20px 0 -10px #eee,
    /* The third layer shadow */
    0 -20px 1px -9px rgba(0,0,0,0.15);
    /* Padding for demo purposes */
    padding: 30px;
}
.jobinfo h5 {
align-self: center;
color:;
display: inline;
}

    .dog-ear
 { width: 0;
 height: 0;
 border-style: solid;
 border-width: 40px 0 0 40px;
 border-color: white white white #ccc;
 position: absolute;
 right: 0;
 top: 0;
}

.downloadbtn{
    margin-top: -50px;
    margin-left: -10px;
}
</style>

        <!-- ============================================================== -->
        <!-- wrapper  -->
        <!-- ============================================================== -->
        <div class="dashboard-wrapper">
            <div class="container-fluid dashboard-content">
                <!-- ============================================================== -->
                <!-- pageheader -->
                <!-- ============================================================== -->
                <div class="row">
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                        <div class="page-header">
                            <h2 class="pageheader-title">Jobs Available</h2>
                            <div class="page-breadcrumb">
                                <nav aria-label="breadcrumb">
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item"><a href="#" class="breadcrumb-link">Dashboard</a></li>
                                        <li class="breadcrumb-item"><a href="#" class="breadcrumb-link">Pages</a></li>
                                        <li class="breadcrumb-item"><a href="#" class="breadcrumb-link">Jobs</a></li>
                                        <li class="breadcrumb-item active" aria-current="page">Job ID</li>
                                    </ol>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- ============================================================== -->
                <!-- end pageheader -->               
                <!-- ============================================================== -->
                <!-- ============================================================== -->
                <!-- nesting media -->
                <!-- ============================================================== -->

                <div class="row">
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                        <div class="card">
                            <div class="dog-ear"></div>
                            <div class="paper">
                                <div class="card-body">
                                    <div class="media">
                                        <div class="media-body">
                                            <h3 class="mt-0"><?php echo $fjobo['jtitle']; ?></h3>
                                            <div class="jobinfo">
                                                <h5><i class="fas fa-money-bill-alt"></i>Ksh <?php echo $fjobo['price']; ?> |</h5>
                                                <h5><i class="fas fa-handshake"></i><?php echo $fjobo['pname']; ?> |</h5>
                                                <h5><i class="fas fa-tag"></i><?php echo $fjobo['sname'];?> |</h5>
                                                <h5><i class="fas fa-truck-moving"></i><?php echo $fjobo['jpstdt'];?> |</h5>
                                                <h5><i class="fas fa-stopwatch"></i><?php echo $fjobo['deadline'];?></h5>
                                                
                                                <div style="float: right; ">
                                                    <?php echo form_open('freelancer/placebid'); ?>
                                                    <button class="btn btn-sm"><i class="fas fa-handshake"></i>BID</button>
                                                    <input type="hidden" value="<?php echo $fjobo['jid'];?>" name="jobid">
                                                    <input type="hidden" value="<?php echo $fjobo['jowna'];?>" name="jowna">
                                                    <?php echo form_close();?>
                                                </div>
                                            </div>
                                            <p><?php echo $fjobo['jdescription']; ?></p>
                                            <div class="jumbotron">
                                                <div class="downloadbtn">
                                                    <button class="btn btn-sm"><i class="fas fa-download"></i>Download all Attachments</button>
                                                </div>
                                                <p>
                                                <a href="<?php echo base_url().'assets/image/posts/'.$fjobo['flnym']; ?>">
                                                <i class="fas fa-paperclip"></i><?php echo $fjobo['flnym']; ?></p>
                                                </a>
                                            </div>
                                            <div class="jobinfo">
                                                <h5><i class="fas fa-money-bill-alt"></i>Ksh 400 |</h5>
                                                <h5><i class="fas fa-handshake"></i>Hourly |</h5>
                                                <h5><i class="fas fa-tag"></i>Electronics |</h5>
                                                <h5><i class="fas fa-truck-moving"></i>10/10/2020 |</h5>
                                                <h5><i class="fas fa-stopwatch"></i>20/10/2020</h5>
                                                <div style="float: right;">
                                                    <button class="btn btn-sm"><i class="fas fa-handshake"></i>BID</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
                <!-- ============================================================== -->
                <!-- end nesting media -->
                <!-- ============================================================== -->
                
            <!-- ============================================================== -->
