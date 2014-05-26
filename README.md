CSVLog
======

Simple class to create a CSV Log.


Example:
-------
<pre><code>
require 'CSVLog.php';
$data = array(
    array(5, 6, 'tujuh'),
    array('senin', 2, "jum'at")
);
$log = new CSVLog('log', '2014-08-02');
foreach($data as $v){
	$log->write($v);
}
$log->close();
</code>
</pre>
that will create a folder and file on **log/2014/August/02.csv**