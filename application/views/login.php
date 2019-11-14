<body>
    <header>
        <div class="nav-container">
            <div class="logo-container">
                <a class="navs" href="<? echo base_url();?>"><img class="logo-img" src="<? echo base_url();?>images/logo.png" width="40" height="30"/>Home</a>
                <a class="navs" href="<? echo base_url();?>about">About</a>
                </div>
            <nav>
                <a href="<? echo base_url();?>signup" class="nav-link">Signup</a>
            </nav>
        </div>
    </header>
    <main>

        <? if(isset($error_message)){ ?>
        <div class='alert alert-warning alert-dismissible fade show' role='alert'>
            <small><? echo $error_message; ?></small>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <? } ?>

        <div class="login-form-container">
            <h3 class="login-text">Log in to ShoutOut</h3>
            <form class="login-form" action="<? echo base_url();?>login-user" method="POST">
                <input type="text" class="form-control form-control-sm username" name="username" placeholder="Username" required/>
                <input type="password" class="form-control form-control-sm password" name="password" placeholder="Password" required/>
                <div class="btn-container">
                    <button type="submit" class="login-btn">Log in</button>
                </div>
            </form>
        </div>
        <div class="text-container">
            <p>New to ShoutOut? <a href="<? echo base_url();?>signup" >Sign up now »</a></p>
        </div>
    </main>

</body>