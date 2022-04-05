<style>
ul li {
    list-style: none;
}
</style>

<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h4 mb-0 text-gray-800">Achievement</h1>
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
            <?php echo anchor('/Achievement/show_list', 'Achievement',array('style'=> 'text-decoration: none', 'class'=>'text-gray-600'));?>
        </li>
        &nbsp;
        <li>
            <i class="fa fa-angle-right pt-1"></i>
        </li>
        &nbsp;
        <li>
            <?php echo anchor('/Achievement/create', 'Create Achievement',array('style'=> 'text-decoration: none', 'class'=>'text-gray-600'));?>
        </li>
    </ul>

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
                                <button type="button" class="btn btn-success btn-lg" onclick="show_modal()" style="height: 50px; width: 12%; text-align: center;">Create</button>
                                <?php echo anchor('/Achievement/show_list', 'Cancel', array('class' => "btn btn-secondary btn-lg"));?>
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
                        <!-- <div id="dropdown">
                <div>
                        <button class="btn" id="generate">generate</button>
                </div>  -->


                    </div>

                </div>

            </div>
        </div>
    </div>
</div>
<!-- /.container-fluid -->

<script>
function show_modal() {
    $('#create_activity').modal();
}
var count_dropdown = 1;
// var values = ['1','2','3'];
// var values = $('input[name="act_name"]').val(); // แก้ข้อมูลตรงนี้

// document.getElementById('generate').onclick = function() {
//     var html = '';
//     html += "<select name'act_id" + count_dropdown + "' id='act_id" + count_dropdown + "'>";
//     let count_value = 1;
//     for (const val of values) {
//         html += "<option value='" + count_value + "'>" + val + "</option>";
//         count_value++;
//     }
//     html += "</select>";
//     count_dropdown++;
//     document.getElementById("dropdown").innerHTML += html;
// }

var num_item_list = 1;
// ใส่ commas

// คืนค่า item ถัดไป
function gen_next_item() {
    num_item_list++;
    var next_item = `<div class="item_list${num_item_list} item_input dark-white container mb-1 row" style="padding: 15px; text-align: center; border-radius: 8px;">
            <div class="col">
                <input class="form-control" type="text" name="act_name[]" id="item_name${num_item_list}" placeholder="Activity Name">
            </div>
            <div class="col">
                <input class="form-control" type="number" name="act_point[]" id="act_point${num_item_list}" placeholder="Activity Point">
            </div>
            
            </div>`;
    // console.log(num_item_list);
    $('.item').append(next_item);

}
// แสดงปุ่ม ลบ 
function show_delete_item_button() {
    var num_item_input = $('.item_input').length;
    console.log(num_item_input);

    if (num_item_input >= 2) {
        $('.delete_item_button').remove();
        for (var i = 1; i <= num_item_list; i++) {
            var delete_button =
                `<a href="#" class="delete_item_button btn btn-danger" onclick="delete_item(${i});">ลบ</a>`;
            $('.item_list' + i).append(delete_button);
        }
    }
}
// ลบ item
function delete_item(item_id) {
    $('.item_list' + item_id).remove();
    var num_item_input = $('.item_input').length;
    if (num_item_input < 2) {
        $('.delete_item_button').remove();
    }
}

$(document).ready(function() {
    $('[data-toggle="tooltip"]').tooltip();
});
</script>