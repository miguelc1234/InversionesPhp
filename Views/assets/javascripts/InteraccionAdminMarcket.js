var init = [];
var pagina;

pagina=$(document);
pagina.ready(initFunctions);

function initFunctions()
{
	activeFunctionsAdminMarket();
	loadTableProducts();
	$('#products').click(loadTableProducts);
	$('#sales').click(loadTableSales);
	$('#statisticsMonth').click(loadGraphStatistics);
}

/*function requestTableProducts()
{
    var peticion= {"op":"loadTableProducts"}; 
    
    $.ajax({
                data: peticion,
                type: 'POST',
                dataType: 'json',
                url: 'Controllers/ControllerAdminMarcket.php',
                success: function(jsonObj)
                {
                    loadTableProducts(jsonObj);
                },
                error: function() 
                {
                    alert('Error al conectar con el servidor');
                }
           });
}*/

function loadTableProducts()
{
	$('#content-wrapper1').show();
	$('#content-wrapper2').hide();
	$('#content-wrapper3').hide();
}

function loadTableSales()
{
	$('#content-wrapper2').show();
	$('#content-wrapper1').hide();
	$('#content-wrapper3').hide();
}

function loadGraphStatistics()
{
	$('#content-wrapper3').show();
	$('#content-wrapper1').hide();
	$('#content-wrapper2').hide();
}

function activeFunctionsAdminMarket()
{
	init.push(function () 
	{
		$('#jq-datatables-products').dataTable();
		$('#jq-datatables-products_wrapper .table-caption').text('Listado de Productos');
		$('#jq-datatables-products_wrapper .dataTables_filter input').attr('placeholder', 'Search...');
	});

	init.push(function () 
	{
		$('#jq-datatables-sales').dataTable();
		$('#jq-datatables-sales_wrapper .table-caption').text('Listado de Ventas');
		$('#jq-datatables-sales_wrapper .dataTables_filter input').attr('placeholder', 'Search...');
	});

	init.push(function () 
	{
		var uploads_data = [
								{ day: '2014-03-10', v: 20 },
								{ day: '2014-03-11', v: 10 },
								{ day: '2014-03-12', v: 15 },
								{ day: '2014-03-13', v: 12 },
								{ day: '2014-03-14', v: 5  },
								{ day: '2014-03-15', v: 5  },
								{ day: '2014-03-16', v: 20 }
						   ];

		Morris.Line(
						{
							element: 'hero-graph',
							data: uploads_data,
							xkey: 'day',
							ykeys: ['v'],
							labels: ['Value'],
							lineColors: ['#fff'],
							lineWidth: 2,
							pointSize: 4,
							gridLineColor: 'rgba(255,255,255,.5)',
							resize: true,
							gridTextColor: '#fff',
							xLabels: "day",
							xLabelFormat: function(d) 
							{
								return ['Jan','Feb','Mar','Apr','May','Jun','Jul','Aug','Sep','Oct','Nov', 'Dec'][d.getMonth()] + ' ' + d.getDate(); 
							},
						}
					);
	});

	window.PixelAdmin.start(init);
}



