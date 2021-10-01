<?php include __DIR__ . '/../auxiliaries/header.php'; ?>

<br />

<form action="/results" method="POST">
    <div class="form-group">
        <label for=""> Search </label>
        <input id="search" class="form-control" name="search" type="text" placeholder = "Search listing here">
    </div>
    <br />
    <button class="btn btn-primary"> Search </button>
</form>
<br />
<br />

<?php foreach ($listings as $listing):?>
    <div class="card" style="width: 22 rem;">
        <div class="card-body">
            <h5 class="card-title"> <?php echo $listing->getTitle(); ?> </h5>
            <p class="card-text"> <?php echo $listing->getDescription();  ?> </p>
            <a href="/detail?id=<?= $listing->getId()?>" class="btn btn-info">Check Detail</a>

            <?php if(isset($_SESSION['logged'])): ?>
                <a href="/delete-listing?id=<?= $listing->getId()?>" class="btn btn-danger">Delete Listing</a>
            <?php endif; ?>

        </div>
    </div
    <br />
<?php endforeach;?>


<?php include __DIR__ . '/../auxiliaries/footer.php'; ?>