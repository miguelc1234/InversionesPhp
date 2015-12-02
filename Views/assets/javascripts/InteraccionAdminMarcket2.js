var init = [];
var pagina;

pagina=$(document);
pagina.ready(initFunctions);

function initFunctions()
{
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
	var chtml = 	'<div class="panel">'+
						'<div class="panel-heading">'+
							'<span class="panel-title">Productos Mercamas</span>'+
							'<div class="panel-heading-controls">'+
								'<button class="btn btn-labeled btn-danger"><span class="btn-label icon fa fa-plus-square"></span>Adicionar</button>'+
							'</div>'+
						'</div>'+
						'<div class="panel-body">'+
							'<div class="table-primary">'+
								'<table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered" id="jq-datatables-example">'+
									'<thead>'+
										'<tr>'+
											'<th>#</th>'+
											'<th>Codigo</th>'+
											'<th>Nombre</th>'+
											'<th>Precio</th>'+
											'<th>Cantidad</th>'+
											'<th><i class="btn-label icon fa fa-cog"></i>&nbsp;&nbsp;Aministrar</th>'+
										'</tr>'+
									'</thead>'+
									'<tbody>'+
										'<tr>'+
											'<td>1</td>'+
											'<td>7707188184807</td>'+
											'<td>Cuaderno Norma</td>'+
											'<td>2000</td>'+
											'<td>100</td>'+
											'<td>'+
												'<div class="btn-group">'+
													'<button type="button" class="btn dropdown-toggle btn-danger" data-toggle="dropdown"><i class="btn-label icon fa fa-pencil"></i>&nbsp;&nbsp;Editar&nbsp;&nbsp;<i class="fa fa-caret-down"></i></button>'+
													'<ul class="dropdown-menu">'+
														'<li><a href="#"><i class="btn-label icon fa fa-search-plus"></i>&nbsp;&nbsp;Visualizar</a></li>'+
														'<li><a href="#"><i class="btn-label icon fa fa-trash-o"></i>&nbsp;&nbsp;Borrar</a></li>'+
													'</ul>'+
												'</div>'+
											'</td>'+
										'</tr>'+
										'<tr>'+
											'<td>2</td>'+
											'<td>7777188184807</td>'+
											'<td>Chocolisto</td>'+
											'<td>12000</td>'+
											'<td>150</td>'+
											'<td>'+
												'<div class="btn-group">'+
													'<button type="button" class="btn dropdown-toggle btn-danger" data-toggle="dropdown"><i class="btn-label icon fa fa-pencil"></i>&nbsp;&nbsp;Editar&nbsp;&nbsp;<i class="fa fa-caret-down"></i></button>'+
													'<ul class="dropdown-menu">'+
														'<li><a href="#"><i class="btn-label icon fa fa-search-plus"></i>&nbsp;&nbsp;Visualizar</a></li>'+
														'<li><a href="#"><i class="btn-label icon fa fa-trash-o"></i>&nbsp;&nbsp;Borrar</a></li>'+
													'</ul>'+
												'</div>'+
											'</td>'+
										'</tr>'+
									'</tbody>'+
								'</table>'+
							'</div>'+
						'</div>'+
					'</div>';
	
	$('#content-wrapper').html(chtml);
	activeFunctionsTableProducts();
}

function activeFunctionsTableProducts()
{
	init = [];
	init.push(function () 
	{
		$('#jq-datatables-example').dataTable();
		$('#jq-datatables-example_wrapper .table-caption').text('Listado de Productos');
		$('#jq-datatables-example_wrapper .dataTables_filter input').attr('placeholder', 'Search...');
		//$('#jq-datatables-example').columnFilter();
	});

	window.PixelAdmin.start(init);
}

function loadTableSales()
{
	var chtml = 	'<div class="panel">'+
						'<div class="panel-heading">'+
							'<span class="panel-title">Ventas Mercamas</span>'+
						'</div>'+
						'<div class="panel-body">'+
							'<div class="table-primary">'+
								'<table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered" id="jq-datatables-sales">'+
									'<thead>'+
										'<tr>'+
											'<th>#</th>'+
											'<th>Nombre</th>'+
											'<th>Fecha</th>'+
											'<th>Total</th>'+
											'<th><i class="btn-label icon fa fa-cog"></i>&nbsp;&nbsp;Detalles</th>'+
										'</tr>'+
									'</thead>'+
									'<tbody>'+
										'<tr>'+
											'<td>1</td>'+
											'<td>Carlos Andrés Jaramillo</td>'+
											'<td>15/07/2015</td>'+
											'<td>320000</td>'+
											'<td>'+
												'<div class="btn-group">'+
													'<button type="button" class="btn btn-labeled btn-danger"><i class="btn-label icon fa fa-search-plus"></i>&nbsp;&nbsp;Visualizar&nbsp;&nbsp;</button>'+
												'</div>'+
											'</td>'+
										'</tr>'+
									'</tbody>'+
								'</table>'+
							'</div>'+
						'</div>'+
					'</div>';
	
	$('#content-wrapper').html(chtml);
	activeFunctionsTableSales();
}

function activeFunctionsTableSales()
{
	init = [];
	init.push(function () 
	{
		$('#jq-datatables-sales').dataTable();
		$('#jq-datatables-sales_wrapper .table-caption').text('Listado de Ventas');
		$('#jq-datatables-sales_wrapper .dataTables_filter input').attr('placeholder', 'Search...');
		$('#jq-datatables-sales').columnFilter();
	});

	window.PixelAdmin.start(init);
}

function loadGraphStatistics()
{
	var chtml = '<div class="panel panel-default panel-dark">'+
					'<div class="panel-heading">'+
						'<span class="panel-title">Estadistica de Ventas Mensuales</span>'+
						'<div class="panel-heading-controls">'+
							'<div class="panel-heading-icon"><i class="fa fa-bar-chart-o"></i></div>'+
						'</div>'+
					'</div>'+
					'<div class="panel-body">'+
						'<div class="stat-panel">'+
							'<div class="stat-row">'+
								'<!-- Small horizontal padding, bordered, without right border, top aligned text -->'+
								'<div class="stat-cell col-sm-4 padding-sm-hr bordered no-border-r valign-top">'+
									'<!-- Small padding, without top padding, extra small horizontal padding -->'+
									'<h4 class="padding-sm no-padding-t padding-xs-hr"><i class="fa fa-cloud-upload text-primary"></i>&nbsp;&nbsp;Uploads</h4>'+
									'<!-- Without margin -->'+
									'<ul class="list-group no-margin">'+
										'<!-- Without left and right borders, extra small horizontal padding, without background, no border radius -->'+
										'<li class="list-group-item no-border-hr padding-xs-hr no-bg no-border-radius">'+
											'Documents <span class="label label-pa-purple pull-right">34</span>'+
										'</li> <!-- / .list-group-item -->'+
										'<!-- Without left and right borders, extra small horizontal padding, without background -->'+
										'<li class="list-group-item no-border-hr padding-xs-hr no-bg">'+
											'Audio <span class="label label-danger pull-right">128</span>'+
										'</li> <!-- / .list-group-item -->'+
										'<!-- Without left and right borders, without bottom border, extra small horizontal padding, without background -->'+
										'<li class="list-group-item no-border-hr no-border-b padding-xs-hr no-bg">'+
											'Videos <span class="label label-success pull-right">12</span>'+
										'</li> <!-- / .list-group-item -->'+
									'</ul>'+
								'</div> <!-- /.stat-cell -->'+
								'<!-- Primary background, small padding, vertically centered text -->'+
								'<div class="stat-cell col-sm-8 bg-primary padding-sm valign-middle">'+
									'<div id="hero-graph" class="graph" style="height: 230px;"></div>'+
								'</div>'+
							'</div>'+
						'</div> <!-- /.stat-panel -->'+
					'</div>'+
				'</div>';

	$('#content-wrapper').html(chtml);
	activeFunctionsGraphics();
}

function activeFunctionsAdminMarket()
{
	init = [];
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
		Morris.Line({
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
			xLabelFormat: function(d) {
				return ['Jan','Feb','Mar','Apr','May','Jun','Jul','Aug','Sep','Oct','Nov', 'Dec'][d.getMonth()] + ' ' + d.getDate(); 
			},
		});
	});

	window.PixelAdmin.start(init);
}



