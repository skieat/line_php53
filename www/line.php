<a href="line.php?click=1" class="btn">Click me</a>
<?

define('LINE_API',"https://notify-api.line.me/api/notify");
$token = "MPR5x71AFdRsOCoGxiH";
$str = "มีรายการสั่งซื้อ กรุณาเช็ค อีเมลล์ครับ";
$res = notify_message($str,$token);

if($_GET['click'])
{
print_r($res);
}

function notify_message($message,$token){
$queryData = array('message' => $message);
$queryData = http_build_query($queryData,'','&');
$headerOptions = array(
'http'=>array(
'method'=>'POST',
'header'=> "Content-Type: application/x-www-form-urlencoded\r\n"
."Authorization: Bearer ".$token."\r\n"
."Content-Length: ".strlen($queryData)."\r\n",
'content' => $queryData
),
);
$context = stream_context_create($headerOptions);
$result = file_get_contents(LINE_API,FALSE,$context);
return $res;
}

?>
