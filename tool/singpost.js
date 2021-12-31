[].forEach.call(document.querySelectorAll('.usr-regis>span'), function (itm) {
    itm.onclick = function () {
        this.className = 'register_active'
        var b = this.previousElementSibling || this.nextElementSibling
        b.className = ''
        var elfi = this.parentElement.nextElementSibling
        var ella = elfi.nextElementSibling
        if (this.innerHTML == 'Login') {
            elfi.style.display = 'block'
            ella.style.display = 'none'
        } else {
            elfi.style.display = 'none'
            ella.style.display = 'block'
        }


    }
});
