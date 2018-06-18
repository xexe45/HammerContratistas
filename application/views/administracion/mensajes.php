
			<div class="card top-bottom">
			  <div class="card-body">
			  	<div id="toolbar">
            		<button id="button" class="btn btn-success"><i class="fa fa-check-square-o" aria-hidden="true"></i> Marcar como visto</button>
        		</div>
			    <table id="table"
						
		                data-sort-name="v1"
		                data-sort-order="desc"
		                data-search="true"
		                data-click-to-select="true"
		                data-pagination="true"               
		                data-page-size="5"
		                data-page-list="[5,8,10]"
		                data-pagination-first-text="Primero"
		                data-pagination-pre-text="Anterior"
		                data-pagination-next-text="Siguiente"
		                data-pagination-last-text="Último">
		                  <thead>
		                    <tr>
		                      <!--<th data-field="state" data-radio="true"></th>-->
		                       <th data-field="state" data-checkbox="true"></th>
		                      <th data-field="v1">ID</th>
		                      <th data-field="v2">Nombre</th>
		                      
		                      <th data-field="v3">Teléfono</th>
		                      <th data-field="v4">Correo</th>
		                      <th data-field="v5">Mensaje</th>
		                      <th data-field="v6">Fecha de envio</th>
		                      <th data-field="v7" data-formatter="estadoFormatter">Estado</th>
		                    </tr>
		                  </thead>
		                </table>
			  </div>
			</div>
		</div>
	</div>
		
	</section>

<script src="<?=base_url()?>assets/js/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js" integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ" crossorigin="anonymous"></script>
<script src="<?=base_url()?>assets/js/bootstrap.min.js"></script>
<script src="<?=base_url()?>assets/btable/bootstrap-table.min.js"></script>
<script src="<?=base_url()?>assets/js/sweetalert2.all.js"></script>
<script src="<?=base_url()?>assets/js/contacto.js"></script>

</body>	
</html>

