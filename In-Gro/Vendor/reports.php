<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from gambolthemes.net/html-items/gambo_admin/reports.php by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 02 Jun 2020 15:39:26 GMT -->
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="description-gambolthemes" content="">
	<meta name="author-gambolthemes" content="">
	<title>In-Gro Supermarket Vendor</title>
	<link href="css/styles.css" rel="stylesheet">
	<link href="css/admin-style.css" rel="stylesheet">
	<link href="css/datepicker.min.css" rel="stylesheet">
	
	<!-- Vendor Stylesheets -->
	<link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
	<link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet">
	
</head>

    <body class="sb-nav-fixed">
         <?php
       require "header.php";
        ?>
  <div id="layoutSidenav">
             <?php
       require "sidebar.php";
        ?>
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid">
                        <h2 class="mt-30 page-title">All Reports</h2>
                        <ol class="breadcrumb mb-30">
                            <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
                            <li class="breadcrumb-item active">All Report</li>
                        </ol>
						<div class="row">
							<div class="col-lg-4 col-md-5">
								<div class="card card-static-2 mb-30">
									<div class="card-title-2">
										<h4>Add New Product</h4>
									</div>
									<div class="card-body-table">
										<div class="news-content-right pd-20">
											<div class="form-group">
												<label class="form-label">Select a Rent*</label>
												<select id="categeory" name="categeory" class="form-control">
													<option selected>--Select a report type--</option>
													<option value="1">Reort 1</option>
													<option value="2">Reort 2</option>
													<option value="3">Reort 3</option>
													<option value="4">Reort 4</option>
													<option value="5">Reort 5</option>
												</select>
											</div>
											<div class="form-group">
												<label class="form-label">Select a Branch*</label>
												<select id="status" name="status" class="form-control">
													<option selected>Ludhiana</option>
													<option value="1">Chandigarh</option>
													<option value="2">New Delhi</option>
													<option value="3">Bangluru</option>
												</select>
											</div>
											<div class="form-group">
												<label class="form-label">Start Date*</label>
												<input type="text" class="form-control datepicker-here" data-language='en' placeholder="Start Date">
											</div>
											<div class="form-group">
												<label class="form-label">End Date*</label>
												<input type="text" class="form-control datepicker-here" data-language='en' placeholder="End Date">
											</div>
											<button class="save-btn hover-btn" type="submit">Search Filter</button>
										</div>
									</div>
								</div>
							</div>
							<div class="col-lg-8 col-md-7">
								<div class="all-cate-tags">
									<div class="row">										
										<div class="col-lg-12 col-md-12">
											<div class="card card-static-2 mb-30">
												<div class="card-title-2">
													<h4>Orders Per Hours</h4>
												</div>
												<div class="card-body-table">
													<div class="table-responsive">
														<table class="table ucp-table table-hover">
															<thead>
																<tr>
																	<th>Hours</th>
																	<th>Total Orders</th>
																	<th>Total Sales</th>
																</tr>
															</thead>
															<tbody>
																<tr>
																	<td>00.00</td>
																	<td>5</td>
																	<td>$50</td>
																</tr>
																<tr>
																	<td>01.00</td>
																	<td>4</td>
																	<td>$35</td>
																</tr>
																<tr>
																	<td>02.00</td>
																	<td>1</td>
																	<td>$13</td>
																</tr>
																<tr>
																	<td>03.00</td>
																	<td>8</td>
																	<td>$150</td>
																</tr>
																<tr>
																	<td>04.00</td>
																	<td>4</td>
																	<td>$45</td>
																</tr>
																<tr>
																	<td>05.00</td>
																	<td>7</td>
																	<td>$80</td>
																</tr>
															</tbody>
														</table>
													</div>
												</div>
												<div class="card-body-table-footer">
													<ul>
														<li><button class="download-btn hover-btn">Download JPG</button></li>
														<li><button class="download-btn hover-btn">Download PNG</button></li>
														<li><button class="download-btn hover-btn">Export to Excel</button></li>
													</ul>
												</div>
											</div>
											<div class="card card-static-2 mb-30">
												<div class="card-title-2">
													<h4>Orders Per Day</h4>
												</div>
												<div class="card-body-table">
													<div class="table-responsive">
														<table class="table ucp-table table-hover">
															<thead>
																<tr>
																	<th>Year</th>
																	<th>Month</th>
																	<th>Day</th>
																	<th>Total Orders</th>
																	<th>Total Sales</th>
																</tr>
															</thead>
															<tbody>
																<tr>
																	<td>2020</td>
																	<td>5</td>
																	<td>15</td>
																	<td>25</td>
																	<td>$523</td>
																</tr>
																<tr>
																	<td>2020</td>
																	<td>4</td>
																	<td>20</td>
																	<td>32</td>
																	<td>$723</td>
																</tr>
															</tbody>
														</table>
													</div>
												</div>
												<div class="card-body-table-footer">
													<ul>
														<li><button class="download-btn hover-btn">Download JPG</button></li>
														<li><button class="download-btn hover-btn">Download PNG</button></li>
														<li><button class="download-btn hover-btn">Export to Excel</button></li>
													</ul>
												</div>
											</div>
											<div class="card card-static-2 mb-30">
												<div class="card-title-2">
													<h4>Orders Per Month</h4>
												</div>
												<div class="card-body-table">
													<div class="table-responsive">
														<table class="table ucp-table table-hover">
															<thead>
																<tr>
																	<th>Year</th>
																	<th>Month</th>
																	<th>Total Orders</th>
																	<th>Total Sales</th>
																</tr>
															</thead>
															<tbody>
																<tr>
																	<td>2020</td>
																	<td>5</td>
																	<td>400</td>
																	<td>$25523</td>
																</tr>
																<tr>
																	<td>2020</td>
																	<td>4</td>
																	<td>250</td>
																	<td>$10723</td>
																</tr>
															</tbody>
														</table>
													</div>
												</div>
												<div class="card-body-table-footer">
													<ul>
														<li><button class="download-btn hover-btn">Download JPG</button></li>
														<li><button class="download-btn hover-btn">Download PNG</button></li>
														<li><button class="download-btn hover-btn">Export to Excel</button></li>
													</ul>
												</div>
											</div>
											<div class="card card-static-2 mb-30">
												<div class="card-title-2">
													<h4>Most Selling Branch</h4>
												</div>
												<div class="card-body-table">
													<div class="table-responsive">
														<table class="table ucp-table table-hover">
															<thead>
																<tr>
																	<th>Name</th>
																	<th>Total Orders</th>
																	<th>Total Sales</th>
																</tr>
															</thead>
															<tbody>
																<tr>
																	<td>Ludhiana</td>
																	<td>2530</td>
																	<td>$125523</td>
																</tr>
															</tbody>
														</table>
													</div>
												</div>
												<div class="card-body-table-footer">
													<ul>
														<li><button class="download-btn hover-btn">Download JPG</button></li>
														<li><button class="download-btn hover-btn">Download PNG</button></li>
														<li><button class="download-btn hover-btn">Export to Excel</button></li>
													</ul>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
                        </div>
                    </div>
                </main>
                 <?php 
             require "footer.php";
        ?>

            </div>
        </div>
        <script src="js/jquery-3.4.1.min.js"></script>
        <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
        <script src="js/scripts.js"></script>
		<script src="js/datepicker.min.js"></script>
		<script src="js/i18n/datepicker.en.js"></script>
       
    </body>

<!-- Mirrored from gambolthemes.net/html-items/gambo_admin/reports.php by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 02 Jun 2020 15:39:27 GMT -->
</html>
