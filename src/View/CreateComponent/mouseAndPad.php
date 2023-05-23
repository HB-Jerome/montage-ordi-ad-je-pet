<div class="form-group">
    <label for="mouseIsWireless">mouseIsWireless</label>
    <select class="form-control" name="mouseIsWireless">
        <option <?php echo $string = $component->getMouseIsWireless() ? "selected" : "" ?> value=1>true</option>
        <option <?php echo $string = !$component->getMouseIsWireless() ? "selected" : "" ?> value=0>false</option>
    </select>
</div>
<div class="form-group">
    <label for="numberOfKey">Number of keys</label>
    <input type="text" class="form-control" name="numberOfKey" id="numberOfKey"
        value="<?= $component->getNumberOfKey(); ?>">
</div>