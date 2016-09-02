$(document).ready(function () {
    $(".link").on('click', function (event) {
        $('#zoneedit').html('');
        $('#tableform>tbody').html('');
        var id = $(event.currentTarget).attr('data-value');
        var bg = $(event.currentTarget).find('img').attr('src');
        $('#zoneedit').html('<img src='+bg+' width="850" height="550" />');
        $.ajax({
            url: Routing.generate('gettemplates', {id: id}),
            type: 'get',
            dataType: 'json',
            success: function (data) {
                window.template = data;
                $.each(data, function (index, obj) {
                    $('#zoneedit').append('<div id="box' + obj.id + '"></div>');
                    $('#box' + obj.id).css({
                        'position': 'absolute',
                        'text-align': getAligne(obj.align),
                        'color': obj.color,
                        'police': obj.police,
                        'line-height': (obj.y2 - obj.y1)  + "px",
                        'size': obj.size + "px",
                        'width': (obj.x2 - obj.x1)  + "px",
                        'height':  (obj.y2 - obj.y1) + "px",
                        'top': obj.x1  + "px",
                        'left': obj.y1  + "px",
                        'border':'1px solid '+obj.color
                    });

                    $('#tableform tbody').append('<tr></tr>');
                    $('#tableform tbody tr').eq(index).append('<th>'+obj.name+'</th><td><input data-value="'+obj.id+'"  class="formtosave"  type="text" id="input-'+obj.id+'"/></td>');
                    // put collapse
                    $('.formtosave').on('keyup keypress blur change', function (event) {
                       var id = $(this).attr('data-value');
                        var text = $(this).val();
                        $('#box'+id).html(text);
                    });



                });
                $('#myModal').modal('show');
                $('#formcarte').on('submit', function (event) {
                    var object = [];
                    $.each($('.formtosave'), function (index,element) {
                        var id = $(element).attr('data-value');
                        var valeur = $(element).val();
                        object.push({id:id,value:valeur});
                    });
                    $.ajax({
                        url: Routing.generate('puttemplates'),
                        type: 'post',
                        dataType: 'json',
                        data:{prodid:idprod,tpl:object},
                        success: function (data) {
                            debugger;
                        }
                    });

                    return false;
                });

            }
        });
        return false;
    });
});
function getAligne(str) {
    if (str == "L")
        return 'left';
    else if (str == 'C')
        return "center";
    else if (str == "R")
        return 'right'
    return 'left';
}