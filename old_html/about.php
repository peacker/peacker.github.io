<?php
  include "page_template.html"
?>

<div id="temp-content" style="display: none;">
        <h3>About</h3>
        <hr>
        <br>
        <p>
        I was born in 1983, in Moncalieri (TO), Italy.
        </p>
        <p>
        Then I grew up in Collegno, a nice 50,000 citizens city, where, 
        among many other crazy and funny people, 
        the famous Scatterbrained of Collegno lived. 
        This light-hearted spirit of folly continuously permeated 
        my entire teenager growth, forging my logical, scientific, fussy, 
        though creative mind.
        <br>
        After bouncing in and out three different high schools, 
        strumming away on legendary guitars, 
        chewing thousands of hectares of soccer field grass and mud, 
        discovering my best friends, dying after beautiful girls 
        (not very many actually...), 
        and nurturing my faith with eternal moments of interior silence and 
        solitary adventures among the most arduous mountains, 
        I finally went through the beautiful and entertaining years of college 
        and took my math degree at the University of Turin in 2009, 
        and my doctorate of philosophy in 2015 in the art of 
        hiding information to others.
        </p>
        <p>
        Skills which brought me where I am at...
        </p>
</div>

<script>
var chapter = 'about' ;
var x = document.getElementById("temp-content") ;
document.getElementById("main").innerHTML = x.innerHTML ;
</script>
