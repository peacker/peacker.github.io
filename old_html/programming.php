<?php
  include "page_template.html"
?>

<div id="temp-content" style="display: none;">
  <h3>Programming</h3>
  <hr>
  <br>

  <div>
    <h4><a href="ccpp.php">C/C++</a></h4><br>
    In this page you can find some useful exercises and 
    c/c++ programs I have been using. 
    <br><br><hr><br>

    <h4><a href="magma.php">Magma</a></h4><br>
    In this page you can find the Magma code of either intrinsics 
    (ready to be installed as a Magma package) or functions 
    (ready to be loaded within a Magma workspace).
    <br><br><hr><br>

    <h4><a href="java.php">Java</a></h4><br>
    In this page you can find some useful exercises and 
    Java programs I have been using.
    <br><br><hr><br>

    <h4><a href="sage.php">Sage</a></h4><br>
    Work in progress...
    <br><br><hr><br>

    <h4><a href="python.php">Python</a></h4><br>
    Work in progress...
    <br><br><hr><br>
  </div>
</div>

<script>
var chapter = 'programming' ;
var x = document.getElementById("temp-content") ;
document.getElementById("main").innerHTML = x.innerHTML ;
</script>

<!--
-->

