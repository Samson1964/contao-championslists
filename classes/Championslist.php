<?php

/**
 * Benutzerdefinierten Namespace festlegen, damit die Klasse ersetzt werden kann
 */
namespace Samson\Championslists;

class ChampionslistClass extends \ContentElement
{

	/**
	 * Template
	 * @var string
	 */
	protected $strTemplate = 'ce_championslists_players';

	/**
	 * Generate the module
	 */
	protected function compile()
	{
		// Adresse aus Datenbank laden, wenn ID übergeben wurde
		if($this->championslist)
		{
			// Listentitel laden
			$objListe = $this->Database->prepare("SELECT * FROM tl_championslists WHERE id=?")
			                           ->execute($this->championslist);

			// Liste gefunden
			if($objListe)
			{

				// Voreinstellungen Bilder laden
				if($objListe->typ == 'E')
				{
					$picWidth = $this->championslists_picWidthPlayer ? $this->championslists_picWidthPlayer : $GLOBALS['TL_CONFIG']['championslists_picWidthPlayer'];
					$picHeight = $this->championslists_picHeightPlayer ? $this->championslists_picHeightPlayer : $GLOBALS['TL_CONFIG']['championslists_picHeightPlayer'];
				}
				elseif($objListe->typ == 'M')
				{
					$picWidth = $this->championslists_picWidthTeam ? $this->championslists_picWidthTeam : $GLOBALS['TL_CONFIG']['championslists_picWidthTeam'];
					$picHeight = $this->championslists_picHeightTeam ? $this->championslists_picHeightTeam : $GLOBALS['TL_CONFIG']['championslists_picHeightTeam'];
				}

				// Standard-CSS optional einbinden
				if($GLOBALS['TL_CONFIG']['championslists_css']) $GLOBALS['TL_CSS']['championslists'] = 'system/modules/championslists/assets/default.css';

				// Template zuweisen (überschreibt IMMER $strTemplate)
				if($this->championslist_alttemplate) // Alternativ-Template im CE wurde definiert
					$this->Template = new \FrontendTemplate($this->championslist_alttemplate);
				elseif($objListe->templatefile) // Template für diese Liste
					$this->Template = new \FrontendTemplate($objListe->templatefile);

				// Restliche Variablen zuweisen
				$this->Template->id = $this->championslist;
				$this->Template->vorlage = $objListe->templatefile;
				$this->Template->title = $objListe->title;

				// Listeneinträge laden
				if($this->championslist_filter) // Filterung nach Jahren gewünscht
				{
					// Sortierung festlegen
					($this->championsfrom < $this->championsto) ? $order = 'ASC' : $order = 'DESC';
					// Von-Bis-Werte festlegen
					if($this->championsfrom < $this->championsto)
					{
						$von = $this->championsfrom;
						$bis = $this->championsto;
					}
					else
					{
						$von = $this->championsto;
						$bis = $this->championsfrom;
					}
					// Abfrage starten
					$objItems = $this->Database->prepare("SELECT * FROM tl_championslists_items WHERE pid=? AND year >= ? AND year <= ? AND published = ? ORDER BY year $order")
				                               ->execute($this->championslist, $von, $bis, 1);
				}
				else // Keine Filterung
					$objItems = $this->Database->prepare("SELECT * FROM tl_championslists_items WHERE pid = ? AND published = ? ORDER BY year DESC")
				                               ->execute($this->championslist, 1);
				if($objItems)
				{
					$i = 0;
					while($objItems->next())
					{
						(bcmod($i,2)) ? $item[$i]['class'] = 'odd' : $item[$i]['class'] = 'even';
						$item[$i]['number'] = $objItems->number;
						$item[$i]['year'] = $objItems->year;
						$item[$i]['place'] = $objItems->place;
						$item[$i]['url'] = $objItems->url;
						$item[$i]['target'] = $objItems->target;
						$item[$i]['name'] = $objItems->name;
						$item[$i]['name2'] = $objItems->name2;
						$item[$i]['name3'] = $objItems->name3;
						$item[$i]['nomination'] = $objItems->nomination;
						$item[$i]['nomination2'] = $objItems->nomination2;
						$item[$i]['nomination3'] = $objItems->nomination3;
						$item[$i]['age'] = $objItems->age;
						$item[$i]['clubrating'] = $objItems->clubrating;
						$item[$i]['playerbase_url'] = $objItems->spielerregister_id ? \Samson\Playerbase\Helper::getPlayerlink($objItems->spielerregister_id) : false;
						// Bild extrahieren
						if($objItems->singleSRC)
						{
							$objFile = \FilesModel::findByPk($objItems->singleSRC);
							$item[$i]['image'] = $objFile->path;
							$item[$i]['thumbnail'] = \Image::get($objFile->path, $picWidth, $picHeight, 'crop');
						}
						else $item[$i]['image'] = '';
						$item[$i]['info'] = $objItems->info;
						$i++;
					}
					$this->Template->items = $item;
				}
			}
		}
		return;

	}
}
