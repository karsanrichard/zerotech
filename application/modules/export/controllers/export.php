<?php

date_default_timezone_set('Africa/Nairobi');
class Export extends MY_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->library(
			array(
				'Excel',
				'm_pdf'
			)
		);
		$this->load->model('products_model');
	}

	function create_pdf($data = array(), $category)
	{
		$data['product_details'] = $data;
		$data['category_name'] = $this->products_model->get_category_details($category)->category_name;
		$html=$this->load->view('export/layout', $data, true); 
		//this the the PDF filename that user will get to download
		$pdfFilePath = date("d-m-Y-h:i:s") . ".pdf";
		 
		//load mPDF library
		// $this->load->library('m_pdf');
		//actually, you can pass mPDF parameter on this load() function
		$pdf = $this->m_pdf->load();
		$time_string = date("l, jS F Y") . " at " . date("H:i:s");
		$pdf->setHeader('Data exported on: ' . $time_string);
		$pdf->setFooter('{PAGENO}');
		//$pdf->showImageErrors = true;
		//generate the PDF!
		$pdf->WriteHTML($html);
		//offer it to user via browser download! (The PDF won't be saved on your server HDD)
		$pdf->Output($pdfFilePath, "D");
	}

	function create_excel($data = array(), $category)
	{
		$data['product_details'] = $data;
		$category_name = $this->products_model->get_category_details($category)->category_name;
		//activate worksheet number 1
		$this->excel->setActiveSheetIndex(0);
		//name the worksheet
		$this->excel->getActiveSheet()->setTitle($category_name . '-Product Catalog');
		//set cell A1 content with some text
		$this->excel->getActiveSheet()->setCellValue('A1', $category_name);
		
		$testArray = [
			'Product Name',
			'Description',
			'Price per Unit',
			'Color'
		];

		
		PHPExcel_Shared_Font::setAutoSizeMethod(PHPExcel_Shared_Font::AUTOSIZE_METHOD_EXACT);

		foreach(range('A','D') as $columnID) {
		    $this->excel->getActiveSheet()->getColumnDimension($columnID)
		        ->setAutoSize(true);
		}
		$this->excel->getActiveSheet()->getStyle("A2:D2")->getFont()->setBold(true);
		//change the font size
		$this->excel->getActiveSheet()->getStyle('A1')->getFont()->setSize(20);
		//make the font become bold
		$this->excel->getActiveSheet()->getStyle('A1')->getFont()->setBold(true);
		//merge cell A1 until D1
		$this->excel->getActiveSheet()->mergeCells('A1:D1');
		// //set aligment to center for that merged cell (A1 to D1)
		$this->excel->getActiveSheet()->getStyle('A1')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
		
		$this->excel->getActiveSheet()->fromArray($testArray, NULL, 'A2');
		$product_details = array();

		foreach ($data['product_details'] as $key => $value) {
			$clean_data = array();
			foreach ($value as $k => $v) {
				if(($k == 'product_name') || ($k == 'description') || ($k == 'price') || ($k == 'color'))
				{
					$clean_data[$k] = $v;
				}
			}
			$product_details[] = $clean_data;
		}

		$this->excel->getActiveSheet()->fromArray($product_details, NULL, 'A3');
		$filename=date ("d-m-Y-h:i:s") . '.xls'; //save our workbook as this file name
		header('Content-Type: application/vnd.ms-excel'); //mime type
		header('Content-Disposition: attachment;filename="'.$filename.'"'); //tell browser what's the file name
		header('Cache-Control: max-age=0'); //no cache

		//save it to Excel5 format (excel 2003 .XLS file), change this to 'Excel2007' (and adjust the filename extension, also the header mime type)
		//if you want to save it as .XLSX Excel 2007 format
		$objWriter = PHPExcel_IOFactory::createWriter($this->excel, 'Excel5');  
		//force user to download the Excel file without writing it to server's HD
		$objWriter->save('php://output');
	}
}