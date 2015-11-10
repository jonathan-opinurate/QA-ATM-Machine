<?php
/**
 * Created by IntelliJ IDEA.
 * User: jonathan
 * Date: 09/11/15
 * Time: 14:36
 */

$view->extend('::layout.html.php');
?>

<?php echo $view['form']->start($form) ?>
<?php echo $view['form']->widget($form) ?>
<?php echo $view['form']->end($form) ?>

<div class="sumbit">
    <a href="<?= $view['router']->generate('options') ?>"><button>Back</button></a>
    <input type="submit" value="Continue">
    <a href="<?php echo $view['router']->generate('logout') ?>"><input type="button" value="Log Out"></a>
</div>
