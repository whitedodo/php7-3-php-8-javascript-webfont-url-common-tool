<?php
/*
	주제명: 공통 스크립트 경로 생성도구
	작성자(Author): 도도(Dodo)
	작성일자(Create date): 2021-04-07
	파일명(Filename): deliveryScript.php
	비고(Description): 
	1. 신규 작성(New), 도도(Dodo), 2021-04-07.

*/
?>
<?php

class DeliveryScript{
	
	private $debugMode ;

	private $usrChoose ;
	private $usrVersion ;

	private $commonDir ;
	private $serviceDir ;
	private $javascriptDir ;

	private $projectNickName ;
	private $projectDir ;
	private $projectVersion ; 
	private $projectExt ; 
	
	/*
		함수원형(Function prototype): function __construct()
		작성일자(Date of issue): 2021-04-07 (수요일 / Wednesday)
		기능명세(Functional specification): 	
		1. DeliveryScript 생성자(DeliveryScript constructor), 도도(Dodo), 2021-04-07
	*/
	public function __construct(){
		
		$this->commonDir = "common" ;
		$this->serviceDir = "service" ;
		$this->javascriptDir = "js" ;
		$this->usrChoose = 1 ;
		$this->usrVersion = "none" ;

		$this->debugMode = 0 ;	// 디버그 모드(Debug mode)

		$this->projectNickName = array( 
				"util", 
				"jquery_min", 
				"nodejs" 
				) ;	// 프로젝트명(Project name)

		$this->projectDir = array(
				 "util", 
				"jquery_min", 
				"nodejs"
				) ;	// 폴더 경로(Folder path)
	
		$this->projectVersion = array( 
				"0.1",
				"1",
				"0" 
				) ;	// 배포판 버전(Distribution version)

		$this->projectExt = array( 
				".js", 
				".js", 
				".js"
				) ;	// 파일 확장자명(File extension)


	} // end of function

	/*
		함수원형(Function prototype): function getChooseMode ( )
		작성일자(Date of issue): 2021-04-07 (수요일 / Wednesday)
		기능명세(Functional specification): 	
		1. 출력 값 표현, 도도(Dodo), 2021-04-07
	*/
	public function getChooseMode ( ) {

		$choose = $this->usrChoose ;
		$result = "";

		switch ( $choose ){
			
			case 1:
				$result = "absolute";
				break ;
			case 2:
				$result = "relative";
				break;
			
			case 3:
				$result = "view";
				break;

			default:
				$result = "view";
				break;

		} // end of switch

		return $result ;
	}

	/*
		함수원형(Function prototype): function setChooseMode ( $parameter )
		작성일자(Date of issue): 2021-04-07 (수요일 / Wednesday)
		기능명세(Functional specification): 	
		1. 출력 방법 선택, 도도(Dodo), 2021-04-07
	*/
	public function setChooseMode ( $choose ) {
		$this->usrChoose = $choose ;
	}

	/*
		함수원형(Function prototype): function getUsrVersion ( )
		작성일자(Date of issue): 2021-04-07 (수요일 / Wednesday)
		기능명세(Functional specification): 	
		1. 사용자 버전 출력(User version output), 도도(Dodo), 2021-04-07
	*/
	public function getUsrVersion ( ) {
		return $this->usrVersion ;
	}

	/*
		함수원형(Function prototype): function setUsrVersion ( $parameter )
		작성일자(Date of issue): 2021-04-07 (수요일 / Wednesday)
		기능명세(Functional specification): 	
		1. 사용자 버전 설정(User version setting), 도도(Dodo), 2021-04-07
	*/
	public function setUsrVersion ( $usrVersion ) {
		$this->usrVersion = $usrVersion ;
	}

	/*
		함수원형(Function prototype): function getResult ( $parameter )
		작성일자(Date of issue): 2021-04-07 (수요일 / Wednesday)
		기능명세(Functional specification): 	
		1. 출력, 도도(Dodo), 2021-04-07
	*/
	public function getResult ( $choose ) {
		
		$result = "";
		$usrMode = $this->getChooseMode() ;
		
		if ( $usrMode == "absolute" ) {	
			$result = $this->getScriptPath( $choose ) ;
		}
		else if ( $usrMode == "relative" ) {
			$result = $this->getScriptDeployPath ( $choose ) ;
		}
		else if ( $usrMode == "view" ) {
			$result = $this->getScriptDeploy( $choose ) ;
		}

		return $result;

	}

	/*
		함수원형(Function prototype): function getScriptDeployPath ( $parameter )
		작성일자(Date of issue): 2021-04-07 (수요일 / Wednesday)
		기능명세(Functional specification): 	
		1. 배포 경로 지정 / 실제 스크립트 파일 경로 가져오기, 도도(Dodo), 2021-04-07
	*/
	public function getScriptDeployPath( $choose ) {
		
		$serverURL = $_SERVER['REQUEST_SCHEME'] . "://";
		$serverURL = $serverURL . $_SERVER['SERVER_ADDR'] . ":" . $_SERVER['SERVER_PORT'];

		$realName = $this->getScriptPath ( $choose ) ;
		
		$result = "";

		if ( $realName != "" ) {

			$realName = $serverURL . "/" . $realName ;
			$result = $realName ;

		}

		return $result ;

	} // end of function

	/*
		함수원형(Function prototype): function getScriptDeploy ( $parameter )
		작성일자(Date of issue): 2021-04-07 (수요일 / Wednesday)
		기능명세(Functional specification): 	
		1. 배포 경로 지정 / 실제 스크립트 파일 경로 가져오기, 도도(Dodo), 2021-04-07
	*/
	public function getScriptDeploy( $choose ) {
		
		$realDir = $_SERVER['CONTEXT_DOCUMENT_ROOT'] ;
		$realName = $this->getScriptPath ( $choose ) ;
		
		$result = "";

		if ( $realName != "" ) {
			$realName = $realDir . $realName ;

			// 파일 열기
			$fp = fopen( $realName, "r") or die( "파일을 열 수 없습니다." );
			
			// $result = "<script>";
			// 파일 내용 출력
			while( ! feof ( $fp ) ) {
				$result = $result . fgets( $fp );
			}

			// $result = $result . "</script>";

			// 파일 닫기
			fclose( $fp );

		}

		return $result ;

	} // end of function

	/*
		함수원형(Function prototype): function getScriptPath ( $parameter )
		작성일자(Date of issue): 2021-04-07 (수요일 / Wednesday)
		기능명세(Functional specification): 	
		1. 실제 스크립트 파일 경로 가져오기, 도도(Dodo), 2021-04-07
	*/
	public function getScriptPath( $choose ) {

		$pjtName = $this->projectName ;
		$pjtDir = $this->projectDir ;
		$pjtVersion = $this->projectVersion ;
		$usrVersion = $this->getUsrVersion ( ) ;
		$resultVersion = -1;
		
		$realName = "" ;
		$index = $this->getIdentifyScript ( $choose );

		if ( $index != -1 ){
			
			if ( $usrVersion != "none" ) {
				$resultVersion = $usrVersion ;
			}
			else{
				$resultVersion = $this->projectVersion [ $index ] ;
			}

			$realName = $this->commonDir . "/" . $this->serviceDir ;
			$realName = $realName . "/" . $this->javascriptDir ;
			$realName = $realName . "/" . $this->projectDir [ $index ] ;
			$realName = $realName . "/" . $resultVersion ;
			$realName = $realName . "/" . $this->projectNickName [ $index ] ;
			$realName = $realName . $this->projectExt [ $index ] ;
		
		}

		return $realName ;

	} // end of function

	/*
		함수원형(Function prototype): function getIdentifyScript ( $parameter )
		작성일자(Date of issue): 2021-04-07 (수요일 / Wednesday)
		기능명세(Functional specification): 	
		1. 스크립트 존재 여부 식별하기(Identifying the existence of a script), 
		   도도(Dodo), 2021-04-07
	*/
	public function getIdentifyScript( $usrName ) {

		$status = -1;		
		$index = 0;

		$projectName = $this->projectNickName;

		// 스크립트 종류 출력
		foreach ( $projectName as $itemName ) {

			if ( $itemName == $usrName ) {
				$status = $index ;
			} // end of if

			$index++;

		} // end of foreach

		return $status;

	} // end of function

}	// end of classes

?>
