{foreach name=newsArray item=singleNews from=$news}
    <div class="newsTitle">
        <img src="./media/img/news_point.png" border="0" width="23" height="25" alt="" align="left" style="margin-right: 5px;" />
        {$singleNews.title}<br />
        <span class="newsFrom">von <a href="" target="_self">{$singleNews.from}</a> am {$singleNews.time}</span>
    </div>
    <div class="newsCategory" style="float: left; margin-right: 10px;">
        <img src="./media/img/news_category/news_allgemein.png" border="0" width="102" height="152" alt="" />
    </div>
    <div class="newsArea">
        {$singleNews.news}
    </div>
    <div style="clear: both;"></div>
{if not $smarty.foreach.news.last}<br /><br />{/if}
{foreachelse}
    Keine News gefunden
{/foreach}