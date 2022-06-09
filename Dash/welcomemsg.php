<?php require 'header.php' ?>

<div class="content">
    <div class="container-fluid">
        <div class="card bg-black text-white">
            <div class="card-body">
                <h3 class="d-inline">Welcome Message 
                </h3>
                <label class="m-0 mx-3 switch">
                    <input type="checkbox"  id="welcomeswithch" disabled <?php if($guild_defaultrole != '' && $guild_welcomechannel !='' && $guild_rulesid !='') { echo 'checked'; } ?>   >
                    <span class="slider round"></span>
                </label>  
                <hr>
                <p class="text-white m-0">Welcome <span class="bg-primary p-1  ">@Username</span>  to the server ! Be sure to check out our <span class="bg-primary p-1  ">#rules</span><p>
                <div class="row">
                    <div class="col-md-6">
                    <div class="card text-white m-0 p-3" style="background-image:url('https://i.imgur.com/zvWTUVu.jpg');">
                        <div style="background-color:#000000d9" class="text-center">
                            <h3>Welcome</h3>
                            <img src="default_user.png" alt="" style="width:125px">
                            <h3>User#0000</h3>
                            <h5>to the server</h5>
                        </div>
                    </div>
                    </div>
                    <div class="col-md-6">
                        <form action="" id="btnwelcomeroles">
                            <label for="">Welcome Channel Id <a href='http://localhost/Sudo/Website/Tutorial?q=get-channel-id' title='Channel id to welcome new users' ><i class='material-icons small text-info' >help_outline </i></a></label>
                            <input required type="number" id="welcomechannel" class="form-control mb-3" value="<?php echo $guild_welcomechannel?>">
                            <label for="">Default Role <a href='' title="Roles to give while user joins your server" ><i class='material-icons small text-info' >help_outline </i></a></label>
                            <select name="defaultrole" id="defaultrole" required class="form-control mb-3" style="background-color:#111524">

                                <?php 
                                    if($guild_defaultrole != '') {
                                    echo "<option value= '".$guild_defaultrole."'>".rolename($guild_defaultrole)."</option>";
                                    }else{
                                        echo "<option selected disabled value=''>Select Default Role</option>";
                                    }           
                                $array['guild'] = get_guild($_SESSION['tokenforserver']);
                                $roles = $array['guild']['roles'];
                                    $r = count($roles);
                                    for($i = 0; $i<$r ; $i++){
                                        if($roles[$i]['name']!='@everyone'){
                                            if($roles[$i]['id'] != $guild_defaultrole ){
                                                echo '<option value="'.$roles[$i]['id'].'">
                                                        '.$roles[$i]['name'].'
                                                    ';
                                                echo '</option>'; 
                                            }  
                                        }
                                    }
                                ?>
                            </select>
                            <label for="">Rules Channel Id <a href='http://localhost/Sudo/Website/Tutorial?q=get-channel-id' title="Channel id of your server rules" ><i class='material-icons small text-info' >help_outline </i></a> </label>
                            <input id="ruleguildid" required type="number" class="form-control mb-3" value="<?php echo $guild_rulesid ?>">
                            <div id="com_messsage">

                            </div>
                            <?php if($guild_defaultrole != '' && $guild_welcomechannel !='' && $guild_rulesid !='') {  $btn_name =  'Update';  }else{  $btn_name =  'Activate';  } ?>
                            <button  class="btn btn-rounded bg-success" type="submit" id="btn_name"><?php echo $btn_name?></button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="card bg-black text-white">
            <div class="card-body">
                <h3 class="d-inline">Need help ? </h3>
                <hr>
              <div class="row">
                  <div class="col-md-6">
                      <div class="card text-white">
                          <div class="card-body">
                                <h4>How to get Welcome Channel Id ?</h4>
                                <img src="demo.png" class="w-100" alt="">
                          </div>
                      </div>
                  </div>
                  <div class="col-md-6">
                      <div class="card text-white">
                          <div class="card-body">
                                <h4>How to get Rules Channel Id ?</h4>
                                <img src="demo.png" class="w-100" alt="">
                          </div>
                      </div>
                  </div>
              </div>
            </div>
        </div>
    </div>
</div>

 

<?php require 'footer.php' ?>

<script>
$('#btnwelcomeroles').on('submit', function(e) {
        e.preventDefault();

        var rol = $('#defaultrole option:selected').val();
        var wel = $('#welcomechannel').val();
        var rule = $('#ruleguildid').val();

        if(wel!='' && rol!='' && rule!='' ){
            // alert('ok');
            $.ajax({
            url: "controller/add.php",
            method: 'POST',
            data:{
              'rol' : rol,
              'wel' : wel,
              'rule' : rule,
              'update_welcome_data' : 'true'
            },
            success:function(data){
              var result = $.trim(data);
              if(result == 'success'){
                $('#com_messsage').html('<div class="alert alert-success" role="alert"> Updated Successful ! </div>');
                $('#welcomeswithch').attr("checked", "checked");
                $('#btn_name').html('Update');
                setTimeout(() => {
                $('#com_messsage').html('');
                    
                }, 1000);
              }else{
                alert(data)
              }
            }
        }); 
        }
        else{
            alert('no');
        }
        // alert(rol);

});
</script>