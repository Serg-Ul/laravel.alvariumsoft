$(window).on('hashchange',function(){
    if (window.location.hash) {
        var page = window.location.hash.replace('#', '');
        if (page == Number.NaN || page <= 0) {
            return false;
        } else{
            getData(page);
        }
    }
});

$(document).ready(function(){
    $(document).on('click','.pagination a',function(event){
        event.preventDefault();
        $('li').removeClass('active');
        $(this).parent('li').addClass('active');
        var url = $(this).attr('href');
        var page = url.split('page=')[1];
        //console.log(page);
        getData(page);
        scrollTo('#testimonials_container');
    });
});

function getData(page) {
    // body...
    $.ajax({
        url : '?page=' + page,
        type : 'get',
        datatype : 'html',
    }).done(function(data){
        $('#testimonials_container').empty().html(data);
        location.hash = page;
    }).fail(function(jqXHR,ajaxOptions,thrownError){
        alert('No response from server');
    });
}
