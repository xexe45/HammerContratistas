			
			<div class="card top">
			  <div class="card-body">
                <h5 class="card-title text-center">Historial</h5>
                <button type="button" id="btn-historial" class="btn btn-primary btn-block">Ver Historial</button>
                <table id="table" 
		                data-sort-name="v1"
		                data-sort-order="desc"
		                data-search="true"
		                data-pagination="true"               
		                data-page-size="10"
		                data-page-list="[5,8,10]"
		                data-pagination-first-text="Primero"
		                data-pagination-pre-text="Anterior"
		                data-pagination-next-text="Siguiente"
		                data-pagination-last-text="Último">
		                  <thead>
		                    <tr>
		                      <!--<th data-field="state" data-radio="true"></th>-->
		                      <th data-field="v1">ID</th>
		                      <th data-field="v2">TIPO</th>
		                      <th data-field="v3">SLUG</th>
		                      <th data-field="v4">DESCRIPCIÓN</th>
		                      <th data-field="v5">USUARIO_ID</th>
		                      <th data-field="v6">USUARIO</th>
		                      <th data-field="v7">FECHA</th>
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
<script src="<?=base_url()?>assets/js/sistema.js"></script>
<script type="text/javascript">
	$(document).ready(function() {
    	ruta ='<?= base_url()?>';  
    	ejecutar();
  	});
</script>
</body>	
</html>

