/**
 * Created by sarra on 27/03/16.
 */
App.Models.OptionModel = Backbone.Model.extend({
    defaults: {
        'id': 0,
        'name': null,
        'type': null,
        'templateid': null,
        'x':0,
        'y':0,
        'width':0,
        'height':0,
        'font':"arial",
        'fontsize':"12",
        "bold":false,
        "color":"#ffffff",
        'align':'left',

    },
    puturl: function (url) {debugger;
        this.url = YP_URL + url;
    },
    urlRoot: YP_URL + '/api/options',
    url: function () {
        var base = this.urlRoot || this.collection.url || urlError();
        if (this.isNew()) return base;
        console.log(base + (base.charAt(base.length - 1) == '/' ? '' : '/') + encodeURIComponent(this.id));
        return base + (base.charAt(base.length - 1) == '/' ? '' : '/') + encodeURIComponent(this.id) ;
    },

});