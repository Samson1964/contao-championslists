<?php

/**
 * Contao Open Source CMS
 *
 * Copyright (c) 2005-2014 Leo Feyer
 *
 * @package News
 * @link    https://contao.org
 * @license http://www.gnu.org/licenses/lgpl-3.0.html LGPL
 */

/**
 * Table tl_championslists_items
 */
$GLOBALS['TL_DCA']['tl_championslists_items'] = array
(

	// Config
	'config' => array
	(
		'dataContainer'               => 'Table',
		'ptable'                      => 'tl_championslists',
		'switchToEdit'                => true,
		'enableVersioning'            => true,
		'onload_callback'             => array
		(
			array('tl_championslists_items', 'checkPalette'),
		), 
		'sql' => array
		(
			'keys' => array
			(
				'id' => 'primary',
				'pid' => 'index',
			)
		)
	),

	// List
	'list' => array
	(
		'sorting' => array
		(
			'mode'                    => 4,
			'disableGrouping'         => true,
			'fields'                  => array('year DESC'),
			'headerFields'            => array('title', 'templatefile'),
			'panelLayout'             => 'filter;sort,search,limit',
			'child_record_callback'   => array('tl_championslists_items', 'listPersons'),  
		),
		'global_operations' => array
		(
			'all' => array
			(
				'label'               => &$GLOBALS['TL_LANG']['MSC']['all'],
				'href'                => 'act=select',
				'class'               => 'header_edit_all',
				'attributes'          => 'onclick="Backend.getScrollOffset()" accesskey="e"'
			)
		),
		'operations' => array
		(
			'edit' => array
			(
				'label'               => &$GLOBALS['TL_LANG']['tl_championslists_items']['edit'],
				'href'                => 'act=edit',
				'icon'                => 'edit.gif'
			),
			'copy' => array
			(
				'label'               => &$GLOBALS['TL_LANG']['tl_championslists_items']['copy'],
				'href'                => 'act=paste&amp;mode=copy',
				'icon'                => 'copy.gif'
			),
			'cut' => array
			(
				'label'               => &$GLOBALS['TL_LANG']['tl_championslists_items']['cut'],
				'href'                => 'act=paste&amp;mode=cut',
				'icon'                => 'cut.gif'
			),
			'delete' => array
			(
				'label'               => &$GLOBALS['TL_LANG']['tl_championslists_items']['delete'],
				'href'                => 'act=delete',
				'icon'                => 'delete.gif',
				'attributes'          => 'onclick="if(!confirm(\'' . $GLOBALS['TL_LANG']['MSC']['deleteConfirm'] . '\'))return false;Backend.getScrollOffset()"'
			),
			'toggle' => array
			(
				'label'               => &$GLOBALS['TL_LANG']['tl_championslists_items']['toggle'],
				'icon'                => 'visible.gif',
				'attributes'          => 'onclick="Backend.getScrollOffset();return AjaxRequest.toggleVisibility(this,%s)"',
				'button_callback'     => array('tl_championslists_items', 'toggleIcon')
			),
			'show' => array
			(
				'label'               => &$GLOBALS['TL_LANG']['tl_championslists_items']['show'],
				'href'                => 'act=show',
				'icon'                => 'show.gif'
			)
		)
	),

	// Palettes
	'palettes' => array
	(
		'default'                     => '',
		'championslists_player'       => '{place_legend},year,number,place,url,target;{person_legend},name,age,clubrating,dwz,elo,cowinner,singleSRC;{register_legend},spielerregister_id;{extra_legend},name2,name3;{info_legend},info;{publish_legend},published',
		'championslists_team'         => '{place_legend},year,number,place,url,target;{club_legend},name,nomination,singleSRC;{extra_legend},name2,nomination2,name3,nomination3;{info_legend},info;{publish_legend},published'
	),

	// Fields
	'fields' => array
	(
		'id' => array
		(
			'sql'                     => "int(10) unsigned NOT NULL auto_increment"
		),
		'pid' => array
		(
			'foreignKey'              => 'tl_championslists.title',
			'sql'                     => "int(10) unsigned NOT NULL default '0'",
			'relation'                => array('type'=>'belongsTo', 'load'=>'eager')
		),
		'tstamp' => array
		(
			'sql'                     => "int(10) unsigned NOT NULL default '0'"
		),
		'year' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_championslists_items']['year'],
			'exclude'                 => true,
			'sorting'                 => true,
			'flag'                    => 12,
			'inputType'               => 'text',
			'eval'                    => array('mandatory'=>true, 'rgxp'=>'digit', 'tl_class'=>'w50', 'maxlength'=>5),
			'sql'                     => "varchar(5) NOT NULL default ''"
		), 
		'number' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_championslists_items']['number'],
			'exclude'                 => true,
			'sorting'                 => true,
			'inputType'               => 'text',
			'eval'                    => array('rgxp'=>'digit', 'tl_class'=>'clr w50', 'maxlength'=>5),
			'sql'                     => "varchar(5) NOT NULL default ''"
		), 
		'place' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_championslists_items']['place'],
			'exclude'                 => true,
			'search'                  => true,
			'sorting'                 => true,
			'flag'                    => 1,
			'inputType'               => 'text',
			'eval'                    => array
			(
				'maxlength'           => 255,
				'tl_class'            => 'w50'
			),
			'sql'                     => "varchar(255) NOT NULL default ''"
		),
		'url' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_championslists_items']['url'],
			'exclude'                 => true,
			'search'                  => true,
			'inputType'               => 'text',
			'eval'                    => array
			(
				'mandatory'           => false,
				'rgxp'                => 'url',
				'decodeEntities'      => true,
				'maxlength'           => 255,
				'dcaPicker'           => true,
				'addWizardClass'      => false,
				'tl_class'            => 'w50 clr'
			),
			'sql'                     => "varchar(255) NOT NULL default ''"
		), 
		'target' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_championslists_items']['target'],
			'exclude'                 => true,
			'inputType'               => 'checkbox',
			'eval'                    => array
			(
				'tl_class'            => 'w50 m12'
			),
			'sql'                     => "char(1) NOT NULL default ''"
		), 
		'name' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_championslists_items']['name'],
			'exclude'                 => true,
			'search'                  => true,
			'sorting'                 => true,
			'flag'                    => 1,
			'inputType'               => 'text',
			'eval'                    => array
			(
				'maxlength'           => 255,
				'tl_class'            => 'w50'
			),
			'sql'                     => "varchar(255) NOT NULL default ''"
		),
		'age' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_championslists_items']['age'],
			'exclude'                 => true,
			'inputType'               => 'text',
			'eval'                    => array
			(
				'rgxp'                => 'digit',
				'tl_class'            => 'w50',
				'maxlength'           => 5
			),
			'sql'                     => "varchar(5) NOT NULL default ''"
		), 
		'clubrating' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_championslists_items']['clubrating'],
			'exclude'                 => true,
			'search'                  => true,
			'flag'                    => 1,
			'inputType'               => 'text',
			'eval'                    => array
			(
				'maxlength'           => 255,
				'tl_class'            => 'w50'
			),
			'sql'                     => "varchar(255) NOT NULL default ''"
		),
		'dwz' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_championslists_items']['dwz'],
			'exclude'                 => true,
			'inputType'               => 'text',
			'eval'                    => array
			(
				'rgxp'                => 'digit',
				'tl_class'            => 'w50 clr',
				'maxlength'           => 4
			),
			'sql'                     => "varchar(4) NOT NULL default ''"
		), 
		'elo' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_championslists_items']['elo'],
			'exclude'                 => true,
			'inputType'               => 'text',
			'eval'                    => array
			(
				'rgxp'                => 'digit',
				'tl_class'            => 'w50',
				'maxlength'           => 4
			),
			'sql'                     => "varchar(4) NOT NULL default ''"
		), 
		'cowinner' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_championslists_items']['cowinner'],
			'exclude'                 => true,
			'inputType'               => 'checkbox',
			'eval'                    => array
			(
				'tl_class'            => 'w50 m12'
			),
			'sql'                     => "char(1) NOT NULL default ''"
		), 
		'singleSRC' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_championslists_items']['singleSRC'],
			'exclude'                 => true,
			'inputType'               => 'fileTree',
			'eval'                    => array('filesOnly'=>true, 'fieldType'=>'radio', 'tl_class'=>'clr'),
			'sql'                     => "binary(16) NULL",
		), 
		'name2' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_championslists_items']['name2'],
			'exclude'                 => true,
			'search'                  => true,
			'sorting'                 => true,
			'flag'                    => 1,
			'inputType'               => 'text',
			'eval'                    => array('maxlength'=>255, 'tl_class'=>'w50'),
			'sql'                     => "varchar(255) NOT NULL default ''"
		),
		'name3' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_championslists_items']['name3'],
			'exclude'                 => true,
			'search'                  => true,
			'sorting'                 => true,
			'flag'                    => 1,
			'inputType'               => 'text',
			'eval'                    => array('maxlength'=>255, 'tl_class'=>'w50'),
			'sql'                     => "varchar(255) NOT NULL default ''"
		),
		'nomination' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_championslists_items']['nomination'],
			'exclude'                 => true,
			'search'                  => true,
			'inputType'               => 'textarea',
			'eval'                    => array
			(
				'tl_class'            => 'clr noresize',
			),
			'explanation'             => 'insertTags',
			'sql'                     => "mediumtext NULL"
		), 
		'nomination2' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_championslists_items']['nomination2'],
			'exclude'                 => true,
			'search'                  => true,
			'inputType'               => 'textarea',
			'eval'                    => array
			(
				'tl_class'            => 'clr noresize',
			),
			'explanation'             => 'insertTags',
			'sql'                     => "mediumtext NULL"
		), 
		'nomination3' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_championslists_items']['nomination3'],
			'exclude'                 => true,
			'search'                  => true,
			'inputType'               => 'textarea',
			'eval'                    => array
			(
				'tl_class'            => 'clr noresize',
			),
			'explanation'             => 'insertTags',
			'sql'                     => "mediumtext NULL"
		), 
		'spielerregister_id' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_championslists_items']['spielerregister_id'],
			'exclude'                 => true,
			'options_callback'        => array('tl_championslists_items', 'getRegisterliste'),
			'inputType'               => 'select',
			'eval'                    => array
			(
				'mandatory'           => false, 
				'multiple'            => false, 
				'chosen'              => true,
				'submitOnChange'      => false,
				'tl_class'            => 'long'
			),
			'sql'                     => "int(10) unsigned NOT NULL default '0'" 
		),
		'info' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_championslists_items']['info'],
			'exclude'                 => true,
			'search'                  => true,
			'inputType'               => 'textarea',
			'eval'                    => array('rte'=>'tinyMCE', 'helpwizard'=>true),
			'explanation'             => 'insertTags',
			'sql'                     => "mediumtext NULL"
		), 
		'published' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_championslists_items']['published'],
			'exclude'                 => true,
			'filter'                  => true,
			'flag'                    => 1,
			'default'                 => true,
			'inputType'               => 'checkbox',
			'eval'                    => array
			(
				'doNotCopy'           => true
			),
			'sql'                     => "char(1) NOT NULL default ''"
		),
	)
);


/**
 * Class tl_championslists_items
 *
 * Provide miscellaneous methods that are used by the data configuration array.
 * @copyright  Leo Feyer 2005-2014
 * @author     Leo Feyer <https://contao.org>
 * @package    News
 */
class tl_championslists_items extends Backend
{

	var $nummer = 0;
	
	/**
	 * Import the back end user object
	 */
	public function __construct()
	{
		parent::__construct();
		$this->import('BackendUser', 'User');
	}

	public function toggleIcon($row, $href, $label, $title, $icon, $attributes)
	{
		$this->import('BackendUser', 'User');

		if (strlen($this->Input->get('tid')))
		{
			$this->toggleVisibility($this->Input->get('tid'), ($this->Input->get('state') == 0));
			$this->redirect($this->getReferer());
		}

		// Check permissions AFTER checking the tid, so hacking attempts are logged
		if (!$this->User->isAdmin && !$this->User->hasAccess('tl_championslists_items::published', 'alexf'))
		{
			return '';
		}

		$href .= '&amp;id='.$this->Input->get('id').'&amp;tid='.$row['id'].'&amp;state='.$row[''];

		if (!$row['published'])
		{
			$icon = 'invisible.gif';
		}

		return '<a href="'.$this->addToUrl($href).'" title="'.specialchars($title).'"'.$attributes.'>'.$this->generateImage($icon, $label).'</a> ';
	}

	public function toggleVisibility($intId, $blnPublished)
	{
		// Check permissions to publish
		if (!$this->User->isAdmin && !$this->User->hasAccess('tl_championslists_items::published', 'alexf'))
		{
			$this->log('Kein Zugriffsrecht f�r Aktivierung Datensatz ID "'.$intId.'"', 'tl_championslists_items toggleVisibility', TL_ERROR);
			// Zur�cklink generieren, ab C4 ist das ein symbolischer Link zu "contao"
			if (version_compare(VERSION, '4.0', '>='))
			{
				$backlink = \System::getContainer()->get('router')->generate('contao_backend');
			}
			else
			{
				$backlink = 'contao/main.php';
			}
			$this->redirect($backlink.'?act=error');
		}
		
		$this->createInitialVersion('tl_championslists_items', $intId);
		
		// Trigger the save_callback
		if (is_array($GLOBALS['TL_DCA']['tl_championslists_items']['fields']['published']['save_callback']))
		{
			foreach ($GLOBALS['TL_DCA']['tl_championslists_items']['fields']['published']['save_callback'] as $callback)
			{
				$this->import($callback[0]);
				$blnPublished = $this->$callback[0]->$callback[1]($blnPublished, $this);
			}
		}
		
		// Update the database
		$this->Database->prepare("UPDATE tl_championslists_items SET tstamp=". time() .", published='" . ($blnPublished ? '' : '1') . "' WHERE id=?")
		               ->execute($intId);
		$this->createNewVersion('tl_championslists_items', $intId);
	}


	/**
	 * Return the link picker wizard
	 * @param \DataContainer
	 * @return string
	 */
	public function pagePicker(DataContainer $dc)
	{
		return ' <a href="contao/page.php?do=' . Input::get('do') . '&amp;table=' . $dc->table . '&amp;field=' . $dc->field . '&amp;value=' . str_replace(array('{{link_url::', '}}'), '', $dc->value) . '" title="' . specialchars($GLOBALS['TL_LANG']['MSC']['pagepicker']) . '" onclick="Backend.getScrollOffset();Backend.openModalSelector({\'width\':765,\'title\':\'' . specialchars(str_replace("'", "\\'", $GLOBALS['TL_LANG']['MOD']['page'][0])) . '\',\'url\':this.href,\'id\':\'' . $dc->field . '\',\'tag\':\'ctrl_'. $dc->field . ((Input::get('act') == 'editAll') ? '_' . $dc->id : '') . '\',\'self\':this});return false">' . Image::getHtml('pickpage.gif', $GLOBALS['TL_LANG']['MSC']['pagepicker'], 'style="vertical-align:top;cursor:pointer"') . '</a>';
	}

	public function listPersons($arrRow)
	{
		$temp = '<div class="tl_content_left"><b>'.$arrRow['year'].'</b> ';
		if($arrRow['number']) $temp .= '['.$arrRow['number'].'] ';
		if($arrRow['place']) $temp .= $arrRow['place'].' - ';
		if($arrRow['name']) $temp .= '1. <b style="color:#007500">'.$arrRow['name'].'</b> ';
		if($arrRow['name2']) $temp .= '2. <b>'.$arrRow['name2'].'</b> ';
		if($arrRow['name3']) $temp .= '3. <b>'.$arrRow['name3'].'</b>';
		return $temp.'</div>';
	}

	/**
	 * Palette entsprechend Listentyp anpassen
	 */
	public function checkPalette(DataContainer $dc)
	{ 

		// Listentyp mittels Abfrage ermitteln
		$objItem = $this->Database->prepare("SELECT pid FROM tl_championslists_items WHERE id=?")
                         ->limit(1)
                         ->execute($dc->id);
		$objListe = $this->Database->prepare("SELECT typ FROM tl_championslists WHERE id=?")
                         ->limit(1)
                         ->execute($objItem->pid);

		// Palette festlegen
		switch($objListe->typ)
		{
			case 'M': // Mannschaftsturnier
				$palette = $GLOBALS['TL_DCA']['tl_championslists_items']['palettes']['championslists_team'];
				$GLOBALS['TL_LANG']['tl_championslists_items']['name'][1] = 'Name der Sieger-Mannschaft';
				$GLOBALS['TL_LANG']['tl_championslists_items']['name2'][1] = 'Name der Mannschaft auf Platz 2';
				$GLOBALS['TL_LANG']['tl_championslists_items']['name3'][1] = 'Name der Mannschaft auf Platz 3';
				break;
			case 'E': // Einzelturnier
			default:
				$palette = $GLOBALS['TL_DCA']['tl_championslists_items']['palettes']['championslists_player'];
		}

		// Palette zuweisen
		$GLOBALS['TL_DCA']['tl_championslists_items']['palettes']['default'] = $palette;

	}

	public function getRegisterliste(DataContainer $dc)
	{
		$array = array();
		$objRegister = $this->Database->prepare("SELECT * FROM tl_spielerregister ORDER BY surname1,firstname1 ASC ")->execute();
		$array[0] = '-';
		while($objRegister->next())
		{
			$array[$objRegister->id] = $objRegister->surname1 . ',' . $objRegister->firstname1;
		}
		return $array;

	}

}
