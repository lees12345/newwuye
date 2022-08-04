<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:88:"/home/wwwroot/only.1yuaninfo.com/./application/index/view/activity/aGratitudeStocks.html";i:1637723957;}*/ ?>
<!--  -->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>一支感恩股</title>
    <style>
        html,
        body {
            padding: 0;
            margin: 0;
        }
        
        #app {
            width: 100%;
            height: 100%;
        }
        
        .cover {
            width: 100%;
            background: url(http://only.1yuaninfo.com/public/static/index/img/ganEnGu/bgCover.png) no-repeat 100%;
        }
        
        .filter {
            filter: blur(5px);
        }
        
        .btn {
            width: 100%;
            position: fixed;
            bottom: 0;
            left: 0;
            right: 0;
        }
        
        .bounced {
            position: fixed;
            bottom: 10.23rem;
            left: 2.95rem;
        }
        
        .bounced>.bgBounced {
            width: 10.35rem;
        }
        
        .bounced>.close {
            position: absolute;
            bottom: -1.3rem;
            left: 4.73rem;
            width: 0.87rem;
        }
        
        .blackBg {
            width: 100%;
            height: 100%;
            background-color: #ccc;
        }
    </style>
</head>
<script src="https://cdn.jsdelivr.net/npm/vue@2"></script>
<script type="text/javascript" src="http://only.1yuaninfo.com/public/static/index/allpublic/js/axios.min.js"></script>

<body>
    <div id="app">
        <!-- <div class="blackBg"></div> -->
        <img class="cover" src="http://only.1yuaninfo.com/public/static/index/img/ganEnGu/bgCover.png" :class=" bouncedShow ? 'filter' : '' ">
        <!-- 弹框 -->
        <div class="bounced" v-if="bouncedShow">
            <img @click="closeHandler" class="close" src="http://only.1yuaninfo.com/public/static/index/img/ganEnGu/close.png" alt="">
            <img class="bgBounced" src="http://only.1yuaninfo.com/public/static/index/img/ganEnGu/bounced.png" alt="">
        </div>
        <!-- 预约按钮 -->
        <img @click="hdClick" class="btn" src="http://only.1yuaninfo.com/public/static/index/img/ganEnGu/yuYueBtn.png" alt="">
    </div>
    <script>
        new Vue({
            data() {
                return {
                    // 弹框显示隐藏
                    bouncedShow: false,
                    openid: "", //声明openid
                    url: encodeURI(window.location.href), //获取整个url
                    code: '',
                    appID: '',
                    name: '',
                    news_id: '',
                    detailsinfo: {},
                    loading: true,
                    order_state: '',
                    mobilePhone: '', //用户加密手机号
                    is_receive: 0,
                    error_code: 0
                }
            },
            methods: {
                // rem适配
                rem() {
                    var w = document.documentElement.clientWidth / 16 //获取视口大小
                    var styleNode = document.createElement("style")
                        /* 设置此时根元素的fontsize，向html的style样式中添加font-size属性*/
                    styleNode.innerHTML = "html{font-size:" + w + "px!important}"
                        //向head标签中添加style标签，其中包含html{font-size:w;} 
                    document.head.appendChild(styleNode)
                },
                // 点击了预约按钮
                async hdClick() {
                    var _this = this;
                    this.bouncedShow = true
                    const res = await axios({
                        url: 'http://zztong.1yuaninfo.com/index/activity/think?name=experience&openid=oQ_pU65_jzurRpA_0whsOZ9fVaKM&activity_id=6',
                        headers: {
                            'Content-Type': 'multipart/form-data'
                        },
                        data: {
                            name: _this.name,
                            code: _this.code,
                            activity_id: 6
                        }
                    })
                    console.log('预约参数', res)
                },
                // 点击了取消按钮
                closeHandler() {
                    this.bouncedShow = false
                },
                getAcivityFun() {
                    // 获取用户信息
                    axios({
                            methods: 'get',
                            url: 'http://zztong.1yuaninfo.com/index/personal/receive',
                            params: {
                                code: this.code,
                                name: this.name,
                                type: 1,
                            }
                        })
                        .then((res) => {
                            //成功的回调
                            console.log('----------', res)
                            if (res.data) {
                                if (res.data.msg == "40163") {
                                    window.location = this.getUrl();
                                } else if (res.data.msg == "40029") {
                                    window.location = this.getUrl();
                                } else if (res.data.is_type == 1) {
                                    this.error_code = 1;
                                    this.mobilePhone = res.data.encodeOpenid;
                                    this.order_state = res.data.order_state;
                                    this.is_receive = res.data.is_receive;
                                    this.openid = res.data.openid;
                                    // return false;
                                    // window.location =
                                    //   "http://zztong.1yuaninfo.com/Underthegeneral/pages/personal/register.html?name=" +
                                    //   this.name
                                } else {
                                    this.mobilePhone = res.data.encodeOpenid;
                                    this.order_state = res.data.order_state;
                                    this.is_receive = res.data.is_receive;
                                    this.openid = res.data.openid;
                                    // alert(this.order_state)

                                }

                            } else {
                                console.log('[index/personal/purpose],没有加密手机号')
                                window.location = this.getUrl();
                            }
                        })
                },
                // 拿code
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
                // 拿name
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
                // 让他重新登陆
                getUrl() {
                    let redirectUri = encodeURIComponent(window.location.href);
                    let strUrl = "https://open.weixin.qq.com/connect/oauth2/authorize?appid=" + this.appID +
                        "&redirect_uri=" + redirectUri +
                        "&name=only&response_type=code&scope=snsapi_base&state=STATE&connect_redirect=1#wechat_redirect";
                    return strUrl;
                },
                wxshare() {
                    var lineLink = location.href.split('#').toString(); //url不能写死
                    console.log(lineLink)
                    axios({
                            method: 'POST',
                            url: 'http://zztong.1yuaninfo.com/index/chat/share',
                            data: {
                                url: $.base64.encode(lineLink),
                                name: this.name
                            }
                        })
                        .then((res) => {
                            //成功的回调
                            console.log(res)
                            let shareData = res.data
                            var imgUrl = 'http://zztong.1yuaninfo.com/Underthegeneral/img/share_img.png'; // 分享后展示的一张图片
                            // var lineLink = location.href; // 点击分享后跳转的页面地址
                            // var descContent = ''; // 分享后的描述信息
                            let shareTitle = document.title; // 分享后的标题
                            // console.log(lineLink)
                            wx.config({
                                debug: false, // 为true时，就是调试模式，会弹出一些信息，正确、错误都会弹。
                                appId: shareData.appid, // 必填，公众号的唯一标识
                                timestamp: shareData.timestamp.toString(), // 必填，生成签名的时间戳
                                nonceStr: shareData.noncestr, // 必填，生成签名的随机串
                                signature: shareData.jsapi_token, // 必填，签名，
                                // 必填，把要使用的方法名放到这个数组中。
                                jsApiList: ['onMenuShareTimeline',
                                        'onMenuShareAppMessage'
                                    ] //新版本updateAppMessageShareData&updateTimelineShareData目前无效
                            })
                            wx.ready(() => {
                                var AppMessageShareData = {
                                    title: shareTitle, // 分享到朋友标题
                                    desc: "", // 分享描述
                                    link: lineLink, // 分享链接，该链接域名或路径必须与当前页面对应的公众号JS安全域名一致
                                    imgUrl: imgUrl, // 分享图标
                                    success: function() {
                                        // 用户确认分享后执行的回调函数
                                        // alert('分享给朋友')
                                    },
                                    cancel: function() {
                                        // 用户取消分享后执行的回调函数
                                        // alert('分享给朋友失败')
                                    }
                                };
                                var TimelineShareData = {
                                    title: shareTitle, // 分享到朋友标题
                                    desc: "", // 分享描述
                                    link: lineLink, // 分享链接，该链接域名或路径必须与当前页面对应的公众号JS安全域名一致
                                    imgUrl: imgUrl, // 分享图标
                                    success: function() {
                                        // 用户确认分享后执行的回调函数
                                        //alert('分享给朋友')
                                    },
                                    cancel: function() {
                                        // 用户取消分享后执行的回调函数
                                        //alert('分享给朋友失败')
                                    }
                                };
                                wx.onMenuShareAppMessage(AppMessageShareData); //分享到朋友
                                wx.onMenuShareTimeline(TimelineShareData); //分享到朋友圈
                            })
                        })
                        .catch((error) => {
                            //失败的回调
                            console.log(error.response)
                        });
                }
            },
            created() {
                this.rem()
                console.log(this.url)
                this.name = this.GetRequest().name;
                alert(this.name)
                this.news_id = this.GetRequest().id;
                this.openid = this.GetRequest().openid;
                if (this.name == "experience") {
                    this.appID = "wx1dbbfa999a26cd49"; // 体验平台
                    console.log("体验平台")
                } else if (this.name == "formal") {
                    this.appID = "wx9115203d6f1df477"; //formal
                    console.log("稳健型")
                }
                this.code = this.urlResolve().code;
                if (this.code == undefined) {
                    window.location = this.getUrl();
                } else {
                    this.getAcivityFun();
                    this.wxshare();
                }
            }
        }).$mount('#app')
    </script>

</body>

</html>