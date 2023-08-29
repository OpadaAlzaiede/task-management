
<?php require base_path('views/partials/banner.php'); ?>

<main>
    <div class="mx-auto max-w-7xl py-6 sm:px-6 lg:px-8">
        <p> Hello <?= isset($_SESSION['user']) ?  $_SESSION['user']['email'] : 'Guest'?> Welcome to the Home page !</p>
    </div>
</main>

<?php require base_path('views/partials/footer.php'); ?>
