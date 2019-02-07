<h3>php lab 02</h3>
<?php
	$naam = "Karim";
	$nederlands = "8.5";
	$engels = "7.7";
	$rekenen = "6.7";
	$programmeren = "8.5";
	$databases = "9.4";
	$gemiddeld = $nederlands + $engels + $rekenen + $programmeren + $databases;
	$gemiddeldetotaal = $gemiddeld / 5;
	$gemiddeldetotaal = round($gemiddeldetotaal,2);
	
	$naam2 = "Sophie";
	$nederlands2 = "8.9";
	$engels2 = "8.7";
	$rekenen2 = "9.7";
	$programmeren2 = "9.5";
	$databases2 = "9.2";
	$gemiddeld2 = $nederlands2 + $engels2 + $rekenen2 + $programmeren2 + $databases2;
	$gemiddeldetotaal2 = $gemiddeld2 / 5;
	$gemiddeldetotaal2 = round($gemiddeldetotaal2,2);
	
	$groepgemiddeld = $gemiddeldetotaal + $gemiddeldetotaal2;
	$groepgemiddeld2 = $groepgemiddeld / 2;
	$groepgemiddeld2 = round($groepgemiddeld2,1);
	
	echo "<table border='1'>
	<caption>
		<strong>Rapport</strong>
	</caption>
	<thead>
		<tr><th>Naam</th><th>Nederlands</th><th>Engels
		</th><th>Rekenen</th><th>Programmeren</th><th>Databases
		</th><th>Gemiddeld</th></tr>
	</thead>
	<tbody>
		<tr>
		<td>$naam</td>
		<td>$nederlands</td>
		<td>$engels</td>
		<td>$rekenen</td>
		<td>$programmeren</td>
		<td>$databases</td>
		<td>$gemiddeldetotaal</td>
		</tr>
	</tbody>
	<tbody>
		<tr>
		<td>$naam2</td>
		<td>$nederlands2</td>
		<td>$engels2</td>
		<td>$rekenen2</td>
		<td>$programmeren2</td>
		<td>$databases2</td>
		<td>$gemiddeldetotaal2</td>
		</tr>
	</tbody>
	
	<tfoot>
		<tr><td colspan='6'>Groep gemiddeld</td>
		<td>$groepgemiddeld2</td></tr>
	</tfoot>
	</table>";
?>