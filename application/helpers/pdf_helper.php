<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

if (!function_exists('tcpdf'))
{
	function tcpdf()
	{
	  require_once('tcpdf/config/lang/eng.php');
	  require_once('tcpdf/tcpdf.php');

	  class MYPDF extends TCPDF {
	    //Page header
	    public function Header() {
	        // Logo
	        $image_file = K_PATH_IMAGES.'Universidad_de_Manila_Logo.png';
	        $this->Image($image_file, 15, 8, 25, '', 'PNG');
	        // Set font
	        $this->SetFont('merriweather', '', 16);
	        $this->Cell(0, 0, 'UNIVERSIDAD DE MANILA', 0, 1, 'C', 0, '', 0);
	        
	        $this->writeHTMLCell(0, 0, 50, 20, '<hr style="height: 2px; width: 80%; border-color: #FF652C;">', 0, 1, false, true, '', true);

	        $this->SetY(21);
	        $this->SetFont('merriweather', '', 12);

	        $this->Cell(0, 0, 'Cecilia Muñoz., cor. Antonio J. Villegas St.,', 0, 1, 'C', 0, '', 0);
	        $this->Cell(0, 0, 'Mehan Gardens, Ermita, Manila', 0, 1, 'C', 0, '', 0);
	    }

	    // Page footer
	    public function Footer() {
	        // Position at 15 mm from bottom
	        $this->SetY(-15);
	        // Set font
	        $this->SetFont('helvetica', 'I', 8);
	        // Page number
	        $this->Cell(0, 10, 'Page '.$this->getAliasNumPage().'/'.$this->getAliasNbPages(), 0, false, 'C', 0, '', 0, false, 'T', 'M');
	    }
		}
	}
}