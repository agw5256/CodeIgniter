<ul>
	<form class="navbar-form navbar-right" action="/index.php/board/boardlist" method="get">
		<input type="text" class="form-control" name="search" placeholder="Search...">
		<input type="submit" class="btn btn-primary" value="검색">
	<form>
<?php
foreach($data as $entry){
?>
	<li><a href="/index.php/Board/myboard/<?=$entry->ID?>"><?=$entry->boardContent?></a></li>
<?php
}
?>
<button type="button" class="btn btn-lg btn-primary" onClick="location.href='registerboard'">등록</button>
</ul>
