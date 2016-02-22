<?php

class dataModel extends Model {

	public function __construct() {

		parent::__construct();
	}

	public function getMetadaData($journal = DEFAULT_JOURNAL) {

		$fileName = XML_SRC_URL . $journal . '.xml';

		if (!(file_exists(PHY_XML_SRC_URL . $journal . '.xml'))) {
		
			return False;
		}

		$article['journal'] = $journal;

		$prevId = '';
		$xml = simplexml_load_file($fileName);

		$metaData = array();
		foreach ($xml->volume as $Volume) {

			// volume number as string
			$article['volume'] = (string) $Volume['vnum'];

			foreach ($Volume->issue as $Issue) {
				// issue number as string
				$article['issue'] = (string) $Issue['inum'];
				// month as string
				$article['month'] = (string) $Issue['month'];
				// year as string
				$article['year'] = (string) $Issue['year'];
				// info as string
				$article['info'] = (string) $Issue['info'];

				foreach ($Issue->entry as $Article) {

					// hassup as an attribute
					$article['hassup'] = (string) $Article['hassup'];
					// title as html containing HTML elements
					$article['title'] = (string) $Article->title->asXML();
					// replacing title tag with null
					$article['title'] = preg_replace('/^<title>|<\/title>$|<title\/>/', '', $article['title']);
					// feature as a string
					$article['feature'] = (string) $Article->feature->__toString();
					// page range as a string
					$article['page'] = (string) $Article->page->__toString();
					// abstract as html containing p, ul and ol
					$article['abstract'] = $this->getAbstract($Article);
					// keywords as HTML, may contain html tags
					$article['keywords'] = (string) $Article->keywords->asXML();
					// replacing keywords tag with null
					$article['keywords'] = preg_replace('/^<keywords>|<\/keywords>$|<keywords\/>/', '', $article['keywords']);
					// authors as JSON
					$article['authors'] = $this->getAuthorsJSON($Article);
					// dates as JSON
					$article['dates'] = $this->getDatesJSON($Article);
					//Form titleid as journal_volume_issue_page
					$article['id'] = $article['journal'] . '_' . $article['volume'] . '_' . $article['issue'] . '_' . $article['page'];
					// append _a if id already exists: cases where two article begin and end in the same page
					$article['id'] = (preg_replace('/_a/', '', $prevId) == $article['id']) ? $prevId . '_a' : $article['id'];
				
					$prevId = $article['id'];
				
					//Replace _a by _1 and _a_a by _2 and so on
					$article['id'] = $this->reformArticleId($article['id']);
				
					array_push($metaData, $article);
				}
			}
		}
		return $metaData;
	}
	
	private function getAbstract($Article) {

		// Parse each child of absract element. Only p, ul and ol are allowed.
		$abstract = '';
		foreach ($Article->abstract->children() as $Child) {

			$abstract = $abstract . "\n" . $Child->asXML();
		}

		return $abstract;
	}

	private function getAuthorsJSON($Article) {

		$authors = array();
		foreach ($Article->authors->author as $Author) {
			
			$author['name'] = array("full" => (string) $Author->name->__toString(), 
									"first" => (string) $Author->name['first'], 
									"last" => (string) $Author->name['last']);
			$author['affiliation'] = $Author->affiliation;
			$author['email'] = $Author->email;

			array_push($authors, $author);
		}
		return json_encode($authors);
	}

	private function getDatesJSON($Article) {

		$dates = array();
		foreach ($Article->dates->date as $Date) {
			
			$type = (string) $Date['type'];
			$dates[$type] = (string) $Date->__toString();
		}

		return json_encode($dates);
	}

	private function reformArticleId($id) {
		
		$id = preg_replace('/_a/', '', $id, -1, $count);
		$id = ($count == 0) ? $id : $id . '_' . $count;
		return $id;
	}

	public function getFulltextAndInsert($journal = DEFAULT_JOURNAL, $dbh = null) {
	
		$sth = $dbh->prepare('SELECT id FROM ' . METADATA_TABLE . ' ORDER BY id');
		$sth->execute();
		
		while($result = $sth->fetch(PDO::FETCH_ASSOC))
		{
			$result['text'] = $this->getContent($journal, $result['id']);
			$data[0] = $result;

			$this->db->insertData(FULLTEXT_TABLE, $dbh, $data);
		}
	}

	private function getContent($journal, $id) {

		$id = preg_replace('/_[0-9]$/', '', $id);
		$textPath = PHY_TXT_URL . preg_replace('/\_/', '/', $id) . '.txt';
		
		return (file_exists($textPath)) ? file_get_contents($textPath) : $this->createAndGetText($textPath);
	}

	private function createAndGetText($textPath) {

		$folderPath = preg_replace('/(.*)\/.*/', "$1", $textPath);

		if (!(file_exists($folderPath)))
			mkdir($folderPath, 0777, true);

		$pdfPath = str_replace(PHY_TXT_URL, PHY_VOL_URL, $textPath);
		$pdfPath = str_replace('.txt', '.pdf', $pdfPath);

		$cmd = 'pdftotext ' . $pdfPath . ' ' . $textPath;
		$result = exec($cmd);

		if (!($result)) {

			echo 'Text extracted: ' . $textPath . "\n";
			return file_get_contents($textPath);
		}
		else{

			return '';
		}
	}

	public function getFellowDetails() {

		$fileName = XML_SRC_URL . 'fellows.xml';

		if (!(file_exists(PHY_XML_SRC_URL . 'fellows.xml'))) {
		
			return False;
		}

		$id = 1;
		$xml = simplexml_load_file($fileName);
		$fellowDetails = array();

		foreach ($xml->fellow as $Fellow) {

			// type as an attribute
			$fellow['type'] = (string) $Fellow['type'];
			// name as html containing HTML elements
			$fellow['name'] = (string) $Fellow->name->__toString();
			// sex as string
			$fellow['sex'] = (string) $Fellow->sex->__toString();
			// birth as string
			$fellow['birth'] = (string) $Fellow->birth->__toString();
			// degree as string
			$fellow['degree'] = (string) $Fellow->degree->__toString();
			// honours as string
			$fellow['honours'] = (string) $Fellow->honours->__toString();
			// address as string
			$fellow['address'] = (string) $Fellow->address->__toString();
			// city as string
			$fellow['city'] = (string) $Fellow->city->__toString();
			// state as string
			$fellow['state'] = (string) $Fellow->state->__toString();
			// country as string
			$fellow['country'] = (string) $Fellow->country->__toString();
			// telephone_office as string
			$fellow['telephone_office'] = (string) $Fellow->telephone->office->__toString();
			// telephone_residence as string
			$fellow['telephone_residence'] = (string) $Fellow->telephone->residence->__toString();
			// telephone_mobile as string
			$fellow['telephone_mobile'] = (string) $Fellow->telephone->mobile->__toString();
			// fax as string
			$fellow['fax'] = (string) $Fellow->fax->__toString();
			// email as string
			$fellow['email'] = (string) $Fellow->email->__toString();
			// specialization as string
			$fellow['specialization'] = (string) $Fellow->specialization->__toString();
			// section as string
			$fellow['section'] = (string) $Fellow->section->__toString();
			// yearelected as string
			$fellow['yearelected'] = (string) $Fellow->yearelected->__toString();
			// councilservice as string
			$fellow['councilservice'] = (string) $Fellow->councilservice->__toString();
			// url as string
			$fellow['url'] = (string) $Fellow->url->__toString();
			// death as string
			$fellow['death'] = (string) $Fellow->death->__toString();

			$fellow['id'] = str_pad($id, 5, '0', STR_PAD_LEFT);
			$id++;

			array_push($fellowDetails, $fellow);
		}

		return $fellowDetails;
	}

	public function getAssociateDetails() {

		$fileName = XML_SRC_URL . 'associates.xml';

		if (!(file_exists(PHY_XML_SRC_URL . 'associates.xml'))) {
		
			return False;
		}

		$id = 1;
		$xml = simplexml_load_file($fileName);
		$associateDetails = array();

		foreach ($xml->associate as $Associate) {

			// type as an attribute
			$associate['type'] = (string) $Associate['type'];
			// name as html containing HTML elements
			$associate['name'] = (string) $Associate->name->__toString();
			// sex as string
			$associate['sex'] = (string) $Associate->sex->__toString();
			// birth as string
			$associate['birth'] = (string) $Associate->birth->__toString();
			// degree as string
			$associate['degree'] = (string) $Associate->degree->__toString();
			// honours as string
			$associate['honours'] = (string) $Associate->honours->__toString();
			// address as string
			$associate['address'] = (string) $Associate->address->__toString();
			// city as string
			$associate['city'] = (string) $Associate->city->__toString();
			// state as string
			$associate['state'] = (string) $Associate->state->__toString();
			// country as string
			$associate['country'] = (string) $Associate->country->__toString();
			// telephone_office as string
			$associate['telephone_office'] = (string) $Associate->telephone->office->__toString();
			// telephone_residence as string
			$associate['telephone_residence'] = (string) $Associate->telephone->residence->__toString();
			// fax as string
			$associate['fax'] = (string) $Associate->fax->__toString();
			// email as string
			$associate['email'] = (string) $Associate->email->__toString();
			// specialization as string
			$associate['specialization'] = (string) $Associate->specialization->__toString();
			// period as string
			$associate['period'] = (string) $Associate->period->__toString();
			// url as string
			$associate['url'] = (string) $Associate->url->__toString();

			$associate['id'] = str_pad($id, 5, '0', STR_PAD_LEFT);
			$id++;

			array_push($associateDetails, $associate);
		}

		return $associateDetails;
	}
	
	public function getMetadaDataFromXML($path)
	{
		$xmlFileName = PHY_VOL_URL . $path . '.xml';

		if (!(file_exists($xmlFileName))) {
			return False;
		}			
		
		$metaDataFromXML = array();
			
		$datesArray = array("Manuscript Received" => "M","Manuscript Revised" => "R","Accepted"=>"A", "Early published" => "E", "Unedited version published online" => "U","Final version published online" => "F");
	
		$xml = simplexml_load_file($xmlFileName);

		if ($xml === false) 
		{
			return False;
		}
	
		$journal =  $xml->front->{'journal-meta'}->{'journal-id'};
		$articleId =  $xml->front->{'article-meta'}->{'article-id'};
		$volume =  $xml->front->{'article-meta'}->volume;
		$issue =  $xml->front->{'article-meta'}->issue;

		//split the string date at hyphen. Get year and month values
		if(isset($xml->front->{'article-meta'}->{'pub-date'}->{'string-date'}))
		{
			$pubStringDate =  preg_split('/-/',$xml->front->{'article-meta'}->{'pub-date'}->{'string-date'});
			$year = $pubStringDate[0];	
			$month = $pubStringDate[1];	
		}
		else
		{
			$year = "0000";
			$month = "00";
		}
			

		$info =  $xml->front->{'article-meta'}->{'issue-title'};
		$hasSup =  $xml->front->{'article-meta'}->{'supplementary-material'};
		$hasSup = ($hasSup == "")? 0 : 1;
		$title =  $xml->front->{'article-meta'}->{'title-group'}->{'article-title'}->asXML();
		$title = preg_replace("/<article-title>|<\/article-title>|\t*/","",$title);
		$feature =  $xml->front->{'article-meta'}->{'article-categories'}->{'series-title'};
		$page =  $xml->front->{'article-meta'}->{'page-range'};
		$abstract =  $xml->front->{'article-meta'}->abstract->asXML();
		$abstract = preg_replace("/<abstract>|<\/abstract>|\t*/","",$abstract);
		$history = $xml->front->{'article-meta'}->history;

		$dates = array();		

		if($history != "")
		{
			
			foreach($xml->front->{'article-meta'}->history->date as $date)
			{
				$dateKey = $datesArray[(string) $date['date-type']];
				$dateValue = (string) $date->{'string-date'};
				$dates[$dateKey] = $dateValue;
			}

			$datesJson = json_encode($dates);
		}
		else
		{
			$datesJson = "[]";
			//~ echo $dates . "\n";
		}

		$affiliations = array();

		foreach($xml->front->{'article-meta'}->{'contrib-group'}->{'aff'} as $affiliation)
		{
			$affKey = $affiliation['id'];
			$affiliations[(string) $affKey] = (string) $affiliation;
		}


		$authors = array();

		$count = 0;
		if(isset($xml->front->{'article-meta'}->{'contrib-group'}->contrib->name))
		{
			foreach($xml->front->{'article-meta'}->{'contrib-group'}->contrib as $author)
			{
				#echo $author->name->{'given-names'} . "\n";
				
				$tempAuthor = array();
				
				$lastName = (string) $author->name->{'surname'};
				$firstName = (string) $author->name->{'given-names'};
				$fullName = (string) $author->{'string-name'};

				$tempAuthor['name'] = array("full" => $fullName, "first" => $firstName, "last" => $lastName);

				$tempArray = array();

				foreach($author->xref as $aff)
				{	
					$affKey = (string) $aff['rid'];
					$affValue = (string) $affiliations[$affKey];
					array_push($tempArray, $affValue); 
					//echo $affKey . "\n"; 
				}

				$tempAuthor['affiliation'] = (object)$tempArray;
				$tempAuthor['email']=$author->email; 
				array_push($authors,$tempAuthor);
			}
		}	

		$authorsJson = json_encode($authors,JSON_UNESCAPED_UNICODE);

		$keyWords = "";

		foreach($xml->front->{'article-meta'}->{'kwd-group'}->kwd as $keyWord)
		{
			$keyWords = $keyWords . ";" . $keyWord;
		}

		$keyWords = preg_replace("/^;/","",$keyWords);
		// $title = addslashes($title); 
		// $feature = addslashes($feature); 
		// $abstract = addslashes($abstract); 
		// $keyWords = addslashes($keyWords); 
		
		$metaDataFromXML['journal'] = $journal; 
		$metaDataFromXML['volume'] = $volume; 
		$metaDataFromXML['issue'] = $issue; 
		$metaDataFromXML['month'] = $month; 
		$metaDataFromXML['year'] = $year; 
		$metaDataFromXML['info'] = $info; 
		$metaDataFromXML['hassup'] = $hasSup; 
		$metaDataFromXML['title'] = $title; 
		$metaDataFromXML['feature'] = $feature; 
		$metaDataFromXML['page'] = $page; 
		$metaDataFromXML['abstract'] = $abstract; 
		$metaDataFromXML['keywords'] = $keyWords; 
		$metaDataFromXML['authors'] = $authorsJson; 
		$metaDataFromXML['dates'] = $datesJson;
		$metaDataFromXML['id'] = $articleId; 

		return $metaDataFromXML;
	}

	public function getFellowDetailsfromCSV() {

		$fileName = XML_SRC_URL . 'fellows.csv';

		if (!(file_exists(PHY_XML_SRC_URL . 'fellows.csv'))) {
		
			return False;
		}

		$fellows = file($fileName);

		$fellowDetails = array();
		$id = 1;	
		foreach ($fellows as $fellowCSV) {
			
			$details = explode('|', $fellowCSV);

			$fellow['lname'] = $details[0];
			$fellow['fname'] = $details[1];
			
			// Change dd-mm-yyyy format to yyyy-mm-dd; If only year is mentioned, put it as yyyy-00-00
			$fellow['birth'] = preg_replace('/([0-9][0-9])\-([0-9][0-9])\-([0-9][0-9][0-9][0-9])/', "$3-$2-$1", $details[2]);
			$fellow['birth'] = preg_replace('/(^[0-9][0-9][0-9][0-9]$)/', "$1-00-00", $fellow['birth']);

			$fellow['sal'] = $details[3];
			$fellow['name'] = $details[0] . ', ' . $details[3] . ' ' . $details[1];

			$fellow['degree'] = $details[4];
			$fellow['honours'] = $details[5];

			$fellow['address'] = '';
			if ($details[6]) $fellow['address'] = $details[6];
			if ($details[7]) $fellow['address'] .= ', ' . $details[7];
			if ($details[8]) $fellow['address'] .= ', ' . $details[8];
			if ($details[9]) $fellow['address'] .= ', ' . $details[9];
			$fellow['address'] = preg_replace('/^, /', '', $fellow['address']);
			$fellow['address'] = preg_replace('/, $/', '', $fellow['address']);

			$fellow['city'] = $details[10];
			$fellow['state'] = $details[11];
			$fellow['country'] = $details[12];
			$fellow['telephone_office'] = $details[13];
			$fellow['telephone_residence'] = $details[14];
			$fellow['telephone_mobile'] = $details[15];
			$fellow['fax'] = $details[16];
			$fellow['email'] = $details[17];
			$fellow['specialization'] = $details[18];
			$fellow['section'] = $details[19];
			$fellow['yearelected'] = $details[20];
			$fellow['councilservice'] = $details[21];
			$fellow['url'] = $details[22];

			// Change dd-mm-yyyy format to yyyy-mm-dd; If only year is mentioned, put it as yyyy-00-00
			$fellow['death'] = preg_replace('/([0-9][0-9])\-([0-9][0-9])\-([0-9][0-9][0-9][0-9])/', "$3-$2-$1", $details[23]);
			$fellow['death'] = preg_replace('/(^[0-9][0-9][0-9][0-9]$)/', "$1-00-00", $fellow['death']);

			// sex is defaulted to male
			$fellow['sex'] = $details[24];
			if(!($fellow['sex'])) $fellow['sex'] = 'M';

			// Strip \n from the end
			$fellow['type'] = preg_replace('/\n/', '', $details[26]);
	
			$fellow['id'] = str_pad($id, 5, '0', STR_PAD_LEFT);
			$id++;

			array_push($fellowDetails, $fellow);
		}

		array_shift($fellowDetails);
		return $fellowDetails;
	}
}

?>
