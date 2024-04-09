$(document).on('blur', '.firm-search', function () {
  var q = $(this).val()
  $.ajax({
    url: 'firm-search/' + q,
    method: 'get',
    beforeSend: function () {
      $('.loader').fadeIn(300)
    },
    success: function (response) {
      if (response.status == 'success') {
        $('.defence-table').html(response.output)
      }
    },
    complete: function () {
      setTimeout(function () {
        $('.loader').fadeOut(300)
      }, 700)
    },
  })
});

$(document).on('click', '.add-defense-firm-modal', function () {
    var id = '#addDefence'
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
   $(document).on('click', '.edit-defence-modal', function () {
    console.log(url)
    var url = $(this).attr('data-url')
    $.ajax({
    url: url,
    method: 'get',
    beforeSend: function () {
      $('.loader').fadeIn(300)
    },
    success: function (response) {
      console.log(response);

      if (response.status == 'success') {
      id = '#editDefenceModel'
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
    $('#defenseFirmForm').validate({
    //ignore: [],
    onfocusout: function (element) {
      this.element(element)
    },
    errorClass: 'error_validate',
    errorElement: 'lable',
    })
  
    $(document).on('click', '.save-firm', function () {
    var url = $(this).attr('data-url')
  
    if ($('#defenseFirmForm').valid()) {
      ;(url = url), (method = 'POST')
      $.ajax({
      url: url,
      method: method,
      data: $('#defenseFirmForm').serialize(),
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
        $('#defenseFirmForm')[0].reset()
        //close model
        // $('.warehouseTable').
        $('.defence-table').html(response.output)
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
    $('#editdefenseFirmForm').validate({
    //ignore: [],
    onfocusout: function (element) {
      this.element(element)
    },
    errorClass: 'error_validate',
    errorElement: 'lable',
    })
  
    $(document).on('click', '.update-defence', function () {
    var url = $(this).attr('data-url')
    if ($('#editdefenseFirmForm').valid()) {
      method = 'POST'
      $.ajax({
      url: url,
      method: method,
      data: $('#editdefenseFirmForm').serialize(),
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
        $('#editdefenseFirmForm')[0].reset()
        //close model
        $('.defence-table').html(response.output)
        $('.btn-close').trigger('click');
     
        $('.error').html('')
        toastr.success(response.message, 'Success!', {
          timeOut: '4000',
        })
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
  $(document).on('click', '.delete-defence', function () {
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
        $('.defence-table').html(response.output)
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
  
  