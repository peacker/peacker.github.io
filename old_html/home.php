<?php
  include "page_template.html"
?>

<div id="temp-content" style="display: none;">

  <div id="gallery-container">

    <div id="central-image">
      <br><br><br>
      <p style="text-align: center; font: white;">

        Welcome to my website!<br>
        I hope you will enjoy it and find useful stuff!<br>

      </p>
    </div>

    <div class="home-img-container" >
      <a href="about.php">
      <img src="img/jump-250px-square.png" onmouseover="this.style.filter='grayscale(100%)'; this.style.opacity='0.5'" 
                              onmouseout="this.style.filter='grayscale(0%)'; this.style.opacity='1'"> 
      <div class="img-desc"><b>ABOUT</b></div>
      </a>
    </div>

    <div class="home-img-container" >
      <a href="research.php">
      <img src="img/research-250px.jpg" onmouseover="this.style.filter='grayscale(100%)'; this.style.opacity='0.5'" 
                                  onmouseout="this.style.filter='grayscale(0%)'; this.style.opacity='1'"> 
      <div class="img-desc"><b>RESEARCH</b></div>
      </a>
    </div>

    <div class="home-img-container" >
      <a href="programming.php">
      <img src="img/programming6-250px.jpg" onmouseover="this.style.filter='grayscale(100%)'; this.style.opacity='0.5'" 
                                      onmouseout="this.style.filter='grayscale(0%)'; this.style.opacity='1'"> 
      <div class="img-desc"><b>PROGRAMMING</b></div>
      </a>
    </div>

    <div class="home-img-container" >
      <a href="contact.php">
      <img src="img/contact3-250px.jpg" onmouseover="this.style.filter='grayscale(100%)'; this.style.opacity='0.5'" 
                                  onmouseout="this.style.filter='grayscale(0%)'; this.style.opacity='1'"> 
      <div class="img-desc"><b>CONTACT</b></div>
      </a>
    </div>

    <div class="home-img-container" >
      <a href="teaching.php">
      <img src="img/teaching-250px.jpg" onmouseover="this.style.filter='grayscale(100%)'; this.style.opacity='0.5'" 
                                  onmouseout="this.style.filter='grayscale(0%)'; this.style.opacity='1'"> 
      <div class="img-desc"><b>TEACHING</b></div>
      </a>
    </div>

  </div>

</div>


<script>
var chapter = 'home' ;
var x = document.getElementById('temp-content') ;
document.getElementById('main').innerHTML = x.innerHTML ;
</script>

<script>
var radians, radius, originX, originY;
var x, y;
var angle;
var num_element;
var t;
var rect;
var img_width, img_height;

// set main background
t = document.getElementById('main') ;
t.style.backgroundColor = 'transparent';

img_width  = '175';
img_height = '175';
radius = 275; // radius of the big circle

// gallery-container style
t = document.getElementById('gallery-container');
//t.innerHTML = t.offsetTop + ", " + t.offsetLeft + "-- " + t.offsetBottom + ", " + t.offsetRight ;
t.style.position = 'relative' ;
t.style.margin = '0 auto' ;
t.style.textAlign = 'center' ;
//t.style.top = '100';
//t.style.left = '100';
t.style.width = '750px';
var temp;
temp = parseInt(2*radius) + parseInt(img_height) ;
t.style.height = temp.toString() + 'px'; //'100%';
//t.style.backgroundColor = 'white';

rect = t.getBoundingClientRect();
//t.innerHTML = rect.top + ", " + rect.left + " -- " + rect.bottom + ", " + rect.right ;

// set origin in the middle of the container
originX = (rect.right-rect.left)/2 - img_width/2;
originY = (rect.bottom-rect.top)/2 - img_height/2 - 100;

// central element
t = document.getElementById('central-image');
x = originX;
y = originY;
t.style.left = x + 'px';
t.style.top =  y + 'px';
//t.innerHTML = x + ',' + y;

// central-image style
t = document.getElementById('central-image');
t.style.position = 'absolute' ;
//t.style.border = '1px solid black';
t.style.borderRadius = '50%';
t.style.width = img_width + 'px';
t.style.height = img_height + 'px';

t = document.getElementsByClassName('home-img-container');
num_element = t.length / 2; // not clear why t.lenght returns 
                            // twice the supposed length... ?????

angle = 2*Math.PI/num_element ;
// home-img-container style
for (i = 0; i < num_element; i++) {
  t[i].style.paddingBottom = '40px';
  t[i].style.position = 'absolute' ;
  //t[i].style.border = '1px solid black';
  t[i].style.borderRadius = '50%';
  //t[i].style.margin = '30px';
  t[i].style.width = img_width + 'px';
  t[i].style.height = img_height + 'px';

  t[i].getElementsByClassName('img-desc')[0].style.color = '#707070';

  // circle parameters
  t[i].getElementsByTagName('img')[0].style.height = img_width + 'px';
  t[i].getElementsByTagName('img')[0].style.width = img_height + 'px';
  t[i].getElementsByTagName('img')[0].style.borderRadius = '50%';
  x = originX + ((4/4)*Math.cos(angle*(i) - Math.PI/2 - angle/2) * radius);
  y = originY + ((4/4)*Math.sin(angle*(i) - Math.PI/2 - angle/2) * radius);
  t[i].style.left = x + 'px';
  t[i].style.top =  y + 'px';
  //t.innerHTML = x + ',' + y + '<br> t' + i.toString() + '<br> a=' + angle*i ;
}
</script>
