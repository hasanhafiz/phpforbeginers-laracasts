<?php require base_path("views/partials/header.php"); ?>
<?php require base_path("views/partials/nav.php"); ?>
<?php require base_path("views/partials/banner.php"); ?>

<main>
    <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">
        <p class="mb-6"><a class="text-blue-500" href="/notes">Go back</a></p>
    
        <p><?= $note['body'] ?></p>
        
        <p class="mt-4">
            <a class="rounded-md bg-yellow-600 px-3 py-2 text-sm font-semibold text-white shadow-xs hover:bg-indigo-500 focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600" href="/note/edit?id=<?= $note['id'] ?>">Edit</a>
        </p>
        
        <form action="" method="post" class="mt-6">
            <input type="hidden" name="_method" value="DELETE">
            <input type="hidden" name="id" value="<?= $note['id'] ?>">
            <button class="text-red-500" type="submit">Delete</button>
        </form>
    </div>
</main>

<?php require base_path("views/partials/footer.php"); ?>