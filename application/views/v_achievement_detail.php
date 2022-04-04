<!-- Begin Page Content -->
<div class="container-fluid pt-4">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Achievement Detail</h1>
        <?php echo anchor('/Activity/show_list_activity_re_use/' . $ach->_id, '<span class="material-icons">search</span>', array('class' => 'btn btn-primary btn-sm', 'style' => 'color: white;', 'title' => 'Detail')); ?>
    </div>
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h5 class="m-0 font-weight-bold text-primary"><?php echo $ach->ach_name; ?></h5>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <?php
          if (isset($act)) {
        ?>
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th style="text-align: center;">No.</th>
                            <th style="text-align: center;">Name</th>
                            <th style="text-align: center;">Point</th>
                            <th style="text-align: center;">Status</th>
                            <th style="text-align: center;"> Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
              $i = 0;
              foreach ($act as $ams) {
                $col_class = ($i % 2 == 0 ? 'odd_col' : 'even_col');
                $i++;
              ?>
                        <tr class="<?php echo $col_class; ?>">

                            <td style="text-align: center;"><?php echo $i; ?></td>
                            <td><?php echo $ams->act_name; ?></td>
                            <td style="text-align: center;"><?php echo $ams->act_point; ?></td>
                            <td style="text-align: center;"><div style="color: #1cc88a;">
                                    <?php if($ams->act_status == 1){echo 'Done';}?>
                                </div>
                                <div style="color: #f6c23e;">
                                    <?php if($ams->act_status == 0){echo 'Pending';} ?>
                                </div></td>
                            <td class="table-actions" style="text-align: center;">
                                 <?php echo anchor('/Activity/success_activity/' . $ams->_id, '<span class="material-icons">done</span>', array('onclick' => "return confirm('Do you want status done this activity')", 'class' => 'btn btn-success btn-sm', 'style' => 'color: white;', 'title' => 'Done Activity')); ?>
                                <?php echo anchor('/Activity/pending_activity/' . $ams->_id, '<span class="material-icons">close</span>', array('onclick' => "return confirm('Do you want status pending this activity')", 'class' => 'btn btn-danger btn-sm', 'style' => 'color: white;', 'title' => 'Pending Activity')); ?>  
                            </td>
                        </tr>
                        <?php
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

