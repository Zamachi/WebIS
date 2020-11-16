<?php 
$drzave = [];
?>

<html>
    <div class="middle">
        <form action="#" method="POST" class="register-form">
             <label for="mail" class="form-label">Enter your e-mail:</label><br>
             <input type="email" name="mail" class="mail" placeholder="email@email.com"><br>
            <label for="password" class="form-label">Enter your password:</label><br>
            <input type="password" name="password" class="password" placeholder="password"><br>
            <label for="datumRodjenja" class="form-label">Choose your date of birth:</label><br>
            <input type="date" name="datumRodjenja" class="date"><br>
            <label for="drzava" class="form-label">Choose your country:</label><br>
            <select name="country" class="country">
        
            </select>
            <button type="submit" class="register-button">Send</button>
            <button type="reset" class="reset-button">Reset Fields</button>
        </form>
    </div>
</html>