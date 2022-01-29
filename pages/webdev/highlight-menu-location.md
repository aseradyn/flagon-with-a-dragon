Using Javascript to change the style of a link based on the path to the current page
====================================================================================

_Originally written in 2013. Last updated October 15 2021_

In which I turn an ordinary menu into a kind of abbreviated breadcrumb trail, automagically.

Let's say you have a menu system, and you want it to do double-duty as an indicator of which section of your site a user is in.  Specifically, you want to apply a different style - perhaps a color or an underline - to the menu item that represents this part of the site.  However, your menu lives in some template file (header.php, say), and you don't want to add custom code to each page to indicate which menu item should light up.

What we gonna do is...
----------------------

First, some prerequisites for this solution to work:

1. Your site structure must map to your menu pretty closely.  For example, if you have a menu item called "Blog Posts", pages that would appear under Blog Posts must have some unique piece of the path that indicates they are blog posts.  For example, if the path is: http://www.mysite.com/posts/heres-a-post.php, you're good, because we can use the `/posts/` part of the path as our identifier.

2. Javascript must be enabled in the browser. Duh ;) However, if it's disabled, all that will happen is that your highlight won't show up, which is usually not mission-critical.

So, here's the big picture of what we're going to do:

1. Use javascript to get the path to the current page.
2. Scan through that path looking for keys (like `/posts/`), and figure out which menu item we need to highlight.
3. Set the style for the menu item.

Simple enough, right? Here we go!

Where am I?
-----------

First, we need to find the path to the current page.

	var PageURL;
    PageURL = document.URL;

First, we declare a new variable, `PageURL`.  Then we fill that variable with the path to the current page.

Getting to know you...
----------------------

Next step is to set a unique ID for each menu item.  If your menu is set up as an unordered list, assign IDs like this:

	<ul>
		<li id="BlogPosts">Blog Posts</li>
		<li id="Galleries">Photo Galleries</li>
		<li id="Links">Links to cool stuff</li>
	</ul>	

These IDs will be used to identify the correct menu item when it's time to set the highlight style.

Mapping keys to menu items
--------------------------

Now that we can reliably determine where we are in the site, we need to create a map for which menu items to highlight when certain elements are found.  It's If/Then time!

We're basically going to write a series of nested `if` statements checking whether the path, `PageURL`, contains the key for the menu item.  If it does, we'll apply a highlight.

    if(PageURL.indexOf('/posts/') != -1){
		document.querySelector("#BlogPosts").style.backgroundColor="red";
    } else if (PageURL.indexOf('/galleries/') != -1) {
        document.querySelector("#Galleries").style.backgroundColor="red";
    } else if (PageURL.indexOf('links.php') != -1) {
        document.querySelector("#Links").style.backgroundColor="red";
    }
		
.indexOf() returns the location of the key (for example, `/posts/`) within the path (`PageURL`). If the key is not found within the path, it returns -1.  So, if the indexOf() is anything other than -1, the key exists within the `PageURL` path.  If you have chosen your keys well, that means that we now know which menu item to highlight!

As an alternative, you can set a class on the matching element:

	document.querySelector('BlogPosts).classList.add("selected");

**Watch those braces!** If you don't close them all, you could have a spot of trouble.

Turning On the Power
--------------------

The last step is to actually make the script run.  We'll wrap all this code up in a function called `HighlightMenu` and use this in our `<script>` tag to make it run:

	window.onload = HighlightMenu;

Now, when the page loads, our `HighlightMenu()` function will run automatically.

Putting it all together
-----------------------

Now, let's put this all together.

In the header.php:

	<html>
	<head>
		<style>
		
			#nav ul {
			list-style: none;
			position: relative;
			display: inline-table;
			margin: 5px;
			padding-left: 0px;
			}
			
		
		</style>

		<script>

	       function HighlightMenu() {
	            var PageURL;
	            PageURL = document.URL;

	            if(PageURL.indexOf('/posts/') != -1){
	                document.querySelector("#BlogPosts").style.backgroundColor="red";
	            } else if (PageURL.indexOf('/galleries/') != -1) {
	                document.querySelector("#Galleries").style.backgroundColor="red";
	            } else if (PageURL.indexOf('links.php') != -1) {
	                document.querySelector("#Links").style.backgroundColor="red";
	            }
	        }

	    	window.onload = HighlightMenu;

	    </script>

	</head>
	<body>
		<div id="nav">
			<ul>
				<li id="BlogPosts"><a href="posts/index.php">Blog Posts</a></li>
				<li id="Galleries"><a href="galleries/index.php">Photo Galleries</a></li>
				<li id="Links"><a href="links.php">Links to cool stuff</a></li>
			</ul>
		</div>


And just for the heck of it, a `footer.php` that just closes off the tags we opened in the header:

	</body>
	</html>

And then let's create a few pages with some nonsense content, so that we can click around and watch the links change.

NOTE: The links in the sample files will break if you're not starting from the Home page, so go back after clicking each link.  If you implement this feature, either use absolute URLs in your navigation (easiest) or use code to write/rewrite the links so that they'll work over multiple levels of your site structure.

([Download all example files](2013-09-25_JSHighlight.zip))

index.php:

	<?php include_once "header.php" ?>
	
	<h1>Home Page</h1>
	<p>This is the home page</p>
	
	<?php include_once "footer.php" ?>

posts/index.php:

	<?php include_once "../header.php" ?>
	
	<h1>Blog Posts</h1>
	<p>Here's a list of my recent blog posts</p>
	
	<?php include_once "../footer.php" ?>

galleries/index.php

	<?php include_once "../header.php" ?>
	
	<h1>Photo Galleries</h1>
	<p>All the pretty pictures!</p>
	
	<?php include_once "../footer.php" ?>

links.php

	<?php include_once "header.php" ?>
	
	<h1>Links</h1>
	<p>Go see some other cool stuff</p>
	
	<?php include_once "footer.php" ?>
	