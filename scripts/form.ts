declare var $;

class InputType
{
    public static Text: string = "text";
    public static Password: string = "password";
    public static Radio: string = "radio";
    public static Checkbox: string = "checkbox";
}

class Field
{
    constructor()
    {

    }
}

class Input extends Field
{
    private input: HTMLElement;

    constructor(label: string, id: string, name: string, type: string)
    {
        super();
    }
}

class Form
{
    private form: HTMLElement;
    private fields: Field[];

    constructor(id: string, method: string)
    {
        this.form = $(document.createElement("form"));
    }

    private get() : HTMLElement
    {
        return this.form;
    }

    addField(field: Field) : void
    {
        this.fields.push(field);
    }
}

$(document).ready(function()
{
    alert(os.uptime());
});