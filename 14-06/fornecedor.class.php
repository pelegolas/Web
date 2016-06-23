//OK
<?php
 	class Fornecedor{
		private $nome;
		private $email;
		private $dataFundacao;
		
		public function __construct($nome, $email, $dataFundacao){
				$this->setNome($nome);
				$this->setDataFundacao($dataFundacao);
				$this->setEmail($email);
		}
		public function getNome(){
			return $this->nome;
		}
		public function setNome($nome){
			return $this->nome = $nome;
		}
		public function getDataFundacao(){
			return $this->dataFundacao;
		}
		public function setDataFundacao($dataFundacao){
			$data = explode('/',$dataFundacao);
			$this->dataFundacao = "$data[2]-$data[1]-$data[0]";
		}
		public function getEmail(){
			return $this->email;
		}	
		public function setEmail($email){
			return $this->email = $email;
		}
	}
?>
//dataNasc => dataFundacao
