<?php

/**
 * @file
 * Post update functions for the openy_gxp useless machine.
 */

/**
 * Uninstall me.
 */
function openy_gxp_post_update_uninstall() {
  \Drupal::service('module_installer')->uninstall(['openy_gxp']);
}
