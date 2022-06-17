
<div class="right_col" role="main">
				<div class="">
					<div class="clearfix"></div>
					<div class="row">
						<div class="col-md-12 col-sm-12 ">
							<div class="x_panel">
								<div class="x_title">
									<h2>Form Update Stand Meter PDAM</h2>
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
									<form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left" method="post" action="<?php echo base_url(); ?>pdam/update_pdam">

										<?php foreach ($pdam->result() as $pd): ?>											
										
										<input type="hidden" name="id_user" value="<?php echo $pd->ID_user;?>">
										<input type="hidden" name="id" value="<?php echo $pd->ID_pdam;?>">

										<div class="item form-group form-check">
											<label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Tanggal <span class="required">*</span>
											</label>
											<div class="col-md-4 col-sm-6 ">
												<input id="birthday" name="tanggal" value="<?php echo $pd->tgl_pdam;?>" class="date-picker form-control" type="text" required="required" type="text" onfocus="this.type='date'" onmouseover="this.type='date'" onclick="this.type='date'" onblur="this.type='text'" onmouseout="timeFunctionLong(this)">
												<script>
													function timeFunctionLong(input) {
														setTimeout(function() {
															input.type = 'text';
														}, 60000);
													}
												</script>
											</div>
										</div>
										<div class="item form-group form-check">
											<label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">USAGE(M3) <span class="required">*</span>
											</label>
											<div class="col-md-4 col-sm-6 ">
												<input type="text" name="penggunaan" value="<?php echo $pd->penggunaan;?>" id="first-name" class="form-control" required>
											</div>
										</div>

										<?php endforeach ?>
										<div class="ln_solid"></div>
										<div class="item form-group">
											<div class="col-md-4 col-sm-6 offset-md-3">
												<button type="submit" class="btn btn-success">Simpan</button>
												<a href="<?php echo base_url() ?>pdam"><button class="btn btn-primary" type="button">Kembali</button></a>
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

			
			