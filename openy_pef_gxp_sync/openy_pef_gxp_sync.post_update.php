<?php

/**
 * @file
 * Post update functions for the openy_pef_gxp_sync useless machine.
 */

/**
 * Uninstall me.
 */
function openy_pef_gxp_sync_post_update_uninstall() {
  \Drupal::service('module_installer')->uninstall(['openy_pef_gxp_sync']);
}
