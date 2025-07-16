<?php

    function getCleanRequest() {
        $request = $_SERVER['REQUEST_URI'];
        $request = rtrim($request, '/\\'); // ignore trailing slashes

        // ignore parameters
        $parametersPosition = strpos($request, "?");
        if ($parametersPosition) {
        $request = substr($request, 0, $parametersPosition);
        }

        return $request;
    }

?>