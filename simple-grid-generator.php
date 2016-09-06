<?php


//------------------------------------------------------------------------------/
// HI 
//------------------------------------------------------------------------------/
/**
 * To use this generator, simply tweak the config section (below) to your needs, then
 * open this script in a browser, it will spit out the css code.
 * 
 * Then, copy paste the css code into a css file (simplegrid.css file for instance).
 * 
 * That's it.
 */


header("content-type: text/plain");

//------------------------------------------------------------------------------/
// CONFIG
//------------------------------------------------------------------------------/
$m = 1.6; // the gutter's (aka margin) width. You shouldn't use more than 3 decimals max
$mc = 12; // the number of columns






//------------------------------------------------------------------------------/
// SCRIPT -- you shouldn't edit below this line
//------------------------------------------------------------------------------/
$scw = (100 - ($m * ($mc - 1))) / $mc;

function rounder($n){
    $prec = 1000;
    return ((int)($prec * $n) / $prec);
}



echo 'html, body {
    height: 100%;
}

body {
    padding: 0px;
    margin: 0px;
}

.row, .column {
    box-sizing: border-box;
}

.row::before,
.row::after {
    content: " ";
    display: table;
}

.row::after {
    clear: both;
}

.column {
    position: relative;
    float: left;
}

.column + .column {
    margin-left: '. $m .'vw;
}
';
for ($i = 1; $i <= 12; $i++) {
    $cs = $i;
    $cw = ($scw * $cs) + ($m * ($cs - 1));
    $cw = rounder($cw);
    
    echo '
.column-'. $cs .' {
    width: '. $cw .'vw;
}    
    ';
}


for ($i = 1; $i <= 11; $i++) {    
    echo '
.column.push-'. $i .':not(:first-of-type) {
    margin-left: calc('. $i .' * ('. $m .'vw + '. rounder($scw) .'vw) + '. $m .'vw);
}
    ';
}

for ($i = 1; $i <= 11; $i++) {    
    echo '
.column.push-'. $i .':first-of-type {
    margin-left: calc('. $i .' * ('. $m .'vw + '. rounder($scw) .'vw));
}
    ';
}