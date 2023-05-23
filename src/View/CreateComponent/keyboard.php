<div class="form-group ">
    <label for="keybordIsWireless">keybordIsWireless</label>
    <select class="form-control" name="keybordIsWireless">
        <option <?php echo $string = ($component->getKeybordIsWireless()) ? "selected" : "" ?> value=1>true</option>
        <option <?php echo $string = !($component->getKeybordIsWireless()) ? "selected" : "" ?> value=0>false</option>
    </select>
</div>
<div class="form-group">
    <label for="withPad">withPad</label>
    <select class="form-control" name="withPad">
        <option <?php echo $string = ($component->getWithPad()) ? "selected" : "" ?> value=1>true</option>
        <option <?php echo $string = !($component->getWithPad()) ? "selected" : "" ?> value=0>false</option>
    </select>
</div>
<div class="form-group">
    <label for="keyType">keyType</label>
    <input type="text" class="form-control" name="keyType" id="keyType" value="<?= $component->getKeyType() ?>">
</div>