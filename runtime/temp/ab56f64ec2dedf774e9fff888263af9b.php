<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:79:"/home/wwwroot/only.1yuaninfo.com/./application/index/view/personal/service.html";i:1635659571;}*/ ?>

<!DOCTYPE html>
<html>

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="chrome=1">
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
  <title>服务记录</title>
  <link rel="stylesheet" href="http://only.1yuaninfo.com/public/static/index/allpublic/css/under.css">
  <!-- <link rel="stylesheet" href="http://only.1yuaninfo.com/public/static/index/allpublic/css/record.css"> -->
  <link rel="stylesheet" href="http://only.1yuaninfo.com/public/static/index/allpublic/css/publicStyle.css" />
  <script type="text/javascript" src="http://only.1yuaninfo.com/public/static/index/allpublic/js/jquery-3.5.1.min.js"></script>
  <script type="text/javascript" src="http://only.1yuaninfo.com/public/static/index/allpublic/js/rem.js"></script>
  <!-- 引入 Vue 和 axiox 的 JS 文件 -->
  <script type="text/javascript" src="http://only.1yuaninfo.com/public/static/index/allpublic/js/vue.js"></script>
  <script type="text/javascript" src="http://only.1yuaninfo.com/public/static/index/allpublic/js/axios.min.js"></script>
  <script>
    // var vConsole = new VConsole();// 初始化
  </script>
</head>

<body>
  <div id="Vue">
    <h1 class="personal_bg"><img src="http://only.1yuaninfo.com/public/static/index/allpublic/img/personal_bg_01.png"></h1>
    <div class="record_div">
      <ul class="record_ul">
        <li class="checked_record" data-id="6" @click="getUllistFun(6,0)"><img src="http://only.1yuaninfo.com/public/static/index/allpublic/img/record_icon_01.png"></li>
        <li data-id="1" @click="getUllistFun(1,1)"><img src="http://only.1yuaninfo.com/public/static/index/allpublic/img/record_icon_02_2.png"></li>
        <li data-id="3" @click="getUllistFun(3,2)"><img src="http://only.1yuaninfo.com/public/static/index/allpublic/img/record_icon_03_3.png"></li>
        <li data-id="0" @click="getUllistFun(0,3)"><img src="http://only.1yuaninfo.com/public/static/index/allpublic/img/record_icon_04_4.png"></li>
      </ul>
      <div class="record_box_01">
        <div class="record_box" v-for="(item,index) in recordInfo" :key="item.id" v-show="recordInfo.length > 0">
          <p class="record_title">服务日期：{{item.add_time}}
            <img src="http://only.1yuaninfo.com/public/static/index/allpublic/img/yellow.png" v-show="item.shares_status == 0" />
            <img src="http://only.1yuaninfo.com/public/static/index/allpublic/img/red.png" v-show="item.shares_status == 1" />
            <img src="http://only.1yuaninfo.com/public/static/index/allpublic/img/green.png" v-show="item.shares_status == 3" />
            <img src="http://only.1yuaninfo.com/public/static/index/allpublic/img/green.png" v-show="item.shares_status == 2" />
          </p>
          <p>代码名称：{{item.news_code}}</p>
          <p v-show="item.shares_status == 0" >状态：持股中</p>
          <p v-show="item.shares_status == 1" >状态：止盈</p>
          <p v-show="item.shares_status == 2" >状态：止损</p>
          <p v-show="item.shares_status == 3" >状态：调仓</p>
          <span class="see">
            <!-- <a href="http://yb.1yuaninfo.com/index/report/noshare" > -->
            <a :href="item.shares_report_url" v-show="item.shares_report_url != null">查看<br />详情</a>
            <a href="http://yb.1yuaninfo.com/index/report/noshare"
              v-show="item.shares_report_url == null">查看<br />详情</a>
          </span>
          </p>
        </div>
        <div class="pic" v-show="recordInfo.length == 0">
          <dl class="pic_dl">
            <dt><img src="http://only.1yuaninfo.com/public/static/index/allpublic/img/record_zanwu.png" width="50%"></dt>
            <div style="font-size: 14px; color: #999999;padding-top: .2rem;">暂无更多信息</div>
          </dl>
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
        temp2: '',
        name: '',
        status: "6",
        recordInfo: [],
        Equipment: ''
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
        getUllistFun(obj, index) {
          console.log(obj)
          var el = event.currentTarget;
          this.status = obj;
          this.getServiceRecordFun();
          console.log(el)
          console.log(event.target);
          var lient = event.target
          var imgnum = parseInt(index) + 1
          lient.src = 'http://only.1yuaninfo.com/public/static/index/allpublic/img/record_icon_0' + imgnum + '.png'
          console.log($(".record_ul li").eq(index).siblings().children())
          // $(".record_ul li").eq(index).siblings().children().css("opacity",'0.5')
          $(".record_ul li").eq(index).addClass("checked_record").siblings().removeClass('checked_record');
          console.log('第' + imgnum + '个')

          if (imgnum == 1) {
            // 1234
            // $(".record_ul li").eq(1).children().css("src",'http://only.1yuaninfo.com/public/static/index/allpublic/img/record_icon_0'+ 1 +'_'+1+'.png')
            $(".record_ul li").eq(1).children().attr("src", 'http://only.1yuaninfo.com/public/static/index/allpublic/img/record_icon_0' + 2 + '_' + 2 + '.png')
            $(".record_ul li").eq(2).children().attr("src", 'http://only.1yuaninfo.com/public/static/index/allpublic/img/record_icon_0' + 3 + '_' + 3 + '.png')
            $(".record_ul li").eq(3).children().attr("src", 'http://only.1yuaninfo.com/public/static/index/allpublic/img/record_icon_0' + 4 + '_' + 4 + '.png')

            $(".record_ul li").eq(1).css("border-right", '#eeeeee solid 1px')
            $(".record_ul li").eq(2).css("border-right", '#eeeeee solid 1px')

            $(".record_ul li").eq(0).css("border", '0')

            $(".record_ul li").css('border-radius', '0')

            $(".record_ul li").eq(1).css('border-bottom-left-radius', '.2rem')

            return false
          } else if (imgnum == 2) {
            $(".record_ul li").eq(0).children().attr("src", 'http://only.1yuaninfo.com/public/static/index/allpublic/img/record_icon_0' + 1 + '_' + 1 + '.png')
            $(".record_ul li").eq(3).children().attr("src", 'http://only.1yuaninfo.com/public/static/index/allpublic/img/record_icon_0' + 4 + '_' + 4 + '.png')
            $(".record_ul li").eq(2).children().attr("src", 'http://only.1yuaninfo.com/public/static/index/allpublic/img/record_icon_0' + 3 + '_' + 3 + '.png')

            $(".record_ul li").eq(1).css("border-right", '#eeeeee solid 1px')
            $(".record_ul li").eq(2).css("border-right", '#eeeeee solid 1px')
            $(".record_ul li").eq(0).css("border", '0')
            $(".record_ul li").eq(1).css("border", '0')

            $(".record_ul li").css('border-radius', '0')

            $(".record_ul li").eq(0).css('border-bottom-right-radius', '.2rem')
            $(".record_ul li").eq(2).css('border-bottom-left-radius', '.2rem')

            // $(".record_ul li").eq(3).css('border-radius','0')
            return false
          } else if (imgnum == 3) {
            $(".record_ul li").eq(0).children().attr("src", 'http://only.1yuaninfo.com/public/static/index/allpublic/img/record_icon_0' + 1 + '_' + 1 + '.png')
            $(".record_ul li").eq(1).children().attr("src", 'http://only.1yuaninfo.com/public/static/index/allpublic/img/record_icon_0' + 2 + '_' + 2 + '.png')
            $(".record_ul li").eq(3).children().attr("src", 'http://only.1yuaninfo.com/public/static/index/allpublic/img/record_icon_0' + 4 + '_' + 4 + '.png')

            $(".record_ul li").eq(0).css("border-right", '#eeeeee solid 1px')
            $(".record_ul li").eq(1).css("border-right", '#eeeeee solid 1px')
            $(".record_ul li").eq(2).css("border-right", '#eeeeee solid 1px')

            $(".record_ul li").eq(1).css("border", '0')
            $(".record_ul li").eq(2).css("border", '0')

            $(".record_ul li").css('border-radius', '0')

            $(".record_ul li").eq(1).css('border-bottom-right-radius', '.2rem')
            $(".record_ul li").eq(3).css('border-bottom-left-radius', '.2rem')

            // $(".record_ul li").eq(0).css('border-radius','0')
            // $(".record_ul li").eq(1).css('border-radius','0')

            return false;
          } else if (imgnum == 4) {
            $(".record_ul li").eq(0).children().attr("src", 'http://only.1yuaninfo.com/public/static/index/allpublic/img/record_icon_0' + 1 + '_' + 1 + '.png')
            $(".record_ul li").eq(1).children().attr("src", 'http://only.1yuaninfo.com/public/static/index/allpublic/img/record_icon_0' + 2 + '_' + 2 + '.png')
            $(".record_ul li").eq(2).children().attr("src", 'http://only.1yuaninfo.com/public/static/index/allpublic/img/record_icon_0' + 3 + '_' + 3 + '.png')

            $(".record_ul li").eq(0).css("border-right", '#eeeeee solid 1px')
            $(".record_ul li").eq(1).css("border-right", '#eeeeee solid 1px')
            $(".record_ul li").eq(2).css("border-right", '#eeeeee solid 1px')

            $(".record_ul li").css('border-radius', '0')

            $(".record_ul li").eq(2).css("border", '0')
            $(".record_ul li").eq(3).css("border", '0')



            $(".record_ul li").eq(2).css('border-bottom-right-radius', '.2rem')

            // $(".record_ul li").eq(1).css('border-radius','0')

            return false
          }
          // attr("src",'http://only.1yuaninfo.com/public/static/index/allpublic/img/record_icon_0'+ imgnum +'_'+imgnum+'.png')
          this.getServiceRecordFun()
        },
        getServiceRecordFun() {
          console.log(this.openid)
          $.ajax({
            url: "http://only.1yuaninfo.com/index/personal/lists",
            method: "get",
            data: {
              openid: this.openid,
              status: this.status,
            },
            success: (data) => {
              console.log(data)
              this.recordInfo = data.data
            },
            error: (error) => {
              console.log(error)
            }
          });
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
        // console.log(this.url)
        this.openid = this.GetRequest().openid;
        this.getServiceRecordFun();
        this.getEquipmentFun();
      }

    })
  </script>
</body>

</html>