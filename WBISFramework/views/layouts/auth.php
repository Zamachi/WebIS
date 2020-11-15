<?php ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <style>
        *{ padding: 0; margin: 0; clear: both;}
        .autorizacija {
            text-align: center;
            margin-top: calc(50vh - 165px);
        }

        .autorizacija > form > * { margin-top: 10px;}
    </style>
</head>
<body>
    <main class="autorizacija">

        <h1>Ovo je layout za autorizovanje</h1>
            {{ renderSection }}

    </main>
</body>
</html>
