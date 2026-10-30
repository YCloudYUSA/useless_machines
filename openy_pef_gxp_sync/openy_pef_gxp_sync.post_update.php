<?php

/**
 * @file
 * Post update functions for the openy_pef_gxp_sync useless machine.
 */

/**
 * Uninstall me.
 */
function openy_pef_gxp_sync_post_update_uninstall() {
  $entity_type = \Drupal::entityDefinitionUpdateManager()->getEntityType('openy_pef_gxp_mapping');
  if ($entity_type) {
    openy_pef_gxp_sync_drop_storage($entity_type);
  }
  \Drupal::service('module_installer')->uninstall(['openy_pef_gxp_sync']);
}

/**
 * Drops the storage left by the retired entity type.
 *
 * The entity class is gone, so the last installed definition is handed to the
 * entity type listener, which drops the tables and their schema data from it.
 *
 * @param \Drupal\Core\Entity\EntityTypeInterface $entity_type
 *   The last installed definition of the retired entity type.
 */
function openy_pef_gxp_sync_drop_storage($entity_type) {
  \Drupal::service('entity_type.listener')->onEntityTypeDelete($entity_type);
}
