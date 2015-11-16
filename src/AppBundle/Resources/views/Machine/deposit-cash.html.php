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
    <a href="<?php echo $view['router']->generate('logout') ?>"><input type="button" value="Log Out"></a>
</div>
