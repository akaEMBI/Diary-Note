<?php 
    require_once 'assets/php/header.php';
?>

    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <?php if($verified == 'Not Verified!'): ?>
                <div class="alert alert-danger alert-dismissible text-center mt-2 m-0">
                    <button class="close" type="button" data-dismiss="alert">&times;</button>
                    <strong>Your E-mail is not verified! We've sent you an E-mail Verification link on your E-mail, check & verify now!</strong>
                </div>
                <?php endif; ?>
                <h4 class="text-center text-primary mt-2">Write Your Notes Here & Access Anytime Anywhere!</h4>
            </div>
        </div>
        <div class="card border-primary">
            <h5 class="card-header bg-primary d-flex justify-content-between">
                <span class="text-light lead align-self-center">All Notes</span>
                <a href="#" class="btn btn-light" data-toggle="modal" data-target="#addNoteModal"><i class="fas fa-plus-circle fa-lg"></i>&nbsp;Add New Note</a>
            </h5>
            <div class="card-body">
                <div class="table-responsive" id="showNote">
                    <table class="table table-striped text-center">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Title</th> 
                                <th>Note</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>1</td>
                                <td>Web Design</td>
                                <td>Lorem ipsum dolor sit amet consectetur adipisicing elit. Sunt, similique.</td>
                                <td>
                                    <a href="#" title="View Details" class="text-success infoBtn">
                                        <i class="fas fa-info-circle fa-lg"></i>&nbsp;
                                    </a>
                                    
                                    <a href="#" title="Edit Note" class="text-primary editBtn">
                                        <i class="fas fa-edit fa-lg" data-toggle="modal" data-target="#editNoteModal"></i>&nbsp;
                                    </a>
                                    
                                    <a href="#" title="Delete Note" class="text-danger editBtn">
                                        <i class="fas fa-trash-alt fa-lg"></i>&nbsp;
                                    </a>
                                </td> 
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <!-- Add New Note Modal Start -->
    <div class="modal fade" id="addNoteModal">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header bg-success">
                    <h4 class="modal-title text-light">Add New Note</h4>
                    <button type="button" class="close text-light" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <form action="#" method="post" id="add-note-form" class="px-3">
                        <div class="form-group">
                            <input type="text" name="title" class="form-control form-control-lg" placeholder="Enter Title" required>
                        </div>
                        <div class="form-group">
                            <textarea name="note" class="form-control form-control-lg" placeholder="Write Your Note Here..." rows="6" required></textarea>
                        </div>
                        <div class="form-group">
                            <input type="submit" name="addNote" id="addNoteBtn" value="Add Note" class="btn btn-success btn-block btn-lg">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- Add New Note Modal End -->

    <!-- Add Edit Note Modal Start -->
    <div class="modal fade" id="editNoteModal">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header bg-info">
                    <h4 class="modal-title text-light">Edit Note</h4>
                    <button type="button" class="close text-light" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <form action="#" method="post" id="add-note-form" class="px-3">
                        <input type="hidden" name="id" id="id">
                        <div class="form-group">
                            <input type="text" name="title" id="title" class="form-control form-control-lg" placeholder="Enter Title" required>
                        </div>
                        <div class="form-group">
                            <textarea name="note" id="note" class="form-control form-control-lg" placeholder="Write Your Note Here..." rows="6" required></textarea>
                        </div>
                        <div class="form-group">
                            <input type="submit" name="editNote" id="editNoteBtn" id="addNoteBtn" value="Update Note" class="btn btn-info btn-block btn-lg">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- Add Edit Note Modal End -->

		<script
			src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"
			integrity="sha512-bnIvzh6FU75ZKxp0GXLH9bewza/OIw6dLVh9ICg0gogclmYGguQJWl8U30WpbsGTqbIiAwxTsbe76DErLq5EDQ=="
			crossorigin="anonymous"
			referrerpolicy="no-referrer"
		></script>
		<script
			src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.4.1/js/bootstrap.bundle.min.js"
			integrity="sha512-c4wThPPCMmu4xsVufJHokogA9X4ka58cy9cEYf5t147wSw0Zo43fwdTy/IC0k1oLxXcUlPvWZMnD8be61swW7g=="
			crossorigin="anonymous"
			referrerpolicy="no-referrer"
		></script>
		<script
			src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.1/js/all.min.js"
			integrity="sha512-xd+EFQjacRjTkapQNqqRNk8M/7kaek9rFqYMsbpEhTLdzq/3mgXXRXaz1u5rnYFH5mQ9cEZQjGFHFdrJX2CilA=="
			crossorigin="anonymous"
			referrerpolicy="no-referrer"
		></script>
		<script type="text/javascript" src="https://cdn.datatables.net/v/bs4/dt-1.10.20/datatables.min.js"></script>
        <script>
            $(document).ready(function(){
                $("table").DataTable();
            });
        </script>
	</body>
</html>
