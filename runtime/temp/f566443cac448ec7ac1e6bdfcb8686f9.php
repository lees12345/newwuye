<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:73:"/home/wwwroot/only.1yuaninfo.com/./application/index/view/news/index.html";i:1639971872;}*/ ?>


<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,	minimum-scale=1.0,maximum-scale=1.0,user-scalable=no">
    <!--<link href="/public/static/home/css/short_term.css" rel="stylesheet" />-->
    <!-- <link rel="stylesheet"  href="/public/static/home/css/dragon.css" > -->
    <title>服务通知详情</title>
    <link rel="stylesheet" href="http://only.1yuaninfo.com/public/static/index/allpublic/css/dragon.css?v=20210303">
    <link rel="stylesheet" href="http://only.1yuaninfo.com/public/static/index/allpublic/css/vouchars.css" />
    <link rel="stylesheet" href="http://only.1yuaninfo.com/public/static/index/allpublic/css/zhuce/discount.css" />
    <link rel="stylesheet" href="http://only.1yuaninfo.com/public/static/index/allpublic/css/zhuce/publicStyle.css" />
    <link rel="stylesheet" href="http://only.1yuaninfo.com/public/static/index/allpublic/css/spell_luck.css" />
    <link rel="stylesheet" href="http://only.1yuaninfo.com/public/static/index/allpublic/css/huachuang.css?v=20200809">
    <link rel="stylesheet" href="http://only.1yuaninfo.com/public/static/index/allpublic/css/vantcss.css" />
    <script type="text/javascript" src="http://only.1yuaninfo.com/public/static/index/allpublic/js/jquery-3.5.1.min.js">
    </script>
    <script type="text/javascript" src="http://only.1yuaninfo.com/public/static/index/allpublic/js/rem.js"></script>
    <script type="text/javascript" src="http://only.1yuaninfo.com/public/static/index/allpublic/js/layer.js"></script>
    <script type="text/javascript" src="http://only.1yuaninfo.com/public/static/index/allpublic/js/alertMsg.js">
    </script>
    <script src="http://only.1yuaninfo.com/public/static/index/allpublic/js/vconsole.min.js"></script>
    <!-- 引入 Vue 和 axiox 的 JS 文件 -->
    <script type="text/javascript" src="http://only.1yuaninfo.com/public/static/index/allpublic/js/vue.js"></script>
    <script type="text/javascript" src="http://only.1yuaninfo.com/public/static/index/allpublic/js/axios.min.js">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/vant@2.10/lib/vant.min.js"></script>
    <!-- 引入 分享 的JS 文件 -->
    <script src="http://only.1yuaninfo.com/public/static/index/allpublic/js/base64.js"></script>
    <script type="text/javascript" src="https://res.wx.qq.com/open/js/jweixin-1.6.0.js"></script>
    <!-- 通知和股票 -->
    <!-- 页面调试 -->
    <script>
        // var vConsole = new VConsole();// 初始化
    </script>
    <style type="text/css">
        body,
        html {
            /* margin: 0; */
            padding: 0 !important;
            min-height: 100%;
            max-width: 750px;
            margin: auto;
            display: block;
            background-color: #F0F0F0;
        }
        
        #alertMsg {
            display: none;
            width: 340px;
            border: 1px solid #ddd;
            border-radius: 5px;
            box-shadow: 1px 1px 1px black;
            padding: .3rem .3rem;
            font-size: 18px;
            left: -10px;
            position: absolute;
            text-align: center;
            background: #fff;
            z-index: 100000;
            margin: auto;
        }
        
        #alertMsg_info {
            padding: 2px 15px;
            line-height: 1.6em;
            text-align: left;
        }
        
        #alertMsg_btn1,
        #alertMsg_btn2 {
            display: inline-block;
            /*background: url(images/gray_btn.png) no-repeat left top;*/
            padding-left: 3px;
            color: #000000;
            font-size: 18px;
            text-decoration: none;
            margin-right: 10px;
            cursor: pointer;
        }
        
        #alertMsg_btn1 cite,
        #alertMsg_btn2 cite {
            line-height: 24px;
            display: inline-block;
            padding: 0 13px 0 10px;
            /*background: url(images/gray_btn.png) no-repeat right top;*/
            font-style: normal;
        }
        
        canvas {
            display: block;
            position: absolute;
            bottom: 5rem;
            right: 0;
            z-index: 20;
            cursor: pointer;
            -webkit-tap-highlight-color: rgba(0, 0, 0, 0);
        }
        /* .journal-reward {
      position: absolute;
			bottom: 70px;
			right: 20px;
			height: 80px;
			width: 80px;
			display: block;
			z-index: 21;
    } */
        /* .dianzan {
			width: 750px;
			height: 1334px;
			margin-left: auto;
			margin-right: auto;
			background: url(img/bg.jpg) no-repeat;
			background-size: 100% 100%;
		} */
        /* 马赛克 */
        
        .bg {
            background-color: black;
            z-index: -1;
            position: fixed;
            top: 0;
            bottom: 0;
            left: 0;
            right: 0;
            filter: blur(10px);
            opacity: 0.5;
        }
        /* 活动动图 */
        
        .activityLeft {
            position: fixed;
            left: 0rem;
            /* bottom: 6rem; */
            top: 8.4rem;
            width: 1.5rem;
            z-index: 100;
        }
        
        .activityLeft img {
            width: 100%;
        }
        /* 靠左活动动图 */
        
        .activityRight {
            position: fixed;
            left: 0rem;
            top: 4.5rem;
            width: 2rem;
            /* display: none; */
            z-index: 100;
        }
        
        .activityRight img {
            width: 100%;
        }
        
        .activityRight img:first-child {
            width: 85%;
        }
        
        .activityRight img:last-child {
            width: 100%;
        }
        /* loading页面 */
        
        #loading {
            position: fixed;
            /* height: 3rem; */
            left: 0;
            top: 0;
            z-index: 999;
            width: 100%;
            height: 100%;
            background-color: #FFFFFF;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        
        img.loadingimg {
            width: 30px;
            height: 30px;
        }
        
        .position_box {
            position: absolute;
            left: 2.5%;
            right: 2.5%;
        }
        
        .bottom_tell_div {
            color: #666666;
            text-align: center;
            margin-bottom: 1rem;
            overflow: hidden;
            width: 70%;
            margin: auto;
            margin-bottom: 1rem;
        }
        
        .bottom_tell_div div {
            display: flex;
            justify-content: space-between;
            font-size: .28rem;
        }
        
        .tell_opac {
            opacity: 0;
        }
        
        .bottom_tell_div a {
            color: #666666;
        }
        /* 解锁 */
        
        .UnlockingBtn {
            background-color: #EB2E27;
            padding: .25rem 0;
            border-radius: .1rem;
            color: #ffffff;
            display: block;
            text-align: center;
            width: 2.5rem;
            margin: auto;
        }
        
        img.UnlockingBtnImg {
            width: 8%;
            text-align: center;
            display: block;
            margin: auto;
            margin: auto;
            margin-top: .1rem;
        }
        
        .seeThisTime {
            background: #EB2E27;
            border-radius: 8px;
            color: #ffffff;
            display: block;
            width: 50%;
            padding: .25rem 0;
            margin: auto;
            margin-top: .3rem;
            font-size: .32rem;
            font-weight: 600;
        }
        
        .seeNextTime {
            background: #0091FF;
            border-radius: 8px;
            color: #ffffff;
            display: block;
            width: 50%;
            padding: .25rem 0;
            margin: auto;
            margin-top: .3rem;
            font-size: .32rem;
            font-weight: 600;
        }
        
        .UnlockingBtngary {
            text-align: center;
            color: #999999;
            font-size: .28rem;
            margin: .1rem auto;
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
            width: 70%;
            margin: auto;
            display: block;
            left: 0;
            right: 0;
            top: 2rem;
            z-index: 120;
        }
        
        .tellkefuDetail {
            text-align: center;
            /* font-weight: bold; */
            margin-bottom: .1rem;
            color: #323232;
            border: #323232 solid 1px;
            border-radius: 25px;
            padding: .1rem .3rem;
            margin: auto;
            display: block;
            margin-bottom: 1rem;
        }
        
        .num_content {
            font-size: .28rem;
            display: block;
            padding: .1rem .2rem;
        }
        
        .van-action-sheet__cancel,
        .van-action-sheet__item {
            color: #333333;
        }
        
        .bottom_div_opacyuan a:first-child .van-action-sheet__item {
            color: #39498d;
            font-size: .34rem;
            font-weight: bold;
        }
        
        .outter {
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, .85);
            cursor: pointer;
            z-index: 1000;
            position: fixed;
            text-align: center;
            top: 0;
        }
        
        .outter img {
            width: 50%;
            transform-origin: 50% 50%;
            transition: transform .4s ease-in-out;
            margin-top: 50%;
        }
        
        .reg_ {
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, .8);
            position: fixed;
            left: 0;
            top: 0;
            z-index: 1;
            display: flex;
            flex-direction: column;
            justify-content: center;
        }
        
        .reg_c {
            width: 100%;
            display: flex;
            flex-direction: row;
            justify-content: center;
        }
        
        .reg_center_row {
            width: 70%;
            height: 100%;
            background-color: white;
            border-radius: 20px;
        }
        
        .reg_text {
            width: 100%;
            padding: 0 20px 0 20px;
            margin-top: 30px;
            margin-bottom: 20px;
            color: #333333;
            text-align: calc();
            font-size: 16px;
            text-align: center;
            letter-spacing: 1px;
        }
        
        .reg_btn_box {
            width: 100%;
            height: 20%;
            display: flex;
            flex-direction: row;
            justify-content: center;
        }
        
        .reg_btn_column {
            width: 70%;
            height: 100%;
            border-radius: 20px;
            background-color: red;
            display: flex;
            flex-direction: column;
            justify-content: center;
            padding-top: 10px;
            padding-bottom: 10px;
            margin-bottom: 30px;
        }
        
        .reg_btn {
            font-size: 16px;
            color: #fff;
            text-align: center;
            letter-spacing: 1px;
        }
        
        .activityLeft1 {
            position: fixed;
            right: 50%;
            margin-right: -.75rem;
            top: 50%;
            margin-top: .5rem;
            width: 1.5rem;
            z-index: 90;
        }
        
        .activityLeft1 img {
            width: 100%;
        }
    </style>
</head>

<body>
    <div id="Vue">
        <!-- 注册提示 -->
        <div class="reg_" v-if="regShow == true" @touchmove.prevent>
            <div class="bg"></div>
            <div class="reg_c">
                <div class="reg_center_row">
                    <div class="reg_text">股票的买卖非常重要<br />需要你注册后方可查看</div>
                    <div class="reg_btn_box">
                        <div class="reg_btn_column" @click='regFn'>
                            <div class="reg_btn">免费注册</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div id="loading" v-show="loading == true">
            <img class="loadingimg" src="http://only.1yuaninfo.com/public/static/index/allpublic/img/loading.gif" alt="">
        </div>
        <div class="body_box_two">
            <h1 class="mt_id_img"><img src="http://only.1yuaninfo.com/public/static/index/allpublic/img/canYuTiYan.jpg" width="100%"></h1>
            <input type="hidden" value="experience" class="name">
            <input type="hidden" value="<?php echo $data['id']; ?>" class="news_id">
            <input type="hidden" value="<?php echo $data['openid']; ?>" class="openid">
            <div class="position_box">
                <!-- <div id="loading" v-show="loading == true">
          <img class="loadingimg" src="http://only.1yuaninfo.com/public/static/index/allpublic/img/loading.gif" alt="">
        </div> -->
                <!--  v-show="loading != true" -->
                <div class="entry_all_box">
                    <p class="details_of_title">
                        {{detailsinfo.mt_name}}
                        <span class="details_of_title_span">{{detailsinfo.add_time}}</span>
                    </p>
                    <div class="details_of_world" v-html="detailsinfo.new_content" @click="imageChange($event)" v-show="experienEnd == false">
                        {{detailsinfo.new_content}}
                    </div>
                    <!-- 体验结束用户 解锁 -->
                    <div class="details_of_world" v-show="experienEnd == true">
                        <div v-html="detailsinfo.news_desc" @click="imageChange($event)">
                            <!--   -->
                            {{detailsinfo.news_desc}}
                        </div>
                        <div>
                            <!-- <input type="button" value="解锁查看全文" class="UnlockingBtn" @click="getUnlockingBtn($event)"  v-show="UnlockingShowTwoBtn == false"> -->
                            <!-- <p class="UnlockingBtngary" v-show="UnlockingShowTwoBtn == true">解锁查看全文</p> -->
                            <!--  v-show="UnlockingShowTwoBtn == true" -->
                            <div>
                                <input type="button" value="付费查看本次" class="seeThisTime" @click="getseeThisTime()">
                                <input type="button" value="免费申请下一期" class="seeNextTime" @click="getseeNextTime()">
                            </div>
                            <!-- <img src="http://only.1yuaninfo.com/public/static/index/allpublic/img/detail_select_down.png" class="UnlockingBtnImg"  @click="getUnlockingBtn($event)" v-show="UnlockingShowTwoBtn == false">  
              <img src="http://only.1yuaninfo.com/public/static/index/allpublic/img/detail_select_up.png" class="UnlockingBtnImg" @click="getUnlockingUp($event)" v-show="UnlockingShowTwoBtn == true">   -->

                        </div>
                    </div>
                </div>
                <div class="detail_bottom " style="margin-bottom: 1rem;">
                    <div class="detail_bot_wirte detail_spical">
                        <p style="margin-top: .1rem;"></p>
                        <p style="text-align: center;font-weight: bold;">投资顾问 </p>
                        <p class="detail_spical_two">
                            金&nbsp;&nbsp;&nbsp;磊&nbsp;&nbsp;A0930621030006<span>牛爱多&nbsp;&nbsp;A0930621110001</span><br/> 刘思远&nbsp;&nbsp;A0930621110002
                            <br />
                        </p>
                        <p style="margin-top: .1rem;"></p>
                        <p style="text-align: center;font-weight: bold;">特别声明 </p>
                        <p>
                            《证券期货投资者适当性管理办法》于2017年7月1日起正式实施，通过微信平台制作的本资料仅面向投资咨询机构专业投资者用户，请勿对本资料进行任何形式的转发。若您非本投资咨询机构的专业投资者，为保证服务质量、控制投资风险，请勿订阅、接受或使用本平台中的任何信息。
                        </p>
                        <p>因本公众号难以设置访问权限，若给您造成不便，烦请谅解！感谢您给予的理解和配合。</p>
                        <p style="margin-top: .1rem;"></p>
                        <p style="text-align: center;font-weight: bold;">重要声明 </p>
                        <p>
                            本公众号受投资咨询机构许可依法设立、运营的官方公众号。本公众号仅面向受委托投资咨询机构客户，仅供在新媒体背景下的研究信息、观点的及时沟通，因本公众号受限于访问权限的设置，本平台不因其他订阅人收到本公众号推送信息而视其为客户。
                        </p>
                        <P>
                            本公众号所载的资料均来自市场公开信息，结合行业热点、股市题材及技术分析后解读。请注意，本资料仅代表发布当日的判断，本公众号不承担更新推送信息或另行通知义务，后续更新信息请以平台发布信息为准。本订阅号推送资料涉及的投资评级、目标价格等投资观点，均基于特定的假设、特定的评级体系、相对的市场基准指数得出的中长期价值判断，并非对证券或金融工具的具体买卖时点、买卖价格等的操作建议。订阅者若使用本公众号所载资料，可能会因缺乏对完整报告的了解或缺乏相关的解读而对资料中的关键假设、评级、目标价等内容产生理解上的歧义而导致投资损失。订阅者如使用本公众号推送资料，请事先寻求专业投资顾问的指导及后续的解读服务。本公众号所载的资料、工具、意见、信息及推测仅提供给投资咨询机构客户作参考之用，不构成任何投资、法律、会计或税务的最终操作建议，本平台不就本公众号推送的内容对最终操作建议做出任何担保。任何订阅人不应凭借本公众号推送信息进行具体操作，应自主作出投资决策并自行承担所有投资风险。在任何情况下，本平台不对任何人因使用本公众号推送信息所引起的任何损失承担任何责任。
                            本公众号版权归受委托投资咨询机构所有，任何人或机构不得以任何方式修改、转载或者复制本公众号推送信息。如因违法、侵权使用给本平台造成任何直接或间接的损失，平台保留追求一切法律责任的权利。
                        </P>
                        <p style="margin-top: .1rem;"></p>
                        <p>（本平台信息内容根据市场公开信息，结合行业热点、股市题材及技术分析等得出的分析结论，仅供参考，据此操作风险自担）</p>
                        <p>以上内容来源于可来股票APP-阿尔维蒂</p>
                    </div>
                </div>
                <!-- <div class="bottom_tell_div">
          <p style="text-align: center;font-weight: bold;margin-bottom: .1rem;">联系客服</p>
          <div>
            <p><a class="" href="tel: 185-5198-9799">185-5198-9799</a></p>
            <p><a class="" href="tel: 186-1122-2771" style="letter-spacing:.4px;">186-1122-2771</a></p>
          </div>
          <div>
            <p><a class="" href="tel: 010-5651-9799">010-5651-9799</a></p>
            <p><a class="" href="tel: 400-6088- 879">400-6088-879</a></p>
          </div>
        </div> -->
                <input type="button" @click="alertMenu" class="tellkefuDetail" value="联系客服：4006088879">
                <!-- 点击联系方式显示出的盒子 -->
                <div id="action_sheet" v-if="tellshow">
                    <div class="van-overlay" style="z-index: 2;" @click="toCancel"></div>
                    <div class="bottom_tell van-popup van-popup--round van-popup--bottom van-popup--safe-area-inset-bottom van-action-sheet" style="z-index: 2;">
                        <div class="van-action-sheet__content" round>
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

                            <div class="bottom_div_opac">
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
            </div>

        </div>
        <!-- 解锁提示框 -->
        <!-- <div class="UnlockingTishiBox" @click="getUnlockingTishiBox()">
			<div><img src="http://only.1yuaninfo.com/public/static/index/allpublic/img/nextBtnImg.png"></div>
		</div> -->


        <!-- 查看次数记录 -->
        <div class="num_zong_div" @click="getNumfunction()">
            <div class="numsee_div">
                <div class="num_zong_title" id="num_zong_title" :style="detailsinfo.see_count > 6?'margin-top: -2rem;':''">
                    <img :src=num_bg_img class="num_bg_img">
                    <!-- <img v-if="detailsinfo.see_count < 6" src="/public/static/index/zhuce/fuli/num_tishi_img_01.png" class="num_bg_img">
          <img v-else="detailsinfo.see_count > 6" :src="/public/static/index/zhuce/fuli/num_tishi_img_02.png" class="num_bg_img"> -->
                    <div v-if="detailsinfo.see_count < 6" class="num-content">
                        <!-- 本平台不分成、不代客理财，不以任何形式承诺收益，风险自担，谨慎投资。 -->
                    </div>
                    <div v-if="detailsinfo.see_count >= 6" style='position: absolute;left:-.1rem;top: -.9rem;font-size: .44rem;' class="num-content">
                        <p>您第<b>{{detailsinfo.see_count}}</b>次体验</p>
                    </div>
                </div>
                <h1 class="close_btn_num"><img src="/public/static/index/zhibo/close_btn.png"></h1>
            </div>
            <div class="num_zong_bg">
                <div style="width: 100%;"></div>
            </div>
        </div>
        <!-- 查看次数记录 -->
        <!-- <div class="num_zong_div" @click="getNumfunction()">
			<div class="numsee_div">
				<p class="num_zong_title">这是您第 <b>{{detailsinfo.see_count}}</b>次体验</p>
				<h1 class="close_btn_num"><img src="/public/static/index/zhibo/close_btn.png"></h1>
			</div>
			<div class="num_zong_bg">
				<div style="width: 100%;"></div>
			</div>
		</div> -->
        <!-- 点击图片放大 -->
        <div id="isShow" class="img-bg" @click="imgBgHidechild()">
            <img id="amplification" src="" alt="">
        </div>
        <!-- 体验结束 -->
        <div class="experi_end">
            <div class="experi_content">
                <h1 class="experi_h1">体验结束！</h1>
                <p class="experi_title">很抱歉！您的体验次数已结束，我们的服务是盘中实时推送，不是马后炮，先体验，满意后再合作是我们的服务宗旨，您还需要继续体验吗？</p>
                <input type="button" name="" value="需要" class="experi_need" @click="getneedFun()">
                <span class="close_experi"><img
                        src="http://only.1yuaninfo.com/public/static/index/allpublic/img/guanbi.png"
                        @click="content_close()"></span>
            </div>
        </div>
        <!-- 尚未注册 -->
        <div class="experi_regi">
            <div class="experi_content">
                <h1 class="experi_h1">尚未注册！</h1>
                <p class="experi_title">很抱歉！您的体验次数已结束，我们的服务是盘中实时推送，不是马后炮，先体验，满意后再合作是我们的服务宗旨，您还需要继续体验吗？</p>
                <input type="button" name="" value="注册查看全文" class="experi_regigo">
                <span class="close_regi"><img
                        src="http://only.1yuaninfo.com/public/static/index/allpublic/img/guanbi.png"
                        @click="content_close()"></span>
            </div>
        </div>
        <!-- 右上角活动按钮 -->
        <!-- 新新人福利 -->
        <div v-if="PublicActivity == false">
            <h1 id="ballId" class="activityLeft" v-show="detailsinfo.is_order == 2">
                <!-- 新人福利 -->
                <img src="http://only.1yuaninfo.com/public/static/index/allpublic/img/newfuli/xinrenfuli.gif" v-show="flag" @click="getAcivityClickFun()">
                <!-- 11.25感恩活动 -->
                <!-- <img src="http://only.1yuaninfo.com/public/static/index/img/ganEnGu/gifBtn.gif" v-show="flag" @click="getAcivityClickFun()"> -->
            </h1>
        </div>
        <!-- 右下角按钮 -->
        <div class="side_btn" style="z-index: 0;">
            <a href="https://wx.vzan.com/plug-ins/?v=637623736290374985#/FixupIndex/202373787?shareuid=0">
                <h1 class="zhi_btn">
                    <img src="http://zztong.admin.gszx77.com/public/static/index/allpublic/img/zhibo/zhibo_icon.png">
                    <span>直播</span>
                </h1>
            </a>
            <h1 class="num_btn" @click="getJiluFun()">
                <img src="http://zztong.admin.gszx77.com/public/static/index/allpublic/img/zhibo/jilu_icon.png">
                <span>记录</span>
            </h1>
        </div>
        <!-- 双十一立即购买按钮-->
        <!-- <div class="PublicActivityDB">
            <h1 id="ballId1" class="activityLeft1">
                <img src="http://zztong.1yuaninfo.com/Underthegeneral/img/activity/double11/double11_icon_05.gif" @click='getPublicClickFunDB'>
            </h1>
        </div> -->
        <!-- 双十一弹窗移出 -->
        <!-- <div class="outter" @touchmove.prevent @click.stop='haibaohideThen()'>
            <img src="http://only.1yuaninfo.com/public/static/index/allpublic/img/newfuli/xinren_showtoach.jpg" @click.stop='getAcivityClickFun()'>
        </div> -->
    </div>
    <script>
        new Vue({
            el: "#Vue",
            data: {
                openid: $(".openid").val(), //声明openid
                miopenid: "",
                url: encodeURI(window.location.href), //获取整个url
                code: '',
                appID: '',
                temp2: '',
                name: $(".name").val(),
                news_id: $(".news_id").val(),
                detailsinfo: {}, // 存储与用户互动的信息
                order_state: '', //有无订单
                mobilePhone: '', //用户加密手机号
                loading: true, // 加载图片的蒙层
                pramrs: {}, // 没用
                imgUrls: [], // 内容图片
                srcListArr: [], // 内容图片路径过滤
                experienEnd: false, //解锁
                UnlockingShowTwoBtn: false, // 没用
                duanwuActivity: false, // 没用
                PublicActivity: false, // 6.18的div
                tellshow: false, // 点击联系方式显示的盒子控制的标志位
                flag: true, // 控制新人福利的标志位
                num_bg_img: '', // 根据用户查看股票模板次数动态显示图片的标志位
                user_id: '', //用户id
                regShow: false
            },
            methods: {
                getPublicClickFunDB() {
                    window.location.href =
                        "http://zztong.1yuaninfo.com/Underthegeneral/pages/activity/doubleElevenYJ/doubleEleven/steady.html?name=experience&backUrl=ActivityIndex"

                },
                dragEleven() { // 悬浮按钮可滑动
                    var block = document.getElementById("ballId1");
                    var oW, oH;
                    // 绑定touchstart事件
                    block.addEventListener("touchstart", function(e) {
                        var touches = e.touches[0];
                        oW = touches.clientX - block.offsetLeft;
                        oH = touches.clientY - block.offsetTop;
                    }, false);
                    block.addEventListener("touchmove", function(e) {
                        e.preventDefault();
                        var touches = e.touches[0];
                        var oLeft = touches.clientX - oW;
                        var oTop = touches.clientY - oH;
                        if (oLeft < 0) {
                            oLeft = 0;
                        } else if (oLeft > document.documentElement.clientWidth - block.offsetWidth) {
                            oLeft = (document.documentElement.clientWidth - block.offsetWidth);
                        } else if (oTop < 0) {
                            oTop = 0;
                        } else if (oTop > document.documentElement.clientHeight - block.offsetHeight) {
                            oTop = document.documentElement.clientHeight - block.offsetHeight;
                        }
                        block.style.left = oLeft + "px";
                        block.style.top = oTop + "px";
                        // //console.log(block.style.left)
                    }, false);
                    block.addEventListener("touchend", function(e) {
                        // var endLeft = e.changedTouches[0].pageX;
                        // if (endLeft > document.documentElement.clientWidth / 2) {
                        //     block.style.left = (document.documentElement.clientWidth - block.offsetWidth - 5) + 'px';
                        // } else if (endLeft < document.documentElement.clientWidth / 2) {
                        //     block.style.left = 5 + 'px';
                        // }
                    }, false);
                },

                haibaohideThen() {
                    $(".outter img").css({
                        'transform': 'scale(0)',
                        'transform-origin': '140% 10%'
                    })
                    setTimeout(function() {
                        $(".outter").css({
                            'display': 'none'
                        })
                    }, 500);
                },
                haibaohide() {
                    var _this = this
                    setTimeout(function() {
                        _this.haibaohideThen()
                    }, 2000);
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
                getUrl() {
                    let redirectUri = encodeURIComponent(window.location.href);
                    let strUrl = "https://open.weixin.qq.com/connect/oauth2/authorize?appid=" + this.appID +
                        "&redirect_uri=" + redirectUri +
                        "&name=only&response_type=code&scope=snsapi_base&state=STATE&connect_redirect=1#wechat_redirect";
                    return strUrl;
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
                imageChange(e) {
                    // //console.log(e.target);
                    if (e.target.src) {
                        wx.previewImage({
                            current: e.target,
                            urls: this.srcListArr
                        })
                    }
                },
                getDuanwuFun() {
                    var myDate = new Date();
                    var nowTime = myDate.toLocaleString(); //当下时间
                    var start_time = (new Date(myDate)).valueOf(); //获取日期与时间
                    //console.log(start_time)
                    if (start_time < 1624032000000) {
                        // 618节日
                        //console.log("大于618小于619");
                        // this.PublicActivity = true;
                    } else if (start_time < 1638288000000) {
                        // 双十一 12.01.00
                        $(".PublicActivityDB").show();

                    } else {
                        $(".PublicActivityDB").hide();
                    }

                },
                getDPublicClickFun() {
                    window.location.href =
                        "http://zztong.1yuaninfo.com/Underthegeneral/pages/activity/FirstScreen.html?name=" +
                        this.name
                },
                //解锁
                getUnlockingTishiBox() {
                    $(".UnlockingTishiBox").hide()
                },

                getUnlockingBtn(e) {
                    event.preventDefault();
                    this.UnlockingShowTwoBtn = true;
                    $(".UnlockingBtnImg").attr('src',
                        'http://only.1yuaninfo.com/public/static/index/allpublic/img/detail_select_up.png')

                },
                getUnlockingUp(e) {
                    //console.log(111111)
                    // event.preventDefault();
                    this.UnlockingShowTwoBtn = false;
                    $(".UnlockingBtnImg").attr('src',
                        'http://only.1yuaninfo.com/public/static/index/allpublic/img/detail_select_down.png'
                    )

                },
                getseeThisTime() {
                    this.code = this.urlResolve().code;
                    //console.log(this.code)
                    if (this.code == undefined || this.code == '') {
                        window.location = this.getUrl();
                    }
                    // //console.log(this.openid)
                    // 解锁当前
                    window.location.href =
                        "https://open.weixin.qq.com/connect/oauth2/authorize?appid=wx1dbbfa999a26cd49&redirect_uri=http%3A%2F%2Fzztong.1yuaninfo.com%2Findex%2Forder%2Fnewspay%3Fname%3Dexperience%26openid=" +
                        this.openid + "%26product_id=" + 6 + "%26news_id=" + this.news_id +
                        "&response_type=code&scope=snsapi_base&state=STATE&connect_redirect=1#wechat_redirect"
                },
                getseeNextTime() {
                    // 申请下一期
                    // //console.log(this.detailsinfo)
                    if (this.detailsinfo.error_code == 8014) {
                        layer.msg("已为您提交下一次体验股申请!")
                    } else {
                        window.location.href =
                            "http://zztong.1yuaninfo.com/Underthegeneral/pages/details/apply_know.html?name=experience&news_id=" +
                            this.news_id + "&openid=" + this.miopenid
                    }
                },
                getNumfunction() {
                    $(".num_zong_div").hide();
                    // $(".details_of_position").css("filter", 'blur(0px)')
                },
                alertMenu() {
                    this.tellshow = true;
                },
                toCancel() {
                    this.tellshow = false;
                    // //console.log('点击了取消');
                },
                // 注册
                regFn() {
                    window.location.href =
                        'https://open.weixin.qq.com/connect/oauth2/authorize?appid=wxc013297214b78bc8&redirect_uri=http%3A%2F%2Fonly.1yuaninfo.com%2Findex%2Fregister%2Findex.html&response_type=code&scope=snsapi_base&state=123#wechat_redirect'
                },
                getinformationFun() {
                    var _this = this
                    $.ajax({
                        url: "http://only.1yuaninfo.com/index/news/detail",
                        method: "get",
                        async: true,
                        data: {
                            name: this.name,
                            openid: this.openid,
                            news_id: this.news_id,
                            user_id: this.user_id,
                        },
                        success: (data) => {
                            this.user_id = data.user_id;
                            console.log(data);
                            this.loading = false
                            if (data.msg == "40163" || data.msg == "40029") {
                                window.location = this.getUrl();
                                return false;
                            } else {
                                // is_shares =1 是股票
                                if (data.is_shares == 1) {
                                    $(".mt_id_img").html(
                                            '<img src="http://only.1yuaninfo.com/public/static/index/allpublic/img/9dian25.jpg" width="100%" >'
                                        )
                                        // 游客未注册  去注册 
                                    if (data.error_code == 2001) {
                                        _this.regShow = true
                                    } else {
                                        _this.regShow = false
                                    }
                                }

                                if (data.error_code == 8014) {
                                    // 24消失内 点击了需要
                                    // alertMsg('您的申请已提交，请等待客服联系开通服务！');
                                    // return false
                                    // 即使申请了也照样显示解锁
                                    this.miopenid = data.data.openid;
                                    console.log(data.data.openid)
                                    this.detailsinfo = data.data;
                                    this.experienEnd = true;
                                } else if (data.error_code == 8002 && this.name == 'experience') {
                                    alertMsg('股市收盘喽，建议您在盘中查看，更能体现信息的价值！');
                                    return false;
                                } else if (data.error_code == 8005) {

                                    // 体验结束 可解锁可申请
                                    this.miopenid = data.openid;
                                    this.detailsinfo = data;
                                    this.experienEnd = true;
                                    this.loading = false
                                        // // 提醒需要
                                        // window.location.href = "http://zztong.1yuaninfo.com/Underthegeneral/pages/details/is_apply.html?name=" + this.name + '&news_id=' + this.news_id + '&openid=' + data.openid
                                        // return false
                                } else {
                                    if (data.is_shares == 1) {
                                        if (data.is_order == 1) {
                                            //console.log('--------')
                                            // $(".UnlockingTishiBox").show()
                                            // var newsTime = new Date(data.add_time)
                                            // var LSTR_Date =  newsTime.valueOf();////消息时间
                                            // //console.log(LSTR_Date)
                                            // var  myNowDate= new Date().getTime()  //获取日期与时间
                                            // // //console.log(myNowDate) // 当前时间
                                            // if((parseInt(myNowDate)-parseInt(LSTR_Date)) > 86400000){
                                            //   $(".UnlockingTishiBox").hide()
                                            //   // alert( "大于24小时！ ");
                                            // }else{
                                            //   // alert( "小于24小时！ ");
                                            //   // //console.log(new Date().getHours())
                                            //   if(new Date().getHours()>=9 && new Date().getHours() <16){
                                            //     $(".UnlockingTishiBox").show()
                                            //   }else{
                                            //     $(".UnlockingTishiBox").hide();
                                            //   }
                                            // }
                                        } else {
                                            // 我改了！
                                            if (data.see_count) {
                                                console.log(data.see_count)
                                                $(".num_zong_div").show();
                                            }
                                        }
                                    }
                                    //                    this.openid = data.openid;
                                    //                    //console.log(this.openid);
                                    this.detailsinfo = data;
                                    console.log('981', this.detailsinfo.new_content)
                                    this.imgUrls = this.detailsinfo.new_content.match(
                                        /<img [^>]*src=['"]([^'"]+)[^>]*>/gi);
                                    console.log('这个方法打印为null', this.imgUrls)
                                    if (!!this.imgUrls && this.imgUrls.length > 0) {
                                        console.log('没有进入该判断')
                                        for (let index = 0; index < this.imgUrls.length; index++) {
                                            this.imgUrls[index].replace(
                                                /<img [^>]*src=['"]([^'"]+)[^>]*>/gi, (match,
                                                    capture) => {
                                                    this.srcListArr.push(capture);
                                                })
                                        }
                                    }
                                    // this.v-if="detailsinfo.see_count < 6"
                                    if (this.detailsinfo.see_count <= 1) {
                                        console.log(1)
                                            // 五次之内
                                        this.num_bg_img =
                                            'http://only.1yuaninfo.com/public/static/index/allpublic/img/activity/num_tishi_img_new_01.png'
                                    } else if (this.detailsinfo.see_count == 2) {
                                        console.log(2)

                                        this.num_bg_img =
                                            'http://only.1yuaninfo.com/public/static/index/allpublic/img/activity/num_tishi_img_new_01.png'
                                    } else if (this.detailsinfo.see_count == 3) {
                                        console.log(3)

                                        this.num_bg_img =
                                            'http://only.1yuaninfo.com/public/static/index/allpublic/img/activity/num_tishi_img_new_01.png'
                                    } else if (this.detailsinfo.see_count == 4) {
                                        console.log(4)

                                        this.num_bg_img =
                                            'http://only.1yuaninfo.com/public/static/index/allpublic/img/activity/num_tishi_img_new_01.png'
                                    } else if (this.detailsinfo.see_count == 5) {
                                        console.log(5)

                                        this.num_bg_img =
                                            'http://only.1yuaninfo.com/public/static/index/allpublic/img/activity/num_tishi_img_new_01.png'
                                    } else {
                                        if (data.error_code == 8002 || data.error_code == 8003) {
                                            //8002超时查看 8003失效
                                            $(".num-content").html(
                                                '<p style="color:#132571;top:.7rem">您第<b style="color:#132571">' +
                                                this.detailsinfo.see_count + '</b>次体验</p>');
                                            // $(".num_bg_img").html('<img src="http://zztong.admin.gszx77.com/public/static/index/zhuce/fuli/num_tishi_img_03.png" width="100%" >')
                                            this.num_bg_img =
                                                'http://only.1yuaninfo.com/public/static/index/allpublic/img/activity/num_tishi_img_new_03.png'
                                            return false
                                        } else {
                                            console.log('进入六次或六次以上了')
                                            // 六次或六次以上时
                                            this.num_bg_img =
                                                'http://only.1yuaninfo.com/public/static/index/allpublic/img/activity/num_tishi_img_new_02.jpg'
                                        }
                                    }
                                }
                            }
                        },
                        error: (error) => {
                            //console.log('===========');
                            //console.log(error);
                            this.loading = false
                            if (error.responseJSON.error_code == 2002) {
                                alert("暂未查询到用户信息，请重新关注")
                                setTimeout((function() {
                                    WeixinJSBridge.call('closeWindow');
                                }), 500);
                            }
                            if (this.name == "experience") {
                                if (error.responseJSON.error_code == 8001) {
                                    alertMsg('非签约用户不能查看！');
                                    return false;
                                } else if (error.responseJSON.error_code == 8002) {
                                    alertMsg('股市收盘喽，建议您在盘中查看，更能体现信息的价值！');
                                    return false;
                                } else if (error.responseJSON.error_code == 8003) {
                                    alertMsg('已过查看时间，本信息已失效。');
                                    return false;
                                } else if (error.responseJSON.error_code == 8004) {
                                    alertMsg('您的订单余额不足！');
                                    return false;
                                } else if (error.responseJSON.error_code == 8008) {
                                    alertMsg('信息不存在！');
                                    return false;
                                } else if (error.responseJSON.error_code == 8009) {
                                    alertMsg('剩余次数不足，请联系您的服务人员！');
                                    return false;
                                } else if (error.responseJSON.error_code == 8014) {
                                    alertMsg('您的申请已提交，请等待客服联系开通服务！');
                                    return false;
                                }
                            } else {
                                // 非签约不能看 持股达到上限不能看
                                if (error.responseJSON.error_code == 8001) {
                                    alertMsg('非签约用户暂无查看权限,请联系服务人员！');
                                    return false;
                                } else if (error.responseJSON.error_code == 8002) {
                                    alertMsg('股市收盘喽，建议您在盘中查看，更能体现信息的价值！');
                                    return false;
                                } else if (error.responseJSON.error_code == 8003) {
                                    alertMsg('已过查看时间，本信息已失效。');
                                    return false;
                                } else if (error.responseJSON.error_code == 8004) {
                                    alertMsg('您的订单余额不足！');
                                    return false;
                                } else if (error.responseJSON.error_code == 8008) {
                                    alertMsg('信息不存在！');
                                    return false;
                                } else if (error.responseJSON.error_code == 8009) {
                                    alertMsg('剩余次数不足，请联系您的服务人员！');
                                    return false;
                                }
                            }

                        }
                    })
                },

                getAcivityFun() {
                    this.flag = !this.flag;
                },
                //新人福利
                getAcivityClickFun() {
                    // 新人福利页面
                    window.location =
                        "http://zztong.1yuaninfo.com/Underthegeneral/pages/activity/othernewfuli.html?name=experience"
                        // 11.25感恩活动页
                        // window.location = "http://only.1yuaninfo.com/index/activity/think_index.html"
                },
                getneedFun() {
                    $(".experi_end").hide();
                    $.ajax({
                        url: "http://zztong.1yuaninfo.com/index/information/need",
                        type: "post",
                        async: true,
                        data: {
                            news_id: this.news_id,
                            openid: this.openid
                        },
                        success: function(data) {
                            //console.log(data);
                            $(".boot_box_sure").show(); //成功
                        },
                        error: function(error) {
                            //console.log(error)
                        }
                    });
                },
                content_close() {
                    $(".experi_end").hide();
                },
                getZhiboFun() {
                    var click_type = '1'; //视频
                    $.ajax({
                        url: 'http://tin.1yuaninfo.com/index/news/click', //地址
                        dataType: 'json', //数据类型
                        type: 'POST', //类型
                        async: true,
                        timeout: 2000, //超时
                        data: {
                            news_id,
                            news_type,
                            news_type,
                            click_type,
                            user_id
                        },
                        //请求成功
                        success: function(data) {
                            //console.log(data);
                            //console.log(live_url)
                            if (live_url == '' || live_url == undefined) {
                                // 直播
                                // layer.open({
                                //   content: '直播功能暂未开启'
                                //   ,skin: 'msg'
                                //   ,time: 2 //2秒后自动关闭
                                // });
                                window.location.href =
                                    'https://wx.vzan.com/live/livedetail-2042461238?v=1592384904000';
                            } else {
                                window.location.href = live_url;
                            }
                        },
                        //失败/超时
                        error: function(error) {
                            //console.log(error);
                        }
                    })
                },

                // 记录
                getJiluFun() {
                    window.location.href = 'http://only.1yuaninfo.com/index/service/order.html?openid=' + this
                        .openid + '&user_id=' + this.user_id;
                },
                imgBgHidechild() {
                    $("#isShow").hide();
                },
                wxshare() {
                    let lineLink = location.href; //url不能写死
                    //console.log(lineLink)
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
                            // //console.log(res)
                            let shareData = res.data
                            var imgUrl =
                                'http://zztong.1yuaninfo.com/Underthegeneral/img/share_img.png'; // 分享后展示的一张图片
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
                            //console.log(error.response)
                        });
                },
                drag() { // 悬浮按钮可滑动
                    var block = document.getElementById("ballId");
                    var oW, oH;
                    // 绑定touchstart事件
                    block.addEventListener("touchstart", function(e) {
                        var touches = e.touches[0];
                        oW = touches.clientX - block.offsetLeft;
                        oH = touches.clientY - block.offsetTop;
                    }, false);
                    block.addEventListener("touchmove", function(e) {
                        e.preventDefault();
                        var touches = e.touches[0];
                        var oLeft = touches.clientX - oW;
                        var oTop = touches.clientY - oH;
                        if (oLeft < 0) {
                            oLeft = 0;
                        } else if (oLeft > document.documentElement.clientWidth - block.offsetWidth) {
                            oLeft = (document.documentElement.clientWidth - block.offsetWidth);
                        } else if (oTop < 0) {
                            oTop = 0;
                        } else if (oTop > document.documentElement.clientHeight - block.offsetHeight) {
                            oTop = document.documentElement.clientHeight - block.offsetHeight;
                        }
                        block.style.left = oLeft + "px";
                        block.style.top = oTop + "px";
                        // //console.log(block.style.left)
                    }, false);
                    block.addEventListener("touchend", function(e) {
                        var endLeft = e.changedTouches[0].pageX;
                        if (endLeft > document.documentElement.clientWidth / 2) {
                            block.style.left = (document.documentElement.clientWidth - block
                                .offsetWidth - 5) + 'px';
                        } else if (endLeft < document.documentElement.clientWidth / 2) {
                            block.style.left = 5 + 'px';
                        }
                    }, false);
                }
            },
            mounted() {
                this.getinformationFun();
                this.getDuanwuFun();
                this.drag(); // 悬浮按钮可滑动
                this.haibaohide();

            },
            created() {
                //console.log(this.url)
                this.name = this.GetRequest().name;
                this.news_id = this.GetRequest().id;
                this.openid = this.GetRequest().openid;
                if (this.name == "experience") {
                    this.appID = "wx1dbbfa999a26cd49"; // 体验平台
                    //console.log("体验平台")
                } else if (this.name == "formal") {
                    this.appID = "wx9115203d6f1df477"; //formal
                    //console.log("稳健型")
                }
            }
        })
    </script>
</body>

</html>