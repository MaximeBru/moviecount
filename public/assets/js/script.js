$(document).ready (function(){

/*ajouter un film template normal*/

 		function addNewFilm(title,img,resume){
 			$('#newFilm').append(''+
			'<article>'+
			'<img class="responsive-img" src="https://image.tmdb.org/t/p/w300_and_h450_bestv2'+ img +'" alt="">'+
			'<h3>'+ title +'</h3>'+	
			'<a href="#"><i class="fa fa-check-square-o" aria-hidden="true"></i></a>'+
			'<a href="#"><i class="fa fa-eye" aria-hidden="true"></i></a>'+
			'</article>'
			);
 		};

 		function addNewFilm2(title,img,resume){
 			$('#newFilm2').append(''+
			'<article>'+
			'<img class="responsive-img" src="https://image.tmdb.org/t/p/w300_and_h450_bestv2'+ img +'" alt="">'+	
			'<h3>'+ title +'</h3>'+
			'<a href="#"><i class="fa fa-check-square-o" aria-hidden="true"></i></a>'+
			'<a href="#"><i class="fa fa-eye" aria-hidden="true"></i></a>'+
			'</article>'
			);
 		};

/*function addNewFilm3(title,img,resume,id){
 			$('#filmVideo').append(''+
			'<article class="col s2">'+
			'<h3>'+ title +'</h3>'+
			'<video src="http://api.themoviedb.org/3//movie/'+ id +'?language=fr&api_key=a2992ed9d3f8b932cc90a57972f676dc">'+ title +'</video>'+	
			'<a href="#">bouton j\'ai vu</a>'+
			'<a href="#">bouton a voir</a>'+
			'</article>'
			);
 		};*/

$.ajax({

			//url:'http://api.themoviedb.org/3/discover/movie?language=fr&api_key=a2992ed9d3f8b932cc90a57972f676dc',
			url:'http://moviecount.net/api/?language=fr&api_key=a2992ed9d3f8b932cc90a57972f676dc',
			type:'GET',
			dataType: 'json',

			success: function(data){
				console.log(data);
				for(i=0; i<5;i++){
					console.log(data.results[i]);

					addNewFilm(data.results[i].title,data.results[i].poster_path,data.results[i].overview);
					addNewFilm2(data.results[i].title,data.results[i].poster_path,data.results[i].overview);
					/*addNewFilm3(data.results[i].title,data.results[i].poster_path,data.results[i].overview,data.results[i].id);*/
					
			}

				
			},
			error:function(status){

			},
			complete:function(){

			}

		});













});