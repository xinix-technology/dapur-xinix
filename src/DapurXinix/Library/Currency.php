<?php 

namespace Dapurxinix\Library;


class Currency {

	public static function terbilang($i){
		$huruf = array("", "satu", "dua", "tiga", "empat", "lima", "enam", "tujuh", "delapan", "sembilan", "sepuluh", "sebelas");

		if ($i < 12) return " " . $huruf[$i];
		elseif ($i < 20) return Currency::terbilang($i - 10) . " belas";
		elseif ($i < 100) return Currency::terbilang($i / 10) . " puluh" . Currency::terbilang($i % 10);
		elseif ($i < 200) return " seratus" . Currency::terbilang($i - 100);
		elseif ($i < 1000) return Currency::terbilang($i / 100) . " ratus" . Currency::terbilang($i % 100);
		elseif ($i < 2000) return " seribu" . Currency::terbilang($i - 1000);
		elseif ($i < 1000000) return Currency::terbilang($i / 1000) . " ribu" . Currency::terbilang($i % 1000);
		elseif ($i < 1000000000) return Currency::terbilang($i / 1000000) . " juta" . Currency::terbilang($i % 1000000); 
		elseif ($i < 1000000000000) return Currency::terbilang($i / 1000000000) . " milyar" . Currency::terbilang($i % 1000000000); 
	}

	public static function terbilang_en($i){
		$huruf = array("", "one", "two", "three", "four", "five", "six", "seven", "eight", "nine", "ten", "eleven" ,"twelve","thirdteen","fourthteen","fifthteen","sixteen","seventhteen","eightteen","nineteen");
		$puluhan = array(20=>"twenty",30=>"thirty",40 =>"foruthty",50=>"fifthty",60=>"sixty",70=>"seventy",80 => "eightty",90=>"ninety");
		
			if ($i < 20) return " " . $huruf[$i];
			elseif ($i < 100) return  $puluhan[floor($i/10) * 10] . Currency::terbilang_en($i % 10);
			elseif ($i < 1000) return Currency::terbilang_en($i / 100) . " hundred" . " " . Currency::terbilang_en($i % 100);
			elseif ($i < 1000000) return Currency::terbilang_en($i / 1000) . " thousand" . " " . Currency::terbilang_en($i % 1000);
			elseif ($i < 1000000000) return Currency::terbilang_en($i / 1000000) . " million" ." " . Currency::terbilang_en($i % 1000000); 
			elseif ($i < 1000000000000) return Currency::terbilang_en($i / 1000000000) . " billion" . Currency::terbilang_en($i % 1000000000); 

	}

}



