<ul>
<?php
foreach($data as $entry){
?>
	<li><a href="/index.php/Board/myboard/<?=$entry->ID?>"><?=$entry->boardContent?></a></li>
<?php
}
?>
</ul>
