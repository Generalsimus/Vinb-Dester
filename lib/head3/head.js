document.getElementById('msv').onclick = function () {
   var men = document.getElementById('men')
men.style.transition = 'transform .6s ease'
   if (men.classList.contains('menanimh')) {
      men.className = men.className.replace(/\bmenanimh\b/g, "menanim");
   } else {
      men.className = men.className.replace(/\bmenanim\b/g, "menanimh");
   }
};