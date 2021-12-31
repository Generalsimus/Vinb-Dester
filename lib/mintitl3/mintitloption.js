var opt = optionaddopt('<div id="controll"><label for="colorpiker">Background Color: </label><input id="colorpiker" type="Color" name="color" style="border: none;" value="#7e7e7e"></div>')


opt.querySelector('#colorpiker').oninput = funadss
opt.querySelector('#colorpiker').onchange = funadss

function funadss() {
    var vl = this.value
    acecss.setValue(cssparse('.mintitl{', 'border-bottom:', '.15em solid '+vl));
    [].forEach.call(document.querySelectorAll('.mintitl'), function (o) {
        o.style.borderBottom = '.15em solid'+vl;
    })
    
}