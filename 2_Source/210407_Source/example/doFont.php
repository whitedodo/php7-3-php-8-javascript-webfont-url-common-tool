<?php
/*
*	작성일자(Create Date): 2021-04-07 (수요일/Wednesday)
*	작성자(Author): 도도(Dodo)
* 	라이선스(License): GNU/GPL v3 License
*	파일명(Filename): createMagicFont.php
*	비고(Description): 
*	1. 폰트 생성 구현, 도도(Dodo), 2021-04-07.
* 	2. 
*
*/
?>

<?php
/*
*	사용자 영역
*/

	$selector_font = $_GET['font'];	

	$usrFontFolderName = "";	// 폰트 폴더명
	$usrFontFileName = "";		// 폰트 파일명(공통)

	// 디버그 모드
	$debugMode = 0;
?>

<?php

	$serverURL = $_SERVER['REQUEST_SCHEME'] . "://";
	$serverURL = $serverURL . $_SERVER['SERVER_ADDR'] . ":" . $_SERVER['SERVER_PORT'];
	$commonPath = "common";
	$commonCSS = "css";
	$commonFont = "font";
?>

<?php

	$service = 0;					// 서비스 코드(활성화 구분)
							// 활성: 1, 비활성: 0

	// 폰트 찾기
	if ($selector_font == 'nanum' ){

		$service = 1;				
		$usrFontFolderName = "nanumgothic";	// 폰트 폴더명
		$usrFontFileName = "NanumGothic";		// 폰트 파일명(공통)

	}

?>

<?php
/*
	공통(폰트 설정)
*/

	// 진하게(Bold)
	$usrFont_bold_1 = "-Bold.eot";	
	$usrFont_bold_2 = "-Bold.eot?#iefix";
	$usrFont_bold_3 = "-Bold.woff2";
	$usrFont_bold_4 = "-Bold.woff";
	$usrFont_bold_5 = "-Bold.ttf";

	// 리귤러(보통)(Regular)
	$usrFont_regular_1 = "-Regular.eot";	
	$usrFont_regular_2 = "-Regular.eot?#iefix";
	$usrFont_regular_3 = "-Regular.woff2";
	$usrFont_regular_4 = "-Regular.woff";
	$usrFont_regular_5 = "-Regular.ttf";

	// 매우 진하게(ExtraBold)
	$usrFont_Extrabold_1 = "-ExtraBold.eot";	
	$usrFont_Extrabold_2 = "-ExtraBold.eot?#iefix";
	$usrFont_Extrabold_3 = "-ExtraBold.woff2";
	$usrFont_Extrabold_4 = "-ExtraBold.woff";
	$usrFont_Extrabold_5 = "-ExtraBold.ttf";
?>
<?php

	$createURL_common = $serverURL . "/" . $commonPath . "/" . $commonCSS . "/" . $commonFont;
	$createURL_common = $createURL_common . "/" . $usrFontFolderName . "/" . $usrFontFileName;

	if ( $debugMode == 1 ) {
		echo "공통URL:" . $createURL_common . "<br/>";
	}
	
	$createURL_bold_fileName1 = $createURL_common . $usrFont_bold_1;
	$createURL_bold_fileName2 = $createURL_common . $usrFont_bold_2;
	$createURL_bold_fileName3 = $createURL_common . $usrFont_bold_3;
	$createURL_bold_fileName4 = $createURL_common . $usrFont_bold_4;
	$createURL_bold_fileName5 = $createURL_common . $usrFont_bold_5;
	
	$createURL_regular_fileName1 = $createURL_common . $usrFont_regular_1;
	$createURL_regular_fileName2 = $createURL_common . $usrFont_regular_2;
	$createURL_regular_fileName3 = $createURL_common . $usrFont_regular_3;
	$createURL_regular_fileName4 = $createURL_common . $usrFont_regular_4;
	$createURL_regular_fileName5 = $createURL_common . $usrFont_regular_5;

	$createURL_extrabold_fileName1 = $createURL_common . $usrFont_Extrabold_1;
	$createURL_extrabold_fileName2 = $createURL_common . $usrFont_Extrabold_2;
	$createURL_extrabold_fileName3 = $createURL_common . $usrFont_Extrabold_3;
	$createURL_extrabold_fileName4 = $createURL_common . $usrFont_Extrabold_4;
	$createURL_extrabold_fileName5 = $createURL_common . $usrFont_Extrabold_5;

	if ( $debugMode == 1 ) {
		echo "NanumFont Bold(1~5) URL" . "<br/>";

		echo "NanumFont Bold1:" . $createURL_bold_fileName1 . "<br/>";
		echo "NanumFont Bold2:" . $createURL_bold_fileName2 . "<br/>";
		echo "NanumFont Bold3:" . $createURL_bold_fileName3 . "<br/>";
		echo "NanumFont Bold4:" . $createURL_bold_fileName4 . "<br/>";
		echo "NanumFont Bold5:" . $createURL_bold_fileName5 . "<br/>";

		echo "NanumFont Regular(1~5) URL" . "<br/>";

		echo "NanumFont Regular1:" . $createURL_regular_fileName1 . "<br/>";
		echo "NanumFont Regular2:" . $createURL_regular_fileName2 . "<br/>";
		echo "NanumFont Regular3:" . $createURL_regular_fileName3 . "<br/>";
		echo "NanumFont Regular4:" . $createURL_regular_fileName4 . "<br/>";
		echo "NanumFont Regular5:" . $createURL_regular_fileName5 . "<br/>";

		echo "NanumFont ExtraBold(1~5) URL" . "<br/>";

		echo "NanumFont ExtraBold1:" . $createURL_extrabold_fileName1 . "<br/>";
		echo "NanumFont ExtraBold2:" . $createURL_extrabold_fileName2 . "<br/>";
		echo "NanumFont ExtraBold3:" . $createURL_extrabold_fileName3 . "<br/>";
		echo "NanumFont ExtraBold4:" . $createURL_extrabold_fileName4 . "<br/>";
		echo "NanumFont ExtraBold5:" . $createURL_extrabold_fileName5 . "<br/>";
	}

?>

<?php

	if ( $service == 1 ) {
?>

@font-face {
  font-family: 'Nanum Gothic';
  font-style: normal;
  font-weight: 700;
  src: url('<?php echo $createURL_bold_fileName1; ?>');
  src: url('<?php echo $createURL_bold_fileName2; ?>') format('embedded-opentype'),
       url('<?php echo $createURL_bold_fileName3; ?>') format('woff2'),
       url('<?php echo $createURL_bold_fileName4; ?>') format('woff'),
       url('<?php echo $createURL_bold_fileName5; ?>') format('truetype');
}
@font-face {
  font-family: 'Nanum Gothic';
  font-style: normal;
  font-weight: 400;
  src: url('<?php echo $createURL_regular_fileName1; ?>');
  src: url('<?php echo $createURL_regular_fileName2; ?>') format('embedded-opentype'),
       url('<?php echo $createURL_regular_fileName3; ?>') format('woff2'),
       url('<?php echo $createURL_regular_fileName4; ?>') format('woff'),
       url('<?php echo $createURL_regular_fileName5; ?>') format('truetype');
}
@font-face {
  font-family: 'Nanum Gothic';
  font-style: normal;
  font-weight: 800;
  src: url('<?php echo $createURL_extrabold_fileName1; ?>');
  src: url('<?php echo $createURL_extrabold_fileName2; ?>') format('embedded-opentype'),
       url('<?php echo $createURL_extrabold_fileName3; ?>') format('woff2'),
       url('<?php echo $createURL_extrabold_fileName4; ?>') format('woff'),
       url('<?php echo $createURL_extrabold_fileName5; ?>') format('truetype');
}

<?php
	}
?>
