<!--

@include '../../include/dbconn.php';

$dbc = connect_to_db('mitchko');
$var = perform_query_select($dbc, 'SELECT CONV(ORD(zones),10,2) AS Movement, motionTime AS `Time` FROM mitchko.motionHistory WHERE NOT (zones=b\'0000\') ORDER BY `motionTime` DESC;',array());
print json_encode($var);


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>AntiTickler Security</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <script src="js/jquery-2.2.1.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.dynatable.js"></script>
    <script src="js/main.js"></script>
    <link href="css/main.css" rel="stylesheet">
    <link href="css/jquery.dynatable.css" rel="stylesheet">
	
	<div class = dropdownn>
		<ul class="nav nav-tabs">
			<li role="presentation" class="dropdown">
				<a class="dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
					<h3>Services <span class="caret"></span> </h3>
    </a>
    	<ul class="dropdown-menu">
			<li><a href = "test.html">Home</a></li>
			<li><a href ="login.html">Login</a></li>
			<li><a href ="quote.html">Get a Quote</a></li>
			<li><a href ="help.html">Get Help</a></li>
    	</ul>
  </li>
</ul>
	</div>
</head>
<body>
	<h1>Anti-Tickler Security</h1>
	<p>
	Lorem ipsum dolor sit amet, ne errem persius hendrerit pri, cu facilis eligendi indoctum pro, pro at fugit viris equidem. Ipsum numquam his in. Id mutat explicari mel, ea erroribus dissentiet vituperatoribus eam. Ea diam ceteros suscipit quo, vel ut percipit percipitur. Et duo maluisset constituam, quo putent erroribus ea. Eam cu scripta vulputate.

Quo iriure voluptatibus ut, quo magna dignissim id. Mutat laudem an sed. Ceteros ancillae nominavi per an, mea dicta oportere postulant ex. Nam et case reprimique, ad reque deleniti pro. Eam decore dolorum et, vero soleat omittam sit ne. Usu solum utamur et.

Commodo atomorum delicatissimi ad vis. Velit ubique graece in eam, alterum aliquando repudiandae an pro. Atomorum iracundia ad vel, lorem possim fastidii ea has. Sea quis putent aliquip et. Fugit timeam epicurei ex nec, ei illud quaeque comprehensam vel. Usu et cibo contentiones.

In vix numquam delectus, laudem deleniti qualisque no cum. Nullam latine sit in, ius pericula dignissim efficiendi ne, illum lorem interpretaris cum eu. At essent alterum bonorum vim. Nam audire impetus vituperata no, duo partem adversarium complectitur in. Dicit inermis id qui, at autem docendi voluptatum eos, ne vel vitae laoreet. Vidit iisque praesent sea no, pro at alii nemore feugiat. Deleniti appareat persequeris has ex.

Eos at tota ancillae, at laudem nostrum est. Vix id mollis consectetuer. Liber errem graecis sea ad, in pro suas saperet. In nam movet necessitatibus, gubergren consetetur ea per. An mea illum tractatos.</p>
</body>-->
