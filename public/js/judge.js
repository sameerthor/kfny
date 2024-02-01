$(document).on('click', '.add-judge-modal', function () {
    var id = '#addJudge'
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
  $(document).on('click'    , '.edit-judge-modal', function () {
    var url = $(this).attr('data-url')
    $.ajax({
    url: url,
    method: 'get',
    beforeSend: function () {
      $('.loader').fadeIn(300)
    },
    success: function (response) {
      if (response.status == 'success') {
      id = '#editJudgeModel'
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
    $('#judgeForm').validate({
    //ignore: [],
    onfocusout: function (element) {
      this.element(element)
    },
    errorClass: 'error_validate',
    errorElement: 'lable',
    })
  
    $(document).on('click', '.save-judge', function () {
    var url = $(this).attr('data-url')
  
    if ($('#judgeForm').valid()) {
      ;(url = url), (method = 'POST')
      $.ajax({
      url: url,
      method: method,
      data: $('#judgeForm').serialize(),
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
        $('#judgeForm')[0].reset()
        //close model
        // $('.warehouseTable').
        $('.judge-table').html(response.output)
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
    $('#editjudgeForm').validate({
    //ignore: [],
    onfocusout: function (element) {
      this.element(element)
    },
    errorClass: 'error_validate',
    errorElement: 'lable',
    })
  
    $(document).on('click', '.update-judge', function () {
    var url = $(this).attr('data-url')
    if ($('#editjudgeForm').valid()) {
      method = 'POST'
      $.ajax({
      url: url,
      method: method,
      data: $('#editjudgeForm').serialize(),
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
        $('#editjudgeForm')[0].reset()
        //close model
        // location.reload()
        $('.judge-table').html(response.output)
        $('.btn-close').trigger('click');
     
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
  $(document).on('click', '.delete-judge', function () {
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
        $('.judge-table').html(response.output)
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
  
  