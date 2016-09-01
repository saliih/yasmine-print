window.App = {
  Models: {},
  Collections: {},
  Views: {},
  Routers: {},
  init: function() {
    new App.Routers.Template();
    Backbone.history.start();
  }
};

$(document).ready(function(){
  App.init();
});
