var TabManager;
(function (TabManager) {
    var Tab = (function () {
        function Tab(id, name, button) {
            this.id = id;
            this.name = name;
            this.button = button;
            this.hide();
        }
        Tab.prototype.show = function () {
            if (!$(this.button).hasClass("btn-primary"))
                $(this.button).toggleClass("btn-primary");

            $("#" + this.name).slideDown(200);
        };

        Tab.prototype.hide = function () {
            if ($(this.button).hasClass("btn-primary"))
                $(this.button).toggleClass("btn-primary");

            $("#" + this.name).slideUp(200);
        };
        return Tab;
    })();
    TabManager.Tab = Tab;

    var Tabs = (function () {
        function Tabs() {
            this.tabs = [];
        }
        Tabs.prototype.addTab = function (id, name, button) {
            this.tabs.push(new Tab(id, name, button));
        };

        Tabs.prototype.setActive = function (id) {
            for (var i = 0; i < this.tabs.length; i++) {
                if (i == id) {
                    this.tabs[i].show();
                } else
                    this.tabs[i].hide();
            }
        };
        return Tabs;
    })();
    TabManager.Tabs = Tabs;
})(TabManager || (TabManager = {}));

var ohmytabs = new TabManager.Tabs();

function setActive(event) {
    ohmytabs.setActive(event.data.id);
}

$(document).ready(function () {
    var i = 0;

    $("#tabs button").each(function () {
        ohmytabs.addTab(i, $(this).attr("name"), this);
        $(this).on('click', { id: i }, setActive);

        i = i + 1;
    });

    ohmytabs.setActive(0);
});
