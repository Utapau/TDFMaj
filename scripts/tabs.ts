declare var $;

module TabManager
{
    export class Tab
    {
        constructor(public id: number, public name: string, public button: HTMLElement)
        {
            this.hide();
        }

        public show() : void
        {
            if(!$(this.button).hasClass("btn-primary"))
                $(this.button).toggleClass("btn-primary");

            $("#" + this.name).slideDown(200);
        }

        public hide() : void
        {
            if($(this.button).hasClass("btn-primary"))
                $(this.button).toggleClass("btn-primary");

            $("#" + this.name).slideUp(200);
        }
    }

    export class Tabs
    {
        public tabs : Tab[];

        constructor()
        {
            this.tabs = [];
        }

        public addTab(id: number, name: string, button: HTMLElement) : void
        {
            this.tabs.push(new Tab(id, name, button));
        }

        public setActive(id: number) : void
        {
            for(var i = 0; i < this.tabs.length; i++)
            {
                if(i == id)
                {
                    this.tabs[i].show();
                }
                else
                    this.tabs[i].hide();
            }
        }
    }
}

var ohmytabs : TabManager.Tabs = new TabManager.Tabs();

function setActive(event: any)
{
    ohmytabs.setActive(event.data.id);
}

$(document).ready(
    function()
    {
        var i = 0;

        $("#tabs button").each(function()
        {
            ohmytabs.addTab(i, $(this).attr("name"), this);
            $(this).on('click', { id: i } , setActive);

            i = i + 1;
        });

        ohmytabs.setActive(0);
    }
);