<?php

use app\core\Field;
use app\core\Form;
//var_dump($model);
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