<?php

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
			// Voreinstellungen laden
			$picWidthPlayer = $this->championslists_picWidthPlayer ? $this->championslists_picWidthPlayer : $GLOBALS['TL_CONFIG']['championslists_picWidthPlayer'];
			$picHeightPlayer = $this->championslists_picHeightPlayer ? $this->championslists_picHeightPlayer : $GLOBALS['TL_CONFIG']['championslists_picHeightPlayer'];

			// Standard-CSS optional einbinden
			if($GLOBALS['TL_CONFIG']['championslists_css']) $GLOBALS['TL_CSS']['championslists'] = 'system/modules/championslists/assets/default.css';
			
			// Listentitel laden
			$objListe = $this->Database->prepare("SELECT * FROM tl_championslists WHERE id=?")
			                           ->execute($this->championslist);
			// Liste gefunden
			if($objListe)
			{
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
					$objItems = $this->Database->prepare("SELECT * FROM tl_championslists_items WHERE pid=? AND year >= $von AND year <= $bis ORDER BY year $order")
				                               ->execute($this->championslist);
				}
				else // Keine Filterung
					$objItems = $this->Database->prepare("SELECT * FROM tl_championslists_items WHERE pid=? ORDER BY year DESC")
				                               ->execute($this->championslist);
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
						$item[$i]['age'] = $objItems->age;
						$item[$i]['clubrating'] = $objItems->clubrating;
						// Bild extrahieren
						if($objItems->singleSRC)
						{
							$objFile = \FilesModel::findByPk($objItems->singleSRC);
							$item[$i]['image'] = $objFile->path;
							$item[$i]['thumbnail'] = \Image::get($objFile->path, $picWidthPlayer, $picHeightPlayer, 'crop');
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
