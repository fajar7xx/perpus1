<?php
require_once "../config/config.php";


/**
 * Html2Pdf Library - example
 *
 * HTML => PDF converter
 * distributed under the OSL-3.0 License
 *
 * @package   Html2pdf
 * @author    Laurent MINGUET <webmaster@html2pdf.fr>
 * @copyright 2017 Laurent MINGUET
 */
require_once '../libs/vendor/autoload.php';
use Spipu\Html2Pdf\Html2Pdf;
use Spipu\Html2Pdf\Exception\Html2PdfException;
use Spipu\Html2Pdf\Exception\ExceptionFormatter;
try {
    ob_start();
    include '../libs/vendor/spipu/html2pdf/examples/example00.php';
    $content = ob_get_clean();
    $html2pdf = new Html2Pdf('P', 'A4', 'fr');
    $html2pdf->setDefaultFont('Arial');
    $html2pdf->writeHTML($content);
    $html2pdf->output('example00.pdf');
} catch (Html2PdfException $e) {
    $html2pdf->clean();
    $formatter = new ExceptionFormatter($e);
    echo $formatter->getHtmlMessage();
}
?>

<h2>Laporan Anggota</h2>
<table border="1">
	<thead>
		<th>NO</th>
        <th>NIM</th>
        <th>Nama</th>
        <th>Tempat Lahir</th>
        <th>Tanggal Lahir</th>
        <th>Jenis Kelamin</th>
        <th>Program Studi</th>
	</thead>
	<tbody>
		<?php

		$query_anggota = "SELECT * FROM anggota";
		$sql_anggota = mysqli_query($koneksi, $query_anggota) or die(mysqli_error($koneksi));
		if(mysqli_num_rows($sql_anggota) != 0):
			$no = 1;  
			while($data = mysqli_fetch_array($sql_anggota, MYSQLI_ASSOC)):
				?>
				<tr>
					<td class="text-center"><?=$no++;?></td>
					<td><?=$data['nim'];?></td>
					<td><?=$data['nama'];?></td>
					<td><?=$data['tempat_lahir'];?></td>
					<td><?=$data['tgl_lahir'];?></td>
					<td class="text-center"><?=($data['jk'] == 'l')?'Laki-laki':'Perempuan';?></td>
					<td class="text-center"><?=$data['prodi'];?></td>
				</tr>
				<?php  
			endwhile;
		endif;
		?>
	</tbody>
</table>