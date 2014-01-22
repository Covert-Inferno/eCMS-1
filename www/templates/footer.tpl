                    <div id="copyright">
                        Copyright (C) 2007 - {'Y'|date} German Kings. All rights reserved.
                    </div>
                    <div id="render">
                        Aktuelle Zeit: {$smarty.now|date_format:"%H:%M %Z"}
                    </div>
                    <div id="design">
                        Design &amp; Code by GERKI | Hawk Misado.
                    </div>
                    <div id="imprint">
                        <a href="?module=page&page=imprint" target="_self">Impressum &amp; Datenschutz</a>
                        <br />
                        {if isset($smarty.session.account.group) && {multi_in_array value="3f5b905c5887aa8e451e60a2c8aaa739" array=unserialize($smarty.session.account.group)}}<a href="?module=adm&page=overview" target="_self">Administration</a>{/if}
                    </div>