<!DOCTYPE HTML>
<html>
<head>
	<title>Attendance Report</title>
	
	<link rel="stylesheet" type="text/css" href="css/ivory.css" media="all">
	
	
	<link href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8/themes/base/jquery-ui.css" rel="stylesheet" type="text/css"/>
	<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.6.2/jquery.min.js"></script>
	<script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8/jquery-ui.min.js"></script>
	<!-- For Date picker only -->
	<link href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8/themes/base/jquery-ui.css" rel="stylesheet" type="text/css"/>
	<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.6.2/jquery.min.js"></script>
	<script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8/jquery-ui.min.js"></script>
	
	<!--<script type="text/javascript" language="javascript" src="TableFilter/tablefilter.js"></script>  -->
	<script type="text/javascript" language="javascript" src="TableFilter/tablefilter_all.js"></script>
	<script type="text/javascript" language="javascript" src="TableFilter/tablefilter_all.min.js"></script>  
	<!-- For Date picker only -->
	
	<script>
	  $(document).ready(function() {
	    
	     $("#datepicker1").datepicker({ dateFormat: "yy-mm-dd"});
		$("#datepicker2").datepicker({ dateFormat: "yy-mm-dd"});
	  });
	</script>
		<style type="text/css">
		 #maintable td.orange {color: #ff9933;}
		#maintable td.blue {color:#00F;}

		</style>
	<style>
		.content{width: 100%; height: auto; background-color: #EBEAE8; padding: 30px 12px;}
	.note {
		background-color: #ffffff; 
		padding: 10px 0; 
		color: #333333; 
				border-radius:5px; 
		   -moz-border-radius:5px; 
		-webkit-border-radius:5px;
				box-shadow: 0 1px 1px 0 rgba(0, 0, 0, 0.2);
	       -moz-box-shadow: 0 1px 1px 0 rgba(0, 0, 0, 0.2);
		-webkit-box-shadow: 0 1px 1px 0 rgba(0, 0, 0, 0.2);
	}

	
	button:active { background-color: fuchsia; }
	
	.hidden 
	{
   		 border: none;
   		 visibility: hidden;
	}
	
	
	 #round-image
	 {
   		border-radius: 100%;
   		-o-border-radius: 100%;
   		-webkit-border-radius: 100%;
   		-moz-border-radius: 100%;
	}
	</style>
	
<!--	<script language="javascript" type="text/javascript">  -->
<!--    //<![CDATA[-->
<!--        -->
<!--        var table4_Props =  {-->
<!--		 paging: true,  -->
<!--                    paging_length: 3,  -->
<!--                    rows_counter: true,  -->
<!--                    rows_counter_text: "Rows:",  -->
<!--                    btn_reset: true,  -->
<!--                    loader: true,  -->
<!--                    loader_text: "Filtering data..."  ,-->
<!--                    col_0: "select",  -->
<!--                        on_change: false,  -->
<!--                        btn: true,  -->
<!--                        enter_key: false-->
<!--		-->
<!--		-->
<!--			-->
<!--                    }  -->
<!--        var tf4 = setFilterGrid( "table1",table4_Props );  -->
<!--    //]]>  -->
<!--    </script>-->
	

	<script language="javascript" type="text/javascript">  
    //<![CDATA[  
        var table6_Props =  {  
                        paging: true,  
                        paging_length: 3,  
                        rows_counter: true,  
                        rows_counter_text: "Rows:",
			btn_reset: true,  
                        loader: true,  
                        loader_text: "Filtering data..."  
                    };  
        var tf6 = setFilterGrid( "table1",table6_Props );
	
    //]]>  
    </script>  
	
	<script type="text/javascript">
    	function noBack() 
	{
		 window.history.forward(); 
	}
   	noBack();
   	window.onload = noBack;
   	window.onpageshow = function (evt) { if (evt.persisted) noBack(); }
   	window.onunload = function () { void (0); }
	</script>	

	
	
	
	<!--<script language="javascript" type="text/javascript">  -->
	<!--	var tf = setFilterGrid("table1");-->
	<!--	-->
	<!--</script>-->
	
<!--	    <script language="javascript" type="text/javascript">  -->
<!--    //<![CDATA[  -->
<!--        var table9_Props = {  -->
<!--                        paging: true,  -->
<!--                        paging_length: 1,  -->
<!--                        results_per_page: ['# rows per page',[1,2,3]],-->
<!--			rows_counter: true,  -->
<!--                        rows_counter_text: "Rows:",  -->
<!--                        btn_reset: true,  -->
<!--                        btn_next_page_html: '<a href="javascript:;" style="margin:3px;">Next ></a>',  -->
<!--                        btn_prev_page_html: '<a href="javascript:;" style="margin:3px;">< Previous</a>',  -->
<!--                        btn_last_page_html: '<a href="javascript:;" style="margin:3px;"> Last >|</a>',  -->
<!--                        btn_first_page_html: '<a href="javascript:;" style="margin:3px;"><| First</a>',  -->
<!--                        loader: true,  -->
<!--                        loader_html: '<h4 style="color:red;">Loading, please wait...</h4>'  -->
<!--                    };  -->
<!--        var tf9 = setFilterGrid( "table1",table9_Props );  -->
<!--    //]]>  -->
<!--    </script>-->
	    
	<script language="javascript" type="text/javascript">  
		var tf = setFilterGrid("table1");
	</script>

</head>
<body>
<?php
	include('config.php');
?>
<form name="form_update" method="post" action="">	
	<div class="row">
		<h1 class="text-center"> Attendance Details</h1>
	</div>
	<div class="content">
	<p align="left"><a href="viewadmin.php" >Back</a>
	
	<a href="logout.php"><button type="button" style="float:right;" class="magenta" onclick="logout.php">logout</button></a>
	
	<a style="float:right;" href="report.php">Refresh&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</a>
	
        <div class="row space-bot">
<?php
$con=mysqli_connect("localhost","root","root123","db_aakash_attendance");
// Check connection
$i=0;
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: ". mysqli_connect_error();
  }
else
{	
$sql =mysqli_query($con,"SELECT uname FROM tb_user");

$num_rows = mysqli_num_rows($sql);?>

<!-- <label><b>NAME</b></label> -->
<?php
if($numrow =='0')
{
    echo "No results found.";
}
else
{
?>	
	<!--<table style="border:hidden">-->
	<tr>
	<td>
<?php	
	echo "<select name= 'selectvar'>";
	echo '<option value="" >'.'--- Please Select Person ---'.'</option>';

	while($info = mysqli_fetch_array($sql))                                                     
	{
   	echo '<option value="'.$info['uname'].'">'.$info['uname'].'</option>';
   	$i++;
	}
	echo '</select>';
	?>
	
<?php 
}	

}
?>
	
	
	<input type="text" name= "ip1" id="datepicker1" placeholder="From" />
	<input type="text" name= "ip2" id="datepicker2" placeholder="To" />
	
	<button type="submit" class ="magenta" value ="time" name= "timer" id="time">Check Now! </button></td>
	</tr>
	
	<!--</table>-->

	<hr>
<?php 

$f_usr=$_POST["selectvar"];
$f_usr1=$_POST["ip1"];
$f_usr2=$_POST["ip2"];
$j=1;
  echo $f_usr;

// Working with curdate

if ($f_usr == "" && $f_usr1 == "" && $f_usr2 == "")
{
echo "Today's Attendance";

$sql =mysqli_query($con,"SELECT uname,att_date,att_check_in,att_check_out,att_diff,att_status FROM tb_attendance t1,tb_user t2 WHERE t1.att_date = curDate() AND t2.uid=t1.att_uid ");

}
elseif($f_usr1 == "" && $f_usr2 == "")
{
	//echo "Today Attendance with particular name.";
$sql =mysqli_query($con,"SELECT uname,att_date,att_check_in,att_check_out,att_diff,att_status FROM tb_attendance t1,tb_user t2 WHERE uname='$f_usr' AND t2.uid=t1.att_uid AND t1.att_date = curDate()");
}
elseif($f_usr2 == "" && $f_usr!="" && $f_usr1!="" )
{
	//echo "Particular name attendance on particular date";
$sql =mysqli_query($con,"SELECT uname,att_date,att_check_in,att_check_out,att_diff,att_status FROM tb_attendance t1,tb_user t2 WHERE uname='$f_usr' AND t2.uid=t1.att_uid AND att_date ='$f_usr1'");
}
elseif($f_usr1 == "" && $f_usr!="" && $f_usr2!="" )
{
	//echo "Particular name attendance on particular date";
$sql =mysqli_query($con,"SELECT uname,att_date,att_check_in,att_check_out,att_diff,att_status FROM tb_attendance t1,tb_user t2 WHERE uname='$f_usr' AND t2.uid=t1.att_uid AND att_date ='$f_usr2'");
}
elseif($f_usr == "" && $f_usr2 == "")
{
//echo "Particular Date Attendance ";
$sql =mysqli_query($con,"SELECT uname,att_date,att_check_in,att_check_out,att_diff,att_status FROM tb_attendance t1,tb_user t2 WHERE att_date ='$f_usr1' AND t1.att_uid=t2.uid ");
}
elseif($f_usr == "")
{
//echo "From and to Date specified ";
$sql =mysqli_query($con,"SELECT uname,att_date,att_check_in,att_check_out,att_diff,att_status FROM tb_attendance t1,tb_user t2 WHERE t1.att_uid=t2.uid AND t1.att_date BETWEEN '$f_usr1' AND '$f_usr2'");
}
else
{
//echo "final.";
$sql =mysqli_query($con,"SELECT uname,att_date,att_check_in,att_check_out,att_diff,att_status FROM tb_attendance t1,tb_user t2 WHERE uname='$f_usr' AND t1.att_uid=t2.uid AND t1.att_date BETWEEN '$f_usr1' AND '$f_usr2'");
}
$num_rows = mysqli_num_rows($sql);

if($numrow == '0')
{
    echo "No results found.";
}
else

{

?>
	</br>
	</br>
	<table id="table1" cellspacing="0" class="mytable filterable" >  
	<tr><th><b>Sr No</b></th><th><b>Name</b></th><th><b>Date</b></th><th ><b>Check-In</b></th><th><b>Check-Out</b></th>
	<th><b>Difference</b></th></tr>

	
	
<?php
	

	while($info = mysqli_fetch_array($sql))                                                     
	{
   ?>
	<tr>
	<td align="center" > <?php echo "$j" ?> </td>
	<td align="center" > <?php echo $info['uname']; ?> </td>
	<td align="center" > <?php echo $info['att_date']; ?> </td>
	<td align="center" > <?php echo $info['att_check_in']; ?> </td>
	<td align="center" > <?php echo $info['att_check_out']; ?> </td>
	<td align="center" class = "warning"> <?php echo $info['att_diff']; ?> </td>
<?php	echo'<td><a href="editnewindividual.php?uname='. $info['uname'] .' & att_date='.$info['att_date'].' & att_check_in='.$info['att_check_in'].' & att_check_out='.$info['att_check_out'].' & att_diff='.$info['att_diff'].'">Edit</a></td><td><a href="delete_report.php?uname='. $info['uname'].' & att_date='.$info['att_date'].' & att_check_in='.$info['att_check_in'].' & att_check_out='.$info['att_check_out'].' & att_diff='.$info['att_diff'].'" onclick="return confirm(\'Are you sure you want to delete?\')">Delete</a></td>';
?>
	</tr> 
	<?php 
   	$j++;

	}
	?></table>
	

<?php	
	
}	
?> 
</div>
</div>	
</form>
</body>
</html>