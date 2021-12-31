var opt = optionaddopt('<div class="a"><button type="button" class="b"><p>Play Icon</p><img src="/wp-content/themes/Vinb%20Dester/lib/post1/play/10.png"></button><ul class="c" style="position: absolute;"><li><img id="play" src="/wp-content/themes/Vinb%20Dester/lib/post1/play/0.png"></li><li><img id="play" src="/wp-content/themes/Vinb%20Dester/lib/post1/play/1.png"></li><li><img id="play" src="/wp-content/themes/Vinb%20Dester/lib/post1/play/2.png"></li><li><img id="play" src="/wp-content/themes/Vinb%20Dester/lib/post1/play/3.png"></li><li><img id="play" src="/wp-content/themes/Vinb%20Dester/lib/post1/play/4.png"></li><li><img id="play" src="/wp-content/themes/Vinb%20Dester/lib/post1/play/5.png"></li><li><img id="play" src="/wp-content/themes/Vinb%20Dester/lib/post1/play/6.png"></li><li><img id="play" src="/wp-content/themes/Vinb%20Dester/lib/post1/play/7.png"></li><li><img id="play" src="/wp-content/themes/Vinb%20Dester/lib/post1/play/8.png"></li><li><img id="play" src="/wp-content/themes/Vinb%20Dester/lib/post1/play/9.png"></li><li><img id="play" src="/wp-content/themes/Vinb%20Dester/lib/post1/play/10.png"></li><li><img id="play" src="/wp-content/themes/Vinb%20Dester/lib/post1/play/11.png"></li><li><img id="play" src="/wp-content/themes/Vinb%20Dester/lib/post1/play/12.png"></li></ul></div><br><label for="colorpiker">Background color :</label><input id="colorpiker" type="Color" name="color" style="border: none;" value="#ffffff"><br><label for="txtare">Ad Source Code: </label><br><textarea id="txtare" rows="4"></textarea>')




opt.querySelector('.b').onclick = function () {
    var a = this.nextElementSibling
    a.style.position = 'relative';
    document.onmousedown = function (e) {
        var ti = document.elementFromPoint(e.clientX, e.clientY)
        if (ti.id == 'play') {
            opt.querySelector('#option .b img').src = ti.getAttribute('src');
            
            acecss.setValue(cssparse('.vpost>a:first-child:before{', 'background:', '#000000 url(' + ti.getAttribute('src') + ') no-repeat center center'))

        }
        if (ti.className == 'c') {
            return
        }

        a.style.position = 'absolute';
    }
}


document.getElementById('colorpiker').oninput = function () {
    document.querySelector('.post').style.background = this.value;
    acecss.setValue(cssparse('.post{','background:', this.value))
  }


  var txt = opt.querySelector('#txtare')
txt.oninput = funads
txt.onchange = funads

function funads() {
    acehtml.setValue(htmlparse(this.value, 'div', 'class="', 'inadpos',0,false))
}