Using Markdown text files as the data source for a PHP-based blog
=================================================================

A blog post written using Markdown about how to make Markdown work as the source data for a blog. How meta ;)

Markdown, for the uninitiated, is a standard for creating human-readable, machine-readable text files that convert well to HTML for use on the web.  It's a very fast, easy way to create content, without getting hung up on font sizes, colors, fancy layouts, and all that jazz.  This, my friends, is what writing was meant to be.  You can find more information about Markdown [on Daring Fireball](http://daringfireball.net/projects/markdown/).

The idea here is to create a simple blog when you have a PHP server but no access to a database. Everything is stored in text and PHP files that can be easily copied to a server.

Prerequisites
-------------

To make this solution work, you need:

* a server running PHP, with .htaccess files enabled (for rewrite rules)

* [markdown.php](https://michelf.ca/projects/php-markdown/classic/).

* the text editor of your choice

On to the magic!

What needs to happen
--------------------

This whole tutorial will make more sense if we talk about what we want to happen.  Here, step-by-step, is what is going on:

1. The index.php page looks in the /posts folder and gets a list of all the .txt files in there
2. The list is sorted by date, and only the last 5 entries are kept
3. Index.php creates links to the last five topics, in the form: `/posts/YYYY-MM-DD_Article_Title.php`  (This file doesn't exist, so...)
2. The browser is redirected to `post.php?file=YYYY-MM-DD_Article_Title` in the root directory
3. The post.php page grabs the `YYYY-MM-DD_Article_Title.txt` file, converts it to HTML, and displays the content.

The visitor thinks they're seeing `/posts/YYYY-MM-DD_Article_Title.php`, because that's what's in their address bar. If they share this link, or bookmark it, they'll get the correct content.

Configuration
-------------

###File structure

For this example, we'll have one folder from the root of the site, called posts.  This is where you'll put your .txt files.

Files use the following naming convention: `YYYY-MM-DD_Article_Title.txt`  Keeping this convention is important, because this is how we get the date for the post for the RSS feed.

###.htaccess

We'll be creating our pages on the fly, so we'll also need to add a .htaccess file in the /posts folder.

Remember from our list above, this is what we need the .htaccess file to do:

	The browser is redirected to `post.php?file=YYYY-MM-DD_Article_Title` in the root directory

Since we just created the /posts folder, it won't have a .htaccess file. Create a new, blank text file and save it as `/posts/.htaccess`.
	
So, here's the code to make that magic happen:

<hr />

	RewriteEngine On
	RewriteBase /
	RewriteRule ^(.*)\.php$ post.php?file=$1 [L]
<hr />
	
What, exactly, does this do?

`RewriteEngine On`: Tells the server to enable rewrite rules in this directory. That's all. Just gotta turn the power on ;)

`RewriteBase /`: Frankly, I'm a little fuzzy on this, but what it did for me was eliminate a problem where a bunch of extra folders were showing up in the redirect path, folders that I see when I log in using FTP, but that you can't actually get to with a browser. It was breaking the link, and I stumbled across this as a fix. Some day, I'll bother to go look it up... probably...

`RewriteRule ^(.*)\.php$ post.php?file=$1 [L]` needs to be broken out a bit:

* `RewriteRule` indicates that this is a new rewrite rule. Wow!

* `^` indicates the start of the regular expression for which files should be redirected

* `$` indicates the end of the regular expression 

* `( )` everything between the parentheses becomes the string value of variable $1

* `.*\.php` tells it to rewrite all .php requests to this directory.  Don't ask me what the \ is for, I haven't figured that out yet. I should ask my local regex guru... or maybe he'll read the blog and just inform me :oP

Okay, so save that.

The Code
--------

To make this work, we'll create the following files:

* index.php - This is the front page of our blog

* post.php - This will show individual topics posted to the blog

I've made no attempt to break out re-used code into functions. At this point, it's more important to just see how it works. So, there's a lot that will look familiar once we do the first page.

###post.php

Remember, here's the link that will go to post.php:

	post.php?file=YYYY-MM-DD_Article_Title

Got it? Okay, let's go!

Here's the full code for this page:
<hr />

	<?php 

	$post = "http://www.blueninja.us/posts/" . $_GET["file"] . ".txt";

	$PostMarkdown = file_get_contents($post);	
	include_once "markdown.php";
	$PostHTML = Markdown($PostMarkdown);

	echo $PostHTML;

	?>
<hr />

Since understanding is important, let's break it out piece by piece.

First, we need to get the name of the file from the link, and set it up so that we're looking in the right place for the .txt file.

	$post = "http://www.blueninja.us/posts/" . $_GET["file"] . ".txt";

`$_GET` is the magic that lets us get the value of the "file" variable from the URL

The . between each section just add them together to make the `$post` string value.

Next, convert the contents of the TXT file to HTML by running it through markdown.php.

	// file_get_contents opens the TXT and reads it in as a string
	$PostMarkdown = file_get_contents($post);	
	
	// include_once just makes the markdown.php file available for the next step
	include_once "markdown.php";
	
	// And now we run the contents of the TXT file (saved as a string in $PostMarkdown) 
	// through the Markdown function in markdown.php
	$PostHTML = Markdown($PostMarkdown);

Finally, show the HTML-ized page contents:

	echo $PostHTML;

One down! One to go.

###index.php

The index page is going to get a list of all the .txt files in the /posts/ directory and link to them as if they were .php pages.

<hr>
	
	<h1>Recent Posts</h1>

	<?php

	$list = glob('posts/*.txt');
	$list = array_reverse($list);
	$limit=5; 
	$list=array_slice($list, 0, $limit);					
	foreach($list as $post)
	{
		$postSansTXT = substr($post, 0, strpos($post, ".txt"));
		
		$PostMarkdown = file_get_contents($post);
		include_once "markdown.php";
		$PostHTML = Markdown($PostMarkdown);
		
		$doc = new DOMDocument();
		$doc->loadHTML($PostHTML);
		$h1 = $doc->getElementsByTagName('h1');
		
		echo "<p><a href='$postSansTXT.php'>";
		echo $h1->item(0)->nodeValue;
		echo '</a></p>';
	}

	?>
<hr />
Let's break it out, skipping the stuff we covered previously.

First, we need a list of all .txt files in the /posts/ directory.

	$list = glob('posts/*.txt');

I have no idea why it's called glob, but this is the needed function. *.txt just selects all TXT files in the /posts folder. The list is saved as an array stored in $list.

Now that we have the array, we can play with it and get just the files we want to display on the home page.

First, since our files are named using the date in the form YYYY-MM-DD, they'll be listed in the array from oldest to newest (because that's how they're sorted in the file system).  Let's turn that upside down and list them newest-to-oldest.

	$list = array_reverse($list);

Then, we want to limit our results to just the first five items in the list (the five newest posts):

	$limit=5; 
	$list=array_slice($list, 0, $limit);
	
Setting the limit as a variable makes array_slice easier to understand if I needed to come back and change it later (if, say, I wanted to show 10 posts).  The paramters for array_slice are 1) the array ($list), 2) the first value to keep (arrays start counting at 0, for whatever reason), and 3) the number of rows we should keep (our $limit).  In this example, we'll keep items 0,1,2,3,4 (for a total of 5 items).

Now that we've cut it down to size, let's loop through it and create our links.

First, I need the path to the file, but I want to strip off the .txt file extenstion.  That requires use of the substring (substr) function, along with the string position (strpos):

	$postSansTXT = substr($post, 0, strpos($post, ".txt"));
	
This could also be written as two lines:

	$WhereIsTheTXT = strpos($post, ".txt");
	$postSansTXT = substr($post, 0, $WhereIsTheTXT);
	
`strpos()` tells us where in the string .txt begins.  `substr()` then cuts that bit off (or, more accurately, keeps everything between position 0 and the start of .txt).  So, if we had a text file `/posts/YYYY-MM-DD_Article_Title.txt`, $postSansTXT now has a value of `/posts/YYYY-MM-DD_Article_Title`.

The bit where we run the post through markdown.php should be familiar.  Then we get to the DOM fun.

DOM stands for "document object model", and it's a way to parse the HTML stored in the $PostHTML variable looking for one specific thing. In this case, we're looking for the title of the post.

So, create a new document.

	$doc = new DOMDocument();

Copy the HTML from $PostHTML into the new document:

	$doc->loadHTML($PostHTML);

And find the H1 tags:

	$h1 = $doc->getElementsByTagName('h1');

Note that this actually crawls through the whole document and creates a list of all H1 tags.  Effectively, it's creating an array.  In many cases - most, I suspect, as long as you use H1 for the primary heading/title for the article, this should be an array with only one row.

Finally, we write the link:

		echo "<p><a href='$postSansTXT.php'>";
		echo $h1->item(0)->nodeValue;
		echo '</a></p>';

See that funky `$h1->item(0)->nodeValue`?  That's extracting the value/content of the first H1 tag in the array (item 0), and writing it onto the page.

Ta Da!
------

Okay, so then you just need to write your first article, save it in your /posts/ folder, and upload the whole lot to your server.

Theoretically, it should "just work" at this point.  If it doesn't... let me know. I may have missed a step somewhere ;)