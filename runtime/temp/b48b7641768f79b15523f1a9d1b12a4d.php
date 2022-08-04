<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:77:"/home/wwwroot/only.1yuaninfo.com/./application/index/view/personal/index.html";i:1635745479;}*/ ?>

<!DOCTYPE html>
<html>

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
  <title>个人中心</title>
  <link href="http://only.1yuaninfo.com/public/static/index/allpublic/css/under.css" type="text/css" rel="stylesheet" />
  <link rel="stylesheet" href="http://only.1yuaninfo.com/public/static/index/allpublic/css/publicStyle.css" />
  <script type="text/javascript" src="http://only.1yuaninfo.com/public/static/index/allpublic/js/jquery-3.5.1.min.js"></script>
  <script type="text/javascript" src="http://only.1yuaninfo.com/public/static/index/allpublic/js/rem.js"></script>
  <!-- <script src="http://only.1yuaninfo.com/public/static/index/allpublic/js/vconsole.min.js"></script> -->
  <!-- 引入 Vue 和 axiox 的 JS 文件 -->
  <script type="text/javascript" src="http://only.1yuaninfo.com/public/static/index/allpublic/js/vue.js"></script>
  <script type="text/javascript" src="http://only.1yuaninfo.com/public/static/index/allpublic/js/axios.min.js"></script>
  <!-- 引入 分享 的JS 文件 -->
  <script src="http://only.1yuaninfo.com/public/static/index/allpublic/js/base64.js"></script>
  <script type="text/javascript" src="https://res.wx.qq.com/open/js/jweixin-1.6.0.js"></script>
  <!-- 页面调试 -->
  <script>
    // var vConsole = new VConsole();// 初始化
  </script>
</head>

<body>
  <div id="Vue">
    <div id="loading" v-show="loading == true">
      <!-- <img class="loadingimg" src="http://only.1yuaninfo.com/public/static/index/allpublic/img/loading.gif" alt=""> -->
    </div>
    <h1 class="personal_bg"><img src="http://only.1yuaninfo.com/public/static/index/allpublic/img/personal_bg_01.png"></h1>
    <div class="personal_div">
      <div class="header_info" style="display: flex; align-items: center;">
        <div class="header_content" style="display: flex;">
          <dt><img style="width: 55px;height: 55px;border-radius: 50%;" :src="personalInfor.user_picture" /></dt>
          <!-- <div><img style="width: 50px;" src="http://only.1yuaninfo.com/public/static/index/allpublic/img/guanbi.png" /></div> -->
          <div style="padding-left: 15px;">
            <dd>{{personalInfor.wx_nickname}}</dd>
            <dd style="display: flex; align-items: center;padding: 3px 5px;margin-top:6px;">
              <img style="width: 15px;" src="http://only.1yuaninfo.com/public/static/index/allpublic/img/personal_icon_04.png">
              {{personalInfor.user_tel}}
            </dd>
          </div>
        </div>
        <div class="header_vip"><img src="http://only.1yuaninfo.com/public/static/index/allpublic/img/personal_icon_05.png"></div>
      </div>
      <div class="personal_list">
        <p @click="getServiceFun()">
          <span><img src="http://only.1yuaninfo.com/public/static/index/allpublic/img/personal_icon_01.png">服务记录</span>
          <span><img src="http://only.1yuaninfo.com/public/static/index/allpublic/img/personal_icon_06.png"></span>
        </p>
        <p @click="getOrderFun()">
          <span><img src="http://only.1yuaninfo.com/public/static/index/allpublic/img/personal_icon_02.png">我的订单</span>
          <span><img src="http://only.1yuaninfo.com/public/static/index/allpublic/img/personal_icon_06.png"></span>
        </p>
        <p @click="getKefuFun()">
          <span><img src="http://only.1yuaninfo.com/public/static/index/allpublic/img/personal_icon_03.png">联系客服</span>
          <span><img src="http://only.1yuaninfo.com/public/static/index/allpublic/img/personal_icon_06.png"></span>
        </p>
      </div>
    </div>
    <!--用户openid-->
    <input type="hidden" value="<?php echo $openid; ?>" id="openid">
  </div>
  <script>
    new Vue({
      el: "#Vue",
      data: {
        openid:$("#openid").val(), //声明openid
        url: encodeURI(window.location.href), //获取整个ur
        loading: true,
        code: '',
        appID: '',
        temp2: '',
        name: '',
        personalInfor: {}
      },
      methods: {
        getPersonalFun() {
          axios({
            method: 'POST',
            url: "http://only.1yuaninfo.com/index/personal/centres",
            data: {
              openid:this.openid,
            },
          })
            .then((res) => {
              //成功的回调
              console.log(res)
              if (res.data.msg == "40163") {
                window.location = this.getUrl()
              } else if (res.data.msg == "40029") {
                window.location = this.getUrl()
              }
              if (res.data.error_code == 2001) {
                // 判断游客跳转注册页面 除游客之外都可以看
                window.location.href = 'https://open.weixin.qq.com/connect/oauth2/authorize?appid=wxc013297214b78bc8&redirect_uri=http%3A%2F%2Fonly.1yuaninfo.com%2Findex%2Fregister%2Findex.html&name=only&response_type=code&scope=snsapi_base&state=123#wechat_redirect';
                // 3过期
              } else {

                this.openid = res.data.openid;
                this.personalInfor = res.data;
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
                alert("暂未查询到用户信息，请重新关注")
              }
            });
        },
        // 服务记录
        getServiceFun() {
          window.location.href = "http://only.1yuaninfo.com/index/personal/service.html?openid=" + this.openid;
        },
        // 我的订单
        getOrderFun() {
          alert("暂无订单信息！")
          // window.location.href = "http://zztong.1yuaninfo.com/Underthegeneral/pages/personal/order.html?name=" + this.name;
        },
        // 我的客服
        getKefuFun() {
          window.location.href = "http://only.1yuaninfo.com/index/personal/customer.html"
        }
      },
      mounted() {
        this.getPersonalFun();
      },
      created() {
        
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