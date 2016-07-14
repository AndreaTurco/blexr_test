(function(){
    if( typeof $M === "undefined") $M = {};

    GlobalOddsContainer = {};

    var $modal,
        init = function(){
            try{
                setup();
                loadData();
            }
            catch (e){
                console.error(e.message);
            }
        },
        setup = function(){
            $modal = $('#myModal');
        },
        loadData = function(){
            $modal.on('hidden.bs.modal', function (e) {
                console.log('modal requested');
            });
        };

    $M.loadDataOnFirstModalShow = init;
})();



$(document).ready(function(){

    $M.loadDataOnFirstModalShow();

});
