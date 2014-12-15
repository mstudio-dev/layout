<?php

$config = array(
	'layout' => array(
		// default viewport value, can be changed in layout
		'viewport' => 'width=device-width, initial-scale=1.0',

		'metapalette' => array(
			'-sections' => array('sections', 'sPosition'),
			'+sections' => array('flexible_sections'),
			'-style'    => array('framework'),
			'-static'   => array('static'),
		),

		'metasubselectpalettes' => array(
			'rows' => array(
				'2rwh' => array('bootstrap_headerClass'),
				'2rwf' => array('bootstrap_footerClass'),
				'3rw'  => array('bootstrap_headerClass', 'bootstrap_footerClass'),
			),

			'cols' => array(
				'1cl'  => array(),
				'2cll' => array('bootstrap_leftClass', 'bootstrap_mainClass'),
				'2clr' => array('bootstrap_mainClass', 'bootstrap_rightClass'),
				'3cl'  => array('bootstrap_leftClass', 'bootstrap_mainClass', 'bootstrap_rightClass'),
			),
		),

		'replace-css-classes' => array(
			'invisible'   => 'sr-only',
			'float_left'  => 'pull-left',
			'float_right' => 'pull-right',
		),
	),

	'templates' => array(
		'parsers' => array(
			'callback_replace-classes' => array(
				'type'      => 'callback',
				'callback'  => array('Netzmacht\Bootstrap\Layout\Templates\Modifier', 'replaceCssClasses'),
				'templates' => array('fe_*'),
			)
		)
	)
);

if(version_compare(VERSION, '3.3', '<')) {
	$config['layout']['metapalette']['+expert'][] = 'viewport after cssClass';
}

return $config;