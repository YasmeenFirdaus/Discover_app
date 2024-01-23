<!-- SIDE NAVBAR -->
<div id="mySidenav" class="sidenav open">
        <div class="header">
            <div class="nav-profile">
                <h3>Discover</h3>
            </div>
            <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
        </div>
        
        <div class="list-section">
            <h4 class="list-header">Dashboard</h4>
        
            <div class="list-grp">
                <a href="" class="list-item active"><img src="{{ asset('admin/asset/svg/main.svg') }}" alt=""><span>Main</span></a>
                <a href="" class="list-item"><img src="{{ asset('admin/asset/svg/search.svg') }}" alt=""><span>Search</span></a>
            </div>
        </div>
        
        <div class="list-section">
            <h4 class="list-header">Pages</h4>
        
            <div class="accordion list-grp" id="accordion1">
                <div class="card">
                    <div class="card-header" id="headingOne">
                        <button class="btn btn-block text-left list-item active" type="button" data-toggle="collapse"
                            data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                            <img src="" alt=""><span>API</span>
                        </button>
                    </div>
        
                    <div id="collapseOne" class="collapse show" aria-labelledby="headingOne"
                        data-parent="#accordion1">
                        <div class="card-body">
                            <div class="dropdown-container">
                                <a href="{{ route('admin.addapi') }}">Add API</a>
                                <a href="{{ route('admin.apidata') }}">API Data</a>
                                <!-- <a href="">All Complaints</a>
                                <a href="">All Complaints</a> -->
                            </div>
                        </div>
                    </div>
                </div>
                
            
            </div>
        
        
        </div>

    </div>