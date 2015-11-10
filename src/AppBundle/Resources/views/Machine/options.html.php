<?php
/**
 * Created by IntelliJ IDEA.
 * User: jonathan
 * Date: 05/11/15
 * Time: 14:30
 */
    $view->extend('::layout.html.php');
?>

<h1>Bank Of PHP</h1>


<div class="options-screen">
    <div class="select">
        <div class="options">
            <ul>
            <a class="option first" href="<?= $view['router']->generate('cash_out', [
                'receipt' => 0
            ]) ?>"><li> <i class="glyphicon glyphicon-play"></i> Withdraw Cash</li></a>
            <a class="option" href="<?= $view['router']->generate('cash_out', [
                'receipt' => 1
            ]) ?>"><li><i class="glyphicon glyphicon-play"></i> Cash With Receipt</li></a>
            <a class="option" href="<?= $view['router']->generate('show_balance') ?>"><li><i class="glyphicon glyphicon-play"></i> Display Balance</li></a>
            </ul>
        </div>
    </div>
    <div class="sumbit">
        <a href="<?= $view['router']->generate('logout') ?>"><input type="button" value="Log Out"></a>
    </div>
</div>
