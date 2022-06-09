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

<script src="env.js"></script>
<script>
    const queryString = window.location.search;  
    const urlParams = new URLSearchParams(queryString);   
    console.log(urlParams.has('s'));
    var posts = document.getElementById('post');
    var postss = document.getElementById('posts');
    var pageids =  urlParams.get('s');

    // var accesstoken =`EAACJlEdEjp0BADQy2kHJp6IH6ZCWJaB4g7ludRRjgh8tkOAvb9bdxaE4XJfngxDvdtEABy5eixlhQW4FWGuRN6k2gbZBoeGuFeEfiGGTeyTK49hVew2B2Do4QYJ6mQYuhcuVmJX0qZCYoP31eIMARQdZATRTeMXGwiibK5jlDtXVCKKB3UiC` ;
    // var pageid = `102673297783575`;
    facebook();
    singlepost();
</script>
<script>


</script>