$(document).ready(function () {
    /*  $("#genFile_form").on("submit", function(e) {
            var postData = $(this).serializeArray();
            var formURL = $(this).attr("action");
            $.ajax({
                url: formURL,
                type: "POST",
                data: postData,
                success: function(data, textStatus, jqXHR) {
                    $('#genFile .response').html(data);
            $('#genFile .response').fadeOut(1000, function() {
              location.reload();
            });
                },
                error: function(jqXHR, status, error) {
                    console.log(status + ": " + error);
                }
            });
            e.preventDefault();
        });
      $("#genUser_form").on("submit", function(e){
        var postData = $(this).serializeArray();
            var formURL = $(this).attr("action");
            $.ajax({
                url: formURL,
                type: "POST",
                data: postData,
                success: function(data, textStatus, jqXHR) {
                    $('#genUser .response2').html(data);
            $('#genUser .response2').fadeOut(1000, function() {
              location.reload();
            });
                },
                error: function(jqXHR, status, error) {
                    console.log(status + ": " + error);
                }
            });
            e.preventDefault();
      });
      $("#genDept_form").on("submit", function(e){
        var postData = $(this).serializeArray();
            var formURL = $(this).attr("action");
            $.ajax({
                url: formURL,
                type: "POST",
                data: postData,
                success: function(data, textStatus, jqXHR) {
                    $('#genDept .response3').html(data);
            $('#genDept .response3').fadeOut(1000, function() {
              location.reload();
            });
                },
                error: function(jqXHR, status, error) {
                    console.log(status + ": " + error);
                }
            });
            e.preventDefault();
      });
        $("#genFile_submit").on('click', function() {
        if (confirm("Click Cancel to Edit Values Before Submitting and Click Ok to Submit !!.  Note You Won't Be able to Edit It Afterwards") == true){
          $("#genFile_form").submit();
        }
        });
      $("#genUser_submit").on('click', function(){
        if (confirm("Click Cancel to Edit Values Before Submitting and Click Ok to Submit !!") == true){
        $("#genUser_form").submit();
      }
      });
      $("#genDept_submit").on('click', function(){
        if (confirm("Click Cancel to Edit Values Before Submitting and Click Ok to Submit !!") == true){
        $("#genDept_form").submit();
      }
      });
    */

    function submitCall(div_id) {
        let x = div_id;
        if (confirm("Click Cancel to Edit Values Before Submitting and Click Ok to Submit !!") == true) {
            console.log(x);
            let form_id = "#" + x + "_form";
            genericAjax(form_id);
        }
    }

    function genericAjax(x) {
        var postData = $(this).serializeArray();
        var formURL = $(this).attr("action");
        $.ajax({
            url: formURL,
            type: "POST",
            data: postData,
            success: function (data, textStatus, jqXHR) {
                alert(data);
            },
            error: function (jqXHR, status, error) {
                console.log(status + ": " + error);
            }
        });
    }
});