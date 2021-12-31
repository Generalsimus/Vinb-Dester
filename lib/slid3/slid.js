var x = 0,
pr = document.querySelector('.slid>.s'),
ln = pr.children.length,
s = setInterval(sliderfun, 6000),
ml = 0,
child = document.querySelector('.slid .slcou').children;

function sliderfun(m) {
if (document.hidden) {
    return;
}
clearInterval(s)
n = m == 'back' ? x - 100 : x + 100;
c=Math.floor(n / (ln * 100)) * ln * 100;
ml = (n - c) / 100;
(n > x ? (child[ml - 1] || child[child.length - 1]) : (child[ml + 1] || child[0])).style.opacity = '.5';
pr.children[ml].style.left =   n + '%';
child[ml].style.opacity = '1';
    if(n/100>ln-2 || -1 * n>0){
        pr.children[ml].style.position='absolute';
           }
           
pr.style.left = -1 * n + '%';
x = n;
s = setInterval(sliderfun, 6000)
}
        









//     var x = 0,
//     pr = document.querySelector('.slid>.s'),
//     ln = pr.children.length,
//     s = setInterval(sliderfun, 6000),
//     ml = 0,
//     child = document.querySelector('.slid .slcou').children;

// function sliderfun(m) {
//     if (document.hidden) {
//         return;
//     }
//     clearInterval(s)
//     n = m == 'back' ? x - 100 : x + 100;
//     c=Math.floor(n / (ln * 100)) * ln * 100;
//     ml = (n - c) / 100;
//     (n > x ? (child[ml - 1] || child[child.length - 1]) : (child[ml + 1] || child[0])).style.opacity = '.5';
//     pr.children[ml].style.transform = 'translateX(' + c + '%)';
//     child[ml].style.opacity = '1';
//     pr.style.marginLeft = -1 * n + '%';
//     x = n;
//     s = setInterval(sliderfun, 6000)
// }