<!DOCTYPE html>
<html lang="en">

<head>
    <?php
        require_once  '../include/header.php';
    ?>
    <script src="\static\js\searchMain.js"></script>
</head>
<style>

</style>

<body>
    <div class="container">
        <div class="row" >
            <div class="border selectColumn col-sm-3">
                <form class="form-inline mt-3" id="1catalogvenderheader" role="form">
                    <div class="text-center" style="width:100%">
                        1catalogvenderheader
                    </div>
                    <div class="input-group col-9 input-group-sm mt-3">
                        <textarea class="form-control" rows="5" name="厂家代码" placeholder="厂家代码"></textarea>
                    </div>
                    <div class="input-group col-2 input-group-sm mt-2">
                        <input type="button" class="btn btn-primary" id="mainSearchSubmit" onclick="singleSubmit('1catalogvenderheader')" value="查询">
                        <input type="reset" class="btn btn-primary mt-2" value="清空">
                    </div>
                </form>

                <form class="form-inline mt-3" id="2catalogpnlist" role="form">
                    <div class="text-center" style="width:100%">
                        2catalogpnlist
                    </div>
                    <div class="input-group col-9 input-group-sm mt-3">
                        <textarea class="form-control" rows="5" name="件号" placeholder="件号"></textarea>
                    </div>
                    <div class="input-group col-2 input-group-sm mt-2">
                        <input type="button" class="btn btn-primary" id="mainSearchSubmit" onclick="singleSubmit('2catalogpnlist')" value="查询"/>
                        <input type="reset" class="btn btn-primary mt-2" value="清空">
                    </div>
                </form>

                <form class="form-inline mt-3" id="4stockupdate" role="form">
                    <div class="text-center" style="width:100%">
                        4stockupdate
                    </div>
                    <div class="input-group col-9 input-group-sm mt-3">
                        <textarea class="form-control" rows="5" name="件号" placeholder="件号"></textarea>
                    </div>
                    <div class="input-group col-2 input-group-sm mt-2">
                        <input type="button" class="btn btn-primary" id="mainSearchSubmit" onclick="singleSubmit('4stockupdate')" value="查询">
                        <input type="reset" class="btn btn-primary mt-2" value="清空">
                    </div>
                </form>
            </div>
            <div class="col-sm-1">
            </div>
            <table class="table table-striped table-bordered table-hover text-center col-sm-8" id="table1" style="font-size:12px">
                <thead  class="table-primary font-italic" id="tableHeader"> 

                </thead>
                <tbody class=" font-weight-light" id="data">
                </tbody>
            </table>
        </div>
    </div>
</body>
    <script>
    </script>

</html>