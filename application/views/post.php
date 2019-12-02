<body>
<div class="container-fluid">
    <div class="row">
        <div class="col-3 pl-5 border-right">
            <? $this->load->view('templates/navs');?>
        </div>
        <div class="col-6 pl-0 pr-0" style="background-color: #FFCCCB;">
            <div class="bg-secondary position-fixed home-top w-100 border-bottom" style="height:50px; z-index:1;">
                <h4 class="mt-2 ml-2 font-weight-bold text-primary">Post</h4>
            </div>
            <div class="col mt-5 pt-1 pl-1 pr-1">
                <? if(!empty($post)){?> 
                <? foreach($post as $k => $posts){?>
                    <div class="card bg-secondary mt-3" >
                    <div class="card-header" style="height:75px">
                        <img class="rounded-circle border mr-2" src="<? echo base_url().'uploads/'.$posts['image']; ?>" width="50" height="50"/>
                        <a href="<? echo base_url().'username/'.$posts['user'];?>">
                            <span class=" font-weight-bold"><? echo $posts['name']; ?></span>
                        </a>
                    </div>
                    <div class="card-body">
                        <p class="card-text"><? echo $posts['post'];?></p>
                        <? if(!empty($posts['post_image'])){?>
                            <div class="w-100 text-center">
                                <img class="img img-fluid border p-1" src="<? echo base_url().'uploads/'.$posts['post_image']; ?>"/>
                            </div>
                        <? }?>
                        <div class="row w-100 bg-danger mt-3 ml-1">
                            <div class="col-md-6 pl-0 pr-0">
                                <form method="post" action="<? echo base_url().'claps/'.$posts['id'];?>">                        
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
                            <button class="col-md-6 border-0 bg-secondary text-primary" onclick="location.href='<? echo base_url().'shout/'.$posts['id'];?>'">Comments(<? echo $posts['comments'];?>)</button>
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
                <?}?>
                <?}else{?>
                    <h3 class="font-italic text-center mt-3 text-muted">----Not found-----</h3>
                <?}?>
                <div class="card bg-secondary mt-3" >
                    <div class="card-header font-weight-bold text-primary">Comments
                    </div>
                </div>
                <? if(!empty($comments)){?>
                <? foreach($comments as $k => $comment){?>
                <div class="card bg-secondary mt-3 mb-2" >
                    <div class="card-header" style="height:75px">
                        <img class="rounded-circle border mr-2" src="<? echo base_url().'uploads/'.$comment['image']; ?>" width="50" height="50"/>
                        <a href="<? echo base_url().'username/'.$comment['username'];?>">
                            <span class=" font-weight-bold"><? echo $comment['name']; ?></span>
                        </a>
                    </div>
                    <div class="card-body font-weight-bold form-inline">
                        <p><? echo $comment['comments'];?></p>
                    </div>
                </div>
                <?}?>
                <?}else{?>
                    <h3 class="font-italic text-center mt-3 text-muted">----Not found-----</h3>
                <?}?>
            </div>
        </div>
        <div class="col-3 bg-light border-left" style="z-index:2;">
            <? $this->load->view('templates/sidebar');?>
        </div>
    </div>
</div>
 <? $this->load->view('modals/edit_profile');?>