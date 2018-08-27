<?php

session_start();
require('../pdf/fpdf.php');
/*
 * Właśnie tutajj powstaje recepta, można to udoskonalić i wykorzystać czcionki Djvu lub rozszerzoną wersję TPDF.
 * Na potrzeby tego zadania wprowadzono kilka zmiennych aby pokazać, że nie jest to takie trudne aby wygenerować plik PDF z automatycznie powstającą treścią i logo.
 * Pozostawiłem część oryginalnych komentarzy.
 * Ogólnie tworzę tabelę i odpowiednio steruję ich wymiarami i położeniem 1 na końcu sprawia że komórka jest "zamknięta".
 * M.Kurant
 */

class PDF extends FPDF {

    function Header() {
        $this->SetFont('Arial', 'B', 10);

        $this->Cell(12);

        //put logo
        $this->Image('regasto.png', 10, 10);

        $this->Cell(100, 10, 'Recepta', 0, 1);

        //dummy cell to give line spacing  - komórka która tworzy wolną przestrzeń, lub umożliwia przejście do kolejnego wiersza.
        //$this->Cell(0,5,'',0,1);
        //is equivalent to:
        $this->Ln(5);
    }

    function Footer() {

        //Go to 1.5 cm from bottom
        $this->SetY(-15);

        $this->SetFont('Arial', '', 8);

        //width = 0 means the cell is extended up to the right margin
        $this->Cell(0, 10, 'Strona ' . $this->PageNo() . " / {pages}", 0, 0, 'C');
    }

}

//A4 width : 219mm
//default margin : 10mm each side
//writable horizontal : 219-(10*2)=189mm

$pdf = new PDF('P', 'mm', 'A4'); //use new class
//define new alias for total page numbers
$pdf->AliasNbPages('{pages}');

$pdf->AddPage();

//Image( file name , x position , y position , width [optional] , height [optional] )
$pdf->Image('regasto.png', 10, 10);

//set font to arial, bold, 14pt
$pdf->SetFont('Arial', '', 12);

//Cell(width , height , text , border , end line , [align] )
//nagłówek z naszym motto

$pdf->Cell(50, 10, 'RECEPTA', 1, 0);
$pdf->SetFont('Courier', 'I', 10);
$motto = "Profesjonalizm gwarantem satysfakcji klienta!";
$pdf->Cell(100, 10, $motto, 1, 0);
$pdf->SetFont('Arial', '', 12);  //ustawia czcionkę
//dla kogo
$pacjent = $_POST['rimie'];
$pacjent .= " ";
$pacjent .= $_POST['rnazwisko'];
$pacjent .= " Pesel: ";
$pacjent .= $_POST['rpesel'];

$pdf->Cell(0, 10, '', 0, 1);
$pdf->Cell(125, 10, 'Pacjent: ' . $pacjent . '', 1, 0);
$pdf->Cell(25, 10, '', 1, 1);

//pierwsza linia
$pdf->Cell(0, 5, '', 0, 1);
$pdf->Cell(75, 10, 'Nazwa leku', 1, 0);
$pdf->Cell(25, 10, 'Ulga %', 1, 0);
$pdf->Cell(50, 10, 'Dawka', 1, 1);

//druga linia
$pdf->Cell(0, 0, '', 0, 1);
$pdf->Cell(75, 10, '', 1, 0);
$pdf->Cell(25, 10, '', 1, 0);
$pdf->Cell(50, 10, '', 1, 1);
//trzecia linia
$pdf->Cell(0, 0, '', 0, 1);
$pdf->Cell(75, 10, '', 1, 0);
$pdf->Cell(25, 10, '', 1, 0);
$pdf->Cell(50, 10, '', 1, 1);
//4 linia
$pdf->Cell(0, 0, '', 0, 1);
$pdf->Cell(75, 10, '', 1, 0);
$pdf->Cell(25, 10, '', 1, 0);
$pdf->Cell(50, 10, '', 1, 1);
//5 linia
$pdf->Cell(0, 0, '', 0, 1);
$pdf->Cell(75, 10, '', 1, 0);
$pdf->Cell(25, 10, '', 1, 0);
$pdf->Cell(50, 10, '', 1, 1);
//6 linia
$pdf->Cell(0, 0, '', 0, 1);
$pdf->Cell(75, 10, '', 1, 0);
$pdf->Cell(25, 10, '', 1, 0);
$pdf->Cell(50, 10, '', 1, 1);
//7 linia
$pdf->Cell(0, 0, '', 0, 1);
$pdf->Cell(75, 10, '', 1, 0);
$pdf->Cell(25, 10, '', 1, 0);
$pdf->Cell(50, 10, '', 1, 1);
//8 linia
$pdf->Cell(0, 0, '', 0, 1);
$pdf->Cell(75, 10, '', 1, 0);
$pdf->Cell(25, 10, '', 1, 0);
$pdf->Cell(50, 10, '', 1, 1);
//9 linia
$pdf->Cell(0, 0, '', 0, 1);
$pdf->Cell(75, 10, '', 1, 0);
$pdf->Cell(25, 10, '', 1, 0);
$pdf->Cell(50, 10, '', 1, 1);
//10 linia
$pdf->Cell(0, 0, '', 0, 1);
$pdf->Cell(75, 10, '', 1, 0);
$pdf->Cell(25, 10, '', 1, 0);
$pdf->Cell(50, 10, '', 1, 1);
//podpis
$data = date("j.n.Y");
$lekarz = $_SESSION['login'];
$pdf->Cell(0, 0, '', 0, 1);
$pdf->Cell(75, 15, 'Podpis Lekarza: ' . $lekarz . '', 1, 0);
$pdf->Cell(35, 15, 'Data: ' . $data . '', 1, 0);
$pdf->Cell(40, 15, '', 1, 1);

$pdf->Output();
?>