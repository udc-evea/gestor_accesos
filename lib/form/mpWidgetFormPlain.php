<?php

/**
 * mpWidgetFormPlain muestra un texto no editable, pero mas dinamico.
 * basado en sfWidgetFormPlain.
 *
 * @package    symfony
 * @subpackage widget
 * @author     Francois Zaninotto
 */
class mpWidgetFormPlain extends sfWidgetFormPlain
{
  /**
   * @param array $options     An array of options
   * @param array $attributes  An array of default HTML attributes
   *
   * @see sfWidgetForm
   */
  protected function configure($options = array(), $attributes = array())
  {
    $this->addOption('tag', 'div');
    $this->addOption('static_value');
  }

  /**
   * @param  string $name        The element name
   * @param  string $value       The value displayed in this widget
   * @param  array  $attributes  An array of HTML attributes to be merged with the default HTML attributes
   * @param  array  $errors      An array of errors for the field
   *
   * @return string An HTML tag string
   *
   * @see sfWidgetForm
   */
  public function render($name, $value = null, $attributes = array(), $errors = array())
  {
    $value = ($this->getOption('static_value')) ? ($this->getOption('static_value')) : $value;
    return $this->renderContentTag($this->getOption('tag'), self::escapeOnce($value), $attributes);
  }
}
