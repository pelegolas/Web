<?php
 	class Aluno{
		private $nome;
		private $dataNasc;
		private $foto;
		
		public function __construct($nome, $dataNasc, $foto){
				$this->setNome($nome);
				$this->setDataNasc($dataNasc);
				$this->setFoto($foto);
		}
		public function getNome(){
			return $this->nome;
		}
		public function setNome($nome){
			return $this->nome = $nome;
		}
		public function getDataNasc(){
			return $this->dataNasc;
		}
		public function setDataNasc($dataNasc){
			$data = explode('/',$dataNasc);
			$this->dataNasc = "$data[2]-$data[1]-$data[0]";
		}
		public function getFoto(){
			return $this->foto;
		}	
		public function setFoto($foto){
			return $this->foto = $foto;
		}
	}
?>
