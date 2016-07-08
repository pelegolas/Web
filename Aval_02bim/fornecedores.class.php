<!--Pedro Barbosa e Edgard Alexandre-->
<?php
 	class Fornecedores{
		private $nomeFornecedor;
		private $email;
		private $dataFundacao;
		
		public function __construct($nomeFornecedor, $dataFundacao, $email){
				$this->setnomeFornecedor($nomeFornecedor);
				$this->setdataFundacao($dataFundacao);
				$this->setemail($email);
		}
		public function getnomeFornecedor(){
			return $this->nomeFornecedor;
		}
		public function setnomeFornecedor($nomeFornecedor){
			return $this->nomeFornecedor = $nomeFornecedor;
		}
		public function getdataFundacao(){
			return $this->dataFundacao;
		}
		public function setdataFundacao($dataFundacao){
			$data = explode('/',$dataFundacao);
			$this->dataFundacao = "$data[2]-$data[1]-$data[0]";
		}
		public function getemail(){
			return $this->email;
		}	
		public function setemail($email){
			return $this->email = $email;
		}
	}
	
?>
