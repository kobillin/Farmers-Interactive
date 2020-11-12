<?php if(!isset($_SESSION)){
    session_start();
    }  
?>
<?php 
function fetch_data()
{
    $output ='';
    $conn = mysqli_connect("localhost", "root", "","db_healthcare");
    $sql = "SELECT * FROM appointment ORDER BY appId";
    $result =mysqli_query($conn, $sql)or die( mysqli_error($conn));
    while ($row = mysqli_fetch_array($result)) 
    {
        $output.= '<tr>  
                          <td>'.$row["appId"].'</td>   
                          <td>'.$row["patientIc"].'</td>    
                          <td>'.$row["scheduleId"].'</td>
                          <td>'.$row["appSymptom"].'</td>  
                          <td>'.$row["appComment"].'</td>   
                          <td>'.$row["status"].'</td>
                           
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
      $obj_pdf->SetTitle("List of appointments");  
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
  
      <h4 align="center" color="blue">Appointment report</h4><br /> 
      <table border="1" cellspacing="0" cellpadding="3">  
           <tr>  
                <th width="15%">Booking <br> id</th>
                <th width="15%">Patient Ic</th>  
                <th width="15%">schedule Id</th>
                <th width="15%">Symptoms</th>
                <th width="25%">Comments</th>      
                <th width="15%">Status</th>  
                                  
           </tr>  
      ';  
      $content .= fetch_data();  
      $content .= '</table>';  
      $obj_pdf->writeHTML($content);  
      $obj_pdf->Output('Appointments.pdf', 'I');  
 }  
 ?>  
 <!DOCTYPE html>  
 <html>  
      <head>  
           <title>Pdf | for Appointments</title>  
           <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />            
      </head>  
      <body>  
           <br />
           <div class="container">  
                <h4 align="center"> Appointment Details</h4><br />  
                <div class="table-responsive">  
                    <div class="col-md-12" align="right">
                     <form method="post">  
                          <input type="submit" name="Print" class="btn btn-success" value="Print" />  
                     </form>  
                     </div>
                     <br/>
                     <br/>
                     <table class="table table-bordered">  
                          <tr>  
                            <th width="15%">Booking <br> id</th>
                <th width="15%">Patient Ic</th>  
                <th width="15%">schedule Id</th>
                <th width="15%">Symptoms</th>
                <th width="25%">Comments</th>      
                <th width="15%">Status</th>    
                          </tr>  
                     <?php  
                     echo fetch_data();  
                     ?>  
                     </table>  
                </div>  
           </div>  
      </body>  
</html>