var s = setInterval(re, 6000)
var x = 0

var pr = document.getElementById('prew');
var ln = pr.children.length
var sl = document.getElementById('slbox')


function re() {
    if (document.hidden) {
        return;
    }

    x += 100
    var ml = (x - Math.floor(x / (ln * 100)) * ln * 100) / 100
    if (x > 200) {
        pr.children[ml].style.transform = 'translateX(' + Math.floor(x / (ln * 100)) * ln * 100 + '%)';
    }
    var po = sl.children[ml - 1]
    if (po) {
        po.style.backgroundColor = "#8c8c8c";
    } else {
        sl.children[ln - 1].style.backgroundColor = "#8c8c8c";
    }
    sl.children[ml].style.backgroundColor = "#e73737";
    pr.style.marginLeft = '-' + x + '%';
};