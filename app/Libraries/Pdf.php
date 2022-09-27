<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Pdf extends TCPDF
{
    /**
     * Stores font list
     * @var array
     */
    public $_fonts_list = [];

    /**
     * This is true when last page is rendered
     * @var boolean
     */
    protected $last_page_flag = false;

    /**
     * PDF Type
     * invoice,estimate,proposal,contract
     * @var string
     */
    private $pdf_type = '';

    public function __construct(
        $orientation = 'P',
        $unit = 'mm',
        $format = 'A4',
        $unicode = true,
        $encoding = 'UTF-8',
        $diskcache = false,
        $pdfa = false,
        $pdf_type = ''
    ) {
        parent::__construct($orientation, $unit, $format, $unicode, $encoding, $diskcache, $pdfa);

        $this->pdf_type       = $pdf_type;
        $lg                   = [];
        $lg['a_meta_charset'] = 'UTF-8';

        $this->setLanguageArray($lg);
        $this->_fonts_list = $this->fontlist;

        do_action('pdf_construct', ['pdf_instance' => $this, 'type' => $this->pdf_type]);
    }

    public function Close()
    {
    //     include_once(APPPATH . 'libraries/PDF_Signature.php');

    //     $signature = new PDF_Signature($this, $this->pdf_type);
    //     $signature->process();

    //     do_action('pdf_close', ['pdf_instance' => $this, 'type' => $this->pdf_type]);

    //     $this->last_page_flag = true;
        parent::Close();
    }

    public function Header()
    {
        do_action('pdf_header', ['pdf_instance' => $this, 'type' => $this->pdf_type]);
 
         // Logo

         if($this->pdf_type!='deviation'){
            $image_file = HEADER_PDF_IMG;
            $this->Image($image_file, 10, 0, 200, '', 'JPG', '', 'T', false, 00, '', false, false, 0, false, false, false);
         }else{
	 $bMargin = $this->getBreakMargin();
    // get current auto-page-break mode
    $auto_page_break = $this->AutoPageBreak;
    // disable auto-page-break
    $this->SetAutoPageBreak(false, 0);
    
            $image_file = BACKGROUND_PDF_IMG;
	    $this->Image($image_file, 0, 0, 210, 297, '', '', '', false, 300, '', false, false, 0);
$this->SetAutoPageBreak($auto_page_break, $bMargin);
    // set the starting point for the page content
    $this->setPageMark();
            //$this->Image($image_file, 0, 0, 210, 200, 'png', '', 'T', false, 300, '', false, false, 0);
         }
        //Image($file, $x='', $y='', $w=0, $h=0, $type='', $link='', $align='', $resize=false, $dpi=300, $palign='', $ismask=false, $imgmask=false, $border=0, $fitbox=false, $hidden=false, $fitonpage=false)
        // Set font
       // $this->SetFont('helvetica', 'B', 20);
        // Title
        //$this->Cell(0, 15, '', 0, false, 'C', 0, '', 0, false, 'M', 'M');
    }

    public function Footer()
    {
        // Position at 15 mm from bottom
        $this->SetY(-20);

        $font_name = 'freesans';
        $font_size = 10;

        if ($font_size == '') {
            $font_size = 10;
        }

        $this->SetFont($font_name, '', $font_size);

        do_action('pdf_footer', ['pdf_instance' => $this, 'type' => $this->pdf_type]);

        //if (get_option('show_page_number_on_pdf') == 1) {
            // $this->SetFont($font_name, 'I', 8);
            // $this->SetTextColor(142, 142, 142);
            // $this->Cell(0, 15, 'Page '.$this->getAliasNumPage() . '/' . $this->getAliasNbPages(), 0, false, 'C', 0, '', 0, false, 'T', 'M');

            $this->SetY(-19);
             $logoX = 186; // 186mm. The logo will be displayed on the right side close to the border of the page
   $logoFileName = "/images/myLogo.jpg";
   $logoWidth = 50; // 15mm
       
       $ceo = isset($GLOBALS['ceo_signiture_global'])?str_replace('https','http',$GLOBALS['ceo_signiture_global']):'';
        $sp = isset($GLOBALS['sp_signiture_global'])?str_replace('https','http',$GLOBALS['sp_signiture_global']):'';
        $ceoC = 0;
        $spC = 0;

if(isset($GLOBALS['ceo_signiture_global']))
        if($GLOBALS['sp_signiture_global']!='___________________________'){
            $spC=1;

        }

if(isset($GLOBALS['sp_signiture_global']))
        if($GLOBALS['ceo_signiture_global']!='___________________________'){
            $ceoC=1;
        }


        //    $this->Cell(190,10, 'Page '.$this->getAliasNumPage() . '/' . $this->getAliasNbPages()."    Signatures - CEO:{signature_ceo}   SP:<div>".$this->Image('http://localhost:8012/final/assets/uploads/contracts/3/signature-sp.png', $logoX, $this->GetY()+2, $logoWidth).'</div>', 0, 0,'R');

        if($this->pdf_type=='deviation'){
            $this->Cell(0,1, 'Page '.$this->getAliasNumPage() . '/' . $this->getAliasNbPages()."    Signatures - Principal:".($ceoC==1?$this->Image($ceo, 58, $this->GetY()-8, $logoWidth):$ceo), 0, 0,'L');
        }elseif($this->pdf_type=='policies'){
            
            $this->Cell(0,1, 'Page '.$this->getAliasNumPage() . '/' . $this->getAliasNbPages()."    Signatures - Principal:".($ceoC==1?$this->Image($ceo, 58, $this->GetY()-8, $logoWidth):$ceo)."                         ".($spC!=1?" ":"                                            ")."Approver: ".($spC==1?$this->Image($sp, 135, $this->GetY()-8, $logoWidth):$sp), 0, 0,'L');
       
        }else{
            
            $this->Cell(0,1, 'Page '.$this->getAliasNumPage() . '/' . $this->getAliasNbPages()."    Signatures - Principal:".($ceoC==1?$this->Image($ceo, 58, $this->GetY()-8, $logoWidth):$ceo)."                         ".($spC!=1?" ":"                                            ")."SP: ".($spC==1?$this->Image($sp, 135, $this->GetY()-8, $logoWidth):$sp), 0, 0,'L');
        }
        //   $this->Cell(0,1, 'Page '.$this->getAliasNumPage() . '/' . $this->getAliasNbPages()."    Signatures - Principal:".($ceoC==1?$this->Image($ceo, 58, $this->GetY()-8, $logoWidth):$ceo)."                         ".($spC!=1?" ":"                                            ")."SP: ".($spC==1?$this->Image(file_get_contents($sp)):$sp), 0, 0,'L');

          $fl = "described in the Copyright Act No 98 of 1978 constitutes an act of copyright infringement and may give rise to civil liability claims.";
          $ts = "© Copyright – GSC - 2020. All rights reserved. Any unauthorised act in connection with this document as";
          $ln = "________________________________________________________________________________________________________________________";
// $this->setCellMargins(0,0,0,0);
 // $this->Cell(0,18, $fl, 0, 5,'L');
$this->ln();

// $this->Cell(0,0, $ts, 0, 0,'L',FALSE,'',FALSE,'T','L');
$this->SetFont($font_name, '', 8);
$this->Cell(0              // $w width
, 0               // $h height
, $ln
, 0                // border
, 0                // do not move cursor to next line after
, 'L'              // left-align text
, FALSE            // no fill
, ''               // link (none)
, 0                // stretch disabled
, FALSE            // ignore min height
, 'T'              // cell align
, 'L'              // text align
)
;

$this->ln();
$this->Cell(0              // $w width
, 0               // $h height
, $ts
, 0                // border
, 0                // do not move cursor to next line after
, 'L'              // left-align text
, FALSE            // no fill
, ''               // link (none)
, 0                // stretch disabled
, FALSE            // ignore min height
, 'T'              // cell align
, 'L'              // text align
)
;

$this->ln();


$this->Cell(0              // $w width
, 0               // $h height
, $fl
, 0                // border
, 0                // do not move cursor to next line after
, 'L'              // left-align text
, FALSE            // no fill
, ''               // link (none)
, 0                // stretch disabled
, FALSE            // ignore min height
, 'T'              // cell align
, 'L'              // text align
)
;

$table="

";
$ceo = isset($GLOBALS['ceo_signiture_global'])?str_replace('https','http',$GLOBALS['ceo_signiture_global']):'';
$sp = isset($GLOBALS['sp_signiture_global'])?str_replace('https','http',$GLOBALS['sp_signiture_global']):'';


if($this->pdf_type=='deviation'){
$html = <<<EOF
<div>
<table  style="width:100%" cellpadding=2>
<tr >
<td  >
Principal Signature:
 </td>
 <td >$ceo</td>
 <td >
 </td>
 <td ></td>
 </tr>
 <tr><td></td><td></td><td></td><td></td></tr>
</table>
</div>
EOF;

}else{
$html = <<<EOF
<div>
<table  style="width:100%" cellpadding=2>
<tr >
<td  >
Principal Signature:
 </td>
 <td >$ceo</td>
 <td >
 Service Provider Signatures:
 </td>
 <td >$sp</td>
 </tr>
 <tr><td></td><td></td><td></td><td></td></tr>
</table>
</div>
EOF;
}
// $html = preg_replace('/(<table\b[^><]*)>/i', '$1 cellpadding="8">', $html);

// var_dump($html);die;
// $this->writeHTML($html, true, false, true, false, '');
// $this->writeHTMLCell(0, 0, '', '', $html, 0, 0, false, "L", true);
        

            // $this->Cell(0, 0, 'Page '.$this->getAliasNumPage()."\n© Copyright – Services Sector Education and Training Authority - 2019. All rights reserved. Any unauthorised act in connection with this document as described in the Copyright Act No 98 of 1978 constitutes an act of copyright infringement and may give rise to civil liability claims    HET BHET Bursary Contract", 0, false, 'L', 0, '', 0, false, 'T', 'M');

            
            //CEO Initials
            // $this->Cell(0, 0, 'S.G', 0, false, 'R', 0, '', 0, false, 'R', 'M');
            //Service Provider Initials
            // $this->Cell(5, 19, 'W.E', 0, false, 'R', 0, '', 0, false, 'T', 'M');
       // }
    }

    public function get_fonts_list()
    {
        return $this->_fonts_list;
    }
}
