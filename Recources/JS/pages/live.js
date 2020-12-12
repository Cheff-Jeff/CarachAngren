$(document).ready(function(){
    $('.btn-filter').click(function(){
        // var t0 = performance.now()
        let cat = $(this).attr('id');
        $('.btn-filter').removeClass('active');
        $(this).addClass('active');

        if (cat == 'All'){
            $('.Show').each(function (){
                if(!$(this).hasClass('active')){
                    $(this).addClass('active');
                }
                else if($(this).hasClass('hide')){
                    $(this).removeClass('hide');
                }     
            });
        }else{
            $('.Show').each(function (){
                if($(this).hasClass(cat)){
                    $(this).addClass('active');
                    if($(this).hasClass('hide')){
                        $(this).removeClass('hide');
                    }     
                }
                else{
                    $(this).addClass('hide');
                    if($(this).hasClass('active')){
                        $(this).removeClass('active');
                    } 
                }     
            });
        }
        // var t1 = performance.now()
        // console.log("Call to doSomething took " + (t1 - t0) + " milliseconds.")
    });
});  