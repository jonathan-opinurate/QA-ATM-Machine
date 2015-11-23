<?php
/**
 * Created by IntelliJ IDEA.
 * User: jonathan
 * Date: 09/11/15
 * Time: 16:12
 */
$view->extend('::layout.html.php');
?>



<h1>The ATM Machine is Now Closed</h1>

<a href="<?= $view['router']->generate('logout') ?>"><input type="button" value="start machine"></a>
