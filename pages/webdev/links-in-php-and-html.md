Links in PHP and HTML
=====================

A growing reference for myself as much as anyone else :)

Relative to site root
---------------------

Include statements in PHP files:

```
    include_once $_SERVER["DOCUMENT_ROOT"]."/header.php";
```

Links in HTML elements, including links, stylesheets, scripts, and images:

```
    // Yes! The leading / refers to the site root
    <a href="/mypage.php">My Link</a>

    // NO!
    // This can end up with a link like 'C:server/htdocs/mypage.php', which is "correct"
    // but won't execute.
    <a href=<?php echo $_SERVER["DOCUMENT_ROOT"]."/mypage.php"?>>My Link</a>
```


Relative to Current Page
------------------------

Good news! They work the same way!

```
    // in current directory
    include_once "file.php";
    <a href="mypage.php">My Link</a>

    // in a parent folder
    include_once "../file.php";
    <a href="../mypage.php">My Link</a>

    // in a child folder
    include_once "folder/file.php";
    <a href="folder/mypage.php">My Link</a>
```

Other things that may be situationally useful
---------------------------------------------

You can set a base URL to use for all relative links in HTML elements on a page.

```
    <base href="https://my.site.com/baseFolder/">
```