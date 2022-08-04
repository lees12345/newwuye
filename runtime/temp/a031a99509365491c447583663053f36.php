<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:76:"/home/wwwroot/only.1yuaninfo.com/./application/index/view/service/order.html";i:1638406613;}*/ ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0,minimum-scale=1,maximum-scale=1,user-scalable=no">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>历史记录</title>
    <link rel="stylesheet" href="http://only.1yuaninfo.com/public/static/index/css/layui.css" />

    <!-- 引入 Vue 文件 -->
    <script src="https://cdn.jsdelivr.net/npm/vue@2.6/dist/vue.min.js"></script>
    <!-- <script src="./axios.js"></script> -->
    <script src="http://only.1yuaninfo.com/public/static/index/allpublic/js/axios.js"></script>

    <!-- <script src="http://zztong.admin.gszx77.com/public/static/admin/assets/js/distios/axios.min.js"></script> -->
    <script type="text/javascript" src="/public/static/index/zhuce/js/jquery-2.1.1.min.js"></script>
    <script src="http://only.1yuaninfo.com/public/static/index/js/layui.js"></script>


    <style>
        body {
            margin: 0;
            padding: 0;
            background-color: rgba(245, 245, 245, 1);
            /* padding: 10px; */
        }
        
        * {
            padding: 0;
            margin: 0;
        }
        
        .mainStyle {
            overflow-y: scroll;
            /* padding:10px; */
        }
        
        .arrItem {
            width: auto;
            height: auto;
            padding: 10px;
            background: #FFFFFF;
            border-radius: 10px;
        }
        
        .listheader {
            font-size: 16px;
            font-family: Source Han Sans SC;
            color: #333333;
            font-weight: bold;
        }
        
        .headerFlag {
            display: inline-block;
            width: 6px;
            height: 15px;
            background: rgba(240, 0, 0, 1);
            border-radius: 3px;
        }
        
        .listheaderR {
            font-size: 16px;
            font-family: Source Han Sans SC;
            font-weight: 400;
            color: #666666;
        }
        
        .itemtype {
            font-size: 15px;
            font-weight: 500;
            color: #333333;
        }
        
        .itemrightVal {
            font-size: 15px;
            font-weight: 400;
            color: #666666;
        }
        
        .footerText {
            text-align: center;
            font-size: 12px;
            font-family: Source Han Sans SC;
            font-weight: 400;
            color: #BBBBBB;
        }
        
        .flex-h {
            display: -webkit-box;
            /* android 2.1-3.0, ios 3.2-4.3 */
            display: -webkit-flex;
            /* Chrome 21+ */
            display: -ms-flexbox;
            /* WP IE 10 */
            display: flex;
            /* android 4.4 */
        }
        
        .flex-vh-center {
            -webkit-box-align: center;
            /* android 2.1-3.0, ios 3.2-4.3 */
            -webkit-align-items: center;
            /* Chrome 21+ */
            -ms-flex-align: center;
            /* WP IE 10 */
            align-items: center;
            /* android 4.4 */
        }
        
        .flex-between {
            /*! autoprefixer: off */
            -webkit-box-pack: justify;
            /* android 2.1-3.0, ios 3.2-4.3 */
            -webkit-justify-content: space-between;
            /* Chrome 21+ */
            -ms-flex-pack: justify;
            /* WP IE 10 */
            justify-content: space-between;
        }
        
        .padt10 {
            /* padding-top: 10px; */
        }
        
        .padb10 {
            padding-bottom: 10px;
        }
        
        .ft-16 {
            font-size: 16px;
        }
        
        .marl5 {
            margin-right: 5px;
        }
        
        .marb10 {
            margin-bottom: 10px;
        }
        
        .sideul {
            border-radius: 10px;
            overflow: hidden;
            width: 100%;
            margin: auto;
        }
        
        .sideul li {
            width: 49%;
            float: left;
            list-style: none;
            background: #E9E9E9;
            text-align: center;
            padding: 8px 0;
            cursor: pointer;
        }
        
        .sideulTwo {
            overflow: hidden;
            width: 100%;
            margin: auto;
            margin-top: 10px;
            display: flex;
        }
        
        .sideulTwo li {
            width: 20%;
            float: left;
            flex: 1;
            list-style: none;
            background: #E9E9E9;
            text-align: center;
            padding: 9px 0;
            cursor: pointer;
            margin-right: 7px;
            border-radius: 6px;
        }
        
        li.sideul_checked {
            background: #FFFFFF;
            border-radius: 10px;
        }
        
        li.sideul_checked_two {
            background: #CA0B0B;
            color: #FFFFFF;
        }
        
        .seach_div {
            margin: 10px 0;
        }
        
        .arrTitle {
            padding: .2rem 0;
            color: #323232;
            overflow: hidden;
        }
        
        .bgColorDiv {
            overflow: hidden;
            background: #FFFFFF;
            padding: 10px;
        }
        
        .bgColorDivTwo {
            overflow: hidden;
            background: #FFFFFF;
            padding: 10px;
            margin-bottom: 10px;
        }
    </style>
</head>

<body>
    <div id="Vue">
        <div class="bgColorDiv">
            <div class="seach_div">
                <div class="demoTable">
                    <div class="layui-inline">
                        <input class="layui-input" name="id" id="demoReload" autocomplete="off" placeholder="股票代码/股票名称/状态">
                    </div>
                    <button class="layui-btn" data-type="reload" @click="searchFun('search')"><i class="layui-icon layui-icon-search"></i></button>
                </div>
            </div>
            <ul class="sideul">
                <li :class="checkedFlag ? 'sideul_checked': ''" @click="checkedClick(1)">个人记录</li>
                <li :class="!checkedFlag ? 'sideul_checked': ''" @click="checkedClick(2)">平台记录</li>
            </ul>

        </div>

        <div class="mainStyle padt10 padb10">
            <div>
                <div v-show="checkedFlag" class="arrItem_all">
                    <div class="bgColorDivTwo">
                        <ul class="sideulTwo">
                            <li :class="checkedValue == 6 ? 'sideul_checked_two': ''" @click="checkedClickState(6)">全部</li>
                            <li :class="checkedValue == 1 ? 'sideul_checked_two': ''" @click="checkedClickState(1)">止盈</li>
                            <li :class="checkedValue == 2 ? 'sideul_checked_two': ''" @click="checkedClickState(2)">止损</li>
                            <li :class="checkedValue == 0 ? 'sideul_checked_two': ''" @click="checkedClickState(0)">持股中</li>
                        </ul>
                        <div class="arrTitle" v-show="seeFlag">共查看{{arrLists.see_num}}次，其中：止盈{{arrLists.success_num}}次，止损{{arrLists.error_num}}次，持股中{{arrLists.hold_num}}支。</div>
                    </div>

                    <div class="arrItem marb10" :key="item.id" v-for="(item,index) in arrListsContent" v-if="item.news_code">
                        <div class="flex-h flex-between padb10 marb10" style="border-bottom: solid 1px rgba(204, 204, 204, 1);">
                            <div class="listheader flex-h flex-vh-center">
                                <div class="headerFlag marl5"></div>{{item.news_code}}{{item.id}}</div>
                            <div class="listheaderR">
                                <template>
                                    <font v-if="item.shares_status=='止盈'" style="color: #FF0000">{{item.shares_status}}</font>
                                    <font v-if="item.shares_status=='止损'" style="color: #00A442">{{item.shares_status}}</font>
                                    <font v-if="item.shares_status=='调仓'" style="color: #FF9C00">{{item.shares_status}}</font>
                                    <font v-if="item.shares_status=='持股'" style="color: #ffda04">{{item.shares_status}}</font>
                                    <font v-if="item.shares_status=='暂无'">{{item.shares_status}}</font>
                                </template>
                            </div>
                        </div>
                        <div class="flex-h flex-between padb10">
                            <div class="itemtype">推送时间</div>
                            <div class="itemrightVal">{{item.push_time}}</div>
                        </div>
                        <div class="flex-h flex-between padb10">
                            <div class="itemtype">点击时间</div>
                            <div class="itemrightVal">{{item.click_time}}</div>
                        </div>
                        <div class="flex-h flex-between padb10">
                            <div class="itemtype">卖出时间</div>
                            <div class="itemrightVal" v-if="item.shares_status=='持股'">暂无</div>
                            <div class="itemrightVal" v-else>
                                {{item.end_time}}</div>
                        </div>
                        <div class="flex-h flex-between padb10">
                            <div class="itemtype">备注</div>
                            <div class="itemrightVal">
                                <template>
                                    <font v-if="item.shares_status=='止盈'" style="color: #FF0000">{{item.remark}}</font>
                                    <font v-if="item.shares_status=='止损'" style="color: #00A442">{{item.remark}}</font>
                                    <font v-if="item.shares_status=='调仓'" style="color: #666666">{{item.remark}}</font>
                                    <font v-if="item.shares_status=='持股'" style="color: #ffda04">{{item.remark}}</font>
                                    <font v-if="item.shares_status=='暂无'">{{item.remark}}</font>
                                </template>
                            </div>
                        </div>
                    </div>
                </div>
                <div v-show="!checkedFlag" class="arrItem_all">
                    <div class="bgColorDivTwo">
                        <ul class="sideulTwo">
                            <li :class="checkedValues == 6 ? 'sideul_checked_two': ''" @click="checkedClickStates(6)">全部</li>
                            <li :class="checkedValues == 1 ? 'sideul_checked_two': ''" @click="checkedClickStates(1)">止盈</li>
                            <li :class="checkedValues == 2 ? 'sideul_checked_two': ''" @click="checkedClickStates(2)">止损</li>
                            <li :class="checkedValues == 0 ? 'sideul_checked_two': ''" @click="checkedClickStates(0)">持股中</li>
                        </ul>
                        <div class="arrTitle" v-show="seeFlag">共推送{{arrListss.push_num}}次，其中：止盈{{arrListss.success_num}}次，止损{{arrListss.error_num}}次，持股中{{arrListss.hold_num}}支。</div>
                    </div>
                    <div class="arrItem marb10" :key="item.id" v-for="(item,index) in arrListssContent" v-if="item.news_code">
                        <div class="flex-h flex-between padb10 marb10" style="border-bottom: solid 1px rgba(204, 204, 204, 1);">
                            <div class="listheader flex-h flex-vh-center">
                                <div class="headerFlag marl5"></div>{{item.news_code}}</div>
                            <div class="listheaderR">
                                <template>
                                <font v-if="item.shares_status=='止盈'" style="color: #FF0000">{{item.shares_status}}</font>
                                <font v-if="item.shares_status=='止损'" style="color: #00A442">{{item.shares_status}}</font>
                                <font v-if="item.shares_status=='调仓'" style="color: #FF9C00">{{item.shares_status}}</font>
                                <font v-if="item.shares_status=='持股'" style="color: #ffda04">{{item.shares_status}}</font>
                                <font v-if="item.shares_status=='暂无'">{{item.shares_status}}</font>
                            </template>
                            </div>
                        </div>
                        <div class="flex-h flex-between padb10">
                            <div class="itemtype">推送时间</div>
                            <div class="itemrightVal">{{item.add_time}}</div>
                        </div>
                        <div class="flex-h flex-between padb10">
                            <div class="itemtype">卖出时间</div>
                            <div class="itemrightVal">{{item.end_time}}</div>
                        </div>
                        <div class="flex-h flex-between padb10">
                            <div class="itemtype">备注</div>
                            <div class="itemrightVal">
                                <template>
                                <font v-if="item.shares_status=='止盈'" style="color: #FF0000">{{item.remark}}</font>
                                <font v-if="item.shares_status=='止损'" style="color: #00A442">{{item.remark}}</font>
                                <font v-if="item.shares_status=='调仓'" style="color: #666666">{{item.remark}}</font>
                                <font v-if="item.shares_status=='持股'" style="color: #ffda04">{{item.remark}}</font>
                                <font v-if="item.shares_status=='暂无'">{{item.remark}}</font>
                            </template>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

            <div v-if="footerFlag" class="footerText">已经到底了～</div>
            <div v-if="!footerFlag" class="footerText" style="font-size: 16px;">暂未更新！</div>
        </div>
    </div>
    <script text="text/javascript">
        $(".arrItem_all:gt(0)").hide();
        $(".sideul li").click(function() {

        });
        new Vue({
            el: "#Vue",
            data: {
                arrLists: [],
                arrListsContent: [],
                arrListss: [],
                arrListssContent: [],
                footerFlag: true,
                checkedFlag: true,
                seeFlag: true,
                checkedValue: 6,
                checkedValues: 6,
                user_id: '',
                name: ''
            },
            filters: {
                // 筛选接口日期数据
                formatDate(val) {
                    if (!!val) {
                        let date = new Date(val * 1000);
                        let Y = date.getFullYear();
                        let M = (date.getMonth() + 1 < 10 ? '0' + (date.getMonth() + 1) : date.getMonth() + 1);
                        let D = date.getDate() < 10 ? '0' + date.getDate() : date.getDate();
                        let h = date.getHours() < 10 ? '0' + date.getHours() : date.getHours();
                        let m = date.getMinutes() < 10 ? '0' + date.getMinutes() : date.getMinutes();
                        let s = date.getSeconds() < 10 ? '0' + date.getSeconds() : date.getSeconds();
                        return Y + '-' + M + '-' + D + ' ' + h + ':' + m + ':' + s;
                    } else {
                        return '暂无';
                    }
                },
            },
            // created() {
            // },

            mounted() {
                this.getDataListFun();
                this.getplatformListFun();
            },

            methods: {
                GetRequest() {
                    var url = location.search; //获取url中"?"符后的字串
                    var theRequest = new Object();
                    if (url.indexOf("?") != -1) {
                        var str = url.substr(1);
                        var strs = str.split("&");
                        for (var i = 0; i < strs.length; i++) {
                            theRequest[strs[i].split("=")[0]] = unescape(strs[i].split("=")[1]);
                        }
                    }
                    return theRequest;
                },
                searchFun(search) {
                    this.getplatformListFun(search);
                    this.seeFlag = false;
                },
                checkedClick(val) {
                    if (val == 2) {
                        this.checkedFlag = false;
                    } else {
                        this.checkedFlag = true;
                    }
                },
                checkedClickState(val) {
                    this.checkedValue = val;
                    this.getDataListFun();
                },
                checkedClickStates(val) {
                    this.checkedValues = val;
                    this.getplatformListFun();
                },
                getDataListFun() {
                    var user_id = this.user_id;
                    var shares_status = this.checkedValue;
                    let that = this; //this赋值DOM获取不到值
                    axios.get('http://only.1yuaninfo.com/index/service/lists', {
                            params: {
                                user_id: user_id,
                                shares_status: shares_status
                            }
                        })
                        .then(function(res) {
                            //成功的回调
                            if (res.data.error_code == 20002) {
                                // console.log('服务记录为空')
                                that.arrLists = [];
                                that.arrListsContent = [];
                                that.footerFlag = false;
                                $(".footerText").html("暂未更新！")
                            } else if (res.data.error_code == 0) {
                                that.arrLists = [];
                                that.arrLists = res.data.result;
                                that.arrListsContent = res.data.result.content;
                                // Object.keys(that.arrLists).forEach(item => {
                                //     // console.log(that.arrLists[item].shares_status);
                                //     // console.log(item,that.arrLists[item]);
                                //     switch (that.arrLists[item].shares_status) {
                                //         case 0:
                                //             that.arrLists[item].shares_status = '持股';
                                //             break;
                                //         case 1:
                                //             that.arrLists[item].shares_status = '止盈';
                                //             break;
                                //         case 2:
                                //             that.arrLists[item].shares_status = '止损';
                                //             break;
                                //         case 3:
                                //             that.arrLists[item].shares_status = '调仓';
                                //             break;
                                //         case 4:
                                //             that.arrLists[item].shares_status = '调仓';
                                //             break;
                                //         default:
                                //             that.arrLists[item].shares_status = '暂无';
                                //             break;
                                //     }
                                // })
                            }


                        })
                        .catch(function(error) {
                            console.log(error);
                            //失败的回调
                        });
                },
                getplatformListFun(val) {
                    // 平台记录
                    let news_code = $("#demoReload").val();
                    var shares_status = this.checkedValues;

                    let user_id = this.user_id;
                    let paramsVal = {};
                    if (val) {
                        // if(news_code.indexOf("持股") !== -1){
                        //     shares_status = 0;
                        //     paramsVal ={
                        //         user_id: user_id,
                        //         shares_status: shares_status,
                        //         v:1,
                        //     }
                        // }else if(news_code.indexOf("止盈") !== -1){
                        //     shares_status = 1;
                        //     paramsVal ={
                        //         user_id: user_id,
                        //         shares_status: shares_status,
                        //         v:1,
                        //     }
                        // }else if(news_code.indexOf("止损") !== -1){
                        //     shares_status = 2;
                        //     paramsVal ={
                        //         user_id: user_id,
                        //         shares_status: shares_status,
                        //         v:1,
                        //     }
                        // }else if(news_code.indexOf("调仓") !== -1){
                        //     shares_status = 3;
                        //     paramsVal ={
                        //         user_id: user_id,
                        //         shares_status: shares_status,
                        //         v:1,
                        //     }
                        // }else{
                        //     paramsVal ={
                        //         user_id: user_id,
                        //         news_code: news_code,
                        //         v:1,
                        //     }
                        // } 
                        paramsVal = {
                            user_id: user_id,
                            news_code: news_code,
                            v: 1,
                        }
                    } else {
                        paramsVal = {
                            user_id: user_id,
                            shares_status: shares_status,
                        }
                    }
                    let that = this; //this赋值DOM获取不到值
                    axios.get('http://only.1yuaninfo.com/index/service/send_list', {
                            params: paramsVal
                        })
                        .then(function(res) {
                            //成功的回调
                            if (res.data.error_code == 20002) {
                                // console.log('服务记录为空')
                                that.arrLists = [];
                                that.footerFlag = false;
                                $(".footerText").html("暂未更新！")
                            }
                            if (that.checkedFlag && val == 'search') {
                                that.arrLists = res.data.result;
                                that.arrListsContent = res.data.result.content;
                                // Object.keys(that.arrLists).forEach(item => {
                                //     switch (that.arrLists[item].shares_status) {
                                //         case 0:
                                //             that.arrLists[item].shares_status = '持股';
                                //             break;
                                //         case 1:
                                //             that.arrLists[item].shares_status = '止盈';
                                //             break;
                                //         case 2:
                                //             that.arrLists[item].shares_status = '止损';
                                //             break;
                                //         case 3:
                                //             that.arrLists[item].shares_status = '调仓';
                                //             break;
                                //         case 4:
                                //             that.arrLists[item].shares_status = '调仓';
                                //             break;
                                //         default:
                                //             that.arrLists[item].shares_status = '暂无';
                                //             break;
                                //     }
                                // })
                            } else {
                                that.arrListss = res.data.result;
                                that.arrListssContent = res.data.result.content;
                                // Object.keys(that.arrListss).forEach(item => {
                                //     switch (that.arrListss[item].shares_status) {
                                //         case 0:
                                //             that.arrListss[item].shares_status = '持股';
                                //             break;
                                //         case 1:
                                //             that.arrListss[item].shares_status = '止盈';
                                //             break;
                                //         case 2:
                                //             that.arrListss[item].shares_status = '止损';
                                //             break;
                                //         case 3:
                                //             that.arrListss[item].shares_status = '调仓';
                                //             break;
                                //         case 4:
                                //             that.arrListss[item].shares_status = '调仓';
                                //             break;
                                //         default:
                                //             that.arrListss[item].shares_status = '暂无';
                                //             break;
                                //     }
                                // })
                            }
                        })
                        .catch(function(error) {
                            console.log(error);
                            //失败的回调
                        });
                },
            },
            created() {
                this.user_id = this.GetRequest().user_id;
                this.name = this.GetRequest().name;
            }

        })
    </script>
</body>


</html>