<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:74:"/home/wwwroot/only.1yuaninfo.com/./application/index/view/flash/index.html";i:1636350664;}*/ ?>

<!DOCTYPE html>
<!-- saved from url=(0046)http://yyfw.1yuaninfo.com/html/more/weekly.php -->
<html>

<head lang="en">
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

  <meta name="viewport"
    content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">
  <meta http-equiv="X-UA-Compitable" content="IE=edge">
  <title>资讯</title>
  <link rel="stylesheet" href="http://only.1yuaninfo.com/public/static/index/allpublic/css/bootstrap.css">
  <link rel="stylesheet" href="http://only.1yuaninfo.com/public/static/index/allpublic/css/common.css">
  <script src="http://only.1yuaninfo.com/public/static/index/allpublic/js/jquery-3.5.1.min.js"></script>
  <script src="http://only.1yuaninfo.com/public/static/index/allpublic/js/bootstrap.js"></script>
  <!-- 引入 Vue 和 axiox 的 JS 文件 -->
  <script type="text/javascript" src="http://only.1yuaninfo.com/public/static/index/allpublic/js/vue.js"></script>
  <script type="text/javascript" src="http://only.1yuaninfo.com/public/static/index/allpublic/js/axios.min.js"></script>
  <script type="text/javascript" src="https://res.wx.qq.com/open/js/jweixin-1.6.0.js"></script>
  <style>
    /*历史记录*/
    .history-main .broker-inform {
      width: 100%;
      border-bottom: 0.1rem solid #f2f2f2;
      float: left;
      padding: 2% 5%;
    }

    .history-main .broker-inform .left {
      width: 11%;
      padding: 2% 0;
      float: left;
      vertical-align: middle;

    }

    .history-main .broker-inform .left img {
      width: 3rem;
      height: 3rem;
    }

    .history-main .broker-inform .left .good {
      margin-left: 60%;
    }

    .history-main .broker-inform .right {
      float: left;
      width: 84%;
      margin-left: 5%
    }

    .person_choose_line {
      float: left;
      height: 24px;
      width: 1px;
      background-color: #d6d6d6;
      margin-top: 18px;
    }

    .right-icon {
      float: right;
      padding: 3% 0
    }

    .right-h {
      width: 88%;
      float: left;
    }

    .right-h h4 {
      margin-top: 5.5%;
    }

    .right-icon img {
      width: 2rem;
      height: 2rem;
    }

    .history-main .broker-inform .right .kaihu {
      margin-left: 20%;
    }

    .history-main .broker-inform .right h5 {
      color: #000000;
      margin: -2% 0;
      line-height: 2rem;
    }

    .history-main .broker-inform .right h6 {
      padding: 1% 0;
      color: grey;
    }

    .history-main .broker-inform .right button {
      background: #d43f3a;
      color: #ffffff;
      border: 0;
      margin-bottom: 1%;
      padding: 1% 5%;
      border-radius: 0.5rem;
    }

    .right h4 {
      width: 80%
    }

    .history-main .new {
      margin: 10% 0 0;
      color: #767171;
      ;
    }

    .history-main .time {
      width: 100%;
      padding: 2% 5%;
      float: left;
    }

    .time-time {
      padding: 2% 0;
      color: #868686;
    }

    .history-main .time .crice {
      position: absolute;
      width: 0.8rem;
      height: 0.9rem;
      top: 0;
      left: -0.5rem;
      border-radius: 50%;
      background: #d43f3a;
    }

    .history-main .time .time-t {
      width: 11%;
      float: left;

    }

    .history-main .time .time-t1 {
      color: #868686;
      font-size: 1.4rem;
      margin: 0% 0;
    }

    .history-main .time .time-right {
      width: 100%;
      height: 8rem;
      float: left;
      margin-top: -10.4%;
      margin-left: 5%;
      /* border-left: 0.2rem solid #d43f3a; */
      position: relative;

    }

    .history-main .time .time-right1 {
      width: 100%;
      height: 8rem;
      float: left;
    }

    .history-main .time .time-right .history-right-main {
      border-bottom: 0.1rem solid #f2f2f2;
      margin: -0.5rem 7% 0;
      padding: 10px 0 5px 0;
    }

    .history-right-main h4 {
      font-size: 18px;
      padding-top: 5px;
    }

    .history-main .time .time-right1 .history-right-main {
      border-bottom: 0.1rem solid #f2f2f2;
      padding: 8% 0%;

    }

    .history-main .time .time-right .history-right-main .right-zhuan {
      color: #868686;
      display: block;
      font-size: 1.4rem;
      margin: 4% 0;
      overflow: hidden;
      white-space: normal;
      width: 95%;
      height: 2rem;
    }

    .time-right1 span {
      display: block;
    }

    .history-main .time .time-right .history-right-main img {
      width: 100%;
      height: 8rem;
    }

    .history-main .time .time-right1 .history-right-main img {
      width: 100%;
      height: 8rem;
    }

    .kx_banner img {
      width: 100%;
    }

    .kx_title {
      font-size: 16px;
      color: #000000;
      padding: 20px 0 10px 10%;
      background-color: #ffffff;
    }

    .crice {
      width: 0.8rem;
      height: 0.9rem;
      border-radius: 50%;
      background: #d43f3a;
      margin-right: 5%;
    }

    .kx_content {
      font-size: 16px;
      font-weight: bold;
      color: #FF3536
    }

    .kx_item {
      display: flex;
      align-items: center;
      padding: 15px 0 15px 10%;
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
    .hide {
      display: none;
    }
    .loading {
      text-align: center;
    }
  </style>
</head>

<body>
  <div id="Vue">
    <div id="loading" v-show="loading == true">
      <img class="loadingimg" src="http://only.1yuaninfo.com/public/static/index/allpublic/img/loading.gif" alt="">
    </div>
    <!-- <div style="border:#f0f0f0 solid 1px;overflow:hidden;padding-top:10px"><img src="http://only.1yuaninfo.com/public/static/index/allpublic/img/back.png" style="float:left;padding-left:10px;"><p style="text-align:center;font-size:20px;padding-right:25px">实时快讯</p></div> -->
    <div class="kx_banner"><img src="http://only.1yuaninfo.com/public/static/index/allpublic/img/zhixun/zxBanner.png"></div>
    <div v-if="datalist.length > 0" class="kx_title">实时资讯</div>
    <div v-if="datalist.length > 0" class="kx_list">
       <!-- :key="item.kx_id" -->
      <div class="kx_main" v-for="(item, index) in datalist"  @click="kxdetailFun(item.kx_id)">
        <div class="kx_item" :style="{'background-color':(index%2!=0?'#fff':'#F3F3F3')}">
          <div class="crice"></div>
          <div class="kx_content">{{item.kx_title}}</div>
        </div>
      </div>
    </div>
    <div v-else class="nodata">
      <img src="http://only.1yuaninfo.com/public/static/index/allpublic/img/zhixun/nodata.png" alt="">
      <div style="font-size: 14px; color: #999999;">暂无更多信息</div>
    </div>
    <input type="hidden" value="<?php echo $openid; ?>" id="openid"/>
    <div class="loading hide" id="js-loading">加载更多…</div>

  </div>
  <script>
    new Vue({
      el: "#Vue",
      data: {
        openid: $("#openid").val(), //声明openid
        url: encodeURI(window.location.href), //获取整个url
        appID: '',
        temp2: '',
        name: '',
        datalist: [], // 快讯列表
        loading: true,
        page:1,
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
        getDataList() {
          var params;
          if(this.page >= 2 ){
            params = {
                openid: this.openid,
                page:this.page,
            }
          }else{
            params = {
              openid: this.openid,
              page:this.page,
            }
          }
          axios({
              methods: 'get',
              url: 'http://only.1yuaninfo.com/index/flash/flash_index',
              params: params,
            })
            .then((res) => {
              //成功的回调
              console.log(res)
              // if (res.data.msg == "40163") {
              //   window.location = this.getUrl();
              // }
              // if (res.data.msg == "40029") {
              //   window.location = this.getUrl();
              // }
              if (res.data.error_code == "2001") {
                window.location = "https://open.weixin.qq.com/connect/oauth2/authorize?appid=wxc013297214b78bc8&redirect_uri=http%3A%2F%2Fonly.1yuaninfo.com%2Findex%2Fregister%2Findex.html&response_type=code&scope=snsapi_base&state=123#wechat_redirect"
                  // "http://only.1yuaninfo.com/Underthegeneral/pages/personal/register.html?name=" +
                  // this.name
              }
              if(res.data.error_code != 1000) {
                this.datalist = this.datalist.concat(res.data);
                console.log(this.page)
                if(this.page > 1){
                  $("#js-loading").addClass('hide')
                  this.datalist= this.datalist.concat(res.data);
                }else{
                  console.log(22222222);
                }
                // this.openid = res.data.openid;
                this.loading = false
              }
            })
            .catch((error) => {
              //失败的回调
              console.log(error.response)
              if (error.response.data.error_code == 2002) {
                alert("暂未查询到用户信息，请重新关注")
                setTimeout((function () {
                  WeixinJSBridge.call('closeWindow');
                }), 500);
              }else{
                console.log("暂未查询")
              }
            });
        },
        kxdetailFun(id) {
          window.location = "http://only.1yuaninfo.com/index/flash/detail.html?kx_id="+id+"&openid=" + this.openid
              //"https://open.weixin.qq.com/connect/oauth2/authorize?appid=wxc013297214b78bc8&redirect_uri=http%3A%2F%2Fonly.1yuaninfo.com%2Findex%2Fflash%2Fdetail.html&response_type=code&scope=snsapi_base&state=123#wechat_redirect"
            // "http://zztong.1yuaninfo.com/Underthegeneral/pages/newsFlash/kxdetail.html?name=" + this
            // .name + "&kxid=" + id;
        },
        getShareInfo(tit, fxUrl) { //如果分享的内容会根据情况变化，那么这里可以传入分享标题及url
          var data = { //请求参数
            // url: this.jmUrl,
            // token: this.token,
            // code: this.code
          }
          getShare(data) //这里我写了一个公用的接口请求js，这里正常axios请求就可以，只要拿到数据都可以
            .then(res => {
              localStorage.setItem("jsapi_ticket", res.jsapi_ticket);
              //拿到后端给的这些数据
              let appId = res.appId;
              let timestamp = res.timestamp;
              let nonceStr = res.noncestr;
              let signature = res.signature;
              wx.config({
                debug: false, // 开启调试模式,调用的所有api的返回值会在客户端alert出来，若要查看传入的参数，可以在pc端打开，参数信息会通过log打出，仅在pc端时才会打印。
                appId: 'wx56a464621c6314a', // 必填，公众号的唯一标识，填自己的！
                timestamp: timestamp, // 必填，生成签名的时间戳，刚才接口拿到的数据
                nonceStr: nonceStr, // 必填，生成签名的随机串
                signature: signature, // 必填，签名，见附录1
                jsApiList: [
                  'onMenuShareTimeline',
                  'onMenuShareAppMessage'
                ]
              })

              wx.ready(function () {
                //分享到朋友圈
                wx.onMenuShareTimeline({
                  title: tit, // 分享时的标题
                  link: fxUrl, // 分享时的链接
                  imgUrl: _this.pic, // 分享时的图标
                  success: function () {
                    console.log("分享成功");
                  },
                  cancel: function () {
                    console.log("取消分享");
                  }
                });
                //分享给朋友
                wx.onMenuShareAppMessage({
                  title: tit,
                  desc: '这件商品终于优惠了，每件只需' + pri_fx + '元',
                  link: fxUrl,
                  imgUrl: _this.pic,
                  type: '',
                  dataUrl: '',
                  success: function () {
                    console.log("分享成功");
                  },
                  cancel: function () {
                    console.log("取消分享");
                  }
                });
              })
            })
        }
      },

      mounted() {
        const listDom = document.getElementsByClassName('kx_list')
        const loadingDom = document.getElementById('js-loading')
        /**
         * clientHeight 滚动可视区域高度
         * scrollTop 当前滚动位置
         * scrollHeight 整个滚动高度
         */
        const scrollDom = document.getElementById('Vue');
        // console.log(scrollDom)
        window.addEventListener('scroll',()=>{
          // console.log(window.scrollY)
          if (scrollDom.clientHeight + parseInt(scrollDom.scrollTop) === scrollDom.scrollHeight) {
            if (loadingDom.classList.contains('hide') && this.page <20) {
              loadingDom.classList.remove('hide')
              this.page = this.page+1;
              console.log(this.page,'page')
              this.getDataList();
            }
            if (this.page >= 20) {
              // observer.disconnect() // 加载完毕停止监听列表 DOM 变化
            }
          }
        })
      },
      created() {
          this.getDataList();
      },
    })
    //微信浏览器中，alert弹框不显示域名
    window.alert = function (name) {
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