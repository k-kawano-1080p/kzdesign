<!-- ウィジェット開始-->
<div id="widget">
      <?php
      if (is_active_sidebar('sidebar-1')):
        dynamic_sidebar('sidebar-1');
    else:
        ?>
    <div class="widget">
    </div>
    <?php endif;?>
    <?php print("\n"); ?>
</div>
<!-- ウィジェット終了 -->
<?php print("\n"); ?>
