<?php
/*
	주제명: 공통 CSS, 자바스크립트 생성도구
	작성일자(Create date): 2021-04-07
	파일명(Filename): createAccess.php
	작성자(Author): 도도(Dodo)
	비고(Description):
	1. 처음 작성, 도도(Dodo), 2021-04-07
*/
?>
<?php
	$usrPath = "common" ;
?>
<?php
	$realDir = $_SERVER['CONTEXT_DOCUMENT_ROOT'] ;
	$realDir = $realDir . $usrPath . "/" ;

	include_once $realDir . "application/deliveryScript.php" ;
	include_once $realDir . "application/deliveryFont.php" ;

	$msg = "";			// 메시지 출력

	$dFont = new DeliveryFont() ;	// 폰트 생성
	$dScript = new DeliveryScript() ;	// 스크립트 생성

	$usrFont = $_GET['font'] ;

	$usrJs = $_GET['js'] ;
	$usrJsMode = $_GET['mode'] ;
	$usrVersion = $_GET['ver'] ;
	
	// 폰트 여부
	if ( strlen ( $usrFont ) != 0 && 
	    strlen ($usrJs ) === 0) {
		$dFont -> getCSSFont( $usrFont ) ;
	} // end of if

	// 자바스크립트 여부
	if ( strlen ( $usrJs ) != 0 &&
	    strlen ( $usrFont ) === 0 ) {

		// 사용자 모드	
		if ( strlen ( $usrJsMode ) === 0 ) {
			$usrJsMode = 1;
		}

		// 사용자 버전
		if ( strlen ( $usrVersion ) === 0 ) {
			$usrVersion = "none";
		}else{
			$usrVersion = (string)$usrVersion;
		}
		
		$dScript-> setChooseMode( $usrJsMode );
		$dScript-> setUsrVersion( $usrVersion );
		$msg = $dScript -> getResult ( $usrJs ) ;
		echo $msg ;

	} // end of if

?>