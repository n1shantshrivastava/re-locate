<?php
if (!isset($tab) || $tab == '') {
    $tab = 'users';
}

$users = $projects = '';

switch($tab){
    case 'users':
        $users = 'active';
        break;
    case 'projects':
        $projects = 'active';
        break;
}
?>

<div class="navbar navbar-fixed-top">
    <div class="navbar-inner">
        <div class="container">
            <a href="/" class="logo brand"></a>
            <div id="main-menu" class="nav-collapse collapse">

<?php if(!empty($loggedInUserId)){ ?>
                <ul id="main-menu-left" class="nav">
                    <?php
                    echo $this->Html->tag(
                        'li',
                        $this->Html->link(__('Users'),
                            array('controller'=>'users','action'=>'all_users'),
                            array('escape' => false)
                        ), array('escape' => false, 'class' => $users)
                    );
                    echo $this->Html->tag(
                        'li',
                        $this->Html->link(__('Projects'),
                            array('controller'=>'projects','action'=>'all_projects'),
                            array('escape' => false)
                        ), array('escape' => false, 'class' => $projects)
                    );
                    ?>
                </ul>
                    <?php } ?>
                <ul id="main-menu-right" class="nav pull-right">
                    <li>
                        <?php if(!empty($loggedInUserId)){ ?>
                        <a href="/users/logout">Logout</a>
                        <?php } else { ?>
                        <a href="/users/login">Login</a>
                        <?php } ?>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>