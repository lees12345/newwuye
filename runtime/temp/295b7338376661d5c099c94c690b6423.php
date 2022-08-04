<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:85:"/home/wwwroot/only.1yuaninfo.com/./application/index/view/history/history_detail.html";i:1637142967;}*/ ?>

<!DOCTYPE html>
<html>

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="chrome=1">
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
  <title>详情</title>
  <link rel="stylesheet" type="text/css" href="http://only.1yuaninfo.com/public/static/index/allpublic/css/all.css">
  <link rel="stylesheet" href="http://only.1yuaninfo.com/public/static/index/allpublic/css/common.css">
  <link rel="stylesheet" href="http://only.1yuaninfo.com/public/static/index/allpublic/css/bootstrap.css">
  <script src="http://only.1yuaninfo.com/public/static/index/allpublic/js/jquery-3.5.1.min.js"></script>
  <!-- 引入 Vue 和 axiox 的 JS 文件 -->
  <script type="text/javascript" src="http://only.1yuaninfo.com/public/static/index/allpublic/js/vue.js"></script>
  <script type="text/javascript" src="http://only.1yuaninfo.com/public/static/index/allpublic/js/axios.min.js"></script>
  <script type="text/javascript" src="https://res.wx.qq.com/open/js/jweixin-1.6.0.js"></script>
</head>

<body>
  <div id="Vue">
    <!--头部-->
    <!-- <div class="one-head navbar-fixed-top text-center">
                <a href="javascript:window.history.back();"><span class="fa fa-chevron-left"></span></a>
                <span class="detail1">月报详情</span>
            </div> -->
    <div class="body_box_two">
      <div class="push-main">

        <p class="title-weeklys">{{historyInfo.history_title}}</p>
        <p class="title-weeklys-s">{{historyInfo.history_addtime}}
          <span class="one-weeklys">{{name}}</span>
        </p>
        <div class="border-time-push2" v-html="historyInfo.history_content">
          {{historyInfo.history_content}}

        </div>
      </div>
      <!--底部-->
      <div class="aboutus_footer" style="font-size:15px">
        <h6 class="text-center" style="margin:7% 0;font-size:15px;color:#000; font-weight:normal;">
          <!--  <p style="color:#1d5ba6;">服务专线：
                        <a href="tel:010-56519898" style="font-size:15px;font-weight:normal;text-decoration: none;color:#1d5ba6;">010-56519898</a></p>
                    <p style="color:#cc0000">投诉建议：
                        <a href="tel:010-87777911" style="font-size:15px;font-weight:normal;text-decoration: none;color:#cc0000;">010-87777911</a></p> -->
        </h6>
      </div>
      <input type="hidden" value="<?php echo $history_id; ?>" id="history_id"/>
      <!--历史回顾id 获取详情页信息时需要传值-->
    </div>
  </div>
  <script>
    new Vue({
      el: "#Vue",
      data: {
        history_id: $("#history_id").val(), //声明openid
        url: encodeURI(window.location.href), //获取整个url
        name:'只推一支股',
        status: "6",
        historyInfo: {},
        id: ''
      },
      methods: {
        format(shijianchuo) {
          //shijianchuo是整数，否则要parseInt转换
          var time = new Date(shijianchuo * 1000);
          var y = time.getFullYear();
          var m = time.getMonth() + 1;
          var d = time.getDate();
          var h = time.getHours();
          var mm = time.getMinutes();
          var s = time.getSeconds();
          return y + '-' + m + '-' + d;
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
        getDataList() {
          axios({
              methods: 'get',
              url: 'http://only.1yuaninfo.com/index/history/detail',
              params: {
                history_id: this.history_id,
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
              if (res.data.error_code == "2001") {
                window.location =
                  "https://open.weixin.qq.com/connect/oauth2/authorize?appid=wxc013297214b78bc8&redirect_uri=http%3A%2F%2Fonly.1yuaninfo.com%2Findex%2Fregister%2Findex.html&name=only&response_type=code&scope=snsapi_base&state=123#wechat_redirect"
              }
              this.historyInfo = res.data;
              // res.data.list.data.forEach(item => {
              //   if (item.history_id == this.id) {
              //     this.historyInfo = item;
              //     // this.historyInfo.history_addtime = this.format(this.historyInfo.history_addtime)
              //     // console.log(this.historyInfo.history_addtime)
              //     // this.historyInfo.history_addtime = this.historyInfo.history_addtime.split(' ')[0].split(
              //       // '-')[0] + '年' + this.historyInfo.history_addtime.split(' ')[0].split('-')[1] + '月'
              //   }
              // })
              console.log
            })
            .catch((error) => {
              //失败的回调
            });
        }

      },
      mounted() {

      },
      created() {
          this.getDataList()
      }
    })
  </script>
</body>

</html>