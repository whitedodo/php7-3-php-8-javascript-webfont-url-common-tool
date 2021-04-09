<?php
/*
	주제명: 공통 스크립트 경로 생성도구
	작성자(Author): 도도(Dodo)
	작성일자(Create date): 2021-04-07
	파일명(Filename): deliveryScript.php
  라이선스(License): Apache Licence v2.0
	비고(Description): 
	1. 신규 작성(New), 도도(Dodo), 2021-04-07.
  2. getter/setter Private, Protected, Public / 시야 개선 작업, 도도(Dodo), 2021-04-09.
  3. 홈 디렉터리 추가, 도도(Dodo), 2021-04-09.
  4. 공통 디렉터리 추가, 도도(Dodo), 2021-04-09.
*/
?>
<?php

class DeliveryScript{
	
	private $debugMode ;

	private $usrChoose ;
	private $usrVersion ;

  private $customHomeDirectories ;
  private $customCommonDirectories ;
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
		
		$this->setServiceDir( "service" );
		$this->setJavascriptDir( "js" );
		$this->setUsrChoose( 1 );
		$this->setUsrVersion( "none" );

		$this->setDebugMode( 0 ) ;	// 디버그 모드(Debug mode)

    $this->initConfig();


	} // end of function
	
	private function initConfig() {
	  
	  // 프로젝트명(Project name)
	  $projectNickName = array( 
				"util", 
				"jquery_min", 
				"nodejs" 
				) ;	
		
  	// 폴더 경로(Folder path)
		$projectDir = array(
				 "util", 
				"jquery_min", 
				"nodejs"
				) ;
	
  	// 배포판 버전(Distribution version)
		$projectVersion = array( 
				"0.1",
				"1",
				"0" 
				) ;	


    // 파일 확장자명(File extension)
		$projectExt = array( 
				".js", 
				".js", 
				".js"
				) ;	
				
    $this->setProjectNickName ( $projectNickName ) ;
	  $this->setProjectDir ( $projectDir );
    $this->setProjectVersion ( $projectVersion );
		$this->setProjectExt ( $projectExt );
		
	}
	
	public function getProjectPosNickName ( $index ) {
	  $projectNickName = $this->projectNickName ;	  
	  return $projectNickName [ $index ] ;
	}
	
	public function getProjectPosDir ( $index ) {
	  $projectdir = $this->projectDir ;
	  return $projectdir [ $index ] ;
	}
	
	public function getProjectPosVersion ( $index ) {
	  $projectVersion = $this->projectVersion ;
	  return $projectVersion [ $index ] ;
	}
	
	public function getProjectPosExt ( $index ) {
	  $projectExt = $this->projectExt [ $index ] ;
	  return $projectExt [ $index ] ;
	}
	
	
	public function getProjectNickName() {
	  return $this->projectNickName ;
	}
	
	public function setProjectNickName ( $nickname ) {
	  $this->projectNickName = $nickname ;
	}
	
	public function getProjectDir () {
	  return $this->projectDir ;
	}
	
	public function setProjectDir ( $projectdir ){
	  $this->projectDir = $projectdir ;
	}
	
	public function getProjectVersion () {
	  return $this->projectVersion ;
	}
	
	public function setProjectVersion ( $version ){
	  $this->projectVersion = $version ;
	}
	
	public function getProjectExt () {
	  return $this->projectExt ;
	}
	
	public function setProjectExt ( $projectext ) {
	  $this->projectExt = $projectext;
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
	
	/*
		함수원형(Function prototype): function getChooseMode ( )
		작성일자(Date of issue): 2021-04-07 (수요일 / Wednesday)
		기능명세(Functional specification): 	
		1. 출력 값 표현, 도도(Dodo), 2021-04-07
	*/
	public function getChooseMode ( ) {

		$choose = $this->getUsrChoose() ;
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
	
	public function getUsrChoose(){
	  return $this->usrChoose ;
	}
	
	public function setUsrChoose( $choose ) {
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

  public function getDebugMode ( ) {
    return $this->debugMode ;
  }
  
  public function setDebugMode ( $debugMode ) {
    $this->debugMode = $debugMode ;
  }
  
  public function getServiceDir ( ) {
    return $this->serviceDir ;
  }
  
  public function setServiceDir ( $usrDir ) {
    $this->serviceDir = $usrDir ;
  }
  
  public function getJavascriptDir ( ) {
    return $this->javascriptDir ;
  }
  
  public function setJavascriptDir ( $usrDir ) {
    $this->javascriptDir = $usrDir ;
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

		$pjtName = $this->getProjectNickName() ;
		$pjtDir = $this->getProjectDir () ;
		$homeDir = $this->getHomeDirectory ( ) ;
		$commonDir = $this->getCommonDirectory ( ) ;
		$serviceDir = $this->getServiceDir ( ) ;
		$javascriptDir = $this->getJavascriptDir ( ) ;
		$pjtVersion = $this->getProjectVersion () ;
		$usrVersion = $this->getUsrVersion ( ) ;
		$pjtExt = $this->getProjectExt ( ) ;
		
		$resultVersion = -1;
		
		$realName = "" ;
		$index = $this->getIdentifyScript ( $choose );

		if ( $index != -1 ){
			
			if ( $usrVersion != "none" ) {
				$resultVersion = $usrVersion ;
			}
			else{
				$resultVersion = $pjtVersion [ $index ] ;
			}

      $realName = $homeDir ;
      $realName = $realName . "/" . $commonDir ;
			$realName = $realName . "/" . $serviceDir ;
			$realName = $realName . "/" . $javascriptDir ;
			$realName = $realName . "/" . $pjtDir [ $index ] ;
			$realName = $realName . "/" . $resultVersion ;
			$realName = $realName . "/" . $pjtName [ $index ] ;
			$realName = $realName . $pjtExt [ $index ] ;
		
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

		$projectName = $this->getProjectNickName() ;

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