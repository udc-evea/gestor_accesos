<?php

/**
 * Default formatter class for forms
 */
class sfWidgetFormSchemaFormattermpTwitterBootstrap2 extends sfWidgetFormSchemaFormatterTwitterBootstrap
{

  protected
  $rowFormat = "<div class=\"control-group %field_has_error%\">\n  %error%%label%\n  <div class=\"controls\">%field%%help%\n%hidden_fields%</div>\n</div>";

  public function formatRow($label, $field, $errors = array(), $help = '', $hiddenFields = null)
  {
    $error_class_in_row = ($errors instanceof sfValidatorError) ? 'error' : '';

    return strtr($this->getRowFormat(), array(
                '%field_has_error%' => $error_class_in_row,
                '%label%' => $label,
                '%field%' => $field,
                '%error%' => $this->formatErrorsForRow($errors),
                '%help%' => $this->formatHelp($help),
                '%hidden_fields%' => null === $hiddenFields ? '%hidden_fields%' : $hiddenFields,
            ));
  }
}
