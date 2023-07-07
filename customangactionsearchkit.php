<?php

require_once 'customangactionsearchkit.civix.php';
// phpcs:disable
use CRM_Customangactionsearchkit_ExtensionUtil as E;
// phpcs:enable

/**
 * Implements hook_civicrm_config().
 *
 * @link https://docs.civicrm.org/dev/en/latest/hooks/hook_civicrm_config/
 */
function customangactionsearchkit_civicrm_config(&$config) {
  _customangactionsearchkit_civix_civicrm_config($config);
}

/**
 * Implements hook_civicrm_xmlMenu().
 *
 * @link https://docs.civicrm.org/dev/en/latest/hooks/hook_civicrm_xmlMenu
 */
function customangactionsearchkit_civicrm_xmlMenu(&$files) {
  _customangactionsearchkit_civix_civicrm_xmlMenu($files);
}

/**
 * Implements hook_civicrm_install().
 *
 * @link https://docs.civicrm.org/dev/en/latest/hooks/hook_civicrm_install
 */
function customangactionsearchkit_civicrm_install() {
  _customangactionsearchkit_civix_civicrm_install();
}

/**
 * Implements hook_civicrm_postInstall().
 *
 * @link https://docs.civicrm.org/dev/en/latest/hooks/hook_civicrm_postInstall
 */
function customangactionsearchkit_civicrm_postInstall() {
  _customangactionsearchkit_civix_civicrm_postInstall();
}

/**
 * Implements hook_civicrm_uninstall().
 *
 * @link https://docs.civicrm.org/dev/en/latest/hooks/hook_civicrm_uninstall
 */
function customangactionsearchkit_civicrm_uninstall() {
  _customangactionsearchkit_civix_civicrm_uninstall();
}

/**
 * Implements hook_civicrm_enable().
 *
 * @link https://docs.civicrm.org/dev/en/latest/hooks/hook_civicrm_enable
 */
function customangactionsearchkit_civicrm_enable() {
  _customangactionsearchkit_civix_civicrm_enable();
}

/**
 * Implements hook_civicrm_disable().
 *
 * @link https://docs.civicrm.org/dev/en/latest/hooks/hook_civicrm_disable
 */
function customangactionsearchkit_civicrm_disable() {
  _customangactionsearchkit_civix_civicrm_disable();
}

/**
 * Implements hook_civicrm_upgrade().
 *
 * @link https://docs.civicrm.org/dev/en/latest/hooks/hook_civicrm_upgrade
 */
function customangactionsearchkit_civicrm_upgrade($op, CRM_Queue_Queue $queue = NULL) {
  return _customangactionsearchkit_civix_civicrm_upgrade($op, $queue);
}

/**
 * Implements hook_civicrm_managed().
 *
 * Generate a list of entities to create/deactivate/delete when this module
 * is installed, disabled, uninstalled.
 *
 * @link https://docs.civicrm.org/dev/en/latest/hooks/hook_civicrm_managed
 */
function customangactionsearchkit_civicrm_managed(&$entities) {
  _customangactionsearchkit_civix_civicrm_managed($entities);
}

/**
 * Implements hook_civicrm_caseTypes().
 *
 * Add CiviCase types provided by this extension.
 *
 * @link https://docs.civicrm.org/dev/en/latest/hooks/hook_civicrm_caseTypes
 */
function customangactionsearchkit_civicrm_caseTypes(&$caseTypes) {
  _customangactionsearchkit_civix_civicrm_caseTypes($caseTypes);
}

/**
 * Implements hook_civicrm_angularModules().
 *
 * Add Angular modules provided by this extension.
 *
 * @link https://docs.civicrm.org/dev/en/latest/hooks/hook_civicrm_angularModules
 */
function customangactionsearchkit_civicrm_angularModules(&$angularModules) {
  // Auto-add module files from ./ang/*.ang.php
  _customangactionsearchkit_civix_civicrm_angularModules($angularModules);
}

/**
 * Implements hook_civicrm_alterSettingsFolders().
 *
 * @link https://docs.civicrm.org/dev/en/latest/hooks/hook_civicrm_alterSettingsFolders
 */
function customangactionsearchkit_civicrm_alterSettingsFolders(&$metaDataFolders = NULL) {
  _customangactionsearchkit_civix_civicrm_alterSettingsFolders($metaDataFolders);
}

/**
 * Implements hook_civicrm_entityTypes().
 *
 * Declare entity types provided by this module.
 *
 * @link https://docs.civicrm.org/dev/en/latest/hooks/hook_civicrm_entityTypes
 */
function customangactionsearchkit_civicrm_entityTypes(&$entityTypes) {
  _customangactionsearchkit_civix_civicrm_entityTypes($entityTypes);
}

/**
 * Implements hook_civicrm_themes().
 */
function customangactionsearchkit_civicrm_themes(&$themes) {
  _customangactionsearchkit_civix_civicrm_themes($themes);
}
    
    /**
     * Implements hook_civicrm_searchKitTasks().
     *
     * @param array[] $tasks
     * @param bool $checkPermissions
     * @param int|null $userID
     */
    function customangactionsearchkit_civicrm_searchKitTasks(array &$tasks, bool $checkPermissions, ?int $userID) {
        
        $tasks['Contact']['test'] = [
          'module' => 'crmCustomangactionsearchkit',
          'title' => E::ts('Nouvelle popup avec angular'),
          'icon' => 'fa-info',
          'uiDialog' => ['templateUrl' => '~/crmCustomangactionsearchkit/customangactionsearchkit.html'],
        ];
    }

// --- Functions below this ship commented out. Uncomment as required. ---

/**
 * Implements hook_civicrm_preProcess().
 *
 * @link https://docs.civicrm.org/dev/en/latest/hooks/hook_civicrm_preProcess
 */
//function customangactionsearchkit_civicrm_preProcess($formName, &$form) {
//
//}

/**
 * Implements hook_civicrm_navigationMenu().
 *
 * @link https://docs.civicrm.org/dev/en/latest/hooks/hook_civicrm_navigationMenu
 */
//function customangactionsearchkit_civicrm_navigationMenu(&$menu) {
//  _customangactionsearchkit_civix_insert_navigation_menu($menu, 'Mailings', [
//    'label' => E::ts('New subliminal message'),
//    'name' => 'mailing_subliminal_message',
//    'url' => 'civicrm/mailing/subliminal',
//    'permission' => 'access CiviMail',
//    'operator' => 'OR',
//    'separator' => 0,
//  ]);
//  _customangactionsearchkit_civix_navigationMenu($menu);
//}
