var opt = optionaddopt('<div id="controll"><label for="colorpiker">Background Color: </label><input id="colorpiker" type="Color" name="color" style="border: none;" value="#7e7e7e"></div>')



opt.querySelector('#colorpiker').oninput = funadss
opt.querySelector('#colorpiker').onchange = funadss

function funadss(){
var colo = "rgb(" + this.value.match(/[A-Za-z0-9]{2}/g).map(function(v) { return parseInt(v, 16) }).join(",") + ")";
var bor= this.value.match(/[A-Za-z0-9]{2}/g).map(function(v) { return parseInt(v, 16) });
bor[0]=bor[0]*0.6;
bor[1]=bor[1]*0.6;
bor[2]=bor[2]*0.6;
bor ='15px solid rgb('+bor.join(",")+')'
acecss.setValue(cssparse('.mintitl{','background:', colo))
acecss.setValue(cssparse('.mintitl{','border-left:', bor));
[].forEach.call(document.querySelectorAll('.mintitl'), function (o) {
    o.style.backgroundColor=colo;
    o.style.borderLeft=bor;
    })
}