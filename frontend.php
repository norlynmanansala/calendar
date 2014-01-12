<html>
<head>
	<title>Calendar</title>
	<style type="text/css">
	body, select{font-size: 20px;}
	</style>
</head>
<body>

Year:
<select id = "year" name = "years">
		<?php
		for($i =1990; $i <= 2014; $i++):?>
			<option value = "<?= $i ?>"><?= $i?></option>
		<?php endfor ?>
</select>


Month:
<select id="month" name="month">
	<option value = "jan">January</option>
	<option value = "feb">February</option>
	<option value = "mar">March</option>
	<option value = "apr">April</option>
	<option value = "may">May</option>
	<option value = "june">June</option>
	<option value = "july">July</option>
	<option value = "aug">August</option>
	<option value = "sep">September</option>
	<option value = "oct">October</option>
	<option value = "nov">November</option>
	<option value = "dec">December</option>
</select>

Days:
<select id = "day">
		<?php
		for($i = 1; $i <= 31; $i++): ?>
			<option value = "<?= $i ?>"><?= $i?></option>
		<?php endfor ?>
</select>


<script type="text/javascript" src="jquery.1.10.2.js"></script>
<script type="text/javascript">
	$(document).ready(function(){
		var month = $('#month').val();
		var year = $('#year').val();
		$('#year').on('change', function() {
			year = $('#year').val();
			$.ajax({
				url: 'days.php',
				data: {year: year},
				dataType: 'JSON',
				method: 'GET',
				success: function(response) {
					var day = response.day;
					var str = '';
					for (i = 1; i <= day; i++) {
						str += '<option value="' + i +'">';
						str += i;
						str += '</option>';
					}
					$('#day').html(str);
					
				}
			});
		});
		
		$('#month').on('change', function() {
			month = $('#month').val();
			$.ajax({
				url: 'years.php',
				data: {year: year, month: month},
				dataType: 'JSON',
				method: 'GET',
				success: function(response) {
					var day = response.day;
					var str = '';
					for (i = 1; i <= day; i++) {
						str += '<option value="' + i +'">';
						str += i;
						str += '</option>';
					}
					$('#day').html(str);
					
				}
			});
		});

	});
	</script>
</body>
</html>