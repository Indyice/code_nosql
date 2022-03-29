<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Activity</h1>

        <?php echo anchor('/Activity/create', 'Add Activity',array('class'=>'btn btn-primary'));?>
    </div>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h5 class="m-0 font-weight-bold text-primary">Activity List</h5>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <?php
                    if ($act) {
                ?>
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th style="text-align: center;">No.</th>
                            <th style="text-align: center;">Name</th>
                            <th style="text-align: center;">Point</th>
                            <th style="text-align: center;">Status</th>
                            <th style="text-align: center;">Manage</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            $i = 0;
                            foreach ($act as $act) {
                                $col_class = ($i % 2 == 0 ? 'odd_col' : 'even_col');
                                if($act->act_status != 2){
                                    $i++;
                            ?>
                        <tr class="<?php echo $col_class; ?>">
                            <td style="text-align: center;"><?php echo $i; ?></td>
                            <td><?php echo $act->act_name; ?></td>
                            <td style="text-align: center;"><?php echo $act->act_point; ?></td>
                            <td style="text-align: center;">
                                <div style="color: #1cc88a;">
                                    <?php if($act->act_status == 1){echo 'Done';}?>
                                </div>
                                <div style="color: #f6c23e;">
                                    <?php if($act->act_status == 0){echo 'Pending';} ?>
                                </div>
                            </td>
                            <td class="table-actions" style="text-align: center;">

                            <?php if($act->act_status == 0){?>
                                <?php echo anchor('/Activity/update/' . $act->_id, '<span class="material-icons">edit</span>', array(
                                     'class' => 'btn btn-warning btn-sm', 'style' => 'color: white;', 'title' => 'Edit Achievement ','title' => 'Edit Achievement ')); ?>
                            <?php }?>
                                 
                                 <?php echo anchor('/Activity/delete/' . $act->_id, '<span class="material-icons">delete_forever</span>', array('onclick' => "return confirm('Do you want delete this achievement')", 'class' => 'btn btn-danger btn-sm', 'style' => 'color: white;')); ?>
                            </td>
                        </tr>
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
<!-- Modal Confirm Delete -->
