$(document).ready(function(){
    
    var table_Familylist = $('#table_vadhuvarulalist').dataTable({
        "ajax": "http://akhilpadmashalisamaj.com/include/vaduvarulalist.php?UserId="+userId,
        "columns":  [
            { "data": "sr_no" },
            { "data": "V_name"},
            { "data": "V_EmailId" },
            { "data": "V_Mobile"},
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
    });
});
     
     
function editFunction(memberId){
    window.location.href = 'http://akhilpadmashalisamaj.com/vadhuVarulaEdit.php?vid=' + memberId;
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
      