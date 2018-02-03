<?php
class genTable{
	private $content;
	private $header;
	private $class;
	private $result;
	private $id;
	private $name;
	public function __construct(){
		$this->class['table'] = "";
		$this->class['th'] = "";
		$this->class['tr'] = "";
		$this->id = "";
		$this->name = "";
	}
	public function setContent($tmp_content){ //set variabel content
		if(!is_array($tmp_content)) $this->content = [];
		else $this->content = $tmp_content;
	}
	public function setHeader($tmp_header){ //set variabel header
		if(!is_array($tmp_header)) $this->header = [];
		else $this->header = $tmp_header;
	}
	public function setId($tmp_id){ //set variabel id
		$this->id = empty($tmp_id) ? "" : " id='".$tmp_id."'";
	}
	public function setName($tmp_name){ //set variabel name
		$this->name = empty($tmp_name) ? "" : " name='".$tmp_name."'";
	}
	public function setClass($tmp_class){ //set header
		$this->class['table'] = empty($tmp_class['table']) ? "" : " class='".$tmp_class['table']."'";
		$this->class['tr'] = empty($tmp_class['tr']) ? "" : " class='".$tmp_class['tr']."'";
		$this->class['th'] = empty($tmp_class['th']) ? "" : " class='".$tmp_class['th']."'";
	}
	public function makeTable(){ //generate tabel
		if(empty($this->content)) return "Error ! Isi tabel harus ditentukan -> setContent(array[])";
		else if(empty($this->header)) return "Error ! Heading tabel harus ditentukan -> setHeader(array[])";
		else {
			$this->result = "<table".$this->id.$this->name.$this->class['table']."><thead><tr".$this->class['tr'].">";
			foreach($this->header as $h){
				$this->result .= "<th".$this->class['th'].">".$h."</th>";
				}
			$this->result .= "</tr></thead>";
			$this->result .= "<tbody>";
			foreach($this->content as $tr){  //looping isi content
				$this->result .= "<tr".$this->class['tr'].">"; //buat baris
				foreach($this->header as $h){ //looping lagi ke header
					$this->result .= "<td>".$tr[$h]."</td>"; //tampilkan isi konten berdasarkan nama index dari header
				}
				$this->result .= "</tr>";
				}
			$this->result .= "</tbody></table>";
			return $this->result;
		}
	}
	}
//CONTOH PENGGUNAAN
/*
include "template/genTable.php";
$isi = [
	[
		"Nama"=>"Nama 1",
		"Kelas"=>"Kelas 1"
	],
	[
		"Nama"=>"Nama 2",
		"Kelas"=>"Kelas 2"
	],
	[
		"Nama"=>"Nama 3",
		"Kelas"=>"Kelas 4"
	]
];
$attr = [
	"table"=>"w3-table",
	"tr"=>"w3-white",
	"th"=>"w3-teal",
	"td"=>"w3-blue"
];
$tabel = new genTable();
$tabel->setId("ID tabel");
$tabel->setName("nama tabel");
$tabel->setContent($isi);
$tabel->setHeader(["Nama","Kelas"]);
$tabel->setClass($attr);
echo $tabel->makeTable(); 
 */
?>
