<?php include __DIR__ . '/../auxiliaries/header.php'; ?>

<div class="jumbotron">
    <h1 class="display-4"><?php echo $listing->getTitle();?> !</h1>
    <p class="lead"> <?php echo $listing->getDescription();?> </p>
    <hr class="my-4">
    <p> City - <?php echo $listing->getCity(); ?> </p>
    <p> State - <?php echo $listing->getState(); ?> </p>
    <p> Address - <?php echo $listing->getAddress();?> </p>

    <?php
    $categoriesArray = $listing->getCategories();
    foreach ($categoriesArray as $category): ?>
        <span class="badge badge-dark"><?php echo $category; ?></span>
    <?php endforeach; ?>
</div>


<br/>
<a href="/search" class="btn btn-primary">Back</a>
<br />

<?php include __DIR__ . '/../auxiliaries/footer.php'; ?>