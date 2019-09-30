<?php
  function processData($dob, $insurance, $religion, $marital_status, $ethnicity, $disease) {
    $data = array(
      'dob' => $dob, 
      'insurance' => $insurance,
      'religion' => $religion,
      'marital_status' => $marital_status,
      'ethnicity' => $ethnicity,
      'disease' => $disease
    );
    //var_dump($data);
    $data_string = json_encode($data);                                                                                   
    $ch = curl_init('URL_API');
    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");                                                                     
    curl_setopt($ch, CURLOPT_POSTFIELDS, $data_string);                                                                  
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);                                                                      
    curl_setopt($ch, CURLOPT_HTTPHEADER, array(                                                                          
        'Content-Type: application/json',                                                                                
        'Content-Length: ' . strlen($data_string))                                                                       
    );                                                                                          
    $result = curl_exec($ch);
    $data = json_decode($result);
    //var_dump($result); die();
    return $data;
  }

  function processDataDummy($name, $salary, $age) {
    // dummy api : http://dummy.restapiexample.com/
    $data = array(
      'name' => $name, 
      'salary' => $salary,
      'age' => $age
    );
    //var_dump($data);
    $data_string = json_encode($data);                                                                                   
    $ch = curl_init('http://dummy.restapiexample.com/api/v1/create');
    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");                                                                     
    curl_setopt($ch, CURLOPT_POSTFIELDS, $data_string);                                                                  
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);                                                                      
    curl_setopt($ch, CURLOPT_HTTPHEADER, array(                                                                     
        'Content-Type: application/json',                                                                                
        'Content-Length: ' . strlen($data_string))                                                                       
    );                                                                                          
    $result = curl_exec($ch);
    $data = json_decode($result);
    //var_dump($data); die();
    return $data->id;
  }
?>

<html>
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="author" content="colorlib.com">
    <link href="https://fonts.googleapis.com/css?family=Poppins:400,600,700" rel="stylesheet" />
    <link href="css/main.css" rel="stylesheet" />
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <link rel="stylesheet" href="/resources/demos/style.css">
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <script>
    $( function() {
      $( "#datepicker" ).datepicker();
    } );
    </script>
  </head>
  <body>
    <div class="s010">
      <form method="post" >
        <div class="inner-form">
          <div class="basic-search">
            <div class="input-field">
              <input id="search" type="text" placeholder="SEARCH" disabled="true" />
              <div class="icon-wrap">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                  <path d="M15.5 14h-.79l-.28-.27C15.41 12.59 16 11.11 16 9.5 16 5.91 13.09 3 9.5 3S3 5.91 3 9.5 5.91 16 9.5 16c1.61 0 3.09-.59 4.23-1.57l.27.28v.79l5 4.99L20.49 19l-4.99-5zm-6 0C7.01 14 5 11.99 5 9.5S7.01 5 9.5 5 14 7.01 14 9.5 11.99 14 9.5 14z"></path>
                </svg>
              </div>
            </div>
          </div>
          <div class="advance-search">
            <div class="row">
              <div class="form-group">
                  <label for="">Date Of Birth</label>
                  <div class='input-group date' id='example1'>
                      <input type="text" name="dob" id="datepicker" style="">
                      <span class="input-group-addon">
                          <span class="glyphicon glyphicon-calendar"></span>
                      </span>
                  </div>
              </div>
              <!--
                <div class="input-text">
                    <label for="dateofbirth">Date Of Birth</label>
                    <input type="text" name="dob" id="datepicker" style="">
                </div>-->
              <div class="input-field">
                <div class="input-select">
                  <select name="insurance">
                    <option placeholder="" value="">INSURANCE</option>
                    <option value='PRIVATE'>PRIVATE</option>
                    <option value='MEDICARE'>MEDICARE</option>
                    <option value='MEDICAID'>MEDICAID</option>
                    <option value='SELF PAY'>SELF PAY</option>
                    <option value='GOVERNMENT'>GOVERNMENT</option>
                  </select>
                </div>
              </div>
              <div class="input-field">
                <div class="input-select">
                  <select name="insurance">
                    <option placeholder="" value="">RELIGION</option>
                    <option value='UNOBTAINABLE'>UNOBTAINABLE</option>
                    <option value='CATHOLIC'>CATHOLIC</option>
                    <option value='PROTESTANT QUAKER'>PROTESTANT QUAKER</option>
                    <option value='NOT SPECIFIED'>NOT SPECIFIED</option>
                    <option value='JEWISH'>JEWISH</option>
                    <option value='BUDDHIST'>BUDDHIST</option>
                    <option value='OTHER'>OTHER</option>
                    <option value="JEHOVAH'S WITNESS">JEHOVAH'S WITNESS</option>
                    <option value='GREEK ORTHODOX'>GREEK ORTHODOX</option>
                    <option value='EPISCOPALIAN'>EPISCOPALIAN</option>
                    <option value='HINDU'>HINDU</option>
                    <option value='CHRISTIAN SCIENTIST'>CHRISTIAN SCIENTIST</option>
                    <option value='HEBREW'>HEBREW</option>
                    <option value='METHODIST'>METHODIST</option>
                    <option value='UNITARIAN-UNIVERSALIST'>UNITARIAN-UNIVERSALIST</option>
                    <option value='BAPTIST'>BAPTIST</option>
                    <option value='7TH DAY ADVENTIST'>7TH DAY ADVENTIST</option>
                    <option value='MUSLIM'>MUSLIM</option>
                    <option value='ROMANIAN EAST. ORTH'>ROMANIAN EAST. ORTH</option>
                    <option value='LUTHERAN'>LUTHERAN</option>
                  </select>
                </div>
              </div>
            </div>
            <div class="row second">
              <div class="input-field">
                <div class="input-select">
                  <select name="marital_status">
                    <option placeholder="" value="">MARITAL STATUS</option>
                    <option value='MARRIED'>MARRIED</option>
                    <option value='SINGLE'>SINGLE</option>
                    <option value='DIVORCED'>DIVORCED</option>
                    <option value='WIDOWED'>WIDOWED</option>
                    <option value='SEPARATED'>SEPARATED</option>
                    <option value='UNKNOWN (DEFAULT)'>UNKNOWN (DEFAULT)</option>
                    <option value='LIFE PARTNER'>LIFE PARTNER</option>
                  </select>
                </div>
              </div>
              <div class="input-field">
                <div class="input-select">
                  <select data-trigger="" name="ethnicity">
                    <option placeholder="" value="">ETHNICITY</option>
                    <option value='WHITE'>WHITE</option>
                    <option value='UNKNOWN/OTHER'>UNKNOWN/OTHER</option>
                    <option value='ASIAN'>ASIAN</option>
                    <option value='HISPANIC/LATINO'>HISPANIC/LATINO</option>
                    <option value='BLACK/AFRICAN AMERICAN'>BLACK/AFRICAN AMERICAN</option>
                  </select>
                </div>
              </div>
              <div class="input-field">
                <div class="input-select">
                  <select data-trigger="" name="disease">
                    <option placeholder="" value="">DISEASE</option>
                    <option value='PRENATAL'>PRENATAL</option>
                    <option value='RESPIRATORY'>RESPIRATORY</option>
                    <option value='INJURY'>INJURY</option>
                    <option value='DIGESTIVE'>DIGESTIVE</option>
                    <option value='INFECTIOUS'>INFECTIOUS</option>
                    <option value='NERVOUS'>NERVOUS</option>
                    <option value='CONGETINAL'>CONGETINAL</option>
                    <option value='ENDOCRINE'>ENDOCRINE</option>
                    <option value='CICULATORY'>CICULATORY</option>
                    <option value='SKIN'>SKIN</option>
                  </select>
                </div>
              </div>
            </div>
            <div class="row third">
              <div class="input-field">
                  <button type="reset" class="btn-delete" id="delete">RESET</button>
                  <button type="submit" name="search" value="search" class="btn-search">SEARCH</button>
              </div>
            </div>
          </div>

          <div class="basic-search">
            <div class="input-field">
            </div>
          </div>

    <?php if ( $_POST['search']!= null && $_POST['search'] == "search" ) { ?>
          <div class="advance-search">
            <center style="color:blue;text-align:center;font-size:45px;">
              RESULT
            </center>
            <center style="color:blue;text-align:center;font-size:45px;">
              <?php
                  $data_result = processDataDummy(uniqid(), "2200", "22");
                  print_r($data_result);
              ?>
            </center>
            </div>
          </div>
    <?php } ?>

        </div>
      </form>
    </div>
    <script src="js/extention/choices.js"></script>
    <script>
      const customSelects = document.querySelectorAll("select");
      const deleteBtn = document.getElementById('delete')
      const choices = new Choices('select',
      {
        searchEnabled: false,
        itemSelectText: '',
        removeItemButton: true,
      });
      for (let i = 0; i < customSelects.length; i++)
      {
        customSelects[i].addEventListener('addItem', function(event)
        {
          if (event.detail.value)
          {
            let parent = this.parentNode.parentNode
            parent.classList.add('valid')
            parent.classList.remove('invalid')
          }
          else
          {
            let parent = this.parentNode.parentNode
            parent.classList.add('invalid')
            parent.classList.remove('valid')
          }
        }, false);
      }
      deleteBtn.addEventListener("click", function(e)
      {
        e.preventDefault()
        const deleteAll = document.querySelectorAll('.choices__button')
        for (let i = 0; i < deleteAll.length; i++)
        {
          deleteAll[i].click();
        }
      });

    </script>
  </body><!-- This templates was made by Colorlib (https://colorlib.com) -->
</html>
