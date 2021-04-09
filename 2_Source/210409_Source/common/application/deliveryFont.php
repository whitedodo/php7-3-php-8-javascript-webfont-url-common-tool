<?php
/*
	주제명: 공통 폰트 생성도구
	작성일자(Create date): 2021-04-07
	파일명(Filename): deliveryFont.php
  라이선스(License): Apache Licence v2.0
	비고(Description)
	1. 처음 작성, 2021-04-07, 도도(Dodo)
	2. 경로 수정 보완(사용자 경로 보완작업), 2021-04-09, 도도(Dodo)
	3. getter/setter (Private, Protected, Public) / 3가지 시야 보완작업, 2021-04-09. 도도(Dodo)
*/

class DeliveryFont{

	private $debugMode;

  private $customHomeDirectories ;
  private $customCommonDirectories ;

	private $customFontNickName ;
	private $customFolderName ;
	private $customFontName ;

	public function __construct(){

		$this->setDebugMode ( 0 );	// 디버그 모드
    $this->initConfig() ;       // 초기 폰트 설정
	}
	
	public function initConfig(){
	  
	  // 폰트 별명
	  $customNickName = array (
					"nanum"
  	) ;	
		
		// 폰트 폴더 경로
		$customFolderName = array (
					"nanumgothic"
  	) ;	
	
   	// 폰트 실제명
		$customFontName = array (
					"NanumGothic"
	  ) ;	
	  
	  $this->setCustomFontNickName ( $customNickName ) ;
	  $this->setCustomFolderName ( $customFolderName ) ;
	  $this->setCustomFontName ( $customFontName ) ;

	}
	
	public function getCustomFontNickName(){
	  return $this->customFontNickName;
	}
	
	public function setCustomFontNickName( $nickname ){
	  $this->customFontNickName = $nickname;
	}
	
	public function getCustomFolderName () {
	  return $this->customFolderName;
	}
	
	public function setCustomFolderName ( $folderName ) {
	  $this->customFolderName = $folderName ;
	}
	
	public function getCustomFontName () {
	  return $this->customFontName ;
	}
	
	public function setCustomFontName ( $customFont ){
	  $this->customFontName = $customFont ;
	}
	

  public function getDebugMode ( ) {
    return $this->debugMode ;
  }

	public function setDebugMode( $mode ) {
		$this->debugMode = $mode ;
	}
	
	public function getHomeDirectory ( ) {
	  return $this->customHomeDirectories ;
	}
	
	public function setHomeDirectory( $usrDirectory ) {
	  
    $this->customHomeDirectories = $usrDirectory ;
	}
	
	public function getCommonDirectory ( ) {
	  return $this->customCommonDirectories ;
	}
	
	public function setCommonDirectory ( $usrDirectory ) {
	  $this->customCommonDirectories = $usrDirectory ;
	}

	public function getCSSFont( $font ){

		$selector_font = $font ;

		$usrFontFolderName = ""; 		// 폰트 폴더명
		$usrFontFileName = "";		// 폰트 파일명(공통)
		
		$customFolderName = $this->getCustomFolderName();
		$customFontName = $this->getCustomFontName();

		// 디버그 모드
		$debugMode = $this->getDebugMode( );

		$serverURL = $_SERVER['REQUEST_SCHEME'] . "://";
		$serverURL = $serverURL . $_SERVER['SERVER_ADDR'] . ":" . $_SERVER['SERVER_PORT'];
		
		$homePath = $this->getHomeDirectory ( ) ;
		$commonPath = $this->getCommonDirectory ( );
		
		$commonCSS = "service";
		$commonFont = "font";

		$fontIndex = $this->getFontFinder( $selector_font ) ;
		
		if ( $fontIndex != -1 ){

			$usrFontFolderName = $customFolderName [ $fontIndex ] ;	// 폰트 폴더명
			$usrFontFileName = $customFontName [ $fontIndex ] ;	// 폰트 파일명(공통)
			
			print_r ($customFontName );
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

		$createURL_common = $serverURL . "/" . $homePath ;
    $createURL_common = $createURL_common .	"/" . $commonPath ;
		$createURL_common = $createURL_common . "/" . $commonCSS ;
		$createURL_common = $createURL_common . "/" . $commonFont ;

		$createURL_common = $createURL_common . "/" . $usrFontFolderName ;
		$createURL_common = $createURL_common . "/" . $usrFontFileName ;

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

		if ( $fontIndex != -1 ) {
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
		} // end of if

	} // end of function 

	public function getFontFinder( $fontName ) {
		
		$customFont = $this->getCustomFontNickName() ;
		$status = -1;
		$index = 0;

		// 폰트 찾기
		foreach ( $customFont as $itemName ){
			
			if ( $itemName == $fontName ) {
				$status = $index ;
			}

			$index++;

		} // end of foreach

		return $status ;

	} // end of function 

} // end of classes

?>