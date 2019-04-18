<?php 
require_once 'links.php';
class LinksView
{
public static function CreateLinkForm()
{
?>
<input type="text" name="link" placeholder="type linkname"/>
<input type="text" name="plink" placeholder="type physicalname" />
    <input type="submit" value="Authorize" name="CreateAuthorize" />

<?php
}
}