<?php

// Auto-rebuild the theme registry during theme development.
if (theme_get_setting('ziivn_rebuild_registry') && !defined('MAINTENANCE_MODE'))
{
    // Rebuild .info data.
    system_rebuild_theme_data();
    // Rebuild theme registry.
    drupal_theme_rebuild();
}

function ziivn_js_alter(&$js)
{
    unset($js['settings']);
    unset(
            $js['misc/drupal.js'], $js['misc/jquery.js'], $js['misc/jquery.once.js']
    );

    drupal_add_js(drupal_get_path('theme', 'ziivn') . '/js/jquery-1.9.1.min.js', array('type' => 'file', 'scope' => 'header', 'weight' => 1));
}

function ziivn_css_alter(&$css)
{

    $exclude = array(
        'misc/vertical-tabs.css' => TRUE,
        'modules/aggregator/aggregator.css' => TRUE,
        'modules/block/block.css' => TRUE,
        'modules/book/book.css' => TRUE,
        'modules/comment/comment.css' => TRUE,
        'modules/dblog/dblog.css' => TRUE,
        'modules/file/file.css' => TRUE,
        'modules/filter/filter.css' => TRUE,
        'modules/forum/forum.css' => TRUE,
        'modules/help/help.css' => TRUE,
        'modules/node/node.css' => TRUE,
        'modules/openid/openid.css' => TRUE,
        'modules/poll/poll.css' => TRUE,
        'modules/profile/profile.css' => TRUE,
        'modules/search/search.css' => TRUE,
        'modules/statistics/statistics.css' => TRUE,
        'modules/syslog/syslog.css' => TRUE,
        //'modules/system/admin.css' => TRUE,
        'modules/system/maintenance.css' => TRUE,
        //'modules/system/system.css' => TRUE,
        //'modules/system/system.admin.css' => TRUE,
        //'modules/system/system.base.css' => TRUE,
        'modules/system/system.maintenance.css' => TRUE,
        'modules/system/system.menus.css' => TRUE,
        'modules/system/system.messages.css' => TRUE,
        'modules/system/system.theme.css' => TRUE,
        'modules/taxonomy/taxonomy.css' => TRUE,
        'modules/tracker/tracker.css' => TRUE,
        'modules/update/update.css' => TRUE,
        'modules/user/user.css' => TRUE,
        'modules/field/theme/field.css' => TRUE,
    );

    $css = array_diff_key($css, $exclude);
}

