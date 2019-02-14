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
	'Samson\Championslists\ChampionslistClass' => 'system/modules/championslists/classes/Championslist.php',
));

/**
 * Register the templates
 */
TemplateLoader::addFiles(array
(
	'mod_championslists_mini'                  => 'system/modules/championslists/templates',
	'mod_championslists_einzel'                => 'system/modules/championslists/templates',
	'mod_championslists_einzel_weiblich'       => 'system/modules/championslists/templates',
	'mod_championslists_team'                  => 'system/modules/championslists/templates',
	'mod_championslists_einzeltest'            => 'system/modules/championslists/templates',
	'ce_championslists_players'                => 'system/modules/championslists/templates',
	'ce_championslists_teams'                  => 'system/modules/championslists/templates',
)); 
