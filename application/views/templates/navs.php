<nav class="position-fixed">
    <ul class="nav-here mb-5">
        <li><img class="logo-image" src="<? echo base_url();?>images/logo.png" width="40" height="30"/></li>
        <li><a href="<? echo base_url();?>home"><i class="fas fa-home"></i>Home</a></li>
        <li><a href="<? echo base_url();?>profile">
            <img class='profile-img rounded-circle' src="<? echo base_url().'uploads/'.$profile['image'];?>" width="40" height="40"/>
            Profile         
            </a>
        </li>
        <li><button class="logout-btn" data-toggle="modal" data-target="#exampleModal"><i class="fas fa-outdent"></i>Logout</button></li>
    </ul>
    <button class="shout-btn" data-toggle="modal" data-target="#exampleModal1">Shout</button>
</nav>

<? $this->load->view('modals/logout');?>
<? $this->load->view('modals/shoutout');?>