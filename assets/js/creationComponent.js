let category = document.querySelector("#category");
let attributChild = document.querySelector("#attributChild");

let graphicCard = `
<div class="form-group ">
<label for="chipset">Chipset</label>
<input type="text" class="form-control" name="chipset" id="chipset" >
</div>
<div class="form-group ">
<label for="memory">Memory</label>
<input type="text" class="form-control" name="memory" id="memory">
</div>`;
let hardDisc = `
<div class="form-group ">
<label for="discCapacity">discCapacity</label>
<input type="number" class="form-control" name="discCapacity" id="discCapacity" >
</div>
<div class="form-group ">
<label for="ssd">Ssd</label>
<select class="form-control" name="ssd">
<option value=1>true</option>
<option value=0>false</option>
</select>
</div>`;
let keyboard = `
<div class="form-group ">
<label for="keybordIsWireless">keybordIsWireless</label>
<select class="form-control" name="keybordIsWireless">
<option value=1>true</option>
<option value=0>false</option>
</select>
</div>
<div class="form-group">
<label for="withPad">withPad</label>
<select class="form-control" name="withPad">
<option value=1>true</option>
<option value=0>false</option>
</select>
</div>
<div class="form-group">
<label for="keyType">keyType</label>
<input type="text" class="form-control" name="keyType" id="keyType">
</div>`;
let motherBoard = `<div class="form-group">
<label for="socket">socket</label>
<input type="text" class="form-control" name="socket" id="socket" >
</div>
<div class="form-group">
<label for="format">format</label>
<input type="text" class="form-control" name="format" id="format" >
</div>`;
let mouseAndPad = `
<div class="form-group">
<label for="mouseIsWireless">mouseIsWireless</label>
<select class="form-control" name="mouseIsWireless">
<option value=1>true</option>
<option value=0>false</option>
</select>
</div>
<div class="form-group">
<label for="numberOfKey">Number of keys</label>
<input type="text" class="form-control" name="numberOfKey" id="numberOfKey">
</div>`;
let powerSupply = `<div class="form-group">
<label for="batteryPower">batteryPower</label>
<input type="text" class="form-control" name="batteryPower" id="batteryPower">
</div>`;
let processor = `
<div class="form-group">
<label for="coreNumber">coreNumber</label>
<input type="number" class="form-control" name="coreNumber" id="coreNumber">
</div>
<div class="form-group">
<label for="compatibleChipset">compatibleChipset</label>
<input type="text" class="form-control" name="compatibleChipset" id="compatibleChipset" >
</div>
<div class="form-group">
<label for="cpuFrequency">cpuFrequency</label>
<input type="number" class="form-control" name="cpuFrequency" id="cpuFrequency">
</div>`;
let ram = `
<div class="form-group">
<label for="ramCapacity">ramCapacity</label>
<input type="number" class="form-control" name="ramCapacity" id="ramCapacity">
</div>
<div class="form-group">
<label for="numberOfBars">numberOfBars</label>
<input type="number" class="form-control" name="numberOfBars" id="numberOfBars">
</div>
<div class="form-group">
<label for="detail">detail</label>
<input type="text" class="form-control" name="detail" id="detail" >
</div>`;
let screen = `
<div class="form-group">
<label for="size">size</label>
<input type="number" class="form-control" name="size" id="size">
</div>`;

category.onchange = (e) => {
  let curentCategory = e.target.value;
  console.log(curentCategory);
  switch (curentCategory) {
    case "GraphicCard":
      attributChild.innerHTML = graphicCard;
      break;
    case "HardDisc":
      attributChild.innerHTML = hardDisc;
      break;
    case "Keyboard":
      attributChild.innerHTML = keyboard;
      break;
    case "MotherBoard":
      attributChild.innerHTML = motherBoard;
      break;
    case "MouseAndPad":
      attributChild.innerHTML = mouseAndPad;
      break;
    case "PowerSupply":
      attributChild.innerHTML = powerSupply;
      break;
    case "Processor":
      attributChild.innerHTML = processor;
      break;
    case "Ram":
      attributChild.innerHTML = ram;
      break;
    case "Screen":
      attributChild.innerHTML = screen;
      break;
  }
};
