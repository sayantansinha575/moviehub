"use strict";
var handelSubmit = function () {

    var WriteName = (n) => {
        if (n == 0 || n == 1) {
            return 1;
        } else {
            return n * WriteName(n - 1);
        }
    }
    return {
        init: function () {
            console.log(WriteName(3));
        }
    }
}();

$(function () {
    handelSubmit.init();
})

