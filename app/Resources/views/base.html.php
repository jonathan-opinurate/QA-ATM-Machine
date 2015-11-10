<?php
/**
 * Created by IntelliJ IDEA.
 * User: jonathan
 * Date: 05/11/15
 * Time: 12:57
 */
?>
<!-- app/Resources/views/base.html.php -->
<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title><?php $view['slots']->output('title', 'Bank Of PHP') ?></title>
    <?php foreach ($view['assetic']->stylesheets(
        array('bundles/app/css/*'),
        array('cssrewrite')
    ) as $url): ?>
        <link rel="stylesheet" href="<?php echo $view->escape($url) ?>" />
    <?php endforeach ?>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css" integrity="sha512-dTfge/zgoMYpP7QbHy4gWMEGsbsdZeCXz7irItjcC3sPUFtf0kuFbDz/ixG7ArTxmDjLXDmezHubeNikyKGVyQ==" crossorigin="anonymous">
</head>
<body>
<div class="atm-body">
<?php $view['slots']->output('_content') ?>
</div>
</body>
</html>