<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:84:"/home/wwwroot/only.1yuaninfo.com/./application/index/view/news/video_1yuaninfoo.html";i:1637655005;}*/ ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,	minimum-scale=1.0,maximum-scale=1.0,user-scalable=no">
    <script type="text/javascript" src="http://only.1yuaninfo.com/public/static/index/allpublic/js/rem.js"></script>
    <script type="text/javascript" src="http://only.1yuaninfo.com/public/static/index/allpublic/js/jquery-3.5.1.min.js"></script>
    <script type="text/javascript" src="http://only.1yuaninfo.com/public/static/index/allpublic/js/vue.js"></script>
    <script type="text/javascript" src="http://only.1yuaninfo.com/public/static/index/allpublic/js/axios.min.js"></script>
    <title></title>
    <style>
        * {
            margin: 0;
            padding: 0;
        }
        
        body {
            background-color: #f3f8fc;
        }
        
        .video_class {
            width: 7.5rem;
            height: 4.22rem;
            position: relative;
        }
        
        .video_class_ {
            width: 7.5rem;
            height: 4.22rem;
            background-color: black;
            position: fixed;
            left: 0;
            top: 0;
            z-index: 999;
        }
        
        .size_box {
            width: 7.5rem;
            height: 0.31rem;
            position: relative;
        }
        
        .title_view {
            width: 7.5rem;
            position: fixed;
            left: 0;
            top: 4.22rem;
            z-index: 999;
            display: flex;
            flex-direction: column;
            background-color: #FFFFFF;
        }
        
        .title_content {
            width: 100%;
        }
        
        .title_content p {
            color: #222222;
            font-size: .325rem;
            padding: .395rem .315rem 0 .325rem;
            font-weight: 700;
            -moz-user-select: none;
            -webkit-user-select: none;
            -ms-user-select: none;
            -khtml-user-select: none;
            user-select: none;
        }
        
        .title_day {
            width: 100%;
            padding-bottom: .375rem;
            position: relative;
            -moz-user-select: none;
            -webkit-user-select: none;
            -ms-user-select: none;
            -khtml-user-select: none;
            user-select: none;
        }
        
        .title_day p {
            color: #999999;
            font-size: .25rem;
            margin: 0 .315rem 0 .315rem;
            padding: .23rem 0 .375rem 0;
            border-bottom: .01rem solid #eeeeee;
            -moz-user-select: none;
            -webkit-user-select: none;
            -ms-user-select: none;
            -khtml-user-select: none;
            user-select: none;
        }
        
        .title_day span {
            letter-spacing: .025rem;
        }
        
        .title_value {
            width: 100%;
            position: relative;
        }
        
        .title_value p {
            color: #999999;
            font-size: .03rem;
            padding: .32rem .315rem 0 .315rem;
            -moz-user-select: none;
            -webkit-user-select: none;
            -ms-user-select: none;
            -khtml-user-select: none;
            user-select: none;
        }
        
        .content_ {
            width: 7.5rem;
            position: relative;
            padding-bottom: .3rem;
            padding-top: .3rem;
            border-top: .05rem solid #f3f8fc;
            display: flex;
            flex-direction: column;
            background-color: #FFFFFF;
        }
        
        .content_title {
            width: 100%;
            height: .325rem;
            display: flex;
            flex-direction: row;
            justify-content: left;
        }
        
        .content_title_red {
            height: 100%;
            width: .06rem;
            margin-left: .3rem;
            display: flex;
            flex-direction: column;
            justify-content: center;
            -moz-user-select: none;
            -webkit-user-select: none;
            -ms-user-select: none;
            -khtml-user-select: none;
            user-select: none;
        }
        
        .content_title_red_ {
            background-color: #fa6400;
            height: .28rem;
        }
        
        .content_title_value {
            font-size: .325rem;
            line-height: .325rem;
            color: #222222;
            margin-left: .155rem;
            font-weight: 700;
            -moz-user-select: none;
            -webkit-user-select: none;
            -ms-user-select: none;
            -khtml-user-select: none;
            user-select: none;
        }
        
        .list_ {
            width: 100%;
            display: flex;
            flex-direction: row;
            justify-content: left;
            padding: .32rem 0 .32rem 0;
            overflow: hidden;
            -moz-user-select: none;
            -webkit-user-select: none;
            -ms-user-select: none;
            -khtml-user-select: none;
            user-select: none;
            background-color: #FFFFFF;
        }
        
        .list_:active {
            background-color: #f3f8fc;
        }
        
        .list_img {
            width: 2.92rem;
            height: 1.64rem;
            margin-left: .3rem;
            border-radius: .2rem;
            overflow: hidden;
        }
        
        .list_img img {
            width: 100%;
            height: 100%;
        }
        
        .list_content {
            width: calc(100% - 3.52rem);
            display: flex;
            flex-direction: column;
        }
        
        .list_content_title {
            font-size: .29rem;
            color: #222222;
            font-weight: 900;
            display: -webkit-box;
            -webkit-box-orient: vertical;
            -webkit-line-clamp: 2;
            overflow: hidden;
        }
        
        .list_content_title p {
            padding-left: .2rem;
            -moz-user-select: none;
            -webkit-user-select: none;
            -ms-user-select: none;
            -khtml-user-select: none;
            user-select: none;
        }
        
        .list_content_value {
            font-size: .24rem;
            color: #666666;
            margin-top: .25rem;
        }
        
        .list_content_value p {
            padding-left: .2rem;
            -moz-user-select: none;
            -webkit-user-select: none;
            -ms-user-select: none;
            -khtml-user-select: none;
            user-select: none;
        }
    </style>
</head>

<body>
    <div id="app">
        <!-- 视频 -->
        <div class="video_class">
            <video class="video_class_" webkit-displaying-fullscreen="false" x-webkit-airplay="true" x5-playsinline="true" webkit-playsinline="true" playsinline="true" :poster="videoUrl+'?vframe/jpg/offset/1'" controls="controls" v-if="showVideo">
                <source :src="videoUrl"/>
            </video>
        </div>
        <div class="size_box" :style="height"></div>
        <!-- 标题 -->
        <div class="title_view" ref="titleDiv">
            <div class="title_content">
                <p>{{videoTitle}}</p>
            </div>
            <div class="title_day">
                <!-- <p>更新：<span>2021-11-14 19:00</span> 播放量：12.3w</p> -->
            </div>
            <div class="title_value">
                <!-- <p>都无论哪一种类型，都会有一定的都无论哪一种类型，都会有一定的都无论哪一种类型，都会有一定的都无论哪一种类型，都会有一定的都无论哪一种类型，都会有一定的</p> -->
            </div>
        </div>
        <div class="content_">
            <!-- 列表导航 -->
            <div class="content_title">
                <div class="content_title_red">
                    <div class="content_title_red_"></div>
                </div>
                <div class="content_title_value">推荐</div>
            </div>
            <!-- 列表 -->
            <div class="list_" v-for="(item,index) in List" :key='index' @click='videoClickFn(item)'>
                <div class="list_img">
                    <img :src="item.url+'?vframe/jpg/offset/1'" alt="">
                </div>
                <div class="list_content">
                    <div class="list_content_title">
                        <p>{{item.name}}</p>
                    </div>
                    <div class="list_content_value">
                        <!-- <p>播放量：18.3w</p> -->
                    </div>
                </div>
            </div>

        </div>
    </div>
    <script>
        new Vue({
            el: '#app',
            data: function() {
                return {
                    arr: [],
                    List: [],
                    videoUrl: '',
                    videoTitle: '',
                    index: 0,
                    showVideo: false,
                    height: null,
                    clickLicense: true
                }
            },
            created() {
                this.getData();
                this.index = this.GetRequest().type - 1 //当前播放视频索引
            },
            methods: {
                videoClickFn(item) { // 点击列表切换视频
                    var _this = this
                    if (_this.clickLicense == true) { //防止用户疯狂点击
                        _this.clickLicense = false
                        _this.videoTitle = item.name;
                        _this.videoUrl = item.url;
                        document.getElementsByTagName("title")[0].innerText = item.name;
                        var arra = [];
                        for (var i = 0; i < _this.arr.length; i++) {
                            if (item == _this.arr[i]) {
                                continue;
                            } else {
                                arra.push(_this.arr[i])
                            }
                        }
                        _this.List = arra;
                        _this.showVideo = false; //刷新视频组件
                        setTimeout(() => {
                            _this.showVideo = true;
                            _this.SizeboxStyle();
                            _this.clickLicense = true
                        }, 200);
                    }
                },
                getData() { //视频接口调用
                    var _this = this
                    axios({
                        method: 'GET',
                        url: 'http://only.1yuaninfo.com/index/news/course_lists.html',
                        headers: {
                            'Content-Type': 'multipart/form-data'
                        },
                    }).then(res => {
                        _this.arr = res.data.data //点击切换时用
                        _this.videoUrl = res.data.data[_this.index].url
                        _this.videoTitle = res.data.data[_this.index].name
                        document.getElementsByTagName("title")[0].innerText = res.data.data[_this.index].name
                        for (var i = 0; i < res.data.data.length; i++) {
                            _this.List.push(res.data.data[i])
                        }
                        _this.List.splice(_this.index, 1);
                        _this.showVideo = true;
                        _this.SizeboxStyle();
                    })
                },
                SizeboxStyle() {
                    setTimeout(() => { // 计算当前播放视频标题标签高度。高度复制给size_box
                        var obj = {}
                        obj.height = this.$refs.titleDiv.offsetHeight + 'px';
                        this.height = obj;
                    }, 300);
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

            },
        })
    </script>
</body>

</html>