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
                                
                            <button type="button" class="btn btn-success btn-lg" onclick="show_modal()" style="height: 50px; width: 10%; text-align: center;">Create</button>
        
                                <?php echo anchor('/Activity/show_list', 'Cancel', array('class' => "btn btn-secondary btn-lg"));?>
                            </div>
                          <!-- Modal Confirm Create-->
                          <div class="modal fade" id="create_activity" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                              <div class="modal-content">
                                <div class="modal-header">
                                  <h5 class="modal-title" id="exampleModalLabel">Confirm Create</h5>
                                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                  </button>
                                </div>
                                <div class="modal-body">
                                  <h6>Confirm create to this activity.</h6>
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
<script>
  /*
   * Priyarat Bumrungkit 62160156
   */
  function show_modal(){
    $('#create_activity').modal();
  }
</script>
      