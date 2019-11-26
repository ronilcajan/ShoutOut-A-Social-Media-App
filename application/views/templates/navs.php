
<ul class="nav flex-column w-25 position-fixed">
    <li class="nav-item">
        <a class=" nav-link navbar-brand" href="<? echo base_url();?>home">
            <h3 class="font-weight-bold">
                <img src="<? echo base_url();?>images/logo.png" class="logo mb-2" width="50" height="40"> 
                ShoutOut
            </h3>
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="<? echo base_url();?>profile">
            <img class="rounded-circle border ml-1 mr-2 border-primary" src="<? echo base_url().'uploads/'.$profile['image'];?>" class="m-2" width="40" height="40">
            Profile
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="#">
        <img class="rounded-circle border ml-1 mr-2 border-primary" src="<? echo base_url();?>images/settings.png" class="m-2" width="40" height="40">
        Settings</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="<? echo base_url();?>logout">
        <img class="rounded-circle border ml-1 mr-2 border-primary" src="<? echo base_url();?>images/logout.png" class="m-2" width="40" height="40">
        Logout</a>
    </li>
    
</ul>

