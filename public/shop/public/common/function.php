<?php
	//图片缩放
	function thumb($simg,$dw,$dh){
		$arr=getimagesize($simg);
		$sw=$arr[0];
		$sh=$arr[1];
		$st=$arr[2];
		$sm=$arr['mime'];

		switch ($st) {
			case 1:
				 $imagecreate="imagecreatefromgif";
				 $imageout="imagegif";
				break;
			case 2:
				 $imagecreate="imagecreatefromjpeg";
				 $imageout="imagejpeg";
				break;
			case 3:
				 $imagecreate="imagecreatefrompng";
				 $imageout="imagepng";
				break;
			
		}
		//原图和目标图资源
		$simgr=$imagecreate($simg);
		//等比例计算
		if($sw/$dw>$sh/$dh){
			$b=$sw/$dw;
		}else{
			$b=$sh/$dh;
		}
		$dw2=floor($sw/$b);
		$dh2=floor($sh/$b);
		//目标图片资源
		$dimgr=imagecreatetruecolor($dw2,$dh2);
		//开始缩放
		imagecopyresampled($dimgr, $simgr, 0, 0, 0, 0, $dw2, $dh2, $sw, $sh);
		//保存到与原图一个目录下
		$dir=dirname($simg);
		$file=basename($simg);
		$save=$dir.'/'.'thumb_'.$file;
		$imageout($dimgr,$save);
	}
?>