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
            <div class="modal-body p-1">
                <div class="profile-info">
                    <form action="" method="POST" enctype="mutlipart/form-data">
                        <img class="img-fluid w-100 pt-1 cover" src="<? echo base_url().'uploads/'.$profile['cover'];?>"/>
                        
                        <img class="profile-pic rounded-circle" src="<? echo base_url().'uploads/'.$profile['image'];?>"/>
                        <div class="edit-btn"><label class="rounded-circle p-1">
                                Edit<input type="file" name="image" style="visibility:hidden;"/></label>
                        </div>
                        <div class="edit-cover"><label class="rounded-circle p-1">
                                Edit<input type="file" name="cover" style="visibility:hidden;"/></label>
                        </div>
                        <div class="modal-bio">
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
                                <textarea class="form-control" name="name"><? echo $profile['address'];?></textarea>
                            </div>
                            <div class="form-group">
                                <label>Birthday</label><br> 
                                <input type="date" class="form-control-sm" value="<? $time = strtotime($profile['birthdate']); echo date("Y-m-d",$time);?>"/>
                            </div>
                        </div> 
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button>
            </div>
            </form> 
        </div>
    </div>
</div>