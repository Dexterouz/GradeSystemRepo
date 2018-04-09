<?php 
if (isset($_POST['submit'])) {
	if (isset($_POST['courseCode[$i]'])) {
		for ($i=1; $i < 3; $i++) { 
			for ($j=1; $j < 1; $j++) { 
				$_POST['courseCode[$i]'];
			}
		}
	}

	if (isset($_POST['uload[$i]'])) {
		for ($i=1; $i < 3; $i++) { 
			for ($j=1; $j < 1; $j++) { 
				$_POST['uload[$i]'];
			}
		}
	}

	if (isset($_POST['grade[$i]'])) {
		for ($i=1; $i < 3; $i++) { 
			for ($j=1; $j < 1; $j++) { 
				$_POST['grade[$i]'];
			}
		}
	}

	$display_block = "
	for ($i=1; $i <=3; $i++) { 
					echo '<tr>';
					for ($j=1; $j <=1; $j++) { 
					echo \"<td>\";
						 $_POST['courseCode[$i]'];
					echo \"</td>\";
					echo\"<td>\";
						 $_POST['uload[$i]'];
					echo \"</td>\";

					echo \"<td>\";
						$_POST['grade[$i]'];
					echo \"</td>\";
					}
					echo \"</tr>\";
				} ";
}
 ?>

<div class="container">
	<div class="main">
		<form style="overflow-x: auto;" action="" method="post">
			<table class="table input">
				<tr>
					<th>Course Code</th>
					<th>Unit Load</th>
					<th>Grade</th>
				</tr>
				<?php echo $display_block; ?>
				<!--<?php
				/*for ($i=1; $i <=3; $i++) { 
					echo "<tr>";
					for ($j=1; $j <=1; $j++) { 
					echo "<td>";
						 $_POST['courseCode[$i]'];
					echo "</td>";
					echo"<td>";
						 $_POST['uload[$i]'];
					echo "</td>";

					echo "<td>";
						$_POST['grade[$i]'];
					echo "</td>";
					}
					echo "</tr>";*/
				}		
				?>-->
				<tr>
					<td><input type="submit" name="submitgrd" id="submitgrd" value="Submit Grade"></td>
				</tr>
			</table>
		</form>
	</div>
</div>