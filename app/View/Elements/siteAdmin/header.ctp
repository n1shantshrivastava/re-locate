<a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse"> </a>
<a class="brand" href="/users/dashboard"><?php echo $appName; ?></a>
<div class="nav-collapse">
    <ul class="nav">
        <?php
        echo $this->Html->tag('li', $this->Html->link(__('Home'), array('controller'=>'users','action'=>'dashboard'), array('escape' => false)), array('escape' => false, 'class' => 'active'));
        ?>
    </ul>
    <ul class="nav pull-right" id="main-menu-right">
        <?php
        $action = ($loggedInUserId!='' && $loggedInUserRole==1) ? 'logout' : 'login';
        echo $this->Html->tag('li', $this->Html->link(__($action), array('controller' => 'users', 'action' => $action), array('escape' => false)), array('escape' => false, 'class' => ''));
        ?>
    </ul>
</div>
