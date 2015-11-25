<?php
/**
 * Created by IntelliJ IDEA.
 * User: jonathan
 * Date: 11/11/15
 * Time: 12:01
 */

$view->extend('::layout.html.php');
?>

<?php echo $view['form']->start($form) ?>
<?php echo $view['form']->widget($form) ?>
<?php echo $view['form']->end($form) ?>

<div class="sumbit">
    <a href="<?= $view['router']->generate('options') ?>"><button>Back</button></a>
    <a href="<?= $view['router']->generate('logout') ?>"><input type="button" value="Return Card"></a>
</div>
