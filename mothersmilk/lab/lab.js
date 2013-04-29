$(document).ready(function(){
	
	//alert("test");
	addSelectBoxBaseOnType();
	addSelectBoxIfStaphylococcusPresent();
	addInputFieldForRetest();
});
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
	//alert("test");
	$('#staphylococcus').change(function() {
		
		var selectVal = $('select#staphylococcus').val();
		
		$('#methicillin-resistant').html('');
		if (selectVal === 'present') 
			{
			//alert(selectVal);
                
			var form =
				'<label>Methicillin-resistant Staphylococcus Aureus</label>'
				+ '<select id="MRSA" name = "MRSA">'
				+ '<option value="N/A">Select</option>'
				+ '<option value="absent">absent</option>'
				+ '<option value="present">present</option>'
				+ '<option value="pending">pending</option>'
				+ '</select>';

			$('#methicillin-resistant').append(form);
            }
	});
};
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