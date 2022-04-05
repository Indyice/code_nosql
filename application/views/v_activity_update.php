<style>
ul li {
    list-style: none;
}
</style>

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h4 mb-0 text-gray-800">Activity</h1>
    </div>
    <hr width="100%" color="696969">
    <ul class="pl-2 row">
        <li>
            <i class="fa fa-home"></i>
        </li>
        &nbsp;
        <li>
            <i class="fa fa-angle-right pt-1"></i>
        </li>
        &nbsp;
        <li>
            <?php echo anchor('/Activity/show_list', 'Activity',array('style'=> 'text-decoration: none', 'class'=>'text-gray-600'));?>
        </li>
        &nbsp;
        <li>
            <i class="fa fa-angle-right pt-1"></i>
        </li>
        &nbsp;
        <li>
            <?php echo anchor('/Activity/update/' . $act->_id, 'Edit Activity',array('style'=> 'text-decoration: none', 'class'=>'text-gray-600'));?>
        </li>
    </ul>

    <!-- Edit Activity -->
    <div class="row justify-content-center">
        <div class="col-lg-10">
            <div class="pricing card-group flex-column flex-md-row mb-3">
                <div class="card card-pricing border-0 text-center mb-4">
                    <div class="card-header bg-transparent">
                        <h4 class="text-uppercase ls-1 text-primary display-4 mb-3">Edit Activity</h4>
                    </div>
                    <div class="card-body px-lg-7">
                        <?php
                        if (isset($error)){
                        echo '<p style="color:red;">'.$error.'</p>';
                        }else{
                        echo validation_errors();
                        }
                        ?>
                        <?php
                        $attributes = array('name' => 'form', 'id' => 'form');
                        echo form_open($this->uri->uri_string(), $attributes);
                        ?>

                        <form>
                            <div class="text-primary" style="text-align: left;">
                                <h5><label> Activity Name</label></h5>
                            </div>
                            <div class="input-group mb-5">
                                <input type="text" class="form-control" placeholder="Activity Name" name="act_name" value="<?php echo isset($act)?$act->act_name:set_value('act_name'); ?>">
                            </div>
                            <div class="text-primary" style="text-align: left;">
                                <h5><label> Activity Point</label></h5>
                            </div>
                            <div class="input-group mb-5">
                                <input type="number" class="form-control" placeholder="Activity Point" name="act_point" value="<?php echo isset($act)?$act->act_point:set_value('act_point'); ?>">
                            </div>
                            <div class="card-footer" style="text-align: right;">
                                <button type="button" class="btn btn-success btn-lg" onclick="show_modal()" style="height: 50px; width: 10%; text-align: center;">Edit</button>
                                <?php echo anchor('/Activity/show_list', 'Cancel', array('class' => "btn btn-secondary btn-lg",'style' => "height: 50px; width: 12%;", 'type' => "button"));?>
                            </div>


                            <!-- Modal Confirm Edit-->
                            <div class="modal fade" id="edit_activity" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Confirm Edit</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <h6>Confirm edit to this activity.</h6>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="submit" name="submit" id="submit" value="Submit" class="btn btn-success">Save</button>
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                        <?php echo form_close(); ?>

                    </div>

                </div>

            </div>
        </div>
    </div>
</div>



<script>
/*
 * Suwapat Saowarod 62160340
 */
function show_modal() {
    $('#edit_activity').modal();
}
</script>