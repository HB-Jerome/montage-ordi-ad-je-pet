<div class="form-group">
    <label for="ramCapacity">ramCapacity</label>
    <input type="number" class="form-control" name="ramCapacity" id="ramCapacity"
        value="<?= $component->getRamCapacity(); ?>">
</div>
<div class="form-group">
    <label for="numberOfBars">numberOfBars</label>
    <input type="number" class="form-control" name="numberOfBars" id="numberOfBars"
        value="<?= $component->getNumberOfBars(); ?>">
</div>
<div class="form-group">
    <label for="detail">detail</label>
    <textarea class="form-control" name="detail" id="detail" value="<?= $component->getDetail(); ?>"
        rows=" 3"><?= $component->getDetail(); ?></textarea>
</div>