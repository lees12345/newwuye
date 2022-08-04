<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:81:"/home/wwwroot/only.1yuaninfo.com/./application/index/view/personal/questions.html";i:1635479583;}*/ ?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>反馈</title>
		<meta name="viewport" content="width=device-width">
		<meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">
		<link rel="stylesheet"  href="http://nugget.gszx77.com/public/static/home/css/dragon.css" >
		<script src="http://nugget.gszx77.com/public/static/home/js/jquery-2.1.1.min.js"></script>
		<script src="http://nugget.gszx77.com/public/static/home/js/dragon.js"></script>
		<style>
			html,body{
				background: #F4F4F4;
			}
		</style>
	</head>
	<body>
	<form action="" method="post" class="form form-horizontal" id="formadd">
		<p class="feedback_title">欢迎您提供宝贵的意见和建议。</p>
		<div class="feedback_div">
			<input name="question_type" value="<?php echo $type; ?>" type="hidden">
			<p class="feedback_div_title">意见反馈</p>
			<textarea class="feedback_input" name="content" placeholder="我们将为您不断改进"></textarea>
		</div>
		<div class="feed_add_images">
			<p class="feedback_div_title">添加图片</p>
			
			<div class="container">
				<!--    照片添加    -->
				<div class="z_photo" id="z_photo">
					<div class="z_file">
						<input class="huodong-msg" type="file" name="file" id="file" value="" accept="image/jpg,image/jpeg,image/png" multiple onchange="imgChange(this,'z_photo','z_file');" />
					</div>
				</div>
	
				<!--遮罩层-->
				<div class="z_mask">
					<!--弹出框-->
					<div class="z_alert">
						<p>确定要删除这张图片吗？</p>
						<p>
							<span class="z_cancel">取消</span>
							<span class="z_sure">确定</span>
						</p>
					</div>
				</div>
			</div><!-- container -->
		</div>
		<input type="submit" value="提交" class="feedback_submit">
	</form>
		<script type="text/javascript">
			//ajax 提交
			window.onload = function(){
				$('#formadd').submit(function(event){
					var texta = $(".feedback_input").val();
					if(!texta)
					{
						alert('内容不能为空');
						return false;
					}
				//ajax方式提交form表单信息给服务器
					event.preventDefault(); //阻止浏览器form表单提交
					var form=document.getElementById("formadd");
				    var fd =new FormData(form);
					$.ajax({
						url:'submits.html',
						type:'post',
						data:fd,
						processData: false,  // 告诉jQuery不要去处理发送的数据
				        contentType: false,   // 告诉jQuery不要去设置Content-Type请求头
				        dataType:'json',		
						success:function(msg){
							if(msg.code == 200)
							{
								alert(msg.msg);
								history.go(-1); 
							}
						  
						}
					});
			
				})


				// $(".feedback_submit").click(function(){

				// 	var content = $('.feedback_input').val();
				// 	console.log(content);
				// 	//获取图片的信息  进行ajax传值过去
				

				// 	$.post("submits.html",{content:content},function(result){
				        
				//     });
				// })	
			}
		</script>
		
	</body>
</html>
