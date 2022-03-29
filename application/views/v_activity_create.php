<!-- Create Activity -->
<div class="row justify-content-center">
        <div class="col-lg-10">
          <div class="pricing card-group flex-column flex-md-row mb-3">
            <div class="card card-pricing border-0 text-center mb-4">
              <div class="card-header bg-transparent">
                <h4 class="text-uppercase ls-1 text-primary display-4 mb-3">Create Activity</h4>
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
                                <h5><label > Activity Name</label></h5>
                            </div>
                            <div class="input-group mb-5">
                                <input type="text" class="form-control" placeholder="Activity Name" name="act_name" value="<?php echo isset($act)?$act->act_name:set_value('act_name'); ?>">
                            </div>
                            <div class="text-primary" style="text-align: left;">
                                <h5><label> Activity Point</label></h5>
                            </div>
                            <div class="input-group mb-5">
                                <input type="number" class="form-control" placeholder="Activity Point" name="act_point" value="<?php echo isset($act)?$act->ach_point:set_value('act_point'); ?>">
                            </div>
                            <div class="card-footer" style="text-align: right;">
                                
                                <button type="submit" name="submit" value="Submit" class="btn btn-success btn-lg">Save</button>
        
                                <?php echo anchor('/Activity/show_list', 'Cancel', array('class' => "btn btn-secondary btn-lg"));?>
                            </div>
                        </form>
                        <?php echo form_close(); ?>

                    
                    
              </div>
              
            </div>
            
          </div>
        </div>
      </div>