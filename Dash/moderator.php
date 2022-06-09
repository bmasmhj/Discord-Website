<?php require 'header.php' ?>

<div class="content">
    <div class="container-fluid">
        <div class="card bg-black text-white">
            <div class="card-body">
                <h3 class="d-inline">Roll</h3> 
                <hr>
                <form action="controller/add.php" method='post'>
                    <div class="d-flex w-100 p-2">
                        <div class="mb-3 mx-2 p-2">
                            <label class=" mx-2">Default Role <a href='' title="Roles to give adter user is unmuted" ><i class='material-icons small text-info' >help_outline </i></a></label>
                        </div>
                        <select name="defaultrole" id="normalrole" required class="form-control mb-3" style="background-color:#111524">
                            <?php 
                            if($guild_rolenormal != '') {
                            echo "<option value= '".$guild_rolenormal."'>".rolename($guild_rolenormal)."</option>";
                            }else{
                                echo "<option selected disabled value=''>Select Default Role</option>";
                            }           
                            $array['guild'] = get_guild($_SESSION['tokenforserver']);
                            $roles = $array['guild']['roles'];
                                $r = count($roles);
                                for($i = 0; $i<$r ; $i++){
                                    if($roles[$i]['name']!='@everyone'){
                                        if($roles[$i]['id'] != $guild_rolenormal ){
                                            echo '<option value="'.$roles[$i]['id'].'">
                                                    '.$roles[$i]['name'].'
                                                ';
                                            echo '</option>'; 
                                        }  
                                    }
                                }
                            ?>
                        </select> 
                        <div class="mb-3 mx-2 p-2">
                        <label class="mx-2">|</label>
                            <label class=" mx-2">Mute Role <a href='' title="Roles to give while muting user" ><i class='material-icons small text-info' >help_outline </i></a></label>
                        </div>
                        <select name="defaultrole" id="muterole" required class="form-control mb-3" style="background-color:#111524">
                            <?php 
                            if($guild_rolemute != '') {
                            echo "<option value= '".$guild_rolemute."'>".rolename($guild_rolemute)."</option>";
                            }else{
                                echo "<option selected disabled value=''>Select Mute Role</option>";
                            }           
                            $array['guild'] = get_guild($_SESSION['tokenforserver']);
                            $roles = $array['guild']['roles'];
                                $r = count($roles);
                                for($i = 0; $i<$r ; $i++){
                                    if($roles[$i]['name']!='@everyone'){
                                        if($roles[$i]['id'] != $guild_rolemute ){
                                            echo '<option value="'.$roles[$i]['id'].'">
                                                    '.$roles[$i]['name'].'
                                                ';
                                            echo '</option>'; 
                                        }  
                                    }
                                }
                            ?>
                        </select>       
                    </div>
                </form>
            </div>
        </div>
        <div class="card bg-black text-white">
            <div class="card-body">
            <h3 class="d-inline">Spam Level</h3> 
            <label class="m-0 mx-3 switch">
                    <input type="checkbox"  id="welcomeswithch" disabled <?php if($spam_lmt != '0' && $spam_time !='0' && $guild_rolemute != '' && $spam_diff !='0') { echo 'checked'; } ?>   >
                    <span class="slider round"></span>
                </label>  
            <hr>

            <form action="controller/add.php" method='post'>
                <div class="d-flex w-100 p-2">
                <div class="mb-3 mx-2 p-2">
                    <label class="mx-2" >Max Words :</label>
                </div>
                <div class="mb-3 text-center">
                    <input type="number" name='spmlmt' class="form-control " id="limit" value="<?php echo $spam_lmt?>" >
                    <div class="form-text">
                       ( spam word limit )
                    </div>
                </div>
                <div class="mb-3  p-2">
                    <label class="mx-2" >Times</label>
                    <label class="mx-2">|</label>
                    <label class="mx-2" >Mute for</label>
                </div>
                <div class="mb-3 text-center">
                    <div id='duration' class="d-flex " style='height:33px'>
                        <input id='h' name='h' type='number' min='0' class='form-control d-inline' value='<?php echo $spamhr?>'>
                        <label class='p-2'for='h'>h</label>
                        <input id='m' name='m' type='number' min='0' class='form-control d-inline' max='59' value='<?php echo $spamin?>'>
                        <label class='p-2'for='m'>m</label>
                        <input id='s' name='s' type='number' min='0' class='form-control d-inline' max='59' value='<?php echo $spamsec?>'>
                        <label class='p-2'for='s'>s</label>
                    </div>                    
                    <div class="form-text">
                        ( Mute time )
                    </div>
                </div>
                <div class="mb-3 mx-2 p-2">
                    <label class="mx-2" >Second</label>
                    <label class="mx-2">|</label>
                    <label class="mx-2" >Reset Interval :</label>
                </div>
                <div class="mb-3 text-center">
                    <input type="number" name='intervl' class="form-control " min='1' id="diff" value="<?php echo $spam_diff/1000?>" >
                    <div class="form-text">
                         ( Spam message refresh time)
                    </div>
                </div>
                <div class="mb-3 mx-2 p-2">
                    <label class="mx-2" >Second</label>
                </div>
                <div class="mb-3">
                <button type="submit" name='updatespamlvl' class="btn btn-rounded btn-info">Update</button>
              </div>
                </div>
            </form>
            </div>
        </div>
        <div class="card bg-black text-white">
            <div class="card-body">
            <h3 class="d-inline">Bad word Moderation</h3> 
            <label class="m-0 mx-3 switch">
                    <input type="checkbox"  id="welcomeswithch" disabled <?php if($guild_rolemute != '' && $mute_time !='0' && $mute_action  !='' ) { echo 'checked'; } ?>   >
                    <span class="slider round"></span>
                </label>  
            <hr>
            <form action="controller/add.php" method='post'>
                <div class="d-flex w-100 p-2">
                    <div class="mb-3 mx-2 p-2">
                        <label class="mx-2" >Limit :</label>
                    </div>
                    <div class="mb-3 text-center">
                        <input type="number" name='lmt' class="form-control " id="limit" value="<?php echo $mute_lmt?>" >
                        <div class="form-text">
                        ( Limit of user's vulnerability )
                        </div>
                    </div>
                    <div class="mb-3  p-2">
                        <label class="mx-2" >Times</label>
                        <label class="mx-2">|</label>
                        <label class="mx-2" >Mute for</label>
                    </div>
                    <div class="mb-3 text-center">
                        <div id='duration' class="d-flex " style='height:33px'>
                            <input id='h' name='h' type='number' min='0' class='form-control d-inline' value='<?php echo $spamhr?>'>
                            <label class='p-2'for='h'>h</label>
                            <input id='m' name='m' type='number' min='0' class='form-control d-inline' max='59' value='<?php echo $spamin?>'>
                            <label class='p-2'for='m'>m</label>
                            <input id='s' name='s' type='number' min='0' class='form-control d-inline' max='59' value='<?php echo $spamsec?>'>
                            <label class='p-2'for='s'>s</label>
                        </div>                    
                        <div class="form-text">
                            ( Mute time )
                        </div>
                    </div>
                    <div class="mb-3 mx-2 p-2">
                        <label class="mx-2" >Second</label>
                        <label class="mx-2" > | </label>

                    </div>
                    <div class="mb-3 text-center">
                    <select name="action" required class="form-control" id="" style="background-color:#111524">
                        <option selected disabled value="">Choose what to do after</option>
                            <option value="ban" <?php if($mute_action == 'ban') {echo 'selected';} ?>>Ban</option>
                            <option value="kick" <?php if($mute_action == 'kick') {echo 'selected';} ?>>Kick</option>
                        </select>
                        <div class="form-text">
                            ( What to do after )
                        </div>
                    </div>
                    <div class="mb-3 mx-2 p-2">
                        <label class="mx-2" >User after Limit reached</label>
                    </div>
                    <div class="mb-3">
                        <button type="submit" name='updatemoderatelvl' class="btn btn-rounded btn-info">Update</button>
                    </div>
                </div>
            </form>
            </div>
        </div>
    </div>
</div>


 

<?php require 'footer.php' ?>

<script>
    $('#normalrole').change(function(){
        var rol = $('#normalrole option:selected').val();
        var rolname = $('#normalrole option:selected').text();

        $.ajax({
            url: "controller/add.php",
            method: 'POST',
            data:{
              'rol' : rol,
              'update_normal_role' : 'true'
            },
            success:function(data){
              var result = $.trim(data);
              if(result == 'success'){

                    md.showNotification('top','center','success',`Default Role is set to ${rolname}`);
                    
              }else{
                 md.showNotification('top','center','danger',data);

              }
            }
        }); 
    })
    $('#muterole').change(function(){
        var rol = $('#muterole option:selected').val();
        var rolname = $('#muterole option:selected').text();

        $.ajax({
            url: "controller/add.php",
            method: 'POST',
            data:{
              'rol' : rol,
              'update_mute_role' : 'true'
            },
            success:function(data){
              var result = $.trim(data);
              if(result == 'success'){
                    md.showNotification('top','center','success',`Mute Role is set to ${rolname}`);


              }else{
                md.showNotification('top','center','danger',data);

              }
            }
        }); 
    })
</script>