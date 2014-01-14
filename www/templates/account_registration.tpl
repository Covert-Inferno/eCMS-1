            <form action="?module=registration&action=addAccount" method="post" accept-charset="iso-8859-1" autocomplete="off">
                <span style="display: block; float: left; width: 150px;">Loginname:</span>
                <input type="text" style="width: 250px;" name="loginName" value="{$smarty.post.loginName}" />{if $registration->registrationError['noLoginName'] == 1}<span style="color: #ff0000;">&nbsp;&nbsp;&nbsp;Bitte Loginnamen angeben</span>{elseif $registration->registrationError['loginNameTooShort'] == 1}<span style="color: #ff0000;">&nbsp;&nbsp;&nbsp;Loginname muss mehr als 3 Zeichen enthalten</span>{/if}
                <br />
                <br />
                <span style="display: block; float: left; width: 150px;">Passwort:</span>
                <input type="password" style="width: 250px;" name="loginPwd" value="" />{if $registration->registrationError['noLoginPwd'] == 1}<span style="color: #ff0000;">&nbsp;&nbsp;&nbsp;Bitte Passwort angeben</span>{elseif $registration->registrationError['pwdTooShort'] == 1}<span style="color: #ff0000;">&nbsp;&nbsp;&nbsp;Passwort muss mindestens 6 Zeichen enthalten</span>{/if}
                <br />
                <br />
                <span style="display: block; float: left; width: 150px;">Passwort (Wiederholung):</span>
                <input type="password" style="width: 250px;" name="loginPwd_repeat" value="" />{if $registration->registrationError['noLoginPwdRepeat'] == 1}<span style="color: #ff0000;">&nbsp;&nbsp;&nbsp;Bitte Passwort wiederholen</span>{elseif $registration->registrationError['pwdNotPwdRepeat'] == 1}<span style="color: #ff0000;">&nbsp;&nbsp;&nbsp;Passw&ouml;rter stimmen nicht &uuml;berein</span>{/if}
                <br />
                <br />
                <span style="display: block; float: left; width: 150px;">E-Mail:</span>
                <input type="text" style="width: 250px;" name="email" value="{$smarty.post.email}" />{if $registration->registrationError['noEmail'] == 1}<span style="color: #ff0000;">&nbsp;&nbsp;&nbsp;Bitte E-Mail angeben</span>{elseif $registration->registrationError['emailNotAnEmail'] == 1}<span style="color: #ff0000;">&nbsp;&nbsp;&nbsp;E-Mail ung&uuml;ltig</span>{/if}
                <br />
                <br />
                <span style="display: block; float: left; width: 150px;">E-Mail (Wiederholung):</span>
                <input type="text" style="width: 250px;" name="email_repeat" value="{$smarty.post.email_repeat}" />{if $registration->registrationError['noEmailRepeat'] == 1}<span style="color: #ff0000;">&nbsp;&nbsp;&nbsp;Bitte E-Mail wiederholen</span>{elseif $registration->registrationError['emailNotEmailRepeat'] == 1}<span style="color: #ff0000;">&nbsp;&nbsp;&nbsp;E-Mails stimmen nicht &uuml;berein</span>{/if}
                <br />
                <br />
                <input type="submit" value="Registrierung abschlie&szlig;en" name="submit" />&nbsp;&nbsp;<input type="reset" value="Zur&uuml;cksetzen" name="reset" />
                <br />
                <br />
                Nach Abschluss der Registrierung erh&auml;lst du eine E-Mail von uns, in der du deine Registrierung best&auml;tigen musst. Erst dann kannst du dich mit deinem Loginnamen und Passwort einloggen und dein Profil vervollst&auml;ndigen.
            </form>