$(document).ready(function() {
  const lockModal = $("#lock-modal");
  const loadingCircle = $("#loading-circle");
  const form = $("#my-form");

  form.on('submit', function(e) {
    e.preventDefault(); //prevent form from submitting

    // lock down the form
    lockModal.css("display", "block");
    loadingCircle.css("display", "block");
    
    form.children("input").each(function() {
      $(this).attr("readonly", true);
    });

    setTimeout(function() {
      // re-enable the form
      lockModal.css("display", "none");
      loadingCircle.css("display", "none");
      
      form.children("input").each(function() {
        $(this).attr("readonly", false);
      });
    }, 3000);
  });

});