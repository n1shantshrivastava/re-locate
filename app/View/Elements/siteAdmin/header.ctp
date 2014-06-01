<?php
if (!isset($tab) || $tab == '') {
    $tab = '';
}

$dashboard = $users = $projects = '';

switch($tab){
    case 'dashboard':
        $dashboard = 'active';
        break;
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
            <a href="/users/dashboard" class="logo brand <?php echo $dashboard; ?>"></a>
            <div id="main-menu" class="nav-collapse collapse">

<?php if(!empty($loggedInUserId)){ ?>
                <ul id="main-menu-left" class="nav">
                    <?php
                    echo $this->Html->tag(
                        'li',
                        $this->Html->link(__('Manage Teams'),
                            array('controller'=>'users','action'=>'all_users'),
                            array('escape' => false)
                        ), array('escape' => false, 'class' => $users)
                    );
                    echo $this->Html->tag(
                        'li',
                        $this->Html->link(__('Manage Projects'),
                            array('controller'=>'projects','action'=>'all_projects'),
                            array('escape' => false)
                        ), array('escape' => false, 'class' => $projects)
                    );
                    ?>
                </ul>
                    <?php } ?>
                <?php if(!empty($loggedInUserFirstName)) {?>
                <ul id="main-menu-right" class="nav pull-right">
                    <li id="preview-menu" class="dropdown">
                        <a href="javascript:void(0)" data-toggle="dropdown" class="dropdown-toggle">Hello <?php echo $loggedInUserFirstName . ' ' . $loggedInUserLastName; ?> <b class="caret"></b></a>
                        <ul class="dropdown-menu">
                            <li><a href="/users/change_password">Change Password</a></li>
                            <li class="divider"></li>
                            <li>
                                <?php if(!empty($loggedInUserId)){ ?>
                                <a href="/users/logout">Logout</a>
                                <?php } else { ?>
                                <a href="/users/login">Login</a>
                                <?php } ?>
                            </li>
                        </ul>
                    </li>
                </ul>
                <?php } ?>
            </div>
        </div>
    </div>
</div>