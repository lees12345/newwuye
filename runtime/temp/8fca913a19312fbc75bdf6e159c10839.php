<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:77:"/home/wwwroot/only.1yuaninfo.com/./application/index/view/register/state.html";i:1637749360;}*/ ?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="viewport" content="width=device-width,	minimum-scale=1.0,maximum-scale=1.0,user-scalable=no">

  <link rel="stylesheet" href="http://only.1yuaninfo.com/public/static/index/allpublic/css/vantcss.css" />
  <!-- <link rel="stylesheet" href="http://only.1yuaninfo.com/public/static/index/allpublic/css/weui.min.css"> -->
  <!-- <script src="http://only.1yuaninfo.com/public/static/index/allpublic/js/weui.min.js"></script> -->
  <link rel="stylesheet" href="http://only.1yuaninfo.com/public/static/index/allpublic/css/layer.css" />
  <link rel="stylesheet" href="http://only.1yuaninfo.com/public/static/index/allpublic/css/zhuce/publicStyle.css" />
  <script type="text/javascript" src="http://only.1yuaninfo.com/public/static/index/allpublic/js/rem.js"></script>
  <!-- 引入 分享 的JS 文件 -->
  <script type="text/javascript" src="http://only.1yuaninfo.com/public/static/index/allpublic/js/jquery-3.5.1.min.js"></script>
  <script type="text/javascript" src="https://res.wx.qq.com/open/js/jweixin-1.6.0.js"></script>
  <script src="http://only.1yuaninfo.com/public/static/index/allpublic/js/base64.js"></script>
  <!-- 引入 Vue 和 axiox 的 JS 文件 -->
  <script type="text/javascript" src="http://only.1yuaninfo.com/public/static/index/allpublic/js/vue.js"></script>
  <script src="http://only.1yuaninfo.com/public/static/index/allpublic/js/layer.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/vant@2.10/lib/vant.min.js"></script>
  <script type="text/javascript" src="http://only.1yuaninfo.com/public/static/index/allpublic/js/axios.min.js"></script>
  <script src="http://only.1yuaninfo.com/public/static/index/allpublic/js/vconsole.min.js"></script>
  <!-- 页面调试 -->
  <script>
    // var vConsole = new VConsole();// 初始化
</script>
  <title>平台声明</title>
  <style>
    body{
      max-width: 750px;
      margin: auto;
      display:block
    }
    .overflow-hidden{
      overflow: hidden;
    }
    .clear{
      height: 2rem;
    }
    .method img{
      width: 100%;
      display: block;
    }
    .footer {
      /* height: 10rem; */
      background-image: url(http://only.1yuaninfo.com/public/static/index/allpublic/img/state/statethr_img_03.png);
      background-repeat: repeat;
      overflow: hidden;
      background-size: 100%;
      margin: auto;
      padding-bottom: .3rem;
    }
    .footer img{
      width: 90%;
      margin: auto;
      display: block;
    }
    .footer .okBtn{
      width: 80%;
      height: 1rem;
      margin: auto;
      display: block;
      background: linear-gradient(0deg, #FF5D58, #FF5D58);
      box-shadow: 0px 7px 22px 5px rgba(10, 42, 135, 0.2);
      border-radius: 45px;
      color: #ffffff;
      font-size: .32rem;
      font-weight: bold;
    }
    .okBtnY{
      width: 80%;
      height: .9rem;
      margin: auto;
      display: block;
      background: linear-gradient(0deg, #cccccc, #cccccc);
      box-shadow: 0px 7px 22px 5px rgba(10, 42, 135, 0.2);
      border-radius: 45px;
      color: #ffffff;
      font-size: .32rem;
      font-weight: bold;
    }
    .footer_tishi {
      color: #ffffff;
      font-size: .2rem;
      width: 90%;
      margin: auto;
      border-top:dotted #fff 1px;
      padding-top: .3rem;
      margin-top: 1rem;
      line-height: 25px;
      text-align: left;
    }
    .female{
      text-align: center;
      display: block;
      margin-top: .2rem;
    }
    .female span {
      font-size: .2rem;
      color: #FEFEFE;
      font-weight: normal;
    }
    /* radio */
    label.female input[type="radio"] {
      visibility: hidden;
      opacity: 0;
      position: absolute;
      right: 1rem;
    }
    label.female .female-checkbox {
      display: inline-block;
      position: relative;
      width: 12px;
      height: 12px;
      border: 1px solid #ccc;
      /* background-color: #0091FF; */
      vertical-align: -3px;
      /* margin-right: 5px; */
      border-radius: 50%;
    }

    label.female input[type="radio"]:checked+.female-checkbox:after {
      position: absolute;
      content: "";
      width: 6px;
      height: 2px;
      border-left: 1px solid #ffffff;
      border-bottom: 1px solid #ffffff;
      transform: rotate(-55deg) translate(-50%, -50%);
      /*top:50%;*/
      left: 50%;
    }

    label.female input[type="radio"]:checked+.female-checkbox {
      /* background-color: #ffffff; */
      border-radius: 50%
    }

    /*  */
    /*  */
    /*  */
    .statediv {
      overflow: hidden;
      display: flex;
      justify-content: space-between;
      width: 95%;
      margin: auto;
    }
    .UnlockingTishiBox {
      background-color: rgba(0, 0, 0, .5);
      width: 100%;
      min-height: 100%;
      overflow: hidden;
      position: fixed;
      z-index: 110;
      top: 0;
      left: 0;
      right: 0;
      bottom: 0;
      margin: auto;
      display: none;
    }

    .UnlockingTishiBox img {
      position: absolute;
      width: 85%;
      margin: auto;
      display: block;
      left: 0;
      right: 0;
      top: 3.5rem;
      z-index: 120;
    }
    .state_new_ddiv{
      position: relative;
    }
    .state_new_pdiv {
      position: absolute;
      width: 85%;
      margin: auto;
      left: 0;
      right: 0;
      top:1.8rem;
      /* height: 6.7rem; */
      height: 74%;
      overflow: hidden;
      /* white-space: nowrap; */
      overflow-y: auto;
    }
    .state_new_pdiv p {
      position: relative;
      line-height: 25px;
      font-size: 14px;
      color: #666666;
      margin-bottom: .4rem;
      padding-top: .1rem;
      margin: .2rem .2rem 0 .2rem;

    }
    .state_new_pdiv p i{
      background: url(http://only.1yuaninfo.com/public/static/index/allpublic/img/state/statethr_img_04.png) no-repeat left;
      color: #fff;
      background-size: 100%;
      display: block;
      width: 100%;
    }
    .state_new_pdiv p span {
      color: #323232;
      font-size: .32rem;
      /* padding-left: .3rem; */
      position: absolute;
      left:.2rem;
      top:-.1rem;
      font-style: italic;
    }
    /* 拨打电话 */

    .tellkefu{
      width: 30%;
      /* background-color: #FE7A33; */
      border:#FEFEFE solid 1px;
      /* border: 0; */
      border-radius: .5rem;
      font-size: .32rem;
      color: #DFEBFD;
      padding: .2rem 0;
      margin:auto;
      margin-top: .5rem;
      display: block;
      font-weight: 600;
    }
    .footer_gushi{
      text-align: center;
      color: #dedede ;
      font-size: .20rem;
      margin-top: .5rem ;
      margin-bottom:.4rem;
      display: block;
    }
    img.footer_okBtnimg{
      width: 90%;
      margin: auto;
      display: block;
    }
  </style>
</head>

<body>
  <div id="Vue" >
    <div class="rich_media_area_primary">
      <div class="content_div">
        <div class="method">
          <img src="http://only.1yuaninfo.com/public/static/index/allpublic/img/state/statethr_img_01.png">
          <div class="state_new_ddiv">
            <img src="http://only.1yuaninfo.com/public/static/index/allpublic/img/state/statethr_img_02.png">
            <div class="state_new_pdiv">
              <!-- <p>股市有风险，入市须谨慎。</p>

              <p>为保障您的合法权益，在您决定接受本平台投顾服务前，请务必仔细阅读如下声明条款。</p>
    
              <p>如果您具有风险识别能力和风险承受能力，并同意下列声明条款，请点击下方“<span>我已知晓</span>”按钮，平台即为您<span>开通价值1490元的5次体验机会</span>。</p>
    
              <p>如果您不同意下列条款，请结束浏览，勿进入、访问或使用本公众号平台任何信息。</p> -->
              <div style="margin-bottom: .3rem;"><img src="http://only.1yuaninfo.com/public/static/index/allpublic/img/state/statethr_img_05.png"></div>
              <p>
                <span>1</span>
                <i>&nbsp;</i>本平台向您提供的投顾服务，仅辅助您做出投资决策，请独立判断并对您自主决定的行为负责，证券市场具有较大风险，投资顾问业务服务也存在风险，风险是自担的。</p>
    
              <p>
                <span>2</span>
                <i>&nbsp;</i>本平台不会通过除公众号以外的任何群、微信（个人微信、企业微信）、电话、短信等方式推荐股票，凡涉及个股分享、跟踪提醒等信息均以本平台（公众号）推送为准，任何个人或机构以及冒充本平台名义向您私自荐股、提供证券咨询服务等行为均与本平台无关，请谨慎辨别。
              </p>
    
              <p>
                <span>3</span>
                <i>&nbsp;</i>本平台所载股评、分析、预测、个股等信息，是基于（现状）公开资料，力求真实可靠，但不保证其正确性、准确性或完整性，亦不对您因使用该等信息而可能导致的损失承担任何责任。</p>
    
              <p>
                <span>4</span>
                <i>&nbsp;</i>本平台不代客理财，不分成，不会通过微信、短信、电话或任何其他渠道进行承诺收益、收入分成等非法活动，不以任何形式向您明示、暗示投资不受损失或保本保收益。</p>
    
              <p>
                <span>5</span>
                <i>&nbsp;</i>平台所公开的数据、记录、收益、图表、指标等，为过往案例展示之用，产品和服务历史业绩不代表未来业绩，过往表现不代表未来表现，无法保证投资不受损失。</p>
    
              <p>
                <span>6</span>
                <i>&nbsp;</i>本平台一律以对公账户收款，任何个人账户或非我司抬头的账户收款均非我司行为，请您提高警惕。</p>
    
              <p>
                <span>7</span>
                <i>&nbsp;</i>本平台先体验、再合作，在您认可本平台模式、理念、规则，自主决定购买产品服务，成为正式客户时，请您仔细阅读并亲自签署产品合同（服务协议），认真参与风险评估问卷并通过风险评估，自愿向平台提供您真实有效的身份信息、联系方式等。
              </p>
    
              <p>
                <span>8</span>
                <i>&nbsp;</i>请确认您自主购买的本平台投顾产品名称、服务类型、服务期限等信息，并确认后期是您本人使用，建议您妥善保管产品使用权限，不得将产品转借他人使用。
              </p>
              <p>
                <span>9</span>
                <i>&nbsp;</i>本平台对于您在使用各项服务可能导致的任何直接或间接损失，不承担任何赔偿责任。</p>
              <p>
                <span>10</span>
                <i>&nbsp;</i>根据合规要求，在为您开通正式服务前，本平台会就以上相关条款给您做一次风控回访（提示），回访内容应是您本人真实意愿的表达。</p>
                <p style="text-align: center;color: #c6c6c6;font-size: 12px;padding-top: .5rem;">已是最底部～</p>
              <!-- <p>
                您在接收本平台服务过程中，有任何意见或建议均可向您的平台工作人员问询和沟通，也可以直接拨打服务监督电话：
              </p> -->
            </div>
          </div>
          <div class="footer">
            <!-- <img src="http://only.1yuaninfo.com/public/static/index/allpublic/img/state/okBtnImgThr.gif" @click="getStateClickFun($event,1)" v-show="infordata.is_agree == 0" class="footer_okBtnimg"/> -->
            <input type="button" class="okBtn" value="好的，我已知晓" @click="getStateClickFun($event,1)" v-show="is_agree == 0">
            <input type="button" class="okBtnY" value="好的，我已知晓" @click="getStateClickFun($event,2)"  v-show="is_agree == 1">
            <label class="female">
              <input type="radio" name="number" id="female" value="2" checked><i class="female-checkbox"></i>
              <span>确认你已仔细阅读并同意平台声明所有条款</span>
              <!-- <p class="footer_tishi">您在接收本平台服务过程中，有任何意见或建议均可向您的平台工作人员问询和沟通，也可以直接拨打服务监督电话：</p> -->
              <!-- <input type="button" @click="alertMenu" class="tellkefu" value="电话咨询" /> -->
              <p class="footer_gushi">股市有风险，投资需谨慎</p>
            </label>
      
          </div>
          <input type="hidden" value="<?php echo $user_id; ?>" id="user_id"/>
          <!--用户id-->
          <input type="hidden" value="<?php echo $is_agree; ?>" id="is_agree"/>
          <!--是否已知晓平台声明 1已知晓0未知晓-->
        </div>
      </div>
    </div>
    
    <!-- 提示框 -->
    <div class="UnlockingTishiBox" @click="getUnlockingTishiBox()">
      <div><img src="http://only.1yuaninfo.com/public/static/index/allpublic/img/state/state_img.png"></div>
    </div>
    <!-- 拨打电话 -->
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
  </div>
  <script>
    new Vue({
      el: "#Vue",
      data: {
        url: encodeURI(window.location.href), //获取整个url
        user_id: $("#user_id").val(),
        is_agree:$("#is_agree").val(),
        infordata: {},
        collectImg: 'http://only.1yuaninfo.com/public/static/index/allpublic/img/state/state_icon_02.png',
        likeImg: 'http://only.1yuaninfo.com/public/static/index/allpublic/img/state/state_icon_03.png',
        click_type: 0,
        tellshow: false,
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
        alertMenu() {
          this.tellshow = true;
        },
        toCancel() {
          this.tellshow = false;
          // console.log('点击了取消');
        },
        //弹框
        getUnlockingTishiBox() {
          $(".UnlockingTishiBox").hide()
          $("body").removeClass("overflow-hidden")
        },
        // getStateInfo() {
        //   // var that = this;
        //   $.ajax({
        //     url: 'http://only.1yuaninfo.com/index/register/state_click',//地址
        //     dataType: 'json',//数据类型
        //     type: 'get',//类型
        //     async: true,
        //     timeout: 2000,//超时
        //     data: {
        //       user_id: this.user_id,
        //       type: 5,
        //     },
        //     //请求成功
        //     success: res => {
        //       console.log(res);
        //       if (res.msg == '40163' || res.msg == '40029') {
        //         window.location = this.getUrl();
        //       } else if(res.error_code == 2001){
        //         // 判断游客跳转注册页面 除游客之外都可以看
        //         window.location.href = 'https://open.weixin.qq.com/connect/oauth2/authorize?appid=wxa9a406f84b7c9be7&redirect_uri=http%3A%2F%2Fonly.1yuaninfo.com%2Findex%2Fregister%2Findex.html&response_type=code&scope=snsapi_base&state=123#wechat_redirect'
        //       }else{
        //         if (res.is_agree == 0) {
        //           // $(".footer").show();
                  
        //         }
        //         this.user_id = res.user_id;
        //         this.infordata = res;
        //       }
        //     },
        //     //失败/超时
        //     error: function (error) {
        //       console.log(error);
        //     }
        //   })
        // },
        getStateClickFun(e, state) {
          console.log(state)
          if (state == 1) {
            this.click_type = 1;
            layer.msg("您已查阅！")
            this.getStateAjaxFun(state)
            return false;
          }else if(state == 2){
            layer.msg("您已查阅！")
          }
        },
        getStateAjaxFun(state) {
          $.ajax({
            url: 'http://only.1yuaninfo.com/index/register/state_click',//地址
            dataType: 'json',//数据类型
            type: 'get',//类型
            async: true,
            timeout: 2000,//超时
            data: {
              user_id: this.user_id,
              type: 5,
            },
            //请求成功
            success: res => {
              console.log(res);
              if (res.msg == "点击成功") {
                console.log("点击成功")
                if (state == 1) {
                  // $(".UnlockingTishiBox").show();
                  // $("body").addClass("overflow-hidden")
                  this.is_agree = 1;
                } 
              }
            },
            //失败/超时
            error: function (error) {
              console.log(error);
            }
          })
        },
        getEquipmentFun() {
          var u = navigator.userAgent, app = navigator.appVersion;
          var isAndroid = u.indexOf("Android") > -1 || u.indexOf("Linux") > -1; //g
          var isIOS = !!u.match(/\(i[^;]+;( U;)? CPU.+Mac OS X/); //ios终端
          if (isAndroid) {
            // alert("安卓机！");
            this.Equipment = 'android';  
            $(".footer").css("height","1rem");
          }
          if (isIOS) {
            // alert("苹果机！");
            this.Equipment = 'ios'
          }
        },
        wxshare() {
          let lineLink = location.href;//url不能写死
          axios({
            method: 'POST',
            url: 'http://zztong.1yuaninfo.com/index/chat/share',
            data: {
              url: $.base64.encode(lineLink),
              name: 'experience'
            }
          })
            .then((res) => {
              //成功的回调
              // console.log(res)
              let shareData = res.data
              var imgUrl = 'http://zztong.1yuaninfo.com/Underthegeneral/img/share_img.png'; // 分享后展示的一张图片
              // var descContent = ''; // 分享后的描述信息
              let shareTitle = document.title; // 分享后的标题
              wx.config({
                debug: false, // 为true时，就是调试模式，会弹出一些信息，正确、错误都会弹。
                appId: shareData.appid, // 必填，公众号的唯一标识
                timestamp: shareData.timestamp.toString(), // 必填，生成签名的时间戳
                nonceStr: shareData.noncestr, // 必填，生成签名的随机串
                signature: shareData.jsapi_token, // 必填，签名，
                // 必填，把要使用的方法名放到这个数组中。
                jsApiList: ['onMenuShareTimeline',
                  'onMenuShareAppMessage'] //新版本updateAppMessageShareData&updateTimelineShareData目前无效
              })
              wx.ready(() => {
                var AppMessageShareData = {
                  title: shareTitle, // 分享到朋友标题
                  desc: "", // 分享描述
                  link: lineLink, // 分享链接，该链接域名或路径必须与当前页面对应的公众号JS安全域名一致
                  imgUrl: imgUrl, // 分享图标
                  success: function () {
                    // 用户确认分享后执行的回调函数
                    // alert('分享给朋友')
                  },
                  cancel: function () {
                    // 用户取消分享后执行的回调函数
                    // alert('分享给朋友失败')
                  }
                };
                var TimelineShareData = {
                  title: shareTitle, // 分享到朋友标题
                  desc: "", // 分享描述
                  link: lineLink, // 分享链接，该链接域名或路径必须与当前页面对应的公众号JS安全域名一致
                  imgUrl: imgUrl, // 分享图标
                  success: function () {
                    // 用户确认分享后执行的回调函数
                    //alert('分享给朋友')
                  },
                  cancel: function () {
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
        },
      },
      mounted() {
      },
      created() {
        

      }
    })
  </script>

</body>

</html>