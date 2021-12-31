
var opt = optionaddopt('<div id="controll"><label for="txtare">Ad Source Code: </label><br><textarea id="txtare" rows="4" ></textarea></div>')

var txt = opt.querySelector('#txtare')



txt.oninput = funads
txt.onchange = funads

function funads() {
    acehtml.setValue(htmlparse(this.value, 'div', 'class="', 'head', 3))
}