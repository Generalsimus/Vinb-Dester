document.getElementById('mentuc').onclick = function () {

    var men = this.nextElementSibling
    
    if (men.classList.contains('navig')) {
        men.className = men.className.replace(/\bnavig\b/g, "navigg");
    } else {
        men.className = men.className.replace(/\bnavigg\b/g, "navig");
    }
};
var chil = document.querySelectorAll('.reitling_last>button');

var vidbook = document.querySelector('.bookdate')
vidbook.innerHTML = vidbook.innerHTML.replace(/((https:||http:)\/\/[^\s]+)/gi, '<a href="$1">$1</a>');

[].map.call(chil, function (o) {
  var pores = document.querySelector('.videobook').id;
  if (localStorage.getItem(o.id) !== null) {

    var storage = localStorage.getItem(o.id).split(",")

    if (storage.indexOf(pores) > -1) {
      o.classList.add("active");
    }
  }

  o.onclick = function () {
    var start = Date.now();

    var clas = this.nextElementSibling || this.previousElementSibling
    this.classList.add("active");
    clas.classList.remove("active")
    var form = new FormData()
    if (localStorage.getItem(this.id) == null) {
      var arrr = []
    } else {
      var arrr = localStorage.getItem(this.id).split(",,").join("").split(",")
    }
    console.log(arrr.indexOf(pores))
    var trb = false
    if (arrr.indexOf(pores) > -1 || trb) {
      return
    }
    var b = false
    trb = true
    if (localStorage.getItem(clas.id) !== null) {
      var dm = localStorage.getItem(clas.id).split(",")
      if (dm.indexOf(pores) > -1) {
        var mat = Math.abs(clas.lastElementChild.innerHTML)
        if (mat > 0) {
          clas.lastElementChild.innerHTML = mat - 1
        }
        form.append('replace', 'true')
        var b = true
      }
    }
    var ls = this.lastElementChild
    ls.innerHTML = Math.abs(ls.innerHTML) + 1
    form.append(this.id, pores)
    var hr = new XMLHttpRequest();
    hr.onload = function () {
      trb = false
      var json = JSON.parse(hr.response)
      if (json.method == 'like' || json.method == 'dislike') {
        if (b) {
          dm = dm.filter(function (value) {
            return value !== pores;
          });
          localStorage.setItem(clas.id, dm)
        }
        arrr.push(json.location)
        localStorage.setItem(json.method, arrr)

      }
      var ssss = Date.now();
      console.log((ssss - start) / 1000)
    }
    hr.open("POST", "/wp-content/themes/Vinb%20Dester/savetemplib/singvideoreiting.php");
    hr.send(form);
  }
})

document.querySelector('.dateshow').onclick = function () {

  console.log(this.previousElementSibling.classList)
  cla = document.querySelector('.bookdate').classList;
  if (cla.contains('activeshow')) {
    cla.remove('activeshow')
  } else {
    cla.add('activeshow')
  }

}






// comments js
function getcomuser(value) {
  var com = document.createElement('ul');

  var date = document.querySelector('.vidcom').getAttribute('date')
  com.innerHTML = '<li class="commautor"><img src="' + date + '"><div><span class="nm">soska</span><span class="ago">New</span><div class="comm">' + value + '</div></div></li>';
  return com;
}


function requestcommen(value, pareid, calval, callfun) {
  var sen = new XMLHttpRequest();
  sen.onload = function () {
    callfun(calval,value)
  }
  calval.previousElementSibling.value = ''
  sen.open("POST", "/wp-comments-post.php");
  sen.setRequestHeader("Content-type", "application/x-www-form-urlencoded");


  sen.send('&comment=' + value + '&submit=Post Comment&comment_parent=' + pareid + '&comment_post_ID=' + document.querySelector('.videobook').id);
}



document.querySelector('.comtop .secom').onmousedown = function () {
  
  requestcommen(this.previousElementSibling.value, 0, this, function (calval,value) {

    var adds = calval.parentElement.parentElement.nextElementSibling;
    adds.insertBefore(getcomuser(value).firstElementChild, adds.firstElementChild)
    
  })

}




var comform;
var allrep = document.querySelectorAll('.commautor .rep');
var divrep = document.createElement('div');
divrep.className = 'commform';
divrep.innerHTML = '<div><textarea class="txt" placeholder="Comment.."></textarea><button class="secom">Post Comment</button></div>';
[].map.call(allrep, function (o) {
  o.onclick = function () {
    var clon = divrep.cloneNode(true);
    var sdsds = this.parentElement.nextElementSibling
    if (comform && sdsds == comform) {

      return;
    } else if (comform && sdsds) {

      comform.parentElement.removeChild(comform);
    }
    this.parentElement.parentElement.appendChild(clon)
    comform = clon

    clon.querySelector('.commautor .secom').onclick = function () {
      var parent = this.parentElement.parentElement
      var pa = parent.parentElement
      console.log(pa.id)
      requestcommen(this.previousElementSibling.value, pa.id, this, function (calval,value) {
        var com = getcomuser(value)

        var parent = calval.parentElement.parentElement
        var pa = parent.parentElement

        if (pa.nextElementSibling && pa.nextElementSibling.nodeName == 'UL') {
          pa.nextElementSibling.appendChild(com.firstElementChild);
        } else if (pa.nextElementSibling) {
          pa.parentElement.insertBefore(com, pa.nextElementSibling);
        } else {
          pa.parentElement.appendChild(com)
        }


        pa.removeChild(parent);

      })








    }

  }
});


// ..............
document.getElementById('mentuc').onclick = function () {

    var men = this.nextElementSibling
    
    if (men.classList.contains('navig')) {
        men.className = men.className.replace(/\bnavig\b/g, "navigg");
    } else {
        men.className = men.className.replace(/\bnavigg\b/g, "navig");
    }
};
var chil = document.querySelectorAll('.reitling_last>button');

var vidbook = document.querySelector('.bookdate')
vidbook.innerHTML = vidbook.innerHTML.replace(/((https:||http:)\/\/[^\s]+)/gi, '<a href="$1">$1</a>');

[].map.call(chil, function (o) {
  var pores = document.querySelector('.videobook').id;
  if (localStorage.getItem(o.id) !== null) {

    var storage = localStorage.getItem(o.id).split(",")

    if (storage.indexOf(pores) > -1) {
      o.classList.add("active");
    }
  }

  o.onclick = function () {
    var start = Date.now();

    var clas = this.nextElementSibling || this.previousElementSibling
    this.classList.add("active");
    clas.classList.remove("active")
    var form = new FormData()
    if (localStorage.getItem(this.id) == null) {
      var arrr = []
    } else {
      var arrr = localStorage.getItem(this.id).split(",,").join("").split(",")
    }
    console.log(arrr.indexOf(pores))
    var trb = false
    if (arrr.indexOf(pores) > -1 || trb) {
      return
    }
    var b = false
    trb = true
    if (localStorage.getItem(clas.id) !== null) {
      var dm = localStorage.getItem(clas.id).split(",")
      if (dm.indexOf(pores) > -1) {
        var mat = Math.abs(clas.lastElementChild.innerHTML)
        if (mat > 0) {
          clas.lastElementChild.innerHTML = mat - 1
        }
        form.append('replace', 'true')
        var b = true
      }
    }
    var ls = this.lastElementChild
    ls.innerHTML = Math.abs(ls.innerHTML) + 1
    form.append(this.id, pores)
    var hr = new XMLHttpRequest();
    hr.onload = function () {
      trb = false
      var json = JSON.parse(hr.response)
      if (json.method == 'like' || json.method == 'dislike') {
        if (b) {
          dm = dm.filter(function (value) {
            return value !== pores;
          });
          localStorage.setItem(clas.id, dm)
        }
        arrr.push(json.location)
        localStorage.setItem(json.method, arrr)

      }
      var ssss = Date.now();
      console.log((ssss - start) / 1000)
    }
    hr.open("POST", "/wp-content/themes/Vinb%20Dester/savetemplib/singvideoreiting.php");
    hr.send(form);
  }
})

document.querySelector('.dateshow').onclick = function () {

  console.log(this.previousElementSibling.classList)
  cla = document.querySelector('.bookdate').classList;
  if (cla.contains('activeshow')) {
    cla.remove('activeshow')
  } else {
    cla.add('activeshow')
  }

}






// comments js
function getcomuser(value) {
  var com = document.createElement('ul');

  var date = document.querySelector('.vidcom').getAttribute('date')
  com.innerHTML = '<li class="commautor"><img src="' + date + '"><div><span class="nm">soska</span><span class="ago">New</span><div class="comm">' + value + '</div></div></li>';
  return com;
}


function requestcommen(value, pareid, calval, callfun) {
  var sen = new XMLHttpRequest();
  sen.onload = function () {
    callfun(calval,value)
  }
  calval.previousElementSibling.value = ''
  sen.open("POST", "/wp-comments-post.php");
  sen.setRequestHeader("Content-type", "application/x-www-form-urlencoded");


  sen.send('&comment=' + value + '&submit=Post Comment&comment_parent=' + pareid + '&comment_post_ID=' + document.querySelector('.videobook').id);
}



document.querySelector('.comtop .secom').onmousedown = function () {
  
  requestcommen(this.previousElementSibling.value, 0, this, function (calval,value) {

    var adds = calval.parentElement.parentElement.nextElementSibling;
    adds.insertBefore(getcomuser(value).firstElementChild, adds.firstElementChild)
    
  })

}




var comform;
var allrep = document.querySelectorAll('.commautor .rep');
var divrep = document.createElement('div');
divrep.className = 'commform';
divrep.innerHTML = '<div><textarea class="txt" placeholder="Comment.."></textarea><button class="secom">Post Comment</button></div>';
[].map.call(allrep, function (o) {
  o.onclick = function () {
    var clon = divrep.cloneNode(true);
    var sdsds = this.parentElement.nextElementSibling
    if (comform && sdsds == comform) {

      return;
    } else if (comform && sdsds) {

      comform.parentElement.removeChild(comform);
    }
    this.parentElement.parentElement.appendChild(clon)
    comform = clon

    clon.querySelector('.commautor .secom').onclick = function () {
      var parent = this.parentElement.parentElement
      var pa = parent.parentElement
      console.log(pa.id)
      requestcommen(this.previousElementSibling.value, pa.id, this, function (calval,value) {
        var com = getcomuser(value)

        var parent = calval.parentElement.parentElement
        var pa = parent.parentElement

        if (pa.nextElementSibling && pa.nextElementSibling.nodeName == 'UL') {
          pa.nextElementSibling.appendChild(com.firstElementChild);
        } else if (pa.nextElementSibling) {
          pa.parentElement.insertBefore(com, pa.nextElementSibling);
        } else {
          pa.parentElement.appendChild(com)
        }


        pa.removeChild(parent);

      })








    }

  }
});


// ..............
document.getElementById('mentuc').onclick = function () {

    var men = this.nextElementSibling
    
    if (men.classList.contains('navig')) {
        men.className = men.className.replace(/\bnavig\b/g, "navigg");
    } else {
        men.className = men.className.replace(/\bnavigg\b/g, "navig");
    }
};
