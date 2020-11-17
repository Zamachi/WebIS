<?php 

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/main.css">
    <link href="./css/font-awesome.min.css" rel="stylesheet">
    <title>Login/Register</title>
    <style>
        *{ padding: 0; margin: 0; clear: both;}
        .autorizacija {
            text-align: center;
            margin-top: calc(50vh - 19em);
        }

        .autorizacija > form > * { margin-top: 1em;}
    </style>
</head>
<body>
    <main class="autorizacija">

        <h1 class="h1-view">Please, input your credentials</h1>
        <a href="/index" class="back-button">Go back</a>
            {{ renderSection }}
    </main>
</body>
</html>
