<div id="contenttop">
    <div id="contenttopic">
        <img src="./media/img/content_point.png" border="0" width="15" height="9" alt="" /> <b>German Kings Registrierung</b>
    </div>
</div>
<div id="contentmid">
    <div id="contentframe">
        <div class="text">
            <form action="?module=registration&action=addAccount" method="post" accept-charset="iso-8859-1" autocomplete="off">
                <span style="display: block; float: left; width: 150px;">Loginname (min. 3 Zeichen):</span>
                <input type="text" class="inputField" style="width: 250px;" name="loginName" value="{$smarty.post.loginName}" />{if $registration->registrationError['noLoginName'] == 1}<span style="color: #ff0000;">&nbsp;&nbsp;&nbsp;&laquo; Bitte Loginnamen angeben</span>{elseif $registration->registrationError['loginNameTooShort'] == 1}<span style="color: #ff0000;">&nbsp;&nbsp;&nbsp;&laquo; Loginname muss mehr als 3 Zeichen enthalten</span>{elseif $registration->registrationError['loginAlreadyExists'] == 1}<span style="color: #ff0000;">&nbsp;&nbsp;&nbsp;&laquo; Loginname bereits vergeben</span>{/if}
                <br />
                <br />
                <span style="display: block; float: left; width: 150px;">Passwort (min. 6 Zeichen):</span>
                <input type="password" class="inputField" style="width: 250px;" name="loginPwd" value="" />{if $registration->registrationError['noLoginPwd'] == 1}<span style="color: #ff0000;">&nbsp;&nbsp;&nbsp;&laquo; Bitte Passwort angeben</span>{elseif $registration->registrationError['pwdTooShort'] == 1}<span style="color: #ff0000;">&nbsp;&nbsp;&nbsp;&laquo; Passwort muss mindestens 6 Zeichen enthalten</span>{/if}
                <br />
                <br />
                <span style="display: block; float: left; width: 150px;">Passwort (Wiederholung):</span>
                <input type="password" class="inputField" style="width: 250px;" name="loginPwd_repeat" value="" />{if $registration->registrationError['noLoginPwdRepeat'] == 1}<span style="color: #ff0000;">&nbsp;&nbsp;&nbsp;&laquo; Bitte Passwort wiederholen</span>{elseif $registration->registrationError['pwdNotPwdRepeat'] == 1}<span style="color: #ff0000;">&nbsp;&nbsp;&nbsp;&laquo; Passw&ouml;rter stimmen nicht &uuml;berein</span>{/if}
                <br />
                <br />
                <span style="display: block; float: left; width: 150px;">E-Mail:</span>
                <input type="text" class="inputField" style="width: 250px;" name="email" value="{$smarty.post.email}" />{if $registration->registrationError['noEmail'] == 1}<span style="color: #ff0000;">&nbsp;&nbsp;&nbsp;&laquo; Bitte E-Mail angeben</span>{elseif $registration->registrationError['emailNotAnEmail'] == 1}<span style="color: #ff0000;">&nbsp;&nbsp;&nbsp;&laquo; E-Mail ung&uuml;ltig</span>{elseif $registration->registrationError['emailAlreadyExists'] == 1}<span style="color: #ff0000;">&nbsp;&nbsp;&nbsp;&laquo; E-Mail bereits vergeben. <a href="" target="_self">Passwort vergessen?</a></span>{/if}
                <br />
                <br />
                <span style="display: block; float: left; width: 150px;">E-Mail (Wiederholung):</span>
                <input type="text" class="inputField" style="width: 250px;" name="email_repeat" value="{$smarty.post.email_repeat}" />{if $registration->registrationError['noEmailRepeat'] == 1}<span style="color: #ff0000;">&nbsp;&nbsp;&nbsp;&laquo; Bitte E-Mail wiederholen</span>{elseif $registration->registrationError['emailNotEmailRepeat'] == 1}<span style="color: #ff0000;">&nbsp;&nbsp;&nbsp;&laquo; E-Mails stimmen nicht &uuml;berein</span>{/if}
                <br />
                <br />
                <input type="checkbox" name="privacy" value="true" style="width: 10px; height: 10px;" /> Ich habe die Hinweise zum <a href="?module=page&page=imprint" target="_blank">Datenschutz</a> gelesen und akzeptiert.{if $registration->registrationError['noPrivacy'] == 1}<span style="color: #ff0000;">&nbsp;&nbsp;&nbsp;&laquo; Datenschutzrichtlinien nicht akzeptiert.</span>{/if}
                <br />
                <br />
                <input type="submit" class="pushButton" value="Registrierung abschlie&szlig;en" name="submit" />
                <br />
                <br />
                Nach Abschluss der Registrierung erh&auml;lst du eine E-Mail von uns, in der du deine Registrierung best&auml;tigen musst. Erst dann kannst du dich mit deinem Loginnamen und Passwort einloggen und dein Profil vervollst&auml;ndigen.
            </form>