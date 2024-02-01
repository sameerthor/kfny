$(document).on('blur', "#interest_term", function () {
    var amt = $('#total_amt').html()
    if (amt == '0.00') {
        return false;
    }
    p = parseFloat(amt);
    r = parseFloat($(this).val());
    t = monthDiff(new Date($("input[name='filling_date_s_c']").val()), new Date($('#settlement_date').val()));
    console.log($("input[name='filling_date_s_c']").val());
    console.log($('#settlement_date').val());
    console.log(p)
    console.log(r)
    console.log(t)
    var interest = (p * (1 + r * t)) / 100
    $("#interest_amount").val(parseFloat(interest).toFixed(2));
})

function monthDiff(d1, d2) {
    var months;
    months = (d2.getFullYear() - d1.getFullYear() + 1) * 12;
    months -= d1.getMonth();
    months += d2.getMonth();
    return months <= 0 ? 0 : months;
}

$(document).on('blur', "#principal_term", function () {
    console.log("test");
    var amt = $('#total_amt').html()
    if (amt == '0.00') {
        return false;
    }
    amt = parseFloat(amt);
    var per = parseFloat($(this).val());
    console.log(amt)
    console.log(per)
    var principle = (amt / 100) * per;
    $("#principal_amount").val(parseFloat(principle).toFixed(2));
})

$(document).on('blur', "#principal_term", function () {
    console.log("test");
    var amt = $('#total_amt').html()
    if (amt == '0.00') {
        return false;
    }
    amt = parseFloat(amt);
    var per = parseFloat($(this).val());
    console.log(amt)
    console.log(per)
    var principle = (amt / 100) * per;
    $("#principal_amount").val(parseFloat(principle).toFixed(2));
})

$(document).on('blur', "#principal_amount", function () {
    console.log("test");
    var amt = $('#total_amt').html()
    if (amt == '0.00') {
        return false;
    }
    amt = parseFloat(amt);
    var principle = parseFloat($(this).val());
    var per = (principle * 100) / amt;
    $("#principal_term").val(parseFloat(per).toFixed(2));
})

$(document).on('click', '#add_amount_row', function () {
    //Add row
    var row = $("#amountTable").html();
    $("tbody").append(row);
})

$(document).on('click', '.delete_amount_row', function () {
    $(this).closest('tr').remove();
});
$(document).on('click', '#add_cheque_row', function () {
    //Add row
    var row = $("#chequeTable").html();
    $("tbody").append(row);
})

$(document).on('click', '.delete_cheque_row', function () {
    $(this).closest('tr').remove();
});

$(document).on("click", ".add-filling-intake-modal", function () {
    var id = "#addInsurance";
    if ($(".modal").hasClass("modal-create")) {
        $(id).modal("show");
    } else {
        var url = $(this).attr("data-url");
        // alert(url);
        $.ajax({
            url: url,
            method: "get",
            beforeSend: function () {
                $(".loader").fadeIn(300);
            },
            success: function (response) {
                if (response.status == "success") {
                    modelRender(response.output, id);
                    // $('#update-profile').modal('show');
                }
            },
            complete: function () {
                setTimeout(function () {
                    $(".loader").fadeOut(300);
                }, 700);
            },
        });
    }
});
// ======================edit modal get====================
$(document).on("click", ".edit-ProviderInformation-modal", function () {
    var url = $(this).attr("data-url");
    $.ajax({
        url: url,
        method: "get",
        beforeSend: function () {
            $(".loader").fadeIn(300);
        },
        success: function (response) {
            if (response.status == "success") {
                id = "#editBasicIntakeModel";
                modelRender(response.output, id);
                // $('#update-profile').modal('show');
            }
        },
        complete: function () {
            setTimeout(function () {
                $(".loader").fadeOut(300);
            }, 700);
        },
    });
});
// ============================add Category data ==========================
$(document).ready(function () {
    $("#basicIntakeForm").validate({
        //ignore: [],
        onfocusout: function (element) {
            this.element(element);
        },
        errorClass: "error_validate",
        errorElement: "lable",
    });

    $(document).on("click", ".save-form", function () {
        var url = $(this).attr("data-url");

        if ($("#basicIntakeForm").valid()) {
            (url = url), (method = "POST");
            $.ajax({
                url: url,
                method: method,
                data: $("#basicIntakeForm").serialize(),
                beforeSend: function () {
                    $(".loader").fadeIn(300);
                },
                headers: {
                    "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr(
                        "content"
                    ),
                },
                success: function (response) {
                    if (response.status == "error") {
                        $.each(response.error, function (index, value) {
                            console.log(index);
                            $("." + index + "-error").html(value);
                            $("." + index + "-error").show();
                        });
                    } else if (response.status == "success") {

                        $(".header_tab_of_ligitation").html(response.header)
                        $(".basicIntake_div").html(response.form);
                        $(".searchInputReport").val(
                            response.id
                        );

                        feather.replace();
                        toastr.success(response.message, "Success!", {
                            timeOut: "4000",
                        });
                        $(".error").html("");
                    }
                },
                complete: function () {
                    setTimeout(function () {
                        $(".loader").fadeOut(300);
                    }, 700);
                    $("#basicIntakeForm").validate({
                        //ignore: [],
                        onfocusout: function (element) {
                            this.element(element);
                        },
                        errorClass: "error_validate",
                        errorElement: "lable",
                    });
                },
            });
        }
    });
});

//=======================update Category===============
$(document).ready(function () {
    $("#editBasicIntakeForm").validate({
        //ignore: [],
        onfocusout: function (element) {
            this.element(element);
        },
        errorClass: "error_validate",
        errorElement: "lable",
    });

    $(document).on("click", ".update-basic-intake", function () {
        var url = $(this).attr("data-url");
        if ($("#editBasicIntakeForm").valid()) {
            method = "POST";
            $.ajax({
                url: url,
                method: method,
                data: $("#editBasicIntakeForm").serialize(),
                beforeSend: function () {
                    $(".loader").fadeIn(300);
                },
                headers: {
                    "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr(
                        "content"
                    ),
                },
                success: function (response) {
                    if (response.status == "error") {
                        $.each(response.error, function (index, value) {
                            console.log(index);
                            $("." + index + "-error").html(value);
                            $("." + index + "-error").show();
                        });
                    } else if (response.status == "success") {
                        $("#editBasicIntakeForm")[0].reset();
                        //close model
                        location.reload();
                        $(".basic-intakes-table").html(response.output);
                        $(".btn-close").trigger("click");

                        $(".error").html("");
                    }
                },
                complete: function () {
                    setTimeout(function () {
                        $(".loader").fadeOut(300);
                    }, 700);
                },
            });
        }
    });
});

//==============sweetalert for delete =============
$(document).on("click", ".delete-insurance", function () {
    var htmlOutput = $(this).closest("tr");
    Swal.fire({
        title: "Are you sure?",
        text: "Once deleted, you will not be able to revert this Information!",
        icon: "error",
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        confirmButtonText: "Yes, Confirm it!",
    }).then((result) => {
        if (result.isConfirmed) {
            var url = $(this).attr("data-url");
            method = "POST";
            $.ajax({
                url: url,
                method: method,
                data: {
                    _method: "DELETE",
                },
                headers: {
                    "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr(
                        "content"
                    ),
                },
                success: function (response) {
                    htmlOutput.remove();

                    if (response.status == "error") {
                        toastr.error(response.message, "Error!", {
                            timeOut: "4000",
                        });
                    } else if (response.status == "success") {
                        $(".basic-intakes-table").html(response.output);
                        feather.replace();
                        toastr.success(response.message, "Success!", {
                            timeOut: "4000",
                        });
                    }
                },
            });
        }
    });
});

$(document).on("blur", "#first_name,#last_name", function () {
    $('#insured').val($('#first_name').val() + " " + $('#last_name').val());
});

$(document).on("blur", ".searchInputReport", function () {
    var searchText = $(this).val();
    $("#pills-basicIntake-tab").trigger("click");
    // Make an AJAX request when the user types
    $.ajax({
        url: "/ligitation-search", // Replace with the actual URL for your search endpoint
        method: "GET",
        data: { query: searchText },
        beforeSend: function () {
            $(".loader").fadeIn(300);
        },
        success: function (response) {
            $(".header_tab_of_ligitation").html(response.header)
            $(".basicIntake_div").html(response.form);
            if (searchText != "") {
                if (response.status == "notfound") {
                    alert("No data found for this file number.");
                }
            }
        },
        error: function (xhr, status, error) {
            console.error("Error:", error);
        },
    });
});

$(".filling-info-tab").click(function (e) {
    var searchText = $(".searchInputReport").val();
    if (searchText == "") {
        alert("Please enter file no. ")
        $("#pills-basicIntake-tab").trigger("click");
        return false;
    }
    $.ajax({
        url: "/filling-info", // Replace with the actual URL for your search endpoint
        method: "GET",
        data: { query: searchText },
        beforeSend: function () {
            $(".loader").fadeIn(300);
        },
        success: function (response) {
            if (response.status == "success") {
                $(".filingInfo_div").html(response.output);
            } else {
                $("#pills-basicIntake-tab").trigger("click");
                return false;
            }

        },
        error: function (xhr, status, error) {
            console.error("Error:", error);
        },
    });
});

$(".settlement-info-tab").click(function (e) {
    var searchText = $(".searchInputReport").val();
    if (searchText == "") {
        alert("Please enter file no. ")
        $("#pills-basicIntake-tab").trigger("click");
        return false;
    }
    $.ajax({
        url: "/settlement-info", // Replace with the actual URL for your search endpoint
        method: "GET",
        data: { query: searchText },
        beforeSend: function () {
            $(".loader").fadeIn(300);
        },
        success: function (response) {
            if (response.status == "success") {
                $(".settlementInfo_div").html(response.output);
            } else {
                $("#pills-basicIntake-tab").trigger("click");
                return false;
            }

        },
        error: function (xhr, status, error) {
            console.error("Error:", error);
        },
    });
});

// ============================add Category data ==========================
$(document).ready(function () {
    $("#addFillingForm").validate({
        //ignore: [],
        onfocusout: function (element) {
            this.element(element);
        },
        errorClass: "error_validate",
        errorElement: "lable",
    });

    $(document).on("click", ".save-filling-info-form", function () {
        var url = $(this).attr("data-url");

        if ($("#addFillingForm").valid()) {
            (url = url), (method = "POST");
            $.ajax({
                url: url,
                method: method,
                data: $("#addFillingForm").serialize(),
                beforeSend: function () {
                    $(".loader").fadeIn(300);
                },
                headers: {
                    "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr(
                        "content"
                    ),
                },
                success: function (response) {
                    if (response.status == "error") {
                        $.each(response.error, function (index, value) {
                            console.log(index);
                            $("." + index + "-error").html(value);
                            $("." + index + "-error").show();
                        });
                    } else if (response.status == "success") {
                        feather.replace();
                        toastr.success(response.message, "Success!", {
                            timeOut: "4000",
                        });
                        $(".error").html("");
                    }
                },
                complete: function () {
                    setTimeout(function () {
                        $(".loader").fadeOut(300);
                    }, 700);
                },
            });
        }
    });
});

$(document).ready(function () {
    $("#settlementForm").validate({
        //ignore: [],
        onfocusout: function (element) {
            this.element(element);
        },
        errorClass: "error_validate",
        errorElement: "lable",
    });

    $(document).on("click", ".save-settlement-info-form", function () {
        var url = $(this).attr("data-url");

        if ($("#settlementForm").valid()) {
            (url = url), (method = "POST");
            $.ajax({
                url: url,
                method: method,
                data: $("#settlementForm").serialize(),
                beforeSend: function () {
                    $(".loader").fadeIn(300);
                },
                headers: {
                    "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr(
                        "content"
                    ),
                },
                success: function (response) {
                    if (response.status == "error") {
                        $.each(response.error, function (index, value) {
                            console.log(index);
                            $("." + index + "-error").html(value);
                            $("." + index + "-error").show();
                        });
                    } else if (response.status == "success") {
                        feather.replace();
                        toastr.success(response.message, "Success!", {
                            timeOut: "4000",
                        });
                        $(".error").html("");
                    }
                },
                complete: function () {
                    setTimeout(function () {
                        $(".loader").fadeOut(300);
                    }, 700);
                },
            });
        }
    });
});

$(document).on("click", "#advance-search", function () {
    var url = $(this).attr("data-url");

    $("#pills-basicIntake-tab").trigger("click");
    // Make an AJAX request when the user types
    $.ajax({
        url: url,
        method:"post",
        data: $("#advanceSearchForm").serialize(),
        beforeSend: function () {
            $(".loader").fadeIn(300);
        },
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr(
                "content"
            ),
        },
        beforeSend: function () {
            $(".loader").fadeIn(300);
        },
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr(
                "content"
            ),
        },
        success: function (response) {
            if (response.status == "error") {
                $.each(response.error, function (index, value) {
                    console.log(index);
                    $("." + index + "-error").html(value);
                    $("." + index + "-error").show();
                });
            } else if (response.status == "success") {
                $("#search-table").html(response.tableHtml);
                feather.replace();
                toastr.success(response.message, "Success!", {
                    timeOut: "4000",
                });
                $(".error").html("");
            }
        },
        complete: function () {
            setTimeout(function () {
                $(".loader").fadeOut(300);
            }, 700);
        }
    });
});

$(document).on("click", ".view_case", function () {
    var id = $(this).data('id');
    $(".searchInputReport").val(id)
    $("#pills-basicIntake-tab").trigger("click");
    // Make an AJAX request when the user types
    $.ajax({
        url: "/ligitation-search", // Replace with the actual URL for your search endpoint
        method: "GET",
        data: { query: id },
        beforeSend: function () {
            $(".loader").fadeIn(300);
        },
        success: function (response) {
            $(".header_tab_of_ligitation").html(response.header)
            $(".basicIntake_div").html(response.form);
            if (searchText != "") {
                if (response.status == "notfound") {
                    alert("No data found for this file number.");
                }
            }
        },
        error: function (xhr, status, error) {
            console.error("Error:", error);
        },
    });
});