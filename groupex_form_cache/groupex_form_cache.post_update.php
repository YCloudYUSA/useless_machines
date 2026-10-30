<?php

/**
 * @file
 * Post update functions for the groupex_form_cache useless machine.
 */

/**
 * Uninstall me.
 */
function groupex_form_cache_post_update_uninstall() {
  \Drupal::service('module_installer')->uninstall(['groupex_form_cache']);
}
