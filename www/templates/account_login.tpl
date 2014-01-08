        <form action="?module=account&action=login" method="post" accept-charset="iso-8859-1">
            <span style="display: block; float: left; width: 150px;">Login name</span>
            <label>
                <input type="text" name="loginName" style="width: 420px; border: 1px solid {if isset($account) && $account->getAccountError('noLoginName') == 1 || isset($account) && $account->getAccountError('loginNameUnknown') == 1}red{else}lightgrey{/if};" value="{$smarty.post.email}"/>
            </label>
            <br>
            <span style="display: block; float: left; width: 150px;">Login password</span>
            <label>
                <input type="password" name="loginPwd" style="width: 420px; border: 1px solid {if isset($account) && $account->getAccountError('noLoginPwd') == 1 || isset($account) && $account->getAccountError('loginPwdWrong') == 1}red{else}lightgrey{/if};"/>
            </label>
            <br>
            <br>
            <input type="submit" value="Login" name="submit" /> <input type="button" value="Lost password" name="lostPassword" />
        </form>