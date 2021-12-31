var spo = document.getElementsByClassName('spos')

for(i=0;i<spo.length;i++){
    spo[i].onclick = function (e) {
    var ti = document.elementFromPoint(e.clientX, e.clientY)
    if(this==ti){return}
    ti.style.background = '#e73737';
    if(ti.nextElementSibling){
        ti.nextElementSibling.style.background = '#8c8c8c';
    }else if(ti.previousElementSibling){
        ti.previousElementSibling.style.background = '#8c8c8c';
    }

    this.parentElement.nextElementSibling.children[0].style.marginLeft = Math.abs(ti.id) * -100 + '%'
}
};