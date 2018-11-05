<form method="post" onsubmit="return(check());" action="index.php?action=__saveMessage">
Leave new message:<br>
<table class="insert">
<tr><td>Name:</td><td><input type="text" id="name" value="" name="name"></td></tr>
<tr><td>Email:</td><td><input type="text" id="mail" value="" name="mail"></td></tr>
<tr><td>www:</td><td><input type="text" id="www" name="www"></td></tr>
<tr><td>Message:</td><td>Add tags: <span id="italic" class="add_tag">Italic</span> <span id="link" class="add_tag">Link</span > <span id="strike" class="add_tag">Strike</span> <span id="strong" class="add_tag">Strong</span><br>
<textarea id="message" name="message"></textarea></td></tr>
<tr><td></td><td><input type="submit" value="Submit"><input value="Preview" id="preview" type="button"></td></tr>
</table>
</form>
