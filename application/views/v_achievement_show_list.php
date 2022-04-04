<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Achievement</h1>

        <?php echo anchor('/Achievement/create', 'Add Achievement',array('class'=>'btn btn-primary'));?>
    </div>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h5 class="m-0 font-weight-bold text-primary">Achievement List</h5>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <?php
                    if ($ach) {
                ?>
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th style="text-align: center;">No.</th>
                            <th style="text-align: center;">Name</th>
                            <th style="text-align: center;">Point</th>
                            <th style="text-align: center;">Status</th>
                            <th style="text-align: center;">Manage</th>
                            <!-- <th style="text-align: center;">Action</th> -->
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            $i = 0;
                            foreach ($ach as $ams) {
                                $col_class = ($i % 2 == 0 ? 'odd_col' : 'even_col');
                                if($ams->ach_status != 2){
                                    $i++;
                        ?>
                        <tr class="<?php echo $col_class; ?>">
                            <td style="text-align: center;"><?php echo $i; ?></td>
                            <td><?php echo $ams->ach_name; ?></td>
                            <td style="text-align: center;"><?php echo $ams->ach_point; ?></td>
                            <td style="text-align: center;">
                                <div style="color: #1cc88a;">
                                    <?php if($ams->ach_status == 1){echo 'Done';}?>
                                </div>
                                <div style="color: #f6c23e;">
                                    <?php if($ams->ach_status == 0){echo 'Pending';} ?>
                                </div>
                            </td>
                            <td class="table-actions" style="text-align: center;">
                                <?php echo anchor('/Achievement/get_act_by_id/' . $ams->_id, '<span class="material-icons">search</span>', array('class' => 'btn btn-primary btn-sm', 'style' => 'color: white;', 'title' => 'Detail')); ?>
                                <?php if($ams->ach_status == 0){?>
                                    <?php echo anchor('/Achievement/update/' . $ams->_id, '<span class="material-icons">edit</span>', array('class' => 'btn btn-warning btn-sm', 'style' => 'color: white;', 'title' => 'Edit Achievement ')); ?>
                                <?php } ?>
                                    <?php echo anchor('/Achievement/delete/' . $ams->_id, '<span class="material-icons">delete_forever</span>', array('onclick' => "return confirm('Do you want delete this achievement')", 'class' => 'btn btn-danger btn-sm', 'style' => 'color: white;', 'title' => 'Delete Achievement')); ?>
                                <!-- <button type="button" class="btn btn-danger btn-sm" onclick="show_modal()" style="color: white" value="" title="Delete Achievement">
                                    <span class="material-icons">delete_forever</span>
                                </button> -->
                            </td>
                                    
                            <!-- <td style="text-align: center;">
                                <?php echo anchor('/Achievement/success_achievement/' . $ams->_id, '<span class="material-icons">done</span>', array('onclick' => "return confirm('Do you want status done this achievement')", 'class' => 'btn btn-success btn-sm', 'style' => 'color: white;', 'title' => 'Done Achievement')); ?>
                                <?php echo anchor('/Achievement/pending_achievement/' . $ams->_id, '<span class="material-icons">close</span>', array('onclick' => "return confirm('Do you want status pending this achievement')", 'class' => 'btn btn-danger btn-sm', 'style' => 'color: white;', 'title' => 'Pending Achievement')); ?>  
                            </td> -->
                                    
                        </tr>
                        <!-- Modal Confirm Delete-->
                        <div class="modal fade" id="delete_achievement" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                              <div class="modal-content">
                                <div class="modal-header">
                                  <h5 class="modal-title" id="exampleModalLabel">Confirm Delete</h5>
                                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                  </button>
                                </div>
                                <div class="modal-body">
                                  <h6>Confirm create to this activity.</h6>
                                </div>
                                <div class="modal-footer">
                                      <button type="button" href="<?php echo 'http://[::1]/code_nosql/index.php/Achievement/delete/'.$ams->_id?>" class="btn btn-success">OK</button>
                                      <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                </div>
                              </div>
                            </div>
                          </div>
                        <?php
                                }
                            }
                        ?>
                    </tbody>
                </table>
                <?php
                    } else {
                        echo '<div style="color:red;"><p>No Record Found!</p></div>';
                    }
                ?>
            </div>
        </div>
    </div>

</div>
<!-- /.container-fluid -->
<script>
  /*
   * Priyarat Bumrungkit 62160156
   */
  function show_modal(){
    $('#delete_achievement').modal();
  }
</script>