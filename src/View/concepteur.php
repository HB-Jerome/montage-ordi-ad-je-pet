<section>
    <div class="container d-flex">
        <div id="concepteur" class="bo border col-6">
            <article class="bo border border-secondary p-4 m-5">
                <a href="?page=listPiece" class="link-secondary text-decoration-none">
                    <h2 class="text-center">Liste complète des pièces</h2>
                </a>
            </article>

            <article class="bo border border-secondary p-4 m-5">
                <a href="?page=listModel" class="link-secondary text-decoration-none">
                    <h2 class="text-center">Modèles et le nombre d'exemplaires montés</h2>
                </a>
            </article>
            <article class="bo border border-secondary p-4 m-5">
                <a href="?page=listModel" class="link-secondary text-decoration-none">
                    <h2 class="text-center">Liste complète des modélès</h2>
                </a>
            </article>
        </div>

        <aside id="messageAside" class="bo border p-3 col-6">
            <h2 id="commentTitle" class="text-center"> Commentaires des monteurs</h2>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th scope="col">Message</th>
                        <th scope="col">Date </th>
                        <th scope="col">Nom </th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($results as $result) {
                        ?>
                        <tr>
                            <td class="col-1">
                                <?= $result->getUsername(); ?>
                            </td>
                            <td class="col-1">
                                <?= $result->getMessage(); ?>
                            </td>
                            <td class="col-1">
                                <?= $result->getCommentDate(); ?>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </aside>
    </div>
</section>