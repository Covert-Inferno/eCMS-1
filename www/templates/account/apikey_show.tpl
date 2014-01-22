<div id="contenttop">
    <div id="contenttopic">
        <img src="./media/img/content_point.png" border="0" width="15" height="9" alt="" /> <b>German Kings API Key-&Uuml;bersicht</b>
    </div>
</div>
<div id="contentmid">
    <div id="contentframe">
        <div class="text">
            <a href="?module=account&submodule=overview" target="_self">&laquo; Zur&uuml;ck zur Account-Verwaltung</a>
            <br />
            <br />
            <strong style="color: #ffffff;">Eingetragene API Keys:</strong>
            <br />
            <br />
{foreach name=apiKeys from=$apiKey item=singleAPIKey}
            <span style="display: block; float: left; width: 150px; color: #ffffff;">Key ID:</span> {$singleAPIKey.tblAPIKey_keyId}{if $singleAPIKey.tblAPIAccount_standard == 1} <i>(Standard)</i>{/if} <a href="?module=account&submodule=apikey&action=edit&cs={$singleAPIKey.tblAPIKey_checksum}" target="_self">[Bearbeiten]</a>
            <br />
            <span style="display: block; float: left; width: 150px; color: #ffffff;">Verification Code:</span> {$singleAPIKey.tblAPIKey_vCode}
{if not $smarty.foreach.apiKeys.last}<br /><br />{/if}
{foreachelse}
            Kein APIKey eingetragen
{/foreach}
            <br />
            <br />
            <a href="" target="_self">Neuen API Key hinzuf&uuml;gen</a>
