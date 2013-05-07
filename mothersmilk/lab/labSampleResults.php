<html>
<head>
<script src="//ajax.googleapis.com/ajax/libs/jquery/2.0.0/jquery.min.js"></script>
<script src="lab.js"></script>
</head>
<div>
	<form method="post">
		<div>
		<label>Date Lab Test Completed:</label>
		<input type="text" name="dateLabTestCompleted" placeholder="mm-dd-yyyy">
		</div>
		<div>
			<label>Type of test</label>
			<select name="testType" id="testType">
			<option value="N/A">Select</option>
			<option value="firstTest">First Test</option>
			<option value="reTest">Retest</option>
			</select>
			
		</div>
		<div class="twoColumn" style="display:none">
			<div id = "displayPreviousResult" style="display:none">
				<div>Test</div>
			</div>
			<div id = "editSampleResult">
				<div>
					<label>Enter the CFU per ML </label>
					<select name="type" id="type">
					<option value="N/A">Select</option>
					<option value="pre-pasteurization">pre-pasteurization</option>
					<option value="post-pasteurization">post-pasteurization</option>
					</select>
					<span id="optionalParameter"></span>
				</div>
				<div>
					<label>Baccilles SPP</label>
					<select name="baccillesSPP" id="baccillesSPP">
					<option value="N/A">Select</option>
					<option value="absent">absent</option>
					<option value="present">present</option>
					<option value="pending">pending</option>
					</select>
				</div>
				<div>
					<label>Staphylococcus aureus</label>
					<select name="staphylococcus" id="staphylococcus">
					<option value="N/A">Select</option>
					<option value="absent">absent</option>
					<option value="present">present</option>
					<option value="pending">pending</option>
					</select>
					<span id="methicillin-resistant"></span>
				</div>
				<div>
					<label>Need Retest</label>
					<select name="retest" id="retest">
					<option value="N/A">Select</option>
					<option value="yes">yes</option>
					<option value="no">no</option>
					</select>
					<span id="retestOptionalInput"></span>
				</div>
				<div>

						<label>Result</label>
						<select name="result" id="result">
						<option value="N/A">Select</option>
						<option value="cleared">cleared</option>
						<option value="quarantined">quarantined</option>
						<option value="research">research</option>
						<option value="destroy">destroy</option>
						</select>

					<span>
						<label>Date</label>
						<input type="int" name="monthRetest" placeholder="mm" maxlength="2" size="2">
						<input type="int" name="dayRetest" placeholder="dd" maxlength="2" size="2">
						<input type="int" name="yearRetest" placeholder="yyyy" maxlength="4" size="4">
					</span>
				</div>
			</div>
		</div>
	</form>
</div>
</html>