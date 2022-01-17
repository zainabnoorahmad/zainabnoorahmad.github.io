 (function() {
     'use strict';
     window.addEventListener('load', function() {
         var forms = document.getElementsByClassName('needs-validation');
         var validation = Array.prototype.filter.call(forms, function(form) {
             form.addEventListener('submit', function(event) {
                 if (form.checkValidity() === false) {
                     event.preventDefault();
                     event.stopPropagation();
                 }
                 form.classList.add('was-validated');
             }, false);
         });
     }, false);
 })();




 $(document).on('submit', '#form', function(event) {
     event.preventDefault();
     var formData = {
         name: $("#name").val(),
         email: $("#email").val(),
         message: $("#message").val(),
     };
     var post_url = $(this).attr("action");
     var request_method = $(this).attr("method");
     $.ajax({
         url: "mail.php",
         type: "POST",
         data: formData
     }).done(function(response) { //
         toastr.success(' Your Query has been received, we will contact you soon.', 'Thank You');


     });
     //}


 });



 $(document).scroll(function() {
     var $nav = $(".navbar-fixed-top ");
     $nav.toggleClass("scrolled ", $(this).scrollTop() > $nav.height());
     var $Logo = $(".logoimg ");
     if ($(window).scrollTop() > 10) {
         $Logo.addClass("shrink ");
     } else {
         $Logo.removeClass("shrink ");
     }

 });

 $(".fa-bars ").on("click ", function() {
     $(".navbar-collapse ").collapse("hide ");
 });
 $(".nav-link ").on("click ", function() {
     $(".navbar-collapse ").collapse("hide ");
 });




 $(document).ready(function() {
     $(".register-tab").click(function() {
         $(".register-box").show();
         $(".login-box").hide();
         $(".register-tab").addClass("active");
         $(".login-tab").removeClass("active");
     });
     $(".login-tab").click(function() {
         $(".login-box").show();
         $(".register-box").hide();
         $(".login-tab").addClass("active");
         $(".register-tab").removeClass("active");
     });
 });


 $(document).on('submit', '#login-form', function(event) {
     event.preventDefault();


     var formData = {
         email: $("#lemail").val(),
         password: $("#lpassword").val(),

     };

     $.ajax({
         url: "login.php",
         type: "POST",
         data: formData

     }).done(function(response) {

         localStorage.setItem('client_email', response);

         window.location = "profile_main.php";




     });


 });

 $(document).on('submit', '#reg-form', function(event) {
     event.preventDefault();

     var formData = {
         name: $("#name").val(),
         email: $("#email").val(),
         password: $("#password").val(),

     };

     $.ajax({
         url: "register.php",
         type: "POST",
         data: formData

     }).done(function(response) {
         alert(response);

         if (response == "Email already exist, please choose another!") {
             toastr.error('Email already exists', 'Try Again');

         } else if (response == "You have successfully registered.") {
             toastr.success('You have successfully registered', 'Thank You');

         }



     });


 });
