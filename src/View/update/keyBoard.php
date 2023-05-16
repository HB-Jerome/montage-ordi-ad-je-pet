<div class="form-group">
        <label for="keybordIsWireless">keybordIsWireless</label>
        <input type="text" class="form-control" name="keybordIsWireless" id="keybordIsWireless"<?php if ($updateResult->getKeybordIsWireless() == 0) {
        ?>value="0" <?php
    } else {
        ?> value="1" <?php } ?>>
    </div>
    <div class="form-group">
        <label for="withPad">withPad</label>
        <input type="text" class="form-control" name="withPad" id="withPad" <?php if ($updateResult->getWithPad() == 0) {
        ?>value="0" <?php
    } else {
        ?> value="1" <?php } ?>>
    </div>
    <div class="form-group">
        <label for="keyType">keyType</label>
        <input type="text" class="form-control" name="keyType" id="keyType" value="<?= $updateResult->getKeyType(); ?>">
    </div>