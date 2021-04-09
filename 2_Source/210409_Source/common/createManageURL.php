<?php

/*
  ����(Subject): ���� -  URL ��������
  �ۼ���(Author): ����(Dodo)
  ���ϸ�(Filename): common/createManageURL.php
  ���̼���(License): Apache Licence v2.0
  ���(Description):
  1. ���� �ۼ�(Write First), ����(Dodo), 2021-04-09.

*/

class CreateManageURL{
  
  private $manageProtocol;
  private $manageAddress;
  private $managePort;
  private $manageFolder;
  
  public function setURLInfo( $manageProtocol, $manageAddress, $managePort ) {
    $this->manageProtocol = $manageProtocol;
    $this->manageAddress = $manageAddress;
    $this->managePort = $managePort; 
  }
  
  public function getManageProtocol(){
    return $this->manageProtocol ; 
  }
  
  public function getManageAddress(){
    return $this->manageAddress;
  }
  
  public function getManagePort(){
    return $this->managePort;
  }
  
  public function getManageFolder(){
    return $this->manageFolder;
  }
  
  public function setManageProtocol( $manageProtocol ){
    $this->manageProtocol = $manageProtocol ; 
  }
  
  public function setManageAddress( $manageAddress ){
    $this->manageAddress = $manageAddress ;
  }
  
  public function setManagePort( $managePort ){
    $this->managePort = $managePort ;
  }
  
  public function setManageFolder( $manageFolder ){
    $this->manageFolder = $manageFolder ;
  }
    
  public function createUsrURL ( $manageFolder ) {

    $usrArrURL = array();
    $usrURL = "";
    
    $this->setManageFolder ( $manageFolder );
    
    $usrSize = count ( $manageFolder );
    $manageProtocol = $this->getManageProtocol() ;
    $manageAddress = $this->getManageAddress() ;
    $managePort = $this->getManagePort();

    for ($i = 0; $i < $usrSize; $i++) { 
      // array_push( $u_arr, $i ); 
      // $u_arr[$i] = $u_arr[$i] . ":";
      
      $usrURL = $manageProtocol[$i] . "://";
      $usrURL = $usrURL . $manageAddress[$i];
      $usrURL = $usrURL . ":" . $managePort[$i];
      $usrURL = $usrURL . "/" . $manageFolder[$i];
      
      array_push ( $usrArrURL, $usrURL );
      
    }

    return $usrArrURL;

  }
  
}
  
?>