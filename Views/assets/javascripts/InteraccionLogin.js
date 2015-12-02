var init = [];
var pagina;
pagina=$(document);
pagina.ready(initFunctions);


function initFunctions()
{
	ActiveFunctionsSignUp();
	createFormSignUp();
}


function createFormSignUp()
{
	$('#signIn').show();
	$('#signUp').hide();
	$('body').removeClass("page-signup");
	$('body').addClass("page-signin");
	$('#CreateAccount').click(createFormAddAccount);
	$('#signin-form_id').submit(signUpUssers);		
}


function ActiveFunctionsSignUp()
{
// Resize BG
	init = [];
	init.push(function () 
	{
		var $ph  = $('#page-signin-bg');
		var $img = $ph.find('> img');

		$(window).on('resize', function () 
		{
			$img.attr('style', '');
			if ($img.height() < $ph.height()) 
			{
				$img.css(
							{
								height: '100%',
								width: 'auto'
							}
						);
			}
		});
	});

	window.PixelAdmin.start(init);
}


function signUpUssers(event)
{
	event.preventDefault();
    var datos_formulario = $(this).serialize(); 
    
    $.ajax({
                data: datos_formulario,
                type: 'POST',
                dataType: 'json',
                url: 'Controllers/ControllerLogin.php',
                success: function(data)
                {
                    loadUsser(data);
                },
                error: function() 
                {
                    alert('Error al conectar con el servidor');
                }
           });
}


function loadUsser(data)
{
	var datos = data.items;

	if (datos != 'No Existe')
	{
		if (datos == 'Faltan Datos')
		{
			alert("Faltan datos en el formulario de Ingreso");
		}

		else
		{
			$.each(datos, function(index, dato) 
			{
				if (dato.tipo == 'A')
				{		
					window.location = "Views/AdminMarket.php";								
				}					
			})
		}
	}

	else
	{
		alert("El Usuario no existe en el Sistema");
	}

}


function createFormAddAccount()
{
	$('#signIn').hide();
	$('#signUp').show();
	$('body').removeClass("page-signin");
	$('body').addClass("page-signup");
	$('#formSignUp').click(createFormSignUp);
	$('#signup-form_create_account').submit(createUssers);
}


function createUssers(event)
{
	event.preventDefault();
    var datos_formulario = $(this).serialize(); 
    
    $.ajax({
                data: datos_formulario,
                type: 'POST',
                dataType: 'json',
                url: 'Controllers/ControllerLogin.php',
                success: function(data)
                {
                    confirmCreateUsser(data);
                },
                error: function() 
                {
                    alert('Error al conectar con el servidor');
                }
           });
}


function confirmCreateUsser(data)
{
	var datos = data.items;

	if (datos == 'Usuario agregado exitosamente')
	{
		alert(datos);
		createFormSignUp();
	}

	else
	{
		alert(datos);
	}
}



