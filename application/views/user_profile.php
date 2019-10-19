<body>
    <div class="main-container">
        <header>
            <nav class="position-fixed">
                <ul class="nav-here mb-5">
                    <li><a href="<? echo base_url();?>#" class="ml-2"><img class="logo-img" src="<? echo base_url();?>images/logo.png" width="40" height="30"/></a></li>
                    <li><a href="<? echo base_url();?>home"><i class="fas fa-home"></i>Home</a></li>
                    <li><a href="<? echo base_url();?>profile"><i class="fas fa-user"></i>Profile</a></li>
                    <li><a href="<? echo base_url();?>logout"><i class="fas fa-outdent"></i>Logout</a></li>
                </ul>
                <a href="" class="shout-btn">Shout</a>
            </nav>
        </header>
        
        <main class="w-100">
            <div class="home position-fixed">
                <p>Home</p>
            </div>
            <div class="content mb-4">
                <div class="input-text">
                    <form action="" method="POST">
                        <div class="form-group">
                            <img class="logo-img" src="<? echo base_url();?>images/logo.png" width="70" height="50"/>
                            <textarea placeholder="Shout here?" row="0" id="content"></textarea>
                        </div>
                        <div class="submit-btn">
                            <div></div>
                            <div><button class="btn btn-danger" type="submit" id="submit-btn" disabled>Shout</button></div>
                        </div>
                    </form>
                </div>
            </div> 
            <div class="people-shout">
                    <p>content here</p>
            </div> 
        </main>
    
        <div class="sidebar">
            <div class="search position-fixed">
                <input type="text" class="search-input form-control form-control-md" placeholder="Search Shout"/>
            </div>
            <div class="trending">
                <ul class="list-group">
                    <li class="list-group-item disabled pb-1" aria-disabled="true"><h5 class="text-dark font-weight-bold">Trends</h5></li>
                    <li class="list-group-item">Dapibus ac facilisis in</li>
                    <li class="list-group-item">Morbi leo risus</li>
                    <li class="list-group-item">Porta ac consectetur ac</li>
                    <li class="list-group-item">Vestibulum at eros</li>
                </ul>
            </div>
            <div class="to-follow">
                <ul class="list-group">
                    <li class="list-group-item disabled pb-1" aria-disabled="true"><h5 class="text-dark font-weight-bold">Who to follow</h5></li>
                    <li class="list-group-item">Dapibus ac facilisis in</li>
                    <li class="list-group-item">Morbi leo risus</li>
                    <li class="list-group-item">Porta ac consectetur ac</li>
                    <li class="list-group-item">Vestibulum at eros</li>
                </ul>
            </div>
            <div class="extra-links">
                <ul class="links">
                    <li><small>© 2019 ShoutOut, Inc.</snmall></li>
                </ul>
            </div>
        </div>
    </div>
</body>