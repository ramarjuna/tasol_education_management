  $(document).ready(function() {
    $('.name-validation').hide();
    $('button').attr("disabled", true);;
    $('#name').focusout(function() {
      if ($(this).val() == '' || $(this).val() == null) {
        $('.name-validation').text('The name field should not be empty!');
        $('.name-validation').show();
        $('button').attr("disabled", true);
      }
      else {
        if ($(this).val().length >= 200) {
          $('.name-validation').show();
          $('.name-validation').text('Please restrict the name below 200 characters');
          $('button').attr("disabled", true);
        } else {
            $('.name-validation').hide();
            $('button').attr("disabled", false);
        }
      }
    })
});