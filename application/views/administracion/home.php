			
			<?php if ($this->session->flashdata('norole')): ?>
				<div class="alert alert-warning">
					<?=$this->session->flashdata('norole')?>
				</div>
			<?php endif ?>
			<div class="card top">
			  <div class="card-body">
			    This is some text within a card body.
			  </div>
			</div>
		</div>
	</div>
		
	</section>

<script src="<?=base_url()?>assets/js/jquery-3.3.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js" integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ" crossorigin="anonymous"></script>
<script src="<?=base_url()?>assets/js/bootstrap.min.js"></script>
</body>	
</html>

