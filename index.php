<?php require dirname(__FILE__) . "/Models/User.php"; ?>
<?php $userObj = new User(); ?>

<div class="main">
<form method="post">
	<input type="text" name="username"/>
	<button>Add User</button>
</form>
<div><b>Users List</b></div>
<?php 
if(isset($_REQUEST['username'])) {
	
	$userObj->setUser($_REQUEST['username']);
}

$usersList = $userObj->list();
foreach($usersList as $user) {
	echo $user['id'].' - '.$user['name'].'<br>';
}
?>

<form method="post">
	<input type="text" name="userid"/>
	<button>Find User</button>
</form>

<?php
if(isset($_REQUEST['userid'])) {
	$user = $userObj->getUser($_REQUEST['userid']);
	if(count($user) > 0) {
		echo $user[0]['id'].' - '.$user[0]['name'].'<br>';
	}
}
?>
</div>
