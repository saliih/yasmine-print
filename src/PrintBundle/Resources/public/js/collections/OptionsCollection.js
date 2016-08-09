/**
 * Created by sarra on 27/03/16.
 */
App.Collections.OptionsCollection = Backbone.Collection.extend({
    parentid: null,
    initialize: function (object) {
        this.parentid = object.id;
    },
    //model: App.Models.OptionModel,
    url: function () {
        return YP_URL + '/api/' + this.parentid + '/options';
    },
});