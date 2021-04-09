<?php

/*
  ����(Subject): ȯ�漳�� -  URL ��������
  �ۼ���(Author): ����(Dodo)
  ���ϸ�(Filename): common/configManageURL.php
  ���̼���(License): Apache Licence v2.0
  ���(Description):
  1. ���� �ۼ�(Write First), ����(Dodo), 2021-04-09.

*/

  class ConfigManageURL{
    
    private $manageName ;
    private $manageProtocol ;
    private $manageAddress ;
    private $managePort ;
    private $manageFolder ;
    
    private $manageURL ;
    
    public function __construct() {
      
      $this->initConfigInfo( ) ;
      
      $manageProtocol = $this->getManageProtocol ( );
      $manageAddress = $this->getManageAddress ( );
      $managePort = $this->getManagePort ( ) ;
      
      $createURL = new CreateManageURL();
      $createURL->setURLInfo ( $manageProtocol, 
                               $manageAddress,
                               $managePort );
                               
      $manageURL = $createURL->createUsrURL ( $this->manageFolder );

//      print_r ($managePort);      (�迭 �����)
//      print_r ($manageURL);
      
      $this->setManageURL ( $manageURL );
      
    }
    
    private function initConfigInfo ( ) {
      
      $manageName = array(
                      "http-manage" => 0, 
                      "https-manage" => 1,
                      "https-phpmyadmin" => 2,
                      "https-common" => 3
                     );
                     
      $manageProtocol = array(
                          "http", 
                          "https",
                          "https",
                          "https"
                         );
                         
      $manageAddress = array(
                          $_SERVER['SERVER_ADDR'], 
                          $_SERVER['SERVER_ADDR'],
                          $_SERVER['SERVER_ADDR'],
                          $_SERVER['SERVER_ADDR']
                         );
                         
      $managePort = array(
                          "80", 
                          "443",
                          "8080",
                          "8080"
                         );
                         
      $manageFolder = array(
                          "", 
                          "",
                          "admin/phpMyAdmin-5.1.0"
                          "",
                         );
                         
      
      $this->setManageName ( $manageName );
      $this->setManageProtocol ( $manageProtocol );
      $this->setManageAddress ( $manageAddress ) ;
      $this->setManagePort ( $managePort ) ;
      $this->setManageFolder ( $manageFolder ) ;
      
    }
    
    public function findByNameIndex ( $keyword ) {
      
      $targetIdx = -1;
      $manageName = $this->getManageName () ;
      $lastNum = count ( $manageName );
      
      // ���� ���� ����(N�� Ž��)
      /*  Ž�� �ӵ� ����(n�� Ž���ؾ� ��)
      while ( $index < $lastNum ){
        
        // ã�� ���(Ż��)
        if ( $keyword == $manageName [ $index ] ) {
          
          $targetIdx = $index ;
          break ;
        }
        
        $index++;
      }
      */
      //
      
      // ���� ���� ����(LogN(�α�N))
      // �ؽø�(HashMap)
      if ( $manageName[$keyword] != "" ){
        $targetIdx = $manageName[$keyword];
      }
      
      return $targetIdx;
    
    }
    
    public function getManagePosName ( $index ) {
      // $keys = array_keys($arr);                            // Ű�� - �迭
      // $manageValue = array_values( $this->manageName ) ;   // �迭 �� - �迭
      $manageKeys = array_keys( $this->manageName ) ;
      
      // return $manageValue [ $index ] ; 
      return $manageKeys [ $index ] ; 
    }
        
    public function getManagePosProtocol ( $index ) {
      return $this->manageProtocol [ $index ] ;
    }
    
    public function getManagePosAddress ( $index ) {
      return $this->manageAddress [ $index ] ;
    }
    
    public function getManagePosPort ( $index ) {
      return $this->managePort [ $index ] ;
    }
    
    public function getManagePosFolder ( $index ) {
      return $this->manageFolder [ $index ] ;
    }
    
    public function getManagePosURL ( $index ) {
      return $this->manageURL [ $index ] ;
    }
    
    public function getManageName( ){
      return $this->manageName ;
    }
    
    public function setManageName ( $manageName ) {
      $this->manageName = $manageName ;
    }
    
    public function getManageProtocol ( ) {
      return $this->manageProtocol ; 
    }
    
    public function setManageProtocol ( $manageProtocol ) {
      $this->manageProtocol = $manageProtocol ;
    }
    
    public function getManageAddress ( ) {
      return $this->manageAddress ;
    }
    
    public function setManageAddress ( $manageAddress ) {
      $this->manageAddress = $manageAddress ;
    }
    
    public function getManagePort ( ) {
      return $this->managePort ;
    }
    
    public function setManagePort ( $managePort ) {
      $this->managePort = $managePort ;
    }
    
    public function getManageFolder ( ) {
      return $this->manageFolder ;
    }
    
    public function setManageFolder ( $manageFolder ) {
      $this->manageFolder = $manageFolder ;
    }
    
    public function getManageURL ( ) {
      return $this->manageURL ;
    }
    
    public function setManageURL ( $manageURL ) {
      $this->manageURL = $manageURL ;
    }
  
  }

?>