<script>
var results = null;
$( document ).ready(function() {
	$.ajax({url:"ajax.php", type: "GET", 'data':{current:0}, success: function(result){
		console.log(result);
			 $( ".row .content " ).append("<table class='table'></table>");
			 $(".row .content table").append(" <thead class='thead-dark'><tr><th scope='col'>ID</th><th scope='col'>Datum</th><th scope='col'>Geraet</th></tr></thead>");
				 $(".row .content  table").append("<tbody></tbody>");
			var res = JSON.parse(result);
			results = res;
			for(var i =0; i < res.length;i++){
				$(".row .content table tbody").append("<tr onclick='showresults(" +  i + ");' id='" +  res[i]['cid']+ "'><td>" + res[i]['id'] + "</td><td>" + res[i]['time'] + "</td><td>" + res[i]['name'] + "</td></tr>");
			};
	}});
});
function loadNew(id){
	$.ajax({url:"ajax.php", type: "GET", 'data':{current:id}, success: function(result){
			var res = JSON.parse(result);
			results = res;
			for(var i =0; i < res.length;i++){
				$(".row .content table tbody").append("<tr onclick='showresults(" +  i+ ");'id='" +  res[i]['cid']+ "'><td>" + res[i]['id'] + "</td><td>" + res[i]['time'] + "</td><td>" + res[i]['name'] + "</td></tr>");
			};
	}});
}
 $(window).scroll(function () {
    if ($(document).height() <= $(window).scrollTop() + $(window).height()) {
	//	console.log($('.row .content  table tbody tr:last td:first').html());
	console.log($('.row .content table tbody tr:last'));
       loadNew($('.row .content table tbody tr:last').attr('id'));
    }
 });
function showresults(id){
	$(".fixed-left .viewport textarea").val(results[id]['data']);
	$(".fixed-left .viewport").fadeIn(500).delay(100);
	if(results[id]['plast']){
		$(".fixed-left .viewport .info").html("Vorname: " + results[id]['pfirst'] +  "</br> Nachname:" + results[id]['plast'] + "</br> Tiername: " + results[id]['aname']);
	}else{
		$(".fixed-left .viewport .info").html('<button onclick="openSearch();">Patient eintragen</button>');
	}
}
function openSearch(){
	
	$(".searchbox").fadeIn(500).delay(100);
}
function search(obj){
	openDialog(results);
	console.log($(obj).find("input").val());
	results = [{}]

}
function openDialog(){
	
}
$(document).on('dblclick', function (e) {
	$(".fixed-left .viewport").fadeOut(500);
});
$(document).on('dblclick', function (e) {
	$(".fixed-left .viewport").fadeOut(500);
});
</script> 

<div id="#top"></div>

<div class="searchbox"> 
	<div class="windowTop">
	<i class="fa fa-window-close"  onclick="console.log($(this).parent().parent().fadeOut(300));"></i>
	</div>
	<div class="windowContent">
		<input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search"><button class="btn btn-outline-success my-2 my-sm-0" onclick="search($(this).parent());">Search</button>
	</div>

</div>



<div class="container">
	<div class="row">
		<div class="fixed-left">
			<div class="viewport">
				<div class="row">
					<label for="exampleFormControlTextarea1">Labor-Werte</label>
					<textarea class="form-control rounded-0" id="exampleFormControlTextarea1" rows="10"></textarea>
				</div>
				<div class="row">
					<div class="info"></div>
					*)patientendaten also name, tiername, usw..</br>
					*)wenn patientendaten nicht vorhanden ->button fuer neuer patient anlegen</br>
					*)wenn patientendaten vorhanden 		->button fuer patientendaten aendern</br>
					
				</div>
				
			</div>
		</div>
		<div class="content">
		
		</div>
   </div>		

</div>
