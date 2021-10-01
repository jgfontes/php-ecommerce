<?php include __DIR__ . '/../auxiliaries/header.php'; ?>

<br />

<form action="/create-user-attempt" method="POST">
    <div class="form-group">

        <label for="email"> Email </label>
        <input id="email" class="form-control" name="email" type="text"  placeholder = "Type your email">
    <br />

        <label for="password"> Password </label>
        <input id="password" class="form-control" name="password" type="password" placeholder="Type your Password">
    <br />

        <label for="username"> Name </label>
        <input id="username" class="form-control" name="username" type="text" placeholder = "Type your Name">
    <br />

        <label for="telephone"> Telephone </label>
        <input id="telephone" class="form-control" name="telephone" type="text"  placeholder = "Type your telephone">
    <br />

    <button class="btn btn-primary"> Create User </button>
</form>

<?php include __DIR__ . '/../auxiliaries/footer.php'; ?>