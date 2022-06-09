<div class="card bg-black text-white">
    <div class="card-header">
        <h3>Server Details</h3>
        <hr>
    </div>
    <div class="card-body text-white">
        <div class="row">
        <div class="col-md-3">
            <div class="card">
            <div class="card-body">
                <div class="row">
                <div class="col-3">
                    <span class="material-icons big">people_alt</span>
                    </div>
                    <div class="col-9">
                    <h4 class="m-0 p-0">Total Users</h4> 
                    <span class="material-icons small text-info">fiber_manual_record</span> <?php echo count(get_users($_SESSION['tokenforserver'])); ?>
                </div>
                </div>
            </div>
            </div>
        </div>
        

        <div class="col-md-3">
            <div class="card">
            <div class="card-body">
                <div class="row">
                <div class="col-3">
                    <span class="material-icons big">person</span>
                    </div>
                    <div class="col-9">
                    <h4 class="m-0 p-0">Online Users</h4> 
                    <span class="material-icons small text-success">fiber_manual_record</span> <?php 
                    
                    $cnto =  onlineuser($_SESSION['tokenforserver']); 
                    if($cnto != false ){
                        echo $cnto;
                    }
                    else {
                        echo "<a href='' >Widget not Enabled <i class='material-icons small text-info' >help_outline </i></a> "; 
                    }
                    
                    ?>

                </div>
                </div>
            </div>
            </div>
        </div>

        <div class="col-md-3">
            <div class="card">
            <div class="card-body">
                <div class="row">
                <div class="col-3">
                    <span class="material-icons big">person_off</span>
                    </div>
                    <div class="col-9">
                    <h4 class="m-0 p-0">Offline Users</h4> 
                    <span class="material-icons small text-danger">fiber_manual_record</span> <?php 
                    
                    $cnt = offlineuser($_SESSION['tokenforserver']); 
                    if($cnt != false ){
                        echo $cnt;
                    }
                    else {
                        echo "<a href='' >Widget not Enabled <i class='material-icons small text-info' >help_outline </i></a> "; 
                    }
                    
                    ?>
                </div>
                </div>
            </div>
            </div>
        </div>

        <div class="col-md-3">
            <div class="card">
            <div class="card-body">
                <div class="row">
                <div class="col-3">
                    <span class="material-icons big">engineering</span>
                    </div>
                    <div class="col-9">
                    <h4 class="m-0 p-0">Total Bot</h4> 
                    <span class="material-icons small text-light">fiber_manual_record</span> <?php echo get_bot($_SESSION['tokenforserver'])?>
                </div>
                </div>
            </div>
            </div>
        </div>
        </div>
    </div>
</div>