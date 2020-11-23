<?php

use app\core\Field;
use app\core\Form;

// var_dump($model);
use app\core\Application;

/** @var $params \app\models\RegisterModel
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
        <?php echo Form::beginForm("registerProcess", "post", "register-form") ?>
            <?php echo Form::field($model, 'username', 'text'); ?>
            <?php echo Form::field($model, 'mail', 'email') ?>
            <?php echo Form::field($model, 'password', 'password') ?>
            <?php echo Form::field($model, 'confirmPassword', 'password') ?>
            <?php echo Field::dateOfBirth() ?>
            <?php echo Field::inputCountry("country", "country") ?>
            <?php echo "<button type='submit' class='register-button'>Send</button>" ?>
            <?php echo "<button type='reset' class='reset-button'>Reset Fields</button></br>" ?>
        <?php echo Form::endForm() ?>
        <!-- </form> -->
        <a href="/login" class="redirect-button">Already a member? Login here</a></br>
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