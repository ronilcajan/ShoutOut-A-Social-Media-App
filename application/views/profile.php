<body>
    <div class="main-container">
        <header>
            <? $this->load->view('templates/navs');?>
        </header>
        
        <main class="w-100">
            <div class="home position-fixed">
                <a href='<? echo base_url();?>home'><i class="fas fa-arrow-left"></i></a><p>Profile</p>
            </div>
            <? if(isset($success)){ ?>
            <div class='alert alert-success alert-dismissible fade show' role='alert'>
                <small><? echo $error_message; ?></small>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        <? } ?>
            <div class="profile-info pb-2">
                <img class="img-fluid w-100 mt-5 pt-1 cover" src="<? echo base_url().'uploads/'.$profile['cover'];?>"/>
                <img class="profile-pic rounded-circle" src="<? echo base_url().'uploads/'.$profile['image'];?>"/>
                <div class="bio">
                    <p class="font-weight-bold mr-1"><? echo $profile['name'];?></p>
                    <p class="usr-txt">@<? echo $profile['username'];?></p>
                    <button class="mr-1" data-toggle="modal" data-target="#exampleModalLong">Edit Profile</button>
                </div>
                <div class="my-bio">
                    <table class="table-responsive w-100">
                        <tbody>
                            <tr>
                                <td><div style="width:0px;"><i class="fas fa-users text-danger"></i></div></td>
                                <td>Bio</td>
                                <td><? echo $profile['bio'];?></td>
                            </tr>
                            <tr>
                                <td><div style="width:0px;"><i class="fas fa-map-marker text-danger"></i></div></td>
                                <td>Location</td>
                                <td><? echo $profile['address'];?></td>
                            </tr>
                            <tr>
                                <td><div style="width:0px;"><i class="fas fa-calendar text-danger"></i></div></td>
                                <td>Born on</td>
                                <td><? $time = strtotime($profile['birthdate']); echo date("M d, Y",$time);?></td> 
                            </tr>
                        </tbody>
                    </table>
                </div> 
            </div>
            <div class="my-shout">
                <?if(!empty($post)){
                    foreach($post as $k => $posts){?>
                    <div class="user-post mt-5">
                        <div class="form-group">
                            <div class="user-details">
                                <img class="logo-img rounded-circle border mr-2" src="<? echo base_url().'uploads/'.$posts['image']; ?>" width="50" height="50"/>
                                <div class="namess">
                                    <h6 class="name-post"><? echo $posts['name']; ?></h6>
                                    <small class="text-muted">@<? echo $posts['username'];?>  <? $time = strtotime($posts['date']); echo date("M d, Y",$time);?></small>
                                </div>
                                <div class="dropdown">
                                    <button class="btn btn-light dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" area-haspopup="true" aria-expanded="false">
                                    </button>
                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                        <a class="dropdown-item" href="#">Edit</a>
                                        <a class="dropdown-item" href="#">Remove</a>
                                    </div>
                                </div>
                            </div>
                            <div class="post-content">
                                <p class="lead"><? echo $posts['post'];?></p>
                            </div>
                            <? if(!empty($posts['post-image'])){?>
                            <div class="w-100">
                                <img class="border p-1" src="<? echo base_url().'uploads/'.$posts['post-image']; ?>" height="300"/>
                            </div>
                            <? }?>
                            <div class='action'>
                                <form action="<? echo base_url().'like/'.$posts['id'];?>" method="POST" class="w-50">
                                    <? if($posts['like_post'] > 0){?>
                                    <input type='hidden' name="user" value="<? echo $this->session->userdata('username');?>" />
                                    <button type="submit" class="w-100 text-info"><i class="fas fa-hand-paper mr-2  "></i>Claps<small>(<? echo $posts['like_post'];?>)</small></button>
                                    
                                    <?}else{?>
                                    <input type='hidden' name="user" value="<? echo $this->session->userdata('username');?>" />
                                    <button type="submit" class="w-100"><i class="fas fa-hand-paper mr-2 "></i>Claps<small>(<? echo $posts['like_post'];?>)</small></button>
                                    <?}?>
                                </form>
                                <button class="w-50"><i class="fas fa-comment mr-2"></i>Comment</button>
                            </div>
                            <div class="comment">
                                <img class="profile-img rounded-circle mr-2" src="<? echo base_url().'uploads/'.$profile['image']; ?>" width="40" height="40"/>
                                <form action="<? echo base_url().'comment/'.$posts['id'];?>" method="POST" class="w-100">
                                    <input type="text" class="comment-box border-0" name="comment" placeholder="Comment here"/>
                                    <input type="hidden" value="<? echo $_SERVER['PATH_INFO']; ?>" name="identifier"/>                               
                                    <button type="submit" class="okay-btn">Okay</button>
                                </form>
                            </div>
                        </div>
                    </div>
                    <?}
                    }else{?>
                    <div class="mt-5 w-100"><center><h5 class="text-muted font-italic font-weight-light">You don't have any shout.</h5></center></div>
                        <?}?>
            </div> 
        </main>
    
        <div class="sidebar">
            <? $this->load->view('templates/sidebar');?>
        </div>
    </div>
    
    <? $this->load->view('modals/edit_profile');?>

</body>