<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:80:"/home/wwwroot/only.1yuaninfo.com/./application/index/view/personal/customer.html";i:1635659604;}*/ ?>

<!DOCTYPE html>
<html>

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="chrome=1">
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
  <title>联系客服</title>
  <link rel="stylesheet" href="http://only.1yuaninfo.com/public/static/index/allpublic/css/publicStyle.css" />
  <link rel="stylesheet" href="http://only.1yuaninfo.com/public/static/index/allpublic/css/vantcss.css" />
  <script type="text/javascript" src="http://only.1yuaninfo.com/public/static/index/allpublic/js/jquery-3.5.1.min.js"></script>
  <script type="text/javascript" src="http://only.1yuaninfo.com/public/static/index/allpublic/js/rem.js"></script>
  <!-- 引入 Vue 和 axiox 的 JS 文件 -->
  <script type="text/javascript" src="http://only.1yuaninfo.com/public/static/index/allpublic/js/vue.js"></script>
  <script type="text/javascript" src="http://only.1yuaninfo.com/public/static/index/allpublic/js/axios.min.js"></script>
  <!-- 引入样式文件 -->
  <!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/vant@2.10/lib/index.css" /> -->
  <!-- 引入 Vue 和 Vant 的 JS 文件 -->
  <script src="https://cdn.jsdelivr.net/npm/vue@2.6/dist/vue.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/vant@2.10/lib/vant.min.js"></script>
</head>
<style>
  a:hover{text-decoration:none;}/*指鼠标在链接*/
  .personal_bg img {
    width: 100%;
  }

  .service_div {
    width: 90%;
    position: absolute;
    top: 1.5rem;
    left: 0;
    right: 0;
    margin: auto;
    background-color: #ffffff;
    border-radius: .2rem;
  }

  .service_box {
    width: 100%;
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
  }

  .service_box>img {
    width: 100px;
    height: 100px;
    margin: 30px;
  }

  .service_text {
    color: #666666
  }

  .service_tel {
    width: 100%;
    margin-top: 50px;
    padding: 15px 20px;
    font-size: 14px;
    display: flex;
    align-items: center;
    justify-content: space-between;
    background: #FFF6F6;
    color: #333333;
    text-decoration: none;
  }

  .service_tel>img {
    width: 15px;
    height: 15px;
  }

  /* 返回按钮 */
  .android_footer {
    background-color: #F7F7F7;
    position: fixed;
    bottom: 0;
    display: flex;
    justify-content: center;
    width: 100%;
    padding: .2rem 0;
  }

  .android_footer div {
    width: 40%;
    display: flex;
    justify-content: center;
    /* margin: auto; */
  }

  .android_footer div img {
    margin: auto;
    width: .16rem;
  }
</style>

<body>
  <div id="Vue">
    <h1 class="personal_bg"><img src="http://only.1yuaninfo.com/public/static/index/allpublic/img/personal_bg_01.png"></h1>
    <div class="service_div">
      <div class="service_box">
          <img src="http://only.1yuaninfo.com/public/static/index/allpublic/img/code.png"/>
          <img src="http://only.1yuaninfo.com/public/static/index/allpublic/img/codeformal.png" alt="" v-show ="name=='formal'" />
        <div class="service_text">扫描二维码，添加客服人员微信</div>
        <!-- <div class="service_tel"> -->
        <!-- href="tel: 010-56519788"  -->
        <a class="service_tel" @click="alertMenu">
          <span>拨打电话</span>
          <img src="http://only.1yuaninfo.com/public/static/index/allpublic/img/jiantouR.png" alt="">
        </a>
        <!-- </div> -->
      </div>
    </div>
    <div id="action_sheet"  v-show="tellshow" >
      <div class="van-overlay" style="z-index: 2001;" @click="toCancel"></div>
      <div class="bottom_tell van-popup van-popup--round van-popup--bottom van-popup--safe-area-inset-bottom van-action-sheet"
        style="z-index: 2002;">
        <div class="van-action-sheet__content" round  >
          <div class="bottom_div_opacyuan">
            <a class="" href="tel: 185-5198-9799">
              <button type="button" class="van-action-sheet__item">
                <span class="van-action-sheet__name">呼叫：185-5198-9799</span>
              </button>
            </a>
            <a class="" href="tel:18611222771">
              <button type="button" class="van-action-sheet__item">
                <span class="van-action-sheet__name">呼叫：186-1122-2771</span>
              </button>
            </a>
          </div>
          <div style="height: 0.5rem; opacity: 0;"></div> 
          
          <div class="bottom_div_opac" >
            <a class="" href="tel: 010-5651-9799">
              <button type="button" class="van-action-sheet__item" style="border-bottom: #EEEEEE solid 1px;">
                <span class="van-action-sheet__name">呼叫：010-5651-9799</span>
              </button>
            </a>
            <a class="" href="tel: 400-6088- 879">
              <button type="button" class="van-action-sheet__item" style="border-bottom: #EEEEEE solid 1px;">
                <span class="van-action-sheet__name">呼叫：400-6088- 879</span>
              </button>
            </a>
            <button type="button" class="van-action-sheet__item" @click="toCancel">
              <span class="van-action-sheet__name" style="color: #999999;">取消</span>
            </button>
          </div>
          
        </div>
      </div>
    </div>
    <div class="android_footer" v-show="Equipment == 'android'">
      <div>
        <img src="http://only.1yuaninfo.com/public/static/index/allpublic/img/android_icon_01.png" @click="getAndroidBackFun()">
        <img src="http://only.1yuaninfo.com/public/static/index/allpublic/img/android_icon_02_2.png">
      </div>
    </div>
  </div>

  <script>
    new Vue({
      el: "#Vue",
      data: {
        openid: "", //声明openid
        url: encodeURI(window.location.href), //获取整个url
        code: '',
        appID: '',
        pram2: '',
        name: '',
        status: true,
        list: [{}],
        orderFlag: true,
        Equipment: '',
        tellshow: false,
      },
      methods: {
        alertMenu() {
          this.tellshow = true;
        },
        toCancel() {
          this.tellshow = false;
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
        // getUrl() {
        //   var redirectUri = encodeURIComponent(window.location.href);
        //   let strUrl = "https://open.weixin.qq.com/connect/oauth2/authorize?appid=" + this.appID +
        //     "&redirect_uri=" + redirectUri +
        //     "&response_type=code&scope=snsapi_base&state=STATE&connect_redirect=1#wechat_redirect";
        //   return strUrl;
        // },
        // urlResolve() {
        //   let url = location.search; //获取url中"?"符后的字符串
        //   let theRequest = new Object(); //声明一个对象
        //   if (url.indexOf("?") != -1) {
        //     let str = url.substr(1);
        //     let strs = str.split("&");
        //     for (let i = 0; i < strs.length; i++) {
        //       theRequest[strs[i].split("=")[0]] = (strs[i].split("=")[1]);
        //     }
        //   }
        //   return theRequest;
        // },
        getUllistFun(val) {
          this.status = val;
          this.orderFlag = val
        },
        // 返回上一层
        getAndroidBackFun() {
          window.location.href = "http://only.1yuaninfo.com/index/perosnal/index?openid=" + this.openid;
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
            // alert("苹果机！");
            this.Equipment = 'ios'
          }
        }

      },
      mounted() {

      },
      created() {
        this.openid = this.GetRequest().openid;
        this.getEquipmentFun()
      },
    })
  </script>
</body>

</html>