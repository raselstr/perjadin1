<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-15">
<style>
body { font-family: verdana, sans-serif;} 
table {
  margin-bottom: 2em;
}

thead {
  background-color: #eeeeee;
}

tbody {
  background-color: #ffffee;
}

th,td {
  padding: 3pt;
}

table.separate {
  border-collapse: separate;
  border-spacing: 5pt;
  border: 3pt solid #33d;
}

table.separate td {
  border: 2pt solid #33d;
}

table.collapse {
  border-collapse: collapse;
  border: 1pt solid black;  
}

table.collapse td {
  border: 1pt solid black;
}
</style>

</head>

<body>

border-collapse: separate
<table class="separate"> 
<thead>
  <tr>
    <th>head 1</th>
    <th>head 2</th>
    <th>head 3</th>
    <th>head 4</th>
  </tr>
</thead>
  <tr>
    <td rowspan="2">cell 1</td>
    <td>2</td>
    <td colspan="2">cell 3</td>
  </tr>
  <tr>
    <td style="border: 4px double black" colspan="2">cell 4</td>
    <td rowspan="2">cell 5</td>
  </tr>
  <tr>
    <td colspan="3">cell 6</td>
  </tr>
  <tr>
    <td colspan="4">cell 7</td>
  </tr>
</table>

border-collapse: collapse
<table class="collapse"> 
<thead>
  <tr>
    <th>head 1</th>
    <th>head 2</th>
    <th>head 3</th>
    <th>head 4</th>
  </tr>
</thead>
  <tbody>
  <tr>
    <td>cell 1 coba tes isinya banyak</td>
    <td>cell 2</td>
    <td>cell 3</td>
    <td>cell 4</td>
  </tr>
  <tr>
    <td colspan="2">cell 5</td>
    <td>cell 6</td>
    <td>cell 7</td>
  </tr>
  <tr>
    <td>cell 8</td>
    <td>cell 9</td>
    <td colspan="2">cell 10</td>
  </tr>
  </tbody>
  <tr>
    <td colspan="4">cell 11</td>
  </tr>
</table>


</body> </html>
