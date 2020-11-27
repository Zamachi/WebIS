<?php

use app\core\Field;
use app\core\Form;

// var_dump($model);
use app\core\Application;

/** @var $params \app\models\UploadModel
 */

$errors = Application::$app->session->getFlash('errors');

if ($errors !== false)
{
    $model->greske = $errors;
}

?>
<main class="wrapper">
    <div class="middle">
        <!-- <form> -->
        <?php echo Form::beginForm("uploadProcess", "post", "upload-form") ?>
            <?php echo Field::inputGame("", "") ?> <!-- ne znam koje da upisem -->
            <?php echo Form::field($model, 'code', 'text'); ?>
            <?php echo Form::field($model, 'price', 'text') ?>
            <?php echo "<button type='submit' class='upload-button'>Upload</button>" ?>
            <?php echo "<button type='reset' class='reset-button'>Reset Fields</button></br>" ?>
        <?php echo Form::endForm() ?>
        <!-- </form> -->
    </div>
</main>
<?php

$success = Application::$app->session->getFlash('success');

if ($success !== false)
{
    echo "
        <script>
            $(document).ready(function (){
                const Toast = Swal.mixin({
                    toast: true,
                    position: 'top-end',
                    showConfirmButton: false,
                    timer: 3000
                });


                Toast.fire({
                    icon: 'success',
                    title: '$success'
                })
            });
        </script>
        ";
}
?>