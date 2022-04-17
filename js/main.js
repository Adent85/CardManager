/* 
 * 
 * Copyright Apr 2, 2022 Kyle Fisk
 * 
 */
(function(){
//    $('[data-toggle="popover"]').popover({
//    });  
   $("#home_index_h1").animate({
       fontSize:"275%", opacity: 1, left:0 },
       2000,
       function(){
           $("#home_index_h1").next().fadeIn(1000).fadeOut(1000);
       }
   ); 
    
});
//(function () {
//  'use strict'
//
//  // Fetch all the forms we want to apply custom Bootstrap validation styles to
//  var forms = document.querySelectorAll('.needs-validation')
//
//  // Loop over them and prevent submission
//  Array.prototype.slice.call(forms)
//    .forEach(function (form) {
//      form.addEventListener('submit', function (event) {
//        if (!form.checkValidity()) {
//          event.preventDefault()
//          event.stopPropagation()
//        }
//
//        form.classList.add('was-validated')
//      }, false)
//    })
//})()

