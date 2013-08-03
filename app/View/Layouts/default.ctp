<?php
/**
 *
 * PHP 5
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright 2005-2011, Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright 2005-2011, Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       Cake.View.Layouts
 * @since         CakePHP(tm) v 0.10.0.1076
 * @license       MIT License (http://www.opensource.org/licenses/mit-license.php)
 */
$cakeDescription = __d('cake_dev', $appName);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
        "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <?php echo $this->Html->charset(); ?>
    <title>
        <?php echo $cakeDescription ?>:
        <?php echo $title_for_layout; ?>
    </title>
    <script src="http://code.jquery.com/jquery-1.7.1.js"></script>
    <?php
    echo $this->Html->meta('icon');

    echo $this->Html->css(array("flatly.bootstrap",'CircleView'));

    echo $this->fetch('meta');
    echo $this->fetch('css');
    echo $this->Html->script(array('bootstrap', 'jquery.validate', 'jquery.validation.functions','masonry/jquery.masonry.min','masonry/jquery.masonry.corner.stamp','circleview/CircleView','tween/TimelineLite','tween/EasePack','tween/TimelineMax','tween/TweenMax.js','circleview/jquery.qtip-1.0.0-rc3'));
    echo $this->fetch('script');
    ?>
    <script src="http://code.jquery.com/ui/1.9.2/jquery-ui.js"></script>
    <link rel="stylesheet" href="http://code.jquery.com/ui/1.10.3/themes/smoothness/jquery-ui.css" />
    <style type="text/css">
        body {
            padding-top: 60px;
            padding-bottom: 40px;
        }
    </style>
</head>
<body>
<div class="navbar navbar-fixed-top">
    <div class="navbar-inner">
        <div class="container">
            <?php echo $this->element('siteAdmin/header'); ?>
        </div>
    </div>
</div>
<div class="container">
    <?php
    echo $this->Session->flash();
    echo $this->fetch('content');
    ?>
    <hr>
    <?php echo $this->element('siteAdmin/footer'); ?>
</div>
<?php echo $this->element('sql_dump'); ?>
</body>
</html>