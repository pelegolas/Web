//OK
<?php
 	class Cliente{
		private $nome;
		private $email;
		private $dataCadastro;
		
		public function __construct($nome, $email, $dataCadastro){
				$this->setNome($nome);
				$this->setDataCadastro($dataCadastro);
				$this->setEmail($email);
		}
		public function getNome(){
			return $this->nome;
		}
		public function setNome($nome){
			return $this->nome = $nome;
		}
		public function getDataCadastro(){
			return $this->dataCadastro;
		}
		public function setDataCadastro($dataCadastro){
			$data = explode('/',$dataCadastro);
			$this->dataCadastro = "$data[2]-$data[1]-$data[0]";
		}
		public function getEmail(){
			return $this->email;
		}	
		public function setEmail($email){
			return $this->email = $email;
		}
	}
?>
//dataNasc => dataCadastro
