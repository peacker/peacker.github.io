<?php
  include "page_template.html" ;
  include "CV_DB.php" ;
?>

<div id="temp-content" style="display: none;">
  <h3>Publications</h3>
  <hr>
  <br>

  <div class="journal-list">

    <h4><u>International journals</u>:</h4><br>
    <ul>
    <?php
      foreach ($DATABASE['ARTICLES_INTERNATIONAL_JOURNALS'] as &$x) {
        echo "<li>" ;
        echo "<i>\"" . $x['TITLE'] . "\"</i><br>" . 
             $x['AUTHORS'] . "<br>" .
             $x['JOURNAL'] . "<br>" .
             $x['PUBLICATION_DATE'] . "<br>" ;
        if ($x['ARXIV'] != '') {
          echo "<a href=" . $x['ARXIV'] . " target='_blank'>Arxiv</a> " ;
        }
        if ($x['URL'] != '') {
          echo "<a href=" . $x['URL'] . " target='_blank'>URL</a> " ;
        }
        if ($x['ARXIV'] == '' && $x['URL'] == '') {
          echo "no link available..." ;
        }
        echo "<br><br>" ;
        echo "</li>" ;
      }
    ?>
    </ul>

    <h4><u>International conferences</u>:</h4><br>
    <ul>
    <?php
      foreach ($DATABASE['ARTICLES_INTERNATIONAL_CONFERENCES_AND_WORKSHOP'] as &$x) {
        echo "<li>" ;
        echo "<i>\"" . $x['TITLE'] . "\"</i><br>" . 
             $x['AUTHORS'] . "<br>" .
             $x['CONFERENCE_NAME'] . "<br>" .
             $x['DATE'] . "<br>" ;
        if ($x['ARXIV'] != '') {
          echo "<a href=" . $x['ARXIV'] . " target='_blank'>Arxiv</a> " ;
        }
        if ($x['URL'] != '') {
          echo "<a href=" . $x['URL'] . " target='_blank'>URL</a> " ;
        }
        if ($x['ARXIV'] == '' && $x['URL'] == '') {
          echo "no link available..." ;
        }
        echo "<br><br>" ;
        echo "</li>" ;
      }
    ?>
    </ul>

    <h4><u>Arxiv</u>:</h4><br>
    <ul>
    <?php
      foreach ($DATABASE['ARTICLES_PREPRINTS'] as &$x) {
        echo "<li>" ;
        echo "<i>\"" . $x['TITLE'] . "\"</i><br>" . 
             $x['AUTHORS'] . "<br>" .
             $x['DATE'] . "<br>" ;
        if ($x['ARXIV'] != '') {
          echo "<a href=" . $x['ARXIV'] . " target='_blank'>Arxiv</a> " ;
        }
        if ($x['ARXIV'] == '') {
          echo "no link available..." ;
        }
        echo "<br><br>" ;
        echo "</li>" ;
      }
    ?>
    </ul>


    <h4><u>Thesis</u>:</h4><br>
    <ul>
    <?php
      foreach ($DATABASE['THESIS'] as &$x) {
        echo "<li>" ;
        echo $x['TYPE'] . ": <i>\"" . $x['TITLE'] . "\"</i><br>" . 
             "Supervisor: " . $x['SUPERVISOR'] . "<br>" .
             $x['INSTITUTE'] . ", " . $x['DEPARTMENT'] . ", " . $x['DATE'] . 
             "<br>" ;
        if ($x['FILE'] != '') {
          echo "<a href=" . $x['FILE'] . " target='_blank'>Download file</a> " ;
        } else {
          echo "no link available..." ;
        }
        echo "<br><br>" ;
        echo "</li>" ;
      }
    ?>
    </ul>

    <h4><u>Supervised thesis</u>:</h4><br>
    <ul>
    <?php
      foreach ($DATABASE['SUPERVISED_THESIS'] as &$x) {
        echo "<li>" ;
        echo $x['TYPE'] . ": <i>\"" . $x['TITLE'] . "\"</i><br>" . 
             "Student: " . $x['STUDENT'] . "<br>" .
             "Supervisor: " . $x['SUPERVISOR'] . "<br>" .
             $x['INSTITUTE'] . ", " . $x['DEPARTMENT'] . ", " . $x['DATE'] . 
             "<br>" ;
        if ($x['FILE'] != '') {
          echo "<a href=" . $x['FILE'] . " target='_blank'>Download file</a> " ;
        } else {
          echo "no link available..." ;
        }
        echo "<br><br>" ;
        echo "</li>" ;
      }
    ?>
    </ul>
<!-- 
    <h4><u>International journals</u>:</h4><br>
    <ul>
      <li><a href="./file/FFA_FINAL_VERSION.pdf" target="_blank">
          "<i>An efficient and secure RSA-like cryptosystem exploiting R&eacutedei rational functions over conics</i>"
          </a><br>
          Emanuele Bellini, Nadir Murru<br>
          Finite Fields and Their Applications<br>
          2016-05<br><br>
      </li>
      <li><a href="http://arxiv.org/abs/1310.4050" target="_blank">
          "<i>An Extension of Cook's Elastic Cipher</i>"
          </a><br>
          Emanuele Bellini, Guglielmo Morgari, Marco Coppola<br>
          Journal of Discrete Mathematical Sciences and Cryptography - TARU Publications<br>
          2015<br><br>
      </li>
      <li><a href="http://ieeexplore.ieee.org/xpl/login.jsp?tp=&amp;arnumber=6704275&amp;url=http%3A%2F%2Fieeexplore.ieee.org%2Fiel7%2F18%2F6739111%2F06704275.pdf%3Farnumber%3D6704275" target="_blank">
          "<i>Some Bounds on the Size of Codes</i>"
          </a><br>
          Emanuele Bellini, Eleonora Guerrini, Massimiliano Sala<br>
          IEEE Transactions on Information Theory<br>2014-01-09<br><br>
      </li>
    </ul>


    <h4><u>International conferences</u>:</h4><br>
    <ul>
      <li><a href="http://mega2015.science.unitn.it/COMPUTATION%20PRESENTATIONS/BelliniMoraSala.pdf" target="_blank">
         "<i>Algorithmic approach using polynomial systems for the nonlinearity of Boolean functions</i>"
         </a><br>
         Emanuele Bellini, Massimiliano Sala, Teo Mora<br>
         MEGA 2015, Effective Methods in Algebraic Geometry<br>
         2015-06-19<br><br>
      </li>
      <li>"<i>On the Griesmer bound for Nonlinear Codes</i>"<br>
          Alessio Meneghetti, Emanuele Bellini<br>
          WCC 2015, International Workshop on Coding and Cryptography<br>2015-04-17<br><br>
      </li>
      <li><a href="http://arxiv.org/abs/1404.2471" target="_blank">
          "<i>Yet another algorithm to compute the nonlinearity of a Boolean function</i>"
          </a><br>
          Emanuele Bellini<br>
          YACC 2014, Yet Another Conference on Cryptography<br>
          2014-06-10<br><br>
      </li>
    </ul>


    <h4><u>Arxiv</u>:</h4><br>
    <ul>
      <li><a href="http://arxiv.org/abs/1505.00542" target="_blank">
          "<i>A deterministic algorithm for the distance and weight distribution of  binary nonlinear codes</i>"
          </a><br>
          Emanuele Bellini, Massimiliano Sala<br>
          2015-01-18<br><br>
      </li>
      <li><a href="http://arxiv.org/abs/1404.2741" target="_blank">
            "<i>Nonlinearity of Boolean functions: an algorithmic approach based on  multivariate polynomials</i>"
            </a><br>
            Emanuele Bellini, I. Simonetti, Massimiliano Sala<br>
            2014-04-10<br><br>
      </li>
      <li><a href="http://arxiv.org/abs/1310.4060" target="_blank">
          "<i>On the Griesmer Bound for Systematic Codes</i>"
          </a><br>
          Emanuele Bellini<br>
          2013-10-15<br><br>
          </li>
    </ul>



    <h4><u>PhD Thesis</u>:</h4><br>
    <ul>
      <li><a href="./file/00-Thesis.pdf" target="_blank">
          "<i>Computational techniques for nonlinear codes and Boolean functions</i>"
          </a><br>
          Emanuele Bellini<br>
          2014-12-22<br><br>
      </li>
    </ul>

  </div>
-->

</div>

<script>
var chapter = 'research' ;
var x = document.getElementById("temp-content") ;
document.getElementById("main").innerHTML = x.innerHTML ;
</script>

<!--
-->

