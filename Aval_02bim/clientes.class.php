<!--Pedro Barbosa e Edgard Alexandre-->
<?php
 	class Clientes{
		private $nomeCliente;
		private $email;
		private $dataCadastro;
		
		public function __construct($nomeCliente, $dataCadastro, $email){
				$this->setnomeCliente($nomeCliente);
				$this->setDataCadastro($dataCadastro);
				$this->setemail($email);
		}
		public function getnomeCliente(){
			return $this->nomeCliente;
		}
		public function setnomeCliente($nomeCliente){
			return $this->nomeCliente = $nomeCliente;
		}
		public function getdataCadastro(){
			return $this->dataCadastro;
		}
		public function setdataCadastro($dataCadastro){
			$data = explode('/',$dataCadastro);
			$this->dataCadastro = "$data[2]-$data[1]-$data[0]";
		}
		public function getemail(){
			return $this->email;
		}	
		public function setemail($email){
			return $this->email = $email;
		}
	}
	
?>
