<div class="row justify-content-center">
  <div class="col-lg-10">
    <div class="pricing card-group flex-column flex-md-row mb-3">
      <div class="card card-pricing border-0 text-center mb-4">
        <div class="card-header bg-transparent">
          <h4 class="text-uppercase ls-1 text-primary display-4 mb-3">Create Achievement</h4>
        </div>
        <div class="card-body px-lg-7">
          <?php
          if (isset($error)) {
            echo '<p style="color:red;">' . $error . '</p>';
          } else {
            echo validation_errors();
          }
          ?>
          <?php
          $attributes = array('name' => 'form', 'id' => 'form');
          echo form_open($this->uri->uri_string(), $attributes);
          ?>

          <form>
            <div class="text-primary" style="text-align: left;">
              <h5><label> Achievement Name</label></h5>
            </div>
            <div class="input-group mb-5">
              <input type="text" class="form-control" placeholder=" Achievement Name" name="ach_name" value="<?php echo isset($ach) ? $ach->ach_name : set_value('ach_name'); ?>">
            </div>
            <div class="text-primary" style="text-align: left;">
              <h5><label> Achievement Point</label></h5>
            </div>
            <div class="input-group mb-5">
              <input type="number" class="form-control" placeholder=" Achievement Point" name="ach_point" value="<?php echo isset($ach) ? $ach->ach_point : set_value('ach_point'); ?>">
            </div>
            <div class="card-footer" style="text-align: right;">

              <button type="submit" name="submit" value="Submit" class="btn btn-success btn-lg">Save</button>

              <?php echo anchor('/Achievement/show_list', 'Cancel', array('class' => "btn btn-secondary btn-lg")); ?>
            </div>
            <div id="dropdown">

            </div>

          </form>
          <?php echo form_close(); ?>
          <div>
            <button class="btn" id="generate">generate</button>
          </div>



        </div>

      </div>

    </div>
  </div>
</div>

<script>
  var count_dropdown = 1;
  var values = ["dog", "cat", "parrot", "rabbit"]; // แก้ข้อมูลตรงนี้
  document.getElementById('generate').onclick = function() {
    var html = '';
    html += "<select name'act_id" + count_dropdown + "' id='act_id" + count_dropdown + "'>";
    let count_value = 1;
    for (const val of values) {
      html += "<option value='"+ count_value +"'>" + val +"</option>";
      count_value++;
    }
    html += "</select>";
    count_dropdown++;
    document.getElementById("dropdown").innerHTML += html;
  }
</script>