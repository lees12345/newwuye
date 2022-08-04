<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:80:"/home/wwwroot/only.1yuaninfo.com/./application/index/view/product/product_a.html";i:1635745575;}*/ ?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no;">
  <link rel="stylesheet" href="http://only.1yuaninfo.com/public/static/index/allpublic/css/under.css?v=1.0.1" />
  <link rel="stylesheet" href="http://only.1yuaninfo.com/public/static/index/allpublic/css/publicStyle.css" />
  <link rel="stylesheet" href="http://only.1yuaninfo.com/public/static/index/allpublic/css/my_style.css">
  <link rel="stylesheet" href="http://only.1yuaninfo.com/public/static/index/allpublic/css/vantcss.css" />
  <script src="http://only.1yuaninfo.com/public/static/index/allpublic/js/rem.js"></script>
  <script src="http://only.1yuaninfo.com/public/static/index/allpublic/js/jquery-3.5.1.min.js"></script>
  <link rel="stylesheet" href="http://only.1yuaninfo.com/public/static/index/allpublic/css/swiper-bundle.min.css">
  <script src="http://only.1yuaninfo.com/public/static/index/allpublic/js/swiper-bundle.min.js"></script>
  <!-- ECharts单文件引入 -->
  <script src="http://only.1yuaninfo.com/public/static/index/allpublic/js/echarts.min.js"></script>
  <!-- 引入样式文件 -->
  <!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/vant@2.10/lib/index.css" /> -->
  <!-- 引入 Vue 和 axiox 的 JS 文件 -->
  <script type="text/javascript" src="http://only.1yuaninfo.com/public/static/index/allpublic/js/vue.js"></script>
  <script type="text/javascript" src="http://only.1yuaninfo.com/public/static/index/allpublic/js/axios.min.js"></script>
  <!-- 引入 Vue 和 Vant 的 JS 文件 -->
  <script src="https://cdn.jsdelivr.net/npm/vue@2.6/dist/vue.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/vant@2.10/lib/vant.min.js"></script>
  <script src="http://only.1yuaninfo.com/public/static/index/allpublic/js/base64.js"></script>
  <script type="text/javascript" src="https://res.wx.qq.com/open/js/jweixin-1.6.0.js"></script>
  
  <title>稳健型</title>
  <style>
    a:hover{text-decoration:none;}/*指鼠标在链接*/
    .historyr_div{
      position: relative;
    }
    .earnings_div{
      position: relative;
    }
    .columnar_div {
      position: absolute;
      top: 3.5rem;
      width: 90%;
      left: 0;
      right: 0;
      margin: auto;
      background-color: #FFFFFF;
      border-radius: .1rem;
    }
    
    .contentt {
      padding: .2rem .5rem 1rem .5rem;
      background-color: #f8f9ff;
    }
    .contentt span {
      font-size: 11px;
      font-family: PingFangSC-Regular, PingFang SC;
      font-weight: 400;
      color: #a1a2a3;
      line-height: .32rem;
    }
    .contentt_tell{
      margin-top: .5rem;
      overflow: hidden;
    }
    .swiper_div{
      position: absolute;
      bottom: .8rem;
      width: 90%;
      margin: auto;
      left: 0;
      right: 0;
      height: 3rem;
    }
    .swiper-container {
      width: 100%;
      height: 100%;
    }

    .swiper-slide {
      text-align: center;
      font-size: 18px;
      background: #fff;

      /* Center slide text vertically */
      display: -webkit-box;
      display: -ms-flexbox;
      display: -webkit-flex;
      display: flex;
      -webkit-box-pack: center;
      -ms-flex-pack: center;
      -webkit-justify-content: center;
      justify-content: center;
      -webkit-box-align: center;
      -ms-flex-align: center;
      -webkit-align-items: center;
      align-items: center;
    }
    .swiper-slide img{
      /* width: 100%; */
    }
    .colunumber_div{
      position: absolute;
      top:1.9rem;
      width: 95%;
      left: 0;
      right: 0;
      margin: auto;
      display: flex;
      /* flex-direction: row; */
      /* display: table; */
      
    }
    .colunumber_div dl{
      /* display: flex; */
      flex-direction: column;
      display: table-cell;
      text-align: center;
      flex: 1;
    }
    .colunumber_div dl dd:first-child{
      color: #F6D6AD;
      font-size: .4rem;
    }
    .colunumber_div dl dd b{
      color: #F6D6AD;
      font-size: .5rem;
    }
    .colunumber_div dl dd:last-child{
      color: #FFFFFF;
      font-size: .24rem;
      padding-top:.3rem;
      opacity: 0.6;
    }
    .contentt_tell{
      /* display: flex; */
      display: flex;
    }
    .contentt_tell p{
      display: table-cell;
      flex:1;
    }
    @media only screen and (min-device-width: 360px) and (max-device-height: 780px) and (-webkit-device-pixel-ratio: 3) { 
      .columnar_div {
        position: absolute;
        top: 3rem;
        width: 90%;
        left: 0;
        right: 0;
        margin: auto;
        background-color: #FFFFFF;
        border-radius: .1rem;
      }
    }
    @media only screen and (min-device-width: 360px) and (max-device-height: 880px) and (-webkit-device-pixel-ratio: 3) { 
      .colunumber_div{
        position: absolute;
        top:1.8rem;
        width: 95%;
        left: 0;
        right: 0;
        margin: auto;
        display: flex;
        /* flex-direction: row; */
        /* display: table; */
        
      }
      .columnar_div {
        position: absolute;
        top: 3rem;
        width: 90%;
        left: 0;
        right: 0;
        margin: auto;
        background-color: #FFFFFF;
        border-radius: .1rem;
      }
    }
    .van-action-sheet__cancel, .van-action-sheet__item{
      color: #333333;
    }
    .bottom_div_opacyuan a:first-child .van-action-sheet__item{
      color:#39498d;
      font-size: .34rem;
      font-weight: bold;
    }
  </style>
</head>

<body>
  <div id="Vue">
    <div class="container">
      <div class="product_div">
        <div>
          <img src="http://only.1yuaninfo.com/public/static/index/allpublic/img/products/products_01.png" />
        </div>
        <!-- <div>
          <img src="http://only.1yuaninfo.com/public/static/index/allpublic/img/products/products_formal_01.png" />
        </div> -->
        <div v-show="name=='formal'">
          <img src="http://only.1yuaninfo.com/public/static/index/allpublic/img/products/products_formal_01.png" />
        </div>
        <!-- <div class="earnings_div">
          <img src="http://only.1yuaninfo.com/public/static/index/allpublic/img/products/products_04.png" />
          <div class="colunumber_div">
            <dl>
              <dd><b>{{earningshow.start}}</b></dd>
              <dd>近一年</dd>
            </dl>
            <dl>
              <dd><b>{{earningshow.six_month}}</b></dd>
              <dd>近六个月</dd>
            </dl>
            <dl>
              <dd>+<b>{{earningshow.last_month}}</b>%</dd>
              <dd>近一个月</dd>
            </dl>
          </div>
          <div class="columnar_div">
            <div class="LineBox flex-v pad10">
              <div class="barEcharts" id="chartLine" style="width: 100%;height:300px;overflow: auto;">

              </div>
            </div>
            <p class="hint_title">股市有风险，投资需谨慎</p>
          </div>
        </div> -->
        <img src="http://only.1yuaninfo.com/public/static/index/allpublic/img/products/products_02.png" />
        <!-- <div class="historyr_div">
          <img src="http://only.1yuaninfo.com/public/static/index/allpublic/img/products/products_03.png" />
          <div class="swiper_div">
            Swiper
            <div class="swiper-container swiperBanner">
              <div class="swiper-wrapper"  v-if="bannerList.length">
                <div class="swiper-slide" v-for="(item,index) in bannerList" >
                  <img :src="item.url" alt="" @click="linkclickFun(item.url)"/>
                </div>
              </div>
              分页器
              <div class="swiper-pagination" slot="pagination">
              </div>
              如果需要导航按钮
              <div class="swiper-button-prev"></div>
              <div class="swiper-button-next"></div>
            </div>
          </div>
        </div> -->
       
        <div class="contentt">
          <span>我们不作任何"加入会员、代客理财、利润分成“等服务，不以任何形式向用户做出投资不受损失或取得最低收益的承诺，请投资者审慎自主决策，独立承担投资风险。股市有风险，投资须谨慎。</span>
          <!-- <input type="button" @click="alertMenu" class="tellkefu" value="联系客服：4006088879"> -->
          <!-- <div class="contentt_tell">
            <p>
              <span style="margin: .1rem 0;display:flex;flex-direction:row;align-items:center;">
              <img src="http://only.1yuaninfo.com/public/static/index/allpublic/img/products/products_tell.png"
              style="width: 12%;display: inline-block;vertical-align: middle;"><a
              href="tel:18551989799" style="color: #7e7e81;font-size:.46rem;padding-left: .1rem;padding-right:.2rem;border-right:#eeeeee solid 1px;"> 18551989799</a>
              </span>
            </p>
            <p>
              <span style="display: block;font-size:.3rem;text-align: center;"><a
                href="tel:400-608- 8879" style="color: #7e7e81;"> 400-608- 8879</a></span>
              <span style="display: block;font-size:.3rem;text-align: center;"><a
                href="tel:010-565-19799" style="color: #7e7e81;">010-565-19799</a></span>
            </p>
          </div> -->
        </div>
        
      </div>
      <div id="action_sheet"  v-show="tellshow" >
        <div class="van-overlay" style="z-index: 2001;" @click="toCancel"></div>
        <div class="bottom_tell van-popup van-popup--round van-popup--bottom van-popup--safe-area-inset-bottom van-action-sheet"
          style="z-index: 2002;">
          <div class="van-action-sheet__content" round  >
            <div class="bottom_div_opacyuan">
              <a class="" href="tel: 400-6088- 879">
                <button type="button" class="van-action-sheet__item" style="border-bottom: #EEEEEE solid 1px;">
                  <span class="van-action-sheet__name">呼叫：400-6088- 879</span>
                </button>
              </a>
              <a class="" href="tel: 185-5198-9799">
                <button type="button" class="van-action-sheet__item">
                  <span class="van-action-sheet__name">呼叫：185-5198-9799</span>
                </button>
              </a>  
            </div>
            <div style="height: 0.5rem; opacity: 0;"></div> 
            
            <div class="bottom_div_opac" >
              <a class="" href="tel:18611222771">
                <button type="button" class="van-action-sheet__item">
                  <span class="van-action-sheet__name">呼叫：186-1122-2771</span>
                </button>
              </a>
              <a class="" href="tel: 010-5651-9799">
                <button type="button" class="van-action-sheet__item" style="border-bottom: #EEEEEE solid 1px;">
                  <span class="van-action-sheet__name">呼叫：010-5651-9799</span>
                </button>
              </a>
              
              <button type="button" class="van-action-sheet__item" @click="toCancel">
                <span class="van-action-sheet__name" style="color: #999999;">取消</span>
              </button>
            </div>
            
          </div>
        </div>
      </div>
      <!-- <div class="product_footer" v-show="name=='experience'">
        <div class="price_num">
          <p class="price_num_last">
            <img src="http://only.1yuaninfo.com/public/static/index/allpublic/img/products/products_gift.png" style="width:.8rem ;height:.8rem;vertical-align: middle;">
            <span style="line-height: .4rem;">新人<br/>福利价</span>
          </p>
          <p class="price_num_p">
            <span class="price_num_p_first">¥<b>980</b>/5次</span>
          </p>
        </div>
        <div class="sign_up" @click="BuyNow()">立即购买</div>
      </div> -->
      <!-- <div class="product_footer" v-show="name=='experience'">
        <div class="price_num">
          <p class="price_num_p">
            <span class="price_num_p_first">¥<b>2980</b>/10次</span>
          </p>
        </div>
        <div class="sign_up" @click="BuyNow()">立即购买</div>
      </div>
      <div class="product_footer" v-show="name=='formal'">
        <div class="price_num">
          <p class="price_num_p">
            <span class="price_num_p_first">¥<b>2980</b>/10次</span>
          </p>
        </div>
        <div class="sign_up" @click="BuyNow()">立即购买</div>
      </div> -->
    </div>
    <!-- <div class="popupWindow" v-if="isshow">
      <div class="windowBg" style="position: relative;">
        <img style="width: 15px;position: absolute;top: -25px;right: -20px;" src="http://only.1yuaninfo.com/public/static/index/allpublic/img/closeIcon.png" alt=""
          @click="isshow = false">
        <div class="money_price">
          <span class="money_how">¥<b class="money_much">980</b>.00</span>
          <span id="counts">/5次</span>
        </div>
        <div class="money_operation">
          <span @click="money_jian"> - </span>
          <input class="money_num" type="text" value="1">
          <span @click="money_jia">+</span>
        </div>
        <input type="button" class="products_pay" value="立即支付" @click="getPayFun()">
      </div>
    </div> -->
  </div>

  <script>
    new Vue({
      el: "#Vue",
      data: {
        activeName: "当月",
        openid: "", //声明openid
        url: encodeURI(window.location.href), //获取整个url
        code: '',
        appID: '',
        name: '',
        isshow: false, // 支付确认弹窗
        mobilePhone: '', //加密手机号
        order_state:'',
        bannerList:'',
        vanTablist: [{
          title: "当月",
        },
        {
          title: "近1月",
          value: "1"
        },
        {
          title: "近3月",
          value: "3"
        },
        {
          title: "近6月",
          value: "6"
        },
        {
          title: "近1年",
          value: "12"
        },
        ],
        earningshow:{},
        start_time: '',
        end_time: '',
        tellshow: false,

      },
      // props: ['bannerList'],
      mounted() {
        
      },
      methods: {
        alertMenu() {
          this.tellshow = true;
        },
        toCancel() {
          this.tellshow = false;
          // console.log('点击了取消');
        },
        _initswiper(){
					var swiperBanner = new Swiper ('.swiperBanner', {	
						autoplay: 3000,
            pagination: {
              el: '.swiper-pagination',
            },
						// pagination : '.swiper-pagination',
						// loop: false, // 循环模式选项
            autoplay: {
              reverseDirection: true,
            },
					})
				},
        getBannerApiFun(){			
          axios({
            methods: 'get',
            url: 'http://zztong.1yuaninfo.com/index/product/history',
            params: {
              name: this.name
            }
          })
          .then((res) => {
            //成功的回调
            console.log(res);
            this.bannerList = res.data;
            this.$nextTick(function () {
              this._initswiper();
            })
            
          })
          .catch((error) => {
            //失败的回调
            console.log(error.response)
            
          });
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
        
        linkclickFun(imgurl){
          // 微信点击放大
          var imgs = [];
          // var imgObj = $(".userImg img");//这里改成相应的对象
          var imgObj = imgurl;
          imgs.push(imgurl);
          // for(var i=0; i< imgObj.length; i++){
              // imgs.push(imgObj.eq(i).attr('src'));
              // imgObj.eq(i).click(function(){
                    var nowImgurl = imgurl;
                    WeixinJSBridge.invoke("imagePreview",{
                      "urls":imgs,
                      "current":nowImgurl
                    });
                  // });
        //  }
        },
        getPayFun() {
          // if(this.name == 'experience'){
            // 支付2980
            var number = 1;
            // window.location.href = "https://open.weixin.qq.com/connect/oauth2/authorize?appid=wx9115203d6f1df477&redirect_uri=http%3A%2F%2Fzztong.1yuaninfo.com%2Findex%2Forder%2Fproduct%3Fname%3Dformal%26user_tel="+this.mobilePhone+"%26number="+number+ "%26product_id=" + 1 + "%26type=" + 1 + "&response_type=code&scope=snsapi_base&state=STATE&connect_redirect=1#wechat_redirect"
            var type = 1;
            var productId = 2;
            window.location.href = "https://open.weixin.qq.com/connect/oauth2/authorize?appid=wx9115203d6f1df477&redirect_uri=http%3A%2F%2Fzztong.1yuaninfo.com%2Findex%2Forder%2Fproduct%3Fname%3Donly%26user_tel=" + this.mobilePhone + "%26number=" + number + "%26product_id=" + productId + "%26type=" + type + "&response_type=code&scope=snsapi_base&state=STATE&connect_redirect=1#wechat_redirect"
          // }else if(this.name == 'formal'){
          //   var number = $(".money_num").val();
          // }
        },
        BuyNow() {
          axios({
            methods: 'get',
            url: 'http://zztong.1yuaninfo.com/index/personal/purpose',
            params: {
              code: this.code,
              name: this.name
            }
          })
          .then((res) => {
            //成功的回调
            console.log(res)
            if (res.data) {
              if (res.data.msg == "40163") {
                window.location = this.getUrl();
              }else if (res.data.msg == "40029") {
                window.location = this.getUrl();
              }else if (res.data.error_code == "2001") {
                window.location =
                  "http://zztong.1yuaninfo.com/Underthegeneral/pages/personal/register.html?name=" +
                  this.name + "&backUrl=" + "productIndex"
              }else{
                this.mobilePhone = res.data.encodeOpenid;
                this.order_state = res.data.order_state;
                if(this.order_state == '1'){
                  // 有订单 //  正式平台
                  window.location = "http://zztong.1yuaninfo.com/Underthegeneral/pages/wxpay/newpayfor.html?name=" + this.name+'&user_tel='+this.mobilePhone
                }else{
                  this.getPayFun();
                }
              }
          
            } else {
              console.log('[index/personal/purpose],没有加密手机号')
            }
            
            // this.datalist = res.data;
          })
          .catch((error) => {
            //失败的回调
            console.log(error.response)
            if (error.response.data.error_code == 2002) {
              alert("暂未查询到用户信息，请重新关注")
              setTimeout((function () {
                WeixinJSBridge.call('closeWindow');
              }), 500);
            }
          });
        },
        lineEchartsFun(typeVal) {
          let that = this;
          var myChartLine = echarts.init(document.getElementById('chartLine'));
          var optionLine = {
            tooltip: {
                trigger: 'axis',
                formatter: '{b0}<br/><i style="display: inline-block;width: 10px;height: 10px;background:#2A6BFC;margin-right: 5px;border-radius: 50%;}"></i>{a0}: {c0}%<br /><i style="display: inline-block;width: 10px;height: 10px;margin-right: 5px;border-radius: 50%;}"></i>{a1}: {c1}%'
            },
            legend: {
              orient: 'horizontal',
              align:'right',
              // selectedMode: 'single', //多线条互斥只显示一条
              itemWidth: 15, // 设置宽度
              itemHeight: 5, // 设置高度
              data: [{
                name: '上证',
                icon: 'rectangle', // square(方)circle(圆)rectangle(长方)
                textStyle: {
                  fontSize: 13,
                  color: '#666',
                },
                show: false
              },
              {
                name: '平台',
                icon: 'rectangle', // square(方)circle(圆)rectangle(长方)
                textStyle: {
                  fontSize: 13,
                  color: '#666',
                },
              }],
              right: '4%',
              selected: {
                '累计收益': false
              }
              // padding: [30, 0, 0, 0], // X轴顶部类型位置
              // textStyle: {
              //     fontSize: 12,
              //     color: '#666'
              // }
            },
            grid: {
              left: '5%',
              right: '10%',
              bottom: '3%',
              containLabel: true
            },
            // toolbox: {
            //   feature: {
            //     saveAsImage: {}//下载
            //   }
            // },
            xAxis: {
              
              type: 'category',
              boundaryGap: false,
              axisLine:{
                lineStyle:{
                    color:'#adadac',
                }
              },
              data: [],
              axisTick: {    // 坐标轴刻度
                  show: true,  // 是否显示
                  inside: true,  // 是否朝内
                  length: 2,     // 长度
                  lineStyle: {   // 默认取轴线的样式
                      color: '#ccc',
                      width: 1,
                      type: 'solid'
                  }
              },
              axisLabel: {    // 坐标轴标签
                  show: true,  // 是否显示
                  inside: false, // 是否朝内
                  rotate: 0, // 旋转角度
                  margin: 10, // 刻度标签与轴线之间的距离
                  color: '#999',  // 默认取轴线的颜色 
                  interval: 0
              },
            },
            yAxis: {
              type: 'value',
              axisLine:{
                lineStyle:{
                    color:'#adadac',
                    // width:8,//这里是为了突出显示加上的
                }
              },
              
            },
            show:{

            },
            series: [
              {
                name: '上证',
                type: 'line',
                // smooth: true,
                data: [],
                itemStyle: {
                  color: '#2A6BFC',
                },
                // symbolSize: 0, // 隐藏该线条
                showSymbol: false,
                lineStyle: {
                  width: 1, //线宽
                  // color: 'rgb(0, 0, 0, 0)'
                }
              },
              {
                name: '平台',
                type: 'line',
                // smooth: true,
                data: [],
                itemStyle: {
                  color: '#E30000',
                },
                // symbolSize: 0, // 隐藏该线条
                showSymbol: false,
                lineStyle: {
                  width: 1, //线宽
                  // color: 'rgb(0, 0, 0, 0)'
                }
              },
            ]
          };
          axios.get('http://zztong.1yuaninfo.com/index/product/profitchart', {
            params: {
              name: that.name,
              // type: typeVal
            }
          })
            .then(function (res) {
              //成功的回调
              console.log(res);
              optionLine.xAxis.data = res.data.xAxis.data.reverse();
              optionLine.xAxis.axisLabel.interval = res.data.xAxis.data.length-2; // 设置x轴间隔5个显示

              optionLine.series[0].data = res.data.series[1].data.reverse();//本平台
              optionLine.series[1].data = res.data.series[0].data.reverse();
              that.earningshow = res.data.show.data;
              myChartLine.setOption(optionLine);
             
            })
            .catch(function (error) {
              //失败的回调
            });
          // myChartLine.setOption(option);
        },
        serviceRecordFun() {
          window.location.href = 'http://zztong.1yuaninfo.com/Underthegeneral/pages/service/index.html?openid=' + this.openid;
        },
        wxshare() {
          let lineLink = location.href;//url不能写死
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
        }
      },
      mounted() {
        // this.methodAll();
        // this.getBannerApiFun();
        // this.lineEchartsFun(6); 
      },
      created() {
        // this.wxshare()
        
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