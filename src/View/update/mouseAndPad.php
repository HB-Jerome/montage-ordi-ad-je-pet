<div class="form-group">
    <label for="mouseIsWireless">Wireless/Not Wireless</label>
    <input class="form-control" name="mouseIsWireless" id="mouseIsWireless" <?php if ($updateResult->getMouseIsWireless() == 0) {
        ?>value="0" <?php
    } else {
        ?> value="1" <?php } ?>>
        
</div>
<div class="form-group">
    <label for="numberOfKey">Number of keys</label>
    <input type="text" class="form-control" name="numberOfKey" id="numberOfKey"
        value="<?= $updateResult->getNumberOfKey(); ?>">
</div>