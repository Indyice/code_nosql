<div class="container col-md-4">
    <div class="modal-dialog modal-dialog-centered modal-md" role="document">
        <div class="modal-content">
            <div class="modal-body p-0">
                <div class="card card-plain">
                    <div class="card-header pb-0 text-left">
                        <h3 class="font-weight-bolder text-info text-gradient">Edit Activity</h3>
                    </div>
                    <div class="card-body">
                        <?php
                                if(isset($error)){
                                    echo '<p style="color:red;">'.$error.'</p>';

                                }else{
                                    echo validation_errors();
                                }
                                ?>

                        <?php
                                $attributes = array('name' => 'form', 'id' => 'form');
                                echo form_open($this->uri->uri_string(), $attributes);
                                ?>

                        <form role="form text-left">
                            <label>Name</label>
                            <div class="input-group mb-3">
                                <input type="text" class="form-control" placeholder="name" name="act_name" value="<?php echo isset($act)?$act->act_name:set_value('act_name'); ?>">
                            </div>
                            <label>Point</label>
                            <div class="input-group mb-3">
                                <input type="number" class="form-control" placeholder="point" name="act_point" value="<?php echo isset($act)?$act->act_point:set_value('act_point'); ?>">
                            </div>
                            <div class="modal-footer">
                                <?php echo anchor('/Activity/show_list', 'Cancel', array('class' => "btn bg-gradient-secondary"));?>
                                <button type="submit" name="submit" value="Submit" class="btn bg-gradient-warning">Edit</button>
                            </div>
                        </form>
                        <?php echo form_close(); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>