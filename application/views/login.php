<body>
    <main class="h-100 mt-4">
        <div class="row w-75 m-auto main-card">

            <div class="col-md-6 p-0 right-card">
                <div class="card bg-secondary">
                    <form action="" method="POST">
                        <div class="card-body card-main login-container">
                                <div class="mt-3 form-group text-center">
                                    <a href="<? echo base_url();?>"><img src="<? echo base_url();?>images/logo.png" class="logo mb-2" width="50" height="40"></a>
                                    <h3 class="text-primary font-weight-bolder">Login to ShoutOut</h3>                        
                                </div>
                                <div class="form-group mt-5">
                                    <label class="col-form-label" for="inputDefault">Username</label>
                                    <input type="text" class="form-control username" name="username" placeholder="Enter Username" id="username" required>
                                </div>
                                <div class="form-group">
                                    <label class="col-form-label" for="inputDefault">Password</label>
                                    <input type="password" title="8 or more characters" class="form-control password" name="password" placeholder="Enter Password" id="password"  required>
                                </div>
                               
                                <div class="mt-3 text-center">
                                    <button class="btn btn-primary rounded-pill btn-lg w-75 login-btn mt-5">Sign in</button>
                                    
                                </div>
                                <div class="text-center mt-3">
                                    <small class="mt-5 text-muted font-italic">Need an Account?<a href="<? echo base_url();?>signup" class="btn-link">Create here</a></small>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            <div class="col-md-6 text-center left-card p-0">
                <div class="h-100 logo-container">
                    <img class="img-login img img-fluid" src="<? echo base_url();?>images/login.jpg"/>
                </div>
            </div>
        </div>
    </main>
</body>