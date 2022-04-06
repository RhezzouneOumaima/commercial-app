<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!------ Include the above in your HEAD tag ---------->

<!DOCTYPE html>
<html>
<head>
<style>
</style>
</head>
<body>
<h2>La liste des alerts</h2>
<table id="customers">
  <tr>
  <th style="background:red;">Designation</th>
                                                <th style="background:red;">Catégorie</th>
                                                <th style="background:red;">Stock</th>
                                                <th style="background:red;">Seuil d'alerte</th>
  </tr>
  @foreach($pdts as $pdt)
                                            <tr>
                                            <td>{{$pdt->RefPdt}}</td>
                                                <td>{{$pdt->Cat}}</td>
                                                <td>{{$pdt->stock}}</td>
                                                <td>{{$pdt->SM}}</td>
                                            </tr>
                                            @endforeach
</table>

</body>
<style>

#customers {
  font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

#customers td, #customers th {
  border: 1px solid #ddd;
  padding: 8px;
}

#customers tr:nth-child(even){background-color: #f2f2f2;}

#customers tr:hover {background-color: #ddd;}

#customers th {
  padding-top: 12px;
  padding-bottom: 12px;
  text-align: left;
  background-color: #4CAF50;
  color: white;
}
</style>
</html>
