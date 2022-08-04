<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:75:"/home/wwwroot/only.1yuaninfo.com/./application/index/view/flash/detail.html";i:1635745994;}*/ ?>

<!DOCTYPE html>
<html>
<head lang="en">
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta name="viewport"
        content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <meta http-equiv="X-UA-Compitable" content="IE=edge">
    <title>详情</title>
    <script type="text/javascript" src="http://only.1yuaninfo.com/public/static/index/allpublic/js/jquery-3.5.1.min.js"></script>
    <!-- <script language="JavaScript" src="http://only.1yuaninfo.com/public/static/index/allpublic/js/jweixin-1.2.0.js"></script> -->
    <!-- 引入 Vue 和 axiox 的 JS 文件 -->
    <script type="text/javascript" src="http://only.1yuaninfo.com/public/static/index/allpublic/js/vconsole.min.js"></script>
    <script type="text/javascript" src="http://only.1yuaninfo.com/public/static/index/allpublic/js/vue.js"></script>
    <script type="text/javascript" src="http://only.1yuaninfo.com/public/static/index/allpublic/js/axios.min.js"></script>
    <script type="text/javascript" src="https://res.wx.qq.com/open/js/jweixin-1.6.0.js"></script>
    <style type="text/css">
        html, body {
            margin: 0;
            padding: 0;
            width: 100%;
            height: 100%;
        }
        .title {
            color: #fff;
            position: relative;
            margin-top: -20%;
            margin-left: 8%;
            font-size: 18px;
        }
        .content {
            width: 100%;
            margin: 15px auto 0 ;
            display: flex;
            flex-direction: column;
            justify-content: center;
        }
        .content_main {
            width: 90%;
            margin: 0 auto 10px;
            background-color: #fff;
            border-radius: 10px 10px 0 0;
            position: relative;
        }
        .content_title {
            display: flex;
            align-items: center;
            padding: 5px 0;
            border-bottom: 1px solid #E6E6E6;
        }
        .content_time {
            width: calc(100% - 10px);
            padding: 0 10px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        .content_icon {
            border-radius: 50%;
            width: 8px;
            height: 8px;
            background-color: #FF0000;
            margin-left: 10px;
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
        .shouqi {
            padding: 0 15px;
            margin: 0 0 30px 0;
            overflow: hidden;
            text-overflow: ellipsis;
            /* word-break: break-all; */
            /* display: -webkit-box; */
            white-space: initial;
            -webkit-line-clamp: 3;
            -webkit-box-orient: vertical;
            height: 125px;
        }
        .shouqi::after{
            content: "..."; position: absolute; bottom: 20px; left: 15px;
        }
        .zhankai {
            padding: 0 15px;
            margin: 0 0 45px 0;
        }
        .showIcon {
            position: absolute;
            right: 15px;
            bottom: 10px;
            width: 7px; 
        }

        /* loading页面 */
        #loading {
          position: fixed;
          left: 0;
          top: 0;
          z-index: 999;
          width: 100%;
          height: 100%;
          background-color: #FFFFFF;
        }

        .loadingimg {
          position: fixed;
          z-index: 9999;
          top: 50%;
          left: 50%;
          transform: translate(-50%, -50%);
          width: 30px;
          height: 30px;
        }

        /* 返回按钮 */
        .android_footer{
          background-color: #F7F7F7;
          position: fixed;
          bottom: 0;
          display: flex;
          justify-content:center;
          width: 100%;
          padding:.2rem 0;
        }
        .android_footer div{
          width: 40%;
          display: flex;
          justify-content:center;
          min-height: 35px;
        }
        .android_footer div img{
          margin: auto;
          width: 8px;
        }
    </style>
</head>

<body>
    <div id="Vue" style="min-height: 100%;" :style="{'background-color':(!!dates.data && dates.data.length > 0?'rgb(244, 244, 244)':'#fff')}">
      <div id="loading" v-show="loading == true">
        <img class="loadingimg" src="http://only.1yuaninfo.com/public/static/index/allpublic/img/loading.gif" alt="">
      </div>
      <div>
            <img width="100%" src="http://only.1yuaninfo.com/public/static/index/allpublic/img/zhixun/zxdBanner.png" alt="">
        </div>
        <div v-show="!dataShow" class="title">{{dates.kxtitle}}</div>
        <div v-show="!dataShow" class="content">
            <div class="content_main" v-for="(item, index) in dates.data" :key="item.id">
                <div>
                    <div class="content_title">
                        <div class="content_icon"></div>
                        <div class="content_time">
                            <div style="font-weight: bold; font-size: 18px">{{item.mt_name}}</div>
                            <div style="color: #818181;">{{item.add_time}}</div>
                        </div>
                    </div>
                    <div v-if="item.is_shares == 1" :class="[contentIndex==index?'zhankai':'shouqi']" @click="contentShow(index)">
                        <div>{{item.news_code}}</div>
                        <div v-html="item.new_content">{{item.new_content}}</div>
                        <img v-if="contentIndex==index" class="showIcon" src="http://only.1yuaninfo.com/public/static/index/allpublic/img/zhixun/shouqi.png" alt="">
                        <img v-else class="showIcon" src="http://only.1yuaninfo.com/public/static/index/allpublic/img/zhixun/zhankai.png" alt="">
                    </div>
                    <div v-else :class="[contentIndex==index?'zhankai':'shouqi']" @click="contentShow(index)">
                        <div v-html="item.new_content">
                            {{item.new_content}}
                        </div>
                        <img v-if="contentIndex==index" class="showIcon" src="http://only.1yuaninfo.com/public/static/index/allpublic/img/zhixun/shouqi.png" alt="">
                        <img v-else class="showIcon" src="http://only.1yuaninfo.com/public/static/index/allpublic/img/zhixun/zhankai.png" alt="">
                    </div>
                </div>
            </div>
        </div>
        <div v-show="dataShow" class="nodata">
            <img src="http://only.1yuaninfo.com/public/static/index/allpublic/img/zhixun/nodata.png" alt="">
            <div style="font-size: 14px; color: #999999;">暂无更多信息</div>
        </div>
        <div class="android_footer" v-if="Equipment == 'android'">
          <div>
            <img src="http://only.1yuaninfo.com/public/static/index/allpublic/img/android_icon_01.png" @click="getAndroidBackFun()">
            <img src="http://only.1yuaninfo.com/public/static/index/allpublic/img/android_icon_02_2.png">
          </div>
        </div>
        <input type="hidden" value="<?php echo $openid; ?>" id="openid"/>
        <input type="hidden" value="<?php echo $kx_id; ?>" id="kx_id"/>
    </div>
    <script>
        new Vue({
            el: "#Vue",
            data: {
                openid: $("#openid").val(), //声明openid
                url: encodeURI(window.location.href), //获取整个url
                kx_id: $("#kx_id").val(),
                dates: {},
                dataShow: false,
                contentIndex: -1,
                loading: true,
                Equipment: ''
            },
            filters: {
                dataType(val) {
                    return val.split(' ')[0]
                },
                nameText(val) {
                    return val == "experience"?'中证通体验平台':'中证通稳健型'
                }
            },
            methods: {
                contentShow(index) {
                    if(this.contentIndex != index){
                        this.contentIndex = index;
                        return false
                    } else {
                        this.contentIndex = -1
                    }
                },
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
                getDataList() {
                    axios({
                        methods: 'get',
                        url: 'http://only.1yuaninfo.com/index/flash/flash_detail',
                        params: {
                            openid:this.openid,
                            kx_id:this.kx_id
                        }
                    })
                    .then((res) => {
                        //成功的回调
                        console.log(res)
                        if (res.data.msg == "40163") {
                            window.location = this.getUrl();
                        }
                        if (res.data.msg == "40029") {
                            window.location = this.getUrl();
                        }
                        if(res.data.error_code == "2001") {
                            window.location="https://open.weixin.qq.com/connect/oauth2/authorize?appid=wxc013297214b78bc8&redirect_uri=http%3A%2F%2Fonly.1yuaninfo.com%2Findex%2Fregister%2Findex.html&name=only&response_type=code&scope=snsapi_base&state=123#wechat_redirect"
                        }
                        this.dates = res.data
                        setTimeout(() => {
                          if(!this.dates.data){
                            this.dataShow = true
                          }
                        }, 500);
                        this.loading = false
                    })
                    .catch((error) => {
                      this.loading = false
                        //失败的回调
                    });
                },
                // 返回上一层
                getAndroidBackFun() {
                  window.location.href = "http://zztong.1yuaninfo.com/Underthegeneral/pages/newsFlash/kxlist.html?name=" + this.name;
                },
                getEquipmentFun() {
                  var u = navigator.userAgent, app = navigator.appVersion;
                  var isAndroid = u.indexOf("Android") > -1 || u.indexOf("Linux") > -1; //g
                  var isIOS = !!u.match(/\(i[^;]+;( U;)? CPU.+Mac OS X/); //ios终端
                  if (isAndroid) {
                    // alert("安卓机！");
                    this.Equipment = 'android'
                  }
                  if (isIOS) {
                    this.Equipment = 'ios'
                  }
                }
            },

            mounted() {
            },

            created() {
                this.getDataList();
                this.getEquipmentFun();
            },

        })
    </script>

</body>

</html>