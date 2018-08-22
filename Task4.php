<?php
function fanout(){
    throw new \Exception("Not implemented.");
}

try {
    fanout();
} catch( \Exception $e ) {
    echo "ERROR: $e";
}