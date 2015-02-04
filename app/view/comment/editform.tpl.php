<div class='comment-form'>
    <form method=post action="<?=$this->url->create('comment/save')?>">
        <input type=hidden name="redirect" value="<?=$this->url->create($redirect)?>">
        <input type=hidden name="id" value="<?=$id?>">
        <input type=hidden name="key" value="<?=$key?>"> 
        <p><label>Name:<br/><input type='text' name='name' value='<?=$name?>'/></label></p>
        <p><label>Homepage:<br/><input type='text' name='web' value='<?=$web?>'/></label></p>
        <p><label>Email:<br/><input type='text' name='mail' value='<?=$mail?>'/></label></p>
        <p><label>Comment:<br/><textarea name='content'><?=$content?></textarea></label></p>
        <p class=buttons>
            <input type='submit' name='doSave' value='Spara'/>
        </p>
        <output><?=$output?></output>
    </form>
</div>
