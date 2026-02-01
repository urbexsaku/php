<h2>Contact</h2>

<?php
$form_complete  =null;
 ?>

<form name="contact" method="POST" action="formchallenge.php">
	<div>
		<?php 
			if ( isset( $_POST['name'] ) && empty( trim($_POST['name'] ) ) ) {
			echo "<p class=\"alert\">Name is required</p>";
			$form_complete = false; 
			}
		?>
		<label>Name:<input type="text" name="name" placeholder="Your Name" required/>
	</div>
		<?php 
				$email_regex = '^[\w\.=+]+@[\w\.-]+\.[\w]{2,3}$^';
				if ( isset( $_POST['email'] ) && empty( trim($_POST['email'] ) ) ) {
				echo "<p class=\"alert\">Email is required</p>";
				$form_complete =false;
				} else if ( isset( $_POST['email'] ) && ! preg_match( $email_regex, $_POST['email'] ) ) {
					echo "<p class=\"alert\">Please enter a valid email address</p>";
					$form_complete = false;
				}
			?>
	<div>
		<label>Email:<input type="text" name="email" placeholder="Your Email" required/>
	</div>
	<div>
		<p>Reason for Contact:</p>
		<label><input type="radio" name="reason" id="consult" value="consult" />Consult</label>
		<label><input type="radio" name="reason" id="question" value="question" />Question</label>
		<label><input type="radio" name="reason" id="sayhello" value="sayhello" />Say Hello</label>
	</div>
	<div>
		<p>What topic do you like reading about?</p>
		<label><input type="checkbox" name="topic[]" id="html" value="html">HTML</label>
		<label><input type="checkbox" name="topic[]" id="css" value="css">CSS</label>
		<label><input type="checkbox" name="topic[]" id="php" value="php">PHP</label>
		<label><input type="checkbox" name="topic[]" id="wordpress" value="wordpress">WordPress</label>
	</div>
	<div>
		<p>What's your favorite movie?</p>
		<select name="movie[]" id="movie" multiple>
			<option value="Star Wars I">Star Wars I</option>
			<option value="Star Wars II">Star Wars II</option>
			<option value="Star Wars III">Star Wars III</option>
			<option value="Star Wars IV">Star Wars IV</option>
			<option value="Star Wars V">Star Wars V</option>
			<option value="Star Wars VI">Star Wars VI</option>
			<option value="Star Wars VII">Star Wars VII</option>
	</div>
	<div>
		<input type="submit" name="submit" value="submit"></div>

	<?php
	$form_complete ? : true;
	if ($form_complete){
		foreach( $_POST as $name => $value){
			if ( 'submit' != $name ){ //submitは表示しないようにする
				if ( is_array( $value )){
					$value = implode( ',',$value); //implodeでarrayの場合は','でつなげて表示する
				}
				echo "<p><b>" . ucfirst($name) . "</b> is $value.";
			}
			}
			}
		//ucfirst 最初を大文字にする
		