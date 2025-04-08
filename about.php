<?php

include 'components/connect.php';

session_start();

if(isset($_SESSION['user_id'])){
   $user_id = $_SESSION['user_id'];
}else{
   $user_id = '';
};

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>about</title>

   <link rel="stylesheet" href="https://unpkg.com/swiper@8/swiper-bundle.min.css" />
   
   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">

   <!-- custom css file link  -->
   <link rel="stylesheet" href="css/style.css">

</head>
<body>
   
<?php include 'components/user_header.php'; ?>

<section class="about">

   <div class="row">

      <div class="image">
         <img src="uploaded_img/about-img.svg" alt="">
      </div>

      <div class="content">
         <h3>why choose us?</h3>
         <p>Our custom-built solutions are designed to align perfectly with your brand and business goals, ensuring a seamless, user-friendly experience across all devices. We leverage cutting-edge technology to create scalable, high-performance platforms that integrate smoothly with third-party services and prioritize security and compliance. With a commitment to ongoing maintenance and comprehensive support, we ensure your application remains reliable and up-to-date.</p>
         <a href="contact.php" class="btn">contact us</a>
      </div>

   </div>

</section>

<section class="reviews">
   
   <h1 class="heading">customers reviews</h1>

   <div class="swiper reviews-slider">

   <div class="swiper-wrapper">

      <div class="swiper-slide slide">
         <img src="uploaded_img/pic-1.png" alt="">
         <p>
         "I'm extremely satisfied with the e-commerce platform they built for us. It has all the features we needed, including advanced search functionality and secure payment options. The site's performance is excellent, with fast load times and no glitches</p>
         <div class="stars">
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star-half-alt"></i>
         </div>
         <h3>David W</h3>
      </div>

      <div class="swiper-slide slide">
         <img src="uploaded_img/pic-2.png" alt="">
         <p>The e-commerce site developed by this team has transformed our business. The integration with our CRM and payment gateways works flawlessly, and the user interface is clean and engaging. Their commitment to security and compliance is evident, which is very important in our industry. Their support team is responsive and helpful, ensuring we never face downtime.</p>
         <div class="stars">
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star-half-alt"></i>
         </div>
         <h3>Lisa K.</h3>
      </div>

      <div class="swiper-slide slide">
         <img src="uploaded_img/pic-3.png" alt="">
         <p>Their expertise in e-commerce development is top-notch. The website they created for my handmade crafts business is beautiful and functional. The checkout process is smooth, and the site loads quickly, which is crucial for retaining customers.</p>
         <div class="stars">
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star-half-alt"></i>
         </div>
         <h3>Rahul</h3>
      </div>

      <div class="swiper-slide slide">
         <img src="uploaded_img/pic-4.png" alt="">
         <p>This team is incredibly knowledgeable and professional. They built a robust, scalable e-commerce platform that has helped our business grow tremendously. The security features they implemented give us and our customers peace of mind, and their ongoing support ensures everything runs smoothly.</p>
         <div class="stars">
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star-half-alt"></i>
         </div>
         <h3>Sarah L</h3>
      </div>

      <div class="swiper-slide slide">
         <img src="uploaded_img/pic-5.png" alt="">
         <p>Working with this team has been an absolute pleasure. They took the time to understand our unique business needs and delivered a custom e-commerce platform that exceeded our expectations. The design is intuitive and user-friendly, and we've seen a significant increase in our online sales. Their support team is always available to help with any issues. Highly recommend!"</p>
         <div class="stars">
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star-half-alt"></i>
         </div>
         <h3>Ajay</h3>
      </div>

      <div class="swiper-slide slide">
         <img src="uploaded_img/pic-6.png" alt="">
         <p>I couldn't be happier with the e-commerce site they developed for my fashion brand. The attention to detail and the seamless integration with our inventory management system have streamlined our operations. The responsive design ensures our customers have a great experience, whether they're shopping on a desktop or a mobile device.</p>
         <div class="stars">
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star-half-alt"></i>
         </div>
         <h3>Emily R</h3>
      </div>

   </div>

   <div class="swiper-pagination"></div>

   </div>

</section>









<?php include 'components/footer.php'; ?>

<script src="https://unpkg.com/swiper@8/swiper-bundle.min.js"></script>

<script src="js/script.js"></script>

<script>

var swiper = new Swiper(".reviews-slider", {
   loop:true,
   spaceBetween: 20,
   pagination: {
      el: ".swiper-pagination",
      clickable:true,
   },
   breakpoints: {
      0: {
        slidesPerView:1,
      },
      768: {
        slidesPerView: 2,
      },
      991: {
        slidesPerView: 3,
      },
   },
});

</script>

</body>
</html>