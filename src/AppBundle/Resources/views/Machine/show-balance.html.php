<?php
/**
 * Created by IntelliJ IDEA.
 * User: jonathan
 * Date: 09/11/15
 * Time: 14:09
 */

$view->extend('::layout.html.php');
?>

<div class="display">

    <h1>Hello <?= $name ?></h1>

    <h2>Your balance is: <?= $balance ?></h2>
</div>
<div class="sumbit">
    <a href="<?php echo $view['router']->generate('options') ?>">
        <button>Back</button>
    </a>
    <a href="<?= $view['router']->generate('logout') ?>"><input type="button" value="Return Card"></a>
</div>
