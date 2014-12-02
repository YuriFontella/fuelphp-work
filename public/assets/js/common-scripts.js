$('body').on('change', '#foto', function(){
  $(this).parents('form').ajaxForm({ 
    success: function(data) {
      location.reload();
    },

    url: 'upload',
    type: 'post',
    resetForm: false

  }).submit();

});