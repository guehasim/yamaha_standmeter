
<div class="right_col" role="main">
				<div class="">
					<div class="clearfix"></div>
					<div class="row">
						<div class="col-md-10 col-sm-10 ">
							<div class="x_panel">
								<div class="x_title">
									<h2>Form Input Stand Meter Baru</h2>
									<ul class="nav navbar-right panel_toolbox">
										<li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
										</li>
										<li class="dropdown">
											
										</li>
									</ul>
									<div class="clearfix"></div>
								</div>
								<div class="x_content">
									<br />

									<form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left" method="post" action="<?php echo base_url(); ?>standmeter/tambah_meter">

										<input type="hidden" name="id_user" value="<?php echo $this->session->userdata('ses_id');?>">
										<div class="row">
           									<div class="col-md-12 col-sm-12 ">
												<div class="item form-group form-check">
													<label class="col-form-label col-md-4 col-sm-4 label-align" for="first-name">Tanggal <span class="required">*</span>
													</label>
													<div class="col-md- col-sm-4 ">
														<input id="birthday" name="tanggal" class="date-picker form-control" type="text" required="required" type="text" onfocus="this.type='date'" onmouseover="this.type='date'" onclick="this.type='date'" onblur="this.type='text'" onmouseout="timeFunctionLong(this)">
														<script>
															function timeFunctionLong(input) {
																setTimeout(function() {
																	input.type = 'text';
																}, 60000);
															}
														</script>
													</div>
												</div>
											</div>
										</div>	
										<br>
										<div class="row">
           									<div class="col-md-6 col-sm-6 ">

           										<div class="item form-group form-check">
													<label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">BP <span class="required">*</span>
													</label>
													<div class="col-md-8 col-sm-8 ">
														<input type="text" name="bp" id="first-name" class="form-control" required>
													</div>
												</div>

												<div class="item form-group form-check">
													<label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">LBP <span class="required">*</span>
													</label>
													<div class="col-md-8 col-sm-8 ">
														<input type="text" name="lbp" id="first-name" class="form-control" required>
													</div>
												</div>

												<div class="item form-group form-check">
													<label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">KVARH <span class="required">*</span>
													</label>
													<div class="col-md-8 col-sm-8 ">
														<input type="text" name="kvarh" id="first-name" class="form-control" required>
													</div>
												</div>

											</div>
											<div class="col-md-6 col-sm-6 ">

												<div class="item form-group form-check">
													<label class="col-form-label col-md-4 col-sm-4 label-align" for="first-name">Outgoing I
													</label>
													<div class="col-md-8 col-sm-8 ">
														<input type="text" name="outgoing_i" id="first-name" class="form-control" >
													</div>
												</div>

												<div class="item form-group form-check">
													<label class="col-form-label col-md-4 col-sm-4 label-align" for="first-name">Outgoing II
													</label>
													<div class="col-md-8 col-sm-8 ">
														<input type="text" name="outgoing_ii" id="first-name" class="form-control" >
													</div>
												</div>

												<div class="item form-group form-check">
													<label class="col-form-label col-md-4 col-sm-4 label-align" for="first-name">Outgoing III
													</label>
													<div class="col-md-8 col-sm-8 ">
														<input type="text" name="outgoing_iii" id="first-name" class="form-control" >
													</div>
												</div>

												<div class="item form-group form-check">
													<label class="col-form-label col-md-4 col-sm-4 label-align" for="first-name">Outgoing IV
													</label>
													<div class="col-md-8 col-sm-8 ">
														<input type="text" name="outgoing_iv" id="first-name" class="form-control" >
													</div>
												</div>

											</div>
										</div>	

										<div class="ln_solid"></div>

										<div class="row">
           									<div class="col-md-12 col-sm-12">

           										<div class="item form-group" style="text-align:middle;">
													<button type="submit" class="btn btn-success">Simpan</button>
													<a href="<?php echo base_url() ?>standmeter"><button class="btn btn-primary" type="button">Kembali</button></a>
												</div>

											</div>
										</div>											

									</form>


								</div>
							</div>
						</div>
					</div>
					
				</div>
			</div>
			
			<!-- /page content -->

			
			