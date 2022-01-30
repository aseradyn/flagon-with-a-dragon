A Simple, Flexible PHP Page Router
==================================

_Updated January 30, 2022_

A router is a great way to avoid including boilerplate code, and to avoid some of the relative URL problems when you have pages at different levels of the site pointing at each other.

I do a lot - but not all - of my pages in Markdown, so I wanted something that would let me eaily handle both Markdown-based pages and pure PHP pages without having to segregate them into directories or rely on magic strings.

This method needs three pieces:

* A .htaccess file to route all requests to the index.php file (and an Apache server that supports this - most do, I think?)

* One or more arrays of paths that you can use to resolve the paths

* Some PHP code to match the request to the corresponding content and load the content.

**The important thing to wrap your head around** here is that the "router" is not redirecting you, it's just pulling the correct content into the index page. The .htaccess rewrite rules make it _look_ like you're at a page (like, http://mysite.com/page/my-page), but what's actually rendering is your `index.php` page, with some content pulled in.

The .htaccess file
------------------

This redirects all requests to my index.php file, unless the file actually exists at the request path.

```
RewriteEngine On
RewriteCond %{REQUEST_FILENAME} !-f
RewriteBase /
RewriteRule ^(.*)$ index.php
```

`RewriteCond %{REQUEST_FILENAME} !-f` turns out to be really important if you want things like images and CSS and fonts to work properly :)  This is saying to only redirect if the requested file doesn't exist.

The routes
----------

Set up one associative array for each type of page you have in your site. In my example, I have two arrays: one for the regular PHP pages (`$pageRoutes`) and one for the pages that are just going to pull in a Markdown file (`$markdownFiles`).

In each array, the key (on the left) should be the request route - the path where you want the page to appear. For example, "/personal" if I want the page at `http://my.site.com/personal`.

The value (on the right) should be the actual path to the file in your file structure, relative to the index page.

Here's an example where I just hard-coded the arrays:

```php
$pageRoutes = array(
    "" => "home.php",
    "/personal" => "pages/personal",
    "/professional" => "pages/professional"
);

$markdownFiles = array(
    "/blog-with-markdown" => "pages/blog-with-markdown.md",
    "/prettier-paths-with-htaccess" => "pages/prettier-paths-with-htaccess.md",
);
```

If you want, just to test the concept, you can stop here and move on to the router. But if you want to avoid having to update these arrays manually, the next step is to fill the arrays dynamically.

Here's an example of a function to create an array of all the `.php` pages. Similar scripts can be written for whatever content you need to handle. For example, I have a second function to get all the markdown files.

```php

function findPHPRoutes() {

$Directory = new RecursiveDirectoryIterator($_SERVER["DOCUMENT_ROOT"].'/pages');
$Iterator = new RecursiveIteratorIterator($Directory);
$Regex = new RegexIterator($Iterator, '/^.+\.php$/i', RecursiveRegexIterator::GET_MATCH);

$phpRoutes = array();

foreach($Regex as $v){
    $pathString = $v[0];                                                // blah\blah\pages/info/index.php - the raw string from the iterator
    $pathString = str_replace('\\', '/', $pathString);                  // blah/blah/pages/info/index.php - turn the slashes around
    $pagesEnd = strrpos($pathString, "/pages/") + 6;                    
    $clippedPath = substr($pathString, $pagesEnd);                     // info/index.php - clip off all the leading folders

    // remove any arguments from the request
    // if you use anchors (#) you should strip those out as well (not shown)
    $argumentsPosition = strpos($clippedPath, "?");
    if ($argumentsPosition) {
        $clippedPath = substr($clippedPath, 0, $argumentsPosition);
    }

    $clippedExtension = substr($clippedPath, 0, -4);                    // info/index - remove the .php extension
    
    $phpRoutes[$clippedExtension] = $clippedExtension;

    // if it's an index file, we also want the bare path
    $substring = substr($clippedExtension, -5);
    if ($substring == "index") {
        $clippedIndex = substr($clippedPath, 0, -10);                    // info
        $phpRoutes[$clippedIndex] = $clippedExtension;
    }
    
}

return $phpRoutes;

}

```

The Router
----------

Now that we know what files we _have_, we need a way to match them up to what the browser is asking for.

First, get the request URL (what's in the browser's address bar) and clean it up. Then, check to see if it has a match in any of the arrays. 

If there's a match, load the needed content.

If not, return a 404.

```php
$request = $_SERVER['REQUEST_URI'];
$request = rtrim($request, '/\\'); // ignore trailing slashes

if (isset($pageRoutes[$request])) { // if the path is in the $pageRoutes array
    include($_SERVER["DOCUMENT_ROOT"]."/pages/".$path.".php"); // $markdownFiles[$request] returns the right half of the key => value pair in our array - it's the actual file name
} else if (isset($markdownFiles[$request])) { // if the path is in the $markdownFiles array
    $html = processMarkdown($markdownFiles[$request]);  
    echo "<article class='markdown'>".$html."</article>";
} else { // if it doesn't match either
    http_response_code(404);
    include('404.php');
}
```

That's it! Now if I put a file at /pages/my-page.php, and use the url http://my-site/my-page, I'll get the content of that PHP file 🪄

Extending the Concept
---------------------

This type of router is pretty simple to implement and - more importantly - since the code is yours you can extend it to do more.

For example, if you need to do more to load the content - insert sub-menus or different style shees for some sections of your site, perhaps - you can write loading functions instead of doing it all in the router itself.

If you want to process or handle another type of file, you can write a new array and add it to the router pretty quickly.

Have fun!