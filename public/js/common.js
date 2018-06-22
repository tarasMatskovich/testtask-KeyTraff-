

	$("#first-tab").click(function(event){
		if($(this).data('executed') == false) {
			$.ajax({
			  url: '/first-task.php',
			  dataType:"json",
			  success: function(data) {
				var str = '';
				for(var key in data) {
					str += "<tr><th scope='row'>"+data[key].id+"</th><td>"+data[key].name+"</td><td>"+data[key].price+"</td><td>"+data[key].count+"</td><td>"+data[key].fio+"</td></tr>";
				}
				$('#first-table').html(str);
			  },
			  error: function(error) {
			  	alert('Ошибка');
			  	
			  }
			});
			$(this).data('executed',true);
		}
		
	});

	$("#second-tab").click(function(event){
		if($(this).data('executed') == false) {
			$.ajax({
			  url: '/second-task.php',
			  dataType:"json",
			  success: function(data) {
			    var str = '';
			    for(var key in data) {
			    	var group = key;
			    	str += "<tr><th>"+group+"</th></tr>";
			    	var count = 0;
			    	var sum = 0;
			    	for(var k in data[key]) {
			    		str += "<tr><th>"+data[key][k].id+"</th><td>"+data[key][k].name+"</td><td>"+data[key][k].count+"</td><td>"+data[key][k].price+"</td></tr>";
			    		count += Number(data[key][k].count);
			    		sum += Number(data[key][k].price);
			    	}
			    	str += "<tr><td></td><td></td><td>"+count+"</td><td>"+sum+"</td></tr>";
			    }
			    $('#second-table').html(str);
			  },
			  error: function(error) {
			  	alert('Ошибка');
			  	
			  }
			});
			$(this).data('executed',true);
		}
		
});


