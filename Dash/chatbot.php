<?php require 'header.php' ?>

<div class="content">
    <div class="container-fluid">
        <div class="card bg-black text-white">
            <div class="card-body">
                <h3>Chatbot</h3>
                <form id='updatechatchanel'>
                <label for="">Chat Channel Id <a href='http://localhost/Sudo/Website/Tutorial?q=get-channel-id' title="Channel id of your server rules" ><i class='material-icons small text-info' >help_outline </i></a> </label>
                            <input id="guild_chatchannelId" name='guild_chatchannelId' required type="number" class="form-control mb-3" value="<?php echo $guild_chatchannelId ?>">
                            <div id="com_messsage"> </div>
                    <button type='submit' class='btn btn-rounded btn-success'>UPDATE</button>
                <form>
            </div>
        </div>
    </div>
</div>

 
<?php require 'footer.php' ?>
<script>
      $('#updatechatchanel').on('submit', function(e) {
        e.preventDefault();

      var guild_chatchannelId = $('#guild_chatchannelId').val();
     

      if(guild_chatchannelId !=''){
        // alert(cmnd_name+cmnd_reply)
        $.ajax({
            url: "controller/add.php",
            method: 'POST',
            data:{
              'guild_chatchannelId' : guild_chatchannelId,
              'update_guild_chatchannelId' : 'true'
            },
            success:function(data){
              var result = $.trim(data);
              if(result == 'success'){
              }else if(result == 'duplicate'){

              }else{
                alert(data)
              }
            }
        }); 

      }


  })
  customcmnd();
</script>