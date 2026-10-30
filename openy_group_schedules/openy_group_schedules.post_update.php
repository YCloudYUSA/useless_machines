<?php

/**
 * @file
 * Post update functions for the openy_group_schedules useless machine.
 */

/**
 * Uninstall me.
 */
function openy_group_schedules_post_update_uninstall() {
  \Drupal::service('module_installer')->uninstall(['openy_group_schedules']);
}
