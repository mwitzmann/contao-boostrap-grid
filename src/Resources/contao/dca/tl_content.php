<?php

/**
 * @package    contao-bootstrap
 * @author     David Molineus <david.molineus@netzmacht.de>
 * @copyright  2017 netzmacht David Molineus. All rights reserved.
 * @filesource
 *
 */

/*
 * Palettes
 */

$GLOBALS['TL_DCA']['tl_content']['metapalettes']['bs_gridStart'] = [
    'type'           => [
        'type',
        'bs_grid',
        'bs_grid_name',
    ],
    'bs_grid_wizard' => ['bs_grid_wizard'],
    'template'       => [':hide', 'customTpl'],
    'protected'      => [':hide', 'protected'],
    'expert'         => [':hide', 'guests', 'cssID'],
    'invisible'      => ['invisible', 'start', 'stop'],
];

$GLOBALS['TL_DCA']['tl_content']['metapalettes']['bs_gridSeparator'] = [
    'type'      => ['type', 'name', 'bs_grid_parent'],
    'template'  => [':hide', 'customTpl'],
    'protected' => [':hide', 'protected'],
    'expert'    => [':hide', 'guests', 'cssID'],
    'invisible' => ['invisible', 'start', 'stop'],
];

$GLOBALS['TL_DCA']['tl_content']['metapalettes']['bs_gridStop'] = [
    'type'      => ['type', 'name', 'bs_grid_parent'],
    'template'  => [':hide', 'customTpl'],
    'protected' => [':hide', 'protected'],
    'expert'    => [':hide', 'guests', 'cssID'],
    'invisible' => ['invisible', 'start', 'stop'],
];


/*
 * Fields
 */

$GLOBALS['TL_DCA']['tl_content']['fields']['bs_grid'] = [
    'label'            => &$GLOBALS['TL_LANG']['tl_content']['bs_grid'],
    'exclude'          => true,
    'inputType'        => 'select',
    'options_callback' => ['contao_bootstrap.grid.dca.content', 'getGridOptions'],
    'reference'        => &$GLOBALS['TL_LANG']['tl_content'],
    'eval'             => [
        'mandatory'          => true,
        'submitOnChange'     => true,
        'includeBlankOption' => true,
        'chosen'             => true,
        'tl_class'           => 'w50'
    ],
    'sql'              => "int(10) unsigned NOT NULL default '0'",
    'relation'         => ['type' => 'hasOne', 'load' => 'lazy'],
    'foreignKey'       => 'tl_grid.title'
];

$GLOBALS['TL_DCA']['tl_content']['fields']['bs_grid_name'] = [
    'label'         => &$GLOBALS['TL_LANG']['tl_content']['bs_grid_name'],
    'exclude'       => true,
    'inputType'     => 'text',
    'reference'     => &$GLOBALS['TL_LANG']['tl_content'],
    'eval'          => [
        'submitOnChange'     => true,
        'includeBlankOption' => true,
        'chosen'             => true,
        'tl_class'           => 'w50'
    ],
    'save_callback' => [
        ['contao_bootstrap.grid.dca.content', 'generateGridName']
    ],
    'sql'           => "varchar(64) NOT NULL default ''",
];

$GLOBALS['TL_DCA']['tl_content']['fields']['bs_grid_parent'] = [
    'label'            => &$GLOBALS['TL_LANG']['tl_content']['bs_grid'],
    'exclude'          => true,
    'inputType'        => 'select',
    'options_callback' => ['contao_bootstrap.grid.dca.content', 'getGridParentOptions'],
    'reference'        => &$GLOBALS['TL_LANG']['tl_content'],
    'eval'             => [
        'mandatory'          => true,
        'submitOnChange'     => true,
        'includeBlankOption' => true,
        'chosen'             => true,
        'tl_class'           => 'w50'
    ],
    'sql'              => "int(10) unsigned NOT NULL default '0'"
];

$GLOBALS['TL_DCA']['tl_content']['fields']['bs_grid_wizard'] = [
    'label'            => &$GLOBALS['TL_LANG']['tl_content']['bs_grid_wizard'],
    'exclude'          => true,
    'inputType'        => 'select',
    'options_callback' => ['contao_bootstrap.grid.dca.content', 'getGridColumns'],
    'save_callback'    => [
        ['contao_bootstrap.grid.dca.content', 'generateColumns'],
    ],
    'eval'             => [
        'includeBlankOption' => true,
        'chosen'             => true,
        'tl_class'           => 'clr w50',
        'doNotSaveEmpty'     => true,
    ],
];
