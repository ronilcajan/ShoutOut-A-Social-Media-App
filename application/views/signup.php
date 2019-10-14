<body>
    <header>
        <div class="nav-container">
            <div class="logo-container">
                <a class="navs" href="<? echo base_url();?>"><img class="logo-img" src="<? echo base_url();?>images/logo.png" width="40" height="30"/>Home</a>
                <a class="navs" href="<? echo base_url();?>about">About</a>
                </div>
            <nav>
                <a href="<? echo base_url();?>login" class="nav-link">Log in</a>
            </nav>
        </div>
    </header>
    <main>
    
        <? if(isset($message_display)){ ?>
        <div class='alert alert-warning alert-dismissible fade show' role='alert'>
            <small><? echo $message_display; ?></small>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <? } ?>

        <div class="login-form-container">
            <h3 class="login-text">Sign up to ShoutOut</h3>
            <form class="login-form" action="<? echo base_url();?>signup-submit" method="POST">
                <input type="text" class="form-control form-control-sm username" id="username" name="username" placeholder="Username or email"/>
                <input type="password" pattern=".{8,}" title="8 or more characters" class="form-control form-control-sm password" id="password" name="password" placeholder="Password"/>
                <small class="text-muted font-italic">Password must contain 8 or more character.</small>
                <input type="password" class="form-control form-control-sm password mt-4" name="password1" placeholder="Confirm Password"/>
                <small class="text-muted font-italic">Please confirm your password.</small>
                <div class="btn-container">
                    <button type="submit" class="login-btn">Sign up</button>
                </div>
            </form>
        </div>
        <div class="text-container">
            <p>Already have an account? <a href="<? echo base_url();?>login" >Log in now »</a></p>
        </div>
    </main>

</body>