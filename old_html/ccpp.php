<?php
  include "page_template.html"
?>

<div id="temp-content" style="display: none;">
<h3>C/C++</h3>
<hr>
<br>

<p>
In this page you can find some useful exercises and c/c++ programs
I have been using.
</p>
<br>
<p>
For any question do not hesitate to contact me!
</p>


<br><br>


<div class="magma-index">
  <h4><u>Index</u></h4>
  <br>
  <b>Symmetric Cryptography</b>
  <ul>
    <li><a href="#aes_template">AES with template</a></li>
    <li><a href="#crypto_course_lab">Cryptography Course Laboratory</a></li>
  </ul>


</div>
<br><br><hr><br>

<h4 id="aes_template">AES with template</h4>
<br>

  <table class="CodeInfo">

    <tr>
      <td><b>Description: </b></td>
      <td>Translation-Based Block Ciphers.<br>
          This code shows how to use <i>templates</i> to implement 
          a translation based block cipher.<br>
          In particular, I show how to instantiate an instance 
          of AES-128, AES-192, AES-256,
          of a non-standard AES-64, 
          and of a 24-bit toy cipher, called BUNNY.<br>
          Small ciphers are useful for cryptanalysis tests.<br>
          See the files for more details.
      </td>
    </tr>
    <tr>
      <td><b>View code: </b></td>
      <td><a href="tbbc.php">TBBC</a></td>
    </tr>
    <tr>
      <td><b>Download: </b></td>
      <td><a href="file/TBBC.tar.gz" target="_blank">TBBC.tar.gz</a>
      </td>
    </tr>
    <tr>
      <td><b>Github: </b></td>
      <td><a href="https://github.com/peacker/TBBC">TBBC</a>
      </td>
    </tr>
  </table> 

  <br><br><hr><br>

<h4 id="crypto_course_lab">Cryptography Course Laboratory</h4>
<br>

  <table class="CodeInfo">

    <tr>
      <td><b>Description: </b></td>
      <td>This is a project developed by some good students 
          I had the chance to work with 
          during the Cryptography course laboratory. <br>
          They had to implement a toy protocol between a server and a client, 
          its underlying cryptographic primitives, 
          such as block ciphers and stream ciphers, and 
          even the underlying math.
      </td>
    </tr>
    <tr>
      <td><b>Github: </b></td>
      <td><a href="https://github.com/peacker/crypto_course_lab">
            crypto_course_lab
          </a></td>
    </tr>
  </table> 

  <br><br><hr><br>

</div>

<script>
var chapter = 'programming' ;
var x = document.getElementById("temp-content") ;
document.getElementById("main").innerHTML = x.innerHTML ;
</script>

<!--
-->

