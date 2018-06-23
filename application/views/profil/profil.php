<div class="tabbable">
	<ul class="nav nav-tabs" id="myTab">
		<li class="active">
			<a data-toggle="tab" href="#profil">
				<i class="red icon-user bigger-110"></i>
				Profile
			</a>
		</li>
		<li >
			<a data-toggle="tab" href="#foto">
				<i class="red icon-camera bigger-110"></i>
				Foto
			</a>
		</li>
		<li >
			<a data-toggle="tab" href="#password">
				<i class="red icon-key bigger-110"></i>
				Password
			</a>
		</li>
	</ul>

	<div class="tab-content" style="margin-top: 1px;">
		<div id="profil" class="tab-pane in active">
			<?php $this->load->view('profil/form_profil');  ?>	
		</div>
	
		<div id="foto" class="tab-pane ">
			<?php $this->load->view('profil/form_foto');  ?>
		</div>
		
		<div id="password" class="tab-pane ">
			<?php $this->load->view('profil/form_pwd');  ?>
		</div>
	</div>

</div>