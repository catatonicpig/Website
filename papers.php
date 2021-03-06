<?php
session_start();
?>

<?php include 'header.php';?>


<script>
    setSelectedPageNav();
</script>

<?php
$_GET['library']=1;
require_once('bibtexbrowserv2.php');
global $db;
$db = new BibDataBase();
$db->load('plumleebib.bib');
?>

<h3>papers  </h3>

<h4> <a href="http://scholar.google.com/citations?hl=en&user=sSQeiUwAAAAJ" > [google scholar] </a> </h4>


There is a chance of odd entries as this is automatically generated, let me know if there are any issues figuring out how to access a paper.

<h4>journal articles </h4>


<ul class="list-group">
<?php
$query = array(Q_TYPE=>'article');
$entries=$db->multisearch($query);
uasort($entries, 'compare_bib_entries');

foreach ($entries as $bibentry) {
  echo "\n<li class=\"list-group-item\">".$bibentry->toHTML()."</li>\n";
}
?>
</ul>


<h4>in proceedings </h4>

<ul class="list-group">
<?php
$query = array(Q_TYPE=>'inproceedings');
$entries=$db->multisearch($query);
uasort($entries, 'compare_bib_entries');

foreach ($entries as $bibentry) {
  echo "\n<li class=\"list-group-item\">".$bibentry->toHTML()."</li>\n";
}
?>
</ul>

<h4>other catagories</h4>

<ul class="list-group">
<?php
$query = array(Q_TYPE=>'misc|phdthesis|mastersthesis|bachelorsthesis|techreport');
$entries=$db->multisearch($query);
uasort($entries, 'compare_bib_entries');

foreach ($entries as $bibentry) {
  echo "\n<li class=\"list-group-item\">".$bibentry->toHTML()."</li>\n";
}
?>
</ul>

<?php include 'footer.php';?>
