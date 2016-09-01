/**
 * Created by sarra on 30/03/16.
 */
OptionForm =  Backform.Form.extend({
    el: ".formulaire",
    fields: [
        {
            name: "name",
            label: "Intitulé",
            control: "input",
            required: "required"
        },
        {
            name: "x",
            label: "x",
            control: "input",
            required: "required"
        },
        {
            name: "y",
            label: "y",
            control: "input",
            required: "required"
        },
        {
            name: "width",
            label: "Largeur",
            control: "input",
            required: "required"
        },
        {
            name: "height",
            label: "hauteur",
            control: "input",
            required: "required"
        },
        {
            name: "font",
            label: "Police",
            control: "input",
            required: "required"
        },
        {
            name: "fontsize",
            label: "Taille de Police",
            control: "input",
            required: "required"
        },
        {
            name: "bold",
            label: "Gras",
            control: "boolean",
            required: "required"
        },
        {
            name: "color",
            label: "Couleur",
            control: "input",
            required: "required"
        },
        {
            name: "align",
            label: "alignement",
            control: "input",
            required: "required"
        }
    ],
    events: {
        "change": function () {
            //e.preventDefault();
            var model = this.model;
            model.url = YP_URL+ '/api/options/' + model.get('id');
            model.save().done(function () {
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
            });

            return false;
        }
    },

});