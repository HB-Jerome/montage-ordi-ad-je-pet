<div class="form-group">
    <label for="coreNumber">coreNumber</label>
    <input type="number" class="form-control" name="coreNumber" id="coreNumber"
        value="<?= $component->getcoreNumber(); ?>">
</div>
<div class="form-group">
    <label for="compatibleChipset">compatibleChipset</label>
    <input type="text" class="form-control" name="compatibleChipset" id="compatibleChipset"
        value="<?= $component->getCompatibleChipset(); ?>">
</div>
<div class="form-group">
    <label for="cpuFrequency">cpuFrequency</label>
    <input type="number" step="0.01" class="form-control" name="cpuFrequency" id="cpuFrequency"
        value="<?= $component->getCpuFrequency(); ?>">
</div>