<nav class="position-fixed">
    <ul class="nav-here mb-5">
        <li><img class="logo-image" src="<? echo base_url();?>images/logo.png" width="40" height="30"/></li>
        <li><a href="<? echo base_url();?>home"><i class="fas fa-home"></i>Home</a></li>
        <li><a href="<? echo base_url();?>profile">
            <img class='profile-img rounded-circle' src="<? echo base_url().'uploads/'.$profile['image'];?>" width="40" height="40"/>
            Profile         
            </a>
        </li>
        <li><button class="logout-btn" data-toggle="modal" data-target="#exampleModal"><i class="fas fa-outdent"></i>Logout</button></li>
    </ul>
    <button class="shout-btn" data-toggle="modal" data-target="#exampleModal1">Shout</button>
</nav>

<!-- Modal Logout -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Logout</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
            Are you sure you want to logout?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" onclick="location.href='<? echo base_url();?>logout'">Yes</button>
            </div>
        </div>
    </div>
</div>

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
                            <img class="logo-img" src="<? echo base_url().'uploads/'.$profile['image'];?>" width="70" height="50"/>
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