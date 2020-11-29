<ul>
<?php
foreach($data as $entry){
?>
	<li><a href="/index.php/Board/myboard/<?=$entry->ID?>"><?=$entry->boardContent?></a></li>
<?php
}
?>

<button type="button" class="navyBtn" onClick="location.href='registerboard'">
</ul>
