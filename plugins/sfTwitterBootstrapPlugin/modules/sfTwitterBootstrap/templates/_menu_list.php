<?php use_helper('I18N'); ?>
<?php
  /** @var Array of menu items */ $items = $sf_data->getRaw('items');
?>

<?php foreach ($items as $key => $item): ?>
  <?php if (sfTwitterBootstrap::hasPermission($item, $sf_user)): ?>
    <?php if (($items_in_menu && $item['in_menu']) || (!$items_in_menu && !$item['in_menu'])): ?>
      <?php if (isset($item['nav-header'])): ?>
        <li class="nav-header"><?php echo $item['nav-header']; ?></li>
      <?php endif; ?>

      <?php if (array_key_exists('sub-items', $item)): ?>
        <li <?php echo $item['in_menu']? 'class="dropdown-submenu item"':'class="dropdown-submenu item-menu"'; ?>>
          <?php include_partial($this->getModuleName() . '/menu_item', array('item' => $item)); ?>
          <ul class="dropdown-menu">
            <?php foreach($item['sub-items'] as $subItemsKey => $subItems): ?>
              <?php if (sfTwitterBootstrap::hasPermission($subItems, $sf_user)): ?>
                <li>
                  <a tabindex="-1" href="<?php echo url_for($subItems['url']) ?>" title="<?php echo $subItemsKey; ?>">
                    <?php if (sfTwitterBootstrap::getProperty('resize_mode') == 'thumbnail'): ?>
                      <?php echo image_tag('/sfTwitterBootstrapPlugin/images/small/' . $subItems['image'], array('alt' => __($subItemsKey), 'width' => '16', 'height' => '16')); ?>
                    <?php else: ?>
                      <?php echo image_tag($subItems['image'], array('alt' => __($subItemsKey), 'width' => '16', 'height' => '16')); ?>
                    <?php endif; ?>
                    <span><?php echo __($subItemsKey); ?></span>
                  </a>
                </li>
              <?php endif; ?>
            <?php endforeach; ?>
          </ul>
        </li>
      <?php else: ?>
        <li <?php echo $item['in_menu']? 'class="item"':'class="item-menu"'; ?>>
          <?php include_partial($this->getModuleName() . '/menu_item', array('item' => $item)); ?>
        </li>
      <?php endif; ?>

      <?php if (isset($item['divider']) && $item['divider'] == true): ?>
        <li class="divider"></li>
      <?php endif; ?>
    <?php endif; ?>
  <?php endif; ?>

<?php endforeach;
