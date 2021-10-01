<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>

<nav class="navbar navbar-light" style="background-color: #e3f2fd;">
    <a class="navbar-brand" href="/search">Home Page</a>
        <ul class="navbar-nav mr-auto">
<?php if(isset($_SESSION['logged'])): ?>
    <li class="nav-item active">
        <a class="nav-link" href="/create-listing">Create Listing</a>
    </li>

    <li class="nav-item active">
        <a class="nav-link" href="/logout">Logout</a>
    </li>
<?php else: ?>
    <li class="nav-item active">
        <a class="nav-link" href="/login">Login</a>
    </li>

    <li class="nav-item active">
        <a class="nav-link" href="/create-user">Create Account</a>
    </li>
<?php endif ?>
    </ul>
</nav>

<br>

<?php if(isset($_SESSION['message'])): ?>
<div class="alert alert-<?=$_SESSION['message_type']?>" role="alert">
    <?= $_SESSION['message'] ?>
</div>
<?php
    //Remove info from messages
    unset($_SESSION['message']);
    unset($_SESSION['message_type']);
endif; ?>