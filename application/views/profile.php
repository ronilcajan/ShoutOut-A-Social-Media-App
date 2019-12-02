<body>
<div class="container-fluid">
    <div class="row">
        <div class="col-3 pl-5 border-right nav-left">
            <? $this->load->view('templates/navs');?>
        </div>
    
        <div class="col-6 pl-0 pr-0 main" style="background-color: #FFCCCB;">
            <a href='<? echo base_url();?>home'>
            <div class="bg-secondary position-fixed home-top w-100 border-bottom" style="height:50px; z-index:1;">
                <h4><i class="fas fa-arrow-left"></i></h4>
            </div>
            </a>
            <div class="col p-0">
                <a data-target="#cover-modal" data-toggle="modal" title="Click to change cover photo" href="#cover-modal" >
                    <img class="img-fluid w-100 mt-5 h-75 cover" title="Click to change cover photo" src="<? echo base_url().'uploads/'.$profile['cover'];?>"/>
                </a>
                <a  data-target="#profile-modal" data-toggle="modal" id="profile-pic" href="#profile-modal" >
                    <img title="Click to change profile photo" class="profile-pic rounded-circle" src="<? echo base_url().'uploads/'.$profile['image'];?>"/>
                </a>
                <div class="card bg-secondary ml-1 mr-1">
                    <div class="card-header text-primary font-weight-bold">Personal Info
                    <button style="float:right;" class="btn btn-primary rounded-pill shadow" data-toggle="modal" data-target="#exampleModalLong">Edit Profile</button>

                    </div>
                    <div class="card-body">
                        <h4 class="card-title font-weight-bold"><? echo $profile['name'];?></h4>
                        <p class="card-text">Bio : <? echo $profile['bio'];?></p>
                        <p class="card-text">Location : <? echo $profile['address'];?></p>
                        <p class="card-text">Birthday : <? $time = strtotime($profile['birthdate']); echo date("M d, Y",$time);?></p>
                    </div>
                </div>
                <div class="col pl-1 pr-1">
                    <div class="card bg-secondary mt-2 shadow-sm">
                        <div class="card-header font-weight-bold text-primary">Create Post</div>
                        <div class="card-body">
                            <form action="" method="POST" id="post-form" enctype="multipart/form-data">
                            <div class="row">
                                <div class="col-md-2">
                                    <img src="<? echo base_url().'uploads/'.$profile['image'];?>" class="m-1 rounded-circle border" width="65" height="60"/>
                                </div>
                                <div class="col-md-8">
                                    <textarea class="form-control post" name="post" id="exampleTextarea" rows="3" placeholder="What's on your mind?"></textarea>
                                </div>
                                <div class="col-md-2" style="height:70px;">
                                    <label>
                                        <i class="fas fa-image text-primary" style="cursor:pointer; font-size:70px;"></i>
                                        <input type='file' name="shout-img" class="shout-img" style="visibility:hidden;"/>
                                    </label>
                                </div>
                            </div>
                            <div class="mt-3 text-right">
                                <button type="submit" id="shout-post" class="btn btn-primary pl-3 pr-3 rounded-pill">Post</button>
                            </div>
                            </form>
                        </div>
                    </div>
                </div>
                <? 
                if(!empty($post)){
                    $i = 1 ;
                foreach($post as $k => $posts){?>
                <div class="card bg-secondary mt-3 ml-1 mr-1">
                    <div class="card-header" style="height:75px">
                        <img class="rounded-circle border mr-2" src="<? echo base_url().'uploads/'.$posts['image']; ?>" width="50" height="50"/>
                        <a href="<? echo base_url().'username/'.$posts['user'];?>">
                            <span class=" font-weight-bold"><? echo $posts['name']; ?></span>
                        </a>
                        <div class="btn-group" role="group" aria-label="Button group with nested dropdown" style="float:right;">
                            <div class="btn-group" role="group">
                                <button id="btnGroupDrop1" type="button" class="btn btn-secondary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"></button>
                                <div class="dropdown-menu" aria-labelledby="btnGroupDrop1">
                                <a class="dropdown-item" href="#edit-modal<? echo $i; ?>"  data-target="#edit-modal<? echo $i; ?>" data-toggle="modal" >Edit</a>
                                <a class="dropdown-item" href="<? echo base_url().'delete-post/'.$posts['id'];?>">Delete</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <a href="<? echo base_url().'shout/'.$posts['id'];?>" id="body-post" style="text-decoration:none;">
                    <div class="card-body">
                        <p class="card-text"><? echo $posts['post'];?></p>
                        <? if(!empty($posts['post_image'])){?>
                            <div class="w-100 text-center">
                                <img class="border p-1 img img-fluid" src="<? echo base_url().'uploads/'.$posts['post_image']; ?>"/>
                            </div>
                        <? }?>
                        </a>
                        <div class="row w-100 bg-danger mt-3 ml-1">
                            <div class="col-md-6 pl-0 pr-0">
                                <form method="post" action="<? echo base_url().'claps/'.$posts['id'];?>">
                                    <input type="hidden" value="<? echo $_SERVER['PATH_INFO']; ?>" name="identifier"/>
                                    <? if($posts['claps'] == 0){?>
                                        <button class="col-md-12 border-0 bg-secondary claps" type="submit">Claps</button>
                                        <? }else{ ?>
                                        <button class="col-md-12 border-0 bg-secondary claps text-primary" type="submit">Claps(<? echo $posts['claps'];?>)</button>                                   
                                    <?}?>       
                                </form>
                            </div> 
                            <? if($posts['comments'] == 0){?>
                            <button class="col-md-6 border-0 bg-secondary">Comments</button>
                            <?}else{?>
                            <button class="col-md-6 border-0 bg-secondary text-primary">Comments(<? echo $posts['comments'];?>)</button>
                                <?}?>
                        </div>
                    </div>
                    <div class="card-footer">
                    <div class="row">
                            <div class="col-md-1">
                                <img class="mt-2 rounded-circle border-primary border" src="<? echo base_url().'uploads/'.$profile['image']; ?>" width="40" height="40"/>
                            </div>
                            <div class="col-md-9">
                                <form action="<? echo base_url().'comment/'.$posts['id'];?>" method="POST" class="w-100">
                                    <textarea class="form-control" id="exampleTextarea" name="comment" placeholder="Write something about the post."></textarea>
                                    <input type="hidden" value="<? echo $_SERVER['PATH_INFO']; ?>" name="identifier"/>                          
                            </div>
                            <div class="col-md-2">
                                <button type="submit" class="btn btn-primary mt-2 rounded-pill">Comment</button>
                            </div>
                            </form>
                        </div>
                    </div>
                </div>

                <!-- Modal for edit post -->
                    <div class="modal fade" id="edit-modal<? echo $i; ?>">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title font-weight-bold">Edit Post</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <form action="<? echo base_url().'edit-submit/'.$posts['id'];?>" method="POST" enctype="multipart/form-data" id="form-edit<? echo $i; ?>">
                                <? if(!empty($posts['post'])){?>
                                    <div class="form-group">
                                          <textarea class="form-control" id="post<? echo $i;?>" name='text-post'><? echo $posts['post'];?></textarea>
                                    </div>
                                <? } ?>
                                    <? if(!empty($posts['post_image'])){?>
                                        <div class="text-center w-100">
                                            <img class="border p-1 img img-fluid" src="<? echo base_url().'uploads/'.$posts['post_image']; ?>"/>
                                            <input type="file" class="btn btn-info" name="img-post">
                                        </div>

                                    <? }?>
                            </div>
                            <div class="modal-footer">
                                <button class="btn btn-primary" type="submit">Save changes</button>
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            </div>
                            </form>
                            </div>
                        </div>
                    </div>

                    <? ++$i; }
                    }else{
                    ?>
                    <div class="mt-5 w-100"><center><h5 class="text-muted font-italic font-weight-light">You don't have any shout.</h5></center></div>
                    <?}?>
                <nav aria-label="Page navigation example">
                    <p><? echo $links;?></p>
                </nav>
            </div>
        </div>
        <div class="col-3 bg-light border-left sidebar-right" style="z-index:2 ;">
            <? $this->load->view('templates/sidebar');?>
        </div>
    </div>
</div>
    <? $this->load->view('modals/edit_profile');?>
    
    