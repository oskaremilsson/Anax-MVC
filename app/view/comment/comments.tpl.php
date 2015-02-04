<?php if (is_array($comments)) : ?>
<?php if (count($comments) > 0) : ?>
<h2>Comments</h2>
<?php else : ?>
<h4>Inga kommentarer</h4>
<?php endif; ?>
<div class='comments'>
<?php foreach ($comments as $id => $comment) : ?>
<?php

	$commentHTML = "<div class='comment-item'>";
	$gravatar =  get_gravatar(60, $comment['mail']);
	if(strpos(get_headers($gravatar, 1)[0], '404')) {
		$commentHTML .= "<div class='comment-image'><img src='".$this->url->create('')."/img/comment-standard.jpg' width='60px' height='60px'/></div>";
	}
	else {
		$commentHTML .= "<div class='comment-image'><img src='{$gravatar}'/></div>";
	}
	
	$commentHTML .= "<div class='comment-info'>";
	// check for http or https to check if link is valid or fix it!
	if($comment['web'] != "") {
		$url = parse_url($comment['web']);
		if(!isset($url['scheme'])) {
			$comment['web'] = "//" . $comment['web'];
		}
		$commentHTML .= "<p class='comment-name'><a href='{$comment['web']}'>{$comment['name']}</a></p>";
	}
	else {
		$commentHTML .= "<p class='comment-name'>{$comment['name']}</p>";
	}
	
	$commentHTML .= "<p class='comment-timestamp'>" . date('Y/m/d H:i:s', $comment['timestamp']) . "</p>";
	$commentHTML .= "
	<form method=post id='form-{$id}'>
	<input type=hidden name='redirect' value='".$this->url->create($redirect)."'>
	<input type=hidden name='id' value='{$id}'>
	<input type=hidden name='key' value='{$key}'> 
	<p class='comment-menu'><a href='#' onclick=\"document.getElementById('form-{$id}').action = '".$this->url->create('comment/edit')."'; document.getElementById('form-{$id}').submit();\">Redigera</a> | <a href='#' onclick=\"document.getElementById('form-{$id}').action = '".$this->url->create('comment/delete')."'; document.getElementById('form-{$id}').submit();\">Radera</a></p>
	</form>
	</div>
	<p class='comment-content'>{$comment['content']}</p>
	</div>";
	echo $commentHTML;
?>
<?php endforeach; ?>
</div>
<?php else : ?>
<h4>Inga kommentarer</h4>
<?php endif; ?>