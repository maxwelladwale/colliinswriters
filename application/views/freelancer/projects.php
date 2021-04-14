<style>
.papers, .papers:before, .papers:after
{
	background-color: #fff;
	border: 1px solid #ccc;
	box-shadow: inset 0 0 30px rgba(0,0,0,0.1), 1px 1px 3px rgba(0,0,0,0.2);
}

.papers
{
	position: relative;
	padding: 2em;
	margin: 50px auto;
    color:grey;
}
.papers:hover{
    width: 102%;
    z-index: 500;
    color: black;
}
.papers:before, .papers:after
{
	content: "";
	position: absolute;
	left: 0;
	top: 0;
	width: 100%;
	height: 100%;
	-webkit-transform: rotateZ(2.5deg);
	-o-transform: rotate(2.5deg);
	transform: rotateZ(2.5deg);
	z-index: -1;
}

.papers:after
{
	-webkit-transform: rotateZ(-2.5deg);
	-o-transform: rotate(-2.5deg);
	transform: rotateZ(-2.5deg);
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
                                        <li class="breadcrumb-item active" aria-current="page">Jobs</li>
                                    </ol>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- ============================================================== -->
                <!-- end pageheader -->
                <!-- ============================================================== -->
                <div class="row">
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                        <div class="section-block">
                            <h3 class="section-title">Jobs available for bidding</h3>
                            <p>The jobs available to bid on</p>
                        </div>
                    </div>
                </div>
                <!-- ============================================================== -->
               
                <!-- ============================================================== -->
                <!-- ============================================================== -->
                <!-- nesting media -->
                <!-- ============================================================== -->
                <div class="row">
                <!-- x -->
                    
                    <?php foreach($jobs as $job) : ?>
                    <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12">
                        <div class="papers">
                            <div class="card">
                                <div class="card-body">
                                    <div class="media">
                                        <img class="mr-3 user-avatar-lg rounded" src="../assets/images/avatar-4.jpg" alt="Generic placeholder image">
                                        <div class="media-body">
                                            <a href="<?php echo site_url('/freelancer/singleproject/' .$job['jid']); ?>"><h5 class="mt-0"><?php echo $job['jtitle']; ?></h5></a>
                                            <div class="">
                                                <ul id="job-details">
                                                    <li>
                                                        <p><i class="fa fa-money">$ <?php echo $job['price']?></i></p>
                                                    </li>
                                                    <li>
                                                        <p><i class="fa fa-money">per Hour</i></p>
                                                    </li>
                                                </ul>    
                                            </div>
                                            <p> <?php echo character_limiter($job['jdescription'], 80); ?> </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php endforeach; ?>

                </div>
                <!-- ============================================================== -->
                <!-- end nesting media -->
                <!-- ============================================================== -->
