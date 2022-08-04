<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:77:"/home/wwwroot/only.1yuaninfo.com/./application/index/view/register/index.html";i:1637633412;}*/ ?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <title>注册</title>
    <link href="http://only.1yuaninfo.com/public/static/index/allpublic/css/zhuce/register.css" type="text/css" rel="stylesheet">
    <script type="text/javascript" src="http://only.1yuaninfo.com/public/static/index/allpublic/js/jquery-3.5.1.min.js"></script>
    <!-- 引入 Vue 和 axiox 的 JS 文件 -->
    <script type="text/javascript" src="http://only.1yuaninfo.com/public/static/index/allpublic/js/vue.js"></script>
    <script type="text/javascript" src="http://only.1yuaninfo.com/public/static/index/allpublic/js/axios.min.js"></script>
    <style type="text/css">
        html,
        body {
            background: #fff;
        }

        input {
            border: none;
            outline: none;
        }
    </style>

</head>

<body>
    <div id="Vue">
        <div class="register">
            <img class="topIcon" src="http://only.1yuaninfo.com/public/static/index/allpublic/img/login/icon.png" alt="">
            <div class="register_area">
                <img src="http://only.1yuaninfo.com/public/static/index/allpublic/img/login/name.png" width="7%" class="re_img" />
                <input type="text" placeholder="请输入姓名" name='user_name' id='user_name' />
            </div>
            <div class="register_area">
                <img src="http://only.1yuaninfo.com/public/static/index/allpublic/img/login/phone.png" width="7%" class="re_img" />
                <input type="text" placeholder="请输入手机号" name='user_tel' id='user_tel' />
            </div>
            <div class="register_area">
                <img src="http://only.1yuaninfo.com/public/static/index/allpublic/img/login/code.png" width="7%" class="re_img" />
                <input type="text" placeholder="请输入验证码" class="special re_input" name="yanzhengma" id="yzm" />
                <button class="re_code" id="btnSendCode" @click="getsendMessageFun()">发送验证码</button>
            </div>
            <button type="submit" class="next2" @click="getRegisterFun()">立即注册</button>
        </div>
        <input type="hidden" value="<?php echo $openid; ?>" id="openid"/>
    </div>
    </div>
</body>
<script type="text/javascript">
    new Vue({
        el: "#Vue",
        data: {
            openid: $("#openid").val(), //声明openid
            url: encodeURI(window.location.href), //获取整个url
            appID: '',
            user_tel: '',
            user_name:'',
            backUrl:'',//上一步过来的链接
            oldcode:false,
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
            getsendMessageFun() {
                this.user_name = $("#user_name").val()//用户姓名
                this.user_tel = $("#user_tel").val(); //用户手机号
                if (this.user_name == "" || this.user_name == null) {
                    this.alertMsg("姓名为空！");
                    return false;
                }else if (this.user_tel == "" || this.user_tel == null) {
                    this.alertMsg("手机号为空！");
                    return false;
                } else if (!(/^1[3456789]\d{9}$/.test(this.user_tel))) {
                    this.alertMsg("手机号格式不对！");
                    return false;
                } else {
                    var odiv = document.getElementById("btnSendCode");
                    $.ajax({
                        url: "http://only.1yuaninfo.com/index/register/send",
                        method: "post",
                        data: {
                            user_tel: this.user_tel,
                        },
                        success: (data) => {
                            console.log(data)
                            if(data.code == 0){
                                this.alertMsg('已发送')
                                // this.alertMsg(data.msg.msg)
                            } else if(data.error_code == 1000){
                                this.alertMsg(data.msg)
                                return false
                            }
                            let count = 60;
                            odiv.innerHTML = count + '秒内输入';
                            timer = setInterval(function () {
                                if (count > 0) {
                                    count = count - 1;
                                    $("#btnSendCode").prop('disabled', true);
                                    odiv.innerHTML = count + '秒内输入';
                                } else {
                                    clearInterval(timer);
                                    $("#btnSendCode").prop('disabled', false);
                                    odiv.innerHTML = '获取验证码';
                                }
                            }, 1000);
                        },
                        error: (error) => {
                            console.log(error);
                            if (error.responseJSON.error_code == 6002) {
                                this.alertMsg(error.responseJSON.msg);
                                return false;
                            }

                        }
                    })
                }
            },
            alertMsg(txt) {
                var alertFram = document.createElement("DIV");
                alertFram.id = "alertFram";
                alertFram.style.position = "fixed";
                alertFram.style.width = "100%";
                alertFram.style.textAlign = "center";
                alertFram.style.top = "50%";
                alertFram.style.zIndex = "10001";
                strHtml =
                    " <span style=\"font-family: 微软雅黑;display:inline-block;background:rgba(0,0,0,0.8);color:#fff;padding:10px 20px;width: auto%;line-height:36px;border-radius:6px; \">" +
                    txt + "</span>";
                alertFram.innerHTML = strHtml;
                document.body.appendChild(alertFram);
                setTimeout((function () {
                    alertFram.style.display = "none";
                }), 2000);
            },
            getRegisterFun() {
                var odiv = document.getElementById("btnSendCode");
                this.user_name = $("#user_name").val()//用户姓名
                this.user_tel = $("#user_tel").val(); //用户手机号
                var re_input = $(".re_input").val();
                if (this.user_tel == "" || this.user_tel == null) {
                    this.alertMsg("手机号为空！");
                    return false;
                } else if (re_input == "" || re_input == null) {
                    this.alertMsg("验证码为空！");
                    return false;
                } else {
                    $.ajax({
                        url: "http://only.1yuaninfo.com/index/register/add",
                        method: "post",
                        data: {
                            user_tel: this.user_tel,
                            codes: re_input,
                            user_name:this.user_name,
                            openid:this.openid,
                        },
                        success: (data) => {
                            console.log(data)
                            if (data.msg == "40163") {
                              window.location = this.getUrl();
                            }else if (data.msg == "40029") {
                              window.location = this.getUrl();
                            }else if(data.error_code == 0){

                              this.alertMsg("注册成功！");
                              odiv.innerHTML = '获取验证码';
                              if(this.backUrl == 'productIndex'){
                                // 返回产品页
                                window.location.href="javascript:history.go(-2)";
                              }else if(this.backUrl == 'personalIndex'){
                                // 《平台声明》
//                                  window.location = "https://open.weixin.qq.com/connect/oauth2/authorize?appid=wxc013297214b78bc8&redirect_uri=http%3A%2F%2Fonly.1yuaninfo.com%2Findex%2Fregister%2Fstate.html&name=only&response_type=code&scope=snsapi_base&state=123#wechat_redirect";
                                  window.location = "https://open.weixin.qq.com/connect/oauth2/authorize?appid=wxc013297214b78bc8&redirect_uri=http%3A%2F%2Fonly.1yuaninfo.com%2Findex%2Fpersonal%2Findex.html&name=only&response_type=code&scope=snsapi_base&state=123#wechat_redirect";

                              }else{
                                // 《平台声明》
//                                  window.location = "https://open.weixin.qq.com/connect/oauth2/authorize?appid=wxc013297214b78bc8&redirect_uri=http%3A%2F%2Fonly.1yuaninfo.com%2Findex%2Fregister%2Fstate.html&name=only&response_type=code&scope=snsapi_base&state=123#wechat_redirect";
                                  window.location = "https://open.weixin.qq.com/connect/oauth2/authorize?appid=wxc013297214b78bc8&redirect_uri=http%3A%2F%2Fonly.1yuaninfo.com%2Findex%2Fpersonal%2Findex.html&name=only&response_type=code&scope=snsapi_base&state=123#wechat_redirect";


                              }
                            }else{
                              this.alertMsg("注册失败，请稍后重试！")
                            }
                            
                            // window.location.href="javascript:history.go(-2)";
                              
                        },
                        error: (error) => {
                            console.log(error);
                            if (error.responseJSON.error_code == 6001) {
                                this.alertMsg("验证码错误！");
                                return false;
                            }
                        }
                    })
                }
            },

        },
        mounted() {

        },
        created() {
        },

    })
</script>

</html>