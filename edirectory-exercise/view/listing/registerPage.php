<?php include __DIR__ . '/../auxiliaries/header.php'; ?>

<br />

<form action="/create-listing-attempt" method="POST">
    <div class="form-group">
        <label for="title"> Title </label>
        <input id="title" class="form-control" name="title" type="text" placeholder = "Type your username">
    <br />

        <label for="address"> Address </label>
        <input id="address" class="form-control" name="address" type="text"  placeholder = "Type your Address">
    <br />

        <label for="city"> City </label>
        <input id="city" class="form-control" name="city" type="text"  placeholder = "Type your city">
    <br />

        <label for="state"> State </label>
        <input id="state" class="form-control" name="state" type="text"  placeholder = "Type your state">
    <br />

        <label for="description"> Description </label>
        <textarea id="description" class="form-control" name="description" cols="30" rows="5" placeholder = "Type Listing Description"></textarea>
    <br />

        <label for="category"> Category </label>
        <input id="category" class="form-control" name="category" type="text" placeholder = "Type your category">
    <br />
    </div>

    <button class="btn btn-primary"> Create </button>
    <br />

</form>

<?php include __DIR__ . '/../auxiliaries/footer.php'; ?>