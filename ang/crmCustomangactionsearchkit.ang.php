<?php
// This file declares an Angular module which can be autoloaded
// in CiviCRM. See also:
// \https://docs.civicrm.org/dev/en/latest/hooks/hook_civicrm_angularModules/n
return [
  'js' => [
    'ang/crmCustomangactionsearchkit.js',
    'ang/crmCustomangactionsearchkit/*.js',
    'ang/crmCustomangactionsearchkit/*/*.js',
  ],
  'css' => [
    'ang/crmCustomangactionsearchkit.css',
  ],
  'partials' => [
    'ang/crmCustomangactionsearchkit',
  ],
  'requires' => [
    'crmUi',
    'crmUtil',
    'ngRoute',
  ],
  'settings' => [],
];
