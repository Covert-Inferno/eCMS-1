        <form action="?module=account&action=login" method="post" accept-charset="iso-8859-1" autocomplete="off">
            <span style="display: block; float: left; width: 150px;">Loginname:</span>
            <label>
                <input type="text" name="loginName" style="width: 250px;" value="{$smarty.post.email}"/>
            </label>
            <br />
            <br />
            <span style="display: block; float: left; width: 150px;">Passwort:</span>
            <label>
                <input type="password" style="width: 250px;" name="loginPwd" />
            </label>
            <br />
            <br />
            <input type="submit" value="Login" name="submit" />&nbsp;&nbsp;<input type="button" value="Passwort vergessen?" name="lostPassword" />
        </form>
        <br />
        <br />
        Noch keinen Account bei den German Kings? Die Erstellung ist kostenlos und einfach. <a href="?module=registration" target="_self">Account anlegen</a>.
        <!--<br />
        <u>Hinweis f&uuml;r Mitglieder der Corporation</u>: Haltet einen definierten
        API-Key bereit, um die Erstellung des Accounts zu verbessern und die Informationen automatisch mit eurem Account zu verkn&uuml;pfen.
        Ihr k&ouml;nnt den API-Key selbst erstellen oder einen <a href="http://support.eveonline.com/api/Key/CreatePredefined/193929614" target="_blank">vordefinierten Key</a> generieren. Dieser vordefinierte Key enth&auml;lt alle Zugriffsrechte,
        die zum Nutzen des ganzen Potenzials der Seite ben&ouml;tigt werden. Es bleibt aber dir &uuml;berlassen, wie viel Zugriff du zul&auml;sst.-->