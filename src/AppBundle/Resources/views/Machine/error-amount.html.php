<?php
/**
 * Created by IntelliJ IDEA.
 * User: jonathan
 * Date: 09/11/15
 * Time: 16:52
 */

$this->extend('::layout.html.php');
?>

<h1>Error!</h1>
<h2>You cannot withdraw an amount of 0 or an amount which exceeds your daily limit.</h2>
<a href="<?= $view['router']->generate('options') ?>"><input type="button" value="Back"></a>