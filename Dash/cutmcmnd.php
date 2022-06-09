<?php require 'header.php' ?>

  <div class="content">
    <div class="container-fluid">
      <div class="card bg-black text-white">
        <div class="card-body">
          Custom Replies
          <br>
          <form id="addcustcmnd">       

          <div class="d-flex p-2">   
              <div class="mb-3 ">
                <input type="text" disabled class="form-control disabled" id="prefix" value="<?php echo $guild_prefix?>" >
                <div class="form-text">
                    Prefix
                </div>
              </div>
              <div class="mb-3">
                <input type="text" class="form-control" id="cmnd_name" placeholder="Facebook"  required>
                <div class="form-text">
                    Command Name
                </div>
              </div>
              <div class="mb-3 fgs">
                <input type="text" class="form-control" id="cmnd_reply" placeholder="https://www.facebook.com/bimash.maharjan"  required>
                <div class="form-text">
                    Replies
                </div>
              </div>
              <div class="mb-3">
                <button type="submit" class="btn btn-rounded btn-info">Add</button>
              </div>
          </div>
          </form>

        
        </div>
      </div>
      <div class="card bg-black text-white">
        <div class="card-body">
        <table class="table table-hover ">
          <thead>
            <tr>
    
              <th scope="col">Command</th>
              <th scope="col">Replies</th>
              <th scope="col">Action</th>
            </tr>
          </thead>
          <tbody id="customcmnd">
            
           
          </tbody>
        </table>
        </div>
      </div>

     
    </div>
  </div>
 

<?php require 'footer.php' ?>

<script>
  function customcmnd(){
    $.ajax({
        url: "tabledata.php",
        method: 'POST',
        data:{'custm_cmnd_data':'data'},
        success:function(data){
          $('#customcmnd').html(data);
        }
    }); 
  }
  function deletecmnds(id){
    if(confirm("Are you sure want to delete ?") == true){
      $.ajax({
        url: "controller/delete.php",
        method: 'POST',
        data:{'deletecstmcmnd': id },
        success:function(data){
          var result = $.trim(data);
          if(result == 'success'){
            // customcmnd();
            $('#cstcmnd_row_').html('');
            document.getElementById('cstcmnd_row_'+id).style.display= "none";
          }
        }
    }); 
    }
  }

  $('#addcustcmnd').on('submit', function(e) {
        e.preventDefault();

      var cmnd_name = $('#cmnd_name').val();
      var cmnd_reply = $('#cmnd_reply').val();

      if(cmnd_name !='' && cmnd_reply !='' ){
        // alert(cmnd_name+cmnd_reply)
        $.ajax({
            url: "controller/add.php",
            method: 'POST',
            data:{
              'cmnd_name' : cmnd_name,
              'cmnd_reply' : cmnd_reply,
              'add_new_cmnd' : 'true'
            },
            success:function(data){
              var result = $.trim(data);
              if(result == 'success'){
                $('#cmnd_name').val('');
                $('#cmnd_reply').val('');
                customcmnd();
              }else if(result == 'duplicate'){
                alert("Duplicate command");
              }else{
                alert(data)
              }
            }
        }); 

      }


  })
  customcmnd();
</script>