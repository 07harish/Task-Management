<head>
<script>
	function myfunction() {
	alert("logged out");
	}
</script>
<style>

	@import "https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css";
* {
  margin:0px;
  padding:0px;
  box-sizing:border-box;
}
.navbar {
  position:fixed;
  top:0px;
  left:0px;
  width:100px;
  height:100vh;
  background:#484848;
  display:flex;
  flex-direction:column;
}
	
@media screen and (mid-width:500px){
		 position:fixed;
  top:0px;
  left:0px;
  width:100px;
  height:90vh;
  background:#484848;
  display:flex;
  flex-direction:column;

	}
.navbar .item {
  flex:1;
  text-align:center;
  display:flex;
  justify-content:center;
  flex-direction:column;
}
.navbar .item div.fa {
  font-size:25px;
  color:#eee;
  transition:all 100ms ease;
}
.navbar .item div.label {
  color:#ffffff;
  position:relative;
  top:5px;
  font-size:14px;
  font-family:"cursive";
  transition:all 300ms cubic-bezier(0.68,-0.55,0.27,1.55);
  left:-100px;
}
.navbar:hover .item .label {
  left:0px;
	
}
.navbar:hover .item:nth-child(1) div.fa {
  color:#e65d61;
}
.navbar:hover .item:nth-child(2) div.fa {
  color:#e86def;
}
.navbar:hover .item:nth-child(3) div.fa {
  color:#79e69d;
}
.navbar:hover .item:nth-child(4) div.fa {
  color:#55acee;
}
.navbar:hover .item:nth-child(5) div.fa {
  color:#a67aff;
}
.navbar:hover .item:nth-child(6) div.fa {
  color:#dcd946;
}
	a:link {
    text-decoration: none;
}

	a:active {
		background-color: red;
	}
	body {
		background-color: 	#888888;
	}
	</style>
</head>
<body>
<div class="navbar">
  <div class="item" >
	  <a href="https://www.facebook.com/TaskBucket/">
    <div class="fa fa-user"></div>
		  <div class="label">Home</div></a>
  </div>
  <div class="item">
	<a href="user_profile.php">
    <div class="fa fa-picture-o"></div>
		<div class="label">Profile</div></a>
  </div>
  <div class="item">
	<a href="dashboard.php">
    <div class="fa fa-map"></div>
		<div class="label">DashBoard</div></a>
  </div>
  <div class="item">
	 <a href="message.php">
    <div class="fa fa-bell"></div>
		 <div class="label">Notifications</div></a>
  </div>
  <div class="item">
	 <a href="../search.php">
    <div class="fa fa-search"></div>
		 <div class="label">Search</div></a>
  </div>
  <div class="item">
	 <a onclick="myfunction()" href="modules/logout.php">  
    <div class="fa fa-power-off"></div>
		 <div class="label">Logout</div></a>
  </div>

</div>
