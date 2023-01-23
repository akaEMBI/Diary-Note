<?php 
    require_once 'session.php';

    //Handle Add New Note Ajax Request
    if(isset($_POST['action']) && $_POST['action'] == 'add_note'){
        $title = $cuser->test_input($_POST['title']);
        $note = $cuser->test_input($_POST['note']);

        $cuser->add_new_note($cid, $title, $note);
    }

    //Handle Display All Notes Of An User
    if(isset($_POST['action']) && $_POST['action'] == 'display_notes'){
        $output = '';

        $notes = $cuser->get_notes($cid);

        if($notes){
            $output .= '<table class="table table-striped  text-center">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Title</th> 
                    <th>Note</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>';
            foreach ($notes as $row) {
                $output .= '<tr>
                <td>'.$row['id'].'</td>
                <td>'.$row['title'].'</td>
                <td>'.substr($row['note'],0, 75).'...</td>
                <td>
                    <a href="#" id="'.$row['id'].'" title="View Details" class="text-success infoBtn">
                        <i class="fas fa-info-circle fa-lg"></i>&nbsp;
                    </a>
                    
                    <a href="#" id="'.$row['id'].'" title="Edit Note" class="text-primary editBtn">
                        <i class="fas fa-edit fa-lg" data-toggle="modal" data-target="#editNoteModal"></i>&nbsp;
                    </a>
                    
                    <a href="#" id="'.$row['id'].'" title="Delete Note" class="text-danger deleteBtn">
                        <i class="fas fa-trash-alt fa-lg"></i>
                    </a>
                </td> 
            </tr>';
            }
            $output .= '</tbody></table>';
            echo $output;
        }
        else{
            echo '<h3 class="text-center text-secondary">:( You have not written any note yet! Write your first note now!</h3>';
        }
    }

    //Handle Edit Note Of An User Ajax Request
    if(isset($_POST['edit_id'])){
        $id = $_POST['edit_id'];

        $row = $cuser->edit_note($id);
        echo json_encode($row);
    }

    //Handle Update Note of An User Ajax Request
    if(isset($_POST['action']) && $_POST['action'] == 'update_note'){
        $id = $cuser->test_input($_POST['id']);
        $title = $cuser->test_input($_POST['title']);
        $note = $cuser->test_input($_POST['note']);

        $cuser->update_note($id,$title,$note);
    }

    //Handle Delete a Note of An User Ajax Request
    if(isset($_POST['del_id'])){
        $id = $_POST['del_id'];

        $cuser->delete_note($id);
    }

    //Handle Display a Note of An User Ajax Request
    if(isset($_POST['info_id'])){
        $id = $_POST['info_id'];

        $row = $cuser->edit_note($id);

        echo json_encode($row);
    }

    //Handle Profile Update Ajax Request
    if(isset($_FILES['image'])){
        $name = $cuser->test_input($_POST['name']);
        $gender = $cuser->test_input($_POST['gender']);
        $dob = $cuser->test_input($_POST['dob']);
        $phone = $cuser->test_input($_POST['phone']);

        $oldImage = $_POST['oldimage'];
        $folder = 'uploads/';

        if(isset($_FILES['image']['name']) && ($_FILES['image']['name'] != "")){
            $newImage = $folder.$_FILES['image']['name'];
            move_uploaded_file($_FILES['image']['tmp_name'], $newImage);

            if($oldImage != null){
                unlink($oldImage);
            }
        }else{
            $newImage = $oldImage;
        }
        $cuser->update_profile($name, $gender, $dob, $phone, $newImage, $cid);
    }

    // Handle Change Password Ajax Request
    if(isset($_POST['action']) && $_POST['action'] == 'change_pass'){
        $currentPass = $_POST['curpass'];
        $newPass = $_POST['newpass'];
        $cnewPass = $_POST['cnewpass'];

        $hnewPass = password_hash($newPass, PASSWORD_DEFAULT);

        if($newPass != $cnewPass){
            echo $cuser->showMessage('danger','Password did not matched!');
        }
        else {
            if(password_verify($currentPass, $cpass)){
                $cuser->change_password($hnewPass,$cid);
                echo $cuser->showMessage('success','Password Changed Successfully!');
            } else {
                echo $cuser->showMessage('danger','Current Password is Wrong!');
            }
        }

    }
?>