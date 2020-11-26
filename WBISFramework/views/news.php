<?php

use app\core\Field;
use app\core\Form;
//var_dump($model);
?>

<html>
    <main class="wrapper">
        <div class="middle">
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