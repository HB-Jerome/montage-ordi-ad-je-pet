<div class="form-group ">
    <label for="discCapacity">discCapacity</label>
    <input type="number" class="form-control" name="discCapacity" id="discCapacity"
        value="<?= $component->getDiscCapacity(); ?>">
</div>
<div class="form-group ">
    <label for="ssd">Ssd</label>
    <select class="form-control" name="ssd">
        <option <?php echo $string = $component->getSsd() ? "selected" : "" ?> value=1>true</option>
        <option <?php echo $string = !$component->getSsd() ? "selected" : "" ?> value=0>false</option>
    </select>
</div>