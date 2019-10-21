<body>
    <div class="main-container">
        <header>
            <? $this->load->view('templates/navs');?>
        </header>
        
        <main class="w-100">
            <div class="home position-fixed">
                <a href='<? echo base_url();?>home'><i class="fas fa-arrow-left"></i></a><p>Profile</p>
            </div>
            <div class="people-shout">
            </div> 
        </main>
    
        <div class="sidebar">
            <? $this->load->view('templates/sidebar');?>
        </div>
    </div>
</body>