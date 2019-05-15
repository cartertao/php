$(function() {

});
(function() {

})(jQuery);
$(function() {
    //查询
    window.singleSubmit = function(tableName) {
        $("#data").empty();
        $("#tableHeader").empty();
        var param = $("#" + tableName + " :input").filter(function(index, element) {
            return $(element).val() != "";
        }).serialize();
        param = decodeURIComponent(param, true);
        //把回车替换成逗号
        param = param.replace(/\r\n/g, ",");
        param = param.replace(/\n/g, ",");
        //去掉空格
        param = param.replace(/\s/g, "");
        //去掉末尾  ，
        while (param.substring(param.length - 1) == ",") {
            param = param.substring(0, param.length - 1);
        }
        //去掉连续的 ，
        param = param.replace(/,,*/g, ",");
        var data = 'table=' + tableName;
        if (param != null && param != '' && param != undefined) {
            data = param + "&table=" + tableName;
        }
        if (tableName == '2catalogpnlist') {
            $.myPost({ url: "/mainSearch/moreTable/2catalogpnlist", data: data, rollb: mainSearchRoll });
        } else {
            $.myPost({ url: "/mainSearch/singleTable", data: data, rollb: mainSearchRoll });
        }
    };

    function mainSearchRoll(msg) {
        if (msg.success == 'error') {
            alert(msg.msg);
        } else {
            createHtml(msg.data);
        }
    }

    function createHtml(list) {
        //渲染表头
        var tableHeader = '<tr>';
        $.each(list[0], function(key, value) {
            tableHeader += '<th>' + key + '</th>';
        });
        tableHeader += '</tr>';
        var $headerHtml = $(tableHeader);
        $headerHtml.appendTo("#tableHeader");
        //渲染表数据
        for (var i in list) {
            var row = list[i];
            //渲染表数据
            var html = '<tr>';
            $.each(row, function(key, value) {
                html += '<th>' + value + '</th>';
            });
            html += '</tr>';
            var $html = $(html);
            $html.appendTo("#table1");
        }
    }
});