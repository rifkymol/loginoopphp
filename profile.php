<?php

require_once "core/init.php";

if(!$user->is_loggedIn()){
    Session::flash('flashlogin', 'You should login to access this page!');
    Redirect::to('login');
}

if(Session::exist('flashprofile')){
    echo Session::flash('flashprofile');
}

$user_data = $user->get_data(Session::get('username'));

require_once "templates/header.php";

?>

<h1><?php echo  "Welcome ! <br>"  . $user_data['username']; ?></h1>

<?php if ($user->is_admin(Session::get('username'))) { ?>
You see this text? So you are an Admin now!!
<?php }else if($user->is_premiUser(Session::get('username'))){ ?>
You are Premium User now!!
<?php } ?>

<?php require_once "templates/footer.php"; ?>