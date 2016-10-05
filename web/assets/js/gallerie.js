$(document).ready(function () {
    $(".link").on('click', function (event) {
        $('#zoneedit').html('');
        $('#tableform>tbody').html('');
        var id = $(event.currentTarget).attr('data-value');
        var bg = $(event.currentTarget).find('img').attr('src');
        $('#zoneedit').html('<img src='+bg+' width="425" height="275" />');
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
                        'police': (obj.police/2),
                        'line-height': ((obj.y2 - obj.y1)/2)  + "px",
                        'size': obj.size + "px",
                        'width': ((obj.x2 - obj.x1) /2 )+ "px",
                        'height':  ((obj.y2 - obj.y1)/2) + "px",
                        'top': (obj.x1/2)  + "px",
                        'left': (obj.y1/2)  + "px",
                    });

                    $('#tableform tbody').append('<tr></tr>');
                    $('#tableform tbody tr').eq(index).append(
                        '<th>'+obj.name+'</th>' +
                        '<td><input data-value="'+obj.id+'"  class="formtosave"  type="text" id="input-'+obj.id+'"/>' +
                        '<td><input data-value="'+obj.id+'" value="'+obj.color+'"  class="formtocolor" placeholder="Coleur" type="text" id="input-color-'+obj.id+'"/></td>' +
                        '<td><select placeholder="selectionnez" data-value="'+obj.id+'"  class="formalign form-control"  type="text" id="input-align-'+obj.id+'">' +
                        '<option value="left">Gauche</option>' +
                        '<option value="right">Droite</option>' +
                        '<option value="center">Centre</option>' +
                        '</select></td>' +
                        '<td><select placeholder="selectionnez" data-value="'+obj.id+'"  class="formpolice form-control"  type="text" id="input-police-'+obj.id+'">' +
                        '<option value="Arial">Arial</option>' +
                        '<option value="Tahoma">Tahoma</option>' +
                        '<option value="Verdana">Verdana</option>' +
                        '</select></td>' +
                        '</td>'
                    );debugger;
                    $('#input-color-'+obj.id).colorpicker();
                    // put collapse
                    $('.formtosave, .formtocolor,.formalign, .formpolice').on('keyup keypress blur change', function (event) {
                       var id = $(this).attr('data-value');
                        var text = $('#input-'+id).val();
                        $('#box'+id).html(text);
                        var color = $('#input-color-'+id).val();
                        var align = $('#input-align-'+id).val();
                        var police = $('#input-police-'+id).val();
                        $('#box'+id).css({
                            'text-align': align,
                            'color':color,
                            'font-family': police,
                        });
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
                            $('#myModal').modal('hide')
                            bootbox.alert("Votre Template est enregistré");
                        }
                    });

                    return false;
                });

            }
        });
        return false;
    });

    $('.optionprice').on("click", function (event) {
        var price = $(event.currentTarget).val();
        $('.boxSubmit>h5').html('Prix');
        $('.boxSubmit>h6').html(price+" <sup>DT</sup>");
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