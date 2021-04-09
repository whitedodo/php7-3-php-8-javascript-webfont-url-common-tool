<?php
/*
  주제(Subject): 사용자정의 - 관리페이지(No DBMS)
  작성자(Author): 도도(Dodo)
  파일명(Filename): index.php
  라이선스(License): Apache Licence v2.0
  비고(Description):
  1. 최초 작성(Write First), 도도(Dodo), 2021-04-09.
*/
  
  $rootPath = "/home/dodo";
  $httpFolderName = "public_html";
  $webFolderName = "home";
  $commonFolderName = "common";
  
  $usrPath = $rootPath . "/" . $httpFolderName ;
  $usrPath = $usrPath . "/" . $webFolderName ;
  $usrPath = $usrPath . "/" . $commonFolderName ;
  
  include_once $usrPath . "/" . "incManageURL.php";
  
?>
<!doctype html>
<html lang="ko">
<head>
  <title>Welcome - Homepage</title>
  <meta charset="utf-8">
  <link rel="stylesheet" type="text/css" href="./css/style.css">
</head>
<body>

<?php
	
	$menuURL = new ConfigManageURL();
//	echo $hello->getManagePosName( 0 );
//	echo $hello->getManagePosProtocol( 0 );
//	echo $hello->findByNameIndex( "https-phpmyadmin" );
?>

<table class="type01">
    <tr>	
	<td style="width:20%">

	</td>
	<td>
	</td>
    </tr>
    <tr>
        <td>
          <span class="usr_font_12">
        	<ul>
        		<li>1. 소개(Introduce</li>
        		<ul>
        			<li>1. 소개</li>
        		</ul>
        	</ul>
        	<ul>
        		<li>2. 관리도구(Management tool)</li>
        		  <ul>
          			<li>1. 관리 웹</li>
          			  <ul>
          			    <li>
          			      <a href="<?php echo $menuURL->getManagePosURL( 0 ); ?>" target="_blank">
          			        <?php echo  $menuURL->getManagePosName( 0 ); ?>
          			      </a>
          			    </li>
        			    
          			    <li>
          			      <a href="<?php echo $menuURL->getManagePosURL(1); ?>" target="_blank">
          			        <?php echo $menuURL->getManagePosName(1); ?>
          			      </a>
          			    </li>
        			    </ul>
        			  <li>2. 개발 웹</li>
        			    <ul>
          			    <li>
          			      <a href="<?php echo $menuURL->getManagePosURL(2) ; ?>" target="_blank">
          			        <?php echo $menuURL->getManagePosName(2); ?>
          			      </a>
          			    </li>
        			    
          			    <li>
          			    </li>
            		</ul>
        		</ul>
        	</ul>
        	</span>
        </td>
        <td>
        </td>
    </tr>
</table>

<table class="type01">
    <tr>
        <td>
          <div style="text-align:center;font-size:12px;font-weight:bold;">
            <a href="#">My Blog</a>
          </div>
        </td>
        <td>
          <div style="text-align:center;font-size:12px;font-weight:bold;">
            <a href="#">My Home</a>
          </div>
        </td>
        <td>
          <div style="text-align:center;font-size:12px;font-weight:bold;">
            <a href="#">My Favorite Links</a>
          </div>
        </td>
    </tr>
</table>

<table class="type01">
    <tr>
        <td>
        <div style="text-align:center;font-size:12px;">
          Copyright&copy; 도도(Dodo)
          <br>
          해당 사이트는 사용자의 익명을 보장합니다.(The site guarantees the user's anonymity.)
        </div>
        </td>
    </tr>
</table>

</body>
</html>