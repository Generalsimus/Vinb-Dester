var opt = optionaddopt('<div id="controll"><form id="conform"><label for="colorpiker">Background color :</label><input id="colorpiker" type="Color" name="color" style="border: none;" value="#7e7e7e"><br><label for="padtop">Padding Top</label><input id="padtop" type="range" name="padsize" min="0" max="100"><br><label for="padbot">Padding Bottom :</label><input id="padbot" type="range" name="padsize" min="0" max="100"><br><label for="padw">Width :</label><input id="padw" type="range" name="padsize" min="0" max="100"><br><label for="texop">Text input :</label><input id="texop" type="text" name="padsize"><br><label for="tosptype">Post type :</label><select id="tosptype" name="posttype"><option value="volvo">Video</option><option value="saab">Post</option></select></form></div>');
var position = document.getElementById('tooltable').getAttribute('data').split(',')[2]
var sld = document.getElementById('site').children[Math.abs(position) * 2 + 1]

var pad = opt.querySelector('#padtop')
pad.oninput = rantop
pad.onchange = rantop
opt.querySelector('#padbot').oninput = ranbo
opt.querySelector('#padbot').onchange = ranbo


opt.querySelector('#padw').oninput = wdth
opt.querySelector('#padw').onchange = wdth


opt.querySelector('#texop').oninput = titletg
opt.querySelector('#texop').onchange = titletg



var pt = 2
var pb = 2
var w = 6
var css = document.getElementById('Css')

function rantop() {
  pt = this.value / 10
  sld.style.padding = pt + '% ' + w + '% ' + pb + '% ' + w + '%'
  acecss.setValue(cssparse('.slid{','padding:', sld.style.padding))
}

function ranbo() {
  pb = this.value / 10
  sld.style.padding = pt + '% ' + w + '% ' + pb + '% ' + w + '%'
  acecss.setValue(cssparse('.slid{','padding:', sld.style.padding))
}

function wdth() {
  w = this.value / 5
  sld.style.padding = pt + '% ' + w + '% ' + pb + '% ' + w + '%'
  acecss.setValue(cssparse('.slid{','padding:', sld.style.padding))
}
function titletg(){
  document.getElementById('slbox').parentNode.children[0].innerHTML = this.value
  // htmlparse(this.value,'div','class="','slid',2,false)
  acehtml.setValue(htmlparse(this.value,'div','class="','slid',2,false))
}


opt.querySelector('#colorpiker').oninput = function () {
  sld.style.background = this.value;
  acecss.setValue(cssparse('.slid{','background:', this.value))
}