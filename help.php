<?php

function bee($good){
    echo"<pre>";
    print_r($good);
    echo"</pre>";
    die();

}
function redirect($url){
    header("Location: $url");
    die();
    
}