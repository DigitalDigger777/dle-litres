<?php

ini_set("display_errors",1);
error_reporting(E_ALL);

	define("PROCESSED_BOOKS", 10000);
	
	//ставим 1251 локаль т.к. внешние csv в 1251
	@setlocale(LC_ALL, array("Russian_Russia.1251","ru_RU.CP1251","ru_RU.cp1251","ru_RU","RU","rus_RUS.1251"));
	
	function collect_stats(){

		global $table_prefix, $partner_id, $partner_domain, $partner_contact, $partner_pass;
		
		$data = array();
		
		//id (lfrom) площадки
		$data['partner_id'] = $partner_id;
		
		//домен партнера
		$data['partner_domain'] = $partner_domain;
		
		//контакт партнера
		$data['partner_contact'] = $partner_contact;
		
		//подпись
		$data['partner_hash'] = md5($partner_pass);
		
		//время запуска
		$data['timestamp'] = time();
		
		//перебираем типы материалов
		//0-книги, 1-аудиокниги, 4 - pdf-книги, 11 - книги на английском, 12 - бумажные книги
		$types_array = array(0,1,4);
		foreach ($types_array as $type){
			//кол-во записей в таблице литресных данных
			$q = "SELECT hub_id FROM litres_data WHERE options&2 AND type = " . $type;
			$res = mysql_query($q);
			$data['litres_data_count_' . $type] = mysql_num_rows($res);
			
			//время последнего обновления таблицы литресных данных (по полю updated)
			$q = "SELECT MAX(`updated`) AS updated FROM litres_data WHERE type = " . $type;
			$res = mysql_query($q);
			$row = mysql_fetch_array($res);
			$data['litres_data_updated_' . $type] = strtotime($row['updated']);
		}
		
		//кол-во локальных книг
		$q = "SELECT id FROM " . $table_prefix . "post";
		$res = mysql_query($q);
		$data['local_data_count'] = mysql_num_rows($res);
		
		//кол-во совпавших с литрес книг
		$q = "SELECT id FROM litres_local_data WHERE litresed = 1";
		$res = mysql_query($q);
		$data['litresed_count'] = mysql_num_rows($res);
		
		return $data;
	}
	
	
	function top_sales_hub_ids($url){
		$ids = array();
		
		$s = file_get_contents($url);
		$xml = simplexml_load_string($s);

		foreach ($xml->shop->offers->offer as $value){
			$ids[] = ((int)$value->attributes()->id);
		}
		
		return $ids;		
	}
	
	function file_get_contents_curl($url) {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_HEADER, 0);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); //Set curl to return the data instead of printing it to the browser.
        curl_setopt($ch, CURLOPT_URL, $url);
        $data = curl_exec($ch);
        curl_close($ch);
        return $data;
	}
	
	function file_put_contents_curl($url,$post_data) {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_HEADER, 0);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_URL, $url);
		curl_setopt($ch, CURLOPT_POST, 1);
		curl_setopt($ch, CURLOPT_POSTFIELDS, $post_data);
        $data = curl_exec($ch);
        curl_close($ch);
        return $data;
	}
	
	function multineedle_stripos($haystack, $needles, $offset=0){
		foreach($needles as $needle) {
			if (stripos($haystack, $needle, $offset) !== false){
				$found[$needle] = stripos($haystack, $needle, $offset);
			}
		}
		return (isset($found) ? $found : false);
	}
	
	function explode_xfields($data){
		//преобразует строку xfields в двумерный массив
		$xfields_array = explode('||',$data);
		foreach ($xfields_array as $xfield){
			$xfield_array = explode('|',$xfield);
			$xfields[$xfield_array[0]] = $xfield_array[1];
		}
		return is_array($xfields) ? $xfields : false;
	}

	function implode_xfields($data){
		//преобразует двумерный массив в строку xfields
		foreach ($data as $key => $value){
			$xfields[] = $key . '|' . $value;
		}
		
		if (!is_array($xfields)) return false;
		
		$xfields_string = implode('||',$xfields);
		
		return $xfields_string;
	}
	
	function delete_litres_book($hub_id){
		//удаляем книги путем простановки options=0
		$q = "UPDATE `litres_data` SET options=0 WHERE hub_id=" . $hub_id;
		mysql_query($q);
	}

	// brf
	function getDOMElement($doc, $elemName, $n)
	{
		$elem = $doc->getElementsByTagName($elemName);
		$elem = $elem->item($n);
		if ($elem) {
			$elem->setAttribute("xmlns", "http://www.gribuser.ru/xml/fictionbook/2.0");
    		return $doc->saveXML($elem);
		}
		return '';		   
	}

	function getTextContent($doc, $elemName, $n)
	{
		$elem = $doc->getElementsByTagName($elemName);
   	 	$elem = $elem->item($n);
    	if ($elem) {
    		return $elem->textContent;
    	}
    	return '';
	}

	function addBook($data)
	{
		global $partner_id;

		// dle_books		
	    $tmpfname = tempnam("../../../tmp", "TMP");
	    file_put_contents($tmpfname, fopen("http://www.litres.ru/gettrial/?art=" . $data['hub_id'] . "&format=fb2&lfrom=" . $partner_id, 'r'));

	    $zip = new ZipArchive;
	    if ($zip->open($tmpfname) === TRUE) {
	    	$zip->extractTo('../../../tmp/fb2');
		    $zip->close();
		    echo 'ok' . PHP_EOL;
	    } else {
	    	echo 'error' . PHP_EOL;
	    	unlink($tmpfname);
	    	return;
	    }
	    unlink($tmpfname);		

	    $files = scandir('../../../tmp/fb2');
	    $file = '../../../tmp/fb2/' . array_pop($files);

	    $doc = new DOMDocument();
	    $doc->strictErrorChecking = false;
	    $doc->recover = true;
	    $load = $doc->load($file, LIBXML_NOERROR);
	    if (!$load) { 
	     	echo "Ошибка загрузки!" . PHP_EOL; 
	    	$fb2error = 1; 
	    }

	    $full_story = '';
	    $body = getDOMElement($doc, 'body', 0);
	    preg_match('~<body.*?>(.+)</body>~uis', $body, $matches);
	    $full_story = $matches[1];
	    $full_story = str_replace('<title.*?>', '<title xmlns="http://www.gribuser.ru/xml/fictionbook/2.0"></first-name>', $full_story);
	    $full_story = str_replace('<epigraph.*?>', '<epigraph xmlns="http://www.gribuser.ru/xml/fictionbook/2.0"></first-name>', $full_story);
	    $full_story = str_replace('<section>.*?', '<section xmlns="http://www.gribuser.ru/xml/fictionbook/2.0"></first-name>', $full_story);

	    preg_match_all('~<p>(.+?)</p>~uis', $full_story, $matches);

	    $len = 0;
	    $prev = '';
	    foreach ($matches[1] as $key => $match) {
	    	$len += mb_strlen($match);

	    	if ($len > 15000) {
	    		$len = 0;
	    		$full_story = str_replace($prev, $prev. ' {PAGEBREAK}', $full_story);
	    	} else {
	    		$prev = $matches[0][$key];
	    	}
	    }

	    $book_title = '';
	    $book_title .= getTextContent($doc, 'book-title', 0);

	    $date = '';
	    $date .= getTextContent($doc, 'date', 0);

	    $genre = '';
	    $genre .= getTextContent($doc, 'genre', 0);

	    $first_name = '';
	    $first_name .= getTextContent($doc, 'first-name', 0);

	    $last_name = '';
	    $last_name .= getTextContent($doc, 'last-name', 0);

	    $middle_name = '';
	    /*$middle_name .= getTextContent($doc, 'middle-name', 0);*/

	    $book_publisher = '';
	    $book_publisher .= getDOMElement($doc, 'publisher', 0);
	    preg_match('~<publisher.*?>(.+)</publisher>~uis', $book_publisher, $matches);
	    $book_publisher = isset($matches[1]) ? $matches[1] : $book_publisher;
	    preg_match('~(.*?)<id>~uis', $book_publisher, $matches);
	    $book_publisher = isset($matches[1]) ? $matches[1] : $book_publisher;
	    $book_publisher = str_replace('<first-name/>', '<first-name xmlns="http://www.gribuser.ru/xml/fictionbook/2.0"></first-name>', $book_publisher);
	    $book_publisher = str_replace('<last-name>', '<last-name xmlns="http://www.gribuser.ru/xml/fictionbook/2.0">', $book_publisher);
	    $book_publisher = str_replace('<subtitle>', '<subtitle xmlns="http://www.gribuser.ru/xml/fictionbook/2.0">', $book_publisher);

	    $isbn = '';
	    $isbn .= getDOMElement($doc, 'isbn', 0);

	    $year = '';
	    $year .= getTextContent($doc, 'year', 0);

	    $city = '';
	    $city .= getTextContent($doc, 'city', 0);

	    $annotation = '';
	    $annotation .= getTextContent($doc, 'annotation', 0);

	    $description = '';
	    $description .= getDOMElement($doc, 'title-info', 0);
	    $description .= getDOMElement($doc, 'document-info', 0);
	    $description .= getDOMElement($doc, 'publish-info', 0);

	    $img = '';
    	$img .= getTextContent($doc, 'binary', 0);

    	$xfields = array();
		$xfields['litres_link'] = 'https://www.litres.ru/' . ($data['litres_url'] != '' ? $data['litres_url'] . '?lfrom=' : 'pages/biblio_book/?art=' . $data['hub_id'] . '&lfrom=' ) . $partner_id;
		$xfields['litres_hub_id'] = $data['hub_id'];
		$xfields['litres_options'] = $data['options'];
		$xfields_str = implode_xfields($xfields);

		$title = $data['author_name'] . ' ' . $data['author_sname'] . ' - ' . $data['book_title'];
		
		$alt_name = mb_strtolower($title);
		$alt_name = str_replace(' - ', '-', $alt_name);
		$alt_name = str_replace(' ', '-', $alt_name);

		$category = array('638');
		/*$q = "SELECT `id` FROM dle_category WHERE `alt_name`='" . $data['genre'] . "';";
		$result = mysql_query($q);
		if (mysql_num_rows($result) > 0) {
			$row = mysql_fetch_array($result);
			$category[] = $row['id'];
		}*/
		$category = implode(',', $category);

		$q = "INSERT INTO `dle_post` 
			(
				`id`,
				`autor`,
				`date`,
				`short_story`,
				`xfields`,
				`title`,
				`descr`,
				`keywords`,
				`category`,
				`alt_name`,
				`comm_num`,
				`allow_comm`,
				`allow_main`,
				`approve`,
				`fixed`,
				`allow_br`,
				`symbol`,
				`tags`,
				`metatitle`,
				`full_story`
			) 
			VALUES 
			(
				NULL,
				'admin',
				'" . date('Y-m-d H:i:s') . "',
				'',
				'" . mysql_real_escape_string($xfields_str) . "',
				'" . mysql_real_escape_string($title) . "',
				'" . mysql_real_escape_string(mb_substr($data['annotation'], 0, 199)) . "',
				'',
				'" . mysql_real_escape_string($category) . "',
				'" . mysql_real_escape_string($alt_name) . "',
				'0',
				'1',
				'1',
				'1',
				'0',
				'0',
				'',
				'',
				'" . mysql_real_escape_string($title) . "',
				0
			);";

        if (!mysql_query($q)) {
                echo 'Add post, error: ' . mysql_error() . "\n";
        } else {
                echo 'add post ' . $book_title . PHP_EOL;
        }

		$q = "SELECT id FROM dle_post ORDER BY `id` DESC;";
		$result = mysql_query($q);
		if (mysql_num_rows($result) > 0) {
			$row = mysql_fetch_array($result);
			$id = $row['id'];
		}
		mysql_free_result($result);

		$q = "INSERT INTO `dle_post_extras` 
				(
					`news_id`,
					`allow_rate`,
					`votes`,
					`user_id`
				) 
				VALUES
				(
					'" . $id . "', 
					'1', 
					'0',
					'0'
				);";
		mysql_query($q);

		$q = "INSERT INTO dle_books 
			(
				`id`,
				`full_story`,
				`book_title`,
				`book_date`,
				`book_genre`,
				`book_author_first_name`,
				`book_author_last_name`,
				`book_author_middle_name`,
				`book_publisher`,
				`book_isbn`,
				`book_year`,
				`book_city`,
				`book_annotation`,
				`book_cover`,
				`book_description`
			) 
			VALUES 
			(
				'" . $id . "',
				'" . mysql_real_escape_string($full_story) . "',
				'" . mysql_real_escape_string($book_title) . "',
				'" . $date . "',
				'" . $genre . "',
				'" . $first_name . "',
				'" . $last_name . "',
				'" . $middle_name . "',
				'" . $book_publisher . "',
				'" . $isbn . "',
				'" . $year . "',
				'" . $city . "',
				'" . mysql_real_escape_string($annotation) . "',
				'',
				'" . mysql_real_escape_string($description) . "'
			)";
		
		if (is_integer($full_story)) {
			echo 'Full story is integer ' . $full_story;
		}

        if (!mysql_query($q)) {

                echo 'Add book, error: ' . mysql_errno() . ':' . mysql_error() . "\n";
                //echo $full_story . "\n";	
        } else {
                echo 'add book ' . $book_title . PHP_EOL;

            	$lastInsertId = mysql_insert_id();
				$fileName = $id;

				$q = "UPDATE dle_books SET book_cover='" . $fileName . "' WHERE id = " . $lastInsertId;
				mysql_query($q);

				saveCover($fileName, $img);
        }

		unlink($file);
		sleep(3);
	}

	function checkBooks()
	{
		$hub_ids = array();
		$q = "SELECT * FROM `dle_post`";

		$result = mysql_query($q);

		$count = 0;
		if (mysql_num_rows($result) > 0) {
			while ($row = mysql_fetch_array($result)) {
				if ($row['category'] == '638') {
					$count++;
				}

				$xfields = '';
				if ($row['xfields'] != '') {
					$xfields = explode_xfields($row['xfields']);

					if ($row['id'] > 54099947 && isset($xfields['litres_hub_id'])) {

						if (in_array($xfields['litres_hub_id'], $hub_ids)) {
							$q = "DELETE FROM dle_post WHERE `id`=" . $row['id'];
							mysql_query($q);
							$q = "DELETE FROM dle_books WHERE `id`=" . $row['id'];
							mysql_query($q);
							$q = "DELETE FROM dle_post_extras WHERE `news_id`=" . $row['id'];
							mysql_query($q);

							echo 'delete id=' . $row['id'] . ' hub_id=' .  $xfields['litres_hub_id'] . PHP_EOL;
							continue;
						} else {
							$hub_ids[] = $xfields['litres_hub_id'];
						}
					}

					if (isset($xfields['litres_options']) && $xfields['litres_options'] == '0' && $row['approve'] == '1') {
						
						$q = "UPDATE dle_post SET `approve`='0' WHERE `id`=" . $row['id'];
						mysql_query($q);
					} else if (isset($xfields['litres_options']) && isset($xfields['litres_hub_id']) && $xfields['litres_options'] == '0') {

						$q = "SELECT `options` FROM `litres_data` WHERE `hub_id`=" . $xfields['litres_hub_id'];
						$_result = mysql_query($q);

						if (mysql_num_rows($_result) > 0) {
							while ($_row = mysql_fetch_array($_result)) {
								if ($_row['options'] != '0') {
									$q = "UPDATE dle_post SET `approve`='1' WHERE `id`=" . $row['id'];
									mysql_query($q);
								}								
							}
							mysql_free_result($_result);
						}
					} else {
						$q = "SELECT `id` FROM dle_books WHERE `id`=" . $row['id'];
						$_result = mysql_query($q);
						if (mysql_num_rows($_result) == 0) {
							$q = "DELETE FROM `dle_post` WHERE `id`=" . $row['id'];
							mysql_query($q);
							echo 'delete ' . $row['id'] . PHP_EOL;
							//exit();
						}
						mysql_free_result($_result);
					}
				}
			}
			$q = "UPDATE `dle_category` SET `count`='" .$count. "'";
			mysql_query($q);
		}

		$q = "SELECT `id`, `book_title` FROM `dle_books` WHERE `id`>54099947";
		$result = mysql_query($q);
		if (mysql_num_rows($result) > 0) {
			while ($row = mysql_fetch_array($result)) {
				if (!$row['book_title']) {
					$q = "DELETE FROM dle_post WHERE `id`=" . $row['id'];
					mysql_query($q);
					$q = "DELETE FROM dle_books WHERE `id`=" . $row['id'];
					mysql_query($q);
					$q = "DELETE FROM dle_post_extras WHERE `news_id`=" . $row['id'];
					mysql_query($q);
					echo 'delete ' . $row['id'] . PHP_EOL;
				}	
			}
			mysql_free_result($result);
		}

		$news_id = [];
		$q = "SELECT `eid`, `news_id` FROM `dle_post_extras` WHERE `news_id`>54099947";
		$result = mysql_query($q);
		if (mysql_num_rows($result) > 0) {
			while ($row = mysql_fetch_array($result)) {
				if (in_array($row['news_id'], $news_id)) {
					$q = "DELETE FROM dle_post_extras WHERE `eid`=" . $row['eid'];
					mysql_query($q);
					echo 'delete ' . $row['news_id'] . PHP_EOL;
				} else {
					$news_id[] = $row['news_id'];
				}
			}
			mysql_free_result($result);
		}

	}
	
	/**
	* Save cover image.
	* @data it's base64 string
	*/
	function saveCover($fileName, $data)
	{

		$h = fopen(dirname(__FILE__) . '/../../../bks/' . $fileName . '.png', 'a+');
		fwrite($h, base64_decode($data));
		fclose($h);

		return $fileName;
	}

	function index_local_data(){
		//функция нужна для правильного полнотекстого индексирования.
		//используется если клиентские данные в кодировке 1251

		global $table_prefix;
		
		//$q = "TRUNCATE TABLE litres_local_data";
		//mysql_query($q);

		$q = "SELECT `id` FROM `" . $table_prefix . "books`";

		$result = mysql_query($q);

		if (mysql_num_rows($result)>0) {
			while ($row = mysql_fetch_array($result)) {
				$id = $row['id'];
				echo $id . "\r\n";

				$q = "SELECT `book_title`, 
							`book_author_first_name`, 
							`book_author_last_name` 
						FROM `dle_books` 
						WHERE `id`=" . $id;

				$_result = mysql_query($q);

				if (mysql_num_rows($_result)>0) {
					while ($_row = mysql_fetch_array($_result)) {

						$title = $_row['book_title'];
						$local_book_type = 0;
						$author = $_row['book_author_first_name'] . ' ' . $_row['book_author_last_name'];

						$q = "INSERT INTO litres_local_data SET 
							id = " . $id . ",
							author = '" . mysql_real_escape_string($author) . "',
							title = '" . mysql_real_escape_string($title) . "',
							type = " . $local_book_type . ",
							litresed = " . (isset($_row['litres']) && $xfields['litres'] != '' ? 1 : 0) . "
							ON DUPLICATE KEY UPDATE
							author = '" . mysql_real_escape_string($author) . "',
							title = '" . mysql_real_escape_string($title) . "',
							type = " . $local_book_type . "";

						mysql_query($q);
					}
					mysql_free_result($_result);
				}
			}
			mysql_free_result($result);
		}
	}

	function prepareTitle($str)
	{				
		if (stripos($str, '.') !== false){
			$book_title_t = explode('.', $str);
			foreach ($book_title_t as $key => $value){
				$value = trim($value);
				if (mb_strlen($value, 'utf8') < 2) $book_title_t[$key] = '';
			}
			$book_title_t = array_values(array_diff($book_title_t, array('')));
			$book_title_1 = trim($book_title_t[0]);
			//if (end($book_title_t) && count($book_title_t) > 1) $book_title_2 = trim(end($book_title_t));
			//if (count($book_title_t) > 1) $book_title_2 = trim($book_title_t[1]);
		}
		elseif (stripos($str, ':') !== false){
			$book_title_t = explode(':', $str);
			foreach ($book_title_t as $key => $value){
				$value = trim($value);
				if (mb_strlen($value,'utf8') < 2) $book_title_t[$key] = '';
			}
			$book_title_t = array_diff($book_title_t, array(''));
			$book_title_1 = trim($book_title_t[0]);

			//if (end($book_title_t) && count($book_title_t) > 1) $book_title_2 = trim(end($book_title_t));
		}
		elseif (stripos($str, '!') !== false){
			$book_title_t = explode('!', $str);
			foreach ($book_title_t as $key => $value){
				$value = trim($value);
				if (mb_strlen($value,'utf8') < 2) $book_title_t[$key] = '';
			}
			$book_title_t = array_diff($book_title_t, array(''));
			$book_title_1 = trim($book_title_t[0]);

			//if (end($book_title_t) && count($book_title_t) > 1) $book_title_2 = trim(end($book_title_t));
		}
		else{
			$book_title_1 = $str;
		}
		
		if (mb_strlen($book_title_1,'utf8') < 5) $book_title_1 = $str;
		
		return $book_title_1;
	}
	
	function compare_local_global($book_type = 0){

		global $db_link, $partner_id, $table_prefix;

		include('dictionary.php');

		$count = 0;
		
		//находим максимальный Id в `litres_local_data` чтобы проверять только хвост
		//ночью проверяем полные базы
		$max_local_book_id = 0;
		//if (date("H") > 5){
			$q = "SELECT MAX(id) AS max_id FROM `litres_local_data`";
			$res_m = mysql_query($q);
			$r_m = mysql_fetch_array($res_m);
			$max_local_book_id = $r_m['max_id'];
		//}
		//------------------------

		$q = "SELECT * FROM `litres_data` WHERE 
					`type` = " . $book_type . "
					AND hub_id > 0
					AND `lang` = 'ru' 
					AND (options&2 OR can_preorder = 1) 
					ORDER BY updated DESC
				";

		$result = mysql_query($q);

		if (mysql_num_rows($result)>0){

			while ($row = mysql_fetch_array($result)){
				
				$litres_link = ''; $book_title_t = ''; $book_title_1 = ''; $book_title_2 = '';
				
				if (mb_strlen($row['author_sname'],'utf8') > 2 && mb_strlen($row['book_title'],'utf8') > 2){
					
					$book_title_1 = prepareTitle($row['book_title']);
					//для автора "Коллектив авторов" используем полное название, иначе много левых совпадений
					if (stripos($row['author_name'],'Коллектив') !== false || stripos($row['author_sname'],'Коллектив') !== false) $book_title_1 = $row['book_title'];

					//escape
					$book_title_1 = mysql_real_escape_string($book_title_1);
					$row['author_sname'] = mysql_real_escape_string($row['author_sname']);
					$row['author_name'] = mysql_real_escape_string($row['author_name']);
					$row['second_author_sname'] = mysql_real_escape_string($row['second_author_sname']);
					
					$q = "SELECT litres_local_data.*, " . $table_prefix . "post.xfields
							FROM litres_local_data
							JOIN dle_post USING (id)
							WHERE
							litresed = 0
							AND litres_local_data.id > " . ($max_local_book_id - 10000) . "
							AND litres_local_data.type = " . ($book_type == 1 ? "1" : "0") . "
							AND
							(
							" . (mb_strlen($book_title_1,'utf8') > 4 ? "MATCH(litres_local_data.title) AGAINST ('\"" . $book_title_1 . "\"' IN BOOLEAN MODE)" : "litres_local_data.title RLIKE '[[:<:]]" . $book_title_1 . "[[:>:]]'") . "
							)
							AND
							(
								" . (mb_strlen($row['author_sname'],'utf8') > 3 ? "MATCH(litres_local_data.author) AGAINST ('\"" . $row['author_sname'] . "\"' IN BOOLEAN MODE)" : "litres_local_data.author like '%" . $row['author_sname'] . "%'") . "
								" .
								(
								$row['second_author_sname'] != '' ?
								"OR
									(MATCH(litres_local_data.author) AGAINST ('\"" . $row['second_author_sname'] . "\"' IN BOOLEAN MODE))
									" 
								: ""						
								)
							. "
							)
						";

					//echo $q;
					$res = mysql_query($q);

					if (mysql_num_rows($res) > 0){
						while ($r = mysql_fetch_array($res)){
						
							//создаем бекап записи в таблице `dle_post_original`
							//$q = "INSERT INTO dle_post_original (SELECT * FROM dle_post WHERE id = " . $r['id'] . ")";
							//mysql_query($q);
						
							$litres_link = 'https://www.litres.ru/' . ($row['litres_url'] != '' ? $row['litres_url'] . '?lfrom=' : 'pages/biblio_book/?art=' . $row['hub_id'] . '&lfrom=' ) . $partner_id;
							
							$q = "UPDATE `litres_local_data` SET
									litresed = 1
									WHERE id = " . $r['id'];
							mysql_query($q);
							
							$q = "UPDATE `litres_data` SET
								local_book_id = " . $r['id'] . "
								WHERE hub_id = " . $row['hub_id'];
							mysql_query($q);
							
							
							$xfields = '';
							if ($r['xfields'] != '') $xfields = explode_xfields($r['xfields']);
							$xfields['litres_link'] = $litres_link;
							$xfields['litres_options'] = $row['options'];
														
							if ($book_type == 0){
								$xfields['litres_hub_id'] = $row['hub_id'];
							}
							elseif($book_type == 1){
								$xfields['hub_id_audio'] = $row['hub_id'];
							}
							
							//собираем поля xfields в кучу
							$xfields_str = implode_xfields($xfields);
							
							echo $q = "UPDATE `dle_post` SET
								xfields = '" . mysql_real_escape_string($xfields_str) . "'
								WHERE id = " . $r['id'];
							echo "<br><br>";
							mysql_query($q);							
							
							//вырезаем ссылки на скачивание из текста полной новости
							/*if (stripos($r['full_story'],'<!--QuoteBegin-->') !== false){
								$r['full_story'] = preg_replace("/\<\!--QuoteBegin--\>.+\<\!--QuoteEEnd--\>/i","",$r['full_story']);
							}
										
							if (stripos($r['full_story'],'<!--dle_leech_begin-->') !== false){
								$r['full_story'] = preg_replace("/\<\!--dle_leech_begin--\>.+\<\!--dle_leech_end--\>/i","",$r['full_story']);
							}
								
							$q = "UPDATE `dle_post` SET
									full_story = '" . mysql_real_escape_string($r['full_story']) . "'
									WHERE id = " . $r['id'];
							mysql_query($q);*/
							//-----------------------------------------------------
						}
					} else {
						if ($row['local_book_id'] == '' || is_null($row['local_book_id'])) {
							if ($count < PROCESSED_BOOKS) {
								echo 'book ' . $count++ . PHP_EOL;
								addBook($row);
							} else {
								echo 'check books' . PHP_EOL;
								//checkBooks();
								return;
							}
						}
					}
					mysql_free_result($res);
				}
				//echo ($k++)."\r\n";
			}
		}
		
		//убираем служебный индекс
		//$q = "ALTER TABLE `" . $table_prefix . "post` DROP INDEX `full_story`";
		//mysql_query($q);
		//-------------------------
		
		return true;
		
	}
	
	function compare_local_global_by_sequnces($book_type = 0){
		//проверка по фамилии автора и названию серии
		
		global $db_link, $partner_id, $table_prefix;

		include('dictionary.php');
		
		//находим максимальный Id в `litres_local_data` чтобы проверять только хвост
		$q = "SELECT MAX(id) AS max_id FROM `litres_local_data`";
		$res_m = mysql_query($q);
		$r_m = mysql_fetch_array($res_m);
		$max_local_book_id = $r_m['max_id'];
		//------------------------
		
		$q = "SELECT * FROM `litres_data` WHERE 
					`type` = " . $book_type . "
					AND sequences != ''
					AND hub_id > 0
					AND (options&2 OR can_preorder = 1)

					GROUP BY sequences, author_sname
				";

		$result = mysql_query($q);

		if (mysql_num_rows($result)>0){

			while ($row = mysql_fetch_array($result)){
				
				$litres_link = ''; $seq_title_t = ''; $seq_title_1 = ''; $seq_title_2 = '';
				
				$row['sequences'] = preg_replace("/\\s*\\([^()]*\\)\\s*/is","",$row['sequences']);

				if (mb_strlen($row['author_sname'],'utf8') > 3 && mb_strlen($row['sequences'],'utf8') > 3){
					
					$row['sequences'] = trim(strtr($row['sequences'], $repl_seq_ar));
					
					if (0 && stripos($row['sequences'],'.') !== false){
						$seq_title_t = explode('.',$row['sequences']);
						foreach ($seq_title_t as $key => $value){
							$value = trim($value);
							if (mb_strlen($value,'utf8') < 2) $seq_title_t[$key] = '';
						}
						$seq_title_t = array_values(array_diff($seq_title_t, array('')));
						$seq_title_1 = trim($seq_title_t[0]);
					}
					else{
						$seq_title_1 = $row['sequences'];
					}
					
					if (mb_strlen($seq_title_1,'utf8') < 3) $seq_title_1 = $row['sequences'];

					//escape
					$seq_title_1 = mysql_real_escape_string($seq_title_1);
					$row['author_sname'] = mysql_real_escape_string($row['author_sname']);

					$q = "SELECT litres_local_data.*, " . $table_prefix . "post.xfields, " . $table_prefix . "post.full_story
							FROM litres_local_data
							JOIN dle_post USING (id)
							WHERE
							litresed = 0
							AND litres_local_data.id > " . ($max_local_book_id - 10000) . "
							AND litres_local_data.type = " . ($book_type == 1 ? "1" : "0") . "
							AND
							(
							MATCH(litres_local_data.title) AGAINST ('\"" . $seq_title_1 . "\"' IN BOOLEAN MODE) OR litres_local_data.title like '%" . $seq_title_1 . "%'
							)
							AND
							(
								" . (mb_strlen($row['author_sname'],'utf8') > 3 ? "MATCH(litres_local_data.author) AGAINST ('\"" . $row['author_sname'] . "\"' IN BOOLEAN MODE)" : "litres_local_data.author like '%" . $row['author_sname'] . "%'") . "
							)
						";
					$res = mysql_query($q);

					if (mysql_num_rows($res) > 0){
						while ($r = mysql_fetch_array($res)){
						
							//создаем бекап записи в таблице `dle_post_original`
							$q = "INSERT INTO dle_post_original (SELECT * FROM dle_post WHERE id = " . $r['id'] . ")";
							mysql_query($q);
						
							$litres_link = 'https://www.litres.ru/' . ($row['litres_url'] != '' ? $row['litres_url'] . '?lfrom=' : 'pages/biblio_book/?art=' . $row['hub_id'] . '&lfrom=' ) . $partner_id;
							
							$q = "UPDATE `litres_local_data` SET
									litresed = 1
									WHERE id = " . $r['id'];
							mysql_query($q);
							
	
							$xfields = '';
							if ($r['xfields'] != '') $xfields = explode_xfields($r['xfields']);
							$xfields['litres_link'] = $litres_link;
							
							/*							
							if ($book_type == 0){
								$xfields['hub_id'] = $row['hub_id'];
							}
							elseif($book_type == 1){
								$xfields['hub_id_audio'] = $row['hub_id'];
							}
							*/
							
							//собираем поля xfields в кучу
							$xfields_str = implode_xfields($xfields);
							
							echo $q = "UPDATE `dle_post` SET
								xfields = '" . mysql_real_escape_string($xfields_str) . "'
								WHERE id = " . $r['id'];
							echo "<br><br>";
							mysql_query($q);
							
							
							//вырезаем ссылки на скачивание из текста полной новости
							if (stripos($r['full_story'],'<!--QuoteBegin-->') !== false){
								$r['full_story'] = preg_replace("/\<\!--QuoteBegin--\>.+\<\!--QuoteEEnd--\>/i","",$r['full_story']);
							}
										
							if (stripos($r['full_story'],'<!--dle_leech_begin-->') !== false){
								$r['full_story'] = preg_replace("/\<\!--dle_leech_begin--\>.+\<\!--dle_leech_end--\>/i","",$r['full_story']);
							}
								
							$q = "UPDATE `dle_post` SET
									full_story = '" . mysql_real_escape_string($r['full_story']) . "'
									WHERE id = " . $r['id'];
							mysql_query($q);
							//-----------------------------------------------------
						}
					}
					mysql_free_result($res);
				}
				echo ($k++)."\r\n";
			}
		}
		
		return true;
		
	}
	
	function compare_local_global_by_collections($book_type = 0){

		global $db_link, $partner_id, $table_prefix;
		
		//находим максимальный Id в `litres_local_data` чтобы проверять только хвост
		$q = "SELECT MAX(id) AS max_id FROM `litres_local_data`";
		$res_m = mysql_query($q);
		$r_m = mysql_fetch_array($res_m);
		$max_local_book_id = $r_m['max_id'];
		//------------------------

		$q = "SELECT * FROM `litres_data` WHERE 
					`type` = " . $book_type . "
					AND hub_id > 0
					AND (options&2 OR can_preorder = 1)
					AND author_sname != 'Сборник'
					GROUP BY hub_author_id
				";

		$result = mysql_query($q);

		if (mysql_num_rows($result)>0){

			while ($row = mysql_fetch_array($result)){
				
				$litres_link = '';
				
				if (mb_strlen($row['author_sname'],'utf8') > 3){
					
					//escape
					$row['author_sname'] = mysql_real_escape_string($row['author_sname']);
					$row['author_name'] = mysql_real_escape_string($row['author_name']);
					
					$q = "SELECT litres_local_data.*, " . $table_prefix . "post.xfields, " . $table_prefix . "post.full_story
							FROM litres_local_data
							JOIN dle_post USING (id)
							WHERE
							litresed = 0
							AND litres_local_data.id > " . ($max_local_book_id - 10000) . "
							AND litres_local_data.type = " . ($book_type == 1 ? "1" : "0") . "
							AND
							(
							MATCH(litres_local_data.title) AGAINST ('\"сборник\"' IN BOOLEAN MODE)
							OR
							MATCH(litres_local_data.title) AGAINST ('\"собрание\"' IN BOOLEAN MODE)
							OR
							MATCH(litres_local_data.title) AGAINST ('\"книги\"' IN BOOLEAN MODE)
							OR
							MATCH(litres_local_data.title) AGAINST ('\"книг\"' IN BOOLEAN MODE)
							)
							AND
							(
								" . ((mb_strlen($row['author_sname'],'utf8') > 3) ? "MATCH(litres_local_data.author) AGAINST ('\"" . $row['author_sname'] . "\"' IN BOOLEAN MODE) " : "litres_local_data.author like '%" . $row['author_sname'] . "%' ") . "
								
							)
						";
					$res = mysql_query($q);

					if (mysql_num_rows($res) > 0){
						while ($r = mysql_fetch_array($res)){
						
							//создаем бекап записи в таблице `dle_post_original`
							$q = "INSERT INTO dle_post_original (SELECT * FROM dle_post WHERE id = " . $r['id'] . ")";
							mysql_query($q);
						
							$litres_link = 'https://www.litres.ru/' . ($row['litres_a_url'] != '' ? $row['litres_a_url'] . '?lfrom=' : 'pages/biblio_authors/?subject=' . $row['hub_author_id'] . '&lfrom=' ) . $partner_id;
							
							$q = "UPDATE `litres_local_data` SET
									litresed = 1
									WHERE id = " . $r['id'];
							mysql_query($q);
							
							
							$xfields = '';
							if ($r['xfields'] != '') $xfields = explode_xfields($r['xfields']);
							$xfields['litres_link'] = $litres_link;
							
							/*
							if ($book_type == 0){
								$xfields['hub_id'] = $row['hub_id'];
							}
							elseif($book_type == 1){
								$xfields['hub_id_audio'] = $row['hub_id'];
							}
							*/
							
							//собираем поля xfields в кучу
							$xfields_str = implode_xfields($xfields);
							
							$q = "UPDATE `dle_post` SET
								xfields = '" . mysql_real_escape_string($xfields_str) . "'
								WHERE id = " . $r['id'];
							mysql_query($q);
							
							
							//вырезаем ссылки на скачивание из текста полной новости
							if (stripos($r['full_story'],'<!--QuoteBegin-->') !== false){
								$r['full_story'] = preg_replace("/\<\!--QuoteBegin--\>.+\<\!--QuoteEEnd--\>/i","",$r['full_story']);
							}
										
							if (stripos($r['full_story'],'<!--dle_leech_begin-->') !== false){
								$r['full_story'] = preg_replace("/\<\!--dle_leech_begin--\>.+\<\!--dle_leech_end--\>/i","",$r['full_story']);
							}
								
							$q = "UPDATE `dle_post` SET
									full_story = '" . mysql_real_escape_string($r['full_story']) . "'
									WHERE id = " . $r['id'];
							mysql_query($q);
							//-----------------------------------------------------
						}
					}
					mysql_free_result($res);
				}
				echo ($k++)."\r\n";
			}
		}
		
		return true;
		
	}
	
	function compare_local_global_magazines(){

		global $db_link, $partner_id, $table_prefix;
		
		//массив журналов, составляется вручную
		$magazines = array(
			'Playboy' 			=> 'https://www.litres.ru/serii-knig/zhurnal-playboy/',
			'Burda'				=> 'https://www.litres.ru/serii-knig/zhurnal-burda/',
			'Chip'				=> 'https://www.litres.ru/serii-knig/zhurnal-chip/',
			'Quattroruote'		=> 'https://www.litres.ru/serii-knig/zhurnal-quattroruote/',
			'Salon de Luxe'		=> 'https://www.litres.ru/serii-knig/zhurnal-salon-de-luxe/',
			'SALON-interior'	=> 'https://www.litres.ru/serii-knig/zhurnal-salon-de-luxe/',
			'Verena'			=> 'https://www.litres.ru/serii-knig/zhurnal-verena/',
			'Автомир'			=> 'https://www.litres.ru/serii-knig/zhurnal-avtomir/',
			'Добрые советы'		=> 'https://www.litres.ru/serii-knig/zhurnal-dobrye-sovety/',
			'Идеи Вашего Дома'	=> 'https://www.litres.ru/serii-knig/zhurnal-idei-vashego-doma-specvypusk/',
			'Моё любимое хобби'	=> 'https://www.litres.ru/burda/',
			'Мой прекрасный сад'	=> 'https://www.litres.ru/serii-knig/zhurnal-moy-prekrasnyy-sad/',
			'Мой ребенок'		=> 'https://www.litres.ru/serii-knig/zhurnal-moy-rebenok/',
			'Отдохни'			=> 'https://www.litres.ru/serii-knig/zhurnal-otdohni/',
			'Сабрина'			=> 'https://www.litres.ru/serii-knig/zhurnal-sabrina/',
			'Лиза'				=> 'https://www.litres.ru/serii-knig/zhurnal-liza/'
			
		);

		foreach ($magazines as $mag_title => $link){
				
					
			//escape
			$mag_title = mysql_real_escape_string($mag_title);

			$q = "SELECT litres_local_data.*, " . $table_prefix . "post.xfields, " . $table_prefix . "post.full_story
					FROM litres_local_data
					JOIN dle_post USING (id)
					WHERE
					litresed = 0
					AND litres_local_data.type = 2
					AND 
						MATCH(litres_local_data.title) AGAINST ('\"" . $mag_title . "\"' IN BOOLEAN MODE)
					";
			$res = mysql_query($q);

			if (mysql_num_rows($res) > 0){
				while ($r = mysql_fetch_array($res)){
					
					$litres_link = '';
					
					//создаем бекап записи в таблице `dle_post_original`
					$q = "INSERT INTO dle_post_original (SELECT * FROM dle_post WHERE id = " . $r['id'] . ")";
					mysql_query($q);
						
					$litres_link = $link . '?lfrom=' . $partner_id;
							
					$q = "UPDATE `litres_local_data` SET
							litresed = 1
							WHERE id = " . $r['id'];
					mysql_query($q);
							
					$xfields = '';
					if ($r['xfields'] != '') $xfields = explode_xfields($r['xfields']);
					$xfields['litres_link'] = $litres_link;
							
					//собираем поля xfields в кучу
					$xfields_str = implode_xfields($xfields);
					
					$q = "UPDATE `dle_post` SET
							xfields = '" . mysql_real_escape_string($xfields_str) . "'
							WHERE id = " . $r['id'];
					mysql_query($q);
							
							
					//вырезаем ссылки на скачивание из текста полной новости
					if (stripos($r['full_story'],'<!--QuoteBegin-->') !== false){
						$r['full_story'] = preg_replace("/\<\!--QuoteBegin--\>.+\<\!--QuoteEEnd--\>/i","",$r['full_story']);
					}
										
					if (stripos($r['full_story'],'<!--dle_leech_begin-->') !== false){
						$r['full_story'] = preg_replace("/\<\!--dle_leech_begin--\>.+\<\!--dle_leech_end--\>/i","",$r['full_story']);
					}
								
					$q = "UPDATE `dle_post` SET
							full_story = '" . mysql_real_escape_string($r['full_story']) . "'
							WHERE id = " . $r['id'];
					mysql_query($q);
					//-----------------------------------------------------
				}
			}
		}
		
		return true;
		
	}
	
	class picture {
	     
	    private $image_file;
	     
	    public $image;
	    public $image_type;
	    public $image_width;
	    public $image_height;
	     
	     
	    public function __construct($image_file) {
	        $this->image_file=$image_file;
	        $image_info = getimagesize($this->image_file);
	        $this->image_width = $image_info[0];
	        $this->image_height = $image_info[1];
	        switch($image_info[2]) {
	            case 1: $this->image_type = 'gif'; break;//1: IMAGETYPE_GIF
	            case 2: $this->image_type = 'jpeg'; break;//2: IMAGETYPE_JPEG
	            case 3: $this->image_type = 'png'; break;//3: IMAGETYPE_PNG
	            case 4: $this->image_type = 'swf'; break;//4: IMAGETYPE_SWF
	            case 5: $this->image_type = 'psd'; break;//5: IMAGETYPE_PSD
	            case 6: $this->image_type = 'bmp'; break;//6: IMAGETYPE_BMP
	            case 7: $this->image_type = 'tiffi'; break;//7: IMAGETYPE_TIFF_II (порядок байт intel)
	            case 8: $this->image_type = 'tiffm'; break;//8: IMAGETYPE_TIFF_MM (порядок байт motorola)
	            case 9: $this->image_type = 'jpc'; break;//9: IMAGETYPE_JPC
	            case 10: $this->image_type = 'jp2'; break;//10: IMAGETYPE_JP2
	            case 11: $this->image_type = 'jpx'; break;//11: IMAGETYPE_JPX
	            case 12: $this->image_type = 'jb2'; break;//12: IMAGETYPE_JB2
	            case 13: $this->image_type = 'swc'; break;//13: IMAGETYPE_SWC
	            case 14: $this->image_type = 'iff'; break;//14: IMAGETYPE_IFF
	            case 15: $this->image_type = 'wbmp'; break;//15: IMAGETYPE_WBMP
	            case 16: $this->image_type = 'xbm'; break;//16: IMAGETYPE_XBM
	            case 17: $this->image_type = 'ico'; break;//17: IMAGETYPE_ICO
	            default: $this->image_type = ''; break;
	        }
	        $this->fotoimage();
	    }
	     
	    private function fotoimage() {
	        switch($this->image_type) {
	            case 'gif': $this->image = imagecreatefromgif($this->image_file); break;
	            case 'jpeg': $this->image = imagecreatefromjpeg($this->image_file); break;
	            case 'png': $this->image = imagecreatefrompng($this->image_file); break;
	        }
	    }
	     
	    public function autoimageresize($new_w, $new_h) {
	        $difference_w = 0;
	        $difference_h = 0;
	        if($this->image_width < $new_w && $this->image_height < $new_h) {
	            $this->imageresize($this->image_width, $this->image_height);
	        }
	        else {
	            if($this->image_width > $new_w) {
	                $difference_w = $this->image_width - $new_w;
	            }
	            if($this->image_height > $new_h) {
	                $difference_h = $this->image_height - $new_h;
	            }
	                if($difference_w > $difference_h) {
	                    $this->imageresizewidth($new_w);
	                }
	                elseif($difference_w < $difference_h) {
	                    $this->imageresizeheight($new_h);
	                }
	                else {
	                    $this->imageresize($new_w, $new_h);
	                }
	        }
	    }
	     
	    public function percentimagereduce($percent) {
	        $new_w = $this->image_width * $percent / 100;
	        $new_h = $this->image_height * $percent / 100;
	        $this->imageresize($new_w, $new_h);
	    }
	     
	    public function imageresizewidth($new_w) {
	        $new_h = $this->image_height * ($new_w / $this->image_width);
	        $this->imageresize($new_w, $new_h);
	    }
	     
	    public function imageresizeheight($new_h) {
	        $new_w = $this->image_width * ($new_h / $this->image_height);
	        $this->imageresize($new_w, $new_h);
	    }
	     
	    public function imageresize($new_w, $new_h) {
	        $new_image = imagecreatetruecolor($new_w, $new_h);
	        imagecopyresampled($new_image, $this->image, 0, 0, 0, 0, $new_w, $new_h, $this->image_width, $this->image_height);
	        $this->image_width = $new_w;
	        $this->image_height = $new_h;
	        $this->image = $new_image;
	    }
	     
	    public function imagesave($image_type='jpeg', $image_file=NULL, $image_compress=100, $image_permiss='') {
	        if($image_file==NULL) {
	            switch($this->image_type) {
	                case 'gif': header("Content-type: image/gif"); break;
	                case 'jpeg': header("Content-type: image/jpeg"); break;
	                case 'png': header("Content-type: image/png"); break;
	            }
	        }
	        switch($this->image_type) {
	            case 'gif': imagegif($this->image, $image_file); break;
	            case 'jpeg': imagejpeg($this->image, $image_file, $image_compress); break;
	            case 'png': imagepng($this->image, $image_file); break;
	        }
	        if($image_permiss != '') {
	            chmod($image_file, $image_permiss);
	        }
	    }
	     
	    public function imageout() {
	        imagedestroy($this->image);
	    }
	     
	    public function __destruct() {
	         
	    }
	     
	}
	
?>
