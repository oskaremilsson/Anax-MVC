<form method=post id='write-comment' action='<?=$this->url->create('comment/write')?>'>
	<input type=hidden name='redirect' value='<?=$this->url->create($redirect)?>'>
	<input type=hidden name='key' value='<?=$key?>'> 
	<p class='write-comment-link'><a href='#' onclick="document.getElementById('write-comment').submit();">Kommentera</a></p>
</form>