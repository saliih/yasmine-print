/**
 * Created by sarra on 27/03/16.
 */
App.Collections.TemplateCollection = Backbone.Collection.extend({
    parentid: null,
    initialize: function () {
    },
    setid: function (id) {
      this.parentid = id;
    },
    model: App.Models.Template,
    url: function () {
        return YP_URL + '/api/' + this.parentid + '/templates';
    },

});