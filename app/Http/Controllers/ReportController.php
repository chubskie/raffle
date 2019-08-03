<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Guest;
use Carbon\Carbon;

class ReportController extends Controller
{
	public function create() 
	{
		$guests = Guest::all();
		$july1am = $guests->where('created_at', '<=', '2019-07-01 11:30:00');
		$july2am = $guests->where('created_at', '<', '2019-07-02 11:30:00');
		$july2pm = $guests->where('created_at', '>=', '2019-07-02 11:30:00');
		$july8pm = $guests->where('created_at', '>=', '2019-07-08 12:00:00');

		$header = array('size' => 11);
		$title = array(
			'size' => 12, 
			'bold' => true
		);
		$columnTitle = array('bold' => true);
		$styleTable = array(
			'cantSplit' => true, 
			'borderColor' => 'A9A9A9', 
			'borderSize' => 6, 
			'cellMargin' => 50
		);
		$styleCell = array(
			'valign' => 'center',
			'align' => 'center'
		);
		$styleFirstRow = array('bgColor' => 'D3D3D3');

		$phpWord = new \PhpOffice\PhpWord\PhpWord();
		$phpWord->setDefaultFontName('Arial');
		$phpWord->setDefaultFontSize(10);

		$section = $phpWord->addSection();

		$section->addText(htmlspecialchars('Freshmen Orientation 2019 Registration'), $title, array('align' => 'center'));
		for($i = 1; $i <= 4; $i++)
		{
			if ($i != 1)
			{
				$section->addTextBreak();
			}
			switch($i) 
			{
				case 1:
				$data = $july1am;
				$section->addText(htmlspecialchars('July 1, 2019 (AM Session)'), $header);
				break;
				case 2:
				$data = $july2am;
				$section->addText(htmlspecialchars('July 2, 2019 (AM Session)'), $header);
				break;
				case 3:
				$data = $july2pm;
				$section->addText(htmlspecialchars('July 2, 2019 (PM Session)'), $header);
				break;
				case 4:
				$data = $july8pm;
				$section->addText(htmlspecialchars('July 8, 2019 (PM Session)'), $header);
				break;
			}
			$phpWord->addTableStyle('Table', $styleTable, $styleFirstRow);
			$table = $section->addTable('Table');
			$table->addRow();
			$table->addCell(2500)->addText(htmlspecialchars('Name'), $columnTitle, $styleCell);
			$table->addCell(2500)->addText(htmlspecialchars('Course'), $columnTitle, $styleCell);
			$table->addCell(2500)->addText(htmlspecialchars('College'), $columnTitle, $styleCell);
			$table->addCell(2500)->addText(htmlspecialchars('Time Registered'), $columnTitle, $styleCell);
			foreach ($data as $guest)
			{
				$table->addrow();
				$table->addCell(2500)->addText(htmlspecialchars($guest->last_name.", ".$guest->first_name." ".$guest->middle_intial));
				$table->addCell(2500)->addText(htmlspecialchars($guest->course));
				switch($guest->college)
				{
					case 'undefined':
					$table->addCell(2500)->addText(htmlspecialchars('No Specified College'));
					break;
					case 'law':
					$table->addCell(2500)->addText(htmlspecialchars('College of Law'));
					break;
					case 'dent':
					$table->addCell(2500)->addText(htmlspecialchars('College of Dentistry'));
					break;
					case 'cas':
					$table->addCell(2500)->addText(htmlspecialchars('College of Arts and Sciences'));
					break;
					case 'ccss':
					$table->addCell(2500)->addText(htmlspecialchars('College of Computer Studies and Systems'));
					break;
					case 'cba':
					$table->addCell(2500)->addText(htmlspecialchars('College of Business Administration'));
					break;
					case 'eng':
					$table->addCell(2500)->addText(htmlspecialchars('College of Engineering'));
					break;
					case 'educ':
					$table->addCell(2500)->addText(htmlspecialchars('College of Education'));
					break;
					case 'cfad':
					$table->addCell(2500)->addText(htmlspecialchars('College of Fine Arts, Architecture and Design'));
					break;
				}
				$dateTime = Carbon::parse($guest->created_at, 'UTC');
				$table->addCell(2500)->addText(htmlspecialchars($dateTime->isoFormat('MMMM D - h:mm a')));
			}
		}

		$objWriter = \PhpOffice\PhpWord\IOFactory::createWriter($phpWord, 'Word2007');
		$objWriter->save(storage_path('Report.docx'));

		return response()->download(storage_path('Report.docx'));
	}
}
