<?php

use app\core\Field;
use app\core\Form;

// var_dump($model);
?>

<html>
<main class="wrapper">
    <div class="middle">
        <!-- <form> -->
        <?php echo Form::beginForm("/registerProcess", "post", "register-form") ?>
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

</html>