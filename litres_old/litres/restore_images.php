<?php

        include("config.php");
        include("config_litres.php");
        include("functions.php");

	$query = 'select count(1) from dle_books';
	$result = mysql_query($query);
	$count_rows = 0;
	$count_iterations = 0;

	if (mysql_num_rows($result)>0) {
		while ($row = mysql_fetch_array($result)) {
			$count_rows = $row[0];
			$count_iterations = ceil($count_rows/100);
		}
	}

	print($count_iterations);

	for($i = 200; $i < 300; $i++) {
		echo "Iteration " . $i . '::' . $count_iterations . "\n";
		$offset = $i * 100;
		$query = 'select id, book_cover from dle_books limit ' . $offset . ', 100';

		$result = mysql_query($query);

		if (mysql_num_rows($result)>0) {
			while ($row = mysql_fetch_array($result)) {
				$file = $row['book_cover'];

				if (file_exists(dirname(__FILE__) . '/../../../bks/' . $file . '.png')) {
					print('Exists ' . $file . "\n");
				} else {
					$q = "DELETE FROM dle_post WHERE `id`=" . $row['id'];
					mysql_query($q);
					$q = "DELETE FROM dle_books WHERE `id`=" . $row['id'];
                                        mysql_query($q);
                                       	$q = "DELETE FROM dle_post_extras WHERE `news_id`=" . $row['id'];
                                        mysql_query($q);
					echo 'delete id=' . $row['id'] . PHP_EOL;
				}
			}
		}
	}


