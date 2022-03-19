<?php
	defined('BASEPATH') OR exit('No direct script access allowed');
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Codeigniter MongoDB Create Read Update Delete Example</title>
    <link rel="stylesheet" type="text/css" href="<?=base_url()?>assets/css/style.css" />
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>

<body>

    <div class="container pt-4">
        <div class="card">
            <div class="card-header bg-primary text-white">
                <h1>Codeigniter MongoDB Create Read Update Delete Example</h1>
            </div>
            <div class="card-body">
                <div>
                    <?php echo anchor('/usercontroller/create', 'Create User');?>
                </div>

                <div id="body">
                    <?php
					$attributes = array('name' => 'form', 'id' => 'form');
					echo form_open($this->uri->uri_string(), $attributes);
                ?>

                    <h5>Full Name</h5>
                    <input type="text" name="name" value="<?php echo isset($user)?$user->name:set_value('name'); ?>" size="50" />

                    <h5>Email Address</h5>
                    <input type="text" name="email" value="<?php echo isset($user)?$user->email:set_value('email'); ?>" size="50" />

                    <p><input type="submit" name="submit" value="Submit" /></p>

                    <?php echo form_close(); ?>


                </div>
            </div>
        </div>



    </div>

</body>

</html>