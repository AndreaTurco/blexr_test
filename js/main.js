(function(){
    if( typeof $M === "undefined") $M = {};

    GlobalOddsContainer = null;

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
                if(GlobalOddsContainer === null) {
                    var tkn = $('#tkn').val();
                    $.ajax({
                        type: "POST",
                        url: "functions.php",
                        data: {
                            call_func: "loadOddsTable",
                            token: tkn
                        },
                        dataType: "json",
                        success: function (response) {
                            GlobalOddsContainer = response;
                        },
                        error: function (data) {
                            console.log('error ' + data.responseText);
                            $modal.modal('hide');
                        }
                    });
                    console.log('modal requested');
                }
            });
        },
        watchInputUser = function () {
            $modal.on('keydown','input[data-odd-format]', function () {
                $odd_type_ToConvert = $(this).data('oddFormat');
            });
        },
        convertOdd = function () {
            $modal.on('click','#convert_odd',function () {
                var $odd_val = $modal.find('[data-odd-format="'+ $odd_type_ToConvert +'"]'),
                    $oddMess = $('#no_odd_found');
                if(checkValueToConvert($odd_val.val())){
                    $oddMess.fadeOut('fast');
                } else {
                    $oddMess.fadeIn('fast');
                }
            });
        },
        checkValueToConvert = function ($odd_val) {
            var found = false;
            $.map(GlobalOddsContainer, function (arrOfOdds, key) {
                for(var $i in arrOfOdds){
                    if(arrOfOdds[$i] === $odd_val){
                        $('[data-odd-format="uk"]').val(arrOfOdds['Fractional_UK']);
                        $('[data-odd-format="eu"]').val(arrOfOdds['Decimal_EU']);
                        $('[data-odd-format="us"]').val(arrOfOdds['Moneyline_US']);
                        found = true;
                    }
                }
            });
            return found;
        };

    $M.loadDataOnFirstModalShow = init;
})();



$(document).ready(function(){

    $M.loadDataOnFirstModalShow();

});
