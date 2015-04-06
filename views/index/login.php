<form id="login-form" name="form" method="post" action="<?php echo URL::abs('membership/login/standard'); ?>">
    <div class="login-wrapper">
        <div class="text-left"><label>username</label></div>
        <input id="username" name="username" class="login" type="text" autocomplete="on"/>
    </div>
    <div class="login-wrapper">
        <div class="text-right"><label>password</label></div>
        <input id="password" name="password" class="login" type="password"/>
    </div>
    <div class="login_button" > 
        <a href="#" onclick="document.getElementById('login-form').submit();"> 
            <img id="hover-img" src="<?php echo URL::image('login_button.png'); ?>" width="120" height="35" 
                 alt="Login button" title="Sign in" />
        </a>
    </div>
    <input type="submit" value="submit" style="visibility: hidden;" />
</form>