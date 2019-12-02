<body>
<div class="container-fluid">
    <div class="row">
        <div class="col-3 pl-5 border-right">
            <? $this->load->view('templates/navs');?>
        </div>
        <div class="col-6 pl-0 pr-0" style="background-color: #FFCCCB;">
            <div class="bg-secondary position-fixed home-top w-100 border-bottom" style="height:50px; z-index:1;">
                <h4 class="mt-2 ml-2 font-weight-bold text-primary">Search Results</h4>
            </div>
            <div class="col mt-5 pt-1 pl-1 pr-1">
                <div class="card bg-secondary mt-3" >
                    <div class="card-header font-weight-bold text-primary">People
                    </div>
                </div>
                <? if(!empty($people)){?>
                <? foreach($people as $k => $person){?>
                <div class="card bg-secondary mt-3" >
                    <div class="card-body font-weight-bold form-inline">
                        <img class="rounded-circle border mr-2" src="<? echo base_url().'uploads/'.$person['image'];?>" width="50" height="50"/>
                        <a href="<? echo base_url().'username/'.$person['username'];?>">
                            <p class="mt-3"><? echo $person['name'];?></p>
                        </a>
                    </div>
                </div>
                <?}?>
                <?}else{?>
                    <h3 class="font-italic text-center mt-3 text-muted">----Not found-----</h3>
                <?}?>
                <div class="card bg-secondary mt-5" >
                    <div class="card-header font-weight-bold text-primary">Post
                    </div>
                </div>
                <? if(!empty($post)){?> 
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
                            <button class="col-md-6 border-0 bg-secondary text-primary" nclick="location.href='<? echo base_url().'shout/'.$posts['id'];?>'">Comments(<? echo $posts['comments'];?>)</button>
                                <?}?>
                        </div>
                    </div>
                </div>
                <?}?>
                <?}else{?>
                    <h3 class="font-italic text-center mt-3 text-muted">----Not found-----</h3>
                <?}?>
            </div>
            
            <div class="col pt-3 pl-1 pr-1">

                <nav aria-label="Page navigation example">
                    <p><? echo $links;?></p>
                </nav>
            </div>
        </div>
        <div class="col-3 bg-light border-left" style="z-index:2;">
            <? $this->load->view('templates/sidebar');?>
        </div>
    </div>
</div>
 <? $this->load->view('modals/edit_profile');?>