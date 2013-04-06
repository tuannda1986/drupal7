<?php

function ziivn_form_system_theme_settings_alter(&$form, $form_state, $form_id = NULL)
{
    // Work-around for a core bug affecting admin themes. See issue #943212.
    if (isset($form_id))
    {
        return;
    }

    $form['themedev'] = array(
        '#type' => 'fieldset',
        '#title' => t('Theme development settings'),
    );

    $form['themedev']['ziivn_rebuild_registry'] = array(
        '#type' => 'checkbox',
        '#title' => t('Rebuild theme registry on every page.'),
        '#default_value' => theme_get_setting('ziivn_rebuild_registry'),
        '#description' => t('During theme development, it can be very useful to continuously <a href="!link">rebuild the theme registry</a>.') . '<div class="alert alert-error">' . t('WARNING: this is a huge performance penalty and must be turned off on production websites. ') . l('Drupal.org documentation on theme-registry.', 'http://drupal.org/node/173880#theme-registry') . '</div>',
    );
}