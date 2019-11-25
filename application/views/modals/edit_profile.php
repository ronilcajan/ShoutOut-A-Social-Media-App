<!-- Modal -->
<div class="modal fade" id="exampleModalLong" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title font-weight-bold" id="exampleModalLongTitle">Edit profile</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body p-3">
                    <form action="<? echo base_url();?>edit-profile" method="POST">
                            <div class="form-group">
                                <label>Name</label>
                                <textarea class="form-control" name="name" column="30"><? echo $profile['name'];?></textarea>
                            </div>
                            <div class="form-group">
                                <label>Bio</label>
                                <textarea class="form-control" name="bio"><? echo $profile['bio'];?></textarea>
                            </div>
                            <div class="form-group">
                                <label>Location</label>
                                <textarea class="form-control" name="address"><? echo $profile['address'];?></textarea>
                            </div>
                            <div class="form-group">
                                <label>Birthday</label><br> 
                                <input type="date" class="form-control-sm" name="born-date" value="<? $time = strtotime($profile['birthdate']); echo date("Y-m-d",$time);?>"/>
                            </div>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-primary">Save changes</button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
            </form> 
        </div>
    </div>
</div>


<div class="modal fade" id="profile-modal">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title font-weight-bold">Edit Profile Picture</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body text-center">
                <img class="mb-1 img img-fluid" src="<? echo base_url().'uploads/'.$profile['image'];?>"/>
                <form action="<? echo base_url();?>edit-profile" method="POST" enctype="multipart/form-data">
                    <input type="file" name="image" class="btn btn-info">
                
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-primary">Save changes</button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
            </form>
            </div>
        </div>
    </div>


    <div class="modal fade" id="cover-modal">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title font-weight-bold">Edit Cover Photo</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body text-center">
                <img class="mb-1 img img-fluid" src="<? echo base_url().'uploads/'.$profile['cover'];?>"/>
                <form action="<? echo base_url();?>edit-profile" method="POST" enctype="multipart/form-data">
                    <input type="file" name="cover" class="btn btn-info">
                
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-primary">Save changes</button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
            </form>
            </div>
        </div>
    </div>