<body>
    <div class="main-container">
        <header>
            <? $this->load->view('templates/navs');?>
        </header>
        <main class="w-100">
            <div class="home position-fixed">
                <p>Home</p>
            </div>
            <div class="content mb-4">
                <div class="input-text">
                    <form action="<? echo base_url();?>post-submit" method="POST" enctype="multipart/form-data">
                        <div class="form-group">
                            <img class="logo-img rounded-circle border mb-3 mr-1" src="<? echo base_url().'uploads/'.$profile['image']; ?>" width="55" height="50"/>
                            <textarea placeholder="Shout here?"  row="0" name="post" id="exampleTextarea" "></textarea>
                            <input type="hidden" value="<? echo $_SERVER['PATH_INFO']; ?>" name="identifier"/>
                        </div>
                        <div class="submit-btn pl-5 ml-3">
                            <div style="height:35px; width:35px;">
                                <label>
                                    <i class="fas fa-image" style="cursor:pointer; font-size:40px; color:#ec3e9b;"></i>
                                    <input type='file' name="shout-img" style="visibility:hidden;"/>
                                </label>
                            </div>
                            <div>
                                <button class="btn btn-danger" type="submit" id="submit-btn">Shout</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div> 
            <div class="people-shout">
                    <? foreach($post as $k => $posts){?>
                    <div class="user-post mt-5">
                        <div class="form-group">
                            <div class="user-details">
                                <img class="logo-img rounded-circle border mr-2" src="<? echo base_url().'uploads/'.$posts['image']; ?>" width="50" height="50"/>
                                <div class="namess">
                                    <h6 class="name-post"><? echo $posts['name']; ?></h6>
                                    <small class="text-muted">@<? echo $posts['username'];?>  <? $time = strtotime($posts['date']); echo date("M d, Y",$time);?></small>
                                </div>
                                <div class="dropdown">
                                    <button class="btn dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" area-haspopup="true" aria-expanded="false">
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
                            <? if($posts['post-image'] != ""){?>
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
                                    <input type="hidden" value="<? echo $_SERVER['PATH_INFO']; ?>" name="identifier"/>
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
                    <?}?>
            </div> 
        </main>
        
        <div class="sidebar">
            <? $this->load->view('templates/sidebar');?>
        </div>
    </div>
</body>