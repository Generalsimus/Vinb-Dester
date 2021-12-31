
var opt = optionaddopt('<div id="controll"><label for="colorpiker">Background Color: </label><input id="colorpiker" type="Color" name="color" style="border: none;" value="#7e7e7e"></div>')

opt.querySelector('#colorpiker').oninput = funadss
opt.querySelector('#colorpiker').onchange = funadss

function funadss() {
    var vl = this.value;
    acecss.setValue(cssparse('.mintitl{', 'background:', vl))
    acecss.setValue(cssparse('.mintitl:after{', 'background:', vl));
    
    var sheet = document.head.querySelector('#mintitl').sheet;
    
    
    sheet.insertRule('.mintitl{background:'+vl+'!important;}', sheet.cssRules.length);
    sheet.insertRule('.mintitl:after{ background:'+vl+' !important; }', sheet.cssRules.length);

}