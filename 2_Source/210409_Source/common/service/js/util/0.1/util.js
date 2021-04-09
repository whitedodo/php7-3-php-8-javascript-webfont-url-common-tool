/*
	주제(Subject): Common Delivery Network (공통 서비스 배포)
	파일명(FileName): cdn_service.js
	작성자(Author): 도도(Dodo)
	작성년월일: 2021-04-07
	비고(Description):

*/

function copiespaste(targetID) {

	var obj = document.getElementById(targetID);
	obj.select(); //인풋 컨트롤의 내용 전체 선택
	document.execCommand("copy"); //복사
	obj.setSelectionRange(0, 0); //커서 위치 초기화	

}