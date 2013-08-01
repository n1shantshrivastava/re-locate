<a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse"> </a>
<a class="brand" href="/"><?php echo $appName; ?></a>
<div class="nav-collapse">
    <ul class="nav">
        <?php
        echo $this->Html->tag('li', $this->Html->link(__('Home'), '/', array('escape' => false)), array('escape' => false, 'class' => 'active'));
        ?>
    </ul>
    <ul class="nav pull-right" id="main-menu-right">
        <?php
        echo $this->Html->tag('li', $this->Html->link(__('Login'), array('controller' => 'users', 'action' => 'login'), array('escape' => false)), array('escape' => false, 'class' => ''));
        ?>
    </ul>
</div>
