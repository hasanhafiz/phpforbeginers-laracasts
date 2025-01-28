<?php require base_path("views/partials/header.php"); ?>
<?php require base_path("views/partials/nav.php"); ?>
<?php require base_path("views/partials/banner.php"); ?>

<main>
    <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">
        <p class="mb-6"><a class="text-blue-500" href="/notes">Go back</a></p>
    
        <p><?= $note['body'] ?></p>
    </div>
</main>

<?php require base_path("views/partials/footer.php"); ?>