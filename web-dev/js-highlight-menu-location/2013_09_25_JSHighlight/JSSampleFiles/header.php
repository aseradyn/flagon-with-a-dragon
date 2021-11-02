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
                document.getElementById("BlogPosts").style.backgroundColor="red";
            } else if (PageURL.indexOf('/galleries/') != -1) {
                document.getElementById("Galleries").style.backgroundColor="red";
            } else if (PageURL.indexOf('links.php') != -1) {
                document.getElementById("Links").style.backgroundColor="red";
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