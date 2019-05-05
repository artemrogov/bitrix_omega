<?php
if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();
?>

<div>
    <form id="formFilter">
        <p><input type="text" id="filter_id" required></p>
        <hr>
        <p><input type="submit" value="получить книги"></p>

    </form>
</div>
<div id="result"></div>

<script>
    $(document).ready(function(){
          $("#result").hide();

          $("#formFilter").on("submit",function(e){

              BX.ajax.runComponentAction('nglab:ng',
                  'sendBookData', { // Вызывается без постфикса Action
                      mode: 'class',
                      data: {
                          param1:$("#filter_id").val(),
                      } // ключи объекта data соответствуют параметрам метода
                  }).then(function(response) {

                      if (response.status === 'success') {

                      $("#result").show();
                      $("#result").html("");

                      for (var i = 0; response.data.length > i; i++){

                          $("#result").append("<p class='ajx'>"+response.data[i]+"</p>");
                      }

                  }
              });

              e.preventDefault();

          });

});
</script>

