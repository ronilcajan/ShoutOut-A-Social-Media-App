<body>
    <div class="main-container">
        <header>
            <? $this->load->view('templates/navs');?>
        </header>
        
        <main class="w-100">
            <div class="home position-fixed">
                <a href='<? echo base_url();?>home'><i class="fas fa-arrow-left"></i></a><p>Profile</p>
            </div>
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
                                <td><i class="fas fa-comments mr-1"></i>Bio</td>
                                <td><? echo $profile['bio'];?></td>
                            </tr>
                            <tr>
                                <td><i class="fas fa-map-marker mr-1"></i>Location</td>
                                <td><? echo $profile['address'];?></td>
                            </tr>
                            <tr>
                                <td><i class="fas fa-calendar mr-1"></i>Born on</td>
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
                            <img class="logo-img ml-4 mr-3 rounded-circle border " src="<? echo base_url().'uploads/'.$posts['image']; ?>" width="50" height="50"/>
                            <h6 class="name-post"><? echo $posts['name']; ?></h6><small class="mb-2 ml-1 text-muted">@<? echo $posts['username'];?>  <? $time = strtotime($posts['date']); echo date("M d, Y",$time);?></small>
                            <div class="post-content">
                                <p><? echo $posts['post'];?></p>
                            </div>
                            <div class='action'>
                                <button class="w-50"><i class="fas fa-thumbs-up mr-2"></i>Like</button>
                                <button class="w-50"><i class="fas fa-comment mr-2"></i>Comment</button>
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