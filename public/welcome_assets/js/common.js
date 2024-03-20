 /*jslint browser: true*/
/*global $, jQuery, alert*/
// (function($) {
//   'use strict';

//   $(function() {

//       $(document).ready(function() {
//           function triggerClick(elem) {
//               $(elem).click();
//                $(".step_slider").slick('refresh');
              
//           }
//           var $progressWizard = $('.stepper_holder'),
//               $tab_active,
//               $tab_prev,
//               $tab_next,
//               $btn_prev = $progressWizard.find('.prev-step'),
//               $btn_next = $progressWizard.find('.next-step'),
//               $tab_toggle = $progressWizard.find('[data-toggle="tab"]'),
//               $tooltips = $progressWizard.find('[data-toggle="tab"][title]');

//           // To do:
//           // Disable User select drop-down after first step.
//           // Add support for payment type switching.

//           //Initialize tooltips
//           $tooltips.tooltip();

//           //Wizard
//           $tab_toggle.on('show.bs.tab', function(e) {
//               var $target = $(e.target);
//               $progressWizard.find('li.active').removeClass('active')
//               if (!$target.parent().hasClass('active, disabled')) {
//                 $target.parent().addClass('active')
//                    $target.parent().prev().addClass('completed');
//               }
//               if ($target.parent().hasClass('disabled')) {
//                   return false;
//               }
//           });

//           // $tab_toggle.on('click', function(event) {
//           //     event.preventDefault();
//           //     event.stopPropagation();
//           //     return false;
//           // });

//           $btn_next.on('click', function() {
//               $tab_active = $progressWizard.find('li a.active');
//               $tab_active.parent().next().find('a').removeClass('disabled');
//               $tab_next = $tab_active.parent().next().find('a[data-toggle="tab"]');
//                triggerClick($tab_next);

//           });
//           $btn_prev.click(function() {
//               $tab_active = $progressWizard.find('li a.active');
//               $tab_prev = $tab_active.parent().prev().find('a[data-toggle="tab"]');
//               triggerClick($tab_prev);
//           });
//       });
//   });

// }(jQuery, this));


// var modalData; 


// $(".check_mark").click((event) => {
//     event.stopPropagation();
// });
 
// $(".btn_select").click((event) => {
//     var currectRadio = document.getElementById(modalData);
//     currectRadio.click()
//     $('#stepOneModal').modal('hide');
// });

// $(document).on("click", ".radio_item label", function () {
//     modalData = $(this).data('id');
//      // As pointed out in comments, 
//     // it is unnecessary to have to manually call the modal.
//     // $('#addBookDialog').modal('show');
// });


  $(".vertical-center-4").slick({
    infinite: true,
    slidesToShow: 3,
    slidesToScroll: 3,
    centerMode: true,
    centerPadding: '0',
    responsive: [
        {
            breakpoint: 1069,
            settings: {
              slidesToShow: 2,
              slidesToScroll: 2,
              infinite: true,
             }
          },
          {
            breakpoint: 1024,
            settings: {
              slidesToShow: 2,
              slidesToScroll: 2,
              infinite: true,
             }
          },
          {
            breakpoint: 500,
            settings: {
              slidesToShow: 1,
              slidesToScroll:1,
              infinite: true,
             }
          },
    ]
   });

   

   

    

   
    