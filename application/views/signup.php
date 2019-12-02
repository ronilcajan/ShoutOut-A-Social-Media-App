<body>
    <main class="h-100 mt-4">
        <div class="row w-75 m-auto main-card">

            <div class="col-md-6 p-0 right-card">
                <div class="card bg-secondary">
                    <form action="" method="POST">
                        <div class="card-body card-main">
                                <div class="form-group text-center">
                                <a href="<? echo base_url();?>"><img src="<? echo base_url();?>images/logo.png" class="logo mb-2" width="50" height="40"></a>
                                    <h3 class="text-primary font-weight-bolder">Join to ShoutOut Today</h3>                        
                                </div>
                                <div class="form-group">
                                    <label class="col-form-label" for="inputDefault">Username</label>
                                    <input type="text" class="form-control username" name="username" placeholder="Enter Username" id="username" required>
                                </div>
                                <div class="form-group">
                                    <label class="col-form-label" for="inputDefault">Email Address</label>
                                    <input type="email" class="form-control email" name="email" placeholder="Enter Email" id="email"  required>
                                </div>
                                <div class="form-group">
                                    <label class="col-form-label" for="inputDefault">Password</label>
                                    <input type="password" pattern=".{8,}" title="8 or more characters" class="form-control password" name="password" placeholder="Enter Password" id="password"  required>
                                </div>
                                <div class="form-group">
                                    <label class="col-form-label" for="inputDefault">Confirm Password</label>
                                    <input type="password" class="form-control password1" name="password1" placeholder="Please Confirm Password" id="password1"  required>
                                </div>
                                
                                <div class="mt-5 form-group text-center">
                                    <button class="btn btn-primary rounded-pill btn-lg w-75 signup-btn">Get Started</button>
                                </div>
                                <div class="text-center">
                                <small class="text-muted font-italic">Already have an Account?<a href="<? echo base_url();?>login" class="btn-link"> Login here</a></small>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            <div class="col-md-6 text-center left-card p-0">
                <div class="h-100 logo-container">
                    <img class="img img-fluid" src="<? echo base_url();?>images/signup.jpg"/>
                </div>
            </div>
        </div>
    </main>

</body>