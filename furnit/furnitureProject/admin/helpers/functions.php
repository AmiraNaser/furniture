<?php 

function Clean($input, $flag = 0)
{

    $input =  trim($input);

    if ($flag == 0) {
        $input =  filter_var($input, FILTER_SANITIZE_STRING);   
    }
    return $input;
}


function validate($input,$flag){
   
    $status = true;

      switch ($flag) {
          case 1:
              # code...
               if(empty($input)){
                  $status = false;
               }

              break;

        case 2: 
            # Code ... 
            if(!filter_var($input,FILTER_VALIDATE_EMAIL)){
                $status = false;
            }
            break;


        case 3: 
            # Code .... 
            if(strlen($input)<6){
                $status = false;
            }    
            break;

        case 4: 
            # Code .... 
            if(!filter_var($input,FILTER_VALIDATE_INT)){
                $status = false;
            }    
            break;

        case 5: 
            # Code .... 
            
            
            $nameArray =  explode('.', $input);
            $imgExtension =  strtolower(end($nameArray));
      
            $allowedExt = ['png', 'jpg'];
    
            if (!in_array($imgExtension, $allowedExt)) {
                $status = false;
            }
          break;

       case 6: 
        # code ... 
        $date = explode('-',$input);
    
        if(!checkdate($date[1],$date[2],$date[0])){
          $status = false;
        }

        break;


        case 7: 
            # code .... 
            $date = strtotime($input);

            if($date <= time()){
                $status = false;
            }
            break;



        case 8:     // te stt     
            #code ..... 
               if(!preg_match('/^[a-zA-Z\s]*$/',$input)){
                $status = false;
               }
            break; 



            case 9:     // te stt     
                #code phone ..... 
                   if(!preg_match('/^01[0-2,5][0-9]{8}$/',$input)){
                    $status = false;
                   }
                break;     
                
            case 10: 
                # Code .... 
                  if(!filter_var($input,FILTER_VALIDATE_FLOAT)){
                      $status = false;
                  }    
                break; 
            case 11: 
                $filter_options = array( 
                    'options' => array( 'min_range' => 0) 
                );
                
                
                if( !filter_var( $i, FILTER_VALIDATE_INT, $filter_options )) {
                    $status = false;
                }
                break;     


    // 01 0    01 1 01 2 01 5        // 11 


 //    '/^01[0-2,5][0-9]{8}$/'

}

return $status;
}





function displayMessages($text = null){

    if(isset($_SESSION['Message'])){
        foreach ($_SESSION['Message'] as $key => $value) {
            # code...
            echo ' * '.$value.'<br>';
        }
        unset($_SESSION['Message']);

    }else{
       echo   '<li class="breadcrumb-item active">'.$text.'</li>';
    }
}





function uploadFile($input){

    $result = '';

    $imgName  = $input['image']['name'];
    $imgTemp  = $input['image']['tmp_name'];

    $nameArray =  explode('.', $imgName);
    $imgExtension =  strtolower(end($nameArray));
    $imgFinalName = time() . rand() . '.' . $imgExtension;

     
    $disPath = 'uploads/' . $imgFinalName;

    if (move_uploaded_file($imgTemp, $disPath)) {
      $result =  $imgFinalName ;
       }

      return $result;  
      
  
}




function url($input){

    return "http://".$_SERVER['HTTP_HOST']."/furnit/furnitureProject/admin/".$input;

  }