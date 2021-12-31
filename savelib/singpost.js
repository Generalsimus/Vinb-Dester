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
  
  
    sen.send('&comment=' + value + '&submit=Post Comment&comment_parent=' + pareid + '&comment_post_ID=' + document.querySelector('.viewdat').id);
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
  divrep.innerHTML = '<div><textarea class="txt"></textarea><button class="secom">Post Comment</button></div>';
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