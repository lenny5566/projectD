<?php
// pdf標頭
header('Content-type: application/pdf');

//顯示下載提示,檔名為 downloaded.pdf
header('Content-Disposition: attachment; filename="downloaded.pdf"');

// 讀取ok.pdf的檔案內容
readfile('ok.pdf');



?>