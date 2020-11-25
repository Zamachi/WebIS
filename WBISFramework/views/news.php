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

            <?php echo Form::beginForm("newsProcess","post","news-form") ?>
                <?php echo Form::field($model,"title","text") ?>
                <?php echo Form::field($model,"description","") ?> <!-- drugi argument treba da bude za textArea -->
                <?php echo Form::field($model,"file","file") ?>
                <?php echo "<button type='submit' class='news-button'>Send</button></br>" ?>
                <?php echo "<button type='reset' class='reset-button'>Reset Fields</button></br>" ?>
            <?php echo Form::endForm() ?>
        </div>
    </main>    
</html>