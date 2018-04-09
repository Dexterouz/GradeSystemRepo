<div class="container">
	<div class="main">
		<form style="overflow-x: auto;" action="OutputGrade.php" method="post">
			<table class="table input">
				<tr>
					<th>Course Code</th>
					<th>Unit Load</th>
					<th>Grade</th>
				</tr>
				<?php
				for ($i=1; $i <=7; $i++) { 
					echo "<tr>";
					for ($j=1; $j <=1; $j++) { 
						echo "<td><input type=\"text\" name=\"courseCode[$i]\" id=\"courseCode\" placeholder=\"Enter Course Code\"></td>";
					echo"<td>
						<select name=\"uload[$i]\">
							<option value=\"\">--Select--</option>
							<option value=\"1\">1</option>
							<option value=\"2\">2</option>
							<option value=\"3\">3</option>
							<option value=\"4\">4</option>
							<option value=\"5\">5</option>
						</select>
					</td>
					<td>
						<select name=\"grade[$i]\">
							<option value=\"\">--Select--</option>
							<option value=\"A\">A</option>
							<option value=\"B\">B</option>
							<option value=\"C\">C</option>
							<option value=\"D\">D</option>
							<option value=\"F\">F</option>
						</select>
					</td>";
					}
					echo "</tr>";
				}		
				?>
				<tr>
					<td><input type="submit" name="submit" id="submitgrd" value="Submit Grade"></td>
				</tr>
			</table>
		</form>
	</div>
</div>
				