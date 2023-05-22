<?php
if ($login->isSubmited()) {
    if (empty($login->getErrors())) {
        ?>
        <div class="alert alert-success" role="alert">
            This is a success !
        </div>
        <?php
    } else {
        foreach ($login->getErrors() as $error) {
            ?>
            <div class="alert alert-danger" role="alert">
                <?= $error ?>
            </div>
            <?php
        }
    }
}
?>
<form method="POST">
    <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">Username</label>
        <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="username"
            value=<?= $login->getUsername() ?>>
    </div>
    <div class="mb-3">
        <label for="exampleInputPassword1" class="form-label">Password</label>
        <input type="password" class="form-control" id="exampleInputPassword1" name="password"
            value=<?= $login->getPassword() ?>>
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
</form>
