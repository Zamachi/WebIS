<?php ?>

<html>
    <main class="wrapper">
        <div class="middle">
            <form action="loginProcess" method="POST" class="login-form">
            <label for="mail" class="form-label">Enter your e-mail:</label></br>
            <input type="email" name="mail" class="mail" placeholder="email"></br>
            <label for="password" class="form-label">Enter your password:</label></br>
            <input type="password" name="password" class="password" placeholder="password"></br>
            <button type="submit" class="login-button">Send</button></br>
            </form>
            <a href="/register" class="redirect-button">Not a member yet? Register Here</a></br>
        </div>
    </main>    
</html>