<?php
  function LinkWithSummary(string $title, string $summary, string $href) {
?>
    <div class="link-with-summary">
      <h3><a href="<?php echo $href ?>"></a><?php echo $title ?></h3>
      <p><?php echo $summary ?></p>
    </div>    
<?php
  }
?>
