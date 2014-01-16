        <form action="" method="post" accept-charset="iso-8859-1">
            <label>
                <span style="display: block; float: left; width: 150px;">Realname:</span>
                <input type="text" class="inputField" name="realname" style="width: 250px;" value="{$smarty.post.realname}"/>
            </label>
            <br />
            <br />
            <span style="display: block; float: left; width: 150px;">Geburtstag:</span>
            <select name="day" class="selectBox">
{for $day=1 to 31}
                <option class="selectOption" value="{$day}">{$day}</option>
{/for}
            </select>
            <select name="month" class="selectBox">
{for $month=1 to 12}
                <option class="selectOption" value="{$month}">{$month}</option>
{/for}
            </select>
            <select name="year" class="selectBox">
{for $year=1930 to 'Y'|date}
                <option class="selectOption" value="{$year}">{$year}</option>
{/for}
            </select>
            <i>(dd.mm.yyyy)</i>
            <br />
            <br />
            <span style="display: block; float: left; width: 150px;">Geschlecht:</span>
            <label>
                <input type="radio" name="gender" value="m" /> m&auml;nnlich
            </label>
            <label>
                <input type="radio" name="gender" value="f" /> weiblich
            </label>
            <br />
            <br />
            <label>
                <span style="display: block; float: left; width: 150px;">Wohnort:</span>
                <input type="text" class="inputField" name="location" style="width: 250px;" value="{$smarty.post.location}"/>
            </label>
            <br />
            <br />
            <span style="display: block; float: left; width: 150px;">Land:</span>
            <select name="country" class="selectBox">
                {foreach from=$country key=number item=land}
                    <option class="selectOption" value="{$number}">{$land}</option>
                {/foreach}
            </select>
            <br />
            <br />
            <input type="submit" class="pushButton" name="save" value="Speichern" />
        </form>