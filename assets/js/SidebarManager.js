$(function() {
    myApp.sidebarManager = new SidebarManager();
    myApp.sidebarManager.initialize();
});
var SidebarManager = function() {

    "use strict";

    var self = this;

    this.initialize = function() {
        this.iniSidebar();
        this.eventDelegation();
    };

    this.eventDelegation = function() {

    };

    this.iniSidebar = function() {
        // $("[data-select2-custom]").each(function() {
        //     self.initializeSelect2(this)
        // });
    };

    this.initializeSidebar = function(self) {
        // $(self).select2({
        //     language: {
        //         noResults: function() {
        //             return $(self).data("select2-noresult")
        //         }
        //     },
        //     placeholder: $(self).data("select2-placeholder"),
        //     allowClear: !0
        // });
    }
};