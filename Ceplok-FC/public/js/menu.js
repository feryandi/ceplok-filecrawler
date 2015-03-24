function toggleMenu() {
	var element = document.getElementById('menu');
	var m = document.getElementById('menu-button');
	var i = document.getElementById('button-icon');

    style = window.getComputedStyle(element),
    left = style.getPropertyValue('left'),
	nLeft = Number(left.replace("px",""));

    if (nLeft == '0')
    {
      element.style.animation = 'goIn 2s 0s linear forwards';
   	 	element.style.webkitAnimation = 'goIn 2s 0s linear forwards';
      element.style.mozAnimation = 'goIn 2s 0s linear forwards';
   	 	m.style.backgroundColor = '#2d2f45';
      i.style.animation = 'rotationN 0.5s 0s linear forwards';
   	 	i.style.webkitAnimation = 'rotationN 0.5s 0s linear forwards';
      i.style.mozAnimation = 'rotationN 0.5s 0s linear forwards';
    }
    else 
    {
      element.style.animation = 'goOut 0.5s 0s linear forwards';
   	 	element.style.webkitAnimation = 'goOut 0.5s 0s linear forwards';
      element.style.mozAnimation = 'goOut 0.5s 0s linear forwards';
	 	m.style.backgroundColor = '#101010';
      i.style.animation = 'rotation 0.5s 0s linear forwards';
   	 	i.style.webkitAnimation = 'rotation 0.5s 0s linear forwards';
      i.style.mozAnimation = 'rotation 0.5s 0s linear forwards';
    }
}