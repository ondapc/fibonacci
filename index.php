<?php
require_once('functions.php');
$fib = (isset($_REQUEST['f']) && $_REQUEST['f']) ? $_REQUEST['f'] : '20';
// Lets make sure we aren't getting stuffed :-P
if ( !is_numeric($fib) || $fib>100 ) { $fib = "2"; }	
?>
<!DOCTYPE html>
<html>
<head>
<meta http-equiv="content-type" content="text/html; charset=UTF-8">
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="format-detection" content="address=no,email=no,telephone=no">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
<title>Fibonacci Series - Multiple PHP Functions</title>
<!-- CDN CSS -->
<link rel="stylesheet" href="//cdn.datatables.net/1.10.12/css/jquery.dataTables.min.css"><!-- DataTables CSS -->
<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css"><!-- BootStrap CSS -->
<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css"><!-- fontawesome minified CSS -->
<!-- CDN JS -->
<script type="text/javascript" language="javascript" src="//code.jquery.com/jquery-1.12.3.js"></script><!-- jQuery JS -->
<script type="text/javascript" language="javascript" src="//cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script><!-- DataTables JS-->
<script type="text/javascript" language="javascript" src="//netdna.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script><!-- Bootstrap JS -->
</head>
<body>
<div style="padding:15px;">

<p>The Fibonacci Number <b><?php echo $fib; ?></b> corresponds to the number <b><?php echo getFibonacciNumber($fib);?></b></p>

<div class="dropdown">
  <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown">Fibonacci <span class="caret"></span></button>
  <ul class="dropdown-menu">
	 <?php
	 for ($i=1; $i<=30; $i++ ) {
		echo '<li><a href="?f='.$i.'">'.$i.'</a></li>'; 
	 }
	 ?>
  </ul>
</div> 	

<br/>
<p>The following functions generate the same fibonacci sequence with varying optimizations.</p>
<br/>

<div class="row">
	<div class="col-md-4">
		<?php
		echo '<pre>';
		print_r(fibonacci_series_v02($fib));
		echo '</pre>';
		?>
		<code style="font-size:10px;">
			<span style="color: #000000; font-weight: bold;">&lt;?php</span><br>
			<span style="color: #808080; font-style: italic;">// V2 FIBONACCI - FIND THE Nth FIBONACCI NUMBER SERIES</span><br>
			<span style="color: #000000; font-weight: bold;">function</span> fibonacci_series_v02<span style="color: #66cc66;">(</span><span style="color: #0000ff;">$n</span><span style="color: #66cc66;">)</span> <span style="color: #66cc66;">{</span><br>
			&nbsp; &nbsp; &nbsp; &nbsp; <span style="color: #0000ff;">$f1</span> = <span style="color: #cc66cc;">-1</span>;<br>
			&nbsp; &nbsp; &nbsp; &nbsp; <span style="color: #0000ff;">$f2</span> = <span style="color: #cc66cc;">1</span>;<br>
			&nbsp; &nbsp; &nbsp; &nbsp; <span style="color: #0000ff;">$res</span> = <a href="http://php.ondapc.com/?q=array"><span style="color: #000066;">array</span></a><span style="color: #66cc66;">(</span><span style="color: #66cc66;">)</span>;<br>
			&nbsp; &nbsp; &nbsp; &nbsp; <span style="color: #b1b100;">for</span> <span style="color: #66cc66;">(</span><span style="color: #0000ff;">$i</span> = <span style="color: #cc66cc;">0</span>; <span style="color: #0000ff;">$i</span> &lt;= <span style="color: #0000ff;">$n</span>; <span style="color: #0000ff;">$i</span>++<span style="color: #66cc66;">)</span> <span style="color: #66cc66;">{</span><br>
			&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; <span style="color: #0000ff;">$f</span> = <span style="color: #0000ff;">$f1</span> + <span style="color: #0000ff;">$f2</span>;<br>
			&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; <span style="color: #0000ff;">$f1</span> = <span style="color: #0000ff;">$f2</span>;<br>
			&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; <span style="color: #0000ff;">$f2</span> = <span style="color: #0000ff;">$f</span>;<br>
			&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; <span style="color: #0000ff;">$res</span><span style="color: #66cc66;">[</span><span style="color: #66cc66;">]</span> = <span style="color: #0000ff;">$f</span>; <br>
			&nbsp; &nbsp; &nbsp; &nbsp; <span style="color: #66cc66;">}</span><br>
			&nbsp; &nbsp; &nbsp; &nbsp; <span style="color: #b1b100;">return</span> <span style="color: #0000ff;">$res</span>;<br>
			<span style="color: #66cc66;">}</span><br>
			<span style="color: #000000; font-weight: bold;">?&gt;</span>
		</code>		
	</div>
	<div class="col-md-4">
		<?php
		echo '<pre>';
		print_r(fibonacci_series_v03($fib));
		echo '</pre>';
		?>
		<code style="font-size:10px;">
			<span style="color: #000000; font-weight: bold;">&lt;?php</span><br>
			<span style="color: #808080; font-style: italic;">// V3 FIBONACCI - FIND THE Nth FIBONACCI NUMBER SERIES</span><br>
			<span style="color: #000000; font-weight: bold;">function</span> fibonacci_series_v03<span style="color: #66cc66;">(</span><span style="color: #0000ff;">$pos</span><span style="color: #66cc66;">)</span><span style="color: #66cc66;">{</span><br>
			&nbsp; &nbsp; &nbsp; &nbsp; <span style="color: #0000ff;">$fibarray</span> = <a href="http://php.ondapc.com/?q=array"><span style="color: #000066;">array</span></a><span style="color: #66cc66;">(</span><span style="color: #cc66cc;">0</span>, <span style="color: #cc66cc;">1</span><span style="color: #66cc66;">)</span>;<br>
			&nbsp; &nbsp; &nbsp; &nbsp; <span style="color: #b1b100;">for</span> <span style="color: #66cc66;">(</span> <span style="color: #0000ff;">$i</span>=<span style="color: #cc66cc;">2</span>; <span style="color: #0000ff;">$i</span>&lt;=<span style="color: #0000ff;">$pos</span>; ++<span style="color: #0000ff;">$i</span> <span style="color: #66cc66;">)</span> <span style="color: #66cc66;">{</span><br>
			&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; <span style="color: #0000ff;">$fibarray</span><span style="color: #66cc66;">[</span><span style="color: #0000ff;">$i</span><span style="color: #66cc66;">]</span> = <span style="color: #0000ff;">$fibarray</span><span style="color: #66cc66;">[</span><span style="color: #0000ff;">$i</span><span style="color: #cc66cc;">-1</span><span style="color: #66cc66;">]</span> + <span style="color: #0000ff;">$fibarray</span><span style="color: #66cc66;">[</span><span style="color: #0000ff;">$i</span><span style="color: #cc66cc;">-2</span><span style="color: #66cc66;">]</span>;<br>
			&nbsp; &nbsp; &nbsp; &nbsp; <span style="color: #66cc66;">}</span><br>
			&nbsp; &nbsp; &nbsp; &nbsp; <span style="color: #b1b100;">return</span> <span style="color: #0000ff;">$fibarray</span>;<br>
			<span style="color: #66cc66;">}</span><br>
			<span style="color: #000000; font-weight: bold;">?&gt;</span>
		</code>		
	</div>
	<div class="col-md-4">
		<?php
		echo '<pre>';
		print_r(fibonacci_series_v04($fib));
		echo '</pre>';
		?>
		<code style="font-size:10px;">
			<span style="color: #000000; font-weight: bold;">&lt;?php</span><br>
			<span style="color: #808080; font-style: italic;">// V4 FIBONACCI - FIND THE Nth FIBONACCI NUMBER SERIES</span><br>
			<span style="color: #000000; font-weight: bold;">function</span> fibonacci_series_v04<span style="color: #66cc66;">(</span><span style="color: #0000ff;">$n</span><span style="color: #66cc66;">)</span> <span style="color: #66cc66;">{</span>&nbsp; &nbsp; &nbsp;<br>
			&nbsp; &nbsp; &nbsp; &nbsp; <span style="color: #0000ff;">$fib</span> = <a href="http://php.ondapc.com/?q=array"><span style="color: #000066;">array</span></a><span style="color: #66cc66;">(</span><span style="color: #cc66cc;">0</span>,<span style="color: #cc66cc;">1</span><span style="color: #66cc66;">)</span>;<br>
			&nbsp; &nbsp; &nbsp; &nbsp; <span style="color: #b1b100;">for</span><span style="color: #66cc66;">(</span><span style="color: #0000ff;">$i</span> = <span style="color: #cc66cc;">1</span>; <span style="color: #0000ff;">$i</span> &lt; <span style="color: #0000ff;">$n</span>; <span style="color: #0000ff;">$i</span>++<span style="color: #66cc66;">)</span> <span style="color: #66cc66;">{</span><br>
			&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; <span style="color: #0000ff;">$fib</span><span style="color: #66cc66;">[</span><span style="color: #66cc66;">]</span> = <a href="http://php.ondapc.com/?q=array_sum"><span style="color: #000066;">array_sum</span></a><span style="color: #66cc66;">(</span><a href="http://php.ondapc.com/?q=array_slice"><span style="color: #000066;">array_slice</span></a><span style="color: #66cc66;">(</span><span style="color: #0000ff;">$fib</span>, <span style="color: #cc66cc;">-2</span><span style="color: #66cc66;">)</span><span style="color: #66cc66;">)</span>;<br>
			&nbsp; &nbsp; &nbsp; &nbsp; <span style="color: #66cc66;">}</span><br>
			&nbsp; &nbsp; &nbsp; &nbsp; <span style="color: #b1b100;">return</span> <span style="color: #0000ff;">$fib</span>;<br>
			<span style="color: #66cc66;">}</span><br>
			<span style="color: #000000; font-weight: bold;">?&gt;</span>
		</code>		
	</div>	
</div>

</div>
</body>
</html>
