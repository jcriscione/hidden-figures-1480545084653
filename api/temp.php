 $i = 0;
	while ($i <= mysqli_num_fields($result))
	{
		$meta = mysql_fetch_field($result, $i);
		$csv_export = $meta->name;
		$i = $i + 1;
		echo("csv_export="+ $csv_export+"</br>");
	}



	$i = 0;
	while ($row = mysqli_fetch_row($result))
	{
		$y = 0;
		while ($y < count($row))
		{
			$c_row = current($row);
			$csv_export = $c_row;

			echo("csv_export="+ $csv_export);

			next($row);
			$y = $y + 1;
		}
		$i = $i + 1;
		//echo("csv_export="+ $csv_export);
	}



