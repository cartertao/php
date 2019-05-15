/*
    发送请求
    function roll(msg){}
    $.myPost({"url":"/data/api/query/basesellproducts","rollb":roll});
*/
(function($, window, document, undefined) {
    var defaultPost = function(opt) {
        this.defaults = {
                "url": "",
                "data": "",
                "type": "post",
                "dataType": "json",
                "cache": "true"
            },
            this.options = $.extend({}, this.defaults, opt)
    }
    defaultPost.prototype = {
        sentPost: function() {
            if (this.options.url == null || this.options.url == '' || this.options.url == undefined) {
                console.log("url参数为空");
                return;
            } else {
                var defaultPostObject = this;
                $.ajax({
                    "headers": this.options.headers,
                    "url": this.options.url,
                    "data": this.options.data,
                    "type": this.options.type,
                    "dataType": this.options.dataType,
                    "success": function(msg) {
                        defaultPostObject.options.rollb(msg);
                    },
                    "error": function() {
                        console.log("请求发送失败");
                        return;
                    }
                })
            }
        }
    }
    $.extend({
        myPost: function(opt) {
            var sent = new defaultPost(opt);
            sent.sentPost();
        }
    })
})(jQuery, window, document);