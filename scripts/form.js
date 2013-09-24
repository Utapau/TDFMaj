var __extends = this.__extends || function (d, b) {
    for (var p in b) if (b.hasOwnProperty(p)) d[p] = b[p];
    function __() { this.constructor = d; }
    __.prototype = b.prototype;
    d.prototype = new __();
};
var InputType = (function () {
    function InputType() {
    }
    InputType.Text = "text";
    InputType.Password = "password";
    InputType.Radio = "radio";
    InputType.Checkbox = "checkbox";
    return InputType;
})();

var Field = (function () {
    function Field() {
    }
    return Field;
})();

var Input = (function (_super) {
    __extends(Input, _super);
    function Input(label, id, name, type) {
        _super.call(this);
    }
    return Input;
})(Field);

var Form = (function () {
    function Form(id, method) {
        this.form = $(document.createElement("form"));
    }
    Form.prototype.get = function () {
        return this.form;
    };

    Form.prototype.addField = function (field) {
        this.fields.push(field);
    };
    return Form;
})();

$(document).ready(function () {
    alert(os.uptime());
});
