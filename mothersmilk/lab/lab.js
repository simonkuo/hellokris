$(document).ready(function(){
	
	//alert("test");
	addSelectBoxBaseOnType();
	addSelectBoxIfStaphylococcusPresent();
	displayMRSASelectBoxIfStaphylococcusPresent();
	addTypeValue();
	
});
//Display type of test
function displayTypeOfTest()
{

	$('#testType').change(function() {
		
		var selectVal = $('select#testType').val();
		if (selectVal !== 'N/A')
		{
			$('.twoColumn').fadeIn();
			if (selectVal === 'reTest')
			{
				$('#displayPreviousResult').fadeIn();
				$('#displayPreviousResult').css({
					"float": "left",
					"width":"500px"
					});
				$('#editSampleResult').css({
					"float": "left",
					"width":"500px"
					});
			}
			else if (selectVal === 'firstTest')
			{
				$('#displayPreviousResult').fadeOut();
			}

		}
		if (selectVal === 'N/A')
		{
			$('.twoColumn').fadeOut();
		
		}
		
	});
};
//Add search for indidual of type
function addTypeValue()
{
	
	$('#outstanding').change(function() {
		
		var selectVal = $('select#outstanding').val();
		//alert(selectVal);
		$('#optionalType').html('');
		if (selectVal === 'no') 
			{
			
                
			var form =
				'<label>Type</label>'
				+ '<select id="type" name = "type">'
				+ '<option value="package">package</option>'
				+ '<option value="bluePool">bluePool</option>'
				+ '<option value="batch">batch</option>'
				+ '</select>'
				+ '<input type="text" name="sampleId">';

			$('#optionalType').append(form);
            }
		else if (selectVal === 'yes')
		{
			var form =
				'<label>Type</label>'
				+ '<select id="type" name = "type">'
				+ '<option value="all">all</option>'
				+ '<option value="package">package</option>'
				+ '<option value="bluePool">bluePool</option>'
				+ '<option value="batch">batch</option>'
				+ '</select>';
			$('#optionalType').append(form);
		}
		
	});
};
//Add select box for pre-pasteurization or post-pasteurization
function addSelectBoxBaseOnType()
{
	//alert("test");
	$('#type').change(function() {
		//var selectVal = $('#type:selected').val();
		var selectVal = $('select#type').val();
		//alert(selectVal);
		$('#optionalParameter').html('');
		if (selectVal === 'pre-pasteurization') 
			{
			//alert(selectVal);
                
			var form =
				'<label>value</label>'
				+ '<select id="valueOfPrepasteuriztion" name = "valueOfPrepasteuriztion">'
				+ '<option value="smallerOrEqualTenThousand"> < or = 10,000</option>'
				+ '<option value="fromTenThousandToFiftyThousand">10,000 to 50,000</option>'
				+ '<option value="fromFiftyThousandToHundredThousand">50,000 to 100,000</option>'
				+ '<option value="largerThanHundredThousand"> > 100,000</option>'
				+ '</select>';

			$('#optionalParameter').append(form);
            }
		else if  (selectVal === 'post-pasteurization')
		{
			var form =
				'<label>value</label>'
				+ '<select id="valueOfPostpasteuriztion" name = "valueOfPostpasteuriztion">'
				+ '<option value="smallerThanOne"> < 1</option>'
				+ '<option value="fromOneToFour">1 to < 5</option>'
				+ '<option value="fromFiveToTen">5 to 10</option>'
				+ '<option value="largerThanTen"> > 10</option>'
				+ '</select>';

			$('#optionalParameter').append(form);
		}
	});
};

//Add select box when staphylococcus is present
function addSelectBoxIfStaphylococcusPresent()
{
	
	$('#methicillin-resistant').css({
					"display": "none",
					"visibility":"hidden"
					});
	$('#staphylococcus').change(function() {
		
		var selectVal = $('select#staphylococcus').val();
		
		
		if (selectVal === 'present') 
			{
		
				$('#methicillin-resistant').css({
						"display": "block",
						"visibility":"visible"
				});
            }
		else
			{
				$('#methicillin-resistant').css({
					"display": "none",
					"visibility":"hidden"
					});
			}

	});
};
function displayMRSASelectBoxIfStaphylococcusPresent()
{
	var selectVal = $('select#staphylococcus').val();
		
		
		if (selectVal === 'present') 
			{
		
				$('#methicillin-resistant').css({
						"display": "block",
						"visibility":"visible"
				});
            }
}
function addInputFieldForRetest()
{
	$('#retest').change(function() {
		
		var selectVal = $('select#retest').val();
		
		$('#retestOptionalInput').html('');
		if (selectVal === 'yes') 
			{
			
                
			var form =
				'<label>Batch number:</label>'
				+ '<input type="text" name="retestBatchNumber">'
				+ '<label>Batch number</label>'
				+ '<label>Date:</label>'
				+ '<input type="int" name="monthRetest" placeholder="mm" maxlength="2" size="2">'
				+ '<input type="int" name="dayRetest" placeholder="dd" maxlength="2" size="2">'
				+ '<input type="int" name="yearRetest" placeholder="yyyy" maxlength="4" size="4">';

			$('#retestOptionalInput').append(form);
            }
	});
}