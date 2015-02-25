<script type="text/javascript">
  //WHEN DOCUMENT READY
  $(document).ready(function(){ 
    lattestStatus();//LOAD LATTEST UPDATES
    setInterval(function(){showUpdatedStatus();},5000);//LOAD LATTEST UPDATES EVERY 20 seconds    
  });

  //write comment
  function writecomment(x){ //x=is id status : y = id siswa : z = id guru
    comment = $('#writecomment'+x).val();
        $('.comments'+x).html();
    //insert to database
    $.ajax({
      url:'http://192.168.1.160/project/2014/SMAN01DEPOKBABARSARI-SOCIAL/all/addcomment?idsiswa=8&idguru=&idpost='+x+'&comment='+comment,
      success:function(){
        getCommentById(x);
      },
      error:function(){
        alert('error add comment');
      },
    });
    $('#writecomment'+x).val()='';
  }
</script>