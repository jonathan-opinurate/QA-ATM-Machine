<?php
/**
 * Created by IntelliJ IDEA.
 * User: jonathan
 * Date: 05/11/15
 * Time: 16:12
 */
 $view->extend('::layout.html.php');

if ($error): ?>
    <div><?php echo $error->getMessage() ?></div>
<?php endif ?>
<h1>Bank of PHP</h1>

    <h2>Welcome!</h2>

<form action="<?php echo $view['router']->generate('login_check') ?>" method="post" class="login-form">
    <label for="username">Account Number:</label><br/>
    <input type="text" id="username" name="_username" maxlength="6" value="<?php echo $last_username ?>" /><br /><br />

    <label for="password">Pin:</label><br/>
    <input type="password" id="password" maxlength="4" name="_password" /><br /><br />

    <!--
        If you want to control the URL the user
        is redirected to on success (more details below)
        <input type="hidden" name="_target_path" value="/account" />
    -->

    <button type="submit">login</button>
</form>