#!/usr/bin/env python
# -*- coding: utf-8 -*-
import urllib
import urllib2
import ssl
import re
from os.path import join as pjoin
import json
import os

content = '''
<!DOCTYPE html>
<html>
<head>
    <title></title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta content="telephone=no" name="format-detection" />
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black">
    <link rel="stylesheet" type="text/css" href="/static/weixin/css/weui.min.css" />
    <link rel="stylesheet" type="text/css" href="/static/weixin/css/jquery-weui.min.css" />
    <link rel="stylesheet" type="text/css" href="/static/weixin/css/index.css"/>
</head>

<body ontouchstart>             <!--pages/dt/dt-xsDetail.wxml-->
<style>

</style>
<div>
        <div class="section">
                <div class="weui-flex title_style">
                        <div class="weui-flex__item textc">当前批次：
                                <text class='timeColor'>2018年国庆节学生动态统计</text>
                        </div>
                </div>
        </div>

        <div class="weui-cells__title" style="color: #FF9800;font-size: 12px;">温馨提示：本次动态上报时间为2018-09-26 08:38:50到2018-09-30 23:55:50,请在改时间段内及时填写。</div>
        <form id="dForm" method="post" action="/stdDynamicWeixin/add" class="form-horizontal" role="form">
                <input type="hidden" name="student.id" id="student.id" value="38510">
                <input type="hidden" name="dynamicType.id" id="dynamicType.id" value="302">
                <input type="hidden" name="typeName" id="typeName" value="上报中">
                <input type="hidden" name="token" value="454c7c8c-2596-45e0-be07-ee153a90f947">
                        <input type="hidden" class="required" name="id" style="width: 200px;" value="14726">
        <div class="weui-cells weui-cells_after-title xueshengquxiang">
                <div class="weui-cell">
                        <div class="weui-cell__hd">
                                <div class="weui-label">当前学生：</div>
                        </div>
                        <div class="weui-cell__bd">
                                邵钰菓
                        </div>
                </div>

                <div class="weui-cell">
                        <div class="weui-cell__hd">
                                <div class="weui-label">学号：</div>
                        </div>
                        <div class="weui-cell__bd">
                                U201610030
                        </div>
                </div>
                <div class="weui-cell">
                        <div class="weui-cell__hd">
                                <div class="weui-label">动态类型：</div>
                        </div>
                        <div class="weui-cell__bd">
                                <input type="hidden" id="dtlxId" name="dtlxId"
                                                value="182"
                        >
                                <input class="weui-input" type="text" name="dtlx" id="dtlx"
                                                        value="旅行游乐"
                                />
                                <!--<picker bindchange="chooseWhere" value="{{dtlxIndex}}" range="{{dtlx}}">
                                        <div class="weui-select weui-select_in-select-after">{{dtlx[dtlxIndex]}}</div>
                                </picker>-->
                        </div>
                        <span class="weui-cell__ft"></span>
                </div>
                <div class="weui-cell weui-cell_input" id="remarkDiv">
                        <div class="weui-cell__hd">
                                <div class="weui-label">留校原因：</div>
                        </div>
                        <div class="weui-cell__bd">
                                <input class="weui-input" bindinput='' name="remark" id="remark"  value=""  />
                        </div>
                </div>
                <div class="weui-cell weui-cell_input" id="lxkssjDiv">
                        <div class="weui-cell__hd">
                                <div class="weui-label">留校开始时间：</div>
                        </div>
                        <div class="weui-cell__bd">
                                <input class="weui-input" bindinput='' data-toggle='date' name="lxkssj" id="lxkssj"  value=""  />
                        </div>
                </div>
                <div class="weui-cell weui-cell_input" id="lxjssjDiv">
                        <div class="weui-cell__hd">
                                <div class="weui-label">留校结束时间：</div>
                        </div>
                        <div class="weui-cell__bd">
                                <input class="weui-input" bindinput='' data-toggle='date' name="lxjssj" id="lxjssj"  value=""  />
                        </div>
                </div>
                <div class="weui-cell weui-cell_input" id="placeDiv">
                        <div class="weui-cell__hd">
                                <div class="weui-label">外出地点：</div>
                        </div>
                        <div class="weui-cell__bd">
                                <input class="weui-input" bindinput='' name="place" id="place"  value="武汉"  />
                        </div>
                </div>

                <div class="weui-cell weui-cell_input">
                        <div class="weui-cell__hd">
                                <div class="weui-label">联系方式：</div>
                        </div>
                        <div class="weui-cell__bd">
                                <input class="weui-input required" bindinput='' maxlength="11" onkeyup="value=value.replace(/[^\d]/g,'')" id="tel" name="tel"  value="13990007817"  />
                        </div>
                </div>
                <div class="weui-cell weui-cell_input" id="lxsjDiv">
                        <div class="weui-cell__hd">
                                <div class="weui-label">离校时间：</div>
                        </div>
                        <div class="weui-cell__bd">
                                <input class="weui-input"  name="lxsj" data-toggle='date' id="lxsj"   value="2018-09-30" />
                        </div>
                </div>

                <div class="weui-cell weui-cell_input" id="fxsjDiv">
                        <div class="weui-cell__hd">
                                <div class="weui-label">返校时间：</div>
                        </div>
                        <div class="weui-cell__bd">
                                <input class="weui-input"  name="fxsj" data-toggle='date' id="fxsj"   value="2018-10-06" />
                        </div>
                </div>

                <div class="weui-cell weui-cell_input">
                        <div class="weui-cell__hd">
                                <div class="weui-label">紧急联系人：</div>
                        </div>
                        <div class="weui-cell__bd">
                                <input class="weui-input" bindinput='' id="jjlxr" name="jjlxr"  value="邵敏" />
                        </div>
                </div>

                <div class="weui-cell weui-cell_input">
                        <div class="weui-cell__hd">
                                <div class="weui-label">紧急联系人电话：</div>
                        </div>
                        <div class="weui-cell__bd">
                                <input class="weui-input required" bindinput='' maxlength="11" onkeyup="value=value.replace(/[^\d]/g,'')" id="jjlxdh"name="jjlxdh"  value="13890015566" />
                        </div>
                </div>

                <div class="weui-cell">
                        <div class="weui-cell__hd">
                                <div class="weui-label">家长是否知情：</div>
                        </div>
                        <div class="weui-cell__bd">
                                <input class="weui-input"  name="jzsfzq" id="jzsfzq"  value="是"  />
                        </div>
                </div>

        </div>
        </form>
        <div class='pad20'>
                <button type='button' class="weui-btn weui-btn_primary" onclick="save()">
                                修改
                </button>
        </div>
</div>
<script type="text/javascript" src="/static/weixin/js/jquery-3.2.1.min.js"></script>
<script type="text/javascript" src="/static/weixin/js/jquery-weui.min.js"></script>
</body>
</html><script type="text/javascript">
        window.onload=function(){
        }

        $(document).ready(function(){

                        $("#remarkDiv").addClass("yc");
                        $("#lxkssjDiv").addClass("yc");
                        $("#lxjssjDiv").addClass("yc");

        });
        var lxsj=$("#lxsj").val();
        var fxsj=$("#fxsj").val();
        var lxkssj=$("#lxkssj").val();
        var lxjssj=$("#lxjssj").val();
        var dtlxVal =[];
        var dtlxList = [];
                        var codeOne ={id:'241',itemname:'留校'};
                dtlxList.push(codeOne);
                        dtlxVal.push('留校');
                        var codeOne ={id:'181',itemname:'回家探亲'};
                dtlxList.push(codeOne);
                        dtlxVal.push('回家探亲');
                        var codeOne ={id:'182',itemname:'旅行游乐'};
                dtlxList.push(codeOne);
                        dtlxVal.push('旅行游乐');
                        var codeOne ={id:'385',itemname:'兼职实习'};
                dtlxList.push(codeOne);
                        dtlxVal.push('兼职实习');
                        var codeOne ={id:'405',itemname:'学习培训竞赛'};
                dtlxList.push(codeOne);
                        dtlxVal.push('学习培训竞赛');
                        var codeOne ={id:'406',itemname:'其他'};
                dtlxList.push(codeOne);
                        dtlxVal.push('其他');

        $("#dtlx").picker({
                title: "请选择动态类型",
                cols: [{
                        textAlign: 'center',
                        values: dtlxVal
                }],
                onChange:function (res) {
                        var o = res.cols[0].value;
                        if(dtlxList!=null && dtlxList !="" && dtlxList.length!=0){
                                for(var i=0;i<dtlxList.length;i++){
                                        if(dtlxList[i].itemname == o){
                                                $("#dtlxId").val(dtlxList[i].id);
                                        }
                                }
                        }
                                if(o=='留校'){
                                        $("#placeDiv").addClass("yc");
                                        $("#lxsjDiv").addClass("yc");
                                        $("#fxsjDiv").addClass("yc");
                                }else {
                                        $("#placeDiv").removeClass("yc");
                                        $("#lxsjDiv").removeClass("yc");
                                        $("#fxsjDiv").removeClass("yc");
                                }
                }
        });

        $("#lxsj").calendar({
                dateFormat: 'yyyy-mm-dd',
                onChange:function(res) {
                        console.log(res);
                        lxsj = res.params.value;
                }
        });
        $("#fxsj").calendar({
                dateFormat: 'yyyy-mm-dd',
                onChange:function(res) {
                        console.log(res);
                        fxsj = res.params.value;

                }
        });

        $("#lxkssj").calendar({
                dateFormat: 'yyyy-mm-dd',
                onChange:function(res) {
                        console.log(res);
                        lxjssj = res.params.value;
                }
        });
        $("#lxjssj").calendar({
                dateFormat: 'yyyy-mm-dd',
                onChange:function(res) {
                        console.log(res);
                        lxkssj = res.params.value;

                }
        });


        $("#jzsfzq").picker({
                title: "",
                cols: [{
                        textAlign: 'center',
                        values: ["是", "否"]
                }]
        });

        function save(){
                var dtlx =$("#dtlx").val();
                var typeName='小长假';
                var remark=$("#remark").val();
                var lxkssj =$("#lxkssj").val();
                var lxjssj=$("#lxjssj").val();
                var tel=$("#tel").val();
                var place =$("#place").val();
                if(dtlx==null||dtlx==""){
                        $.alert("请选择动态类型");
                        return;
                }
                if(tel==null||tel==""){
                        $.alert("请填写联系方式");
                        return;
                }
                if(dtlx=='留校'){
                        if(typeName=='小长假'){
                                $("#place").val("");
                                $("#lxsj").val("");
                                $("#fxsj").val("");
                        }else if(typeName=='寒暑假'){
                                if(lxkssj==null||lxkssj==""){
                                        $.alert("请填写留校开始时间");
                                        return;
                                }
                                if(lxjssj==null||lxjssj==""){
                                        $.alert("请填写留校结束时间");
                                        return;
                                }
                                if(lxkssj>lxjssj){
                                        $.alert("留校结束时间在留校开始时间之后");
                                        return;
                                }
                                if(remark==null||remark==""){
                                        $.alert("请填写留校原因");
                                        return;
                                }
                                $("#place").val("");
                                $("#lxsj").val("");
                                $("#fxsj").val("");
                        }
                }else {
                        if(lxsj==null||lxsj==""){
                                $.alert("请填写留校时间");
                                return;
                        }
                        if(place==null||place==""){
                                $.alert("请填写去向地点");
                                return;
                        }
                        if(fxsj==null||fxsj==""){
                                $.alert("请填写返校时间");return;
                        }
                        if(lxsj>fxsj){
                                $.alert("返校时间在离校时间之后");return;
                        }
                }
                var jjlxr = $("#jjlxr").val();
                if(jjlxr==null||jjlxr==""){
                        $.alert("请填写紧急联系人");return;
                }
                var jjlxdh = $("#jjlxdh").val();
                if(jjlxdh==null||jjlxdh==""){
                        $.alert("请填写紧急联系人电话");return;
                }
                var jzsfzq = $("#jzsfzq").val();
                if(jzsfzq==null||jzsfzq==""){
                        $.alert("请选择家长是否知情");return;
                }
                $.confirm("确认提交吗?", function () {
                        $('#dForm').submit();
                });
        }

</script>
'''
pattern = r'当前学生：.*?<div class="weui-cell__bd">(.*?)</div>.*?学号：.*?<div class="weui-cell__bd">(.*?)</div>.*?id="tel" name="tel"  value="(.*?)"  />.*?紧急联系人.*?value="(.*?)" />.*?name="jjlxdh"  value="(.*?)" />'

items = re.findall(pattern,content,re.I|re.S|re.M)
for item in items:
    print item[0].strip(),item[1].strip(),item[2].strip(),item[3].strip(),item[4].strip()
name_emb = {'NAME':item[0].strip(),'SNO':item[1].strip(),'TEL':item[2].strip(),'PAR':item[3].strip(),'TEL_PAR':item[4].strip()}
output_dir = r'./'
listdir = os.listdir(output_dir)
if 'data.json' in listdir:
        fr = open(pjoin(output_dir, 'data.json'), 'a')
        model=json.dumps(name_emb,ensure_ascii=False)
        fr.write(model)
        fr.close()