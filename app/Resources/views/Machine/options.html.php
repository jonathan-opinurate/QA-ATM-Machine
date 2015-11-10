<?php
/**
 * Created by IntelliJ IDEA.
 * User: jonathan
 * Date: 05/11/15
 * Time: 14:30
 */
    $view->extend('AppBundle::layout.html.php');
?>

<div class="options-screen">
    <div class="select">
        <form action="OptionController.php">
            <input type="checkbox" name="cash" value="Cash">
            <input type="checkbox" name="cwr" value="Cash With Receipt">
            <input type="checkbox" value="Display Balance">
            <input type="checkbox" value="Other Services" >
        </form>
    </div>
    <div class="sumbit">
        <input type="submit" value="Continue">
        <button>Cancel</button>
        <button>Back</button>
    </div>
</div>
