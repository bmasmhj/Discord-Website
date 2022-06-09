<?php require 'header.php' ?>

  <div class="content">
    <div class="container-fluid">
      <?php require 'model/usercard.php'?>
        <div class="card">
          <div class="card-body bg-black text-white">
            <h3>Custom Prefix </h3>
            <hr>
            <form id="updateprefix">       
            <div class="d-flex p-2">   
                <div class="mb-3" style='flex-grow : 1;'>
                  <input type="text" class="form-control disabled"  id="prefix" value='<?php echo $guild_prefix?>' >
                  <div class="form-text">
                      Prefix
                  </div>
                </div>
                <div class="mb-3">
                  <button type="submit" class="btn btn-rounded btn-info">Update</button>
                </div>
            </div>
        </form>
          </div>
        </div>
      <div class="card bg-black text-white">
        <div class="card-body">
          <h3>Roles </h3>
          <hr>
          <div class="roles">
            <?php 
              $array['guild'] = get_guild($_SESSION['tokenforserver']);
              $roles = $array['guild']['roles'];
                $r = count($roles);
              for($i = 0; $i<$r ; $i++){
                echo '<div class="custom-badge mx-2 " > 
                        <span style="color:'.color($roles[$i]['color']).'" class="material-icons medium ">fiber_manual_record</span>
                        <span>'.$roles[$i]['name'].'</span>
                      ';
                      if (array_key_exists("tags",$roles[$i])){
                        if(array_key_exists("bot_id",$roles[$i]['tags'])){
                          echo " <span class='badge badge-primary m-1 text-white'> bot </span>";
                        }
                      }
                echo '</div>';   
              }


            ?>
          </div>
        </div>
       

        <div class="card-body">
            <h3>Users</h3>
            <hr>
            <div class="roles">
                <div class="row">
                <?php
                    $detail['member'] = get_users($_SESSION['tokenforserver']);
                    $cn = count($detail['member']);
                    for($j = 0 ; $j<$cn ; $j++){
                      if($detail['member'][$j]['user']['avatar'] == ''){
                        $img = "default_user.png";
                      }
                      else{
                        $img = 'https://cdn.discordapp.com/avatars/'.$detail['member'][$j]['user']['id'].'/'.$detail['member'][$j]['user']['avatar'];
                      }
                      echo '
                    <div class="col-md-2 col-6  " style="content-visibility:auto;">
                      <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-4">
                                    <img src="'.$img.'" class="rounded-circle" style="width:50px; height:50px" alt="">
                                </div>
                                <div class="col-8">
                                    <h6 class="m-0 p-0">'.$detail['member'][$j]['user']['username'].'#'.$detail['member'][$j]['user']['discriminator'].'</h6>';
                                    $ur = count($detail['member'][$j]['roles']);
                                    for($k = 0 ;$k<$ur ; $k++ ){
                                        echo role_name($_SESSION['tokenforserver'] , $detail['member'][$j]['roles'][$k]);
                                    }
                                    echo '
                                </div>
                            </div>
                        </div>
                      </div>
                    </div>';
                  } ?>
              </div>
            </div>
          </div>
      </div>
    </div>
  </div>
 <?php
  // print_r($detail['member'])
 ?>

<?php require 'footer.php' ?>

<script>
  $('#updateprefix').on('submit', function(e) {
        e.preventDefault();

      var prefix = $('#prefix').val();
      if(prefix !=''){
        if(prefix.length > 5 ){
          md.showNotification('top','center','warning',`Prefix can't be more than 5 wods`);

        }
        else{ 
          if(prefix == '"' || prefix ==  "'"){
            md.showNotification('top','center','warning',`You can't use ' or " as your prefix `);

          }else{
            // alert(prefix+cmnd_reply)
            $.ajax({
                url: "controller/add.php",
                method: 'POST',
                data:{
                  'prefix' : prefix,
                  'update_new_cmnd' : 'true'
                },
                success:function(data){
                  var result = $.trim(data);
                  if(result == 'success'){
                    md.showNotification('top','center','success','Prefix changed to '+prefix);
                  }else{
                    md.showNotification('top','center','danger',data);

                  }
                }
            }); 
          }
        }

      }


  })
</script>
