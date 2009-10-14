
function updateVisitTimes(id){
$(document).ready(function(){
        	$.get("http://localhost/CS2102_Website/classifier/midman/auto_increase_visit_times.php?id="+id);}
             );
}