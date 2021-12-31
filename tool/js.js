(function (d, h, b) {
    // selectors
    function set(t, a) {
        [].forEach.call(a, function (o) {
            t.setAttribute(o[0], o[1])

        })
    }

    function qr(s, t) {
        return typeof t == 'undefined' ? d.querySelector(s) : t.querySelector(s);
    }

    function id(s) {
        return d.getElementById(s);
    }

    function ap(t, c) {
        t.appendChild(c);
    }

    function el(t) {
        return d.createElement(t);
    }

    function fi(t) {
        return t.firstElementChild;
    }

    function pv(t) {
        return t.previousElementSibling;
    }

    function pr(t) {
        return t.parentElement;
    }

    function ie(t, i) {
        return typeof i == 'undefined' ? t.innerHTML : t.innerHTML = i;
    }
    // ..................


    function request(n, item, array, s, callbozo) {

        var hr = new XMLHttpRequest();
        hr.onload = function () {

            callbozo(JSON.parse(hr.response), item, s)
        }
        hr.open("POST", "?option=req");
        hr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");

        hr.send('temid=' + n + '&po=' + item + '&array=' + array);

    }

    function optionaddopt(inner) {
        var md = qr('#tooltable'),
            opt = qr('#sourc>#option', md)
        ie(opt, inner)
        var span = el('span')
        ie(span, 'Option')
        span.id = 'option'
        ap(qr('#htmbar', md), span)
        return opt;
    }





    //     parserebi
    function cssparse(selector, cssname, value) {
        var textarea = acecss.getValue();
        if (textarea.indexOf(" {") !== -1) {
            while (textarea.indexOf(" {") !== -1) {
                textarea = textarea.replace(/ {/g, "{");
            }
        }
        var ind = textarea.indexOf(cssname, textarea.indexOf(selector));

        var text = textarea.substring(ind);

        return textarea.substring(0, ind + cssname.length) + value + text.substring(text.indexOf(";"));
    }

    function htmlparse(inner, tag, selector, selectornm, child, replace) {
        var texthtml = acehtml.getValue(),
            regex = /<[^/^>]+>/g;


        while ((result = regex.exec(texthtml))) {

            if (result[0].includes(selector)) {
                var res = result[0].indexOf(selector) + selector.length,
                    inc = result[0].substring(res, result[0].indexOf(selector.slice(-1), res));

                if (inc.includes(selectornm)) {


                    var regex1 = /<[^/][^(input|path|img)][^>]+>/g,
                        regex2 = /<\/[^>]+>/g,
                        result1,
                        result2,
                        i = 0;

                    while (i < child && (result = regex.exec(texthtml))) {
                        i++
                    }



                    var befor = texthtml.substring(result.index + (replace ? 0 : result[0].length));
                    while ((result2 = regex2.exec(befor)) && (result1 = regex1.exec(befor)) && result1.index < result2.index) {}


                    var after = texthtml.substring(0, result.index + (replace ? 0 : result[0].length))

                    befor = befor.substring(replace ? (function () {
                        var m = regex2.exec(befor);
                        return m.index + m[0].length;
                    })() : result2.index)
                    // console.log( after + inner + befor)
                    return after + inner + befor;




                }

            }
        }

    }
    // ........................





    var acehtml = ace.edit("acehtml");
    acehtml.setTheme("ace/theme/twilight");
    acehtml.session.setMode("ace/mode/php");

    var acecss = ace.edit("acecss");
    acecss.setTheme("ace/theme/twilight");
    acecss.session.setMode("ace/mode/css");

    var acejs = ace.edit("acejs");
    acejs.setTheme("ace/theme/twilight");
    acejs.session.setMode("ace/mode/javascript");

    function replaceclass(item, iner) {
        var div = el('div')
        ie(div, iner)
        var cla = d.getElementsByClassName(item);
        var rd = fi(div);

        cla = Array.prototype.slice.call(cla);
        [].forEach.call(cla, function (index) {
            var clon = rd.cloneNode(true)


            pr(index).replaceChild(clon, index);
        })

    }


    function replachtml(json, item, s) {

        var j = id(item)
        if (j) {
            pr(j).removeChild(j);
        }
        var cs = id(item)
        if (cs) {
            pr(cs).removeChild(cs);
        }

        function loadcss() {
            if (json.php) {
                replaceclass(item, json.php)
            } else {
                [].forEach.call(d.querySelectorAll('.' + item), function (o) {

                    set(o, [
                        ['style', '']
                    ])
                })
            }
        }


        if (json.css) {
            var css = el('link');
            set(css, [
                ['rel', 'stylesheet'],
                ['type', 'text/css'],
                ['id', item],
                ['href', json.css]
            ])

            ap(h, css)
            css.onload = loadcss()
        } else {
            loadcss()
        }



        if (json.js) {
            eval(json.js)
        }




        tobcheck()
    }


    function tobrun(tob, item) {
        tob.onclick = function (e) {
            var s = this.id,
                ti = d.elementFromPoint(e.clientX, e.clientY).id





            var n = Math.abs(this.getAttribute('data').split(',')[0])
            if (ti == 'hean') {
                n++
            } else if (ti == 'set') {
                var opt = optionaddopt('<div class="optspinner"></div>');

                [].forEach.call(pr(opt).children, function (itm) {
                    itm.style.display = 'none'
                })
                opt.style.display = 'block'

                ie(fi(pv(pr(opt))), '')

                request(n, item + '&text=true', 'php,js,css', s, function (json, itemdat) {

                    var sp = id('htmbar'),
                        tg = pr(sp).nextElementSibling;

                    set(pr(tg), [
                        ['data', n + ',' + itemdat.split('&')[0] + ',' + s]
                    ])

                    ie(sp, '')

                    if (json.optionphp) {
                        optionaddopt(json.optionphp)
                    }
                    if (json.optionjs) {
                        eval(json.optionjs)
                    }


                    if (json.optioncss) {
                        var va = el('link')

                        set(va, [
                            ['rel', 'stylesheet'],
                            ['type', 'text/css'],
                            ['href', json.optioncss]
                        ])
                        va.id = 'optioncss'

                        if (qr('#optioncss', h)) {

                            h.replaceChild(va, qr('#optioncss', h))
                        } else {

                            ap(h, va)
                        }
                    }


                    if (json.php) {
                        var span = el('span')
                        ie(span, 'Html In PHP')
                        span.id = 'acehtml'
                        ap(sp, span)
                        acehtml.setValue(json.php)
                    }


                    if (json.css) {
                        acecss.setValue(json.css)
                        var span = el('span')
                        span.id = 'acecss'
                        ie(span, 'Css')
                        ap(sp, span)
                    }
                    if (json.js) {
                        acejs.setValue(json.js)
                        var span = el('span')
                        span.id = 'acejs'
                        ie(span, 'Js')
                        ap(sp, span)
                    }


                    fi(tg).style.display = 'none'

                    qr('#' + fi(sp).id, tg).style.display = 'table-row';
                })

                pr(tl).style.display = 'block';
                return
            } else if (ti == 'heab') {
                n--
            }
            var bin = ie(fi(tob)).split('/')
            if (bin[1] < n) {
                n = 0
            } else if (n < 0) {
                n = bin[1]
            }

            ie(fi(tob), n + '/' + bin[1])


            tm.style.display = 'none'
            ie(fi(qr('#tooltable>#sourc')), '')

            set(this, [
                ['data', n]
            ])

            request(n, item, 'php,js,css', s, replachtml)


            // this.nextElementSibling.innerHTML = '<div class="lds-ellipsis"><div></div><div></div><div></div><div></div></div>';

        }

    }


    var araaytob = [
        ['head', 3],
        ['slid', 4],
        ['singvideo', 1],
        ['singpost', 1],
        ['post', 2],
        ['widget', 1, 'hide'],
        ['footer', 1],
        ['mintitl', 4],
        ['registeruser', 1],
        ['socacc', 1]
    ];

    function tobcheck() {
        araaytob.forEach(function (item, index) {

            var ln = d.getElementsByClassName(item[0])


            if (ln && !item[2]) {

                for (i = 0; i < ln.length; i++) {
                    if (!pv(ln[i]) || pv(ln[i]).className !== 'tob') {
                        var tob = el('div')

                        set(tob, [
                            ['class', 'tob'],
                            ['data', 0],
                            ['data-class', item[0]],
                            ['id', index]
                        ])



                        var li = el('li')
                        li.className = 'hidenbx'
                        ie(li, '<div class="d">' + item[0][0].toUpperCase() + item[0].slice(1) + '</div> <ul> ' + (function (t) {
                            var s = '',
                                i = 0;
                            for (i; i < t[1]; i++) {
                                s = s + '<li><label><input type="radio" name="' + t[0] + '" ' + (i == 0 ? 'checked' : '') + '><img src="http://localhost/222.png">    </label>  </li>'
                            }
                            return s;
                        })(item) + ' </ul>')


                        li.onclick = function (e) {
                            this.className = this.className == 'openedbx' ? 'hidenbx' : 'openedbx'
                            if (d.csave && d.csave !== this) {
                                d.csave.className = 'hidenbx';

                            }

                            d.csave = this

                        }

                        ap(qr('.controlpanel ul'), li);


                        ie(tob, '<span>0/' + item[1] + '</span><img id="set" src="/wp-content/themes/Vinb%20Dester/lib/images/setting.svg"><img class="ba" id="heab" src="/wp-content/themes/Vinb%20Dester/lib/images/back.svg"><img class="ba" id="hean" src="/wp-content/themes/Vinb%20Dester/lib/images/next.svg">')

                        pr(ln[i]).insertBefore(tob, ln[i]);
                        tobrun(tob, item[0])
                    }
                }
            }


        })
    }
    tobcheck()



    // tooltablesiaaaa

    var tm = id('tooltable'),
        tl = tm.children[0]


    // window dragerr droper :DDD



    tm.onmousedown = function (e) {
        var elm = pr(id('htmbar')).nextElementSibling,
            x = e.clientX,
            y = e.clientY,
            lf = tm.offsetLeft,
            ri = tm.offsetTop,
            wd = tm.offsetWidth,
            hg = elm.offsetHeight

        var po = d.elementFromPoint(e.clientX, e.clientY)


        if (po.nodeName == 'SPAN') {

            for (i = 0; i < elm.children.length; i++) {

                if (po.id == 'close') {
                    tm.style.display = 'none'
                }
                var ds = elm.children[i]
                ds.style.display = elm.children[i].id == po.id ? 'block' : 'none';

            }
            return
        } else if (po.id !== 'resize' && po.id !== 'htmbar') {
            console.log(po)
            return
        }

        e.preventDefault();


        function rer(e) {

            if (po.className == 'neresize') {
                tm.style.width = wd - (e.clientX - x) + 'px'
                elm.style.height = hg + (e.clientY - y) + 'px'
            } else {
                tm.style.top = ri + e.clientY - y + 'px'
            }
            tm.style.left = lf + e.clientX - x + 'px'
        }
        d.addEventListener("mousemove", rer)
        d.onmouseup = function () {
            d.removeEventListener("mousemove", rer);

        }
    }


    id('applysave').onclick = function () {

        var form = new FormData()
        var doc = id('htmbar').children
        var tit = tm.getAttribute('data').split(',')
        form.append('po', tit[1])
        form.append('num', tit[0])
        arr = ''
        for (i = 0; i < doc.length; i++) {

            var ine = ie(doc[i]).replace(/\s/g, "")
            if (ine == 'HtmlInPHP') {
                arr += 'php,'
                form.append('php', acehtml.getValue());
            }
            if (ine == 'Css') {
                arr += 'css,'

                form.append('css', acecss.getValue());
            }
            if (ine == 'Js') {
                arr += 'js'
                form.append('js', acejs.getValue());
            }
        }

        var hr = new XMLHttpRequest();
        hr.onload = function () {
            if (hr.response.trim() == 'true') {

                set(pv(qr('.' + tit[1])), [
                    ['data', 0]
                ])


                request(0, tit[1], arr, tit[2], replachtml)
            } else {

                ie(qr('#tooltable>p'), 'error please try again')
            }
        }
        hr.open("POST", "?option=savef");
        hr.send(form);

    }









    // inaxavs mtlian pages
    qr('.template-save').onclick = function () {

        var va = d.getElementsByClassName('tob'),
            form = new FormData(),
            dt = [];
        console.log(araaytob);

        [].forEach.call(araaytob, function (o) {
            var t = qr('.' + o[0])
            if (t) {
                dt.push([o[0], pv(t).getAttribute('data')])

                if (t.classList[0] !== o[0]) {
                    dt[dt.length - 1].push('css')
                } else if (pr(t).id == 'site') {
                    dt[dt.length - 1].push('priority')
                }
            }



        })



        form.append('data', JSON.stringify(dt))
        form.append('page', id("site").className)

        var xre = new XMLHttpRequest();
        xre.onload = function () {
            console.log(xre.response)
        }
        xre.open("POST", "?option=savefu");


        xre.send(form);


    }
    // ...............


    // ..........


    // gverdita panelis gamxsnel damxuravi js
    qr('.controlpanel .c').onclick = function () {
        var qu = qr('.controlpanel');
        if (qu.classList.contains('controlopen')) {
            qu.classList.remove('controlopen');
            qu.classList.add('controlhide');
        } else {
            qu.classList.remove('controlhide');
            qu.classList.add('controlopen');
        }


    }
    // .........................





})(document, document.head, document.body)