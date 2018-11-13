$(document).ready(function(){

	
var table_Familylist = $('#table_Familylist').dataTable({
    "ajax": "http://akhilpadmashalisamaj.com/include/familyMemberTree.php?UserId="+userId,
    "columns":  [
	{ "data": "sr_no" },
	{"data":"FL_first_name"},
 { "data": "FL_Relation" },
{ "data": "FL_BirthDate"},
     { "data": "FL_contact_no" },
	{ "data": "FL_emailId" },
	 { "data": "FL_Professional" },
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

  

  
  
  
 });
 
 
 function editFunction(memberId){

 	jQuery.ajax({
         type: "POST",
         url: "http://akhilpadmashalisamaj.com/include/getFamilyMember.php",
         data : {memberId : memberId},
         success: function (data) {
					 var obj = jQuery.parseJSON(data);
					 $('#FL_Id').val(obj.FL_Id);
					 $('#firstname').val(obj.FL_first_name);
					 $('#firstname').focus();
					 $('.w100 select').val(obj.FL_Relation);

					 var birthdate = new Date(obj.FL_BirthDate);
					 $('#txtDOB').val($.datepicker.formatDate('yy-mm-dd', birthdate ));

					 $('#txtMobile').val(obj.FL_contact_no);
					 $('#txtemail').val(obj.FL_emailId);
					 $('#txtProfession').val(obj.FL_Professional);
					 $('.btnAdd').removeClass().addClass('item btnSave');
					 $('.btnSave input[type="submit"]').val('Save');
					 // console.log(obj);
					 // console.log(obj.FL_Id);
       	// window.location.reload();
 		 },
	 	 error:function(){
	 			alert('fail');
	 	 },
	 });
   return false;
 }

 
 function removeFunction(memberId){
var memberName = $('#'+memberId).attr('memberName');
	if(confirm('Are you sure you want to remove?')){
	
   jQuery.ajax({
        type: "POST",
        url: "http://akhilpadmashalisamaj.com/include/familyMemberAction.php",
        data : {memberId : memberId},
        success: function (data) {
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
  