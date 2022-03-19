<?php
	defined('BASEPATH') OR exit('No direct script access allowed');
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Achievement</title>
    <link rel="stylesheet" type="text/css" href="<?=base_url()?>assets/css/style.css" />
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>

<body>

    <div class="container pt-4">
        <div class="card">
            <div class="card-header bg-primary text-white">
                <h1>Achievement</h1>
            </div>
            <div class="card-body">
                <div>
                    <?php echo anchor('/Achievement/create', 'Create Achievement');?>
                </div>

                <div id="body">
                    <?php
          if ($ach) {
        ?>
                    <table class="datatable">
                        <thead>
                            <tr>
                                <th style="color: black;">Name</th>
                                <th style="color: black;">Point</th>
                                <th style="color: black;"> Acions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
              $i = 0;
              foreach ($ach as $ams) {
                $col_class = ($i % 2 == 0 ? 'odd_col' : 'even_col');
                $i++;
              ?>
                            <tr class="<?php echo $col_class; ?>">
                                <td>
                                    <?php echo $ams->ach_name; ?>
                                </td>
                                <td>
                                    <?php echo $ams->ach_point; ?>
                                </td>
                                <td>
                                    <?php echo anchor('/Achievement/update/' . $ams->_id, 'Update'); ?>

                                    <?php echo anchor('/Achievement/delete/' . $ams->_id, 'Delete', array('onclick' => "return confirm('Do you want delete this record')")); ?>
                                </td>
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

</body>

</html>