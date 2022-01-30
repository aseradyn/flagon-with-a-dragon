A Simple, Flexible PHP Page Router
==================================

_Created October 16, 2021_

A router is a great way to avoid including boilerplate code, and to avoid some of the relative URL problems when you have pages at different levels of the site pointing at each other.

I do a lot - but not all - of my pages in Markdown, so I wanted something that would let me eaily handle both Markdown-based pages and pure PHP pages without having to segregate them into directories or rely on magic strings.

This method needs three pieces:

* A .htaccess file to route all requests to the index.php file

* One or more arrays of paths that you can use to resolve the paths

* Some PHP magic (well... logic :) ...)

The .htaccess file
------------------

This redirects all requests to my index.php file, unless the file actually exists.

```
RewriteEngine On
RewriteCond %{REQUEST_FILENAME} !-f
RewriteBase /
RewriteRule ^(.*)$ index.php
```

`RewriteCond %{REQUEST_FILENAME} !-f` turns out to be really important if you want things like iamges and CSS and fonts to work properly :)  This is saying to only redirect if the requeted file doesn't exist.

The routes
----------

Set up one associative array for each type of page you have in your site. In my example, I have two arrays: one for the regular PHP pages (`$pageRoutes`) and one for the pages that are just going to pull in a Markdown file (`$markdownFiles`).

In each array, the key (on the left) should be the request route - the path where you want the page to appear. For example, "/personal" if I want the page at `http://my.site.com/personal`.

The value (on the right) should be the actual path to the file in your file structure, relative to the index page.

```php
$pageRoutes = array(
    "" => "home.php",
    "/personal" => "personal.php",
    "/professional" => "professional.php"
);

$markdownFiles = array(
    "/blog-with-markdown" => "content/blog-with-markdown.md",
    "/prettier-paths-with-htaccess" => "content/prettier-paths-with-htaccess.md",
    "/highlight-menu-location" => "content/highlight-menu-location.md",
    "/links-in-php-and-html" => "content/links-in-php-and-html.md"
);
```

The PHP Magic
-------------

First, I defined a couple of functions, one for each type of page I need to handle.

```php
function loadPage($page) {
    include "header.php";
    include($page);
    include "footer.php";
}

function loadArticle($fileName) {
    include "header.php";

    $html = processMarkdown($fileName);
    echo "<article>".$html."</article>";

    include "footer.php";
}
```

Then I get the requested path and look for it in each array. When I find it, call the appropriate function with the corresponding actual file path.

If it doesn't match anything, return a 404.

```php
$request = $_SERVER['REQUEST_URI'];
$request = rtrim($request, '/\\'); // ignore trailing slashes

// routes are in their own file
include "routes.php";

if (isset($pageRoutes[$request])) { // if the path is in the $pageRoutes array
    loadPage($pageRoutes[$request]);
} else if (isset($markdownFiles[$request])) { // if the path is in the $markdownFiles array
    loadArticle($markdownFiles[$request]);
} else { // if it doesn't match either
    http_response_code(404);
    include('404.php');
}
```

Extending the Concept
---------------------

I like this approach because the routes file is very fast and easy to update, I avoid a ton of boilerplate code, and I can pretty easily extend it to handle other types of files.

For example, if I wanted to hand out links to a .zip file, I could add a third array, like:

```php
$fileDownloads = array(
    "/sample-downoad" => "personal/content/files/my-download.zip"
)
```

And look for the path in that before dropping into the 404 error.

Or, if I wanted to give more customized back links, I could create an array for the Markdown pages used in each section of the site.