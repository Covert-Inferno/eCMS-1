<div id="contenttop">
    <div id="contenttopic">
        <img src="./media/img/content_point.png" border="0" width="15" height="9" alt="" /> <b>German Kings API Key hinzuf&uuml;gen</b>
    </div>
</div>
<div id="contentmid">
    <div id="contentframe">
        <div class="text">
            Hier hast Du die M&ouml;glichkeit einen API Key zu Deinem Account hinzuzuf&uuml;gen. Mit eingetragenem API Key hast Du Zugriff auf bestimmte Bereiche, die Dir sonst nicht zur Verf&uuml;gung stehen. Au&szlig;erdem erleichert Dir der API Key das Vervollst&auml;ndigen Deines Profils. Mitglieder der German Kings sind verpflichtet den API Key ihres Charakters, der zur Corporation geh&ouml;rt, einzutragen. Du kannst auch mehrere API Keys mit Deinem Account verkn&uuml;pfen. Der erste eingetragene API Key wird als Standard definiert (sp&auml;ter &auml;nderbar).
            <br />
            <br />
            Einen neuen API Key kannst Du im <a href="http://community.eveonline.com/support/api-key/" target="_blank">API Key Management</a> auf der Eve Online Seite generieren. F&uuml;r den vollen Funktionsumfang empfehlen wir Dir einen <a href="http://support.eveonline.com/api/Key/CreatePredefined/193929614" target="_blank">Predefined API Key</a> zu erstellen.
            <br />
            <br />
{if isset($error)}
    {if $error == 203 || $error == 204 || $error == 205 || $error == 210 || $error == 212}<strong style="color: #ff0000;">Die Authentifizierung ist fehlgeschlagen. Bitte &uuml;berpr&uuml;fe Key ID und Verification Code.</strong><br /><br />{/if}
    {if $error == 222}<strong style="color: #ff0000;">Dieser API Key ist nicht mehr g&uuml;ltig. Bitte erneuere ihn oder f&uuml;ge einen anderen, g&uuml;ltigen API Key hinzu.</strong></strong><br /><br />{/if}
{/if}
            <form action="?module=account&submodule=apikey&action=add" method="post" accept-charset="iso-8859-1">
                <label>
                    <span style="display: block; float: left; width: 150px; color: #ffffff;">Key ID:</span>
                    <input type="text" class="inputField" name="keyId" style="width: 400px;" value="{$smarty.post.keyId}" />
                </label>
                <br />
                <br />
                <label>
                    <span style="display: block; float: left; width: 150px; color: #ffffff;">Verification Code:</span>
                    <input type="text" class="inputField" name="vCode" style="width: 400px;" value="{$smarty.post.vCode}" />
                </label>
                <br />
                <br />
                <input type="submit" class="pushButton" value="Hinzuf&uuml;gen" name="save" />
                <br />
                <br />
            </form>