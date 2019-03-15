var dummyContent = $('.dummy-content').children(),
			i;


		$('#add-content').click(function(e){
			e.preventDefault();

			if($(dummyContent[0]).is(":visible")){
				for(i=0;i<dummyContent.length;i++){
					$(dummyContent[i]).fadeOut(600);
				}
			}
			else{
				for(i=0;i<dummyContent.length;i++){
					$(dummyContent[i]).delay(600*i).fadeIn(600);
				}
			}

		});

