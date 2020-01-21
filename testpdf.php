
<?php
$myfile = fopen("photos/FULL ADDER AND HALF ADDER REPORT.docx", "r") or die("Unable to open file!");
echo fread($myfile,filesize("photos/FULL ADDER AND HALF ADDER REPORT.docx"));
fclose($myfile);
?>