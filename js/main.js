(function(){
    if( typeof $M === "undefined") $M = {};

    GlobalOddsContainer = {};

    var $modal,
        $odd_type_ToConvert,
        init = function(){
            try{
                setup();
                loadData();
                watchInputUser();
                convertOdd();
            }
            catch (e){
                console.error(e.message);
            }
        },
        setup = function(){
            $modal = $('#myModal');
        },
        loadData = function(){
            $modal.on('show.bs.modal', function (e) {
                //ajax request for load the conversion table
                $.ajax({
                    type: "POST",
                    url : "functions.php",
                    data : {
                        call_func   : "loadOddsTable"
                    }
                }).success(function(response){
                    GlobalOddsContainer = response;
                    return true;
                });
                console.log('modal requested');
            });
        },
        watchInputUser = function () {
            $modal.on('keydown','input[data-odd-format]', function () {
                debugger;
                $odd_type_ToConvert = $(this).data('oddFormat');
            });
        },
        convertOdd = function () {
            $modal.on('click','#convert_odd',function () {
                var $odd_val = $modal.find('[data-odd-format="'+ $odd_type_ToConvert +'"]'),
                    $oddMess = $('#no_odd_found');
                if(checkValueToConvert($odd_val)){
                    $oddMess.fadeOut('fast');
                } else {
                    $oddMess.fadeIn('fast');
                }
            });
        },
        checkValueToConvert = function ($odd_val) {
            $.map(GlobalOddsContainer, function (arrOfOdds, key) {
                if($.inArray($odd_val,arrOfOdds)){
                    $('[data-odd-format="uk"]').val(arrOfOdds[0]);
                    $('[data-odd-format="eu"]').val(arrOfOdds[1]);
                    $('[data-odd-format="us"]').val(arrOfOdds[2]);
                    return true;
                }
                return false;
            });
        };

    $M.loadDataOnFirstModalShow = init;
})();



$(document).ready(function(){

    $M.loadDataOnFirstModalShow();

});
