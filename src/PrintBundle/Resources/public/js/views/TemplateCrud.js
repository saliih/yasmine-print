/**
 * Created by sarra on 27/03/16.
 */
App.Views.Template = Backbone.View.extend({
    el: $('page'),
    events: {
        "click #addinput": 'addinput',
        "click .editelement": 'editelement',
        "click page": 'xyLayout'
    },
    currentelement: null,
    template: _.template("<page></page>"),
    initialize: function () {
        this.el = $('page');
        //this.model.on('change', this.render, this);
    },
    editelement: function (event) {
        var self = this;
        var id = $(event.currentTarget).attr('data-value');
        var entity = self.collection.get(id);
        var form = new OptionForm({model: entity})
        form.render();
        console.log(entity);
        return false;
    },
    viewAppended: function () {
        var self = this;
        $('page').css({
            'height': objectTemplateheight,
            'width': objectTemplatewidth,
            'background-image': 'url(' + objectTemplatepng + ')',
            'background-repeat': 'no-repeat'
        });
        // get old collection
        self.collection = new App.Collections.OptionsCollection({id: objectTemplate});
        self.collection.on('add', self.drawElement, self);
        self.collection.fetch();

    },
    setCurrentElement: function (x, y) {
        var self = this;
        self.currentelement.set('x', x);
        self.currentelement.set("y", y);
        self.currentelement.set("height", 25);
        self.currentelement.set("width", 125);
        bootbox.prompt("Précise le nom de champs dans le csv", function (result) {
            if (result) {
                self.currentelement.set('name', result);
                self.currentelement.save();
                self.collection.add(self.currentelement);
                self.currentelement = null;
            }
            else {
                bootbox.alert('Spécifier le nom du champs dans le fichier csv')
            }
        });
    },
    xyLayout: function (e) {
        var self = this;
        if (self.currentelement != null) {
            var offset = $('page').offset();
            var x = e.pageX - offset.left;
            var y = e.pageY - offset.top;
            self.setCurrentElement(x, y);
        }
        return false;

    },
    addinput: function (event) {
        var self = this;
        $.notify({
            title: "<strong>Info:</strong> ",
            message: "Sélectionnez la zone d'écriture",
            type: 'danger'
        });
        self.currentelement = new App.Models.OptionModel();
        self.currentelement.set('templateid', objectTemplate);
        self.currentelement.set("type", "text");
        //self.currentelement.on('change', self.drawElement, self);
    },
    drawElement: function (model) {
        var self = this;

        $('page').append('<div id="element' + model.get('id') + '" data-value="' + model.get('id') + '">' + model.get('name') + '</div>');
        var $element = $('#element' + model.get('id'));
        var style = {
            position: 'inherit',
            top: model.get('y'),
            left: model.get('x'),
            width: model.get('width'),
            height: model.get('height'),
            color: model.get('color'),
            'font-size': model.get('fontsize'),
            'font': model.get('font'),
            'text-align': model.get('align'),
            'line-height': model.get('height') + "px",
            border: '#000 1px solid'
        }
        if (model.get('bold'))style['font-weight'] = 'bold';
        $element.css(style);
        var html = '<div class="boxaaa" id="element-'+model.get('id')+'">'+model.get('name')+'<button href="#" class="btn pull-right editelement" data-value="'+model.get('id')+'"><i class="fa fa-pencil"></i> </button><button href="#" class="btn pull-right deletelement" data-value="'+model.get('id')+'""><i class="fa fa-trash"></i> </a></div>';
        $('#allelement').append(html);
    },
    render: function () {
        $("#job").html(this.template());
        /*  this.setElement('page');
         this.el = this.template();
         return this;*/
    }
});