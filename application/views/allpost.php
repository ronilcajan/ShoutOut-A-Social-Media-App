<body>
<div class="container-fluid">
    <div class="row">
        <div class="col-3 pl-5 border-right nav-left">
            <? $this->load->view('templates/navs');?>
        </div>
        <div class="col-6 pl-0 pr-0 main" style="background-color: #FFCCCB;">
            <div class="bg-secondary position-fixed home-top w-100 border-bottom" style="height:50px; z-index:1;">
                <h4><i class="fas fa-home"></i></h4>
            </div>
            <div class="col mt-5 pt-1 pl-1 pr-1">
                <div class="card bg-secondary mt-2 shadow-sm">
                    <div class="card-header font-weight-bold text-primary">Create Post</div>
                    <div class="card-body">
                        <form action="" method="POST" id="post-form" enctype="multipart/form-data">
                        <div class="row">
                            <div class="col-md-2">
                                <img src="<? echo base_url().'uploads/'.$profile['image'];?>" class="m-1 rounded-circle border" width="65" height="60"/>
                            </div>
                            <div class="col-md-8">
                                <textarea class="form-control post" name="post" id="exampleTextarea1" rows="3" placeholder="What's on your mind?"></textarea>
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
            <div class="col pl-1 pr-1">
                <div class="card bg-secondary mt-2 shadow-sm">
                    <div class="card-header font-weight-bold text-primary">People you may know</div>
                    <div class="card-body">
                        <div class="row">
                            <? foreach($people as $k => $person){?>
                            <a href="<? echo base_url().'username/'.$person['username'];?>" >
                            <img src="<? echo base_url().'/uploads/'.$person['image'];?>" class="img rounded img-people ml-3" width="140" height="200" title="<? echo $person['name'];?>"/>
                            </a>
                            <?}?>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col pt-3 pl-1 pr-1">
            <? foreach($post as $k => $posts){?>
                <div class="card bg-secondary mt-3" >
                    <div class="card-header" style="height:75px">
                        <img class="rounded-circle border mr-2" src="<? echo base_url().'uploads/'.$posts['image']; ?>" width="50" height="50"/>
                        <a href="<? echo base_url().'username/'.$posts['user'];?>">
                            <span class=" font-weight-bold"><? echo $posts['name']; ?></span>
                        </a>
                    </div>
                    <a href="<? echo base_url().'shout/'.$posts['id'];?>" id="body-post" style="text-decoration:none;">
                    <div class="card-body">
                        <p class="card-text"><? echo $posts['post'];?></p>
                        <? if(!empty($posts['post_image'])){?>
                            <div class="w-100 text-center">
                                <img class="img img-fluid border p-1" src="<? echo base_url().'uploads/'.$posts['post_image']; ?>"/>
                            </div>
                        <? }?>

                    </a>
                        <div class="row w-100 bg-danger mt-3 ml-1">
                            <div class="col-md-6 pl-0 pr-0">                 
                                <? if(!is_null($posts['l'])){?>
                                    <button class="col-md-12 border-0 bg-secondary claps text-primary" type="submit">Like</button>
                                <? }else{ ?>
                                    <form method="post" action="<? echo base_url().'claps/'.$posts['id'];?>">
                                        <button class="col-md-12 border-0 bg-secondary claps " type="submit">Like</button>     
                                    </form>                              
                                <?}?>
                            </div>
                            <? if($posts['comments'] == 0){?>
                            <button class="col-md-6 border-0 bg-secondary">Comments</button>
                            <?}else{?>
                            <button class="col-md-6 border-0 bg-secondary text-primary" onclick="location.href='<? echo base_url().'shout/'.$posts['id'];?>'">Comments(<? echo $posts['comments'];?>)</button>
                                <?}?>
                            </div>
                            <div>
                                <?  if(!is_null($posts['l'])){
                                        if($posts['claps'] == 1){ ?> 
                                            <p class="text-muted">You liked the post..</p>
                                    <?} else { ?>
                                            <p class="text-muted">You and <? echo $posts['claps'] - 1;?> others liked the post..</p>
                                        <? }} ?>
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
                <?}?>
                <nav aria-label="Page navigation example">
                    <p><? echo $links;?></p>
                </nav>
            </div>
        </div>
        <div class="col-3 bg-light border-left sidebar-right" style="z-index:2;">
            <? $this->load->view('templates/sidebar');?>
        </div>
    </div>
</div>
<? $this->load->view('modals/shoutout'); ?>
 <? $this->load->view('modals/edit_profile');?>