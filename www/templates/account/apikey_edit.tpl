<div id="contenttop">
    <div id="contenttopic">
        <img src="./media/img/content_point.png" border="0" width="15" height="9" alt="" /> <b>German Kings API Key bearbeiten</b>
    </div>
</div>
<div id="contentmid">
    <div id="contentframe">
        <div class="text">
            <a href="?module=account&submodule=apikey" target="_self">&laquo; Zur&uuml;ck zur API Key-Verwaltung</a>
            <br />
            <br />
{if !isset($notAllowed) || $notAllowed != 1}
{if empty($apiKey)}<strong style="color: #ff0000;">Fehler! Keinen g&uuml;ltigen API Key gefunden!</strong><br /><br />{/if}
            <form action="" method="post" accept-charset="iso-8859-1">
                <label>
                    <span style="display: block; float: left; width: 150px; color: #ffffff;">Key ID:</span>
                    <input type="text" class="inputField" name="keyId" style="width: 400px;" value="{$apiKey.tblAPIKey_keyId}" />
                </label>
                <br />
                <br />
                <label>
                    <span style="display: block; float: left; width: 150px; color: #ffffff;">Verification Code:</span>
                    <input type="text" class="inputField" name="vCode" style="width: 400px;" value="{$apiKey.tblAPIKey_vCode}" />
                </label>
                <br />
                <br />
                <label>
                    <input type="checkbox" name="standard" value="1"{if $apiKey.tblAPIAccount_standard == 1} checked="checked"{/if} style="width: 10px; height: 10px;" /> Standard API Key?
                </label>
                <br />
                <br />
                <input type="submit" class="pushButton" value="Speichern" name="save" />&nbsp;&nbsp;&nbsp;&nbsp;<a href="" target="_self" style="color: #ff0000;">L&ouml;schen</a>
                <br />
                <br />
            </form>
{else}
{if isset($banned) || $banned == 1}
            Du hast - ungeachtet der vorherigen Warnung - mehrfach versucht einen fremden API Key zu manipulieren. Dein Account wurde nun gesperrt. Wenn Du denkst, dass es sich um einen Fehler handelt, wende Dich bitte an einen Administrator.
{else}
            Netter Versuch. Aber dieser API Key geh&ouml;rt Dir nicht. Der Versuch auf einen fremden API Key zuzugreifen, stellt einen Versto&szlig; dar und wird aufgezeichnet. Weitere Versuche fremde API Keys zu manipulieren, f&uuml;hren zur Account-Sperrung.
{/if}{/if}