var x = 0,
pr = document.querySelector('.slid>#b'),
ln = pr.children.length,
s = setInterval(sliderfun, 6000),
ml = 0;

function sliderfun(m) {
if (document.hidden) {
    return;
}
clearInterval(s)
n = m == 'back' ? x - 100 : x + 100;
c=Math.floor(n / (ln * 100)) * ln * 100;
ml = (n - c) / 100;
pr.children[ml].style.transform = 'translateX(' + c + '%)';
pr.style.marginLeft = -1 * n + '%';
x = n;
s = setInterval(sliderfun, 6000)
}