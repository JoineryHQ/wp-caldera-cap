<?php

/**
 * Utility methods for caplog plugin.
 */
class WpCalderaCapUtil {
  
  public static function defineCaps($cap, $context) {
    $a = "CONTEXT: $context";
    return self::convertContextToCap($context);
  }
  
  public static function getCalderaContexts() {
    return [
      'edit-entry',
      'resend-email',
      'create',
      'delete-entry',
      'edit-entry',
      'entry-edit',
      'entry-view',
      'export',
      'import',
      'manage',
      'resend-email',
      'save',
      'admin',
      'edit',
      'manage',
    ];
  }
  
  public static function convertContextToCap($context) {
    return 'caldera_forms_' . str_replace('-', '_', $context);
  }
}
