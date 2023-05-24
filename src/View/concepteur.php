<section>
    <div class="container d-flex">
        <div id="concepteurComp" class="bo m-1" >
            <article class="bo border border-secondary p-5 m-3">
                <a href="?page=listPiece" class="link-secondary text-decoration-none">
                    <h2 class="text-center">Liste complète des pièces</h2>
                </a>
            </article>

            <article class="bo border border-secondary p-5 m-3">
                <a href="?page=listModel" class="link-secondary text-decoration-none">
                    <h2 class="text-center">Modèles et le nombre d'exemplaires montés</h2>
                </a>
            </article>
            <article class="bo border border-secondary p-5 m-3">
                <a href="?page=listModel" class="link-secondary text-decoration-none">
                    <h2 class="text-center">Liste complète des modélès</h2>
                </a>
            </article>
        </div>

        <aside id="messageAside" class="bo border border-secondary p-3 m-1">
            <h4 class = "text-center"> commentaires des monteurs</h4>
            <ul id="concepteur" class = "list-unstyled">
                <?php foreach ($results as $result) { ?>
                    <li> <?= $result ;?></li>
                <?php } ?>
            </ul>

            <form  class="mt-3" id="concepteurMessage">

                <div class="mb-2">
                    <label for="exampleFormControlTextarea1" class="form-label text-center">
                        <h3>Ecrire un commentaire</h3>
                    </label>
                    <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" placeholder="votre commentaire"></textarea>
                </div>
                <input type="submit" class="form-control" value="Envoyer">
            </form>
        </aside>
    </div>
</section>