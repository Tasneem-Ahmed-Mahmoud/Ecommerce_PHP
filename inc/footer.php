




<footer>

<div class="container-fluid mt-3 bg-dark  p-5 mt-5 text-white">
  <div class="container">
  <div class="row">
<div class="col-md-3">
<h4 class="text-white">E-shop</h4>
<div class="underline  mb-3"></div>
<div class="links d-flex flex-column">
    <a href="index.php" class="text-white py-1"><i class="fa fa-angle-right"></i>HOME</a>
    <a href="index.php" class="text-white py-1" ><i class="fa fa-angle-right"></i>About Us</a>
    <a href="cart.php" class="text-white py-1"><i class="fa fa-angle-right"></i>Cart</a>
    <a href="categories.php" class="text-white py-1"><i class="fa fa-angle-right"></i>Collections</a>

</div>
 
</div>
<!-- end -->
<!-- start -->
<div class="col-md-4 d-flex flex-column">
<h4>Address</h4>
<p>#24, Ground floor,
    2nd, street ,xyz layout,
    Bangalour, india.

</p>
<a href="tel:+2001150220667" class="text-white"> <i class="fa fa-phone pe-1"></i>+2001150220667</a>
<a href="mailto:tasneemamed199@gmail.com" class="text-white"> <i class="fa fa-envelope pe-1"></i>tasneemamed199@gmail.com</a>
</div>
<!-- end -->
<!-- start -->
<div class="col-md-5">
<iframe src="https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d59916914.594598025!2d14.972916586005798!3d23.567069892763552!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1sar!2seg!4v1683161269921!5m2!1sar!2seg" class="w-100 h-100" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
</div>

<!-- end -->
    </div>
  </div>
</div>
<div class="py-2 bg-danger">

<div class="text-center">
    <p class="mb-0 text-white">@ All Right Reseved.Ahmed @ AlBash <?php echo date('Y')?></p>
</div>
</div>
</footer>


<!-- JavaScript  alertfy-->
<script src="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/alertify.min.js"></script>

<script>
<?php  if(isset($_SESSION['message'])):?>

alertify.set('notifier','position', 'top-right');
 alertify.success("<?=  $_SESSION['message']?>");
 <?php endif;  unset($_SESSION['message'])?>
</script>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>


<!-- <script src="jquery.min.js"></script> -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.4/jquery.min.js" integrity="sha512-pumBsjNRGGqkPzKHndZMaAG+bir374sORyzM3uulLV14lN5LyykqNk8eEeUlUkB3U0M4FApyaHraT65ihJhDpQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>



<script src="https://code.jquery.com/jquery-3.6.4.js" integrity="sha256-a9jBBRygX1Bh5lt8GZjXDzyOB+bWve9EiO7tROUtj/E=" crossorigin="anonymous"></script>

<script src="../../assets/js/owl.carousel.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js" integrity="sha512-bPs7Ae6pVvhOSiIcyUClR7/q2OAsRiovw4vAkX+zJbw3ShAeeqezq50RIIcIURq7Oa20rW2n2q+fyXBNcU9lrw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script src="../../assets/js/main.js"></script>
<script src="../../assets/js/index.js"></script>
</body>
</html>
