<?php 

    require_once 'admin-db.php';
    $admin = new Admin();
    session_start();

    // Handle Admin Login Ajax Request
    if(isset($_POST['action']) && $_POST['action'] == 'adminLogin'){
        $username = $admin->test_input($_POST['username']);
        $password = $admin->test_input($_POST['password']);

        $hpassword = sha1($password);

        $loggedInAdmin = $admin->admin_login($username, $hpassword);

        if($loggedInAdmin != null){
            echo 'admin_login';
            $_SESSION['username'] = $username;
        } else {
            echo $admin->showMessage('danger','Username or Password is Incorrect!');
        }
    }

    // Handle Fetch All Users Ajax Request
    if(isset($_POST['action']) && $_POST['action'] == 'fetchAllUsers'){
        $output = '';
        $data = $admin->fetchAllUsers(0);
        $path = '../assets/php/';

        if($data){
            $output .= '<table class="table table-striped table-bordered text-center">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Image</th>
                                    <th>Name</th>
                                    <th>E-Mail</th>
                                    <th>Phone</th>
                                    <th>Gender</th>
                                    <th>Verified</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>';
                            foreach ($data as $row) {
                                if($row['photo'] != ''){
                                    $uphoto = $path.$row['photo'];
                                } else {
                                    $uphoto = '../assets/img/jadi.jpg';
                                }
                                $output .= '<tr>
                                                <td>'.$row['id'].'</td>
                                                <td><img src="'.$uphoto.'" class="rounded-circle" width="40px"></td>
                                                <td>'.$row['name'].'</td>
                                                <td>'.$row['email'].'</td>
                                                <td>'.$row['phone'].'</td>
                                                <td>'.$row['gender'].'</td>
                                                <td>'.$row['verified'].'</td>
                                                <td>
                                                    <a href="#" id="'.$row['id'].'" title="View Details" class="text-primary userDetailsIcon" data-toggle="modal" data-target="#showUserDetailsModal"><i class="fas fa-info-circle fa-lg"></i></a>&nbsp;&nbsp;

                                                    <a href="#" id="'.$row['id'].'" title="Delete User" class="text-danger deleteUserIcon"><i class="fas fa-trash-alt fa-lg"></i></a>&nbsp;&nbsp;
                                                </td>
                                            </tr>';
                            }
                            $output .= '</tbody>
                                    </table>';
                            echo $output;   
        }
        else {
            echo '<h3 class="text-center text-secondary">:( No any user registered yet!</h3>';
        }
    }

    // Handle Display User In Details Ajax Request
    if (isset($_POST['details_id'])) {
        $id = $_POST['details_id'];

        $data = $admin->fetchUserDetailsByID($id);

        echo json_encode($data);
    }

    // Handle Delete an User Ajax Request
    if(isset($_POST['del_id'])){
        $id = $_POST['del_id'];
        $admin->userAction($id,0);
    }

    // Handle Fetch All Deleted User Ajax Request
    if(isset($_POST['action']) && $_POST['action'] == 'fetchAllDeletedUsers'){
        $output = '';
        $data = $admin->fetchAllUsers(1);
        $path = '../assets/php/';

        if($data){
            $output .= '<table class="table table-striped table-bordered text-center">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Image</th>
                                    <th>Name</th>
                                    <th>E-Mail</th>
                                    <th>Phone</th>
                                    <th>Gender</th>
                                    <th>Verified</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>';
                            foreach ($data as $row) {
                                if($row['photo'] != ''){
                                    $uphoto = $path.$row['photo'];
                                } else {
                                    $uphoto = '../assets/img/jadi.jpg';
                                }
                                $output .= '<tr>
                                                <td>'.$row['id'].'</td>
                                                <td><img src="'.$uphoto.'" class="rounded-circle" width="40px"></td>
                                                <td>'.$row['name'].'</td>
                                                <td>'.$row['email'].'</td>
                                                <td>'.$row['phone'].'</td>
                                                <td>'.$row['gender'].'</td>
                                                <td>'.$row['verified'].'</td>
                                                <td>
                                                    <a href="#" id="'.$row['id'].'" title="Restore User" class="text-white restoreUserIcon badge badge-dark p-2">Restore</a>
                                                </td>
                                            </tr>';
                            }
                            $output .= '</tbody>
                                    </table>';
                            echo $output;   
        }
        else {
            echo '<h3 class="text-center text-secondary">:( No any user deleted yet!</h3>';
        }
    }

    // Handle Restore Deleted User Ajax Request
    if(isset($_POST['res_id'])){
        $id = $_POST['res_id'];

        $admin->userAction($id,1);
    }

    // Handle Fetch All Notes Ajax Request
    if(isset($_POST['action']) && $_POST['action'] == 'fetchAllNotes'){
        $output = '';
        $note = $admin->fetchAllNotes();

        if($note){
            $output .= '<table class="table table-striped table-bordered text-center">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>User Name</th>
                                    <th>User E-Mail</th>
                                    <th>Note Title</th>
                                    <th>Note</th>
                                    <th>Written On</th>
                                    <th>Updated On</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>';
                            foreach ($note as $row) {
                                $output .= '<tr>
                                                <td>'.$row['id'].'</td>
                                                <td>'.$row['name'].'</td>
                                                <td>'.$row['email'].'</td>
                                                <td>'.$row['title'].'</td>
                                                <td>'.$row['note'].'</td>
                                                <td>'.$row['created_at'].'</td>
                                                <td>'.$row['updated_at'].'</td>
                                                <td>
                                                    <a href="#" id="'.$row['id'].'" title="Delete Note" class="text-danger deleteNoteIcon"><i class="fas fa-trash-alt fa-lg"></i></a>
                                                </td>
                                            </tr>';
                            }
                            $output .= '</tbody>
                                    </table>';
                            echo $output;   
        }
        else {
            echo '<h3 class="text-center text-secondary">:( No any note written yet!</h3>';
        }
    }

    // Handle Delete Note of An User Ajax Request
    if(isset($_POST['note_id'])){
        $id = $_POST['note_id'];

        $admin->deleteNoteOfUser($id);
    }

    // Handle Export All Users in Excel
    if(isset($_GET['export']) && $_GET['export'] == 'excel'){
        header("Content-Type: application/xls");
        header("Content-Disposition: attachment; filename=users.xls");
        header("Pragma: no-cache");
        header("Expires: 0");

        $data = $admin->exportAllUsers();
        echo '<table border="1" align=center>';

        echo '  <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th>E-Mail</th>
                    <th>Phone</th>
                    <th>Gender</th>
                    <th>DOB</th>
                    <th>Joined On</th>
                    <th>Verified</th>
                    <th>Deleted</th>
                </tr>';
            foreach ($data as $row) {
                echo '  <tr>
                            <td>'.$row['id'].'</td>
                            <td>'.$row['name'].'</td>
                            <td>'.$row['email'].'</td>
                            <td>'.$row['phone'].'</td>
                            <td>'.$row['gender'].'</td>
                            <td>'.$row['dob'].'</td>
                            <td>'.$row['created_at'].'</td>
                            <td>'.$row['verified'].'</td>
                            <td>'.$row['deleted'].'</td>
                        </tr>';
            } 
            echo '</table>';
        
    }
?>
