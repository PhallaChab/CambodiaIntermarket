<!-- <?php 
mysql_connect("localhost","root","") or die("problem with connection...");
mysql_select_db("cambointermarket");

$per_page = 6;
$pages_query = mysql_query("SELECT COUNT('id') FROM products");
$pages = ceil(mysql_result($pages_query, 0) / $per_page);
$page = (isset($_GET['page'])) ? (int)$_GET['page'] : 1;
$start = ($page - 1) * $per_page;
$query = mysql_query("SELECT pro_name FROM products LIMIT $start, $per_page");

while ($query_row = mysql_fetch_assoc($query)) {
	echo $query_row['pro_name'].'<br/>';
}
?> -->