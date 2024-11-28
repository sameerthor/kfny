$(document).on('change', '#user_credential', function () {
 if($(this).prop('checked'))
 {
   $("#user_credential_box").show();
   $("#user_credential_box").find("input").attr("data-rule-required",true);

 }else{
  $("#user_credential_box").hide();
  $("#user_credential_box").find("input").attr("data-rule-required",false);

 } 

});

$(document).on('blur', '.provider-search', function () {
  var q = $(this).val()
  $.ajax({
    url: 'provider-search/' + q,
    method: 'get',
    beforeSend: function () {
      $('.loader').fadeIn(300)
    },
    success: function (response) {
      if (response.status == 'success') {
        $('.ProviderInformation-table').html(response.output)
      }
    },
    complete: function () {
      setTimeout(function () {
        $('.loader').fadeOut(300)
      }, 700)
    },
  })
});

$(document).on('click', '.add-ProviderInformation-modal', function () {
  var id = '#addProviderInformation'
  if ($('.modal').hasClass('modal-create')) {
    $(id).modal('show')
  } else {
    var url = $(this).attr('data-url')
    // alert(url);
    $.ajax({
      url: url,
      method: 'get',
      beforeSend: function () {
        $('.loader').fadeIn(300)
      },
      success: function (response) {
        if (response.status == 'success') {
          modelRender(response.output, id)
          // $('#update-profile').modal('show');
        }
      },
      complete: function () {
        setTimeout(function () {
          $('.loader').fadeOut(300)
        }, 700)
      },
    })
  }
})
// ======================edit modal get====================
$(document).on('click', '.edit-ProviderInformation-modal', function () {
  var url = $(this).attr('data-url')
  $.ajax({
    url: url,
    method: 'get',
    beforeSend: function () {
      $('.loader').fadeIn(300)
    },
    success: function (response) {
      if (response.status == 'success') {
        id = '#editProviderInformationModel'
        modelRender(response.output, id)
        // $('#update-profile').modal('show');
      }
    },
    complete: function () {
      setTimeout(function () {
        $('.loader').fadeOut(300)
      }, 700)
    },
  })
})
// ============================add Category data ==========================
$(document).ready(function () {
  $('#provoiderInformationForm').validate({
    //ignore: [],
    onfocusout: function (element) {
      this.element(element)
    },
    errorClass: 'error_validate',
    errorElement: 'lable',
  })

  $(document).on('click', '.save-provoiderInformation', function () {
    var url = $(this).attr('data-url')

    if ($('#provoiderInformationForm').valid()) {
      ; (url = url), (method = 'POST')
      $.ajax({
        url: url,
        method: method,
        data: $('#provoiderInformationForm').serialize(),
        beforeSend: function () {
          $('.loader').fadeIn(300)
        },
        headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
        },
        success: function (response) {
          if (response.status == 'error') {
            $.each(response.error, function (index, value) {
              console.log(index)
              $('.' + index + '-error').html(value)
              $('.' + index + '-error').show()
            })
          } else if (response.status == 'success') {
            // console.log(response.status)
            $('#provoiderInformationForm')[0].reset()
            //close model
            // $('.warehouseTable').
            $('.ProviderInformation-table').html(response.output)
            $('.btn-close').trigger('click')
            feather.replace()
            toastr.success(response.message, 'Success!', {
              timeOut: '4000',
            })
            $('.error').html('')
          }
        },
        complete: function () {
          setTimeout(function () {
            $('.loader').fadeOut(300)
          }, 700)
        },
      })
    }
  })
})

//=======================update Category===============
$(document).ready(function () {
  $('#editProvoiderInformationForm').validate({
    //ignore: [],
    onfocusout: function (element) {
      this.element(element)
    },
    errorClass: 'error_validate',
    errorElement: 'lable',
  })

  $(document).on('click', '.update-provoiderInformation', function () {
    var url = $(this).attr('data-url')
    if ($('#editProvoiderInformationForm').valid()) {
      method = 'POST'
      $.ajax({
        url: url,
        method: method,
        data: $('#editProvoiderInformationForm').serialize(),
        beforeSend: function () {
          $('.loader').fadeIn(300)
        },
        headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
        },
        success: function (response) {
          if (response.status == 'error') {
            $.each(response.error, function (index, value) {
              console.log(index)
              $('.' + index + '-error').html(value)
              $('.' + index + '-error').show()
            })
          } else if (response.status == 'success') {
            $('#editProvoiderInformationForm')[0].reset()
            //close model
            $('.ProviderInformation-table').html(response.output)
            $('.btn-close').trigger('click')
            feather.replace()
            toastr.success(response.message, 'Success!', {
              timeOut: '4000',
            })

            $('.error').html('')
          }
        },
        complete: function () {
          setTimeout(function () {
            $('.loader').fadeOut(300)
          }, 700)
        },
      })
    }
  })
})


//==============sweetalert for delete =============
$(document).on('click', '.delete', function () {
  var htmlOutput = $(this).closest('tr')
  Swal.fire({
    title: 'Are you sure?',
    text: 'Once deleted, you will not be able to revert this Information!',
    icon: 'error',
    showCancelButton: true,
    confirmButtonColor: '#3085d6',
    cancelButtonColor: '#d33',
    confirmButtonText: 'Yes, Confirm it!',
  }).then((result) => {
    if (result.isConfirmed) {
      var url = $(this).attr('data-url')
      method = 'POST'
      $.ajax({
        url: url,
        method: method,
        data: {
          _method: 'DELETE',
        },
        headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
        },
        success: function (response) {
          htmlOutput.remove()

          if (response.status == 'error') {
            toastr.error(response.message, 'Error!', {
              timeOut: '4000',
            })
          } else if (response.status == 'success') {
            $('.ProviderInformation-table').html(response.output)
            feather.replace();
            toastr.success(response.message, 'Success!', {
              timeOut: '4000',
            })
          }
        },
      })
    }
  })
})

