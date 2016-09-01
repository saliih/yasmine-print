/**
 * Created by sarra on 27/03/16.
 */
App.Views.Template = Backbone.View.extend({
    el: $('#zonetemplate'),
    events: {
        "click .link": 'redirectToform'
    },
    list: null,
    el: $('#zonetemplate'),
    currentelement: null,
    template: _.template("<div></div>"),
    initialize: function () {
    },
    redirectToform: function (event) {
        debugger;
    },
    viewAppended: function () {
        var self = this;

        // get old collection
        self.collection = new App.Collections.TemplateCollection();
        self.collection.setid(idprod);
        self.collection.fetch();
        self.collection.on('add', self.drawelement);
    },
    drawelement: function (model) {
        var self = this;
        var html = "<article class='col-md-3'>" +
            "<a href='#' class='link' data-value='" + model.get('id') + "'>" +
            "<img src='" + model.get('bg') + "' class='img-responsive' />" +
            '<h3>' + model.get('name') + '</h3></a>' +
            ' </article>';
        $('#zonetemplate').append(html);
    },
    render: function () {
        $('#zonetemplate').html(this.template());
        /*  this.setElement('page');
         this.el = this.template();
         return this;*/
    }
});