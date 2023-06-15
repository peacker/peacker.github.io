<?php
  include "page_template.html"
?>

<div id="temp-content" style="display: none;">
  <h3>Research</h3>
  <br><hr><br>

  <div>
    <h4><a href="publications.php">Publications</a></h4><br>
    In this page you can find a list of my publications,
    including preprints and my Ph.D. thesis. 
    <br><br><hr><br>

    <h4><a href="talks.php">Talks</a></h4><br>
    In this page you can find a list of my national and international talks.
    <br><br><hr><br>

    <h4>Research description</h4><br>

    <h5>Topics</h5><br>
    Private and Public Key Cryptography,
    Algebraic Cryptanalysis,
    Information Security,
    Computer Algebra,  
    Coding Theory, 
    Commutative Algebra.<br><br>

    <h5>Recent reasearch</h5><br>
    Recently my research has focused mainly on public key cryptosystem.<br>
    In particular I have worked on an RSA-like cryptosystem, 
    which is two time faster than RSA, 
    while keeping at least the same security.<br>
    I have also worked on the implementation of some 
    Attribute-Based Encryption schemes, 
    in order to test their actual efficiency
    when using different type of elliptic curves.
    <br><br>

    <h5>Internship</h5><br>
    While working on my Ph.D. research, I was intern at Telsy S.p.A., where I have been involved in some company projects, studying, testing and implementing standard and original cryptographic primitives.
    <br><br>

    <h5>Ph.D research</h5><br>
    For my Ph.D. studies I worked on some new bounds for the size of nonlinear codes, and on original algebraic methods for computing the distance of nonlinear codes. This methods can be exploited to compute the nonlinearity of Boolean functions and to characterize Boolean functions with given nonlinearity.
    <br><br>

    <h5>Post master graduation</h5><br>
    After my master degree, I had been assigned two jobs by Telsy S.p.A., the first regarding a study and a C++ implementation of the problem of finding the proper parameters for an Elliptic Curve Cryptosystem based on the Discrete Logarithm (in such a way that the system is both secure and efficient). 
    <br>
    The second request was to design an Elastic Block Cipher from a Fixed Input Length Block Cipher, allowing to encrypt messages of any length and whose security was the same as the underlying Block Cipher. My construction is the first elastic cipher example taking input of any length and keeping the complexity of the entire cipher proportional to a small degree polynomial of the size of the input.<br>
    <br>

    <h5>Master thesis</h5><br>
    In my Master's thesis I worked on an algorithm to reduce integer factorization to the problem of solving the discrete logarithm over an integer ring.
    <br><br>

    <h5>Other interests</h5><br>
    While keeping high my interest for public cryptography (still attending courses and lectures), I concentrate my studies on private key cryptosystems, consolidating my backgrounds in Coding Theory, Groebner Bases, and Boolean Functions, and specializing my knowledge on algebraic aspects of symmetric cryptosystems. <br>
    I have studied (though not done research on) a variety of cryptanalysis methods (both for stream, block, and public ciphers), often implementing (coding is fun!) them in C language or in Computer Algebra Systems (such as MAGMA or SAGE).<br>
    I am very attracted, but not yet an expert, by the subjects of Post-Quantum and Homomorphic Cryptography, the latter in the practical perspective of cloud computing.
    <br><br>

    <hr><br>
  </div>


</div>

<script>
var chapter = 'research' ;
var x = document.getElementById("temp-content") ;
document.getElementById("main").innerHTML = x.innerHTML ;
</script>

<!--
-->

