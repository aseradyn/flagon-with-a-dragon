<?php
  function LinkWithSummary(string $title, string $summary, string $href) {
?>
    <style>
      .link-with-summary {
        view-transition-name: article
      }
    </style>
    <div class="link-with-summary">
      <h3><a href="<?php echo $href ?>"><?php echo $title ?></a></h3>
      <p><?php echo $summary ?></p>
    </div>    
<?php
  }
?>
