<!-- Modal comment -->
<div class="modal fade" id="exampleModal2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                        <textarea placeholder="Comment here..."></textare>
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