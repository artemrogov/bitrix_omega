/**
 * Вызывает метод компонента sendBookData(без постфикса Action)
 * отправляет post запрос, если ID каталога существует
 * возращает массив книг каталога.
 */
BX.ready(function(){
    $("#result").hide();

    $("#formFilter").on("submit",function(e){

        BX.ajax.runComponentAction('nglab:ng',
            'sendBookData', {
                mode: 'class',
                data: {
                    param1:$("#filter_id").val(), // ключи объекта data соответствуют параметрам метода
                }
            }).then(function(response) {

            if (response.status === 'success') {

                $("#result").fadeIn('slow');

                $("#result").html("");

                for (var i = 0; response.data.length > i; i++){

                    $("#result").append("<p class='ajx'>"+response.data[i]+"</p>");
                }

            }
        });

        e.preventDefault();

    });

});