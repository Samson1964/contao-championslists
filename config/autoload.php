<?php

/**
 * Contao Open Source CMS
 *
 * Copyright (c) 2005-2014 Leo Feyer
 *
 */


/**
 * Register the classes
 */
ClassLoader::addClasses(array
(
	// Classes
	'ChampionslistClass'    => 'system/modules/championslists/classes/Championslist.php',
	//'chesstournament'          => 'system/modules/championslists/classes/chesstournament_ce.php',
));

/**
 * Register the templates
 */
TemplateLoader::addFiles(array
(
	'mod_championslists_mini'            => 'system/modules/championslists/templates',
	'mod_championslists_einzel'          => 'system/modules/championslists/templates',
	'mod_championslists_einzel_weiblich' => 'system/modules/championslists/templates',
	'mod_championslists_team'            => 'system/modules/championslists/templates',
	'mod_championslists_einzeltest'      => 'system/modules/championslists/templates',
)); 
