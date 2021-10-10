<meta date="2020-05-09">

# Prettier URLs with .htaccess

I'm working on re-starting my blog, and starting again from scratch. This time, I want prettier URLs - think, posts/a-thing-I-love instead of posts/a-thing-I-love.php

Response from Piyush at https://stackoverflow.com/questions/812571/how-to-create-friendly-url-in-php

Here's how you can get pretty URLs on a PHP site

	RewriteCond %{REQUEST_FILENAME} !-f
	RewriteCond %{REQUEST_FILENAME} !-d
	RewriteRule ^(.*)$ /index.php

Basically, if the file or folder actually exists, route to it
Otherwise, load the index.php file, which has logic to render whatever content you are requesting

In my case, I'm pulling in content from markdown files to display. Easy peasy.