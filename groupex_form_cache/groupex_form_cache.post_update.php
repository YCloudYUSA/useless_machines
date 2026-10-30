<?php

/**
 * @file
 * Post update functions for the groupex_form_cache useless machine.
 */

/**
 * Uninstall me.
 */
function groupex_form_cache_post_update_uninstall() {
  $entity_type = \Drupal::entityDefinitionUpdateManager()->getEntityType('groupex_form_cache');
  if ($entity_type) {
    groupex_form_cache_drop_storage($entity_type);
  }
  \Drupal::service('module_installer')->uninstall(['groupex_form_cache']);
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
function groupex_form_cache_drop_storage($entity_type) {
  // Config entities of fields and displays cannot be loaded or deleted through
  // their API without the entity type, so the config and the field map of the
  // type are removed directly.
  $config_factory = \Drupal::configFactory();
  $prefixes = ['field.storage.', 'field.field.', 'core.entity_form_display.', 'core.entity_view_display.'];
  foreach ($prefixes as $prefix) {
    foreach ($config_factory->listAll($prefix . $entity_type->id() . '.') as $name) {
      $config_factory->getEditable($name)->delete();
    }
  }
  \Drupal::keyValue('entity.definitions.bundle_field_map')->delete($entity_type->id());
  \Drupal::service('entity_type.listener')->onEntityTypeDelete($entity_type);
}
