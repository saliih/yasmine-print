/**
 * Created by sarra on 26/03/16.
 */
App.Models.Template = Backbone.Model.extend({
    urlRoot: YP_URL + '/api/template',
    defaults: {
        "bg": null,
        "id": null,
        "name": null
    }
});