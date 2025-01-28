<?php require base_path("views/partials/header.php"); ?>
<?php require base_path("views/partials/nav.php"); ?>
<?php require base_path("views/partials/banner.php"); ?>

<main>
    <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">
        <h1 class="text-3xl font-bold underline">
            Welcome to notes pages
        </h1>
        <ul class="mt-6">
            <?php foreach ($notes as $note): ?>
            <li> 
                <a href="/note?id=<?= $note['id'] ?>" class="text-blue-500 hover:underline" > <?= $note['body'] ?> </a>
            </li>                
            <?php endforeach ?>
        </ul>
        
        <p class="mt-6"> <a class="text-blue-500 text-2xl text-bold hover:underline" href="/notes/create">Create Note</a></p>
    </div>
</main>

<?php require base_path("views/partials/footer.php"); ?>