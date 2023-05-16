<div class="form-group">
        <label for="coreNumber">coreNumber</label>
        <input type="text" class="form-control" name="coreNumber" id="coreNumber" value="<?= $updateResult->getCoreNumber(); ?>">
    </div>
    <div class="form-group">
        <label for="compatibleChipset">compatibleChipset</label>
        <input type="text" class="form-control" name="compatibleChipset" id="compatibleChipset" value="<?= $updateResult->getCompatibleChipset(); ?>">
    </div>
    <div class="form-group">
        <label for="cpuFrequency">cpuFrequency</label>
        <input type="text" class="form-control" name="cpuFrequency" id="cpuFrequency" value="<?= $updateResult->getCpuFrequency(); ?>">
    </div>