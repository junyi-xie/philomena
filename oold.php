
    $a = $Database->Select("SELECT * FROM users AS u INNER JOIN roles AS r ON r.id = u.role_id WHERE 1 AND u.id = :id", [':id' => $Users->getUser()], fetch: true);

// printr($a);
switch ($a->role_id) {
    case '1':
        $perms = true;
        $Appointments->setStaff($Users->getUser());
        echo 'you are admin';
    break;
    case '3':
    case '4':
        $perms = true;
        $Appointments->setStaff($Users->getUser());
        echo 'you are employee';
    break;
    default:
    $perms = false;
        echo 'you are guest';
    break;
}

echo '<a href="dashboard.php?signout=true">Log out here!!</a>';

echo '<br/><br/><br/>you can change your account info here';
echo '
    <form method="post">
        <input type="hidden" name="action" value="information">
        <input type="text" name="credentials[email]" placeholder="first name">
        <input type="text" name="credentials[last_name]" placeholder="last name">
        <input type="text" name="password" placeholder="password">
        <input type="submit" value="update">
    </form>
';

echo '<a href="dashboard.php?signout=true">logout</a>';
// content here


$b = $Database->Select("SELECT * FROM appointments WHERE user_id = :uid", ['uid' => $Users->getUser()]);

if ( $perms && isset($_GET['delete']) && !empty($_GET['delete']) && $Appointments->isStaffLoggedIn() ) {

    $Appointments->removeAppointment($_GET['delete']);

}

if ( $perms ) {

    $in_progress = $Database->Select("SELECT * FROM appointments WHERE 1 AND status = 0");

    foreach ($in_progress as $k => $v) {
        echo 'appointnemt NR: '. $v->id;
        echo '<br/>UID ' . $v->user_id;
        echo '<br/>staff ' . $v->staff_id;
        echo '<br/>treatment ' . $v->treatment_id;
        echo '<br/>date ' . date("M j, Y", strtotime($v->reservation_date));
        echo '<br/>time ' . date("H:i:s", strtotime($v->reservation_time));
        echo '<br/>notes ' . $v->notes;
        echo '<br/>status ' . $v->status;
        echo '<br/><a href="dashboard.php?delete='.$v->id.'">delete<a>';
        echo '<h1>this user needs a staff assigned</h1><br/><br/><br/><br/><br/><br/>';
    }
}

echo '<h1>your appointment list</h1>';
if ( !empty($b)) {

    
    foreach($b as $k => $v) {
        echo 'appointnemt NR: '. $v->id;
        echo '<br/>UID: ' . $v->user_id;
        echo '<br/>staff: ' . $v->staff_id;
        echo '<br/>treatment ' . $v->treatment_id;
        echo '<br/>date ' . date("M j, Y", strtotime($v->reservation_date));
        echo '<br/>time ' . date("H:i:s", strtotime($v->reservation_time));
        echo '<br/>notes ' . $v->notes;
        echo '<br/>status ' . $v->status .'<br/><br/><br/><br/><br/><br/>';
    }
} else {

    echo 'you have no appointments. book one today by clicking <a href="booking.php">here</a>';
}