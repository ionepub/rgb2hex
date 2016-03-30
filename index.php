<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title> RGB颜色与十六进制互转 -- 一碗休闲吧出品 I ONE PUB </title>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<style>
*{
	padding:0;
	margin:0;
}
body{
	margin:0 auto;
	width:540px;
	background:#fff;
	font-size:14px;
	font-family:微软雅黑,Arial;
}
a{
	color:#333;
	text-decoration:none;
}
img{
	border:0;
}
#container{
	width:540px;
	height:300px;
	margin:0 auto;
	border:1px solid #ccc;
	background:#f1f1f1;
}
#container h3{
	width:540px;
	height:30px;
	line-height:30px;
	font-size:16px;
	font-weight:normal;
	background:#999;
	text-align:center;
	color:#fff;
}
#cform{
	width:500px;
	height:250px;
	margin:10px auto 0 auto;
}
#cform label{
	display:inline-block;
	width:45px;
	height:40px;
	line-height:40px;
	text-indent:13px;
	letter-spacing:1px;
}
input{
	width:100px;
	height:30px;
	line-height:30px;
	vertical-align:center;
	margin:5px 0 10px 0;
}
input.btn{
	margin:0 0 0 27px;
	height:35px;
	width:120px;
}
input#six{
	width:120px;
}
dl{
	width:500px;
	height:145px;
	margin:10px auto;
}
#tip{
	width:330px;
	padding:15px 5px;
	letter-spacing:1px;
	float:left;
}
#show{
	float:right;
	width:100px;
	height:100px;
	background:#fff url(logo.jpg) no-repeat;
	margin:0px 30px 0px 0;
	border:2px solid #ccc;
}
#clear{
	width:132px;
	height:30px;
	float:right;
}
</style>
</head>
<body>
	<div id="container">
		<h3>RGB颜色与十六进制互转</h3>
		<div id="cform">
			<form method="post" action="" name="cform" onsubmit="">
				<label for="rtxt">R :</label><input type="text" name="r" id="rtxt" value="红色值" onfocus="txtFocus();" onblur="txtBlur();"/>&nbsp;&nbsp;
				<label for="gtxt">G :</label><input type="text" name="g" id="gtxt" value="绿色值" onfocus="txtFocus();" onblur="txtBlur();"/>&nbsp;&nbsp;
				<label for="btxt">B :</label><input type="text" name="b" id="btxt" value="蓝色值" onfocus="txtFocus();" onblur="txtBlur();"/>&nbsp;&nbsp;
				<label for="six"># :</label><input type="text" name="six" id="six" value="16进制值" onfocus="txtFocus();" onblur="txtBlur();"/>&nbsp;&nbsp;<input type="submit" name="rsend" value="RGB转换16进制" class="btn"/>&nbsp;&nbsp;<input type="submit" name="ssend" value="16进制转换RGB" class="btn"/>
				<dl>
					<dd id="tip">TIP: 请在上方的RGB三个框分别输入 0～255 的数值表示要转换的红颜色、绿颜色和蓝颜色大小，或者在上方的16进制数框中输入3位或6位16进制数（0～F），并点击转换按钮。您输入的颜色也会在右侧展示哦！--&gt;</dd>
					<dd id="show"></dd>
					<dd id="clear"><input type="reset" value="CLEAR" id="reset"/></dd>
				</dl>
			</form>
		</div>
	</div>
<script type="text/javascript">
	var r = document.getElementById("rtxt");
	var g = document.getElementById("gtxt");
	var bb = document.getElementById("btxt");
	var s = document.getElementById("six");
	var shw = document.getElementById("show");
	var reset = document.getElementById("reset");
	function txtFocus(){
		if (r.value == "红色值")
		{
			r.value = "";
		}
		if (g.value == "绿色值")
		{
			g.value = "";
		}
		if (bb.value == "蓝色值")
		{
			bb.value = "";
		}
		if (s.value == "16进制值")
		{
			s.value = "";
		}
	}
	function txtBlur(){
		if (r.value == "")
		{
			r.value = "红色值";
		}
		if (g.value == "")
		{
			g.value = "绿色值";
		}
		if (bb.value == "")
		{
			bb.value = "蓝色值";
		}
		if (s.value == "")
		{
			s.value = "16进制值";
		}
	}
	function rOutput(a,b,c,cc){//rgb->16
		r.value = a;
		g.value = b;
		bb.value = c;
		s.value = cc;
		var color = "#" + cc;
		shw.style.background = color;
	}
	function sOutput(a,b,c,d){
		r.value = a;
		g.value = b;
		bb.value = c;
		s.value = d;
		var color = "#" + d;
		shw.style.background = color;
	}
	reset.onclick = function(){
		r.value = "";
		g.value = "";
		bb.value = "";
		s.value = "";
		shw.style.background = "url(logo.jpg) no-repeat";
	}
</script>
<?php
	if($_POST['rsend'] == "RGB转换16进制") {
		$red = intval($_POST['r']);
		$green = intval($_POST['g']);
		$blue = intval($_POST['b']);
		$redn = getNewColor($red);
		$greenn = getNewColor($green);
		$bluen = getNewColor($blue);
		$out = $redn.$greenn.$bluen;
		//echo $redn.$greenn;
		echo output($red,$green,$blue,$out);
	}
	if($_POST['ssend'] == "16进制转换RGB") {
		$sinput = $_POST['six'];
		if(is_array(checkSInput($sinput))){
			$arr = checkSInput($sinput);
			echo soutput($arr,$sinput);
		}else{
			echo soutput(array(0,0,0),0);
		}
	}
	function soutput($a,$b) {
		$str = "<script>sOutput(".$a[0].",".$a[1].",".$a[2].",'".$b."');</script>";
		return $str;
	}
	function checkSInput($s) {
		if(strlen($s)!=3 && strlen($s)!=6) {
			return 0;
		}else{
			$arr = Array();
			$tarr = Array();
			$arr = str_split($s);
			$k = 0;
			for($i=0;$i<count($arr);$i++) {
				$t = getSJinzhi($arr[$i]);
				if(count($arr)==3) {
					$t = $t*16+$t;
					$tarr[$i] = $t;
				}else{
					if($i%2==0) {//1,3,5
						$k = $t *16;
					}else{//2,4,6
						$k += $t;
					}
					//$n = round(($i+1)/2);//0.5->1
					$n = intval($i/2);//0.5->0
					$tarr[$n] = $k;
				}
			}
			return($tarr);
		}
	}
	function getSJinzhi($si) {
		if(intval($si)>0 && intval($si)<10) {
			$s = $si;
		}elseif(($si>='a' && $si<='f') || ($si>='A' && $si<='F')){
			$s = hexdec($si);
		}else{
			$s = 0;
		}
		return $s;
	}
	function output($a,$b,$c,$re) {
		$str = "<script>rOutput(".$a.",".$b.",".$c.",'".$re."');</script>";
		return $str;
	}
	function getNewColor($v) {
		if($v<0) {
			$v = 0;
		}else if($v>255) {
			$v = 255;
		}
		$cz = (int)($v/16);
		$cy = ($v % 16);
		$cz = getJinZhi($cz);
		$cy = getJinZhi($cy);
		$cnew = $cz.$cy;
		return $cnew;
	}
	function getJinZhi($val) {
		switch($val) {
			case 10:
				$val = "A";
				break;
			case 11:
				$val = "B";
				break;
			case 12:
				$val = "C";
				break;
			case 13:
				$val = "D";
				break;
			case 14:
				$val = "E";
				break;
			case 15:
				$val = "F";
				break;
			default:
				$val = $val;
		}
		return $val;
	}
?>
</body>
</html>
<!-- RGB颜色与十六进制互转 一碗休闲吧出品
还在为RGB颜色和#十六进制颜色转换发愁？试试这款应用吧！目前支持RGB转十六进制，和十六进制转RGB，欢迎使用！ -->
