<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:76:"/home/wwwroot/only.1yuaninfo.com/./application/index/view/history/index.html";i:1637667130;}*/ ?>

<!DOCTYPE html>
<html>

<head lang="en">
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <meta http-equiv="X-UA-Compitable" content="IE=edge">
    <title>历史记录</title>
    <!-- 引入 Vue 和 axiox 的 JS 文件 -->
    <script src="http://only.1yuaninfo.com/public/static/index/allpublic/js/jquery-3.5.1.min.js"></script>
    <script type="text/javascript" src="http://only.1yuaninfo.com/public/static/index/allpublic/js/vue.js"></script>
    <script type="text/javascript" src="http://only.1yuaninfo.com/public/static/index/allpublic/js/axios.min.js"></script>
    <script type="text/javascript" src="https://res.wx.qq.com/open/js/jweixin-1.6.0.js"></script>

    <style type="text/css">
        html,
        body {
            margin: 0;
            padding: 0;
            width: 100%;
        }
        
        .title-weeklys {
            position: relative;
            margin-top: -18%;
            margin-left: 10%;
        }
        
        .content {
            width: 100%;
            margin: 10px auto 0;
            display: flex;
            flex-direction: column;
        }
        
        .content_main {
            width: 90%;
            margin: -10% auto 0;
            background-color: #fff;
            border-radius: 10px 10px 0 0;
        }
        
        .content_title {
            display: flex;
            flex-direction: column;
            margin-bottom: 15px;
            box-shadow: 0px 0px 38px 0px rgba(106, 12, 13, 0.2);
            border-radius: 10px;
        }
        
        .content_one {
            padding: 20px;
            display: flex;
            align-items: center;
            position: relative;
        }
        
        .content_time {
            padding: 0 20px 20px 20px;
            display: flex;
            align-items: center;
            border-bottom: 1px solid #E6E6E6;
        }
        
        .content_review {
            padding: 10px 20px 10px 20px;
            display: flex;
            align-items: center;
        }
        
        .content_line {
            position: absolute;
            border-left: 2px dashed #C8C7CC;
            top: 40px;
            left: 27px;
            height: 26px;
        }
        
        .nodata {
            width: 100%;
            margin: 30% auto;
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
        }
        
        .nodata img {
            width: 40%;
        }
    </style>
</head>

<body>
    <div id="Vue">
        <div>
            <img width="100%" src="http://only.1yuaninfo.com/public/static/index/allpublic/img/history/historyBanner.png" alt="">
        </div>
        <div class="content">
            <div class="content_main" id="content_main">
                <div v-if="!!dates" v-for="item in dates" :key="item.id" class="content_main_list">
                    <div class="content_title">
                        <div class="content_one">
                            <img style="width: 15px; height: 15px; padding-right: 15px;" src="http://only.1yuaninfo.com/public/static/index/allpublic/img/history/two.png" alt="">
                            <div class="content_line"></div>
                            <div style="font-size: 18px;color: #2260ED;">{{item.history_title}}</div>
                        </div>
                        <div class="content_time">
                            <img style="width: 15px; height: 15px; padding-right: 20px;" src="http://only.1yuaninfo.com/public/static/index/allpublic/img/history/one.png" alt="">
                            <div style="color: #242E42;">{{item.history_addtime}}</div>
                        </div>
                        <div class="content_review" @click="goTodetial(item)">
                            <img style="width: 15px; height: 20px; padding-right: 20px;" src="http://only.1yuaninfo.com/public/static/index/allpublic/img/history/three.png" alt="">
                            <div style="color: #242E42;">{{item.history_desc}}</div>
                        </div>
                    </div>
                </div>

                <div v-else class="nodata">
                    <img src="http://only.1yuaninfo.com/public/static/index/allpublic/img/zhixun/nodata.png" alt="">
                    <div style="font-size: 14px; color: #999999;">暂无更多信息</div>
                </div>
                <div class="loading hide" id="js-loading"></div>
                <!--用户openid-->
                <input type="hidden" value="<?php echo $openid; ?>" id="openid" />
            </div>
        </div>
        <!-- <div style='width: 100%;height: 1000px;background-color: white;position: fixed;left: 0;top: 0;z-index: 9999999;'>{{vvv}}</div> -->
    </div>
    <script>
        new Vue({
                el: "#Vue",
                data: {
                    openid: $("#openid").val(), //声明openid
                    url: encodeURI(window.location.href), //获取整个url
                    appID: '',
                    temp2: '',
                    name: 'experience',
                    dates: [],
                    time: '',
                    page: 1,
                    vvv: ''
                },
                filters: {
                    dataType(val) {
                        return val.split(' ')[0]
                    },
                    nameText(val) {
                        return val == "experience" ? '中证通体验平台' : '中证通稳健型'
                    }
                },
                methods: {
                    urlResolve() {
                        let url = location.search; //获取url中"?"符后的字符串
                        let theRequest = new Object(); //声明一个对象
                        if (url.indexOf("?") != -1) {
                            let str = url.substr(1);
                            let strs = str.split("&");
                            for (let i = 0; i < strs.length; i++) {
                                theRequest[strs[i].split("=")[0]] = (strs[i].split("=")[1]);
                            }
                        }
                        return theRequest;
                    },
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
                    format(shijianchuo) {
                        //shijianchuo是整数，否则要parseInt转换
                        var time = new Date(shijianchuo * 1000);
                        var y = time.getFullYear();
                        var m = time.getMonth() + 1;
                        var d = time.getDate();
                        var h = time.getHours();
                        var mm = time.getMinutes();
                        var s = time.getSeconds();
                        return y + '-' + m + '-' + d + ' ' + h + ':' + mm + ':' + s;
                    },
                    goTodetial(obj) {
                        window.location.href = "http://only.1yuaninfo.com/index/history/history_detail?history_id=" + obj.history_id
                    },
                    getDataList(code) {
                        if (this.page >= 2) {
                            var params = {
                                // name: this.name, //中证通
                                // page: this.page,
                                // openid: this.openid,
                                page: this.page, //只推一支股
                                openid: this.openid,
                            }
                        } else {


                            var params = {
                                // name: this.name, //中证通
                                // code: code,
                                // page: 1
                                openid: this.openid, //只推
                                page: 1
                            }
                        }
                        axios({
                                methods: 'get',
                                url: 'http://only.1yuaninfo.com/index/history/lists',
                                // url: 'http://zztong.1yuaninfo.com/index/history/report/list',
                                params: params,
                            })
                            .then((res) => {
                                // this.vvv = res
                                //成功的回调
                                console.log(res)
                                    // if (res.data.msg == "40163") {
                                    //     window.location = this.getUrl();
                                    // }
                                    // if (res.data.msg == "40029") {
                                    //     window.location = this.getUrl();
                                    // }
                                if (res.data.error_code == "2001") {
                                    // 跳注册
                                    window.location = "https://open.weixin.qq.com/connect/oauth2/authorize?appid=wxc013297214b78bc8&redirect_uri=http%3A%2F%2Fonly.1yuaninfo.com%2Findex%2Fregister%2Findex.html&name=only&response_type=code&scope=snsapi_base&state=123#wechat_redirect";
                                }
                                if (res.data) {
                                    this.dates = res.data.data; //只推一支股
                                    // this.dates = res.data.list.data; //中证通
                                    // this.openid = res.data.openid;
                                }
                            })
                            .catch((error) => {
                                //失败的回调
                                console.log(error.response)
                                if (error.response.data.error_code == 2002) {
                                    alert("暂未查询到用户信息，请重新关注")
                                    setTimeout((function() {
                                        WeixinJSBridge.call('closeWindow');
                                    }), 500);
                                }
                            });
                    }
                },

                mounted() {
                    const listDom = document.getElementsByClassName('content_main_list')
                    const loadingDom = document.getElementById('js-loading')
                        /**
                         * clientHeight 滚动可视区域高度
                         * scrollTop 当前滚动位置
                         * scrollHeight 整个滚动高度
                         */
                    const scrollDom = document.getElementById('content_main')
                    scrollDom.onscroll = () => {
                        if (scrollDom.clientHeight + parseInt(scrollDom.scrollTop) === scrollDom.scrollHeight) {
                            if (loadingDom.classList.contains('hide') && this.page <= 5) {
                                loadingDom.classList.remove('hide')
                                this.page = page + 1;
                                this.getDataList(code);
                            }
                            if (this.page >= 5) {
                                observer.disconnect() // 加载完毕停止监听列表 DOM 变化
                            }
                        }
                    }
                },

                created() {
                    // var coding = (function oneValues() {
                    //     var query = location.search.substr(1)
                    //     query = query.split('&')
                    //     var params = {}
                    //     for (let i = 0; i < query.length; i++) {
                    //         let q = query[i].split('=')
                    //         if (q.length === 2) {
                    //             params[q[0]] = q[1]
                    //         }
                    //     }
                    //     return params //返回?号后面的参数名与参数值的数组
                    // }());
                    // code = coding.code

                    // this.getDataList(code);
                    this.getDataList();

                },

            })
            //微信浏览器中，alert弹框不显示域名
        window.alert = function(name) {
            var iframe = document.createElement("IFRAME");
            iframe.style.display = "none";
            iframe.setAttribute("src", 'data:text/plain,');
            document.documentElement.appendChild(iframe);
            window.frames[0].window.alert(name);
            iframe.parentNode.removeChild(iframe);
        }
    </script>

</body>

</html>