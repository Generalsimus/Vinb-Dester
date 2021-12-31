
var opt = optionaddopt('<div id="controll"><label for="txtare">Theme Data:</label><br><textarea id="txtare" rows="4" >Copyright 2018 By Vinb Dester All rights reserved. Powered by WordPress & Vinb Dester Theme</textarea></div>')

var txt = opt.querySelector('#txtare')




txt.oninput = funads
txt.onchange = funads

function funads() {
    document.querySelector('.footer>p').innerHTML=this.value;
    acehtml.setValue(htmlparse(this.value, 'P', 'class="', 'footer', 3,false))
}