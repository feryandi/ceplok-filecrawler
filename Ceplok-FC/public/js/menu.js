function toggleMenu() {
  var element = document.getElementById('menu');
  var m = document.getElementById('menu-button');
  var i = document.getElementById('button-icon');
  var contain = document.getElementById('main');
    style = window.getComputedStyle(element),
    left = style.getPropertyValue('left'),
	 nLeft = Number(left.replace("px",""));

  if (nLeft == '0')
  {
    element.style.animation = 'goIn 0.5s 0s linear forwards';
 	 	element.style.webkitAnimation = 'goIn 0.5s 0s linear forwards';
    element.style.mozAnimation = 'goIn 0.5s 0s linear forwards';

    m.style.animation = 'goIn 0.5s 0s linear forwards';
    m.style.webkitAnimation = 'goIn 0.5s 0s linear forwards';
    m.style.mozAnimation = 'goIn 0.5s 0s linear forwards';

    i.style.animation = 'rotationN 0.5s 0s linear forwards';
     	i.style.webkitAnimation = 'rotationN 0.5s 0s linear forwards';
    i.style.mozAnimation = 'rotationN 0.5s 0s linear forwards';

    contain.style.animation = 'goInMain 0.5s 0s linear forwards';
    contain.style.webkitAnimation = 'goInMain 0.5s 0s linear forwards';
    contain.style.mozAnimation = 'goInMain 0.5s 0s linear forwards';
    }
    else 
    {
    element.style.animation = 'goOut 0.5s 0s linear forwards';
    element.style.webkitAnimation = 'goOut 0.5s 0s linear forwards';
    element.style.mozAnimation = 'goOut 0.5s 0s linear forwards';

    m.style.animation = 'goOut 0.5s 0s linear forwards';
    m.style.webkitAnimation = 'goOut 0.5s 0s linear forwards';
    m.style.mozAnimation = 'goOut 0.5s 0s linear forwards';


      i.style.animation = 'rotation 0.5s 0s linear forwards';
   	 	i.style.webkitAnimation = 'rotation 0.5s 0s linear forwards';
      i.style.mozAnimation = 'rotation 0.5s 0s linear forwards';

      contain.style.animation = 'goOutMain 0.5s 0s linear forwards';
      contain.style.webkitAnimation = 'goOutMain 0.5s 0s linear forwards';
      contain.style.mozAnimation = 'goOutMain 0.5s 0s linear forwards';
    }
}


function goTop() {
    $('html, body').animate({
          scrollTop: $("#query-form").offset().top
      }, 500);  
}

function toggleResult() {
  var e = document.getElementById('result-slide');

  e.style.animation = 'goIn 0.5s 0s linear forwards';
  e.style.webkitAnimation = 'goIn 0.5s 0s linear forwards';
  e.style.mozAnimation = 'goIn 0.5s 0s linear forwards';
}

function toggleExt() {
  var e = document.getElementById('ext-holder');

  var style = window.getComputedStyle(e),
  top = style.getPropertyValue('top'),
  nTop = Number(top.replace("px",""));

  if ( nTop <= -15) {
    e.style.animation = 'showExt 0.5s 0s linear forwards';
    e.style.webkitAnimation = 'showExt 0.5s 0s linear forwards';
    e.style.mozAnimation = 'showExt 0.5s 0s linear forwards';
  } else {
    e.style.animation = 'hideExt 0.5s 0s linear forwards';
    e.style.webkitAnimation = 'hideExt 0.5s 0s linear forwards';
    e.style.mozAnimation = 'hideExt 0.5s 0s linear forwards';    
  }
}

function toggleON(n) {
      var e = document.getElementById(n);

      e.style.animation = 'goOut 0.5s 0s linear forwards';
      e.style.webkitAnimation = 'goOut 0.5s 0s linear forwards';
      e.style.mozAnimation = 'goOut 0.5s 0s linear forwards';
}

function toggleOFF(n) {
  var e = document.getElementById(n);

  e.style.animation = 'goIn 0.5s 0s linear forwards';
  e.style.webkitAnimation = 'goIn 0.5s 0s linear forwards';
  e.style.mozAnimation = 'goIn 0.5s 0s linear forwards';  
}