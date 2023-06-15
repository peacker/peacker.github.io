<?php
  include "page_template.html"
?>

<div id="temp-content" style="display: none;">
<h3>Key-policy Attribute-Based encryption</h3>
<hr>
<br>
<div class="magma-index">
  <h4><u>Index</u></h4>

  <ul>
  <br>
    Two examples:
    <li><a href="#kpabe_ex1_m">kpabe_ex1.m</a></li>
    <li><a href="#kpabe_ex2_m">kpabe_ex2.m</a></li>
    To generate Type A curves for bilinear pairing.
    <li><a href="#pairing_m">pairing.m</a><br></li>
    Definition of the KP-ABE scheme.
    <li><a href="#kpabe_lib_m">kpabe_lib.m</a><br></li>
  </ul>
</div>

<br><br><hr><br>

<h4 id="kpabe_ex1_m">kpabe_ex1.m</h4>

<pre>
<code class="magma">
clear ;
/*
REF: "Attribute-based Encryption for Fine-Grained Access Control of Encrypted Data"
     Goyal, Pandey, Sahai, Waters
     Section 4.2 


NOTATION:
---------
  G_1 <--> &ltP>
  g   <--> P
  G_2 <--> F_q^2
  p   <--> r

*/

//////////////////////////////////////////////////////////////////////////////

// GLOBAL VARIABLES
// ----------------


// to generate a new curve uncomment the following line
load "pairing.m" ;

// to use known global parameter uncomment the following  lines

/*
K := GF(340282366920938463463374607431768216923) ;
E := EllipticCurve( [ K | 1, 0 ] ) ; 
K2&ltz> := ExtensionField< K , x | x^2+1 > ;
E2 := ChangeRing(E,K2) ;
P := E![199271605215943908268709599389110266979,225490490528012404940003766658466280865,1] ; 
r := Order(P) ;
*/

//////////////////////////////////////////////////////////////////////////////

// ATTENTION: 
// Library must be loaded after global variables are set.

load "kpabe_lib.m" ;


ATTRIBUTES := [
              "Stagione1",
              "Stagione2",
              "Stagione3",
              "Stagione4",
              "Stagione5",
              "Episodio1",
              "Episodio2",
              "Episodio3",
              "Episodio4",
              "Episodio5",
              "Episodio6",
              "Episodio7",
              "Episodio8",
              "Episodio9",
              "Episodio10",
              "Serie1",
              "Serie2",
              "Serie3"
              ] ;


n := #ATTRIBUTES ; // number of attributes
U := [i : i in [1..n]] ; // Universe of attributes

//POLICY := ">1(>5(Serie1,Stagione1,Episodio1,Episodio2,Episodio3),>5(Serie2,Stagione1,Episodio1,Episodio2,Episodio3))" ;
//POLICY := ">2(Stagione1,Stagione2)" ;
//POLICY := ">1(Stagione1,Stagione2)" ;
POLICY := "Stagione2" ;

// AUTHORITY
// ---------
PK , MK := Setup( U ) ;

TREE := POLICY2TREE( POLICY , ATTRIBUTES ) ;
TREE ;

D := KeyGeneration( TREE, MK ) ;

// ENCRYPTOR
// ---------
M := Random(K2) ; // the plaintext is a random element of F_2^q
GAMMA := { 2, 3, 4 } ;
c := Encryption( M, GAMMA, PK) ;


// DECRYPTOR
// ---------
//DecryptNode(c,D,1) ;
M_ := Decryption( c , D ) ;

M_ eq M ;

</code>
</pre>


<br><br><hr><br>

<h4 id="kpabe_ex2_m">kpabe_ex2.m</h4>

<pre>
<code class="magma">
clear ;
/*
REF: "Attribute-based Encryption for Fine-Grained Access Control of Encrypted Data"
     Goyal, Pandey, Sahai, Waters
     Section 4.2 


NOTATION:
---------
  G_1 <--> &ltP>
  g   <--> P
  G_2 <--> F_q^2
  p   <--> r

*/

//////////////////////////////////////////////////////////////////////////////

// GLOBAL VARIABLES
// ----------------


// to generate a new curve uncomment the following line
load "pairing.m" ;

// to use known global parameter uncomment the following  lines

/*
K := GF(340282366920938463463374607431768216923) ;
E := EllipticCurve( [ K | 1, 0 ] ) ; 
K2&ltz> := ExtensionField&lt K , x | x^2+1 > ;
E2 := ChangeRing(E,K2) ;
P := E![199271605215943908268709599389110266979,225490490528012404940003766658466280865,1] ; 
r := Order(P) ;
*/

//////////////////////////////////////////////////////////////////////////////
// ATTENTION: 
// Library must be loaded after global variables are set.
load "kpabe_lib.m" ;


ATTRIBUTES := [
              "MARINA",    // 1
              "AVIAZIONE", // 2
              "TERRA",     // 3
              "Plotone1",  // 4
              "Plotone2",  // 5
              "Plotone3",  // 6
              "Plotone4",  // 7
              "Missione1", // 8
              "Missione2", // 9
              "Missione3"  // 10
              ] ;

n := #ATTRIBUTES ; // number of attributes
U := [i : i in [1..n]] ; // Universe of attributes

// We send many groups in Mission1, but
// only the following groups should be able do receive messages:
// 1) MARINA, Plotone1 and Plotone 2
// 2) AVIAZIONE, Plotone1
// 3) AVIAZIONE, Plotone3 
// We must distribute keys, such that
// each of the above group can decrypt

POLICY := [] ;
POLICY[1] := ">1(>2(MARINA,Plotone1),>2(MARINA,Plotone2))" ; // attributes 1 , 4 , 5
POLICY[2] := ">2(AVIAZIONE,Plotone1)" ; // attributes 2 , 4 
POLICY[3] := ">2(AVIAZIONE,Plotone3)" ; // attributes 2 , 6


// AUTHORITY
// ---------
// the trusted authority creates the public and the master keys
PK , MK := Setup( U ) ;

TREE := [] ;
for i in [1..#POLICY] do
  TREE[i] := POLICY2TREE( POLICY[i] , ATTRIBUTES ) ;  
end for ;

TREE ;

// the trusted authority creates the decryption keys
D := [] ;
for i in [1..#POLICY] do
  D[i] := KeyGeneration( TREE[i] , MK ) ;
end for ;


// ENCRYPTOR
// ---------
// Suppose the HEADQUARTER wants to broadcast a message
// Then he encrypts it with attributes:
// 1, 2, 4, 5, 6
M := Random(K2) ; // the plaintext is a random element of F_2^q
GAMMA := { 1, 2, 4, 5, 6 } ;
c := Encryption( M, GAMMA, PK) ;


// DECRYPTOR
// ---------
// At first everyone can decrypt
M_ := Decryption( c , D[1] ) ;
M_ eq M ;
M_ := Decryption( c , D[2] ) ;
M_ eq M ;
M_ := Decryption( c , D[3] ) ;
M_ eq M ;

// Now suppose that the key of Plotone1 of AVIAZIONE has been stolen
// The HEADQUARTER than encrypts the next message
// without attribute 4 ( corresponding to Plotone1)

// ENCRYPTOR
// ---------
// Suppose the HEADQUARTER wants to broadcast a message
M := Random(K2) ; // the plaintext is a random element of F_2^q
GAMMA := { 1, 2, 5, 6 } ;
c := Encryption( M, GAMMA, PK) ;


// DECRYPTOR
// ---------
// Now, the decryption D[2] is not useful anymore
M_ := Decryption( c , D[1] ) ;
M_ eq M ;
M_ := Decryption( c , D[2] ) ;
M_ eq M ;
M_ := Decryption( c , D[3] ) ;
M_ eq M ;
</code>
</pre>


<br><br><hr><br>

<h4 id="pairing_m">pairing.m</h4>

<pre>
<code class="magma">
/*
TYPE A CURVES
-------------
REF: "On the implementation of pairing-based cryptosystems", 
     Lynn PhD Thesis, p. 64

* q = 3 mod 4
* E : Y^2 = x^3 + ax, a in F_q
* E is supersingular
* #E(F_q)   = q + 1
  #E(F_q^2) = (q + 1)^2
* For any r s.t. r | q + 1 we have
  G = E(F_q)[r] is cyclic and has embedding degree k = 2
* We have -1 is quadratic nonresidue in F_q, since q = 3 mod 4
  Then if i = SQRT(-1), we have the distorsion map
  phi( (x,y) ) = ( -x , iy )
  which maps points of E(F_q) to point of E(F_q^2)\E(F_q)
* Thus if f denotes the Weil pairing, we can obtain a
  bilinear nondegenerate map:
  e : G x G -> F_q^2
  e(P,Q) = f(P,phi(Q))
  Note that the Weil pairing f is s.t.
  f : E(F_q^2)[r] x E(F_q^2)[r] -> F_q^2 

*/

//---------------------------------------------

// GLOBAL VARIABLES
// ----------------
K := GF(59) ;
E := EllipticCurve( [ K | 1, 0 ] ) ; 
K2&ltz> := ExtensionField< K , x | x^2+1 > ;
E2 := ChangeRing(E,K2) ;
P := E![25,29,1] ; 
r := Order(P) ;

// TO CHOOSE GLOBAL VARIABLES (they must be defined before phi() and e() )
// --------------------------
// choose a good elliptic curve E(F_q) with embedding degree 2 
// and equation
// E : Y^2 = x^3 + ax, a in F_q
// such that
// - F_q^2 resists Index Calcolus attacks,
//   i.e., q ~ 1024 bit
// - #E is divisible by a prime r such of 160 bit,
//   to avoid general Discrete Log attacks
// Note that #E(F_q) = hr must be of 512 bits, so that q^2 is 1024
// thus h is 512 - 160 = 362 bits
// Choose h to be a multiple of 4 (why???)

q_square_size := 256 ; // field F_q^2 size // should be at least 1024
r_size := 40 ; // group G size // should be at least 160
h_size := (q_square_size div 2) - r_size ;


SearchTypeASupersingularCurve := function( q_square_size, r_size, a : verb := true)
local q, r, h, E, F, P ;
local found ;
  // find q = 3 mod 4
  q := NextPrime(2^(q_square_size div 2)) ;
  while (q mod 4) ne 3 do
    q := NextPrime(q) ;
  end while ;

  a := 1 ;
  found := 0 ;
  while found eq 0 do
  //  if (a mod 1000) eq 0 then a ; end if ;
    r := 0 ;
    h := 0 ;
    E := EllipticCurve( [ GF(q) | a , 0 ] ) ;
    F := Factorization(#E) ;
    for i in [1..#F] do
  //Floor(Log(2,F[i][1])) ;
      if Floor(Log(2,F[i][1])) eq r_size-1 then
         //Floor(Log(2,F[i][1])) le r_size+4 and  
         //Floor(Log(2,F[i][1])) ge r_size-4 then
        r := F[i][1] ;
        h := #E div r ;

      end if ;
    end for ; 

    if (r ne 0) and ((h mod 4) eq 0) then
      found := 1 ;
    else 
      //a := a + 1 ;
      repeat
        q := NextPrime(q) ;
      until (q mod 4) eq 3 ;
    end if ;

  end while ;
  
  if verb then
  "found E", E ;
  "searching for point P of order", r ;
  end if ;
   
  // FIND P of order r
  repeat
    P := Random(E) ;
    if (Order(P) mod r) eq 0 then
      P := (Order(P) div r)*P ;
    end if ;
  until Order(P) eq r ;
  
  return r, P ;
end function ;

r, P := SearchTypeASupersingularCurve(256,40,1) ;
K := Parent(P[1]) ;
E := Scheme(P) ;
K2&ltz> := ExtensionField< K , x | x^2+1 > ;
E2 := ChangeRing(E,K2) ;

//---------------------------------------------

phi := function( P )
// DISTORSION MAP
// Given a point of E(F_q^2) with coordinates in F_q
// returns a point of E(F_q^2)
// phi( (x,y) ) = ( -x , iy ), where i is the square root of -1
// which is not a nonsquare if q = 3 mod 4
// E must be E(F_q^2)
//

  if P eq E2![0,1,0] then
    return E2![ K2!(-P[1]), K2.1*P[2] , 0] ;
  else
    return E2![ K2!(-P[1]), K2.1*P[2] , 1] ;
  end if ;
end function ;

//---------------------------------------------

e := function ( P , Q )
// BILINEAR SYMMETRIC PAIRING
// When the underlying field is F_q s.t. q = 3 mod 4 
// e : G x G -> F_q^2
// e : (U,V) -> WeilPairing( U , phi(V) )
// G subset of E(F_q) of prime order r

  return K2!WeilPairing( E2!P, phi(E2!Q), r ) ;
end function ;

//---------------------------------------------

// check properties of the bilinear map
Q := Random(r)*P ;
// SYMMETRY
e(P,Q) eq e(Q,P) ;
// NONDEGENERACY
e(P,P) ne 1 ;
// BILINEARITY
e(2*P,3*Q) eq e(Q,P)^(2*3) ;
// NEUTRAL ELEMENT
O := E![0,1,0] ;
e(O,O) eq 1 ;
e(O,P) eq 1 ;
e(P,O) eq 1 ;


</code>
</pre>


<br><br><hr><br>

<h4 id="kpabe_lib_m">kpabe_lib.m</h4>

<pre>
<code class="magma">
//////////////////////////////////////////////////////////////////////////////
// Work done by Emanuele Bellini,                                           //
// Telsy S.p.A.                                                             //
//                                                            Torino, 2015  //
//////////////////////////////////////////////////////////////////////////////

// clear ;
/*
REF: "Attribute-based Encryption for Fine-Grained Access Control of Encrypted Data"
     Goyal, Pandey, Sahai, Waters, 2006
     Section 4.2 


NOTATION:
---------
  G_1 <--> &ltP>
  g   <--> P
  G_2 <--> F_q^2
  p   <--> r

*/

// UNCOMMENT IF GLOBAL VARIABLES MUST BE INCLUDED!!
/*
// GLOBAL VARIABLES
// ----------------

K := GF(340282366920938463463374607431768216923) ;
E := EllipticCurve( [ K | 1, 0 ] ) ; 
K2&ltz> := ExtensionField< K , x | x^2+1 > ;
E2 := ChangeRing(E,K2) ;
P := E![199271605215943908268709599389110266979,225490490528012404940003766658466280865,1] ; 
r := Order(P) ;

ATTRIBUTES := [
              "Stagione1",
              "Stagione2",
              "Stagione3",
              "Stagione4",
              "Stagione5",
              "Episodio1",
              "Episodio2",
              "Episodio3",
              "Episodio4",
              "Episodio5",
              "Episodio6",
              "Episodio7",
              "Episodio8",
              "Episodio9",
              "Episodio10",
              "Serie1",
              "Serie2",
              "Serie3"
              ] ;

n := #ATTRIBUTES ; // number of attributes
U := [i : i in [1..n]] ; // Universe of attributes
*/

//---------------------------------------------
//---------------------------------------------

// DISTORSION MAP
// --------------
phi := function( P )
// Given a point of E(F_q^2) with coordinates in F_q
// returns a point of E(F_q^2)
// phi( (x,y) ) = ( -x , iy ), where i is the square root of -1
// which is not a nonsquare if q = 3 mod 4
// E must be E(F_q^2)
//

  if P eq E2![0,1,0] then
    return E2![ K2!(-P[1]), K2.1*P[2] , 0] ;
  else
    return E2![ K2!(-P[1]), K2.1*P[2] , 1] ;
  end if ;
end function ;

//---------------------------------------------

// BILINEAR SYMMETRIC PAIRING
// --------------------------
e := function ( P , Q )
// When the underlying field is F_q s.t. q = 3 mod 4 
// e : G x G -> F_q^2
// e : (U,V) -> WeilPairing( U , phi(V) )
// G subset of E(F_q) of prime order r

  return K2!WeilPairing( E2!P, phi(E2!Q), r ) ;
end function ;

//---------------------------------------------

// ACCESS TREE
// -----------
// x is the name of the node (a number)
// m is the number of nodes
// k is the threshold of a node
//   is 0 if leaf node
// num_children is the number of children of a node
//   is 0 if leaf node
// father is the number of the parent node
//   is 0 if root node
// index is the number identifying the node between his brothers
//   is 0 if root node
// att is the attribute associated to a leaf node 
//   is 0 if not leaf node
//
// TREE := [
// x[0], k[0], num_children[0], father[0], index[0], att[0],
// x[1], k[1], num_children[1], father[1], index[0], att[1],
// x[2], k[2], num_children[2], father[2], index[0], att[2],
// ...
// x[m], k[m], num_children[m], father[m], index[0], att[m]
// ] ;
//
// EXAMPLE:
// U = {1,2,3,4,5,6,7,8,9,10}
// the policy
// or( and(1,2,5), and(2,3) )
// can be represented as
/*
TREE :=  [// or( and(1,2,5), and(2,3) )
         [ 1, 1, 2, 0, 0, 0 ],        //-> root node or
         [ 2, 3, 3, 1, 1, 0 ],        //-> node and
         [ 3, 2, 2, 1, 2, 0 ],        //-> node and
         [ 4, 0, 0, 2, 1, 1 ],       //-> leaf node att(4) = 1
         [ 5, 0, 0, 2, 2, 2 ],       //-> leaf node att(5) = 2
         [ 6, 0, 0, 2, 3, 5 ],       //-> leaf node att(6) = 5
         [ 7, 0, 0, 3, 1, 2 ],       //-> leaf node att(7) = 2
         [ 8, 0, 0, 3, 2, 3 ]        //-> leaf node att(8) = 3
         ] ;
*/
// NOTE: it is important to insert first rows representing older generations
//

Threshold := function(x, TREE)
  return TREE[x][2] ;
end function ;

NumberOfChildren := function(x, TREE)
  return TREE[x][3] ;
end function ;

Father := function(x, TREE)
  return TREE[x][4] ;
end function ;

Index := function(x, TREE)
  return TREE[x][5] ;
end function ;

Attribute := function(x, TREE)
  return TREE[x][6] ;
end function ;

SatisfyTREE := function( GAMMA, TREE)
// ...
local flag ;

  return flag ;
end function ;

//---------------------------------------------

NumberOfChar := function ( s , c )
local pos ; // list of positions
  pos := [] ;
  for i in [1 .. #s] do
    if s[i] eq c then
      pos := pos cat [i] ;
    end if ;
  end for ;

  return #pos, pos ;
end function ;

SplitString := function( str )
local ss ;
local SS ; // vector of substrings
local i, j ;
local open, close ;

  if NumberOfChar( str , ",") eq 0 then
    return [] ;
  end if ;

  i := 1 ;
  repeat
    i := i + 1 ;
  until str[i] eq "(" ;
  ss := Substring( str , i+1 , #str-i-1 ) ;

    i := 1 ;
    SS := [] ;
    j := 1 ;
    while i le #ss do
      SS[j] := "" ;
      while ss[i] ne "(" do
        SS[j] := SS[j] cat ss[i] ;
        i := i + 1 ;
      end while ;
      open := 0 ;
      close := 0 ;
      repeat
        if ss[i] eq "(" then
          open := open + 1 ;
        elif ss[i] eq ")" then
          close := close + 1 ;
        end if ;
        SS[j] := SS[j] cat ss[i] ;
        i := i + 1 ;
      until open eq close ;
      j := j + 1 ;
      i := i + 1 ;
    end while ;

  return SS ;
end function ;

CreateNODE := procedure( str , father , ind , ~TREE )
// s is the string
// father is the father from which the node is called
// ind i
local SS ; // list of sub trees
local th ; // threshold
local j ;
local fa ;

  SS := SplitString(str) ;
  
  // LEAF NODE CASE
  if SS eq [] then 
    TREE[#TREE+1] := [ #TREE + 1 , 0 , 0 , father , ind , StringToInteger(Substring(str,2,#str-2)) ] ;
  // NON-LEAF NODE CASE
  else
    // find threshold
    j := 2 ;
    th := "" ;
    while str[j] ne "(" do
      th := th cat str[j] ;
      j := j + 1 ;
    end while ;
    // create new node
    TREE[#TREE+1] := [ #TREE + 1 , StringToInteger(th) , #SS , father , ind , 0 ] ;
    // recursive call
    fa := #TREE ;
    for i in [1..#SS] do
      $$( SS[i] , fa , i , ~TREE) ;
    end for ;
  end if ;

end procedure ;

CreateTREE := function( str ) 
// s is a policy
// s := ">2(>3((1),(2),(3)),>1((6),(7)))" ;
// stands for and(and(1,2,3),or(6,7))
//
local TREE ;

  TREE := [] ;
  CreateNODE( str , 0 , 0 , ~TREE) ;

  return TREE ;
end function ;

Replace := function ( s1 , s2 , str)
// in string str
// whenever s1 appears insert s2
local temp ;
local i ;

  temp := str ;
  i := 1 ;
  while i le #temp-#s1+1 do
    if s1 eq temp[i..i+#s1-1] then
      temp := temp[1..i-1] cat s2 cat temp[i+#s1..#temp] ;
      i := i + #s2 ;
    else
      i := i + 1 ;
    end if ;
  end while ;

  return temp ;
end function ;

ConvertPOLICY := function( str , attr )
local i ;
local temp ;

  temp := str ;
  i := 1 ;
  for a in attr do
    temp := Replace( a , "(" cat IntegerToString(i) cat ")", temp ) ;
    i := i + 1 ;
  end for ;

  return temp ;
end function ;

POLICY2TREE := function( pol , attr )
local tree ;
local pol_encoded ;  

  pol_encoded := ConvertPOLICY( pol , attr ) ;
  tree := CreateTREE( pol_encoded ) ;

  return tree ;
end function ;

//---------------------------------------------

// INTERPOLATION
// -------------

delta := function( i , S )

local R ;

  R&ltx> := PolynomialRing(Integers(r)) ;
  
  if (S diff {i}) eq {} then
    return R!1 ;
  end if ;

  return &*[(x-j)/(i-j) : j in S | j ne i] ;
end function ;

//---------------------------------------------

// MAIN FUNCTIONS
// --------------

//---------------------------------------------

Setup := function( U )
//
local t ; 
local T ;
local y ;
local Y ;
local PK ;
local MK ;

  t := [] ;
  for i in U do 
    t[i] := Random(r) ;
  end for ;
  T := [t[i]*P : i in U] ;
  y := Random(r) ;
  Y := e(P,P)^y ;

  PK := [* T , Y *];
  MK := [* t , y *];

  return PK, MK ;
end function ;

//---------------------------------------------

Encryption := function( M , GAMMA , PK )
// INPUT:
// - M     is an element of G_2 = F_q^2
// - GAMMA is a set of attributes (subset of U)
// - PK    is the public key
local c_ ; // encrypted message
local C ; // attribute encrypted information
local s ;
local Y ; 
local c ; // entire ciphertext
local T ;

  s := Random(r) ;
  Y := PK[2] ;
  cc := M*(Y^s) ;

  T := PK[1] ;

  C_ := [] ;
  for i in [1..#T] do // #T is the number of elements in the universe U
    if i in GAMMA then
      C_[i] := s*T[i] ;
    end if ;
  end for ;

  c := [* GAMMA , cc , C_ *] ;

  // return c, s ;
  return c ;
end function ;

//---------------------------------------------

KeyGeneration := function( TREE , MK )
//
local R ; // polynomials ring
local q ; // list of polynomials associated to a node
local D_ ; // list of decryption keys
local t ;

  t := MK[1] ;
  // R&ltx> := PolynomialRing(K) ;
  // R&ltx> := PolynomialRing(Integers()) ;
  R&ltx> := PolynomialRing(Integers(r)) ;
  q := [] ;
  D_ := [] ;
  for i in [1..#TREE] do
    // CREATE POLYNOMIALS
    if Father(i,TREE) eq 0 then // ROOT NODE CASE
      q[i] := R!MK[#MK] ; // q_r(0) = y defined the constant term
      for j in [1..Threshold(i,TREE) - 1] do // define randomly other terms
        //q[i] := q[i] + x^j * Random(K) ;
        q[i] := q[i] + x^j * Random(r) ;
      end for ;
    else // NON-ROOT NODE CASE
      q[i] := Evaluate(q[Father(i,TREE)], Index(i,TREE) );
      for j in [1..Threshold(i,TREE) - 1] do // define randomly other terms
        // q[i] := q[i] + x^j * Random(K) ;
        q[i] := q[i] + x^j * Random(r) ;
      end for ;
    end if ;

    // CREATE DECRYPTION KEY
    if Attribute(i,TREE) ne 0 then // LEAF NODE CASE
      D_[i] := Integers()!(Evaluate(q[i], 0 )/t[Attribute(i,TREE)]) * P ;
    end if ;
 
  end for ;

  // return [* TREE, D_ *], q ;
  // return D ;
  return [* TREE, D_ *] ;
end function ;

//---------------------------------------------

STOP := function()
  return K2!0 ;
end function ;

DecryptNode := function( c , D , x : verb := false)
// [* GAMMA , cc , C_ *] 
// D = [* TREE, D_ *]
// x is the number identifying the node
local TREE ;
local GAMMA ;
local i ;
local F ; // list of outputs of the children
local Sx ;
local Sx_ ;
local temp ;
local Fx ;

  if verb then  "---------" ;  "NODO = ", x ;  end if ;

  TREE := D[1] ;
  i := Attribute(x,TREE) ;

  // LEAF NODE CASE
  if i ne 0 then 
    if i in c[1] then
      Fx := K2!e( D[2][x] , c[3][i] ) ;
      if verb then printf "F[%o] = %o\n", x, Fx ; printf "i = %o\n", i ; end if ;
      return Fx ;
    else
      if verb then "ALT" ; end if ;
      return STOP() ; // STOP SIGNAL
    end if ;

  // NON-LEAF NODE CASE
  else 
    F := [ STOP() : j in [1..NumberOfChildren(x,TREE)] ] ;
    for z in [1..#TREE] do
      // recursive call for all children of x
      if TREE[z][4] eq x then
        temp := $$( c , D , z) ;
        F[z] := temp ;
      else
        F[z] := K2!0 ;
      end if ;
    end for ;

    // CREATE Sx and Sx'
    Sx := [] ;
    for z in [1..#F] do
      if ( not IsZero(F[z])/*F[z] ne Zero(Parent(F[z]))*/)  and (#Sx lt TREE[x][2]) then
        Sx := Sx cat [z] ;
      end if ;
    end for ;    
    Sx_ := {Index(z,TREE) : z in Sx} ;
    if verb then "Sx  = " , Sx ; "Sx' = " , Sx_ ; "Threshold = ", TREE[x][2] ; end if ;

    // COMPUTE Fx = &*[Fz^delta_{i,Sx'}(x) : z in Sx] 
    if #Sx_ ge TREE[x][2] then
      Fx := 1 ;
      for z in Sx do
        temp := delta(Index(z,TREE),Sx_) ;
        Fx := Fx * F[z]^Integers()!Evaluate(temp,0) ;
      end for ;
      if verb then printf "F[%o] = %o\n", x, Fx ; end if ;

      return Fx ;
    else 
      if verb then "ALT" ; end if ;

      return STOP() ;
    end if ;

  end if ;

end function ;

Decryption := function( c , D )
// [* GAMMA , cc , C_ *] 
// D = [* TREE, D_ *]
local Ys ;
  
  Ys := DecryptNode( c , D , 1) ;
  
  if Ys eq 0 then
    "ERROR! Decryption NOT ALLOWED!" ;
    return 0 ;
  end if ;

  return c[2]/Ys ;
end function ;

//---------------------------------------------
//---------------------------------------------
</code>
</pre>


<script>
var chapter = 'programming' ;
var x = document.getElementById("temp-content") ;
document.getElementById("main").innerHTML = x.innerHTML ;
</script>

<!--
-->

