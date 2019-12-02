
<ul class="nav flex-column w-25 position-fixed" id="left">
    <li class="nav-item">
        <a class=" nav-link navbar-brand" href="<? echo base_url();?>home">
            <h3 class="font-weight-bold">
                <img src="<? echo base_url();?>images/logo.png" class="logo mb-2" width="50" height="40" title="Home"> 
                <span class="prof-text">ShoutOut</span>
            </h3>
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="<? echo base_url();?>profile">
            <img class="rounded-circle border ml-1 mr-2 border-primary" src="<? echo base_url().'uploads/'.$profile['image'];?>" class="m-2" width="40" height="40" title="Profile">
            <span class="prof-text">Profile</span>
        </a>
    </li>
    <li class="nav-item dropdown">
 
        <a class="nav-link dropdown-toggle" id="dropdownMenuLink" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        <img class="rounded-circle border ml-1 mr-2 border-primary" src="<? echo base_url();?>images/settings.png" class="m-2" width="40" height="40" title="Settings">
        <span class="prof-text">Settings</span></a>
         <div class="dropdown-menu" aria-labelledby="dropdownMenuLink" style="z-index: 3">
            <a class="dropdown-item" href="#change-password" data-target="#change-password" data-toggle="modal" >Change Password</a>
        </div>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="<? echo base_url();?>logout">
        <img class="rounded-circle border ml-1 mr-2 border-primary" src="<? echo base_url();?>images/logout.png" class="m-2" width="40" height="40" title="Logout">
        <span class="prof-text">Logout</span></a>
    </li>
    
</ul>

