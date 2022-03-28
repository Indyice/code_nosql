<!-- Begin Page Content -->
<div class="container-fluid pt-4">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Achievement</h1>

        <?php echo anchor('/Activity/create', 'Add Activity',array('class'=>'btn btn-primary'));?>
    </div>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Achievement detail</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <?php
          if (isset($act)) {
        ?>
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>Name</th>
                            <th>Point</th>
                            <th>Status</th>
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
                            <td><?php echo $i; ?></td>
                            <td><?php echo $ams->act_name; ?></td>
                            <td><?php echo $ams->act_point; ?></td>
                            <td><?php echo $ams->act_status; ?></td>
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
<!-- /.container-fluid -->