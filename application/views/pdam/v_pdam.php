        <!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
              </div>

            </div>

            <div class="clearfix"></div>
            <div>
              <?php echo $this->session->flashdata('msg'); ?>
            </div> 

            <div class="row">              
              <div class="col-md-12 col-sm-12 ">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Data Stand Meter PDAM</h2>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                      <div class="row">
                          <div class="col-sm-3">
                            <a href="<?php echo base_url() ?>pdam/gonewpdam"><button type="button" class="btn btn-success">Tambah Stand PDAM</button></a>
                          </div>
                          <div class="col-md-9">
                            <form method="post" action="<?php echo base_url(); ?>pdam/cetak_pdam">
                            <div class="col-sm-3 col-sm-3">
                              <input id="birthday" name="tgl_awal" class="date-picker form-control" type="text" required="required" onfocus="this.type='date'" onmouseover="this.type='date'" onclick="this.type='date'" onblur="this.type='text'" onmouseout="timeFunctionLong(this)" placeholder="Tanggal Awal">
                               <script>
                                  function timeFunctionLong(input) {
                                    setTimeout(function() {
                                      input.type = 'text';
                                    }, 60000);
                                  }
                                </script>
                              </div>
                              <div class="col-sm-3 col-sm-3">
                              <input id="birthday" name="tgl_akhir" class="date-picker form-control" type="text" required="required" onfocus="this.type='date'" onmouseover="this.type='date'" onclick="this.type='date'" onblur="this.type='text'" onmouseout="timeFunctionLong(this)" placeholder="Tanggal Akhir">
                               <script>
                                  function timeFunctionLong(input) {
                                    setTimeout(function() {
                                      input.type = 'text';
                                    }, 60000);
                                  }
                                </script>
                              </div>
                              <div class="col-md-6 col-sm-6 ">
                                <input type="submit" name="btn" class="btn btn-success btn-xs" formtarget="_blank" value="Print" />
                                <input type="submit" name="btn" class="btn btn-primary btn-xs" value="Excel" />
                              </div>
                            </form> 
                          </div>  
                            <div class="card-box table-responsive">
                    <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                      <thead>
                        <tr>
                          <th>No.</th>
                          <th>Tanggal</th>
                          <th>Penginput</th>
                          <th>USAGE (M3)</th>
                          <th>Aksi</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php $no = 1; foreach ($pdam->result() as $mt): ?>
                        <tr>
                          <td><?php echo $no++;?></td>
                          <td><?php echo date('d M y', strtotime($mt->tgl_pdam));?></td>    
                          <td><?php echo $mt->nama;?></td>                      
                          <td><?php echo $mt->penggunaan;?></td>
                          <td>
                              <a href="<?php echo base_url() ?>pdam/getpdam?us=<?php echo $mt->ID_pdam; ?>"><button type="button" class="btn btn-info btn-sm"><i class="fa fa-pencil"></i> Edit</button></a>              
                              <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#hapus-info-<?php echo $mt->ID_pdam;?>"><i class="fa fa-trash-o"></i>  Delete</button>                
                          </td>
                        </tr>

                        <!-- modal delete -->
                        <div class="modal fade" id="hapus-info-<?php echo $mt->ID_pdam;?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                          <div class="modal-dialog">
                            <div class="modal-content edit-dialog-modal">
                              <form class="form-validate form-horizontal " id="register_form" action="<?php echo base_url(); ?>pdam/hapus_pdam" method="post">    
                                <?php
                                  $this->load->helper("form");
                                ?>
                                <div class="modal-header">
                                  <h4 class="modal-title" id="myModalLabel">Hapus Data Stand Meter PDAM</h4>                                  
                                  <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                </div>
                                <div class="modal-body">
                                  <input type="hidden" name="id" value="<?php echo $mt->ID_pdam;?>">
                                  Apakah anda benar mau menghapus data di tanggal "<?php echo $mt->tgl_pdam;?>" ini?
                                </div>
                                <div class="modal-footer">
                                  <button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-trash-o"></i>  Hapus</button>
                                  <button class="btn btn-default btn-sm" data-dismiss="modal" type="button">Cancel</button>
                                </div>
                              </form>
                            </div>
                            <!-- /.modal-content -->
                          </div>
                          <!-- /.modal-dialog -->
                        </div>
                        <!-- end modal delete-->
                        
                    <?php endforeach ?>
                      </tbody>
                    </table>
					
                  </div>
                </div>
              </div>
            </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- /page content -->

        