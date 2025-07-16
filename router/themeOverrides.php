<?php

    function handleThemeOverrides(string $request) {

        if ($request == "") return false;
        if (str_contains(strtolower($request), "/places/arizona")) {

            return true;

        }


        return false;

    }

?>