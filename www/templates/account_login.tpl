        <form action="?module=account&action=login" method="post" accept-charset="iso-8859-1" autocomplete="off">
            <span style="display: block; float: left; width: 150px;">Loginname:</span>
            <label>
                <input type="text" class="inputField" name="loginName" style="width: 250px;" value="{$smarty.post.loginName}"/>
            </label>
            <br />
            <br />
            <span style="display: block; float: left; width: 150px;">Passwort:</span>
            <label>
                <input type="password" class="inputField" style="width: 250px;" name="loginPwd" />
            </label>
            <br />
            <br />
            <input type="submit" class="pushButton" value="Login" name="submit" />&nbsp;&nbsp;<input type="button" class="pushButton" value="Passwort vergessen?" name="lostPassword" />
        </form>
        <br />
        <br />
        Noch keinen Account bei den German Kings? Die Erstellung ist kostenlos und einfach. <a href="?module=registration" target="_self">Account anlegen</a>.