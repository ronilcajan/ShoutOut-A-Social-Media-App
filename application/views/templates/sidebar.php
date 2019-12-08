<div class="row position-fixed">
    <div class="col-md-11 m-1">
        <form class="form-inline my-2 my-lg-0" action="<? echo base_url();?>search" method="POST">
            <input class="form-control mr-sm-2" type="text" name="search" placeholder="Search name..">
            <button class="btn btn-primary my-2 my-sm-0 rounded-pill " type="submit">Search</button>
        </form>
    </div>
    <div class="col-md-11 mt-3 m-1 ">
        <ul class="list-group shadow-sm">
            <li class="list-group-item d-flex justify-content-between align-items-center font-weight-bold">
                Most like post
            </li>
            <? foreach ($trending as $key => $trends) {
                if($trends['post'] != ""){?>
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                    <a href="<? echo base_url().'shout/'.$trends['id'];?>"><? echo substr($trends['post'], 0,20);?></a>
                    <span class="badge badge-primary badge-pill"><? echo $trends['likes'];?></span>
                    <?}?>
            </li>
            <? } ?>
            
        </ul>
    </div>
    <div class="col-md-11 mt-3 m-1">
        <ul class="list-group shadow-sm">
            <li class="list-group-item d-flex justify-content-between align-items-center font-weight-bold">
                New user
            </li>
            <?  foreach ($new_user as $key => $user) 
                    if(!empty($user['name'])){
            {?>
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    <a href="<? echo base_url().'username/'.$user['username'];?>"><? echo $user['name'];?></a>
                </li>
            <? } } ?>
            
        </ul>
    </div>
    <div class="col-md-12 text-center mt-5">
        <p class="text-muted">Copyright © 2019 ShoutOut</p>
    </div>
</div>