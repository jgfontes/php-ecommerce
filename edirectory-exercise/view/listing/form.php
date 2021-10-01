<?php include __DIR__ . '/../auxiliaries/header.php'; ?>

<form action="/check-login" method="post">
    <div  class="form-group">
        <label for="email"> Email </label>
        <input id="username" class="form-control" name="username" type="text" placeholder="Type your email"></input>
    </div>
    <br />
    <div>
        <label for="password"> Password </label>
        <input id="password" class="form-control" name="password" type="password" placeholder="Type your password"></input>
    </div>
    <br />

    <button class="btn btn-primary"> Login </button>
</form>

<?php include __DIR__ . '/../auxiliaries/footer.php'; ?>