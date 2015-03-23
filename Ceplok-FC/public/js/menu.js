function toggleMenu() {
	var element = document.getElementById('menu');
	var m = document.getElementById('menu-button');
	var i = document.getElementById('button-icon');

    style = window.getComputedStyle(element),
    left = style.getPropertyValue('left'),
	nLeft = Number(left.replace("px",""));

    if (nLeft == '0')
    {
   	 	element.style.webkitAnimation = 'goIn 2s 0s linear forwards';
   	 	m.style.backgroundColor = '#2d2f45';
   	 	i.style.webkitAnimation = 'rotationN 0.5s 0s linear forwards';
    }
    else 
    {
   	 	element.style.webkitAnimation = 'goOut 0.5s 0s linear forwards';
	 	m.style.backgroundColor = '#101010';
   	 	i.style.webkitAnimation = 'rotation 0.5s 0s linear forwards';
    }
}