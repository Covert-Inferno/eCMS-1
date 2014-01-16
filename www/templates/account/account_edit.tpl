<div id="contenttop">
    <div id="contenttopic">
        <img src="./media/img/content_point.png" border="0" width="15" height="9" alt="" /> <b>{$currentContentHead}</b>
    </div>
</div>
<div id="contentmid">
    <div id="contentframe">
        <div class="text">
<form action="" method="post" accept-charset="iso-8859-1">
        <span style="display: block; float: left; width: 150px;">Loginname:</span>
        Loginname <i>(nicht &auml;nderbar)</i>
    <br />
    <br />
    <label>
        <span style="display: block; float: left; width: 150px;">E-Mail:</span>
        <input type="text" class="inputField" name="email" style="width: 250px;" value="{$smarty.post.email}"/>
    </label>
    <br />
    <br />
    <label>
        <span style="display: block; float: left; width: 150px;">Passwort:</span>
        <input type="text" class="inputField" name="pwd" style="width: 250px;" value="{$smarty.post.pwd}"/>
    </label>
    <br />
    <br />
    <input type="submit" class="pushButton" name="save" value="Speichern" />&nbsp;&nbsp;<input type="button" class="pushButtonDelete" name="delete" value="Account l&ouml;schen" />
</form>
