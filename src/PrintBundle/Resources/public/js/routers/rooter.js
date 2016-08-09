App.Routers.Template = Backbone.Router.extend({
    routes: {
        '': 'index',
        'entries/:id' : 'show'
    },
    events: function () {
        return
    },
    initialize: function() {
       // this.collection = new App.Collections.Entries();
        //this.collection.fetch();
    },
    index: function() {
        view =  new App.Views.Template();
        view.setElement($('#jobzone'));
       // $('#jobzone').html(view.render().el);
        view.viewAppended();
    },
    show: function(id) {
        alert('entry id:' + id);
    }

});