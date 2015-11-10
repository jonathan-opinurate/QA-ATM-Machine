<?php
/**
 * Created by IntelliJ IDEA.
 * User: jonathan
 * Date: 05/11/15
 * Time: 16:12
 */
 $view->extend('::layout.html.php');
 ?>

    <form action="Login.php">
    <label>Account Number</label>
        <input type="text" name="acc_no" placeholder="Account Number">
    <label>PIN (Personal Identification Number)</label>
        <input type="text" name="pin_no" placeholder="PIN Number">
        <input type="submit" value="Continue">
    </form>