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
                            <th>No.</th>
                            <th>Name</th>
                            <th style="text-align: center;">Point</th>
                            <th style="text-align: center;">Status</th>
                            <th style="text-align: center;">Manage</th>
                            <th style="text-align: center;">Action</th>
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
                            <td><?php echo $i; ?></td>
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
                                <a href="#!" class="table-action" data-toggle="tooltip" data-placement="top" title="Tooltip on top">
                                    <i class="fas fa-user-edit"></i>
                                </a>
                                <a href="#!" class="table-action table-action-delete" data-toggle="tooltip" data-original-title="Delete product">
                                    <i class="fas fa-trash"></i>
                                </a>
                                <a href="#!" class="table-action" data-toggle="tooltip" data-original-title="Delete product">
                                    <i class="fas fa-info-circle"></i>
                                </a>
                                
                                    
                                
                            </td>
                                    
                            <td style="text-align: center;">
                                <a href="#" class="btn btn-success btn-circle btn-sm">
                                        <i class="fas fa-check"></i>
                                </a>
                                <a href="#!" class="tn btn-danger btn-circle btn-sm" data-toggle="tooltip" data-original-title="Delete product">
                                    <i class="fas fa-times"></i>
                                </a>
                                
                                
                            </td>
                
                            <!-- <td>
                                <?php echo anchor('/Achievement/update/' . $ams->_id, 'Edit'); ?>
                                <?php echo anchor('/Achievement/delete/' . $ams->_id, 'Delete', array('onclick' => "return confirm('Do you want delete this record')")); ?>
                                <?php echo anchor('/Achievement/get_act_by_id/' . $ams->_id, 'Detail'); ?>
                                <?php echo anchor('/Achievement/success_achievement/' . $ams->_id, 'Done', array('onclick' => "return confirm('Done')")); ?>
                                <a href="<?php echo anchor('/Achievement/success_achievement/' . $ams->_id, 'Done', array('onclick' => "return confirm('Done')")); ?>" class="btn btn-success btn-circle btn-sm">
                                        <i class="fas fa-check"></i>
                                </a>
                                <?php echo anchor('/Achievement/pending_achievement/' . $ams->_id, 'Pending', array('onclick' => "return confirm('Pending')")); ?>
                            </td> -->
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
<script>
    $(function () {
    $('[data-toggle="tooltip"]').tooltip()
    })
</script>
