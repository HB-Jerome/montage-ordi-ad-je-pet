<section>
    <h2 class="text-center p-4">Liste des pièces</h2>
    <!-- filtre -->
    <div>
        <!-- <aside class="col 12 col-md-2">
            <form>
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Email address</label>
                    <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                    <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
                </div>
                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">Password</label>
                    <input type="password" class="form-control" id="exampleInputPassword1">
                </div>
                <div class="mb-3 form-check">
                    <input type="checkbox" class="form-check-input" id="exampleCheck1">
                    <label class="form-check-label" for="exampleCheck1">Check me out</label>
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </aside> -->
        <div class="col 12 col-md-10">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th scope="col">Id</th>
                        <th scope="col">Nom</th>
                        <th scope="col">Marque</th>
                        <th scope="col">Déscription</th>
                        <th scope="col">Prix</th>
                        <th scope="col">Type de Pc</th>
                        <th scope="col">Disponibilité</th>
                    </tr>
                </thead>
                <?php
                // select itemes from database
                // var_dump($results);
                ?>
                <tbody>
                    <!-- show items on the page -->
                    <?php foreach ($results as $result) { ?>
                        <tr>
                            <th scope="row">
                                <?= $result["idComponent"]; ?>
                            </th>
                            <td>
                                <?= $result['name']; ?>
                            </td>
                            <td>
                                <?= $result['brand']; ?>
                            </td>
                            <td>
                                <?= $result['description']; ?>
                            </td>
                            <td>
                                <?= $result['price']; ?>
                            </td>
                            <td>
                                <?= $result['pcType']; ?>
                            </td>
                            <td>
                                <?= $result['isArchived']; ?>
                            </td>
                        </tr>

                        <?php
                    } ?>

                </tbody>
            </table>
        </div>
    </div>

</section>