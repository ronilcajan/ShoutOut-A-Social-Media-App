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
                    <form action="<? echo base_url();?>post-submit" method="POST">
                        <div class="form-group">
                            <img class="logo-img rounded-circle border mb-3 mr-1" src="<? echo base_url().'uploads/'.$profile['image']; ?>" width="55" height="50"/>
                            <textarea placeholder="Shout here?" row="0" name="post"></textarea>
                        </div>
                        <div class="submit-btn">
                            <div></div>
                            <div><button class="btn btn-danger" type="submit" id="submit-btn">Shout</button></div>
                        </div>
                    </form>
                </div>
            </div> 
            <div class="people-shout">
                    <? foreach($post as $k => $posts){?>
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
                            <div class="comment">
                                <img class="profile-img rounded-circle mr-2" src="<? echo base_url().'uploads/'.$profile['image']; ?>" width="40" height="40"/>
                                <form action="" method="POST" class="w-100">
                                    <input type="text" class="comment-box border-0" name="comment" placeholder="Comment here"/>
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