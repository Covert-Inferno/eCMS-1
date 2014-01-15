                        <div id="contenttop">
                            <div id="contenttopic">
                                <img src="./media/img/content_point.png" border="0" width="15" height="9" alt="" /> <b>{$currentContentHead}</b>
                            </div>
                        </div>
                        <div id="contentmid">
                            <div id="contentframe">
                                <div class="text">
{if isset($content)}{include file=$content}{else}{include file='administration/news_create.tpl'}{/if}
                                </div>
                            </div>
                        </div>
                        <div id="contentbottom"></div>