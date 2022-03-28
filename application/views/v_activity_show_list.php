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
            <h6 class="m-0 font-weight-bold text-primary">Activity list</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <?php
                    if ($act) {
                ?>
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>Name</th>
                            <th>Point</th>
                            <th>Status</th>
                            <th>Action</th>
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
                            <td><?php echo $i; ?></td>
                            <td><?php echo $act->act_name; ?></td>
                            <td><?php echo $act->act_point; ?></td>
                            <td>
                                <div style="color: #1cc88a;">
                                    <?php if($act->act_status == 1){echo 'Succeed';}?>
                                </div>
                                <div style="color: #f6c23e;">
                                    <?php if($act->act_status == 0){echo 'Pending';} ?>
                                </div>
                            </td>
                            <td>
                                <?php echo anchor('/Activity/update/' . $act->_id, 'Edit'); ?>
                                <?php echo anchor('/Activity/delete/' . $act->_id, 'Delete', array('onclick' => "return confirm('Do you want delete this record')")); ?>
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