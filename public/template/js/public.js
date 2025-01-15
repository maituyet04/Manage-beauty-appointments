$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

function loadMore()
{
    const page = $('#page').val();
    $.ajax({
        type : 'POST',
        dataType : 'JSON',
        data : { page },
        url : '/services/load-beauty',
        success : function (result) {
            if (result.html !== '') {
                $('#loadBeauty').append(result.html);
                $('#page').val(page + 1);
            } else {
                alert('Đã load xong ');
                $('#button-loadMore').css('display', 'none');
            }
        }
    })
}
