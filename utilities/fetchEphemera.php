<?php 
function fetchEphemera () {
    $list = glob($_SERVER["DOCUMENT_ROOT"].'/pages/ephemera/*.md');
    $list = array_reverse($list);
    $limit=5; 
    $list=array_slice($list, 0, $limit);  
    return $list;
}

?>