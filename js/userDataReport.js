$(document).ready(function(){

	$('#selAction').on('change',function(){
    var  actionurl = $('#selAction :selected').val();
   // alert(actionurl);
	  // table_Familylist.ajax.url( 'http://akhilpadmashalisamaj.com/akhil_padmashali/include/usersReport.php?action='+action ).load();
	  loadDatatable(actionurl);
						 });
	
  loadDatatable("Activation");

});

  function loadDatatable(action){
    //  table_Familylist.destroy();
	  var ajaxUrl = 'http://akhilpadmashalisamaj.com/include/usersReport.php?action='+action ;
	
var table_Familylist = $('#table_Familylist').dataTable({
    destroy: true,
    "ajax": ajaxUrl,
    "columns":  [
	{ "data": "sr_no" },
	{"data":"FullName"},
 { "data": "tat" },
{ "data": "contact_no"},
     { "data": "emailId" },
	{ "data": "UT_Name" },
	 { "data": "N_RequestFor" },
	{ "data": "action" }
     ],
    "aoColumnDefs": [
      { "bSortable": false, "aTargets": [-1] }
    ],
    "lengthMenu": [[10, 25, 50, 100, -1], [10, 25, 50, 100, "All"]],
    "oLanguage": {
      "oPaginate": {
        "sFirst":       " ",
        "sPrevious":    " ",
        "sNext":        " ",
        "sLast":        " ",
      },
	  
      "sLengthMenu":    "Records per page: _MENU_",
      "sInfo":          "Total of _TOTAL_ records (showing _START_ to _END_)",
      "sInfoFiltered":  "(filtered from _MAX_ total records)"
    }
	/*"dom": 'lBfrtip',
		 "buttons": [
            {
                extend: 'collection',
                text: 'Export',
                buttons: [
                    'excel',
                    'pdf',
                     ]
            }
        ]
		*/
		
  });
  
   
	  
  }
  
  
 
 
 function editFunction(id,usertype){
	 	if(usertype == 3)
				{
				window.location.href="nonapstm.php?userId="+id;	
				}
				else if(usertype == 2)
				{
					window.location.href="edit_registration.php?userId="+id;	
				}
				else if(usertype == 4)
				{
					window.location.href="other.php?userId="+id;	
				}
	 
	 
 }
 
 function removeFunction(id){
	 var memberName = $('#remove_'+id).attr('memberName');
	 if(confirm('Are you sure you want to remove "'+memberName+'"')){
	
   jQuery.ajax({
        type: "POST",
        url: "include/userReportAction.php",
        data : {memberId : id,mode:'remove'},
		beforeSend: function() { 
			$("#loading").show();  
				},	
        success: function (data) {
		$("#loading").hide();	
      	window.location.reload();
		 },
		error:function(){
			alert('fail');
		},
                    
    });        
    return false;
	}else{
		
	}
	 
	 
 }
 
 function DeactiveFunction(id){
     	 var memberName = $('#deactive_'+id).attr('memberName');
	 if(confirm('Are you sure you want to deactive '+memberName)){
	
   jQuery.ajax({
        type: "POST",
        url: "include/userReportAction.php",
        data : {memberId : id,mode:'deactive'},
        success: function (data) {
      	window.location.reload();
      //	table_Familylist.ajax.reload( null, false ); 
		 },
		error:function(){
			alert('fail');
		},
                    
    });        
    return false;
	}else{
		
	}
     
 }
 
 function AllowFunction(id){
			jQuery.ajax({			
			type: "POST",			
			url:"include/acceptNotification.php",				
			data: {NotifuserId:id,correctMobile:'',Accept:'0'},				
			dataType: "json",	
			beforeSend: function() { 
			$("#loading").show();  
				},				
			success: function (data) { 	
		$("#loading").hide();			
			alert("Mobile number change successfully.");
setTimeout(function(){window.location.reload();},3000)	;					
			},			
			error:function(){					
			alert('fail');				
			},										
			});        			
			
	}
	
	
	function ActiveFunction(id){
		var memberName = $('#active_'+id).attr('memberName');
	   jQuery.ajax({
        type: "POST",
        url: "include/userReportAction.php",
        data : {memberId : id,mode:'active'},
		beforeSend: function() { 
			$("#loading").show();  
				},	
        success: function (data) {
		$("#loading").hide();
			alert(memberName+" activated successfully");
      	window.location.reload();
		 },
		error:function(){
			alert('fail');
		},
                    
    });        
    return false;
	}
	
