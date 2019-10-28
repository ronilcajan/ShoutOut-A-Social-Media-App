<!-- Modal Shoutout -->
<div class="modal fade" id="exampleModal1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">What is in your mind?</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="input-text">
                    <form action="<? echo base_url();?>post-submit" method="POST" enctype="multipart/form-data">
                        <div class="form-group">
                            <img class="logo-img rounded-circle border" src="<? echo base_url().'uploads/'.$profile['image'];?>" width="60" height="50"/>
                            <textarea placeholder="Shout here?" name='post' row="0" id="content" class="modal-shout"></textarea>
                            <input type="text" value="<? echo $_SERVER['PATH_INFO']; ?>" name="identifier" hidden=""/>
                        </div>
                        <div style="height:35px; width:35px;" class="mb-3">
                                <label class="pl-2 ml-5">
                                    <i class="fas fa-image" style="cursor:pointer; font-size:40px; color:#ec3e9b;"></i>
                                    <input type='file' name="shout-img" style="visibility:hidden;"/>
                                </label>
                        </div>
                </div>
            <div>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-danger">Shout</button>
            </div>
            </form>
        </div>
    </div>
</div>