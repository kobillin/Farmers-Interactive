<?php if(!isset($_SESSION)){
    session_start();
    }  
?>
<?php 
function fetch_data()
{
    $output ='';
    $conn = mysqli_connect("localhost", "root", "","appoinment");
    $sql = "SELECT * FROM doctor ORDER BY doc_id";
    $result =mysqli_query($conn, $sql)or die( mysqli_error($conn));
    while ($row = mysqli_fetch_array($result)) 
    {
        $output.= '<tr>  
                          <td>'.$row["doc_id"].'</td>  
                          <td>'.$row["name"].'</td>    
                          <td>'.$row["address"].'</td>
                          <td>'.$row["contact"].'</td>  
                          <td>'.$row["email"].'</td>  
                            
                          <td>'.$row["expertise"].'</td>
                          <td>'.$row["fee"].'</td>    
                     </tr>  
                          ';
    }
    return $output;
}
if(isset($_POST["Print"]))  
 {  
      require_once('TCPDF/tcpdf.php');  
      $obj_pdf = new TCPDF('P', PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);  
      $obj_pdf->SetCreator(PDF_CREATOR);  
      $obj_pdf->SetTitle("Generate HTML Table Data To PDF From MySQL Database Using TCPDF In PHP");  
      $obj_pdf->SetHeaderData('', '', PDF_HEADER_TITLE, PDF_HEADER_STRING);  
      $obj_pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));  
      $obj_pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));  
      $obj_pdf->SetDefaultMonospacedFont('helvetica');  
      $obj_pdf->SetFooterMargin(PDF_MARGIN_FOOTER);  
      $obj_pdf->SetMargins(PDF_MARGIN_LEFT, '10', PDF_MARGIN_RIGHT);  
      $obj_pdf->setPrintHeader(false);  
      $obj_pdf->setPrintFooter(false);  
      $obj_pdf->SetAutoPageBreak(TRUE, 10);  
      $obj_pdf->SetFont('helvetica', '', 11);  
      $obj_pdf->AddPage();  
      $content = '';  
      $content .= '
  
      <h4 align="center">Doctors List</h4><br /> 
      <table border="1" cellspacing="0" cellpadding="3">  
           <tr>  
                <th width="7%">Doctor <br> id</th>  
                                <th width="14%">Name</th>    
                                <th width="10%">Address</th>
                                <th width="18%">Contact</th>  
                                <th width="20%">Email</th>    
                                <th width="14%">Expertise</th>
                                <th width="7%">Fee</th>    
           </tr>  
      ';  
      $content .= fetch_data();  
      $content .= '</table>';  
      $obj_pdf->writeHTML($content);  
      $obj_pdf->Output('Doctors.pdf', 'I');  
 }  
 ?>  
 <!DOCTYPE html>  
 <html>  
      <head>  
           <title>Doctors | Registered</title>  
           <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">            
      </head>  
      <body>  
           <br />
           <div class="container">  
                <h4 align="center"> Doctors Details</h4><br />  
                <div class="table-responsive">  
                    <div class="col-md-12" align="right">
                     <form method="post">  
                          <input type="submit" name="Print" class="btn btn-success" value="Print" />  
                     </form>  
                     </div>
                     <br/>
                     <br/>
                     <table class="table table-light table-bordered">  
                          <tr >  
                              <th class="table-success" width="7%">Doctor <br> id</th>  
                                <th class="table-success" width="14%">Name</th>    
                                <th class="table-success" width="10%">Address</th>
                                <th class="table-success" width="18%">Contact</th>  
                                <th class="table-success" width="20%">Email</th>    
                                <th class="table-success" width="14%">Expertise</th>
                                <th class="table-success" width="7%">Fee</th>   
                          </tr>  
                     <?php  
                     echo fetch_data();  
                     ?>  
                     </table>  
                </div>  
           </div>  
      </body>  
</html>