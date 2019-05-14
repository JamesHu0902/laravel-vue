<!DOCTYPE html>
<html>
 <head>
  <title>Upload Image in Laravel using Ajax</title>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/vue@2.6.10/dist/vue.js"></script>
  <style>
    #alert
    {
      position: fixed;
      right: 5%;
      top: 5%;
    }
  </style>
 </head>
 <body >
  <br />
  <div class="container">
   <h3 align="center">Upload Image in Laravel using Ajax</h3>
   <br />
   <div id="alert">
   </div>
   <form method="post" id="upload_form" enctype="multipart/form-data">
    {{ csrf_field() }}
    <div class="form-group">
     <table class="table">
      <tr>
       <td width="40%" align="right"><label>Select File for Upload</label></td>
       <td width="30">
         <input type="file" name="select_file" id="select_file"  accept=".pdf"/>
      </td>
       <td width="30%" align="left">
           <input type="submit" name="upload" id="upload" class="btn btn-primary" value="Upload" >
        </td>
      </tr>
      <tr>
      </tr>
     </table>
    </div>
   </form>
   <br />
    <div id="app">
      <span id="uploaded_image"></span>
      <ol id="list" >
        {{-- <li v-for="item in data">@{{item.name}}</li> --}}
      </ol>
    </div>
  </div>
 </body>
</html>
{{-- <script>
var app = new Vue({
  el:'#app',
  data:{
    name:'123',
    message:'321',
  },
  method:{
    getlist()
    {
      const vm =this;
      const url = `${process.env.APIPATH}/api/${process.env.CUSTOMPATH}/products`;  //api
      vm.isLoading = true;
      this.$http.get(url).then((response) => {
          vm.products = response.data.products;
          console.log('獲取products');
          vm.isLoading = false;
      });
    },
  },
  created(){
    // const vm = this;
    // this.getlist();
  }
})
</script> --}}

<script>
$(function(){
  var x = 0;

$('#upload_form').on('submit', function(event){
  event.preventDefault();
  $.ajax({
    url:"{{ route('ajaxupload.action') }}",
    method:"POST",
    data:new FormData(this),
    dataType:'JSON',
    contentType: false,
    cache: false,
    processData: false,
    success:function(data)
    {
        $('#alert').append('<div class="alert '+data.class_name+'" id="'+data.randnumber+'"  style="display: none;">'+data.message+'</div>');
        $('#'+data.randnumber).fadeIn();
        $('#list').append(data.uplist);
        console.log(data); 
        setTimeout(function()  {
          $('#'+data.randnumber).fadeOut();
        },3000);
    }  
  })
});

});
</script>