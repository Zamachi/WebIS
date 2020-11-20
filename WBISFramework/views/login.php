<?php

use app\core\Field;
use app\core\Form;
//var_dump($model);
?>

<html>
    <main class="wrapper">
        <div class="middle">
            <!-- <form action="loginProcess" method="POST" class="login-form">
            <label for="mail" class="form-label">Enter your e-mail:</label></br>
            <input type="email" name="mail" class="mail" placeholder="email"></br>
            <label for="password" class="form-label">Enter your password:</label></br>
            <input type="password" name="password" class="password" placeholder="password"></br>
            <button type="submit" class="login-button">Send</button></br>
            </form> -->

            <?php echo Form::beginForm("loginProcess","post","login-form") ?>
                <?php echo Form::field($model,"mail","email") ?>
                <?php echo Form::field($model,"password","password") ?>
                <?php echo "<button type='submit' class='login-button'>Send</button></br>" ?>
            <?php echo Form::endForm() ?>
            <a href="/register" class="redirect-button">Not a member yet? Register Here</a></br>
        </div>
    </main>    
</html>