


var opt = optionaddopt('<div id="controll"><button id="b">Remove Search Form</button><button id="d">Remove type</button></div>')

opt.querySelector('#controll #b').onclick =function(){
    // htmlparse('','div','id="','for',0,true)
   var pare = document.querySelector('.'+document.querySelector('#tooltable').getAttribute('data').split(',')[1])
   pare.removeChild(pare.querySelector('#for'))

    acehtml.setValue(htmlparse('','div','id="','for',0,true))
    acecss.setValue(cssparse('.head>div:first-child','width:','100%'))
    document.querySelector('.head').firstElementChild.style.width = '100%'
}
opt.querySelector('#controll #d').onclick =function(){
   var str = "asdsdsdsdsdsdsd 'post_type'=>'video' sdsdsdsdsdsdsdsdsdsdsd".replace("/'post_type'=>'[\s\S]*?'/",' replace ');
   console.log(str)
}