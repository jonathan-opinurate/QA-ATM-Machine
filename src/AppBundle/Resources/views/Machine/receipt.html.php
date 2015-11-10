<?php
/**
 * Created by IntelliJ IDEA.
 * User: jonathan
 * Date: 09/11/15
 * Time: 15:15
 */

$view->extend('::layout.html.php');
?>

<h1>Amount withdrawn: </h1>
<h3><?=$amount ?></h3>

<div class="sumbit">
    <a href="<?= $view['router']->generate('options') ?>"><button>Back</button></a>
    <input type="submit" value="Continue">
    <a href="<?php echo $view['router']->generate('logout') ?>"><input type="button" value="Log Out"></a>
</div>
