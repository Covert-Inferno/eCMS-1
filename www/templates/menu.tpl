                    <div id="usernav">
                        <ul>
                            <li style="width: 135px; margin-left: 20px;">
{if !isset($smarty.session['account'])}
                                <a href="?module=account&action=login" target="_self"><img src="./media/img/character/no_img.png" width="23" height="23" border="0" alt="" align="absmiddle" /></a> <a href="?module=account&action=login" target="_self">Gast</a>
{else}
                                <a href="" target="_self"><img src="./media/img/character/1238718255_23.png" width="23" height="23" border="0" alt="" align="absmiddle" /></a> <a href="" target="_self">{unserialize($smarty.session['account']['loginName'])}</a>
{/if}                       </li>
                            <li>
                                <a href="" target="_self"{if !isset($smarty.session['account'])} style="visibility: hidden;"{/if}>Nachrichten (0)</a>
                            </li>
                            <li>
                                <a href="" target="_self"{if !isset($smarty.session['account'])} style="visibility: hidden;"{/if}>Aufgaben (0)</a>
                            </li>
                            <li>
                                <a href="" target="_self"{if !isset($smarty.session['account'])} style="visibility: hidden;"{/if}>Rechnungen (0)</a>
                            </li>
{if !isset($smarty.session['account'])}
                            <li>
                                <a href="?module=registration" target="_self">Registrieren</a>
                            </li>
{else}
                            <li>
                                <a href="" target="_self">Account</a>
                            </li>{/if}
{if !isset($smarty.session['account'])}
                            <li>
                                <a href="?module=account&action=login" target="_self">Login</a>
                            </li>
{else}                      <li>
                                <a href="?module=account&action=logout" target="_self">Logout</a>
                            </li>{/if}
                        </ul>
                    </div>
                    <div id="logo"><a href="?module=news" target="_self"><img src="./media/img/gerki_logo.png" border="0" width="271" height="127" alt="" /></a></div>
                    <div id="navbar">
                        <div id="leftnav">
                            <ul>
                                <li style="padding-right: 80px;"><b><a href="?module=news" target="_self">NEWS</a></b><br /><span style="font-size: 10px; color: #bbb">Archiv</span>
                                    <ul>
                                        <li><a href="?module=news&submodule=archive" target="_self">Archiv</a></li>
                                        <li><a href="?module=news&action=writeNews" target="_self">News schreiben</a></li>
                                    </ul>
                                </li>
                                <li><b><a href="#" target="_self">CORPORATION</a></b><br /><span style="font-size: 10px; color: #bbb">Beschreibung und Infos</span>
                                    <ul>
                                        <li><a href="?module=page&page=corporation&sub=description" target="_self">Beschreibung</a></li>
                                        <li><a href="?module=page&page=corporation&sub=information" target="_self">Informationen</a></li>
                                        <li><a href="?module=page&page=corporation&sub=members" target="_self">&gt; Mitglieder</a></li>
                                        <li><a href="?module=page&page=corporation&sub=assignment" target="_self">&gt; Aufgaben</a></li>
                                        <li><a href="?module=page&page=corporation&sub=diplomacy" target="_self">Diplomatie</a></li>
                                        <li><a href="?module=page&page=corporation&sub=application" target="_self">Bewerbung</a></li>
                                    </ul>
                                </li>
                            </ul>
                            <div style="clear: both;"></div>
                        </div>
                        <div id="rightnav">
                            <ul>
                                <li style="padding-right: 80px;"><b><a href="#" target="_self">COMMUNITY</a></b><br /><span style="font-size: 10px; color: #bbb">Forum und Tools</span>
                                    <ul>
                                        <li><a href="?module=page&page=community&sub=forum" target="_self">Forum</a></li>
                                        <li><a href="?module=page&page=community&sub=influence" target="_self">Allianzkarte</a></li>
                                        <li><a href="?module=page&page=community&sub=downloads" target="_self">Downloads</a></li>
                                        <li><a href="?module=page&page=community&sub=calendar" target="_self">Kalender</a></li>
                                        <li><a href="?module=page&page=community&sub=gallery" target="_self">Galerie</a></li>
                                        <li><a href="?module=page&page=community&sub=links" target="_self">Links</a></li>
                                    </ul>
                                </li>
                                <li><b><a href="?module=killboard" target="_self">KILLBOARD</a></b></li>
                            </ul>
                        </div>
                        <div style="clear: both;"></div>
                    </div>