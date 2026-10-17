<?php 
function fetchEphemera ($count = 3, $startAfter = 0) {
    $list = glob($_SERVER["DOCUMENT_ROOT"].'/pages/ephemera/*.md');
    $list = array_reverse($list);
    $list = array_slice($list, $startAfter);
    $list=array_slice($list, 0, $count);  
    return $list;
}

?>