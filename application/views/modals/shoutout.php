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
                    <form action="<? echo base_url();?>post-submit" method="POST">
                        <div class="form-group">
                            <img class="logo-img rounded-circle border" src="<? echo base_url().'uploads/'.$profile['image'];?>" width="60" height="50"/>
                            <textarea placeholder="Shout here?" name='post' row="0" id="content" class="modal-shout"></textarea>
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