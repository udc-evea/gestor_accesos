<a href="<?php echo url_for($item['url']) ?>" title="<?php echo __($item['name']); ?>">
  <?php if (sfTwitterBootstrap::getProperty('resize_mode') == 'thumbnail'): ?>
    <?php echo image_tag(substr($item['image'], 0, strrpos($item['image'], '/')).'/small/'.substr($item['image'], strrpos($item['image'], '/') + 1), array('alt' => $item['name'], 'width' => '16', 'height' => '16')); ?>
  <?php else: ?>
    <?php echo image_tag($item['image'], array('alt' => $item['name'], 'width' => '16', 'height' => '16')); ?>
  <?php endif; ?>
  <span><?php echo __($item['name']); ?></span>
</a>
