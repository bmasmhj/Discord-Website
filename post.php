<?php require 'header.php' ?>
<link rel="stylesheet" href="assets/css/facebook.css">

<div class="container-fluid mt-5 ">
    <section class="pt-5">
        <div class="container mb-5">
            <div class="row" id="posts">
               
            </div>
        </div>
    </section>
</div>

<div class="container-fluid mt-5">
    <section class="pt-5">
        <div class="container mb-5">
            <h2 class='text-white'>Other Posts</h2>

            <div class="row" id="post">
               
            </div>
        </div>
    </section>
</div>

  
<?php require 'footer.php' ?>

<script>
    const queryString = window.location.search;  
    const urlParams = new URLSearchParams(queryString);   
    console.log(urlParams.has('s'));
    var posts = document.getElementById('post');
    var postss = document.getElementById('posts');
    var accesstoken =`EAACJlEdEjp0BACIsQX2bAov5ABJSSzuMM4ifxyq91QIpGQSlzjadbYLKhduBzyQ4jt9XiF62tjyc9SxgPluy9tWZAgjbEyP301mb5JcbUjq2UCIgcLRgFWaXfsxYa0gRppZCLXNdR023MdoGIeqiiI5u6OgJAdfI4Yt5xnfw744Gj8amfX` ;
    var pageids =  urlParams.get('s');
    var pageid = `102673297783575`;
    facebook();
    singlepost();
</script>
<script>


</script>