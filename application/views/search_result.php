<body>
<div class="container-fluid">
    <div class="row">
        <div class="col-3 pl-5 border-right">
            <? $this->load->view('templates/navs');?>
        </div>
        <div class="col-6 pl-0 pr-0" style="background-color: #FFCCCB;height:100vh;">
            <div class="bg-secondary position-fixed home-top w-100 border-bottom" style="height:50px; z-index:1;">
                <h4 class="mt-2 ml-2 font-weight-bold">Search Results</h4>
            </div>
            <div class="col mt-5 pt-1 pl-1 pr-1">
                <div class="card bg-secondary mt-3" >
                    <div class="card-header font-weight-bold text-primary">People
                    </div>
                </div>
                <div class="card bg-secondary mt-3" >
                    <div class="card-body font-weight-bold form-inline">
                        <img class="rounded-circle border mr-2" src="<? echo base_url();?>uploads/default.png" width="50" height="50"/>
                        <p class="mt-3">Ronil Cajan</p>
                    </div>
                </div>
                <div class="card bg-secondary mt-3" >
                    <div class="card-body font-weight-bold form-inline">
                        <img class="rounded-circle border mr-2" src="<? echo base_url();?>uploads/default.png" width="50" height="50"/>
                        <p class="mt-3">Ronil Cajan</p>
                    </div>
                </div>
                <div class="card bg-secondary mt-3" >
                    <div class="card-body font-weight-bold form-inline">
                        <img class="rounded-circle border mr-2" src="<? echo base_url();?>uploads/default.png" width="50" height="50"/>
                        <p class="mt-3">Ronil Cajan</p>
                    </div>
                </div>

                <div class="card bg-secondary mt-5" >
                    <div class="card-header font-weight-bold text-primary">Post
                    </div>
                </div>
            </div>
            
            <div class="col pt-3 pl-1 pr-1">

                <!-- <nav aria-label="Page navigation example">
                    <p><? echo $links;?></p>
                </nav> -->
            </div>
        </div>
        <div class="col-3 bg-light border-left" style="z-index:2;">
            <? $this->load->view('templates/sidebar');?>
        </div>
    </div>
</div>
<? $this->load->view('modals/shoutout'); ?>