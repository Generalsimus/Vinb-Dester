document.getElementById('mentuc').onclick = function () {

    var men = this.nextElementSibling
    
    if (men.classList.contains('navig')) {
        men.className = men.className.replace(/\bnavig\b/g, "navigg");
    } else {
        men.className = men.className.replace(/\bnavigg\b/g, "navig");
    }
};