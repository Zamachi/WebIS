<?php

use app\core\Form;
use app\core\Field;
use app\core\Application;
//var_dump($model);

$errors = Application::$app->session->getFlash('errors');

if ($errors !== false)
{
    $model->greske = $errors;
}
// var_dump($errors);
?>

<html>
    <main class="wrapper">
        <div class="middle">
            <?php echo Form::beginForm("loginProcess","post","login-form") ?>
                <?php echo Form::field($model,"mail","email") ?>
                <?php echo Form::field($model,"password","password") ?>
                <?php echo "<button type='submit' class='login-button'>Send</button></br>" ?>
            <?php echo Form::endForm() ?>
            <a href="/register" class="redirect-button">Not a member yet? Register Here</a></br>
        </div>
    </main>    
</html>

<?php

$error = Application::$app->session->getFlash('errorUser');

if ($error  !== false) {
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
                    icon: 'error',
                    title: '$error'
                })
            });
        </script>
        ";
}