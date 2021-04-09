<?php
	$serverURL = $_SERVER['REQUEST_SCHEME'] . "://";
	$serverURL = $serverURL . $_SERVER['SERVER_ADDR'] . ":" . $_SERVER['SERVER_PORT'];
	$commonPath = "common";
?>
<html>
<head>
  <meta charset="utf-8">
  <title>공통 CSS / 자바스크립트 - CDN(Common - CSS / Javascript) Common Delivery Network)</title>
  <script src="createAccess.php?js=util"></script>
  <style>
  	@import url('<?php echo $serverURL; ?>/common/createAccess.php?font=nanum');
  </style>
  <link rel="stylesheet" type="text/css" href="./css/style.css" />
</head>
<body>

<div style="text-align:center; color:#0489B1">
  <h3>공통 배포 서비스(Common - Delivery Service)</h3>
</div>
<br/>


<table class="type01">
	<thead>
		<tr>
		<td>
			번호
		</td>
		<td>
			구분
		</td>
		<td>
			소스코드
		</td>
		<td>
			버튼
		</td>
		<td>
			비고
		</td>
		</tr>
	</thead>
	<tbody>
	<tr>
		<td>
			1
		</td>
		<td>	
			CSS/폰트
		</td>
		<td>	
			<textarea class="common_textarea" id="common_text_nanum" readonly><style>	
@import url('<?php echo $serverURL; ?>/<?php echo $commonPath; ?>/createAccess.php?font=nanum');
</style></textarea>		
		</td>
		<td>
			<a href="javascript:copiespaste('common_text_nanum');">복사
			</a>
		</td>
		<td>
		</td>
	</tr>	
	<tr>
		<td>
			2
		</td>
		<td>	
			PHP 공통함수
		</td>
		<td>	
			<textarea class="common_textarea" id="common_php_nanum" readonly>&lt;?php
	$serverURL = $_SERVER['REQUEST_SCHEME'] . "://";
	$serverURL = $serverURL . $_SERVER['SERVER_ADDR'] . ":" . $_SERVER['SERVER_PORT'];
	$commonPath = "common";
?>
<style>
@import url('&lt;?php echo $serverURL; ?>/<?php echo $commonPath; ?>/createAccess.php?font=nanum');
</style></textarea>		
		</td>
		<td>
			<a href="javascript:copiespaste('common_php_nanum');">복사
			</a>
		</td>
		<td>
		</td>
	</tr>
	</tbody>
</table>

<table class="type01">
    <tr>
        <td>
        <div style="text-align:center;font-size:12px;">
          Copyright&copy; Dodo(도도)
          <br>
          해당 사이트는 사용자의 익명을 보장합니다.(The site guarantees the user's anonymity.)
        </div>
        </td>
    </tr>
</table>

</body>
</html>
