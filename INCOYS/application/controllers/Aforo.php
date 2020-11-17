<?php


require_once APPPATH.'/third_party/Spout/Autoloader/autoload.php';

use Box\Spout\Reader\ReaderFactory;
use Box\Spout\Common\Type;

  class Aforo extends CI_Controller
  {

    function __construct()
    {
      parent::__construct ();
      $this->load->helper('url');
      $this->load->library('session');
      $this->load->model('model_tanque');
      $this->load->model('model_aforo');
      $this->load->library('form_validation');
      $this->load->library('encrypt');
    }

    public function index(){
      $this->very_session();
      $this->load->view('component/header.php');
      //
      $data['tanque'] = $this->model_tanque->load();
      $data['result'] = null;
      $this->load->view('aforo/index',$data);
      $this->load->view('component/footer.php');
    }

    public function result()
    {
      if ($this->input->post('tanque'))
      {
        $this->very_session();
        $param['tanque'] = $this->input->post('tanque');
        $this->load->view('component/header.php');
        //
        $data['tanque'] = $this->model_tanque->load();
        $data['result'] = $this->model_aforo->load_tanque($param);
        $this->load->view('aforo/index',$data);
        $this->load->view('component/footer.php');
      }
      else{
        echo "nada";
      }
    }

    public function importar()
    {
      $data['tanque'] = $this->model_tanque->load();
      $this->load->view('component/header.php');
      //
      $this->load->view('form_import',$data);
      $this->load->view('component/footer.php');
      $this->load->view('import_excel');
    }

    public function eliminar()
    {
      if($this->input->post('delete')==true)
      {
        $tanque     = $this->input->post('id');
        $this->model_aforo->delete($tanque);
        $response["message"] = 'Eliminado exitosamente.';
        $response["success"] = true;
        echo json_encode($response);
        //redirect('Aforo/index');
      }
      else
      {
        echo "Safety BlackTurpial ";
      }
    }


     public function import_excel()
     {


       if (!empty($_FILES['file']['name']))
       {


        $pathinfo = pathinfo($_FILES["file"]["name"]);


         if (($pathinfo['extension'] == 'xlsx' || $pathinfo['extension'] == 'xls')
             && $_FILES['file']['size'] > 0 ) {

          // Nombre Temporal del Archivo
          $inputFileName = $_FILES['file']['tmp_name'];

          //Lee el Archivo usando ReaderFactory
          $reader = ReaderFactory::create(Type::XLSX);

          //Esta linea mantiene el formato de nuestras horas y fechas
          //Sin esta linea Spout convierte la hora y fecha a su propio formato
          //predefinido como DataTime

          $reader->setShouldFormatDates(true);

          // Abrimos el archivo
          $reader->open($inputFileName);
          $count = 1;

          //Numero de Hojas en el Archivo
          foreach ($reader->getSheetIterator() as $sheet) {

              // Numero de filas en el documento EXCEL
              foreach ($sheet->getRowIterator() as $row) {

              // Lee los Datos despues del encabezado
              // El encabezado se encuentra en la primera fila
               if($count > 1) {

                  $data = array(
                    'altura' => $row[0],
                    'galones' => $row[1],
                    'id_tanque' => $this->input->post('tanque')
                 );

                 //json_encode($data);

                 $this->model_aforo->insert_aforo($data);



                }
                  $count++;
               }
           }

           // cerramos el archivo EXCEL
            $reader->close();

            echo "<script>alert('Importo exitosamente'); history.back();</script>";

         }
         else
         {
            echo "<script>alert('Seleccione un tipo de Archivo Valido.'); history.back();</script>";
            //echo "Seleccione un tipo de Archivo Valido.";
         }

      }
       else
      {
        echo "Seleccione un Archivo EXCEL";
      }
    }


    function very_session()
    {
      if (!$this->session->userdata('logged')==TRUE) {
        header("Location:".base_url());
      }
    }
}
  ?>
