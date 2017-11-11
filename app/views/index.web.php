<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Image Management App</title>

	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

	<!-- Optional theme -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>

  	<nav class="navbar navbar-default">
	  <div class="container-fluid">
	    <!-- Brand and toggle get grouped for better mobile display -->
	    <div class="navbar-header">
	      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
	        <span class="sr-only">Toggle navigation</span>
	        <span class="icon-bar"></span>
	        <span class="icon-bar"></span>
	        <span class="icon-bar"></span>
	      </button>
	      <a class="navbar-brand" href="#">Image Management App</a>
	    </div>
	    
	</nav>

	<div id="root" class="container">
		<h1>Main screen</h1>

		<form method="post" action=" /app/web/index.php" >
		  <div class="form-group">
		    <label for="exampleInputEmail1">Count of images</label>
		    <input type="number" class="form-control" v-model="count" placeholder="count">
		  </div>
		  <div class="form-group">
		    <label for="exampleInputEmail1">Alias list</label>
		    <input type="text" class="form-control"  v-model="alias" placeholder="Alias List">
		  </div>
		  
		  <button type="button" id="button" v-on:click="getInfo" v-bind:disabled="!isValid" class="btn btn-default">Submit</button>
		</form>
		<hr>
		<br>

		<div id="table" >
			<table class="table" >
				<thead>
					<th>URL</th>
					<th>Height</th>
					<th>Width</th>
				</thead>
				<tbody>

					<tr v-for="item in list">
						<td> {{item.url}}</td>
						<td>{{item.height}} px</td>
						<td>{{item.width}} px</td>
					</tr>

				</tr>
				</tbody>
			
			</table>

			
			<span v-model="found"> Images found: {{found}}</span>
		</div>
	</div>
		

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/vue/1.0.28/vue.min.js"></script>

	<script>

		//If you want to activate development mode for Vue just remove comment bellow

		//Vue.config.devtools = true;

		Vue.use(VeeValidate); 

		var app = new Vue({
			el: "#root",
			data: function(){
				return {
					list: [],
					count: 0,
					alias: "",
					found: 0,
					process: false
				}
			},
			computed: {
			    isValid: function () {
					return this.alias != '' && this.count > 0
				}
			},
			methods: {
				getInfo: function(){
					var self = this
					$.ajax({
					  type: "POST",
					  url: "http://localhost:8000/index.php?c=main&a=process",
					  data: {
					  	count: this.count,
					  	alias : this.alias
					  },
					  success: function (response){

					  	self.list = response.data
					  	
					  	self.found = response.count
					  },
					  dataType: 'json'
					});
				},
				checkForm: function(){
					return (this.alias != "")? true : false ;
					//this.process = (this.count != "0" )? true: false;
				}
			} 

		});
		
	</script>
	
</body>
</html>