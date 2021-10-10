<script>

    var HighlightItem;
    if(CurrentLocation.indexOf('/posts/') != -1){
        HighlightItem = document.getElementById("BlogPosts");
    } else {
        if(CurrentLocation.indexOf('/galleries/') != -1{
            HighlightItem = document.getElementById("Galleries");
        } else {
            if(CurrentLocation.indexOf('links.php') != -1{
                HighlightItem = document.getElementById("Links");
            }
        }

    }

    HighlightItem.style.background-color="red";

</script>

</body>
</html>