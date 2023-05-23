<main class="container">
    <h1>Backend</h1>

    <?php
    include "includes/pages.php";

    foreach ($pagesHandler->getPages() as $page) {

        ?>
        <div>
            <a class="my-5" href="?page=<?= $page->getFileName() ?>"><?= $page->getFileName() ?></a>
        </div>
        <?php
        var_dump($page);
    } ?>
</main>