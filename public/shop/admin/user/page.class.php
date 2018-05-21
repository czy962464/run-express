<?php
session_start();
if(!$_SESSION['admin_userid']){
    echo "<script>location='../login.php'</script>";
    exit;
} 
	class Page{
		public $offset;
		public $length;
		public $prev;
		public $next;


		public function __construct($tot,$length){
			
			$this->length=$length;
			
			$page=$_GET['p']?$_GET['p']:1;
			$this->offset=($page-1)*$this->length;
			$pages=ceil($tot/$this->length);
			$this->prev=$page-1;
			if($this->prev<=1){
				$this->prev=1;
			}

			$this->next=$page+1;
			if($this->next>=$pages){
				$this->next=$pages;
			}

		} 
		public function show(){
			echo "<a href='index.php?p={$this->prev}'	class='btn btn-primary'>上一页</a>
		    <a href='index.php?p={$this->next}' class='btn btn-success'>下一页</a>";
		}
	}
?>